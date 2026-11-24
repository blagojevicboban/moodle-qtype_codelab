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
 * Static code constraints (forbidden / required tokens and optional grade penalty) for CodeLab questions.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace qtype_codelab\local;

/**
 * Checks student code against teacher-defined forbidden/required tokens outside comments and string literals.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class constraints {
    /** @var int Default penalty percentage when a constraint is violated (100 = 0 points). */
    public const DEFAULT_PENALTY = 100;

    /** @var string[] Languages using # line comments. */
    private const HASH_COMMENTS = ['python', 'bash', 'r', 'ruby', 'perl', 'octave', 'julia', 'elixir'];

    /** @var string[] Languages using -- line comments. */
    private const DASH_COMMENTS = ['mysql', 'lua', 'haskell'];

    /**
     * Parse a JSON rules string into normalised arrays.
     *
     * @param string|null $json
     * @return array
     */
    public static function parse(?string $json): array {
        $empty = ['forbid' => [], 'require' => [], 'penalty' => self::DEFAULT_PENALTY];
        if ($json === null || trim($json) === '') {
            return $empty;
        }
        $data = json_decode($json, true);
        if (!is_array($data)) {
            return $empty;
        }
        $penalty = isset($data['penalty']) && is_numeric($data['penalty'])
            ? max(0, min(100, (int) round((float) $data['penalty'])))
            : self::DEFAULT_PENALTY;
        return [
            'forbid' => self::clean_list($data['forbid'] ?? []),
            'require' => self::clean_list($data['require'] ?? []),
            'penalty' => $penalty,
        ];
    }

    /**
     * Encode form inputs (comma-separated lists and penalty percentage) into JSON, or empty string when unused.
     *
     * @param string $forbid comma-separated forbidden tokens
     * @param string $require comma-separated required tokens
     * @param mixed $penalty 0..100
     * @return string
     */
    public static function encode(string $forbid, string $require, $penalty = self::DEFAULT_PENALTY): string {
        $f = self::split_tokens($forbid);
        $r = self::split_tokens($require);
        if (!$f && !$r) {
            return '';
        }
        $p = is_numeric($penalty) ? max(0, min(100, (int) round((float) $penalty))) : self::DEFAULT_PENALTY;
        return json_encode(['forbid' => $f, 'require' => $r, 'penalty' => $p], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Check code against JSON rules. Returns violated forbidden/required tokens and penalty percentage.
     *
     * @param string $code student answer
     * @param string $lang language code
     * @param string|null $rulesjson JSON rules
     * @return array
     */
    public static function check(string $code, string $lang, ?string $rulesjson): array {
        $rules = self::parse($rulesjson);
        if (!$rules['forbid'] && !$rules['require']) {
            return ['forbid' => [], 'require' => [], 'penalty' => 0];
        }
        $clean = self::strip_comments_and_strings($code, $lang);
        $brokenforbid = [];
        foreach ($rules['forbid'] as $tok) {
            if (self::contains_token($clean, $tok)) {
                $brokenforbid[] = $tok;
            }
        }
        $missingrequire = [];
        foreach ($rules['require'] as $tok) {
            if (!self::contains_token($clean, $tok)) {
                $missingrequire[] = $tok;
            }
        }
        $violated = !empty($brokenforbid) || !empty($missingrequire);
        return [
            'forbid' => $brokenforbid,
            'require' => $missingrequire,
            'penalty' => $violated ? $rules['penalty'] : 0,
        ];
    }

    /**
     * Apply constraint penalty to a test fraction (0..1).
     *
     * @param float $fraction
     * @param array $violations violated tokens and penalty percentage
     * @return float
     */
    public static function apply_penalty(float $fraction, array $violations): float {
        if (empty($violations['forbid']) && empty($violations['require'])) {
            return $fraction;
        }
        $keep = max(0.0, min(1.0, 1.0 - ((int) ($violations['penalty'] ?? 100) / 100.0)));
        return max(0.0, round($fraction * $keep, 7));
    }

    /**
     * Strip comments and string literals so tokens inside them do not trigger false matches.
     *
     * @param string $code
     * @param string $lang
     * @return string
     */
    public static function strip_comments_and_strings(string $code, string $lang): string {
        $code = str_replace(["\r\n", "\r"], "\n", $code);
        $patterns = [
            // Strip quoted string literals.
            '/"(?:\\\\.|[^"\\\\\n])*"/',
            "/'(?:\\\\.|[^'\\\\\n])*'/",
        ];
        if (in_array($lang, self::HASH_COMMENTS, true)) {
            $patterns[] = '/#[^\n]*/';
        } else if (in_array($lang, self::DASH_COMMENTS, true)) {
            $patterns[] = '/--[^\n]*/';
            $patterns[] = '/\/\*[\s\S]*?\*\//';
        } else if ($lang === 'pascal') {
            $patterns[] = '/\/\/[^\n]*/';
            $patterns[] = '/\{[\s\S]*?\}/';
            $patterns[] = '/\(\*[\s\S]*?\*\)/';
        } else if ($lang === 'scheme') {
            $patterns[] = '/;[^\n]*/';
        } else {
            // Slash-slash and slash-star comments used by C-family languages.
            $patterns[] = '/\/\/[^\n]*/';
            $patterns[] = '/\/\*[\s\S]*?\*\//';
        }
        return (string) preg_replace($patterns, ' ', $code);
    }

    /**
     * Whether a token appears in stripped code at word boundaries (for identifier tokens).
     *
     * @param string $code
     * @param string $token
     * @return bool
     */
    private static function contains_token(string $code, string $token): bool {
        $quoted = preg_quote($token, '/');
        $left = preg_match('/^[A-Za-z0-9_]/', $token) ? '(?<![A-Za-z0-9_])' : '';
        $right = preg_match('/[A-Za-z0-9_]$/', $token) ? '(?![A-Za-z0-9_])' : '';
        return (bool) preg_match('/' . $left . $quoted . $right . '/', $code);
    }

    /**
     * Split a comma/newline separated list of tokens.
     *
     * @param string $raw
     * @return string[]
     */
    private static function split_tokens(string $raw): array {
        $parts = preg_split('/[,\r\n]+/', $raw);
        return self::clean_list(is_array($parts) ? $parts : []);
    }

    /**
     * Trim, deduplicate and cap a token list.
     *
     * @param mixed $items
     * @return string[]
     */
    private static function clean_list($items): array {
        if (!is_array($items)) {
            return [];
        }
        $out = [];
        foreach ($items as $item) {
            if (!is_string($item)) {
                continue;
            }
            $t = trim($item);
            if ($t !== '' && strlen($t) <= 60 && !in_array($t, $out, true)) {
                $out[] = $t;
                if (count($out) >= 30) {
                    break;
                }
            }
        }
        return $out;
    }
}
