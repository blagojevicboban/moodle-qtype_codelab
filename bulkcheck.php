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
 * Check the solutions of all CodeLab questions in the question banks of a course: each solution is run on Jobe on the
 * tests of its question, one by one, and the questions whose solution fails or that have none are listed.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/questionlib.php');

use qtype_codelab\local\bulk_checker;

$courseid = required_param('courseid', PARAM_INT);
$run = optional_param('run', 0, PARAM_BOOL);

$course = get_course($courseid);
require_login($course);
$context = context_course::instance($course->id);
require_capability('moodle/question:editall', $context);

$url = new moodle_url('/question/type/codelab/bulkcheck.php', ['courseid' => $course->id]);
$PAGE->set_url($url);
$PAGE->set_context($context);
$PAGE->set_pagelayout('report');
$title = get_string('bulkcheck', 'qtype_codelab');
$PAGE->set_title($title);
$PAGE->set_heading($course->fullname);

$questions = bulk_checker::find_questions($course->id);

echo $OUTPUT->header();
echo $OUTPUT->heading($title);

if (!$questions) {
    echo $OUTPUT->notification(get_string('bulkcheck_none', 'qtype_codelab'), 'info');
    echo $OUTPUT->footer();
    die();
}

if (!$run || !confirm_sesskey()) {
    echo html_writer::tag('p', get_string('bulkcheck_intro', 'qtype_codelab', count($questions)));
    echo $OUTPUT->single_button(
        new moodle_url($url, ['run' => 1]),
        get_string('bulkcheck_start', 'qtype_codelab'),
        'post',
        ['type' => single_button::BUTTON_PRIMARY]
    );
    echo $OUTPUT->footer();
    die();
}

core_php_time_limit::raise();
\core\session\manager::write_close();
$progress = new progress_bar('qtype_codelab_bulkcheck', 500, true);
$rows = [];
$total = count($questions);
foreach ($questions as $n => $record) {
    $progress->update_full(100 * $n / $total, get_string(
        'bulkcheck_progress',
        'qtype_codelab',
        ['done' => $n + 1, 'total' => $total, 'name' => format_string($record->name)]
    ));
    $language = '';
    try {
        $question = question_bank::load_question($record->id);
        $language = $question->language;
        $check = bulk_checker::check($question);
    } catch (Throwable $e) {
        $check = ['status' => 'jobe', 'passed' => 0, 'total' => 0, 'detail' => $e->getMessage()];
    }
    $rows[] = [$record, $check, $language];
}
$progress->update_full(100, get_string('bulkcheck_finished', 'qtype_codelab'));

// Problems first, in the order of bulk_checker::STATUSES; the same status in the order of the banks.
$order = array_flip(bulk_checker::STATUSES);
usort($rows, fn($a, $b) => $order[$a[1]['status']] <=> $order[$b[1]['status']]);
$ok = count(array_filter($rows, fn($r) => $r[1]['status'] === 'ok'));
echo $OUTPUT->notification(
    get_string('bulkcheck_done', 'qtype_codelab', ['total' => $total, 'ok' => $ok, 'problems' => $total - $ok]),
    $ok === $total ? 'success' : 'warning'
);

$table = new html_table();
$table->attributes['class'] = 'generaltable qtype_codelab-bulkcheck';
$table->head = [get_string('question'), get_string('bulkcheck_bank', 'qtype_codelab'),
    get_string('language', 'qtype_codelab'), get_string('bulkcheck_result', 'qtype_codelab')];
$badges = ['ok' => 'bg-success', 'failed' => 'bg-danger', 'compile' => 'bg-danger', 'jobe' => 'bg-warning text-dark',
    'nosolution' => 'bg-secondary', 'notests' => 'bg-secondary'];
$banks = [];
foreach ($rows as [$record, $check, $language]) {
    if (!isset($banks[$record->contextid])) {
        $banks[$record->contextid] = context::instance_by_id($record->contextid)->get_context_name(false, true);
    }
    $result = html_writer::span(
        get_string('check_' . $check['status'], 'qtype_codelab', (object) $check),
        'badge ' . $badges[$check['status']]
    );
    if ($check['detail'] !== '') {
        $result .= html_writer::tag('pre', s(core_text::substr($check['detail'], 0, 1000)), ['class' => 'small mt-1 mb-0']);
    }
    $table->data[] = [
        html_writer::link(bulk_checker::edit_url($record, $course->id), format_string($record->name)),
        s($banks[$record->contextid]) . html_writer::div(format_string($record->category), 'small text-muted'),
        $language === '' ? '' : get_string('lang_' . $language, 'qtype_codelab'),
        $result,
    ];
}
echo html_writer::table($table);
echo html_writer::div(
    $OUTPUT->single_button(new moodle_url($url, ['run' => 1]), get_string('bulkcheck_again', 'qtype_codelab')),
    'mt-3'
);
echo $OUTPUT->footer();
