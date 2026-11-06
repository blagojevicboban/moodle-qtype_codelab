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
 * CodeLab question renderer.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use qtype_codelab\local\grader;

/**
 * Renders the question text, the code editor (a text area that qtype_codelab/attempt turns into a Monaco editor) and,
 * in the feedback, the results of the tests.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_codelab_renderer extends qtype_renderer {
    /**
     * Generate the display of the question formulation and the response controls.
     *
     * @param question_attempt $qa the attempt
     * @param question_display_options $options display options
     * @return string HTML
     */
    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {
        $question = $qa->get_question();
        $inputname = $qa->get_qt_field_name('answer');
        $answer = $qa->get_last_qt_var('answer');
        if ($answer === null) {
            $answer = (string) $question->template;
        }
        $langname = get_string('lang_' . $question->language, 'qtype_codelab');

        $result = html_writer::tag('div', $question->format_questiontext($qa), ['class' => 'qtext']);
        $attrs = [
            'name' => $inputname,
            'id' => $inputname,
            'class' => 'qtype_codelab_answer form-control font-monospace',
            'rows' => 15,
            'spellcheck' => 'false',
        ];
        if ($options->readonly) {
            $attrs['readonly'] = 'readonly';
        }
        $label = html_writer::label(get_string('answerlabel', 'qtype_codelab', $langname), $inputname);
        $result .= html_writer::div(
            $label . html_writer::tag('textarea', s($answer), $attrs),
            'ablock qtype_codelab-answer',
            ['id' => $inputname . '_codelab']
        );

        if ($qa->get_state() == question_state::$invalid) {
            $result .= html_writer::nonempty_tag(
                'div',
                $question->get_validation_error(['answer' => $answer]),
                ['class' => 'validationerror']
            );
        }

        // Only the tests that are not hidden reach the browser.
        $tests = [];
        if ($question->showtests && !$options->readonly) {
            foreach ($question->tests as $tc) {
                if (!$tc['hidden']) {
                    $tests[] = ['stdin' => $tc['stdin'], 'expected' => $tc['expected']];
                }
            }
        }
        $this->page->requires->js_call_amd('qtype_codelab/attempt', 'init', [[
            'textareaid' => $inputname,
            'lang' => $question->language,
            'readonly' => (bool) $options->readonly,
            'noassist' => (bool) $question->noassist,
            'prefix' => (string) $question->prefix,
            'suffix' => (string) $question->suffix,
            'tests' => $tests,
            'ignorespaces' => (bool) $question->ignorespaces,
            'contextid' => $options->context->id,
            // Run and Step of a Python answer in the browser; the tests and the grade still come from Jobe.
            'pyodide' => \tiny_codelab\local\runtime::config()['pyodide'],
        ]]);
        return $result;
    }

    /**
     * Results of the tests: visible tests with their input, expected and actual output; hidden tests only passed or not.
     *
     * @param question_attempt $qa
     * @return string HTML
     */
    public function specific_feedback(question_attempt $qa) {
        $question = $qa->get_question();
        $answer = $qa->get_last_qt_var('answer');
        if (!$question->has_tests() || $answer === null || trim($answer) === '') {
            return '';
        }
        $results = $question->test_results(['answer' => $answer]);
        if (grader::sandbox_failed($results)) {
            return html_writer::div(get_string('sandboxfailed', 'qtype_codelab'), 'qtype_codelab-sandbox alert alert-warning');
        }
        $out = '';
        if (($results[0]['status'] ?? '') === 'compile') {
            $out .= html_writer::div(get_string('compileerror', 'qtype_codelab'), 'qtype_codelab-compile fw-bold');
            $out .= html_writer::tag('pre', s($results[0]['cmpinfo']), ['class' => 'qtype_codelab-cmpinfo']);
            return $out;
        }
        $passed = count(array_filter($results, fn($r) => $r['passed']));
        $out .= html_writer::div(
            get_string('testsummary', 'qtype_codelab', ['passed' => $passed, 'total' => count($results)]),
            'qtype_codelab-summary fw-bold mb-2'
        );

        $table = new html_table();
        $table->attributes['class'] = 'generaltable qtype_codelab-results';
        $table->head = [get_string('test', 'qtype_codelab'), get_string('teststdin', 'qtype_codelab'),
            get_string('testexpected', 'qtype_codelab'), get_string('testgot', 'qtype_codelab'), ''];
        foreach ($question->tests as $i => $tc) {
            $r = $results[$i] ?? ['passed' => false, 'got' => '', 'status' => 'error', 'stderr' => ''];
            $mark = $r['passed']
                ? html_writer::span(get_string('passed', 'qtype_codelab'), 'badge bg-success')
                : html_writer::span(get_string('failed', 'qtype_codelab'), 'badge bg-danger');
            if ($tc['hidden']) {
                $cell = html_writer::span(get_string('hiddentest', 'qtype_codelab'), 'text-muted');
                $table->data[] = [$i + 1, $cell, '', '', $mark];
                continue;
            }
            $got = $r['got'];
            if ($r['status'] !== 'ok') {
                $got .= ($got === '' ? '' : "\n") . get_string('status_' . $r['status'], 'tiny_codelab') .
                    ($r['stderr'] !== '' ? "\n" . $r['stderr'] : '');
            }
            $table->data[] = [$i + 1, html_writer::tag('pre', s($tc['stdin'])), html_writer::tag('pre', s($tc['expected'])),
                html_writer::tag('pre', s($got)), $mark];
        }
        return $out . html_writer::table($table);
    }

    /**
     * The teacher's solution, when there is one.
     *
     * @param question_attempt $qa
     * @return string HTML
     */
    public function correct_response(question_attempt $qa) {
        $question = $qa->get_question();
        if (trim((string) $question->solution) === '') {
            return '';
        }
        return html_writer::div(get_string('solutionis', 'qtype_codelab'), 'mb-1') .
            html_writer::tag('pre', s($question->solution), ['class' => 'qtype_codelab-solution']);
    }
}
