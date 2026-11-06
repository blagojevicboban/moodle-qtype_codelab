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
use qtype_codelab\local\question_jobe;

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
            'comparison', 'tolerance', 'cputime', 'memorylimit', 'noassist'];
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
        foreach (['showtests', 'noassist'] as $field) {
            $question->$field = empty($question->$field) ? 0 : 1;
        }
        $question->comparison = self::comparison($question);
        $question->tolerance = self::tolerance($question->tolerance ?? null);
        $question->cputime = self::limit($question->cputime ?? 0);
        $question->memorylimit = self::limit($question->memorylimit ?? 0);
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
        $grader = $grader ?? new grader(self::jobe_for($question));
        $subset = array_map(fn($i) => $tests[$i], $missing);
        $results = $grader->run_tests((string) $question->language, $program, $subset);
        $regex = self::comparison($question) === 'regex';
        foreach ($missing as $n => $i) {
            if (($results[$n]['status'] ?? '') === 'ok') {
                // For the comparison regex the output becomes a pattern that matches only itself.
                $got = $results[$n]['got'];
                $tests[$i]['expected'] = $regex ? preg_quote(grader::normalise($got, true)) : $got;
            }
        }
        return $tests;
    }

    /**
     * Run the solution of the editing form on its tests that have an expected output (the empty ones are filled from
     * it when saving).
     *
     * @param array $data data of the editing form
     * @param grader|null $grader
     * @return array ['compile' => compiler message or null, 'failed' => [form index of the test => output]]; nothing
     *     failed when there is no solution or Jobe could not run it
     */
    public static function check_solution(array $data, ?grader $grader = null): array {
        $none = ['compile' => null, 'failed' => []];
        if (trim((string) ($data['solution'] ?? '')) === '') {
            return $none;
        }
        $tests = [];
        foreach ($data['teststdin'] ?? [] as $i => $stdin) {
            $expected = grader::unix((string) ($data['testexpected'][$i] ?? ''));
            if ($expected !== '') {
                $tests[$i] = ['stdin' => grader::unix((string) $stdin), 'expected' => $expected, 'hidden' => false,
                    'weight' => 1.0];
            }
        }
        if (!$tests) {
            return $none;
        }
        $program = grader::program(
            (string) ($data['prefix'] ?? ''),
            (string) $data['solution'],
            (string) ($data['suffix'] ?? '')
        );
        $grader = $grader ?? new grader(self::jobe_for((object) $data));
        $results = $grader->run_tests(
            (string) ($data['language'] ?? 'c'),
            $program,
            array_values($tests),
            self::comparison((object) $data),
            self::tolerance($data['tolerance'] ?? null)
        );
        // A server that is down must not keep the teacher from saving.
        if (grader::sandbox_failed($results)) {
            return $none;
        }
        if (($results[0]['status'] ?? '') === 'compile') {
            return ['compile' => (string) $results[0]['cmpinfo'], 'failed' => []];
        }
        $failed = [];
        foreach (array_keys($tests) as $n => $i) {
            if (empty($results[$n]['passed'])) {
                $r = $results[$n];
                $failed[$i] = $r['status'] === 'ok' ? $r['got'] : trim($r['got'] . "\n" . $r['stderr']);
            }
        }
        return ['compile' => null, 'failed' => $failed];
    }

    /**
     * The comparison of a question or of form data. Data from before 0.6.0 (scripts, old exports) has ignorespaces.
     *
     * @param stdClass $data
     * @return string one of grader::COMPARISONS
     */
    public static function comparison($data): string {
        if (isset($data->comparison) && in_array($data->comparison, grader::COMPARISONS, true)) {
            return $data->comparison;
        }
        return isset($data->ignorespaces) && empty($data->ignorespaces) ? 'exact' : 'spaces';
    }

    /**
     * A time or memory limit: a whole number of at least 0 (0 or empty keeps the default).
     *
     * @param mixed $value
     * @return int
     */
    public static function limit($value): int {
        return is_numeric($value) && (int) $value > 0 ? (int) $value : 0;
    }

    /**
     * Jobe client with the limits of a question or of form data, or null for the default client.
     *
     * @param stdClass $data
     * @return \tiny_codelab\local\jobe|null
     */
    protected static function jobe_for($data): ?\tiny_codelab\local\jobe {
        return question_jobe::for_limits(self::limit($data->cputime ?? 0), self::limit($data->memorylimit ?? 0));
    }

    /**
     * The tolerance of the comparison numbers: a number of at least 0, the default when it is not given.
     *
     * @param mixed $value
     * @return float
     */
    public static function tolerance($value): float {
        return is_numeric($value) && (float) $value >= 0 ? (float) $value : grader::TOLERANCE;
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
        $question->comparison = self::comparison($questiondata->options);
        $question->tolerance = self::tolerance($questiondata->options->tolerance ?? null);
        $question->cputime = self::limit($questiondata->options->cputime ?? 0);
        $question->memorylimit = self::limit($questiondata->options->memorylimit ?? 0);
        $question->noassist = !empty($questiondata->options->noassist);
    }
}
