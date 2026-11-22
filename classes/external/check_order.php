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

namespace qtype_codelab\external;

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_single_structure;
use core_external\external_value;
use qtype_codelab\local\order;

/**
 * Check order of a Parsons problem in an attempt: how many lines are in their place, never which.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class check_order extends external_api {
    /**
     * Parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
            'usageid' => new external_value(PARAM_INT, 'The question usage of the attempt'),
            'slot' => new external_value(PARAM_INT, 'The slot of the question'),
            'answer' => new external_value(PARAM_RAW, 'The program made of the lines, as the student has them now'),
        ]);
    }

    /**
     * Count the lines in their place.
     *
     * Only the student of a quiz attempt in progress, or someone who previews the question, may ask; the question must
     * be a Parsons problem with Check order on, and not finished.
     *
     * @param int $usageid
     * @param int $slot
     * @param string $answer
     * @return array placed and total
     */
    public static function execute(int $usageid, int $slot, string $answer): array {
        global $CFG, $DB, $USER;
        require_once($CFG->dirroot . '/question/engine/lib.php');
        require_once($CFG->dirroot . '/question/type/codelab/question.php');
        $params = self::validate_parameters(
            self::execute_parameters(),
            ['usageid' => $usageid, 'slot' => $slot, 'answer' => $answer]
        );
        $quba = \question_engine::load_questions_usage_by_activity($params['usageid']);
        self::validate_context($quba->get_owning_context());

        // The owner of a quiz attempt in progress, or of a question preview.
        if ($quba->get_owning_component() === 'mod_quiz') {
            $attempt = $DB->get_record('quiz_attempts', ['uniqueid' => $quba->get_id()], 'id, userid, state');
            if (!$attempt || (int) $attempt->userid !== (int) $USER->id || $attempt->state !== 'inprogress') {
                throw new \moodle_exception('nopermissions', 'error', '', 'check order');
            }
        } else if ($quba->get_owning_component() === 'core_question_preview') {
            require_capability('moodle/question:usemine', $quba->get_owning_context());
        } else {
            throw new \moodle_exception('nopermissions', 'error', '', 'check order');
        }
        $qa = $quba->get_question_attempt($params['slot']);
        $question = $qa->get_question(false);
        $allowed = $question instanceof \qtype_codelab_question && $question->parsons
            && (int) $question->ordercheck !== order::OFF;
        if (!$allowed || $qa->get_state()->is_finished()) {
            throw new \moodle_exception('nopermissions', 'error', '', 'check order');
        }
        $seed = $params['usageid'] . '/' . $params['slot'];
        return order::check(
            $params['answer'],
            (string) $question->solution,
            (string) $question->language,
            (int) $question->gaps,
            $seed
        );
    }

    /**
     * Result: only the number of lines in their place.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'placed' => new external_value(PARAM_INT, 'Lines in their place'),
            'total' => new external_value(PARAM_INT, 'Lines of the solution'),
        ]);
    }
}
