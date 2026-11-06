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

namespace qtype_codelab\local;

/**
 * Finds the CodeLab questions in the question banks of a course and runs the solution of each on its tests.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class bulk_checker {
    /** Results of a check, in the order they are listed: problems first. */
    const STATUSES = ['compile', 'failed', 'jobe', 'nosolution', 'notests', 'ok'];

    /**
     * The latest version of every CodeLab question in the banks of a course: the course context (Moodle 4.5) and the
     * contexts of its activities (question banks and quizzes).
     *
     * @param int $courseid
     * @return array of records id, name, contextid, category, ordered by bank, category and name
     */
    public static function find_questions(int $courseid): array {
        global $DB;
        $coursecontext = \context_course::instance($courseid);
        $contextids = $DB->get_fieldset_sql(
            "SELECT ctx.id
               FROM {context} ctx
               JOIN {course_modules} cm ON cm.id = ctx.instanceid
              WHERE ctx.contextlevel = :level AND cm.course = :courseid",
            ['level' => CONTEXT_MODULE, 'courseid' => $courseid]
        );
        $contextids[] = $coursecontext->id;
        [$insql, $params] = $DB->get_in_or_equal($contextids, SQL_PARAMS_NAMED);
        $params['qtype'] = 'codelab';
        $params['hidden'] = \core_question\local\bank\question_version_status::QUESTION_STATUS_HIDDEN;
        return array_values($DB->get_records_sql(
            "SELECT q.id, q.name, qc.contextid, qc.name AS category
               FROM {question} q
               JOIN {question_versions} qv ON qv.questionid = q.id
               JOIN {question_bank_entries} qbe ON qbe.id = qv.questionbankentryid
               JOIN {question_categories} qc ON qc.id = qbe.questioncategoryid
              WHERE q.qtype = :qtype AND qc.contextid $insql AND qv.status <> :hidden
                AND qv.version = (SELECT MAX(v.version) FROM {question_versions} v
                                   WHERE v.questionbankentryid = qbe.id)
           ORDER BY qc.contextid, qc.name, q.name, q.id",
            $params
        ));
    }

    /**
     * Run the solution of a question on its tests. Results of runs that worked are cached as for students' answers.
     *
     * @param \qtype_codelab_question $question
     * @return array ['status' => one of STATUSES, 'passed' => int, 'total' => int, 'detail' => compiler message or '']
     */
    public static function check(\qtype_codelab_question $question): array {
        $total = count($question->tests);
        $result = ['status' => 'ok', 'passed' => 0, 'total' => $total, 'detail' => ''];
        if (!$question->has_tests()) {
            return array_merge($result, ['status' => 'notests']);
        }
        if (trim((string) $question->solution) === '') {
            return array_merge($result, ['status' => 'nosolution']);
        }
        $results = $question->test_results(['answer' => (string) $question->solution]);
        if (grader::sandbox_failed($results)) {
            return array_merge($result, ['status' => 'jobe', 'detail' => trim((string) ($results[0]['stderr'] ?? ''))]);
        }
        // No test compiles: the solution itself does not (with test code a single test may not compile).
        if ($results && !array_filter($results, fn($r) => $r['status'] !== 'compile')) {
            return array_merge($result, ['status' => 'compile', 'detail' => (string) $results[0]['cmpinfo']]);
        }
        $passed = count(array_filter($results, fn($r) => !empty($r['passed'])));
        return array_merge($result, ['status' => $passed === $total ? 'ok' : 'failed', 'passed' => $passed]);
    }

    /**
     * Address of the editing form of a question in its bank.
     *
     * @param \stdClass $record a record of find_questions()
     * @param int $courseid
     * @return \moodle_url
     */
    public static function edit_url(\stdClass $record, int $courseid): \moodle_url {
        $context = \context::instance_by_id($record->contextid);
        $params = ['id' => $record->id];
        if ($context->contextlevel == CONTEXT_MODULE) {
            $params['cmid'] = $context->instanceid;
        } else {
            $params['courseid'] = $courseid;
        }
        return new \moodle_url('/question/bank/editquestion/question.php', $params);
    }
}
