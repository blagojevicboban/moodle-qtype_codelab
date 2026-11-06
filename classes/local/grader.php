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
    const SANDBOX_FAILURES = ['error', 'busy', 'notconfigured'];

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
     * @return array list of ['stdin' => string, 'expected' => string, 'hidden' => bool, 'weight' => float]
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
     * @param string $expected
     * @param string $got
     * @param bool $ignorespaces
     * @return bool
     */
    public static function matches(string $expected, string $got, bool $ignorespaces): bool {
        return self::normalise($expected, $ignorespaces) === self::normalise($got, $ignorespaces);
    }

    /**
     * Run the program on every test.
     *
     * @param string $lang
     * @param string $program the whole program (see program())
     * @param array $tests decoded tests
     * @param bool $ignorespaces
     * @return array list of ['status', 'passed', 'got', 'cmpinfo', 'stderr'] in the order of the tests
     */
    public function run_tests(string $lang, string $program, array $tests, bool $ignorespaces): array {
        $this->jobe = $this->jobe ?? new jobe();
        $results = [];
        foreach ($tests as $tc) {
            $run = $this->jobe->run($lang, $program, $tc['stdin']);
            $results[] = [
                'status' => $run['status'],
                'passed' => $run['status'] === 'ok' && self::matches($tc['expected'], $run['stdout'], $ignorespaces),
                'got' => $run['stdout'],
                'cmpinfo' => $run['cmpinfo'],
                'stderr' => $run['stderr'],
            ];
            // The same program does not compile on the next tests either, and a sandbox failure would repeat.
            if ($run['status'] === 'compile' || in_array($run['status'], self::SANDBOX_FAILURES, true)) {
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
