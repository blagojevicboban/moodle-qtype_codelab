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
 * Fill-in gaps inside Parsons problems: picks up to MAX_GAPS expressions from the solution lines (never from
 * distractors, string literals or comments) using a deterministic Park-Miller shuffle so every attempt gets the same
 * gaps on every server.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class gaps {
    /** Most gaps in one Parsons problem. */
    const MAX_GAPS = 10;

    /** Maximum length of text a student can type into one gap (single line). */
    const MAX_GAP_LENGTH = 80;

    /**
     * Replace string literals and line comments with spaces of the same length so candidate searches skip them while
     * keeping byte offsets identical to the original line.
     *
     * @param string $line
     * @param string $lang
     * @return string
     */
    public static function mask(string $line, string $lang): string {
        $len = strlen($line);
        $out = '';
        $quote = '';
        $hashcomment = in_array($lang, ['python', 'php', 'bash', 'r', 'ruby', 'perl', 'julia', 'elixir'], true);
        for ($i = 0; $i < $len; $i++) {
            $ch = $line[$i];
            if ($quote !== '') {
                $out .= ' ';
                if ($ch === '\\' && $i + 1 < $len) {
                    $out .= ' ';
                    $i++;
                } else if ($ch === $quote) {
                    $quote = '';
                }
                continue;
            }
            if ($ch === '"' || $ch === "'") {
                $quote = $ch;
                $out .= ' ';
                continue;
            }
            if (($hashcomment && $ch === '#') || ($ch === '/' && $i + 1 < $len && $line[$i + 1] === '/')) {
                $out .= str_repeat(' ', $len - $i);
                break;
            }
            $out .= $ch;
        }
        return $out;
    }

    /**
     * Find the best candidate expression to hide on one line, or null when none qualifies.
     *
     * Candidates: condition of if/elif/while, range of for, arguments of print/printf/println/WriteLine/log, or the
     * right-hand side of an assignment. Strings and comments are masked out first.
     *
     * @param string $line trimmed line of code
     * @param string $lang
     * @return array|null ['start' => int, 'length' => int] byte offset and length in $line
     */
    public static function candidate(string $line, string $lang): ?array {
        $masked = self::mask($line, $lang);
        $patterns = [];
        if ($lang === 'python') {
            $patterns[] = '/^\s*(?:if|elif|while)\s+(.+?)\s*:\s*$/';
            $patterns[] = '/^\s*for\s+[A-Za-z_]\w*(?:\s*,\s*[A-Za-z_]\w*)*\s+in\s+(.+?)\s*:\s*$/';
        } else if ($lang === 'pascal') {
            $patterns[] = '/^\s*(?:if|while)\s+(.+?)\s+(?:then|do)\b/i';
        } else {
            $patterns[] = '/^\s*(?:if|else\s+if|while)\s*\((.+)\)\s*\{?\s*$/';
            $patterns[] = '/^\s*for\s*\((.+)\)\s*\{?\s*$/';
        }
        $patterns[] = '/\b(?:print|printf|println|WriteLine|log)\s*\((.+)\)\s*;?\s*$/';
        $patterns[] = '/^[^=<>!]+?(?:[+\-*\/%]?=|:=)\s*([^=;\s][^;]*?)\s*;?\s*$/';

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $masked, $m, PREG_OFFSET_CAPTURE)) {
                $start = (int) $m[1][1];
                $length = strlen($m[1][0]);
                // Trim surrounding spaces in the original line.
                $raw = substr($line, $start, $length);
                $ltrimmed = ltrim($raw);
                $start += strlen($raw) - strlen($ltrimmed);
                $trimmed = rtrim($ltrimmed);
                $length = strlen($trimmed);
                if ($length >= 1) {
                    return ['start' => $start, 'length' => $length];
                }
            }
        }
        return null;
    }

    /**
     * Choose $count distinct indices from 0..$n-1 deterministically using Park-Miller (same on every server).
     *
     * @param int $n
     * @param int $count
     * @param string $seed
     * @return int[] sorted indices
     */
    public static function choose(int $n, int $count, string $seed): array {
        if ($n <= 0 || $count <= 0) {
            return [];
        }
        $all = range(0, $n - 1);
        $state = (crc32($seed) & 0x7fffffff) ?: 1;
        for ($i = $n - 1; $i > 0; $i--) {
            $state = ($state * 48271) % 2147483647;
            $j = $state % ($i + 1);
            [$all[$i], $all[$j]] = [$all[$j], $all[$i]];
        }
        $chosen = array_slice($all, 0, min($count, $n));
        sort($chosen);
        return $chosen;
    }

    /**
     * Build the gapped representation of solution lines: chosen lines become ['before', 'after', 'size'], others remain
     * plain strings. The hidden expression itself is never included.
     *
     * @param string[] $solutionlines
     * @param string $lang
     * @param int $count number of gaps (0..MAX_GAPS)
     * @param string $seed
     * @return array list matching $solutionlines
     */
    public static function apply(array $solutionlines, string $lang, int $count, string $seed): array {
        $count = max(0, min(self::MAX_GAPS, $count));
        if ($count === 0) {
            return $solutionlines;
        }
        $candidates = [];
        foreach ($solutionlines as $i => $line) {
            $cand = self::candidate($line, $lang);
            if ($cand !== null) {
                $candidates[] = ['index' => $i, 'start' => $cand['start'], 'length' => $cand['length']];
            }
        }
        $picked = array_flip(self::choose(count($candidates), $count, $seed));
        $out = $solutionlines;
        foreach ($candidates as $ci => $cand) {
            if (!isset($picked[$ci])) {
                continue;
            }
            $line = $solutionlines[$cand['index']];
            $out[$cand['index']] = [
                'before' => substr($line, 0, $cand['start']),
                'after' => substr($line, $cand['start'] + $cand['length']),
                'size' => max(4, min(self::MAX_GAP_LENGTH, $cand['length'] + 2)),
            ];
        }
        return $out;
    }
}
