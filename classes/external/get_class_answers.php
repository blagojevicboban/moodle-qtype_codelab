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
use core_external\external_multiple_structure;
use core_external\external_single_structure;
use core_external\external_value;

/**
 * Class work of a CodeLab question in a quiz: the last answer of every student (newest first, with the grade), for a
 * teacher who may see the reports of the quiz. The answers come from the quiz attempts; students send nothing extra.
 * Previews are left out; in separate groups a teacher who cannot see all groups gets only their own groups.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class get_class_answers extends external_api {
    /** Most answers returned. */
    const MAX_ANSWERS = 200;

    /**
     * Parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return new external_function_parameters([
            'cmid' => new external_value(PARAM_INT, 'The quiz'),
            'slot' => new external_value(PARAM_INT, 'The slot of the question in the quiz'),
        ]);
    }

    /**
     * The answers.
     *
     * @param int $cmid
     * @param int $slot
     * @return array
     */
    public static function execute(int $cmid, int $slot): array {
        global $DB;
        $answers = self::answers($cmid, $slot);
        if (!$answers) {
            return ['answers' => []];
        }
        $fields = \core_user\fields::for_name()->get_sql('', false, '', '', false)->selects;
        $users = $DB->get_records_list('user', 'id', array_keys($answers), '', 'id, deleted' . ($fields ? ", {$fields}" : ''));
        $out = [];
        foreach ($answers as $userid => $a) {
            $user = $users[$userid] ?? null;
            if (!$user || $user->deleted) {
                continue;
            }
            $out[] = ['userid' => (int) $userid, 'fullname' => fullname($user), 'code' => $a['answer'],
                'timemodified' => $a['time'], 'fraction' => $a['fraction'] ?? -1.0];
        }
        return ['answers' => $out];
    }

    /**
     * The last answer of each student to a slot, newest first, at most MAX_ANSWERS (checks the capability).
     *
     * @param int $cmid
     * @param int $slot
     * @return array userid => ['questionid', 'answer', 'time', 'fraction' (null when not graded)]
     */
    public static function answers(int $cmid, int $slot): array {
        global $DB;
        $params = self::validate_parameters(self::execute_parameters(), ['cmid' => $cmid, 'slot' => $slot]);
        $cm = get_coursemodule_from_id('quiz', $params['cmid'], 0, false, MUST_EXIST);
        $context = \context_module::instance($cm->id);
        self::validate_context($context);
        require_capability('mod/quiz:viewreports', $context);

        // The last attempt of each student that has this slot as a CodeLab question.
        $rows = $DB->get_recordset_sql(
            "SELECT qa.id, qa.questionid, quiza.userid, quiza.attempt
               FROM {quiz_attempts} quiza
               JOIN {question_attempts} qa ON qa.questionusageid = quiza.uniqueid
               JOIN {question} q ON q.id = qa.questionid
              WHERE quiza.quiz = :quiz AND quiza.preview = 0 AND qa.slot = :slot AND q.qtype = :qtype
           ORDER BY quiza.userid, quiza.attempt DESC",
            ['quiz' => $cm->instance, 'slot' => $params['slot'], 'qtype' => 'codelab']
        );
        $attempts = [];
        foreach ($rows as $row) {
            if (!isset($attempts[$row->userid])) {
                $attempts[$row->userid] = ['qaid' => (int) $row->id, 'questionid' => (int) $row->questionid];
            }
        }
        $rows->close();
        $allowed = self::allowed_users($cm, $context);
        if ($allowed !== null) {
            $attempts = array_intersect_key($attempts, $allowed);
        }
        $found = self::last_answers(array_column($attempts, 'qaid'));
        $out = [];
        foreach ($attempts as $userid => $att) {
            $f = $found[$att['qaid']] ?? null;
            if (!$f || $f['answer'] === null || trim($f['answer']) === '') {
                continue;
            }
            $out[$userid] = ['questionid' => $att['questionid']] + $f;
        }
        uasort($out, fn($a, $b) => $b['time'] <=> $a['time']);
        return array_slice($out, 0, self::MAX_ANSWERS, true);
    }

    /**
     * In separate groups, the students a teacher who cannot see all groups may see.
     *
     * @param \stdClass $cm
     * @param \context_module $context
     * @return array|null userid => true, or null for everybody
     */
    protected static function allowed_users(\stdClass $cm, \context_module $context): ?array {
        global $USER;
        if (groups_get_activity_groupmode($cm) != SEPARATEGROUPS || has_capability('moodle/site:accessallgroups', $context)) {
            return null;
        }
        $allowed = [];
        foreach (groups_get_all_groups($cm->course, $USER->id, $cm->groupingid) as $group) {
            foreach (groups_get_members($group->id, 'u.id') as $member) {
                $allowed[$member->id] = true;
            }
        }
        return $allowed;
    }

    /**
     * The last saved answer, its time and the last grade of question attempts.
     *
     * @param int[] $qaids
     * @return array qaid => ['answer' => ?string, 'time' => int, 'fraction' => ?float]
     */
    protected static function last_answers(array $qaids): array {
        global $DB;
        $found = [];
        foreach (array_chunk($qaids, 500) as $chunk) {
            [$insql, $inparams] = $DB->get_in_or_equal($chunk, SQL_PARAMS_NAMED);
            $steps = $DB->get_recordset_sql(
                "SELECT qas.id, qas.questionattemptid, qas.fraction, qas.timecreated, qasd.value
                   FROM {question_attempt_steps} qas
              LEFT JOIN {question_attempt_step_data} qasd ON qasd.attemptstepid = qas.id AND qasd.name = :name
                  WHERE qas.questionattemptid {$insql}
               ORDER BY qas.questionattemptid, qas.sequencenumber",
                ['name' => 'answer'] + $inparams
            );
            foreach ($steps as $step) {
                $f = $found[$step->questionattemptid] ?? ['answer' => null, 'time' => 0, 'fraction' => null];
                if ($step->value !== null) {
                    $f['answer'] = (string) $step->value;
                    $f['time'] = (int) $step->timecreated;
                }
                if ($step->fraction !== null) {
                    $f['fraction'] = (float) $step->fraction;
                }
                $found[$step->questionattemptid] = $f;
            }
            $steps->close();
        }
        return $found;
    }

    /**
     * Result.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        return new external_single_structure([
            'answers' => new external_multiple_structure(new external_single_structure([
                'userid' => new external_value(PARAM_INT, 'The student'),
                'fullname' => new external_value(PARAM_TEXT, 'Name of the student'),
                'code' => new external_value(PARAM_RAW, 'The program'),
                'timemodified' => new external_value(PARAM_INT, 'When the answer was saved'),
                'fraction' => new external_value(PARAM_FLOAT, 'Grade from 0 to 1, -1 when not graded yet'),
            ])),
        ]);
    }
}
