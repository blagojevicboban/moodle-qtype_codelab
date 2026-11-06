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

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/type/codelab/questiontype.php');

/**
 * Unit tests for the check of all solutions of a course.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\bulk_checker
 */
final class bulk_checker_test extends \advanced_testcase {
    /**
     * Save a CodeLab question in a category.
     *
     * @param \stdClass $category
     * @param string $name
     * @param string $solution
     * @param array $tests
     * @param int|null $id question to save a new version of
     * @return \stdClass the saved question
     */
    protected function save(\stdClass $category, string $name, string $solution, array $tests, ?int $id = null): \stdClass {
        $form = (object) [
            'category' => $category->id . ',' . $category->contextid, 'name' => $name,
            'questiontext' => ['text' => '<p>Twice</p>', 'format' => FORMAT_HTML, 'itemid' => 0],
            'generalfeedback' => ['text' => '', 'format' => FORMAT_HTML, 'itemid' => 0],
            'defaultmark' => 1, 'penalty' => 0.1, 'language' => 'python', 'template' => '', 'solution' => $solution,
            'prefix' => '', 'suffix' => '', 'noassist' => 0, 'showtests' => 1, 'comparison' => 'spaces',
            'tests' => json_encode($tests),
        ];
        $question = $id ? \question_bank::load_question_data($id) : (object) ['category' => $category->id, 'qtype' => 'codelab'];
        return \question_bank::get_qtype('codelab')->save_question($question, $form);
    }

    public function test_find_and_check(): void {
        $this->resetAfterTest();
        $this->setAdminUser();
        $course = $this->getDataGenerator()->create_course();
        $other = $this->getDataGenerator()->create_course();
        $qgen = $this->getDataGenerator()->get_plugin_generator('core_question');
        $quiz = $this->getDataGenerator()->create_module('quiz', ['course' => $course->id]);
        $category = $qgen->create_question_category(['contextid' => \context_module::instance($quiz->cmid)->id]);
        $otherquiz = $this->getDataGenerator()->create_module('quiz', ['course' => $other->id]);
        $othercategory = $qgen->create_question_category(['contextid' => \context_module::instance($otherquiz->cmid)->id]);

        $tests = [['stdin' => '2', 'expected' => '4'], ['stdin' => '5', 'expected' => '10']];
        $right = $this->save($category, 'B right', 'print(2 * int(input()))', $tests);
        $wrong = $this->save($category, 'A wrong', 'print(int(input()) + 2)', $tests);
        $none = $this->save($category, 'C no solution', '', $tests);
        $this->save($othercategory, 'Other course', 'print(1)', $tests);
        // A new version: only the latest one is checked.
        $newer = $this->save($category, 'B right', 'print(int(input()) * 2)', $tests, $right->id);

        $found = bulk_checker::find_questions($course->id);
        $this->assertSame(['A wrong', 'B right', 'C no solution'], array_column($found, 'name'));
        $this->assertEquals($newer->id, $found[1]->id);
        $this->assertStringContainsString('cmid=' . $quiz->cmid, bulk_checker::edit_url($found[0], $course->id)->out(false));

        // Results as Jobe would give them, through the cache of the question.
        $passed = ['status' => 'ok', 'passed' => true, 'got' => '', 'cmpinfo' => '', 'stderr' => ''];
        $failed = ['passed' => false] + $passed;
        $cache = \cache::make('qtype_codelab', 'results');
        $q = \question_bank::load_question($newer->id);
        $cache->set($q->results_key($q->solution), [$passed, $passed]);
        $this->assertSame(['status' => 'ok', 'passed' => 2, 'total' => 2, 'detail' => ''], bulk_checker::check($q));
        $q = \question_bank::load_question($wrong->id);
        $cache->set($q->results_key($q->solution), [$passed, $failed]);
        $this->assertSame('failed', bulk_checker::check($q)['status']);
        $this->assertSame(1, bulk_checker::check($q)['passed']);
        $this->assertSame('nosolution', bulk_checker::check(\question_bank::load_question($none->id))['status']);
    }

    public function test_compile_and_no_tests(): void {
        $this->resetAfterTest();
        $q = new \qtype_codelab_question();
        $q->language = 'python';
        $this->assertSame('notests', bulk_checker::check($q)['status']);

        $q->tests = [['stdin' => '', 'expected' => '1', 'hidden' => false, 'weight' => 1.0]];
        $q->solution = 'print(';
        $compile = ['status' => 'compile', 'passed' => false, 'got' => '', 'cmpinfo' => 'SyntaxError', 'stderr' => ''];
        \cache::make('qtype_codelab', 'results')->set($q->results_key($q->solution), [$compile]);
        $this->assertSame(
            ['status' => 'compile', 'passed' => 0, 'total' => 1, 'detail' => 'SyntaxError'],
            bulk_checker::check($q)
        );
    }
}
