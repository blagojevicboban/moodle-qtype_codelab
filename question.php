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

/**
 * CodeLab question definition class.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use qtype_codelab\local\grader;

/**
 * A CodeLab question: the answer is the program the student wrote. With tests it is run on the Jobe server and graded
 * by the share of passed tests; without tests the teacher grades it.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_codelab_question extends question_graded_automatically {
    /** @var string programming language: c, cpp, python, java, csharp, javascript, pascal or php */
    public $language = 'c';
    /** @var string code students start from */
    public $template = '';
    /** @var string the teacher's program */
    public $solution = '';
    /** @var string code added before the student's code */
    public $prefix = '';
    /** @var string code added after the student's code */
    public $suffix = '';
    /** @var array decoded tests: stdin, expected, hidden, weight */
    public $tests = [];
    /** @var bool students may run the tests that are not hidden */
    public $showtests = true;
    /** @var bool spaces at the end of lines and of the output do not count */
    public $ignorespaces = true;
    /** @var bool code completion and hints are turned off */
    public $noassist = false;

    /** @var array results of the tests by answer, for this request */
    protected $resultcache = [];

    /**
     * Whether the question has tests (otherwise the teacher grades it).
     *
     * @return bool
     */
    public function has_tests(): bool {
        return !empty($this->tests);
    }

    /**
     * Without tests the teacher grades the answers.
     *
     * @param question_attempt $qa
     * @param string $preferredbehaviour
     * @return question_behaviour
     */
    public function make_behaviour(question_attempt $qa, $preferredbehaviour) {
        if (!$this->has_tests()) {
            return question_engine::make_behaviour('manualgraded', $qa, $preferredbehaviour);
        }
        return parent::make_behaviour($qa, $preferredbehaviour);
    }

    /**
     * The answer is the program text.
     *
     * @return array
     */
    public function get_expected_data() {
        return ['answer' => PARAM_RAW];
    }

    /**
     * Results of the tests for an answer: kept in the application cache, so a review or a regrade of the same answer does
     * not run it on Jobe again.
     *
     * @param array $response
     * @return array results of grader::run_tests, empty without tests or an answer
     */
    public function test_results(array $response): array {
        $answer = (string) ($response['answer'] ?? '');
        if (!$this->has_tests() || trim($answer) === '') {
            return [];
        }
        $program = grader::program((string) $this->prefix, $answer, (string) $this->suffix);
        $key = sha1(json_encode([$this->language, $program, $this->tests, (bool) $this->ignorespaces]));
        if (isset($this->resultcache[$key])) {
            return $this->resultcache[$key];
        }
        $cache = \cache::make('qtype_codelab', 'results');
        $results = $cache->get($key);
        if ($results === false) {
            $results = (new grader())->run_tests($this->language, $program, $this->tests, (bool) $this->ignorespaces);
            // A failure of the sandbox is not kept: the next try may work.
            if (!grader::sandbox_failed($results)) {
                $cache->set($key, $results);
            }
        }
        return $this->resultcache[$key] = $results;
    }

    /**
     * Grade by the share of the weight of the passed tests. When Jobe could not check the program, the teacher grades it.
     *
     * @param array $response
     * @return array [fraction, state]
     */
    public function grade_response(array $response) {
        $results = $this->test_results($response);
        if (grader::sandbox_failed($results)) {
            return [0, question_state::$needsgrading];
        }
        $fraction = grader::fraction($this->tests, $results);
        return [$fraction, question_state::graded_state_for_fraction($fraction)];
    }

    /**
     * Summary of the answer: the program text.
     *
     * @param array $response
     * @return string|null
     */
    public function summarise_response(array $response) {
        return isset($response['answer']) ? (string) $response['answer'] : null;
    }

    /**
     * The summary is the program text.
     *
     * @param string $summary
     * @return array
     */
    public function un_summarise_response(string $summary) {
        return $summary === '' ? [] : ['answer' => $summary];
    }

    /**
     * The teacher's program, when there is one.
     *
     * @return array|null
     */
    public function get_correct_response() {
        return trim((string) $this->solution) === '' ? null : ['answer' => $this->solution];
    }

    /**
     * An answer is complete when it has code.
     *
     * @param array $response
     * @return bool
     */
    public function is_complete_response(array $response) {
        return trim((string) ($response['answer'] ?? '')) !== '';
    }

    /**
     * Message shown when the answer is empty.
     *
     * @param array $response
     * @return string
     */
    public function get_validation_error(array $response) {
        return $this->is_complete_response($response) ? '' : get_string('noanswer', 'qtype_codelab');
    }

    /**
     * Two answers are the same when the program text is the same.
     *
     * @param array $prevresponse
     * @param array $newresponse
     * @return bool
     */
    public function is_same_response(array $prevresponse, array $newresponse) {
        return question_utils::arrays_same_at_key_missing_is_blank($prevresponse, $newresponse, 'answer');
    }
}
