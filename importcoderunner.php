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
 * Import CodeRunner Moodle XML questions directly into the course question bank as CodeLab questions.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__ . '/../../../config.php');
require_once($CFG->libdir . '/questionlib.php');
require_once($CFG->dirroot . '/question/format.php');
require_once($CFG->dirroot . '/question/format/xml/format.php');

use qtype_codelab\local\coderunner_importer;

$courseid = required_param('courseid', PARAM_INT);

$course = get_course($courseid);
require_login($course);
$context = context_course::instance($course->id);
require_capability('moodle/question:add', $context);

$url = new moodle_url('/question/type/codelab/importcoderunner.php', ['courseid' => $course->id]);
$PAGE->set_url($url);
$PAGE->set_context($context);
$PAGE->set_pagelayout('report');
$title = get_string('importcr', 'qtype_codelab');
$PAGE->set_title($title);
$PAGE->set_heading($course->fullname);

$defaultcat = question_get_default_category($context->id, true);
$categories = $DB->get_records_menu('question_categories', ['contextid' => $context->id], 'parent, name', 'id, name');

echo $OUTPUT->header();
echo $OUTPUT->heading($title);
echo html_writer::tag('p', get_string('importcr_intro', 'qtype_codelab'));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && confirm_sesskey() && !empty($_FILES['xmlfile']['tmp_name'])) {
    $catid = required_param('categoryid', PARAM_INT);
    $category = $DB->get_record('question_categories', ['id' => $catid, 'contextid' => $context->id], '*', MUST_EXIST);
    $raw = file_get_contents($_FILES['xmlfile']['tmp_name']);
    $result = coderunner_importer::convert_xml((string) $raw);

    if ($result['error'] !== null) {
        echo $OUTPUT->notification(get_string('importcr_invalid', 'qtype_codelab'), 'error');
    } else if (empty($result['converted'])) {
        echo $OUTPUT->notification(get_string('importcr_none', 'qtype_codelab'), 'warning');
    } else {
        $tmp = make_request_directory() . '/codelab-import.xml';
        file_put_contents($tmp, $result['xml']);

        $qformat = new qformat_xml();
        $qformat->setCategory($category);
        $qformat->setContexts([$context]);
        $qformat->setCourse($course);
        $qformat->setFilename($tmp);
        $qformat->setRealfilename('codelab-import.xml');
        $qformat->setMatchgrades('nearest');
        $qformat->setCatfromfile(false);
        $qformat->setContextfromfile(false);
        $qformat->setStoponerror(false);

        ob_start();
        $ok = $qformat->importpreprocess() && $qformat->importprocess() && $qformat->importpostprocess();
        ob_end_clean();

        $counts = (object) ['converted' => count($result['converted']), 'skipped' => count($result['skipped'])];
        echo $OUTPUT->notification(
            get_string($ok ? 'importcr_done' : 'importcr_failed', 'qtype_codelab', $counts),
            $ok ? 'success' : 'error'
        );

        $table = new html_table();
        $table->head = [
            get_string('name'),
            get_string('language', 'qtype_codelab'),
            get_string('tests', 'qtype_codelab'),
        ];
        foreach ($result['converted'] as $item) {
            $table->data[] = [s($item['name']), s($item['language']), (int) $item['tests']];
        }
        echo html_writer::table($table);
    }

    if (!empty($result['skipped'])) {
        echo html_writer::tag('h4', get_string('importcr_skipped', 'qtype_codelab'));
        $skiptable = new html_table();
        $skiptable->head = [
            get_string('name'),
            get_string('importcr_type', 'qtype_codelab'),
            get_string('importcr_reason', 'qtype_codelab'),
        ];
        foreach ($result['skipped'] as $item) {
            $skiptable->data[] = [s($item['name']), s($item['type']), s($item['reason'])];
        }
        echo html_writer::table($skiptable);
    }
}

$form = html_writer::start_tag('form', [
    'method' => 'post',
    'action' => $url->out(false),
    'enctype' => 'multipart/form-data',
    'class' => 'mt-3',
]);
$form .= html_writer::empty_tag('input', ['type' => 'hidden', 'name' => 'sesskey', 'value' => sesskey()]);
$form .= html_writer::start_div('mb-3');
$form .= html_writer::label(get_string('importcr_category', 'qtype_codelab'), 'id_categoryid', true, ['class' => 'form-label']);
$form .= html_writer::select($categories, 'categoryid', $defaultcat->id, false, ['id' => 'id_categoryid', 'class' => 'form-select']);
$form .= html_writer::end_div();
$form .= html_writer::start_div('mb-3');
$form .= html_writer::label(get_string('importcr_file', 'qtype_codelab'), 'id_xmlfile', true, ['class' => 'form-label']);
$form .= html_writer::empty_tag('input', [
    'type' => 'file',
    'name' => 'xmlfile',
    'id' => 'id_xmlfile',
    'accept' => '.xml,application/xml,text/xml',
    'required' => 'required',
    'class' => 'form-control',
]);
$form .= html_writer::end_div();
$form .= html_writer::tag('button', get_string('importcr_submit', 'qtype_codelab'), [
    'type' => 'submit',
    'class' => 'btn btn-primary',
]);
$form .= html_writer::end_tag('form');

echo $form;
echo $OUTPUT->footer();
