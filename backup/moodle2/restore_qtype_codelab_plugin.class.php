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
 * Restore of CodeLab questions.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/backup/moodle2/restore_qtype_extrafields_plugin.class.php');

/**
 * Restores the options of CodeLab questions.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class restore_qtype_codelab_plugin extends restore_qtype_extrafields_plugin {
    /**
     * Process the qtype/codelab element.
     *
     * @param array $data the options
     */
    public function process_codelab($data) {
        // Backups from before 0.6.0 have ignorespaces instead of comparison and tolerance.
        $data = (array) $data;
        if (!isset($data['comparison'])) {
            $data['comparison'] = empty($data['ignorespaces']) && isset($data['ignorespaces']) ? 'exact' : 'spaces';
        }
        $data['tolerance'] = $data['tolerance'] ?? \qtype_codelab\local\grader::TOLERANCE;
        unset($data['ignorespaces']);
        // Backups from before 0.6.0 have no limits: the defaults.
        $data['cputime'] = $data['cputime'] ?? 0;
        $data['memorylimit'] = $data['memorylimit'] ?? 0;
        $this->really_process_extra_question_fields($data);
    }
}
