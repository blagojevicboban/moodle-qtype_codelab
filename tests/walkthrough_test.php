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

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/engine/tests/helpers.php');
require_once($CFG->dirroot . '/question/type/codelab/question.php');

/**
 * Walks a CodeLab question through the behaviours with a Check button: the penalty per try, and a failure of Jobe
 * during Check that must not use a try. Jobe is replaced by fixed results.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab_question
 */
final class walkthrough_test extends \qbehaviour_walkthrough_test_base {
    /** The right program. */
    const RIGHT = "print(2 * int(input()))\n";
    /** A program that passes no test. */
    const WRONG = "print(int(input()))\n";
    /** A program Jobe cannot run while it is down. */
    const DOWN = "print('down')\n";

    #[\Override]
    protected function tearDown(): void {
        \qtype_codelab_question::$checkrequested = null;
        parent::tearDown();
    }

    /**
     * A Python question with two tests, a penalty of 10 % and two hints (three tries in Interactive mode). Its results
     * do not come from Jobe: the right program passes, the wrong one fails, and DOWN gets a busy Jobe.
     *
     * @return \qtype_codelab_question
     */
    protected function make_question(): \qtype_codelab_question {
        $q = new class extends \qtype_codelab_question {
            /** @var int how many times the program was sent to Jobe */
            public $runs = 0;

            /**
             * Fixed results instead of a run on Jobe.
             *
             * @param array $response
             * @return array
             */
            public function test_results(array $response): array {
                $answer = (string) ($response['answer'] ?? '');
                if (trim($answer) === '') {
                    return [];
                }
                $key = sha1($answer);
                if (!isset($this->resultcache[$key])) {
                    $this->runs++;
                    $result = [
                        'status' => $answer === walkthrough_test::DOWN ? 'busy' : 'ok',
                        'passed' => $answer === walkthrough_test::RIGHT,
                        'got' => '', 'cmpinfo' => '', 'stderr' => '',
                    ];
                    $this->resultcache[$key] = array_fill(0, count($this->tests), $result);
                }
                return $this->resultcache[$key];
            }
        };
        \test_question_maker::initialise_a_question($q);
        $q->qtype = \question_bank::get_qtype('codelab');
        $q->name = 'Twice';
        $q->questiontext = 'Print twice the number.';
        $q->language = 'python';
        $q->solution = self::RIGHT;
        $q->penalty = 0.1;
        $q->hints = [
            new \question_hint(1, 'Read the number with input().', FORMAT_HTML),
            new \question_hint(2, 'Multiply it by 2.', FORMAT_HTML),
        ];
        $q->tests = [
            ['stdin' => '2', 'expected' => '4', 'hidden' => false, 'weight' => 1],
            ['stdin' => '5', 'expected' => '10', 'hidden' => true, 'weight' => 1],
        ];
        return $q;
    }

    /**
     * Check an answer, as the Check button does.
     *
     * @param string $answer
     */
    protected function check(string $answer): void {
        \qtype_codelab_question::$checkrequested = true;
        $this->process_submission(['answer' => $answer, '-submit' => 1]);
        \qtype_codelab_question::$checkrequested = false;
    }

    public function test_interactive_penalty(): void {
        $this->start_attempt_at_question($this->make_question(), 'interactive', 1);
        $this->check(self::WRONG);
        $this->check_current_state(\question_state::$todo);
        $this->assertEquals(2, $this->quba->get_question_attempt($this->slot)->get_last_behaviour_var('_triesleft'));
        $this->process_submission(['-tryagain' => 1]);
        $this->check(self::RIGHT);
        $this->check_current_state(\question_state::$gradedright);
        $this->check_current_mark(0.9);
    }

    public function test_adaptive_penalty(): void {
        $this->start_attempt_at_question($this->make_question(), 'adaptive', 1);
        $this->check(self::WRONG);
        $this->check_current_state(\question_state::$todo);
        $this->check_current_mark(0);
        $this->check(self::RIGHT);
        $this->check_current_state(\question_state::$complete);
        $this->check_current_mark(0.9);
        $this->finish();
        $this->check_current_state(\question_state::$gradedright);
        $this->check_current_mark(0.9);
    }

    public function test_interactive_jobe_down_keeps_the_try(): void {
        $q = $this->make_question();
        $this->start_attempt_at_question($q, 'interactive', 1);
        $this->check(self::DOWN);
        $this->check_current_state(\question_state::$invalid);
        $this->assertEquals(3, $this->quba->get_question_attempt($this->slot)->get_last_behaviour_var('_triesleft'));
        $this->assertSame(1, $q->runs);
        $this->render();
        $this->assertStringContainsString(get_string('checkfailed', 'qtype_codelab'), $this->currentoutput);
        // Jobe works again: the first real try has no penalty.
        $this->check(self::RIGHT);
        $this->check_current_state(\question_state::$gradedright);
        $this->check_current_mark(1);
    }

    public function test_adaptive_jobe_down_keeps_the_try(): void {
        $this->start_attempt_at_question($this->make_question(), 'adaptive', 1);
        $this->check(self::DOWN);
        $this->check_current_state(\question_state::$invalid);
        $this->check(self::RIGHT);
        $this->check_current_mark(1);
    }

    public function test_jobe_down_at_the_end_waits_for_the_teacher(): void {
        $this->start_attempt_at_question($this->make_question(), 'interactive', 1);
        $this->process_submission(['answer' => self::DOWN]);
        $this->finish();
        $this->check_current_state(\question_state::$needsgrading);
    }

    public function test_deferred_save_does_not_run_jobe(): void {
        $q = $this->make_question();
        $this->start_attempt_at_question($q, 'deferredfeedback', 1);
        $this->process_submission(['answer' => self::WRONG]);
        $this->process_submission(['answer' => self::RIGHT]);
        $this->check_current_state(\question_state::$complete);
        $this->assertSame(0, $q->runs);
        $this->finish();
        $this->check_current_state(\question_state::$gradedright);
        $this->assertSame(1, $q->runs);
    }
}
