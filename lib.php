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
 * Callbacks of the CodeLab question type.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Add the check of the solutions of CodeLab questions to the course menu (More), for those who can edit the questions.
 *
 * @param navigation_node $navigation the course administration node
 * @param stdClass $course
 * @param context $context the course context
 */
function qtype_codelab_extend_navigation_course(navigation_node $navigation, stdClass $course, context $context): void {
    if ($course->id == SITEID || !has_capability('moodle/question:editall', $context)) {
        return;
    }
    $navigation->add(
        get_string('bulkcheck', 'qtype_codelab'),
        new moodle_url('/question/type/codelab/bulkcheck.php', ['courseid' => $course->id]),
        navigation_node::TYPE_SETTING,
        null,
        'qtype_codelab_bulkcheck',
        new pix_icon('i/checkpermissions', '')
    );
}
