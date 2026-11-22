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
 * Web services of qtype_codelab: the class work of a question in a quiz (answers and their analysis), for teachers.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$functions = [
    'qtype_codelab_get_class_answers' => [
        'classname' => \qtype_codelab\external\get_class_answers::class,
        'description' => 'The last answer of every student to a CodeLab question in a quiz (class work of the teacher).',
        'type' => 'read',
        'ajax' => true,
        'capabilities' => 'mod/quiz:viewreports',
    ],
    'qtype_codelab_get_class_analysis' => [
        'classname' => \qtype_codelab\external\get_class_analysis::class,
        'description' => 'Analysis of the class answers to a CodeLab question in a quiz: tests passed, wrong outputs, errors.',
        'type' => 'read',
        'ajax' => true,
        'capabilities' => 'mod/quiz:viewreports',
    ],
];
