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
 * Defines the editing form for the CodeLab question type.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use qtype_codelab\local\grader;
use qtype_codelab\local\question_jobe;

/**
 * CodeLab question editing form: the language, the code (starting code, solution, hidden code before and after) and
 * the tests. The code fields become code editors (qtype_codelab/edit).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_codelab_edit_form extends question_edit_form {
    /** Number of empty tests on a new question. */
    const START_TESTS = 3;

    /**
     * Add question-type specific form fields.
     *
     * @param MoodleQuickForm $mform the form being built
     */
    protected function definition_inner($mform) {
        global $PAGE;
        $mform->addElement('header', 'codelabheader', get_string('codeheader', 'qtype_codelab'));
        $mform->setExpanded('codelabheader');
        // The languages that can run on this site, and the language of the question being edited.
        $current = $this->question->options->language ?? null;
        $languages = qtype_codelab::language_options($current);
        $mform->addElement('select', 'language', get_string('language', 'qtype_codelab'), $languages);
        $mform->setDefault('language', 'c');

        // The module qtype_codelab/edit turns these fields into code editors (found by their ids).
        $code = ['rows' => 10, 'cols' => 80, 'spellcheck' => 'false'];
        foreach (['template', 'solution', 'prefix', 'suffix'] as $field) {
            $mform->addElement('textarea', $field, get_string($field, 'qtype_codelab'), $code);
            $mform->setType($field, PARAM_RAW);
            $mform->addHelpButton($field, $field, 'qtype_codelab');
        }
        $mform->setAdvanced('prefix');
        $mform->setAdvanced('suffix');
        $mform->addElement(
            'advcheckbox',
            'noassist',
            get_string('assist', 'qtype_codelab'),
            get_string('noassist', 'qtype_codelab')
        );

        $mform->addElement('header', 'testsheader', get_string('tests', 'qtype_codelab'));
        $mform->setExpanded('testsheader');
        $mform->addElement('static', 'testsnote', '', get_string('tests_desc', 'qtype_codelab'));
        $repeated = [
            $mform->createElement(
                'textarea',
                'testcode',
                get_string('testcoden', 'qtype_codelab'),
                ['rows' => 2, 'cols' => 60, 'spellcheck' => 'false', 'class' => 'font-monospace']
            ),
            $mform->createElement(
                'textarea',
                'teststdin',
                get_string('testinputn', 'qtype_codelab'),
                ['rows' => 3, 'cols' => 60, 'spellcheck' => 'false']
            ),
            $mform->createElement(
                'textarea',
                'testexpected',
                get_string('testexpected', 'qtype_codelab'),
                ['rows' => 3, 'cols' => 60, 'spellcheck' => 'false']
            ),
            $mform->createElement('group', 'testoptions', '', [
                $mform->createElement('advcheckbox', 'testhidden', '', get_string('testhidden', 'qtype_codelab')),
                $mform->createElement('text', 'testweight', get_string('testweight', 'qtype_codelab'), ['size' => 4]),
            ], ' ', false),
        ];
        $options = [
            'testcode' => ['type' => PARAM_RAW, 'helpbutton' => ['testcode', 'qtype_codelab']],
            'teststdin' => ['type' => PARAM_RAW],
            'testexpected' => ['type' => PARAM_RAW],
            // No default here: it would win over the saved weights; data_preprocessing() fills in 1.
            'testweight' => ['type' => PARAM_FLOAT],
        ];
        $count = max(self::START_TESTS, count($this->question->options->testlist ?? []) + 1);
        $this->repeat_elements(
            $repeated,
            $count,
            $options,
            'testcount',
            'addtests',
            2,
            get_string('addtests', 'qtype_codelab'),
            true
        );

        $mform->addElement(
            'advcheckbox',
            'showtests',
            get_string('showtests', 'qtype_codelab'),
            get_string('showtests_desc', 'qtype_codelab')
        );
        $mform->setDefault('showtests', 1);
        $comparisons = [];
        foreach (grader::COMPARISONS as $comparison) {
            $comparisons[$comparison] = get_string('comparison_' . $comparison, 'qtype_codelab');
        }
        $mform->addElement('select', 'comparison', get_string('compare', 'qtype_codelab'), $comparisons);
        $mform->setDefault('comparison', 'spaces');
        $mform->addHelpButton('comparison', 'compare', 'qtype_codelab');
        $mform->addElement('text', 'tolerance', get_string('tolerance', 'qtype_codelab'), ['size' => 8]);
        $mform->setType('tolerance', PARAM_RAW_TRIMMED);
        $mform->setDefault('tolerance', grader::TOLERANCE);
        $mform->addHelpButton('tolerance', 'tolerance', 'qtype_codelab');
        $mform->hideIf('tolerance', 'comparison', 'neq', 'numbers');

        // Limits for this question; empty keeps the defaults of the site and of Jobe.
        $limits = (object) ['cputime' => question_jobe::max_cputime(), 'memorylimit' => question_jobe::max_memory()];
        foreach (['cputime', 'memorylimit'] as $field) {
            $mform->addElement('text', $field, get_string($field, 'qtype_codelab'), ['size' => 6]);
            $mform->setType($field, PARAM_RAW_TRIMMED);
            $mform->addHelpButton($field, $field, 'qtype_codelab', '', false, $limits->$field);
            $mform->setAdvanced($field);
        }

        // Not saved with the question: only for this save.
        $mform->addElement(
            'advcheckbox',
            'savefailing',
            get_string('solutioncheck', 'qtype_codelab'),
            get_string('savefailing', 'qtype_codelab')
        );
        $mform->addHelpButton('savefailing', 'solutioncheck', 'qtype_codelab');

        $this->add_interactive_settings();
        $PAGE->requires->js_call_amd('qtype_codelab/edit', 'init');
    }

    /**
     * Put the saved tests into the repeated fields.
     *
     * @param stdClass $question
     * @return stdClass
     */
    protected function data_preprocessing($question) {
        $question = parent::data_preprocessing($question);
        $question = $this->data_preprocessing_hints($question);
        foreach ($question->options->testlist ?? [] as $i => $tc) {
            $question->teststdin[$i] = $tc['stdin'];
            $question->testexpected[$i] = $tc['expected'];
            $question->testcode[$i] = $tc['code'];
            $question->testhidden[$i] = $tc['hidden'] ? 1 : 0;
            $question->testweight[$i] = $tc['weight'];
        }
        // A limit of 0 is shown as empty: the default.
        foreach (['cputime', 'memorylimit'] as $field) {
            if (empty($question->options->$field)) {
                $question->$field = '';
            } else {
                $question->$field = (int) $question->options->$field;
            }
        }
        // Empty tests (and those added with the button) start with weight 1.
        $count = max(self::START_TESTS, count($question->options->testlist ?? []) + 1) + 20;
        for ($i = 0; $i < $count; $i++) {
            if (!isset($question->testweight[$i])) {
                $question->testweight[$i] = 1;
            }
        }
        return $question;
    }

    /**
     * Every test needs an expected output, unless there is a solution to compute it from.
     *
     * @param array $data
     * @param array $files
     * @return array errors
     */
    public function validation($data, $files) {
        $errors = parent::validation($data, $files);
        $hassolution = trim((string) ($data['solution'] ?? '')) !== '';
        $regex = ($data['comparison'] ?? '') === 'regex';
        foreach ($data['teststdin'] ?? [] as $i => $stdin) {
            $expected = (string) ($data['testexpected'][$i] ?? '');
            $used = trim((string) $stdin) !== '' || trim((string) ($data['testcode'][$i] ?? '')) !== '';
            if ($used && $expected === '' && !$hassolution) {
                $errors["testexpected[$i]"] = get_string('noexpected', 'qtype_codelab');
            } else if ($regex && $expected !== '' && !grader::regex_valid($expected)) {
                $errors["testexpected[$i]"] = get_string('badregex', 'qtype_codelab');
            }
        }
        $tolerance = trim((string) ($data['tolerance'] ?? ''));
        $badtolerance = $tolerance !== '' && (!is_numeric($tolerance) || (float) $tolerance < 0);
        if (($data['comparison'] ?? '') === 'numbers' && $badtolerance) {
            $errors['tolerance'] = get_string('badtolerance', 'qtype_codelab');
        }

        $max = ['cputime' => question_jobe::max_cputime(), 'memorylimit' => question_jobe::max_memory()];
        foreach ($max as $field => $limit) {
            $value = trim((string) ($data[$field] ?? ''));
            if ($value !== '' && (!ctype_digit($value) || (int) $value < 1 || (int) $value > $limit)) {
                $errors[$field] = get_string('badlimit', 'qtype_codelab', $limit);
            }
        }

        // The solution must pass the tests; it runs on Jobe only when the rest of the form is right.
        if (!$errors && empty($data['savefailing'])) {
            $check = qtype_codelab::check_solution($data);
            if ($check['compile'] !== null) {
                $errors['solution'] = get_string(
                    'solutionnocompile',
                    'qtype_codelab',
                    s(core_text::substr($check['compile'], 0, 1000))
                );
            }
            foreach ($check['failed'] as $i => $got) {
                $errors["testexpected[$i]"] = get_string('solutionfails', 'qtype_codelab', s(core_text::substr($got, 0, 300)));
            }
        }
        return $errors;
    }

    /**
     * The question type name.
     *
     * @return string
     */
    public function qtype() {
        return 'codelab';
    }
}
