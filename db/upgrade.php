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
 * Upgrade steps of the CodeLab question type.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Upgrade the CodeLab question type.
 *
 * @param int $oldversion the version being upgraded from
 * @return bool
 */
function xmldb_qtype_codelab_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();

    if ($oldversion < 2026110800) {
        // The checkbox ignorespaces becomes the comparison spaces (on) or exact (off); numbers get a tolerance.
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('comparison', XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, 'spaces', 'showtests');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $field = new xmldb_field('tolerance', XMLDB_TYPE_NUMBER, '20, 10', null, XMLDB_NOTNULL, null, '0.001', 'comparison');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $field = new xmldb_field('ignorespaces');
        if ($dbman->field_exists($table, $field)) {
            $DB->set_field('qtype_codelab_options', 'comparison', 'exact', ['ignorespaces' => 0]);
            $dbman->drop_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026110800, 'qtype', 'codelab');
    }

    if ($oldversion < 2026110801) {
        // Time and memory limits per question; 0 keeps the defaults.
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('cputime', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0', 'tolerance');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $field = new xmldb_field('memorylimit', XMLDB_TYPE_INTEGER, '6', null, XMLDB_NOTNULL, null, '0', 'cputime');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026110801, 'qtype', 'codelab');
    }

    if ($oldversion < 2026111900) {
        // Parsons problems: the lines of the solution put in order, with distractor lines.
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('parsons', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, '0', 'noassist');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        $field = new xmldb_field('distractors', XMLDB_TYPE_TEXT, null, null, null, null, null, 'parsons');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026111900, 'qtype', 'codelab');
    }

    if ($oldversion < 2026112900) {
        // AI explanations of errors per question (tiny_codelab 1.19), also in a quiz.
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('aihints', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, '0', 'distractors');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026112900, 'qtype', 'codelab');
    }

    if ($oldversion < 2026112903) {
        // Time limit per test, for the time the CodeLab runner reports (0.9.0); 0 for none.
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('timelimit', XMLDB_TYPE_NUMBER, '5, 2', null, XMLDB_NOTNULL, null, '0', 'aihints');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026112903, 'qtype', 'codelab');
    }

    if ($oldversion < 2026112904) {
        // Check order of a Parsons problem: 0 off, 1 on, 2 on with a part of the mark for the order.
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('ordercheck', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, '0', 'timelimit');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026112904, 'qtype', 'codelab');
    }

    if ($oldversion < 2026112905) {
        // Input files placed in the working folder before each run (JSON list of name and text).
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('files', XMLDB_TYPE_TEXT, null, null, null, null, null, 'ordercheck');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026112905, 'qtype', 'codelab');
    }

    if ($oldversion < 2026112906) {
        // Parsons fill-in gaps: number of expressions hidden as gaps (0..10).
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('gaps', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, '0', 'files');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026112906, 'qtype', 'codelab');
    }

    if ($oldversion < 2026113001) {
        // C/C++ compiler profile and language standard.
        $table = new xmldb_table('qtype_codelab_options');
        $compiler = new xmldb_field('compiler', XMLDB_TYPE_CHAR, '20', null, XMLDB_NOTNULL, null, null, 'gaps');
        if (!$dbman->field_exists($table, $compiler)) {
            $dbman->add_field($table, $compiler);
        }
        $std = new xmldb_field('std', XMLDB_TYPE_CHAR, '20', null, XMLDB_NOTNULL, null, null, 'compiler');
        if (!$dbman->field_exists($table, $std)) {
            $dbman->add_field($table, $std);
        }
        upgrade_plugin_savepoint(true, 2026113001, 'qtype', 'codelab');
    }

    if ($oldversion < 2026120300) {
        // Code constraints (JSON: forbid, require, penalty).
        $table = new xmldb_table('qtype_codelab_options');
        $field = new xmldb_field('rules', XMLDB_TYPE_TEXT, null, null, null, null, null, 'std');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2026120300, 'qtype', 'codelab');
    }

    return true;
}
