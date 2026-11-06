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
 * Unit tests for the grader of CodeLab questions, with a fake Jobe server.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\grader
 */
final class grader_test extends \advanced_testcase {
    /**
     * A Jobe client that answers from a function instead of a server.
     *
     * @param callable $answer function(string $lang, string $code, string $stdin): array
     * @return jobe
     */
    public static function fake_jobe(callable $answer): jobe {
        return new class ($answer) extends jobe {
            /** @var callable */
            private $answer;
            /** @var int number of runs */
            public $runs = 0;

            /**
             * Fake client.
             *
             * @param callable $answer
             */
            public function __construct(callable $answer) {
                parent::__construct('https://jobe.invalid', '', 5);
                $this->answer = $answer;
            }

            /**
             * Answer without a server.
             *
             * @param string $lang
             * @param string $code
             * @param string $stdin
             * @return array
             */
            public function run(string $lang, string $code, string $stdin = ''): array {
                $this->runs++;
                return array_merge(
                    ['status' => 'ok', 'outcome' => 15, 'cmpinfo' => '', 'stdout' => '', 'stderr' => ''],
                    ($this->answer)($lang, $code, $stdin)
                );
            }
        };
    }

    public function test_decode_tests(): void {
        $tests = grader::decode_tests('[{"stdin":"1","expected":"2"},{"stdin":"x","expected":"y","hidden":1,"weight":"3"},5]');
        $this->assertCount(2, $tests);
        $this->assertSame(['stdin' => '1', 'expected' => '2', 'hidden' => false, 'weight' => 1.0], $tests[0]);
        $this->assertTrue($tests[1]['hidden']);
        $this->assertSame(3.0, $tests[1]['weight']);
        $this->assertSame([], grader::decode_tests('not json'));
        $this->assertSame([], grader::decode_tests(null));
    }

    public function test_program(): void {
        $this->assertSame("int main() {\n  f();\n}\n", grader::program("int main() {\n", "  f();\n\n", "}\n"));
        $this->assertSame("print(1)\n", grader::program('', 'print(1)', ''));
    }

    public function test_windows_line_ends(): void {
        // Text areas of forms send \r\n.
        $this->assertSame("a\nb\n", grader::program('', "a\r\nb\r\n", ''));
        $tests = grader::decode_tests(json_encode([['stdin' => "1\r\n2", 'expected' => "3\r\n"]]));
        $this->assertSame("1\n2", $tests[0]['stdin']);
        $this->assertSame("3\n", $tests[0]['expected']);
    }

    public function test_matches_spaces_and_exact(): void {
        $this->assertTrue(grader::matches("5\n5.15", "5  \n5.15\n\n", 'spaces'));
        $this->assertTrue(grader::matches("5\n5.15", "5  \n5.15\n\n"));
        $this->assertFalse(grader::matches("5\n5.15", "5  \n5.15\n\n", 'exact'));
        $this->assertTrue(grader::matches("a\r\nb", "a\nb", 'exact'));
        $this->assertFalse(grader::matches('5', '6', 'spaces'));
        // Spaces inside a line always count.
        $this->assertFalse(grader::matches('1 2', '1  2', 'spaces'));
    }

    public function test_matches_numbers(): void {
        // Absolute tolerance.
        $this->assertTrue(grader::matches("Average: 2.333", "Average: 2.3333333\n", 'numbers', 0.001));
        $this->assertFalse(grader::matches('Average: 2.333', 'Average: 2.336', 'numbers', 0.001));
        // Relative tolerance for large numbers.
        $this->assertTrue(grader::matches('1000000', '1000400', 'numbers', 0.001));
        $this->assertFalse(grader::matches('1000000', '1002000', 'numbers', 0.001));
        // Spaces and line ends between the words do not count; other words must be the same.
        $this->assertTrue(grader::matches("1 2\n3", "1\n2  3\n", 'numbers', 0));
        $this->assertFalse(grader::matches('Sum: 5', 'Zbir: 5', 'numbers', 0.001));
        $this->assertFalse(grader::matches('1 2', '1 2 3', 'numbers', 0.001));
        $this->assertTrue(grader::matches('-0.5 1e3 .25', '-0.5000 1000 0.25', 'numbers', 0));
        $this->assertFalse(grader::matches('1,5', '1,50', 'numbers', 0.1));
        $this->assertTrue(grader::is_number('+12.'));
        $this->assertFalse(grader::is_number('0x1A'));
        $this->assertFalse(grader::is_number('NaN'));
    }

    public function test_matches_regex(): void {
        $this->assertTrue(grader::matches('Sum: [0-9]+', "Sum: 42  \n\n", 'regex'));
        // The pattern must match the whole output.
        $this->assertFalse(grader::matches('Sum: [0-9]+', "The sum: 42\n", 'regex'));
        $this->assertFalse(grader::matches('[0-9]+', "42\n43", 'regex'));
        $this->assertTrue(grader::matches("[0-9]+\n[0-9]+\n", "42\n43\n", 'regex'));
        // Slashes and tildes need no escaping; UTF-8 letters are one character.
        $this->assertTrue(grader::matches('a/b~č.', 'a/b~čx', 'regex'));
        $this->assertTrue(grader::matches('(?i)yes|da', 'DA', 'regex'));
        // An invalid pattern never matches.
        $this->assertFalse(grader::matches('[0-9', '5', 'regex'));
        $this->assertNull(grader::regex_matches('(', ''));
        $this->assertTrue(grader::regex_valid('^\d+$'));
        $this->assertFalse(grader::regex_valid('(abc'));
    }

    public function test_run_tests_and_fraction(): void {
        // The "program" doubles its input; the second test expects a wrong value.
        $jobe = self::fake_jobe(fn($lang, $code, $stdin) => ['stdout' => (string) ((int) $stdin * 2) . "\n"]);
        $tests = grader::decode_tests(json_encode([
            ['stdin' => '2', 'expected' => '4'],
            ['stdin' => '3', 'expected' => '7', 'weight' => 3],
        ]));
        $results = (new grader($jobe))->run_tests('python', 'x', $tests);
        $this->assertTrue($results[0]['passed']);
        $this->assertFalse($results[1]['passed']);
        $this->assertSame("6\n", $results[1]['got']);
        $this->assertEqualsWithDelta(0.25, grader::fraction($tests, $results), 1e-9);
        $this->assertFalse(grader::sandbox_failed($results));
    }

    public function test_compile_error_stops_after_first_test(): void {
        $jobe = self::fake_jobe(fn() => ['status' => 'compile', 'cmpinfo' => 'error: x undeclared']);
        $tests = grader::decode_tests('[{"stdin":"1","expected":"1"},{"stdin":"2","expected":"2"}]');
        $results = (new grader($jobe))->run_tests('c', 'int main(void) { return x; }', $tests);
        $this->assertSame(1, $jobe->runs);
        $this->assertCount(2, $results);
        $this->assertSame('compile', $results[1]['status']);
        $this->assertSame(0.0, grader::fraction($tests, $results));
    }

    public function test_sandbox_failure(): void {
        $jobe = self::fake_jobe(fn() => ['status' => 'busy']);
        $tests = grader::decode_tests('[{"stdin":"1","expected":"1"}]');
        $this->assertTrue(grader::sandbox_failed((new grader($jobe))->run_tests('c', 'x', $tests)));
    }

    public function test_zero_weights(): void {
        $tests = grader::decode_tests('[{"expected":"1","weight":0},{"expected":"2","weight":0}]');
        $this->assertSame(0.5, grader::fraction($tests, [['passed' => true], ['passed' => false]]));
    }
}
