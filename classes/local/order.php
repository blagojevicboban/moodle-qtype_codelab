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
 * Check order of a Parsons problem: how many lines of the student's program are in their place, as the longest common
 * subsequence of the student's lines and the lines of the solution (as order::check of qtype_algorithm, with one list
 * instead of nested blocks). Only the number is given, never which lines.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class order {
    /** Values of the option ordercheck. */
    const OFF = 0;
    /** Students can check the order. */
    const ON = 1;
    /** Students can check the order, and a program that fails the tests gets a part of the mark for the order. */
    const PARTIAL = 2;

    /** Share of the mark for lines in their place when the tests fail (with PARTIAL). */
    const PARTIAL_SHARE = 0.5;

    /** Spaces of one level of indentation, as amd/src/parsons.js writes them. */
    const INDENT = 4;

    /**
     * The lines of a program as Check order compares them: the text without any spaces, and the level of indentation
     * (only in Python, where the student chooses it; in the other languages the braces decide it). Empty lines are left
     * out.
     *
     * @param string $program
     * @param bool $indented whether the level counts (Python)
     * @return array list of ['text' => string, 'level' => int]
     */
    public static function entries(string $program, bool $indented): array {
        $out = [];
        foreach (preg_split('/\r\n|\r|\n/', $program) as $line) {
            $line = str_replace("\t", str_repeat(' ', self::INDENT), $line);
            $text = preg_replace('/\s+/u', '', $line);
            if ($text === '' || $text === null) {
                continue;
            }
            $spaces = strlen($line) - strlen(ltrim($line, ' '));
            $out[] = ['text' => $text, 'level' => $indented ? (int) round($spaces / self::INDENT) : 0];
        }
        return $out;
    }

    /**
     * Number of lines in their place: the length of the longest common subsequence of the two lists, where two lines are
     * the same when their text and their level are.
     *
     * @param array $answer of entries()
     * @param array $solution of entries()
     * @return int
     */
    public static function placed(array $answer, array $solution): int {
        $n = count($answer);
        $m = count($solution);
        $previous = array_fill(0, $m + 1, 0);
        for ($i = 1; $i <= $n; $i++) {
            $row = [0];
            for ($j = 1; $j <= $m; $j++) {
                $row[$j] = $answer[$i - 1] === $solution[$j - 1]
                    ? $previous[$j - 1] + 1
                    : max($previous[$j], $row[$j - 1]);
            }
            $previous = $row;
        }
        return $previous[$m];
    }

    /**
     * Normalise lines that match a gap template to a placeholder so a wrong or empty gap text does not move the line
     * out of its place when checking order.
     *
     * @param array $entries of entries()
     * @param array $templates list of ['before' => string, 'after' => string] (spaces already removed)
     * @return array
     */
    protected static function apply_templates(array $entries, array $templates): array {
        if (empty($templates)) {
            return $entries;
        }
        foreach ($entries as &$entry) {
            foreach ($templates as $tpl) {
                $b = $tpl['before'];
                $a = $tpl['after'];
                $okbefore = $b === '' || str_starts_with($entry['text'], $b);
                $okafter = $a === '' || str_ends_with($entry['text'], $a);
                if ($okbefore && $okafter && strlen($entry['text']) >= strlen($b) + strlen($a)) {
                    $entry['text'] = $b . "\0" . $a;
                    break;
                }
            }
        }
        unset($entry);
        return $entries;
    }

    /**
     * Check order of a program against the solution.
     *
     * @param string $answer the student's program
     * @param string $solution the teacher's program
     * @param string $lang language of the question (Python: the levels count)
     * @param int $gaps number of fill-in gaps (0 when none)
     * @param string $seed attempt seed for the gaps
     * @return array ['placed' => int, 'total' => int] total is the number of lines of the solution
     */
    public static function check(string $answer, string $solution, string $lang, int $gaps = 0, string $seed = ''): array {
        $indented = $lang === 'python';
        $templates = [];
        if ($gaps > 0 && $seed !== '') {
            foreach (gaps::apply(parsons::lines($solution), $lang, $gaps, $seed) as $item) {
                if (is_array($item)) {
                    $templates[] = [
                        'before' => (string) preg_replace('/\s+/u', '', $item['before']),
                        'after' => (string) preg_replace('/\s+/u', '', $item['after']),
                    ];
                }
            }
        }
        $expected = self::apply_templates(self::entries($solution, $indented), $templates);
        $got = self::apply_templates(self::entries($answer, $indented), $templates);
        return ['placed' => self::placed($got, $expected), 'total' => count($expected)];
    }

    /**
     * The fraction for the order when the tests fail (option PARTIAL): the share of lines in their place, times
     * PARTIAL_SHARE. A program with distractor lines has fewer lines in place, as the distractors are never in place.
     *
     * @param string $answer
     * @param string $solution
     * @param string $lang
     * @return float between 0 and PARTIAL_SHARE
     */
    public static function partial_fraction(string $answer, string $solution, string $lang): float {
        $result = self::check($answer, $solution, $lang);
        if ($result['total'] === 0) {
            return 0.0;
        }
        // Extra lines (distractors) count against the order: the share is of the longer of the two programs.
        $lines = max($result['total'], count(self::entries($answer, $lang === 'python')));
        return self::PARTIAL_SHARE * $result['placed'] / $lines;
    }
}
