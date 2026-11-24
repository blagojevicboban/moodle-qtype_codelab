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
 * Converts CodeRunner Moodle XML exports into native CodeLab Moodle XML.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace qtype_codelab\local;

use DOMDocument;
use DOMElement;

/**
 * Pure converter from CodeRunner Moodle XML to CodeLab Moodle XML.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class coderunner_importer {
    /** @var array<string, string> CodeRunner prototype names mapped to CodeLab language codes. */
    public const LANGUAGES = [
        'c_program' => 'c',
        'c_function' => 'c',
        'cpp_program' => 'cpp',
        'cpp_function' => 'cpp',
        'csharp_program' => 'csharp',
        'java_program' => 'java',
        'java_method' => 'java',
        'java_class' => 'java',
        'python3' => 'python',
        'python3_w_input' => 'python',
        'nodejs' => 'javascript',
        'php' => 'php',
        'pascal_program' => 'pascal',
        'sql' => 'mysql',
        'mysql' => 'mysql',
        'sqlite3' => 'mysql',
        'octave' => 'octave',
        'r' => 'r',
        'ruby' => 'ruby',
        'go' => 'go',
        'rust' => 'rust',
        'bash' => 'bash',
    ];

    /** @var array<string, string> Standard headers prepended by CodeRunner function prototypes. */
    public const FUNCTION_PREFIX = [
        'c_function' => "#include <stdio.h>\n#include <stdlib.h>\n#include <ctype.h>\n#include <string.h>\n"
            . "#include <stdbool.h>\n#include <math.h>",
        'cpp_function' => "#include <iostream>\n#include <fstream>\n#include <string>\n#include <math.h>\n"
            . "#include <vector>\n#include <algorithm>\n\nusing namespace std;",
    ];

    /**
     * Convert a Moodle XML string containing CodeRunner questions into CodeLab Moodle XML.
     *
     * @param string $xml raw XML content
     * @return array converted XML, lists of converted and skipped items, and optional error code
     */
    public static function convert_xml(string $xml): array {
        $prev = libxml_use_internal_errors(true);
        libxml_clear_errors();
        $src = new DOMDocument('1.0', 'UTF-8');
        $loaded = trim($xml) !== '' && $src->loadXML($xml, LIBXML_NONET | LIBXML_NOCDATA);
        libxml_clear_errors();
        libxml_use_internal_errors($prev);

        if (!$loaded || !$src->documentElement || $src->documentElement->tagName !== 'quiz') {
            return ['xml' => '', 'converted' => [], 'skipped' => [], 'error' => 'invalidxml'];
        }

        $out = new DOMDocument('1.0', 'UTF-8');
        $out->formatOutput = true;
        $quiz = $out->createElement('quiz');
        $out->appendChild($quiz);

        $converted = [];
        $skipped = [];

        foreach ($src->documentElement->childNodes as $node) {
            if (!($node instanceof DOMElement) || $node->tagName !== 'question') {
                continue;
            }
            $qtype = $node->getAttribute('type');
            if ($qtype === 'category') {
                $quiz->appendChild($out->importNode($node, true));
                continue;
            }
            if ($qtype !== 'coderunner') {
                continue;
            }

            $name = self::child_text($node, 'name');
            $type = trim(self::direct_text($node, 'coderunnertype'));
            $reason = self::skip_reason($node, $type);
            if ($reason !== null) {
                $skipped[] = ['name' => $name, 'type' => $type, 'reason' => $reason];
                continue;
            }

            $tests = self::extract_tests($node, $type);
            if (empty($tests)) {
                $skipped[] = ['name' => $name, 'type' => $type, 'reason' => 'notests'];
                continue;
            }

            $lang = self::LANGUAGES[$type];
            $qel = self::build_codelab_question($out, $node, $type, $lang, $tests);
            $quiz->appendChild($qel);
            $converted[] = [
                'name' => $name,
                'type' => $type,
                'language' => $lang,
                'tests' => count($tests),
            ];
        }

        return [
            'xml' => $out->saveXML(),
            'converted' => $converted,
            'skipped' => $skipped,
            'error' => null,
        ];
    }

    /**
     * First non-zero penalty from a CodeRunner penalty regime ("0, 0, 10, 20, ..."), as a 0..1 fraction.
     *
     * @param string $regime
     * @param float $default
     * @return float
     */
    public static function first_penalty(string $regime, float $default): float {
        $trimmed = trim($regime);
        if ($trimmed === '') {
            return $default;
        }
        foreach (preg_split('/\s*,\s*/', $trimmed) as $value) {
            if (is_numeric($value) && (float) $value > 0) {
                return min(1.0, (float) $value / 100.0);
            }
        }
        return 0.0;
    }

    /**
     * Why a CodeRunner question element cannot be converted, or null if supported.
     *
     * @param DOMElement $node
     * @param string $type
     * @return string|null
     */
    private static function skip_reason(DOMElement $node, string $type): ?string {
        if ((int) self::direct_text($node, 'prototypetype') !== 0) {
            return 'prototype';
        }
        if (!isset(self::LANGUAGES[$type])) {
            return 'unsupportedtype:' . $type;
        }
        if (trim(self::direct_text($node, 'template')) !== '') {
            return 'customtemplate';
        }
        if ((int) self::direct_text($node, 'attachments') > 0) {
            return 'attachments';
        }
        if (trim(self::direct_text($node, 'grader')) === 'TemplateGrader') {
            return 'templategrader';
        }
        $ui = trim(self::direct_text($node, 'uiplugin'));
        if ($ui !== '' && !in_array($ui, ['ace', 'none'], true)) {
            return 'uiplugin:' . $ui;
        }
        return null;
    }

    /**
     * Extract CodeLab test cases from a CodeRunner question element.
     *
     * @param DOMElement $node
     * @param string $type
     * @return array
     */
    private static function extract_tests(DOMElement $node, string $type): array {
        $withcode = in_array($type, ['c_function', 'cpp_function', 'python3', 'java_method', 'java_class'], true);
        $tests = [];
        $container = self::direct_child($node, 'testcases');
        if (!$container) {
            return [];
        }
        foreach ($container->childNodes as $tc) {
            if (!($tc instanceof DOMElement) || $tc->tagName !== 'testcase') {
                continue;
            }
            if ((int) $tc->getAttribute('testtype') === 1) {
                // Precheck-only testcase.
                continue;
            }
            $code = $withcode ? rtrim(grader::unix(self::child_text($tc, 'testcode'))) : '';
            if ($code !== '' && in_array($type, ['c_function', 'cpp_function'], true) && !preg_match('/[;}]$/', $code)) {
                $code .= ';';
            }
            $mark = $tc->getAttribute('mark');
            $display = strtoupper(trim(self::child_text($tc, 'display')));
            $hiderestiffail = (int) $tc->getAttribute('hiderestiffail');
            $hidden = ($display !== '' && $display !== 'SHOW') || ($display === '' && $hiderestiffail > 0);
            $tests[] = [
                'stdin' => grader::unix(self::child_text($tc, 'stdin')),
                'expected' => grader::unix(self::child_text($tc, 'expected')),
                'code' => $code,
                'hidden' => $hidden,
                'weight' => is_numeric($mark) ? max(0.0, (float) $mark) : 1.0,
            ];
        }
        return $tests;
    }

    /**
     * Build a native <question type="codelab"> DOMElement from a CodeRunner question.
     *
     * @param DOMDocument $doc
     * @param DOMElement $src
     * @param string $type
     * @param string $lang
     * @param array $tests
     * @return DOMElement
     */
    private static function build_codelab_question(
        DOMDocument $doc,
        DOMElement $src,
        string $type,
        string $lang,
        array $tests
    ): DOMElement {
        $q = $doc->createElement('question');
        $q->setAttribute('type', 'codelab');

        // Copy standard Moodle question elements.
        foreach (['name', 'questiontext', 'generalfeedback', 'defaultgrade', 'hidden', 'idnumber', 'tags'] as $tag) {
            $child = self::direct_child($src, $tag);
            if ($child) {
                $q->appendChild($doc->importNode($child, true));
            }
        }

        $defaultpenalty = (float) (self::direct_text($src, 'penalty') ?: 0.1);
        $penalty = self::first_penalty(self::direct_text($src, 'penaltyregime'), $defaultpenalty);
        $q->appendChild($doc->createElement('penalty', (string) $penalty));

        $grader = trim(self::direct_text($src, 'grader'));
        $fields = [
            'language' => $lang,
            'template' => grader::unix(self::direct_text($src, 'answerpreload')),
            'solution' => grader::unix(self::direct_text($src, 'answer')),
            'prefix' => self::FUNCTION_PREFIX[$type] ?? '',
            'suffix' => '',
            'tests' => json_encode($tests, JSON_UNESCAPED_UNICODE),
            'showtests' => '1',
            'comparison' => $grader === 'RegexGrader' ? 'regex' : 'spaces',
            'tolerance' => '0.001',
            'cputime' => (string) max(0, (int) self::direct_text($src, 'cputimelimitsecs')),
            'memorylimit' => (string) max(0, (int) self::direct_text($src, 'memlimitmb')),
            'noassist' => '0',
            'parsons' => '0',
            'distractors' => '',
            'aihints' => '0',
            'timelimit' => '0',
            'ordercheck' => '0',
            'files' => '[]',
            'gaps' => '0',
            'compiler' => '',
            'std' => '',
            'rules' => '',
        ];

        foreach ($fields as $key => $val) {
            $el = $doc->createElement($key);
            $el->appendChild($doc->createTextNode($val));
            $q->appendChild($el);
        }

        return $q;
    }

    /**
     * Find a direct child element by tag name.
     *
     * @param DOMElement $parent
     * @param string $tag
     * @return DOMElement|null
     */
    private static function direct_child(DOMElement $parent, string $tag): ?DOMElement {
        foreach ($parent->childNodes as $child) {
            if ($child instanceof DOMElement && $child->tagName === $tag) {
                return $child;
            }
        }
        return null;
    }

    /**
     * Text content of a direct child element (e.g. <coderunnertype>c_program</coderunnertype>).
     *
     * @param DOMElement $parent
     * @param string $tag
     * @return string
     */
    private static function direct_text(DOMElement $parent, string $tag): string {
        $el = self::direct_child($parent, $tag);
        return $el ? (string) $el->textContent : '';
    }

    /**
     * Text content of a nested <tag><text>...</text></tag> element (or direct text if no <text> child).
     *
     * @param DOMElement $parent
     * @param string $tag
     * @return string
     */
    private static function child_text(DOMElement $parent, string $tag): string {
        $el = self::direct_child($parent, $tag);
        if (!$el) {
            return '';
        }
        $text = self::direct_child($el, 'text');
        return $text ? (string) $text->textContent : (string) $el->textContent;
    }
}
