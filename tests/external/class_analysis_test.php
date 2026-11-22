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

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/engine/tests/helpers.php');
require_once($CFG->dirroot . '/question/type/codelab/question.php');

/**
 * Tests of the analysis of the class answers: tests passed, frequent wrong outputs, compiler messages, errors, grades,
 * other versions and the budget of runs per request. The results come from a stand-in, not from Jobe.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\external\get_class_analysis
 */
final class class_analysis_test extends \advanced_testcase {
    /**
     * A question with two tests (the second hidden) whose results depend on the answer: RIGHT passes both, HALF the
     * first, WRONG prints 7, COMPILE does not compile.
     *
     * @return \qtype_codelab_question
     */
    private function question(): \qtype_codelab_question {
        $q = new class extends \qtype_codelab_question {
            /**
             * Fixed results instead of a run.
             *
             * @param array $response
             * @return array
             */
            public function test_results(array $response): array {
                $answer = (string) $response['answer'];
                $ok = fn(bool $passed, string $got) => ['status' => 'ok', 'passed' => $passed, 'got' => $got, 'cmpinfo' => '',
                    'stderr' => ''];
                $compile = ['status' => 'compile', 'passed' => false, 'got' => '',
                    'cmpinfo' => "prog.c:3:5: error: expected ';' before 'return'\n    3 | return 0", 'stderr' => ''];
                return match ($answer) {
                    'RIGHT' => [$ok(true, "4\n"), $ok(true, "10\n")],
                    'HALF' => [$ok(true, "4\n"), $ok(false, "9\n")],
                    'WRONG' => [$ok(false, "7\n"), $ok(false, "7\n")],
                    default => [$compile, $compile],
                };
            }
        };
        \test_question_maker::initialise_a_question($q);
        $q->qtype = \question_bank::get_qtype('codelab');
        $q->language = 'c';
        $q->tests = [
            ['stdin' => '2', 'expected' => '4', 'hidden' => false, 'weight' => 1],
            ['stdin' => '5', 'expected' => '10', 'hidden' => true, 'weight' => 1],
        ];
        return $q;
    }

    public function test_analysis(): void {
        $this->resetAfterTest();
        $answers = [];
        foreach (['RIGHT', 'HALF', 'WRONG', 'WRONG', 'COMPILE', 'RIGHT'] as $i => $answer) {
            $answers[$i + 1] = ['questionid' => 5, 'answer' => $answer, 'time' => $i, 'fraction' => null];
        }
        $answers[20] = ['questionid' => 6, 'answer' => 'RIGHT', 'time' => 0, 'fraction' => null];
        $r = get_class_analysis::analyse($this->question(), 5, $answers);
        $this->assertSame(6, $r['answers']);
        $this->assertSame(1, $r['otherversions']);
        $this->assertSame(1, $r['compile']);
        $this->assertSame(0, $r['pending']);
        $this->assertSame([3, 2], array_column($r['tests'], 'passed'));
        $this->assertSame([false, true], array_column($r['tests'], 'hidden'));
        $this->assertSame(['text' => '7', 'count' => 2], $r['tests'][0]['wrong'][0]);
        $this->assertSame(['7', '9'], array_column($r['tests'][1]['wrong'], 'text'));
        $this->assertSame("expected ';' before 'return'", $r['messages'][0]['text']);
        // Grades: 0 % three times (two wrong, one does not compile), 50 % once, 100 % twice.
        $this->assertSame(3, $r['grades'][0]);
        $this->assertSame(1, $r['grades'][5]);
        $this->assertSame(2, $r['grades'][9]);
    }

    public function test_budget_of_runs(): void {
        $this->resetAfterTest();
        $answers = [];
        for ($i = 1; $i <= get_class_analysis::RUN_BUDGET + 5; $i++) {
            $answers[$i] = ['questionid' => 5, 'answer' => "WRONG {$i}", 'time' => $i, 'fraction' => null];
        }
        $r = get_class_analysis::analyse($this->question(), 5, $answers);
        $this->assertSame(get_class_analysis::RUN_BUDGET, $r['answers']);
        $this->assertSame(5, $r['pending']);
    }

    public function test_first_message(): void {
        $messages = "prog.c: In function 'main':\nprog.c:4:5: error: 'x' undeclared (first use in this function)\n";
        $this->assertSame("'x' undeclared (first use in this function)", get_class_analysis::first_message($messages));
        $this->assertSame('SyntaxError: invalid syntax', get_class_analysis::first_message('SyntaxError: invalid syntax'));
    }
}
