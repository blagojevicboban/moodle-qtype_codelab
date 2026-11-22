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

namespace qtype_codelab\external;

use core_external\external_api;

/**
 * Tests of the web service Check order: only the student of an attempt in progress, only a Parsons problem with the
 * option on, and only the count.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\external\check_order
 */
final class check_order_test extends \advanced_testcase {
    /** The solution of the question. */
    const SOLUTION = "a = 1\nb = 2\nprint(a + b)\n";

    /**
     * A quiz with a Parsons question, and an attempt of a student in progress.
     *
     * @param int $ordercheck option of the question
     * @return array [student, usage id of the attempt, quiz attempt record]
     */
    protected function attempt(int $ordercheck): array {
        global $CFG, $DB;
        require_once($CFG->dirroot . '/mod/quiz/locallib.php');
        $this->setAdminUser();
        $course = $this->getDataGenerator()->create_course();
        $student = $this->getDataGenerator()->create_and_enrol($course, 'student');
        $quiz = $this->getDataGenerator()->get_plugin_generator('mod_quiz')->create_instance(['course' => $course->id,
            'questionsperpage' => 0, 'grade' => 10, 'sumgrades' => 1]);
        $category = $this->getDataGenerator()->get_plugin_generator('core_question')->create_question_category(
            ['contextid' => \context_module::instance($quiz->cmid)->id]
        );
        $form = (object) [
            'category' => $category->id . ',' . $category->contextid, 'name' => 'Order',
            'questiontext' => ['text' => '<p>Order the lines.</p>', 'format' => FORMAT_HTML, 'itemid' => 0],
            'generalfeedback' => ['text' => '', 'format' => FORMAT_HTML, 'itemid' => 0],
            'defaultmark' => 1, 'penalty' => 0.1, 'language' => 'python', 'template' => '', 'solution' => self::SOLUTION,
            'prefix' => '', 'suffix' => '', 'noassist' => 0, 'showtests' => 0, 'comparison' => 'spaces', 'parsons' => 1,
            'distractors' => "a = 2\n", 'tolerance' => '', 'cputime' => '', 'memorylimit' => '', 'timelimit' => '',
            'ordercheck' => $ordercheck, 'teststdin' => [''], 'testexpected' => ['3'], 'testhidden' => [0], 'testweight' => [1],
        ];
        $question = \question_bank::get_qtype('codelab')->save_question(
            (object) ['category' => $category->id, 'qtype' => 'codelab'],
            $form
        );
        quiz_add_quiz_question($question->id, $quiz);

        $this->setUser($student);
        $quizobj = \mod_quiz\quiz_settings::create($quiz->id, $student->id);
        $quba = \question_engine::make_questions_usage_by_activity('mod_quiz', $quizobj->get_context());
        $quba->set_preferred_behaviour($quizobj->get_quiz()->preferredbehaviour);
        $now = time();
        $attempt = quiz_create_attempt($quizobj, 1, false, $now, false, $student->id);
        quiz_start_new_attempt($quizobj, $quba, $attempt, 1, $now);
        quiz_attempt_save_started($quizobj, $quba, $attempt);
        return [$student, (int) $quba->get_id(), $DB->get_record('quiz_attempts', ['id' => $attempt->id])];
    }

    public function test_the_student_gets_only_the_count(): void {
        $this->resetAfterTest();
        [, $usageid] = $this->attempt(1);
        $result = check_order::execute($usageid, 1, "b = 2\na = 1\nprint(a + b)\n");
        $result = external_api::clean_returnvalue(check_order::execute_returns(), $result);
        $this->assertSame(['placed' => 2, 'total' => 3], $result);
    }

    public function test_another_user_is_refused(): void {
        $this->resetAfterTest();
        [, $usageid] = $this->attempt(1);
        $this->setUser($this->getDataGenerator()->create_user());
        $this->expectException(\moodle_exception::class);
        check_order::execute($usageid, 1, self::SOLUTION);
    }

    public function test_a_finished_attempt_is_refused(): void {
        global $DB;
        $this->resetAfterTest();
        [, $usageid, $attempt] = $this->attempt(1);
        $DB->set_field('quiz_attempts', 'state', 'finished', ['id' => $attempt->id]);
        $this->expectException(\moodle_exception::class);
        check_order::execute($usageid, 1, self::SOLUTION);
    }

    public function test_a_question_without_check_order_is_refused(): void {
        $this->resetAfterTest();
        [, $usageid] = $this->attempt(0);
        $this->expectException(\moodle_exception::class);
        check_order::execute($usageid, 1, self::SOLUTION);
    }
}
