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
use qtype_codelab\local\grader_test;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/type/codelab/questiontype.php');
require_once($CFG->dirroot . '/question/type/codelab/tests/local/grader_test.php');

/**
 * Unit tests for the CodeLab question type: tests from the form, expected outputs from the solution, saving, grading.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab
 * @covers     \qtype_codelab_question
 */
final class questiontype_test extends \advanced_testcase {
    public function test_tests_from_form(): void {
        $form = (object) [
            'teststdin' => ['1', '', '', '3'],
            'testexpected' => ['2', '', 'only output', ''],
            'testhidden' => [0, 0, 1, 0],
            'testweight' => [1, 1, 'x', 2],
        ];
        $tests = \qtype_codelab::tests_from_form($form);
        $this->assertCount(3, $tests);
        $this->assertSame('only output', $tests[1]['expected']);
        $this->assertTrue($tests[1]['hidden']);
        $this->assertSame(1.0, $tests[1]['weight']);
        $this->assertSame(2.0, $tests[2]['weight']);

        $json = (object) ['tests' => '[{"stdin":"5","expected":"25"}]'];
        $this->assertSame('25', \qtype_codelab::tests_from_form($json)[0]['expected']);
    }

    public function test_fill_expected_from_solution(): void {
        $jobe = grader_test::fake_jobe(fn($lang, $code, $stdin) => ['stdout' => strtoupper($stdin)]);
        $question = (object) ['language' => 'python', 'solution' => 'print(input().upper())', 'prefix' => '', 'suffix' => ''];
        $tests = grader::decode_tests('[{"stdin":"ab","expected":""},{"stdin":"cd","expected":"given"}]');
        $filled = \qtype_codelab::fill_expected($question, $tests, new grader($jobe));
        $this->assertSame('AB', $filled[0]['expected']);
        $this->assertSame('given', $filled[1]['expected']);
        $this->assertSame(1, $jobe->runs);

        // Without a solution nothing is run.
        $question->solution = '';
        $this->assertSame('', \qtype_codelab::fill_expected($question, $tests, new grader($jobe))[0]['expected']);
        $this->assertSame(1, $jobe->runs);
    }

    public function test_save_and_load(): void {
        $this->resetAfterTest();
        $this->setAdminUser();
        $generator = $this->getDataGenerator()->get_plugin_generator('core_question');
        $category = $generator->create_question_category();
        $form = (object) [
            'category' => $category->id . ',' . $category->contextid, 'name' => 'Sum',
            'questiontext' => ['text' => '<p>Sum</p>', 'format' => FORMAT_HTML, 'itemid' => 0],
            'generalfeedback' => ['text' => '', 'format' => FORMAT_HTML, 'itemid' => 0],
            'defaultmark' => 1, 'penalty' => 0.1, 'language' => 'c', 'template' => 'int main(void) {}',
            'solution' => '', 'prefix' => '', 'suffix' => '', 'noassist' => 1, 'showtests' => 0, 'ignorespaces' => 1,
            'teststdin' => ['1 2', ''], 'testexpected' => ['3', ''], 'testhidden' => [1, 0], 'testweight' => [2, 1],
        ];
        $question = (object) ['category' => $category->id, 'qtype' => 'codelab'];
        $saved = \question_bank::get_qtype('codelab')->save_question($question, $form);

        $loaded = \question_bank::load_question($saved->id);
        $this->assertInstanceOf(\qtype_codelab_question::class, $loaded);
        $this->assertSame('c', $loaded->language);
        $this->assertTrue($loaded->noassist);
        $this->assertFalse($loaded->showtests);
        $this->assertSame([['stdin' => '1 2', 'expected' => '3', 'hidden' => true, 'weight' => 2.0]], $loaded->tests);
        $this->assertTrue($loaded->has_tests());
    }

    public function test_grading_from_cached_results(): void {
        $this->resetAfterTest();
        $question = new \qtype_codelab_question();
        $question->language = 'python';
        $question->tests = grader::decode_tests('[{"stdin":"1","expected":"1"},{"stdin":"2","expected":"2","weight":3}]');
        $question->ignorespaces = true;
        // Results as the grader keeps them in the cache: the second (heavier) test passed.
        $program = grader::program('', 'print(input())', '');
        $key = sha1(json_encode(['python', $program, $question->tests, true]));
        \cache::make('qtype_codelab', 'results')->set($key, [
            ['status' => 'ok', 'passed' => false, 'got' => '', 'cmpinfo' => '', 'stderr' => ''],
            ['status' => 'ok', 'passed' => true, 'got' => '2', 'cmpinfo' => '', 'stderr' => ''],
        ]);
        [$fraction, $state] = $question->grade_response(['answer' => 'print(input())']);
        $this->assertEqualsWithDelta(0.75, $fraction, 1e-9);
        $this->assertSame(\question_state::$gradedpartial, $state);
    }

    public function test_question_without_tests_is_graded_by_teacher(): void {
        $question = new \qtype_codelab_question();
        $this->assertFalse($question->has_tests());
        $this->assertSame('', $question->get_validation_error(['answer' => 'x']));
        $this->assertNotSame('', $question->get_validation_error(['answer' => '  ']));
    }
}
