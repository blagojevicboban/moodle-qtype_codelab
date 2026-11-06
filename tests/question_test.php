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

namespace qtype_codelab;

use qtype_codelab\local\grader;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/engine/tests/helpers.php');
require_once($CFG->dirroot . '/question/type/codelab/question.php');

/**
 * Unit tests for the CodeLab question: answers, grading from the results of the tests, and the cases Jobe cannot check.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab_question
 */
final class question_test extends \advanced_testcase {
    /**
     * A Python question "print twice the number" with two tests of weight 1 and 3.
     *
     * @return \qtype_codelab_question
     */
    protected function make_question(): \qtype_codelab_question {
        $q = new \qtype_codelab_question();
        \test_question_maker::initialise_a_question($q);
        $q->qtype = \question_bank::get_qtype('codelab');
        $q->name = 'Twice';
        $q->questiontext = 'Print twice the number.';
        $q->language = 'python';
        $q->solution = "print(2 * int(input()))\n";
        $q->tests = [
            ['stdin' => '2', 'expected' => '4', 'hidden' => false, 'weight' => 1],
            ['stdin' => '5', 'expected' => '10', 'hidden' => true, 'weight' => 3],
        ];
        return $q;
    }

    /**
     * Put results of the tests of an answer in the cache, as a run on Jobe would.
     *
     * @param \qtype_codelab_question $q
     * @param string $answer
     * @param array $results results as grader::run_tests returns them
     */
    protected function cache_results(\qtype_codelab_question $q, string $answer, array $results): void {
        $program = grader::program((string) $q->prefix, $answer, (string) $q->suffix);
        $key = sha1(json_encode([$q->language, $program, $q->tests, (bool) $q->ignorespaces]));
        \cache::make('qtype_codelab', 'results')->set($key, $results);
    }

    public function test_responses(): void {
        $q = $this->make_question();
        $this->assertFalse($q->is_complete_response([]));
        $this->assertFalse($q->is_complete_response(['answer' => "  \n"]));
        $this->assertTrue($q->is_complete_response(['answer' => 'print(1)']));
        $this->assertNotEmpty($q->get_validation_error(['answer' => '']));
        $this->assertSame('', $q->get_validation_error(['answer' => 'print(1)']));
        $this->assertTrue($q->is_same_response(['answer' => 'x'], ['answer' => 'x']));
        $this->assertFalse($q->is_same_response(['answer' => 'x'], ['answer' => 'y']));
        $this->assertSame('print(1)', $q->summarise_response(['answer' => 'print(1)']));
        $this->assertSame(['answer' => 'print(1)'], $q->un_summarise_response('print(1)'));
        $this->assertSame(['answer' => $q->solution], $q->get_correct_response());
        $this->assertSame(['answer' => PARAM_RAW], $q->get_expected_data());
    }

    public function test_grade_from_cached_results(): void {
        $this->resetAfterTest();
        $q = $this->make_question();
        $answer = "print(int(input()) + 2)\n";
        // Passes the first test (2 + 2 = 4) and fails the second: a quarter of the weight.
        $this->cache_results($q, $answer, [
            ['status' => 'ok', 'passed' => true, 'stdout' => "4\n"],
            ['status' => 'ok', 'passed' => false, 'stdout' => "7\n"],
        ]);
        [$fraction, $state] = $q->grade_response(['answer' => $answer]);
        $this->assertEqualsWithDelta(0.25, $fraction, 1e-9);
        $this->assertSame(\question_state::$gradedpartial, $state);

        $this->cache_results($q, $q->solution, [
            ['status' => 'ok', 'passed' => true, 'stdout' => "4\n"],
            ['status' => 'ok', 'passed' => true, 'stdout' => "10\n"],
        ]);
        [$fraction, $state] = $q->grade_response(['answer' => $q->solution]);
        $this->assertEqualsWithDelta(1.0, $fraction, 1e-9);
        $this->assertSame(\question_state::$gradedright, $state);
    }

    public function test_jobe_failure_waits_for_the_teacher(): void {
        $q = new class extends \qtype_codelab_question {
            /**
             * Jobe was busy.
             *
             * @param array $response
             * @return array
             */
            public function test_results(array $response): array {
                return [['status' => 'busy', 'passed' => false, 'stdout' => '']];
            }
        };
        $q->tests = $this->make_question()->tests;
        [$fraction, $state] = $q->grade_response(['answer' => 'print(1)']);
        $this->assertSame(0, $fraction);
        $this->assertSame(\question_state::$needsgrading, $state);
    }

    public function test_without_tests(): void {
        $q = $this->make_question();
        $q->tests = [];
        $this->assertFalse($q->has_tests());
        $this->assertSame([], $q->test_results(['answer' => 'print(1)']));
        $q->solution = '';
        $this->assertNull($q->get_correct_response());
    }
}
