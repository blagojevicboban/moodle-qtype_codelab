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

    return true;
}
