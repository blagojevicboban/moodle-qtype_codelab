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
 * Question type class for the CodeLab question type.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use qtype_codelab\local\grader;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/questionlib.php');
require_once($CFG->dirroot . '/question/type/codelab/question.php');

/**
 * The CodeLab question type: the student writes a program in a code editor. With tests it is run on the Jobe server and
 * graded automatically; without tests the teacher grades it.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_codelab extends question_type {
    /** Languages in the order they are offered. */
    const LANGUAGES = ['c', 'cpp', 'python', 'java', 'csharp', 'javascript', 'pascal', 'php'];

    /**
     * Extra fields kept in qtype_codelab_options (also used for backup, restore, import and export).
     *
     * @return array
     */
    public function extra_question_fields() {
        return ['qtype_codelab_options', 'language', 'template', 'solution', 'prefix', 'suffix', 'tests', 'showtests',
            'ignorespaces', 'noassist'];
    }

    /**
     * Questions without tests are graded by the teacher; this is decided per question.
     *
     * @return bool
     */
    public function is_manual_graded() {
        return false;
    }

    /**
     * This type stores no files with the response.
     *
     * @return array
     */
    public function response_file_areas() {
        return [];
    }

    /**
     * Random questions may pick CodeLab questions.
     *
     * @return bool
     */
    public function is_usable_by_random() {
        return true;
    }

    /**
     * A random guess has no score.
     *
     * @param stdClass $questiondata
     * @return int|null
     */
    public function get_random_guess_score($questiondata) {
        return empty(grader::decode_tests($questiondata->options->tests ?? '')) ? null : 0;
    }

    /**
     * Names of the languages for a select menu: those that can run on this site (tiny_codelab), and the language of the
     * question being edited.
     *
     * @param string|null $current language of the question being edited
     * @return array code => name
     */
    public static function language_options(?string $current = null): array {
        $offered = \tiny_codelab\local\languages::offered($current);
        $options = [];
        foreach (array_intersect(self::LANGUAGES, $offered) as $lang) {
            $options[$lang] = get_string('lang_' . $lang, 'qtype_codelab');
        }
        return $options;
    }

    /**
     * Tests from the editing form (repeated fields), or the JSON given directly (scripts, import).
     *
     * @param stdClass $form
     * @return array decoded tests
     */
    public static function tests_from_form($form): array {
        if (!isset($form->teststdin) || !is_array($form->teststdin)) {
            return grader::decode_tests(is_string($form->tests ?? null) ? $form->tests : '');
        }
        $tests = [];
        foreach ($form->teststdin as $i => $stdin) {
            $stdin = grader::unix((string) $stdin);
            $expected = grader::unix((string) ($form->testexpected[$i] ?? ''));
            if (trim($stdin) === '' && trim($expected) === '') {
                continue;
            }
            $weight = $form->testweight[$i] ?? 1;
            $tests[] = [
                'stdin' => $stdin,
                'expected' => $expected,
                'hidden' => !empty($form->testhidden[$i]),
                'weight' => is_numeric($weight) ? max(0.0, (float) $weight) : 1.0,
            ];
        }
        return $tests;
    }

    /**
     * Save the options; tests without an expected output get the output of the teacher's solution.
     *
     * @param stdClass $question form data
     * @return bool|stdClass
     */
    public function save_question_options($question) {
        $tests = self::tests_from_form($question);
        $question->tests = json_encode(self::fill_expected($question, $tests));
        foreach (['prefix', 'suffix', 'template', 'solution'] as $field) {
            $question->$field = grader::unix((string) ($question->$field ?? ''));
        }
        foreach (['showtests', 'ignorespaces', 'noassist'] as $field) {
            $question->$field = empty($question->$field) ? 0 : 1;
        }
        $result = parent::save_question_options($question);
        $this->save_hints($question);
        return $result;
    }

    /**
     * Load the options, with the tests also decoded (testlist) for the editing form.
     *
     * @param stdClass $question
     * @return bool
     */
    public function get_question_options($question) {
        $result = parent::get_question_options($question);
        $question->options->testlist = grader::decode_tests($question->options->tests ?? '');
        return $result;
    }

    /**
     * Fill in the expected outputs that are empty by running the solution (only when there is one).
     *
     * @param stdClass $question form data
     * @param array $tests decoded tests
     * @param grader|null $grader
     * @return array tests
     */
    public static function fill_expected($question, array $tests, ?grader $grader = null): array {
        $missing = array_keys(array_filter($tests, fn($tc) => $tc['expected'] === ''));
        if (!$missing || trim((string) ($question->solution ?? '')) === '') {
            return $tests;
        }
        $program = grader::program(
            (string) ($question->prefix ?? ''),
            (string) $question->solution,
            (string) ($question->suffix ?? '')
        );
        $grader = $grader ?? new grader();
        $subset = array_map(fn($i) => $tests[$i], $missing);
        $results = $grader->run_tests((string) $question->language, $program, $subset, true);
        foreach ($missing as $n => $i) {
            if (($results[$n]['status'] ?? '') === 'ok') {
                $tests[$i]['expected'] = $results[$n]['got'];
            }
        }
        return $tests;
    }

    /**
     * Give the question its options, with the tests decoded.
     *
     * @param question_definition $question
     * @param stdClass $questiondata
     */
    protected function initialise_question_instance(question_definition $question, $questiondata) {
        parent::initialise_question_instance($question, $questiondata);
        $question->tests = grader::decode_tests($questiondata->options->tests ?? '');
        $question->showtests = !empty($questiondata->options->showtests);
        $question->ignorespaces = !empty($questiondata->options->ignorespaces);
        $question->noassist = !empty($questiondata->options->noassist);
    }
}
