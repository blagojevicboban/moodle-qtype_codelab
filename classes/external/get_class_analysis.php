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
use qtype_codelab\local\grader;

/**
 * Analysis of the class answers to a CodeLab question in a quiz: for each test how many answers pass it and the most
 * frequent wrong outputs, the most frequent compiler messages, how many answers end with an error or a time limit, and
 * the grades in ten groups. The test results come from the results cache of the question (filled when the answers were
 * graded); answers not in the cache are run on the server, at most RUN_BUDGET per request, the rest are counted as
 * pending and come with the next refresh.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class get_class_analysis extends external_api {
    /** Answers run on the server in one request when their results are not in the cache. */
    const RUN_BUDGET = 20;

    /** Most frequent wrong outputs and messages listed. */
    const TOP = 3;

    /** Longest wrong output or message shown. */
    const MAX_TEXT = 200;

    /**
     * Parameters.
     *
     * @return external_function_parameters
     */
    public static function execute_parameters(): external_function_parameters {
        return get_class_answers::execute_parameters();
    }

    /**
     * The analysis.
     *
     * @param int $cmid
     * @param int $slot
     * @return array
     */
    public static function execute(int $cmid, int $slot): array {
        global $CFG;
        require_once($CFG->dirroot . '/question/engine/bank.php');
        $answers = get_class_answers::answers($cmid, $slot);
        $empty = ['answers' => 0, 'otherversions' => 0, 'pending' => 0, 'unchecked' => 0, 'compile' => 0, 'runtime' => 0,
            'timelimit' => 0, 'tests' => [], 'messages' => [], 'grades' => array_fill(0, 10, 0)];
        if (!$answers) {
            return $empty;
        }
        // Only the version of the question most students got: the tests of other versions may differ.
        $versions = array_count_values(array_column($answers, 'questionid'));
        arsort($versions);
        $questionid = (int) array_key_first($versions);
        return self::analyse(\question_bank::load_question($questionid), $questionid, $answers);
    }

    /**
     * Analyse the answers to one version of a question (the others are only counted).
     *
     * @param \qtype_codelab_question $question the version analysed
     * @param int $questionid its id
     * @param array $answers userid => ['questionid', 'answer', ...] as get_class_answers::answers()
     * @return array as execute_returns()
     */
    public static function analyse(\qtype_codelab_question $question, int $questionid, array $answers): array {
        $out = ['answers' => 0, 'otherversions' => 0, 'pending' => 0, 'unchecked' => 0, 'compile' => 0, 'runtime' => 0,
            'timelimit' => 0, 'tests' => [], 'messages' => [], 'grades' => array_fill(0, 10, 0)];
        $out['otherversions'] = count(array_filter($answers, fn($a) => (int) $a['questionid'] !== $questionid));
        $tests = $question->tests;
        $passed = array_fill(0, count($tests), 0);
        $wrong = array_fill(0, count($tests), []);
        $messages = [];
        $cache = \cache::make('qtype_codelab', 'results');
        $budget = self::RUN_BUDGET;
        foreach ($answers as $a) {
            if ((int) $a['questionid'] !== $questionid) {
                continue;
            }
            if ($cache->get($question->results_key($a['answer'])) === false) {
                if ($budget <= 0) {
                    $out['pending']++;
                    continue;
                }
                $budget--;
            }
            $results = $question->test_results(['answer' => $a['answer']]);
            if (!$results || grader::sandbox_failed($results)) {
                $out['unchecked']++;
                continue;
            }
            $out['answers']++;
            $statuses = array_column($results, 'status');
            if (in_array('compile', $statuses, true)) {
                $out['compile']++;
                $first = self::first_message((string) ($results[0]['cmpinfo'] ?? ''));
                if ($first !== '') {
                    $messages[$first] = ($messages[$first] ?? 0) + 1;
                }
            } else if (in_array('runtime', $statuses, true)) {
                $out['runtime']++;
            }
            if (array_intersect(['time', 'memory'], $statuses)) {
                $out['timelimit']++;
            }
            foreach ($results as $i => $r) {
                if (!isset($passed[$i])) {
                    continue;
                }
                if (!empty($r['passed'])) {
                    $passed[$i]++;
                } else if ($r['status'] === 'ok') {
                    $got = \core_text::substr(rtrim((string) $r['got']), 0, self::MAX_TEXT);
                    $wrong[$i][$got] = ($wrong[$i][$got] ?? 0) + 1;
                }
            }
            $fraction = grader::fraction($tests, $results);
            $out['grades'][min(9, (int) floor($fraction * 10))]++;
        }
        foreach ($tests as $i => $tc) {
            $out['tests'][] = ['hidden' => !empty($tc['hidden']), 'passed' => $passed[$i], 'wrong' => self::top($wrong[$i])];
        }
        $out['messages'] = self::top($messages);
        return $out;
    }

    /**
     * The most frequent texts.
     *
     * @param array $counts text => how many answers
     * @return array list of ['text', 'count'], most frequent first, at most TOP
     */
    protected static function top(array $counts): array {
        arsort($counts);
        $out = [];
        foreach (array_slice($counts, 0, self::TOP, true) as $text => $count) {
            $out[] = ['text' => (string) $text, 'count' => $count];
        }
        return $out;
    }

    /**
     * The first error line of compiler messages, without the file name, line and column (so equal errors group).
     *
     * @param string $cmpinfo
     * @return string
     */
    public static function first_message(string $cmpinfo): string {
        $lines = preg_split('/\R/', $cmpinfo);
        $line = '';
        foreach ($lines as $l) {
            if (preg_match('/\berror\b/i', $l)) {
                $line = $l;
                break;
            }
        }
        if ($line === '') {
            $line = (string) ($lines[0] ?? '');
        }
        $line = preg_replace('/^\S*?:\d+(:\d+)?:\s*/', '', trim($line));
        $line = preg_replace('/^(fatal )?error:\s*/i', '', $line);
        return \core_text::substr(trim($line), 0, self::MAX_TEXT);
    }

    /**
     * Result.
     *
     * @return external_single_structure
     */
    public static function execute_returns(): external_single_structure {
        $texts = new external_multiple_structure(new external_single_structure([
            'text' => new external_value(PARAM_RAW, 'The output or message'),
            'count' => new external_value(PARAM_INT, 'How many answers'),
        ]));
        return new external_single_structure([
            'answers' => new external_value(PARAM_INT, 'Answers analysed'),
            'otherversions' => new external_value(PARAM_INT, 'Answers to other versions of the question, not analysed'),
            'pending' => new external_value(PARAM_INT, 'Answers not run yet (next refresh)'),
            'unchecked' => new external_value(PARAM_INT, 'Answers the server could not check'),
            'compile' => new external_value(PARAM_INT, 'Answers that do not compile'),
            'runtime' => new external_value(PARAM_INT, 'Answers that end with an error in a test'),
            'timelimit' => new external_value(PARAM_INT, 'Answers over the time or memory limit in a test'),
            'tests' => new external_multiple_structure(new external_single_structure([
                'hidden' => new external_value(PARAM_BOOL, 'A hidden test'),
                'passed' => new external_value(PARAM_INT, 'Answers that pass it'),
                'wrong' => $texts,
            ])),
            'messages' => clone $texts,
            'grades' => new external_multiple_structure(new external_value(PARAM_INT, 'Answers with a grade in this tenth')),
        ]);
    }
}
