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
 * Local token-based code similarity checker (MOSS-style winnowing on normalized tokens): ignores whitespace, comments,
 * variable/function renaming, and the question's starting template. Runs entirely inside Moodle with no external calls.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class similarity {
    /** Token k-gram size. */
    const K = 5;

    /** Winnowing window size. */
    const WINDOW = 4;

    /** Minimum tokens required to compare a submission (avoids false positives on tiny 1-2 line answers). */
    const MIN_TOKENS = 12;

    /** Default similarity threshold (0..1) above which a pair is reported. */
    const THRESHOLD = 0.75;

    /** Maximum number of similar pairs returned. */
    const MAX_PAIRS = 20;

    /** Language keywords preserved as distinct tokens (all other identifiers become ID). */
    const KEYWORDS = [
        'auto', 'break', 'case', 'char', 'class', 'const', 'continue', 'default', 'def', 'delete', 'do', 'double',
        'elif', 'else', 'enum', 'except', 'extern', 'false', 'finally', 'float', 'for', 'from', 'function', 'goto',
        'if', 'import', 'in', 'inline', 'int', 'lambda', 'let', 'long', 'namespace', 'new', 'none', 'not', 'null',
        'nullptr', 'or', 'pass', 'private', 'protected', 'public', 'raise', 'range', 'register', 'return', 'short',
        'signed', 'sizeof', 'static', 'string', 'struct', 'switch', 'template', 'this', 'throw', 'true', 'try',
        'typedef', 'typename', 'union', 'unsigned', 'using', 'var', 'virtual', 'void', 'volatile', 'while', 'with',
        'yield', 'and', 'as', 'assert', 'async', 'await', 'bool', 'boolean', 'byte', 'catch', 'extends', 'final',
        'implements', 'interface', 'package', 'super', 'synchronized', 'throws', 'begin', 'end', 'procedure',
        'program', 'select', 'where', 'join', 'group', 'order', 'having', 'insert', 'update', 'values', 'into',
    ];

    /**
     * Strip comments and tokenize code into a normalized sequence of structural tokens.
     *
     * @param string $code
     * @param string $lang
     * @return string[]
     */
    public static function tokenize(string $code, string $lang = 'c'): array {
        $text = str_replace(["\r\n", "\r"], "\n", $code);
        // Strip comments according to language family.
        if ($lang === 'python') {
            $text = preg_replace('/#[^\n]*/', ' ', $text);
        } else if ($lang === 'mysql') {
            $text = preg_replace('/--[^\n]*|\/\*.*?\*\//s', ' ', $text);
        } else {
            $text = preg_replace('/\/\/[^\n]*|\/\*.*?\*\//s', ' ', $text);
        }
        // Normalize string and char literals before splitting tokens.
        $text = preg_replace('/"(?:\\\\.|[^"\\\\])*"|\'(?:\\\\.|[^\'\\\\])*\'/', ' STR ', $text);
        // Split into identifiers, numbers, multi-char operators and single punctuation chars.
        $pattern = '/[A-Za-z_]\w*|\d+(?:\.\d+)?|==|!=|<=|>=|&&|\|\||<<|>>|\+\+|--|->|::|[+\-*\/%<>=!&|^~]=|[^\s]/';
        if (!preg_match_all($pattern, $text, $m)) {
            return [];
        }
        static $kwset = null;
        if ($kwset === null) {
            $kwset = array_flip(self::KEYWORDS);
        }
        $tokens = [];
        foreach ($m[0] as $tok) {
            if ($tok === 'STR') {
                $tokens[] = 'STR';
            } else if (ctype_digit($tok[0])) {
                $tokens[] = 'NUM';
            } else if (ctype_alpha($tok[0]) || $tok[0] === '_') {
                $lower = strtolower($tok);
                $tokens[] = isset($kwset[$lower]) ? $lower : 'ID';
            } else {
                $tokens[] = $tok;
            }
        }
        return $tokens;
    }

    /**
     * Compute k-gram hashes of a token sequence.
     *
     * @param string[] $tokens
     * @return int[]
     */
    public static function kgram_hashes(array $tokens): array {
        $n = count($tokens);
        if ($n < self::K) {
            return [];
        }
        $hashes = [];
        for ($i = 0; $i <= $n - self::K; $i++) {
            $gram = implode(' ', array_slice($tokens, $i, self::K));
            $hashes[] = crc32($gram);
        }
        return $hashes;
    }

    /**
     * Apply MOSS winnowing to k-gram hashes to obtain a compact fingerprint set (hash => true).
     *
     * @param int[] $hashes
     * @param array $exclude template hashes (hash => true) to ignore
     * @return array<int, bool>
     */
    public static function winnow(array $hashes, array $exclude = []): array {
        $n = count($hashes);
        if ($n === 0) {
            return [];
        }
        $fp = [];
        if ($n <= self::WINDOW) {
            $min = min($hashes);
            if (!isset($exclude[$min])) {
                $fp[$min] = true;
            }
            return $fp;
        }
        for ($i = 0; $i <= $n - self::WINDOW; $i++) {
            $best = $hashes[$i];
            for ($j = 1; $j < self::WINDOW; $j++) {
                $v = $hashes[$i + $j];
                if ($v <= $best) {
                    $best = $v;
                }
            }
            if (!isset($exclude[$best])) {
                $fp[$best] = true;
            }
        }
        return $fp;
    }

    /**
     * Fingerprint set for one code submission.
     *
     * @param string $code
     * @param string $lang
     * @param array $exclude template hashes (hash => true)
     * @return array<int, bool>
     */
    public static function fingerprint(string $code, string $lang = 'c', array $exclude = []): array {
        $tokens = self::tokenize($code, $lang);
        if (count($tokens) < self::MIN_TOKENS) {
            return [];
        }
        return self::winnow(self::kgram_hashes($tokens), $exclude);
    }

    /**
     * Find pairs of submissions with Jaccard fingerprint similarity >= threshold, highest first.
     *
     * @param array $submissions list of ['name' => string, 'code' => string]
     * @param string $lang
     * @param string $template starting code of the question (excluded from fingerprints)
     * @param float $threshold minimum Jaccard similarity (0..1)
     * @param int $limit maximum pairs returned
     * @return array list of ['usera' => string, 'userb' => string, 'percent' => int, 'shared' => int]
     */
    public static function find_pairs(
        array $submissions,
        string $lang = 'c',
        string $template = '',
        float $threshold = self::THRESHOLD,
        int $limit = self::MAX_PAIRS
    ): array {
        $exclude = [];
        if (trim($template) !== '') {
            foreach (self::kgram_hashes(self::tokenize($template, $lang)) as $h) {
                $exclude[$h] = true;
            }
        }
        $items = [];
        foreach ($submissions as $s) {
            $fp = self::fingerprint((string) ($s['code'] ?? ''), $lang, $exclude);
            if (!empty($fp)) {
                $items[] = ['name' => (string) ($s['name'] ?? ''), 'fp' => $fp, 'count' => count($fp)];
            }
        }
        $pairs = [];
        $n = count($items);
        for ($i = 0; $i < $n; $i++) {
            $a = $items[$i];
            for ($j = $i + 1; $j < $n; $j++) {
                $b = $items[$j];
                // Quick upper-bound prune: min(|A|,|B|) / max(|A|,|B|) < threshold cannot reach threshold.
                $min = min($a['count'], $b['count']);
                $max = max($a['count'], $b['count']);
                if ($max === 0 || ($min / $max) < $threshold) {
                    continue;
                }
                $shared = count(array_intersect_key($a['fp'], $b['fp']));
                $union = $a['count'] + $b['count'] - $shared;
                $score = $union > 0 ? $shared / $union : 0.0;
                if ($score >= $threshold) {
                    $pairs[] = [
                        'usera' => $a['name'],
                        'userb' => $b['name'],
                        'percent' => (int) round($score * 100),
                        'shared' => $shared,
                    ];
                }
            }
        }
        usort($pairs, fn($x, $y) => $y['percent'] <=> $x['percent'] ?: $y['shared'] <=> $x['shared']);
        return array_slice($pairs, 0, $limit);
    }
}
