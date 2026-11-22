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
 * Privacy provider: answers are sent to Jobe or the CodeLab runner to be run, Python may run in the browser (Pyodide);
 * answers are kept by the question engine.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace qtype_codelab\privacy;

use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\contextlist;
use core_privacy\local\request\userlist;

/**
 * Privacy provider: answers are sent to Jobe or the CodeLab runner to be run, Python may run in the browser (Pyodide);
 * answers are kept by the question engine.
 *
 * @package    qtype_codelab
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements
    \core_privacy\local\metadata\provider,
    \core_privacy\local\request\core_userlist_provider,
    \core_privacy\local\request\plugin\provider {
    /**
     * Data sent outside Moodle.
     *
     * @param collection $collection
     * @return collection
     */
    public static function get_metadata(collection $collection): collection {
        $collection->add_external_location_link('jobe', [
            'code' => 'privacy:metadata:jobe:code',
            'stdin' => 'privacy:metadata:jobe:stdin',
        ], 'privacy:metadata:jobe');
        // The CodeLab runner, when the site has one: grading on it (SQL always, other languages when it is the server
        // for running and grading), and Run in the attempt, where the browser sends the program and the typed input.
        $collection->add_external_location_link('runner', [
            'userid' => 'privacy:metadata:runner:userid',
            'code' => 'privacy:metadata:runner:code',
            'stdin' => 'privacy:metadata:runner:stdin',
        ], 'privacy:metadata:runner');
        // Python in the attempt runs in the browser, which loads Pyodide from the address in the settings.
        $collection->add_external_location_link('pyodide', [
            'ipaddress' => 'privacy:metadata:pyodide:ipaddress',
        ], 'privacy:metadata:pyodide');
        return $collection;
    }

    /**
     * No data is stored in Moodle.
     *
     * @param int $userid
     * @return contextlist
     */
    public static function get_contexts_for_userid(int $userid): contextlist {
        return new contextlist();
    }

    /**
     * No data is stored in Moodle.
     *
     * @param userlist $userlist
     */
    public static function get_users_in_context(userlist $userlist) {
    }

    /**
     * No data is stored in Moodle.
     *
     * @param approved_contextlist $contextlist
     */
    public static function export_user_data(approved_contextlist $contextlist) {
    }

    /**
     * No data is stored in Moodle.
     *
     * @param \context $context
     */
    public static function delete_data_for_all_users_in_context(\context $context) {
    }

    /**
     * No data is stored in Moodle.
     *
     * @param approved_contextlist $contextlist
     */
    public static function delete_data_for_user(approved_contextlist $contextlist) {
    }

    /**
     * No data is stored in Moodle.
     *
     * @param approved_userlist $userlist
     */
    public static function delete_data_for_users(approved_userlist $userlist) {
    }
}
