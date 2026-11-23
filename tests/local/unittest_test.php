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

/**
 * Tests of unit-test assertion harness (TEST / ASSERT_EQ / assert_eq).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\unittest
 */
final class unittest_test extends \basic_testcase {
    /**
     * Detection of unit-test macros/helpers by language.
     */
    public function test_detection(): void {
        $this->assertTrue(unittest::is_unit_test('c', 'TEST(sum) { ASSERT_EQ(add(2, 3), 5); }'));
        $this->assertTrue(unittest::is_unit_test('cpp', 'ASSERT_STREQ(greet("Ana"), "Hi Ana");'));
        $this->assertTrue(unittest::is_unit_test('python', 'assert_eq(add(2, 3), 5)'));
        $this->assertFalse(unittest::is_unit_test('c', 'printf("%d\n", add(2, 3));'));
        $this->assertFalse(unittest::is_unit_test('python', 'print(add(2, 3))'));
        $this->assertFalse(unittest::is_unit_test('java', 'ASSERT_EQ(1, 1);'));
    }

    /**
     * Wrapping C/C++ TEST blocks and bare ASSERT_EQ statements, plus Python helpers.
     */
    public function test_wrap_c_cpp_python(): void {
        $c = grader::test_program(
            'c',
            "int add(int a, int b) { return a + b; }\n",
            "TEST(pos) {\n    ASSERT_EQ(add(2, 3), 5);\n}\nTEST(zero) {\n    ASSERT_EQ(add(0, 0), 0);\n}"
        );
        $this->assertStringContainsString('#define ASSERT_EQ(', $c);
        $this->assertStringContainsString('_cl_test_pos();', $c);
        $this->assertStringContainsString('_cl_test_zero();', $c);

        $bare = grader::test_program('cpp', "int sq(int x) { return x * x; }\n", 'ASSERT_EQ(sq(4), 16);');
        $this->assertStringContainsString('std::cerr', $bare);
        $this->assertStringContainsString('static void _cl_run(void)', $bare);
        $this->assertStringContainsString('return _cl_fail;', $bare);

        $py = grader::test_program('python', "def add(a, b):\n    return a + b\n", 'assert_eq(add(2, 3), 5)');
        $this->assertStringContainsString('def assert_eq(', $py);
        $this->assertStringContainsString('assert_eq(add(2, 3), 5)', $py);
    }

    /**
     * Unit tests pass on exit status ok even when expected output is empty, and fail on assertion failure.
     */
    public function test_grader_unit_test_pass_and_fail(): void {
        $fake = new class extends \tiny_codelab\local\jobe {
            /** @var array */
            public $calls = [];
            /**
             * Return ok for the first call and assertion failure for the second.
             *
             * @param string $lang
             * @param string $code
             * @param string $stdin
             * @param array $files
             * @param string $compiler
             * @param string $std
             * @return array
             */
            public function run(
                string $lang,
                string $code,
                string $stdin = '',
                array $files = [],
                string $compiler = '',
                string $std = ''
            ): array {
                $this->calls[] = $code;
                if (count($this->calls) === 1) {
                    return ['status' => 'ok', 'outcome' => 15, 'cmpinfo' => '', 'stdout' => '', 'stderr' => ''];
                }
                return ['status' => 'runtime', 'outcome' => 12, 'cmpinfo' => '', 'stdout' => '',
                    'stderr' => "FAIL: add(2, 3) == 6 (expected 6, got 5)\n"];
            }
        };
        $grader = new grader($fake);
        $tests = [
            ['stdin' => '', 'expected' => '', 'code' => 'ASSERT_EQ(add(2, 3), 5);', 'hidden' => false, 'weight' => 1.0],
            ['stdin' => '', 'expected' => '', 'code' => 'ASSERT_EQ(add(2, 3), 6);', 'hidden' => false, 'weight' => 1.0],
        ];
        $results = $grader->run_tests('c', "int add(int a, int b) { return a + b; }\n", $tests);
        $this->assertTrue($results[0]['passed']);
        $this->assertFalse($results[1]['passed']);
        $this->assertStringContainsString('FAIL: add(2, 3) == 6', $results[1]['stderr']);
        $this->assertEquals(0.5, grader::fraction($tests, $results));
    }
}
