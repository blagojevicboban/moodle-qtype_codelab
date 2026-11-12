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
 * Parsons problems: the lines of the solution and the distractor lines, shuffled the same way for an attempt, which the
 * student puts in order (amd/src/parsons.js). The program they make is the answer, graded by the tests as usual.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class parsons {
    /** Most lines of a Parsons problem (solution and distractors). */
    const MAX_LINES = 80;

    /**
     * The lines of a text without their indentation, empty lines left out.
     *
     * @param string $text
     * @return string[]
     */
    public static function lines(string $text): array {
        $lines = [];
        foreach (preg_split('/\r\n|\r|\n/', $text) as $line) {
            $line = trim(str_replace("\t", '    ', $line));
            if ($line !== '') {
                $lines[] = $line;
            }
        }
        return $lines;
    }

    /**
     * The blocks of an attempt: the lines of the solution and the distractors, shuffled with the seed (the same seed
     * gives the same order, so a page that is opened again does not change).
     *
     * @param string $solution
     * @param string $distractors one line each
     * @param string $seed e.g. the usage and slot of the attempt
     * @return string[]
     */
    public static function blocks(string $solution, string $distractors, string $seed): array {
        $all = array_slice(array_merge(self::lines($solution), self::lines($distractors)), 0, self::MAX_LINES);
        $keys = [];
        foreach ($all as $i => $line) {
            $keys[$i] = sha1($seed . '|' . $i . '|' . $line);
        }
        asort($keys);
        $out = [];
        foreach (array_keys($keys) as $i) {
            $out[] = $all[$i];
        }
        // A shuffle that left the solution as it was would give the answer away: turn it around then.
        if (count($out) > 2 && $out === $all) {
            $out = array_reverse($out);
        }
        return $out;
    }
}
