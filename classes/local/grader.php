<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace qtype_codelab\local;

use tiny_codelab\local\jobe;

/**
 * Runs a program on the tests of a question and compares the outputs.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class grader {
    /** Statuses meaning Jobe could not check the program: the answer is then left for the teacher. */
    const SANDBOX_FAILURES = ['error', 'busy', 'notconfigured', 'nolanguage'];

    /** Place of the test code in the hidden code (see test_program()). */
    const MARKER = '{{TEST}}';

    /** Ways to compare the output with the expected output. */
    const COMPARISONS = ['exact', 'spaces', 'unordered', 'numbers', 'regex'];

    /** Default tolerance of the comparison numbers. */
    const TOLERANCE = 0.001;

    /** @var jobe|null client, made when first needed */
    protected $jobe;

    /**
     * Grader with a Jobe client (the one of the settings by default).
     *
     * @param jobe|null $jobe
     */
    public function __construct(?jobe $jobe = null) {
        $this->jobe = $jobe;
    }

    /**
     * Tests from their JSON, with every field.
     *
     * @param string|null $json
     * @return array list of ['stdin' => string, 'expected' => string, 'code' => string, 'hidden' => bool,
     *     'weight' => float]
     */
    public static function decode_tests(?string $json): array {
        $tests = json_decode((string) $json, true);
        $out = [];
        foreach (is_array($tests) ? $tests : [] as $tc) {
            if (!is_array($tc)) {
                continue;
            }
            $weight = isset($tc['weight']) && is_numeric($tc['weight']) ? max(0.0, (float) $tc['weight']) : 1.0;
            $out[] = [
                'stdin' => self::unix((string) ($tc['stdin'] ?? '')),
                'expected' => self::unix((string) ($tc['expected'] ?? '')),
                'code' => rtrim(self::unix((string) ($tc['code'] ?? '')), "\n"),
                'hidden' => !empty($tc['hidden']),
                'weight' => $weight,
            ];
        }
        return $out;
    }

    /**
     * The program that is run: hidden code before and after the student's code.
     *
     * @param string $prefix
     * @param string $code
     * @param string $suffix
     * @return string
     */
    public static function program(string $prefix, string $code, string $suffix): string {
        // Text areas of forms send Windows line ends; programs and their input use \n.
        $parts = array_map(fn($p) => rtrim(self::unix($p), "\n"), [$prefix, $code, $suffix]);
        return implode("\n", array_filter($parts, fn($p) => $p !== '')) . "\n";
    }

    /**
     * The program of one test: the test code (for example a call of the student's function) goes where the hidden code
     * has the marker {{TEST}}; without the marker a C or C++ program without main gets a main that runs the test code,
     * and in other languages the test code is added at the end. Without test code the marker is left out.
     *
     * @param string $lang
     * @param string $program the whole program (see program())
     * @param string $code test code, may be empty
     * @return string
     */
    public static function test_program(string $lang, string $program, string $code): string {
        $code = rtrim(self::unix($code), "\n");
        if (strpos($program, self::MARKER) !== false) {
            // The test code takes the indentation of the marker's line.
            return preg_replace_callback('/^([ \t]*)(.*?)' . preg_quote(self::MARKER, '/') . '/m', function ($m) use ($code) {
                $lines = explode("\n", $code);
                return $m[1] . $m[2] . implode("\n" . $m[1], $lines);
            }, $program, 1);
        }
        if ($code === '') {
            return $program;
        }
        if (in_array($lang, ['c', 'cpp'], true) && !preg_match('/\bmain\s*\(/', $program)) {
            $main = $lang === 'c' ? 'int main(void)' : 'int main()';
            $body = '    ' . str_replace("\n", "\n    ", $code);
            return $program . "\n" . $main . "\n{\n" . $body . "\n    return 0;\n}\n";
        }
        return $program . $code . "\n";
    }

    /**
     * Text with \n line ends.
     *
     * @param string $text
     * @return string
     */
    public static function unix(string $text): string {
        return str_replace(["\r\n", "\r"], "\n", $text);
    }

    /**
     * Output prepared for the comparison.
     *
     * @param string $text
     * @param bool $ignorespaces spaces at the end of lines and empty lines at the end do not count
     * @return string
     */
    public static function normalise(string $text, bool $ignorespaces): string {
        $text = self::unix($text);
        if (!$ignorespaces) {
            return $text;
        }
        $lines = array_map('rtrim', explode("\n", $text));
        return rtrim(implode("\n", $lines), "\n");
    }

    /**
     * Whether the output matches the expected output.
     *
     * @param string $expected expected output, or a regular expression for the comparison regex
     * @param string $got
     * @param string $comparison one of COMPARISONS
     * @param float $tolerance for the comparison numbers: largest absolute or relative difference of two numbers
     * @return bool
     */
    public static function matches(
        string $expected,
        string $got,
        string $comparison = 'spaces',
        float $tolerance = self::TOLERANCE
    ): bool {
        switch ($comparison) {
            case 'exact':
                return self::unix($expected) === self::unix($got);
            case 'numbers':
                return self::numbers_match($expected, $got, $tolerance);
            case 'regex':
                return self::regex_matches($expected, $got) === true;
            case 'unordered':
                return self::lines_sorted($expected) === self::lines_sorted($got);
            default:
                return self::normalise($expected, true) === self::normalise($got, true);
        }
    }

    /**
     * The lines of an output without trailing spaces and empty lines at the end, sorted: for results whose rows may come
     * in any order (SQL without ORDER BY).
     *
     * @param string $text
     * @return string[]
     */
    public static function lines_sorted(string $text): array {
        $lines = explode("\n", self::normalise($text, true));
        sort($lines, SORT_STRING);
        return $lines;
    }

    /**
     * Compare word by word: numbers may differ by the tolerance (absolute, or relative to the larger one), other words
     * must be the same. Spaces and line ends between the words do not count.
     *
     * @param string $expected
     * @param string $got
     * @param float $tolerance
     * @return bool
     */
    public static function numbers_match(string $expected, string $got, float $tolerance): bool {
        $split = fn(string $text) => preg_split('/\s+/', trim($text), -1, PREG_SPLIT_NO_EMPTY);
        $a = $split($expected);
        $b = $split($got);
        if (count($a) !== count($b)) {
            return false;
        }
        foreach ($a as $i => $word) {
            if ($word === $b[$i]) {
                continue;
            }
            if (!self::is_number($word) || !self::is_number($b[$i])) {
                return false;
            }
            $x = (float) $word;
            $y = (float) $b[$i];
            $diff = abs($x - $y);
            if ($diff > $tolerance && $diff > $tolerance * max(abs($x), abs($y))) {
                return false;
            }
        }
        return true;
    }

    /**
     * Whether a word is a number as programs print them: 12, -3, 2.50, .5, 1e-3 (not 0x1A or 1,5).
     *
     * @param string $word
     * @return bool
     */
    public static function is_number(string $word): bool {
        return (bool) preg_match('/^[+-]?(\d+\.?\d*|\.\d+)([eE][+-]?\d+)?$/', $word);
    }

    /**
     * The expected output as a regular expression (PCRE) that must match the whole output. Spaces at the end of lines and
     * empty lines at the end of the output do not count.
     *
     * @param string $pattern
     * @param string $got
     * @return bool|null whether it matches, null when the pattern is not valid
     */
    public static function regex_matches(string $pattern, string $got): ?bool {
        $regex = self::regex(rtrim(self::unix($pattern), "\n"));
        $result = @preg_match($regex, self::normalise($got, true));
        if ($result === false) {
            // Output that is not UTF-8 is compared byte by byte.
            $result = @preg_match(substr($regex, 0, -1), self::normalise($got, true));
        }
        return $result === false ? null : $result === 1;
    }

    /**
     * Whether a pattern of a test is a valid regular expression.
     *
     * @param string $pattern
     * @return bool
     */
    public static function regex_valid(string $pattern): bool {
        return @preg_match(self::regex(rtrim(self::unix($pattern), "\n")), '') !== false;
    }

    /**
     * The full PCRE for a pattern: anchored at both ends of the output, UTF-8.
     *
     * @param string $pattern
     * @return string
     */
    protected static function regex(string $pattern): string {
        // The delimiter is a control character, so a teacher's / or ~ needs no escaping.
        return "\x01\A(?:" . $pattern . ")\z\x01u";
    }

    /**
     * Run the program on every test.
     *
     * @param string $lang
     * @param string $program the whole program (see program())
     * @param array $tests decoded tests
     * @param string $comparison one of COMPARISONS
     * @param float $tolerance for the comparison numbers
     * @return array list of ['status', 'passed', 'got', 'cmpinfo', 'stderr'] in the order of the tests
     */
    public function run_tests(
        string $lang,
        string $program,
        array $tests,
        string $comparison = 'spaces',
        float $tolerance = self::TOLERANCE
    ): array {
        $this->jobe = $this->jobe ?? new jobe();
        $results = [];
        // With test code every test is another program, so a compilation error may belong to one test only.
        $sameprogram = !array_filter($tests, fn($tc) => ($tc['code'] ?? '') !== '');
        foreach ($tests as $tc) {
            $run = $this->jobe->run($lang, self::test_program($lang, $program, $tc['code'] ?? ''), $tc['stdin']);
            $results[] = [
                'status' => $run['status'],
                'passed' => $run['status'] === 'ok' && self::matches($tc['expected'], $run['stdout'], $comparison, $tolerance),
                'got' => $run['stdout'],
                'cmpinfo' => $run['cmpinfo'],
                'stderr' => $run['stderr'],
            ];
            // The same program does not compile on the next tests either, and a sandbox failure would repeat.
            if (($run['status'] === 'compile' && $sameprogram) || in_array($run['status'], self::SANDBOX_FAILURES, true)) {
                while (count($results) < count($tests)) {
                    $results[] = ['status' => $run['status'], 'passed' => false, 'got' => '', 'cmpinfo' => $run['cmpinfo'],
                        'stderr' => $run['stderr']];
                }
                break;
            }
        }
        return $results;
    }

    /**
     * Whether Jobe failed to check the program (then the answer is not graded automatically).
     *
     * @param array $results
     * @return bool
     */
    public static function sandbox_failed(array $results): bool {
        foreach ($results as $r) {
            if (in_array($r['status'], self::SANDBOX_FAILURES, true)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Share of the weight of the passed tests.
     *
     * @param array $tests decoded tests
     * @param array $results
     * @return float between 0 and 1
     */
    public static function fraction(array $tests, array $results): float {
        $total = 0.0;
        $passed = 0.0;
        foreach ($tests as $i => $tc) {
            $total += $tc['weight'];
            if (!empty($results[$i]['passed'])) {
                $passed += $tc['weight'];
            }
        }
        if ($total <= 0) {
            // All weights 0: every test counts the same.
            $count = count($tests);
            return $count ? count(array_filter($results, fn($r) => !empty($r['passed']))) / $count : 0.0;
        }
        return $passed / $total;
    }
}
