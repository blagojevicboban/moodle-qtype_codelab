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
 * The answer of a CodeLab question: a Monaco editor in place of the text area, Run with an input, and a check of the
 * tests that are not hidden. The grade is computed only on the server when the answer is submitted.
 *
 * @module     qtype_codelab/attempt
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
import {Parsons} from 'qtype_codelab/parsons';
import {createEditor, createDiffEditor} from 'tiny_codelab/monaco';
import {createFileTabs} from 'tiny_codelab/filetabs';
import {run} from 'tiny_codelab/runner';
import {showRunning, showResult, showError} from 'tiny_codelab/console';
import {liveRegion} from 'tiny_codelab/announce';
import {available as pythonAvailable} from 'tiny_codelab/python';
import {PythonSession} from 'tiny_codelab/session';
import {fullscreenButton} from 'tiny_codelab/fullscreen';
import {RemoteSession, runsInteractively, stepsInteractively} from 'tiny_codelab/remote';
import {getStrings} from 'core/str';
import Ajax from 'core/ajax';
import Templates from 'core/templates';
import {addClassWork} from './classwork';
import {hasSqlSchema, renderSqlSchema} from 'tiny_codelab/sqlschema';
import {watchErrors} from 'tiny_codelab/aihint';

/**
 * The program that is run: hidden code before and after the student's code (as grader::program on the server).
 *
 * @param {string} prefix
 * @param {string} code
 * @param {string} suffix
 * @returns {string}
 */
export const program = (prefix, code, suffix) =>
    [prefix, code, suffix].map((p) => p.replace(/\n+$/, '')).filter((p) => p !== '').join('\n') + '\n';

/** Place of the test code in the hidden code (as grader::MARKER). */
const MARKER = '{{TEST}}';

const UNIT_C_RE = /\b(?:TEST|ASSERT_EQ|ASSERT_NE|ASSERT_TRUE|ASSERT_FALSE|ASSERT_NEAR|ASSERT_STREQ)\s*\(/;
const UNIT_PY_RE = /\b(?:assert_eq|assert_ne|assert_true|assert_false|assert_near)\s*\(/;

/**
 * Whether a test's code uses unit-test assertions (as unittest::is_unit_test on the server).
 *
 * @param {string} lang
 * @param {string} testcode
 * @returns {boolean}
 */
export const isUnitTest = (lang, testcode) => {
    const code = String(testcode || '');
    if (!code) {
        return false;
    }
    if (lang === 'c' || lang === 'cpp') {
        return UNIT_C_RE.test(code);
    }
    return lang === 'python' && UNIT_PY_RE.test(code);
};

/**
 * Self-contained unit-test harness for C, C++ or Python (mirrors unittest::wrap on the server).
 *
 * @param {string} lang
 * @param {string} whole
 * @param {string} code
 * @returns {string}
 */
const wrapUnitTest = (lang, whole, code) => {
    if (lang === 'python') {
        const harness = [
            'import sys as _cl_sys',
            'def assert_true(c, msg=""):',
            '    if not c:',
            '        _cl_sys.stderr.write("FAIL: expected true" + (": " + str(msg) if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_false(c, msg=""):',
            '    if c:',
            '        _cl_sys.stderr.write("FAIL: expected false" + (": " + str(msg) if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_eq(a, b, msg=""):',
            '    if a != b:',
            '        _cl_sys.stderr.write(f"FAIL: expected {b!r}, got {a!r}" + (f": {msg}" if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_ne(a, b, msg=""):',
            '    if a == b:',
            '        _cl_sys.stderr.write(f"FAIL: expected value != {b!r}" + (f": {msg}" if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_near(a, b, eps=1e-6, msg=""):',
            '    if abs(a - b) > eps:',
            '        _cl_sys.stderr.write(f"FAIL: expected {b} +- {eps}, got {a}" + (f": {msg}" if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
        ].join('\n');
        return `${whole}\n${harness}\n${code}\n`;
    }
    const harness = lang === 'cpp' ? [
        '#include <iostream>',
        '#include <string>',
        '#include <cmath>',
        'static int _cl_fail = 0;',
        '#define ASSERT_TRUE(c) do { if (!(c)) { std::cerr << "FAIL: expected true (" << #c << ")\\n";' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_FALSE(c) do { if (c) { std::cerr << "FAIL: expected false (" << #c << ")\\n";' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_EQ(a, b) do { auto _a = (a); auto _b = (b); if (!(_a == _b)) {' +
            ' std::cerr << "FAIL: " << #a << " == " << #b << " (expected " << _b << ", got " << _a << ")\\n";' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_NE(a, b) do { auto _a = (a); auto _b = (b); if (_a == _b) {' +
            ' std::cerr << "FAIL: " << #a << " != " << #b << " (both " << _a << ")\\n";' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_NEAR(a, b, eps) do { double _a = (double)(a), _b = (double)(b), _e = (double)(eps);' +
            ' if (std::fabs(_a - _b) > _e) { std::cerr << "FAIL: " << #a << " ~= " << #b' +
            ' << " (expected " << _b << " +- " << _e << ", got " << _a << ")\\n"; _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_STREQ(a, b) do { std::string _a(a), _b(b); if (_a != _b) {' +
            ' std::cerr << "FAIL: " << #a << " == " << #b << " (expected \\"" << _b << "\\", got \\"" << _a << "\\")\\n";' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define TEST(name) static void _cl_test_##name(void)',
    ].join('\n') : [
        '#include <stdio.h>',
        '#include <stdlib.h>',
        '#include <string.h>',
        '#include <math.h>',
        'static int _cl_fail = 0;',
        '#define ASSERT_TRUE(c) do { if (!(c)) { fprintf(stderr, "FAIL: expected true (%s)\\n", #c);' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_FALSE(c) do { if (c) { fprintf(stderr, "FAIL: expected false (%s)\\n", #c);' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_EQ(a, b) do { double _a = (double)(a), _b = (double)(b); if (_a != _b) {' +
            ' fprintf(stderr, "FAIL: %s == %s (expected %.10g, got %.10g)\\n", #a, #b, _b, _a);' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_NE(a, b) do { double _a = (double)(a), _b = (double)(b); if (_a == _b) {' +
            ' fprintf(stderr, "FAIL: %s != %s (both %.10g)\\n", #a, #b, _a);' +
            ' _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_NEAR(a, b, eps) do { double _a = (double)(a), _b = (double)(b), _e = (double)(eps);' +
            ' if (fabs(_a - _b) > _e) { fprintf(stderr, "FAIL: %s ~= %s (expected %.10g +- %.10g, got %.10g)\\n",' +
            ' #a, #b, _b, _e, _a); _cl_fail = 1; return; } } while (0)',
        '#define ASSERT_STREQ(a, b) do { const char *_a = (a), *_b = (b);' +
            ' if (!_a || !_b || strcmp(_a, _b) != 0) {' +
            ' fprintf(stderr, "FAIL: %s == %s (expected \\"%s\\", got \\"%s\\")\\n",' +
            ' #a, #b, _b ? _b : "(null)", _a ? _a : "(null)"); _cl_fail = 1; return; } } while (0)',
        '#define TEST(name) static void _cl_test_##name(void)',
    ].join('\n');
    const main = lang === 'cpp' ? 'int main()' : 'int main(void)';
    const tests = [...code.matchAll(/\bTEST\s*\(\s*([A-Za-z_]\w*)\s*\)/g)].map((m) => m[1]);
    if (tests.length) {
        const calls = tests.map((n) => `    _cl_test_${n}();\n    if (_cl_fail) { return 1; }`).join('\n');
        return `${whole}\n${harness}\n${code}\n${main}\n{\n${calls}\n    return 0;\n}\n`;
    }
    return `${whole}\n${harness}\nstatic void _cl_run(void)\n{\n    ${code.split('\n').join('\n    ')}\n}\n` +
        `${main}\n{\n    _cl_run();\n    return _cl_fail;\n}\n`;
};

/**
 * The program of one test (as grader::test_program on the server): the test code replaces the marker; without it a C
 * or C++ program without main gets one, and other languages get the test code at the end.
 *
 * @param {string} lang
 * @param {string} whole the whole program (see program())
 * @param {string} testcode may be empty
 * @returns {string}
 */
export const testProgram = (lang, whole, testcode) => {
    const code = (testcode || '').replace(/\r\n?/g, '\n').replace(/\n+$/, '');
    const at = whole.indexOf(MARKER);
    if (at >= 0) {
        const linestart = whole.lastIndexOf('\n', at) + 1;
        const indent = whole.slice(linestart, at).match(/^[ \t]*/)[0];
        return whole.slice(0, at) + code.split('\n').join('\n' + indent) + whole.slice(at + MARKER.length);
    }
    if (code === '') {
        return whole;
    }
    if (isUnitTest(lang, code) && !/\bmain\s*\(/.test(whole)) {
        return wrapUnitTest(lang, whole, code);
    }
    if ((lang === 'c' || lang === 'cpp') && !/\bmain\s*\(/.test(whole)) {
        const main = lang === 'c' ? 'int main(void)' : 'int main()';
        return `${whole}\n${main}\n{\n    ${code.split('\n').join('\n    ')}\n    return 0;\n}\n`;
    }
    return `${whole}${code}\n`;
};

/**
 * Lines of the hidden code before the student's code in program().
 *
 * @param {string} prefix
 * @returns {number}
 */
export const prefixLines = (prefix) => {
    const text = prefix.replace(/\n+$/, '');
    return text === '' ? 0 : text.split('\n').length;
};

/**
 * Output prepared for the comparison (as grader::normalise on the server).
 *
 * @param {string} text
 * @param {boolean} ignorespaces
 * @returns {string}
 */
export const normalise = (text, ignorespaces) => {
    const unix = text.replace(/\r\n?/g, '\n');
    return ignorespaces ? unix.split('\n').map((l) => l.replace(/\s+$/, '')).join('\n').replace(/\n+$/, '') : unix;
};

/**
 * Whether a word is a number as programs print them (as grader::is_number).
 *
 * @param {string} word
 * @returns {boolean}
 */
const isNumber = (word) => /^[+-]?(\d+\.?\d*|\.\d+)([eE][+-]?\d+)?$/.test(word);

/**
 * Word by word, numbers within the tolerance (as grader::numbers_match).
 *
 * @param {string} expected
 * @param {string} got
 * @param {number} tolerance
 * @returns {boolean}
 */
const numbersMatch = (expected, got, tolerance) => {
    const split = (text) => text.split(/\s+/).filter((w) => w !== '');
    const a = split(expected);
    const b = split(got);
    return a.length === b.length && a.every((word, i) => {
        if (word === b[i]) {
            return true;
        }
        if (!isNumber(word) || !isNumber(b[i])) {
            return false;
        }
        const x = parseFloat(word);
        const y = parseFloat(b[i]);
        const diff = Math.abs(x - y);
        return diff <= tolerance || diff <= tolerance * Math.max(Math.abs(x), Math.abs(y));
    });
};

/**
 * Whether the output matches the expected output (as grader::matches on the server). A regular expression is run by
 * the browser, so a pattern with PCRE-only syntax may give another result than the grade.
 *
 * @param {string} expected
 * @param {string} got
 * @param {string} comparison exact, spaces, numbers or regex
 * @param {number} tolerance
 * @returns {boolean}
 */
export const matches = (expected, got, comparison, tolerance) => {
    const unix = (text) => text.replace(/\r\n?/g, '\n');
    switch (comparison) {
        case 'exact':
            return unix(expected) === unix(got);
        case 'numbers':
            return numbersMatch(expected, got, tolerance);
        case 'unordered':
            return normalise(expected, true).split('\n').sort().join('\n') ===
                normalise(got, true).split('\n').sort().join('\n');
        case 'regex':
            try {
                return new RegExp(`^(?:${unix(expected).replace(/\n+$/, '')})$`, 'u').test(normalise(got, true));
            } catch (e) {
                return false;
            }
        default:
            return normalise(expected, true) === normalise(got, true);
    }
};

/**
 * The first line where the output differs from the expected output (as grader::first_difference on the server), or null
 * for the comparisons that do not compare line by line.
 *
 * @param {string} expected
 * @param {string} got
 * @param {string} comparison
 * @returns {number|null} line from 0
 */
export const firstDifference = (expected, got, comparison) => {
    if (['numbers', 'regex', 'unordered'].includes(comparison)) {
        return null;
    }
    const ignorespaces = comparison !== 'exact';
    const a = normalise(expected, ignorespaces).split('\n');
    const b = normalise(got, ignorespaces).split('\n');
    for (let i = 0; i < Math.max(a.length, b.length); i++) {
        if (a[i] !== b[i]) {
            return i;
        }
    }
    return null;
};

/**
 * Lines of an output for the display of a test (as grader::display_lines on the server): spaces and tabs at the end of
 * a line visible, each new line as a return arrow at the end of its line, the line differs marked.
 *
 * @param {string} text
 * @param {number|null} differs line from 0 to mark
 * @returns {Array<{text: string, differs: boolean}>}
 */
export const displayLines = (text, differs = null) => {
    const lines = text.replace(/\r\n?/g, '\n').split('\n');
    // Lines before this one end with a new line, shown as a return arrow.
    const newlines = lines.length - 1;
    if (lines.length > 1 && lines[lines.length - 1] === '' && differs !== lines.length - 1) {
        lines.pop();
    }
    if (differs !== null && differs >= lines.length) {
        // The other output is longer: the missing line is shown empty and marked.
        lines.push(...Array(differs + 1 - lines.length).fill(''));
    }
    return lines.map((line, i) => ({
        text: line.replace(/[ \t]+$/, (tail) => tail.replace(/ /g, '\u00B7').replace(/\t/g, '\u2192'))
            + (i < newlines ? '\u21B5' : ''),
        differs: i === differs,
    }));
};

/**
 * A button.
 *
 * @param {string} text
 * @param {string} style
 * @returns {HTMLButtonElement}
 */
const button = (text, style) => {
    const b = document.createElement('button');
    b.type = 'button';
    b.className = `btn ${style} btn-sm me-2`;
    b.textContent = text;
    return b;
};

/**
 * Turn the text area of the answer into a code editor.
 *
 * @param {Object} config
 * @param {string} config.textareaid
 * @param {string} config.lang
 * @param {boolean} config.readonly
 * @param {boolean} config.noassist
 * @param {string} config.prefix
 * @param {string} config.suffix
 * @param {Array<{stdin: string, expected: string, code: string}>} config.tests tests that are not hidden
 * @param {string} config.comparison exact, spaces, numbers or regex
 * @param {number} config.tolerance for the comparison numbers
 * @param {number} config.contextid
 * @param {string} config.pyodide address of Pyodide for Run and Step of Python in the browser, or ''
 * @param {string[]} [config.interactive] languages that Run sends to the interactive server (input typed while running)
 * @param {?string[]} [config.parsons] a Parsons problem: the shuffled lines the student puts in order
 */
/**
 * How the answer runs besides Jobe: Python in the browser, or the interactive server (C and C++ also step by step).
 *
 * @param {Object} config of init()
 * @returns {{browser: boolean, remote: boolean, steps: boolean}}
 */
const runModes = (config) => {
    const browser = Boolean(config.lang === 'python' && config.pyodide && pythonAvailable());
    const remote = !browser && runsInteractively(config.interactive, config.lang);
    return {browser, remote, steps: browser || (remote && stepsInteractively(config.interactive, config.lang))};
};

/**
 * The lists of a Parsons problem, put before the editor; start() connects them to the editor.
 *
 * @param {Object} config of init()
 * @param {HTMLTextAreaElement} textarea the answer
 * @param {HTMLElement} host the editor's element
 * @returns {Promise<{start: function(function(string): void): void}>}
 */
/**
 * Check order of a Parsons problem: a button that asks the server how many lines are in their place (never which) and
 * says it in a live region.
 *
 * @param {Object} config of init, with ordercheck {usageid, slot}
 * @param {HTMLTextAreaElement} textarea the answer: the program made of the lines
 * @param {HTMLElement} before the button and its result go before this element
 * @param {Object<string, string>} strings
 */
const checkOrderButton = (config, textarea, before, strings) => {
    const row = document.createElement('div');
    row.className = 'qtype_codelab-checkorder d-flex align-items-center gap-2 mb-2';
    const checkButton = document.createElement('button');
    checkButton.type = 'button';
    checkButton.className = 'btn btn-secondary btn-sm';
    checkButton.textContent = strings.checkorder;
    const result = document.createElement('span');
    result.setAttribute('role', 'status');
    row.append(checkButton, result);
    before.before(row);
    checkButton.addEventListener('click', async() => {
        checkButton.disabled = true;
        result.textContent = '';
        try {
            const [answer] = await Promise.all(Ajax.call([{methodname: 'qtype_codelab_check_order', args: {
                usageid: config.ordercheck.usageid, slot: config.ordercheck.slot, answer: textarea.value}}]));
            result.textContent = strings.orderresult.replace('{$a->placed}', answer.placed)
                .replace('{$a->total}', answer.total);
        } catch (e) {
            result.textContent = strings.ordercheckfailed;
        } finally {
            checkButton.disabled = false;
        }
    });
};

const parsonsBox = async(config, textarea, host) => {
    const keys = ['parsonspool', 'parsonsanswer', 'parsonshint', 'parsonsadd', 'parsonsremove', 'parsonsup', 'parsonsdown',
        'parsonsindent', 'parsonsoutdent', 'parsonsprogram', 'parsonsgap', 'checkorder', 'orderresult', 'ordercheckfailed'];
    const values = await getStrings(keys.map((key) => ({key, component: 'qtype_codelab'})));
    const strings = Object.fromEntries(keys.map((key, i) => [key, values[i]]));
    const box = document.createElement('div');
    box.className = 'qtype_codelab-parsons mb-2';
    box.id = `${config.textareaid}_parsons`;
    const note = document.createElement('div');
    note.className = 'qtype_codelab-parsons-note small mb-1';
    note.textContent = strings.parsonsprogram;
    host.before(box, note);
    if (config.ordercheck) {
        checkOrderButton(config, textarea, note, strings);
    }
    return {
        start: (show) => {
            const widget = new Parsons(box, {blocks: config.parsons, answer: textarea.value, indented: config.lang === 'python',
                strings, onChange: show});
            widget.changed();
        },
    };
};

/** Tests of "Run the tests" that run at the same time. */
export const PARALLEL_TESTS = 3;

/**
 * Run a task for each item, at most limit at the same time; the results come in the order of the items. When a
 * result is final (stop gives true, for example a compilation error or the rate limit), or a task fails, no new task
 * starts: the results of the items not started are missing (undefined), and the ones already started still finish.
 *
 * @param {Array} items
 * @param {function(*, number): Promise<*>} task
 * @param {number} [limit]
 * @param {function(*): boolean} [stop]
 * @returns {Promise<Array>}
 */
export const runPool = async(items, task, limit = PARALLEL_TESTS, stop = () => false) => {
    const results = new Array(items.length);
    let next = 0;
    let stopped = false;
    const lane = async() => {
        while (!stopped && next < items.length) {
            const i = next++;
            try {
                results[i] = await task(items[i], i);
            } catch (e) {
                stopped = true;
                throw e;
            }
            if (stop(results[i])) {
                stopped = true;
            }
        }
    };
    const lanes = Array.from({length: Math.max(1, Math.min(limit, items.length))}, lane);
    const settled = await Promise.allSettled(lanes);
    const failed = settled.find((r) => r.status === 'rejected');
    if (failed) {
        throw failed.reason;
    }
    return results;
};

/**
 * Whether a test ran longer than the time limit of the question.
 *
 * @param {number|null} time seconds of the run, null when the server gave none
 * @param {number} limit seconds, 0 for no limit
 * @returns {boolean}
 */
export const tooSlow = (time, limit) => limit > 0 && time !== null && time > limit;

/**
 * Seconds of a test as shown to students: 2 decimals, at least 0.01 (as the feedback shows them).
 *
 * @param {number} time
 * @returns {string}
 */
export const seconds = (time) => Math.max(0.01, time).toFixed(2);

/**
 * Peak memory of a test in MB as shown to students: 1 decimal, at least 0.1 (as the feedback shows it).
 *
 * @param {number} kb peak RSS in kilobytes
 * @returns {string}
 */
export const megabytes = (kb) => Math.max(0.1, kb / 1024).toFixed(1);

/**
 * Attach read-only companion file tabs when the question has input/source files, and keep textarea synced with main.
 *
 * @param {Object} args
 * @param {HTMLElement} args.host
 * @param {import('tiny_codelab/monaco').CodeEditor} args.editor
 * @param {Object} args.config
 * @param {HTMLTextAreaElement} args.textarea
 * @param {?Object} args.parsons
 * @param {Object<string, string>} args.s
 * @returns {{questionFiles: Array, tabs: ?Object, getMain: function(): string}}
 */
const setupFileTabs = ({host, editor, config, textarea, parsons, s}) => {
    const questionFiles = Array.isArray(config.files) ? config.files : [];
    const tabs = questionFiles.length ? createFileTabs({
        host,
        editor,
        lang: config.lang,
        initialMain: textarea.value,
        files: questionFiles,
        readOnlyMain: config.readonly || Boolean(parsons),
        readOnlyFiles: true,
        label: s.filescount.replace('{$a}', questionFiles.length + 1),
    }) : null;
    const getMain = () => (tabs ? tabs.getMain() : editor.getValue());
    if (tabs) {
        tabs.onMainChange((value) => {
            textarea.value = value;
        });
    } else {
        editor.onChange((value) => {
            textarea.value = value;
        });
    }
    parsons?.start((prog) => (tabs ? tabs.setMain(prog) : editor.setValue(prog)));
    return {questionFiles, tabs, getMain};
};

/**
 * Format time and peak memory suffix for a test item.
 *
 * @param {?number} time
 * @param {?number} memory
 * @param {Object<string, string>} s
 * @returns {string}
 */
const formatStats = (time, memory, s) => {
    if (time === null) {
        return '';
    }
    return memory !== null
        ? ` (${s.testtimemem.replace('{$a->time}', seconds(time)).replace('{$a->memory}', megabytes(memory))})`
        : ` (${s.testtime.replace('{$a}', seconds(time))})`;
};

/**
 * Render one test result item in "Run the tests".
 *
 * @param {Object} args
 * @param {number} args.i 0-based test index
 * @param {Object} args.tc test case
 * @param {Object} args.result run result
 * @param {boolean} args.unitFail true when a unit-test assertion failed
 * @param {Object} args.config question config
 * @param {Object<string, string>} args.s strings
 * @returns {Promise<{item: HTMLLIElement, ok: boolean}>}
 */
const renderTestItem = async({i, tc, result, unitFail, config, s}) => {
    const unitTest = isUnitTest(config.lang, tc.code) && tc.expected.trim() === '';
    const same = !unitFail && (unitTest || matches(tc.expected, result.stdout, config.comparison, config.tolerance));
    const time = typeof result.time === 'number' ? result.time : null;
    const memory = typeof result.memory === 'number' && result.memory > 0 ? result.memory : null;
    const slow = tooSlow(time, config.timelimit);
    const ok = same && !slow;
    const item = document.createElement('li');
    item.className = ok ? 'text-success' : 'text-danger';
    item.textContent = (ok ? s.testpassed : s.testfailed).replace('{$a}', i + 1) + formatStats(time, memory, s);
    if (slow) {
        const detail = document.createElement('div');
        detail.textContent = s.tooslow.replace('{$a->time}', seconds(time))
            .replace('{$a->limit}', String(config.timelimit));
        item.append(detail);
    }
    if (unitFail) {
        const detail = document.createElement('pre');
        detail.className = 'mb-1 small text-danger';
        detail.textContent = (result.stderr || '').trim();
        item.append(detail);
    } else if (!same) {
        const differs = firstDifference(tc.expected, result.stdout, config.comparison);
        const {html, js} = await Templates.renderForPromise('qtype_codelab/testcompare', {
            stdin: tc.stdin,
            expected: {lines: displayLines(tc.expected, differs)},
            got: {lines: displayLines(result.stdout, differs)},
        });
        const detail = document.createElement('div');
        item.append(detail);
        Templates.replaceNodeContents(detail, html, js);
    }
    return {item, ok};
};

/**
 * Optional Tables button and schema panel for MySQL questions with a hidden CREATE TABLE prefix.
 *
 * @param {Object} config
 * @param {Object<string, string>} s
 * @returns {{tablesButton: ?HTMLButtonElement, schemaPanel: ?HTMLElement}}
 */
const setupSqlSchema = (config, s) => {
    if (config.lang !== 'mysql' || !hasSqlSchema(config.prefix)) {
        return {tablesButton: null, schemaPanel: null};
    }
    const tablesButton = button(s.sqlschema, 'btn-secondary');
    const schemaPanel = document.createElement('div');
    schemaPanel.className = 'tiny_codelab-sqlschema mt-2';
    schemaPanel.hidden = true;
    tablesButton.setAttribute('aria-expanded', 'false');
    let rendered = false;
    tablesButton.addEventListener('click', async() => {
        if (!schemaPanel.hidden) {
            schemaPanel.hidden = true;
            tablesButton.setAttribute('aria-expanded', 'false');
            return;
        }
        if (!rendered) {
            rendered = await renderSqlSchema(schemaPanel, config.prefix);
        }
        schemaPanel.hidden = !rendered;
        tablesButton.setAttribute('aria-expanded', String(rendered));
    });
    return {tablesButton, schemaPanel};
};

/**
 * In review mode when Moodle allows showing the right answer, offer a side-by-side Monaco diff against the model solution.
 *
 * @param {HTMLElement} host
 * @param {string} answer
 * @param {Object} config
 * @param {Object<string, string>} s
 */
const setupSolutionDiff = (host, answer, config, s) => {
    if (!config.readonly || !config.solution) {
        return;
    }
    const bar = document.createElement('div');
    bar.className = 'qtype_codelab-diffbar mt-2';
    const toggle = button(s.comparesolution, 'btn-outline-secondary');
    toggle.setAttribute('aria-expanded', 'false');
    const box = document.createElement('div');
    box.className = 'qtype_codelab-diff border rounded mt-2';
    box.hidden = true;
    bar.append(toggle, box);
    host.after(bar);
    let diff = null;
    toggle.addEventListener('click', async() => {
        if (!box.hidden) {
            box.hidden = true;
            toggle.textContent = s.comparesolution;
            toggle.setAttribute('aria-expanded', 'false');
            return;
        }
        box.hidden = false;
        toggle.textContent = s.hidediff;
        toggle.setAttribute('aria-expanded', 'true');
        if (!diff) {
            diff = await createDiffEditor(box, {
                original: answer,
                modified: config.solution,
                lang: config.lang,
                label: s.comparesolution,
            });
        }
    });
};

export const init = async(config) => {
    const modes = runModes(config);
    const textarea = document.getElementById(config.textareaid);
    if (!textarea) {
        return;
    }
    const keys = ['run', 'input', 'output', 'runtests', 'testpassed', 'testfailed', 'testsof', 'testtime', 'testtimemem',
        'tooslow', 'editorlabel', 'step', 'stop', 'fullscreen', 'exitfullscreen', 'filescount', 'sqlschema',
        'comparesolution', 'hidediff'];
    const values = await getStrings(keys.map((key) => ({key, component: key.startsWith('test') || key === 'runtests'
        || key === 'tooslow' ? 'qtype_codelab' : 'tiny_codelab'})));
    const s = Object.fromEntries(keys.map((key, i) => [key, values[i]]));

    const host = document.createElement('div');
    host.className = 'qtype_codelab-editor border rounded';
    textarea.after(host);
    const parsons = Array.isArray(config.parsons) ? await parsonsBox(config, textarea, host) : null;

    let editor;
    try {
        editor = await createEditor(host, {
            value: textarea.value,
            lang: config.lang,
            // A Parsons problem is answered with the lines: the editor shows the program they make.
            readOnly: config.readonly || Boolean(parsons),
            noassist: config.noassist,
            // The review shows the whole answer without empty space; the attempt leaves room to write.
            minLines: config.readonly ? 3 : 12,
            maxLines: 40,
            label: s.editorlabel,
            pyodide: config.readonly ? '' : config.pyodide,
            // Breakpoints where Step exists: Python in the browser, C and C++ on the interactive server.
            breakpoints: !config.readonly && modes.steps,
        });
    } catch (e) {
        host.remove();
        return;
    }
    textarea.hidden = true;
    const {questionFiles, tabs, getMain} = setupFileTabs({host, editor, config, textarea, parsons, s});
    // The teacher in a quiz (review, preview, grading): the answers of the class and their analysis.
    if (config.classwork) {
        addClassWork(host, config.classwork);
    }
    if (config.readonly) {
        setupSolutionDiff(host, textarea.value, config, s);
        return;
    }

    const tools = document.createElement('div');
    tools.className = 'qtype_codelab-tools mt-2';
    const stdinLabel = document.createElement('label');
    stdinLabel.textContent = s.input;
    stdinLabel.htmlFor = `${config.textareaid}_stdin`;
    stdinLabel.className = 'form-label mb-1 d-block';
    const stdin = document.createElement('textarea');
    stdin.id = `${config.textareaid}_stdin`;
    stdin.className = 'form-control font-monospace mb-2';
    stdin.rows = 2;
    stdin.spellcheck = false;
    const runButton = button(s.run, 'btn-secondary');
    // Python runs in the browser when it can: input() asks while the program runs, Step goes line by line.
    const browser = modes.browser;
    // C, C++, Java and C# run on the interactive server when the site has one (C and C++ also step by step there);
    // the tests and the grade stay on Jobe.
    const remote = modes.remote;
    const steps = modes.steps;
    const stepButton = steps ? button(s.step, 'btn-secondary') : null;
    const stopButton = browser || remote ? button(s.stop, 'btn-danger') : null;
    const testsButton = config.tests.length ? button(s.runtests, 'btn-secondary') : null;
    const {tablesButton, schemaPanel} = setupSqlSchema(config, s);
    const panel = document.createElement('div');
    panel.className = 'tiny_codelab-console mt-2';
    // A scrolling region reachable by the keyboard, not live: the end of a run is read in a live region next to it
    // (tiny_codelab/announce), instead of every line while it is written.
    panel.setAttribute('role', 'region');
    panel.tabIndex = 0;
    panel.setAttribute('aria-label', s.output);
    panel.hidden = true;
    // SQL reads no input.
    stdinLabel.hidden = stdin.hidden = config.lang === 'mysql';
    tools.append(stdinLabel, stdin, runButton);
    [stepButton, stopButton, testsButton, tablesButton].filter(Boolean).forEach((b) => tools.append(b));
    const vars = document.createElement('div');
    vars.className = 'tiny_codelab-vars mt-2';
    vars.hidden = true;
    tools.append(panel, vars);
    if (schemaPanel) {
        tools.append(schemaPanel);
    }
    host.after(tools);
    // AI explanations of a compiler message or an error, when the question allows them (tiny_codelab 1.19).
    if (config.aihints) {
        watchErrors(panel, {contextid: config.contextid, lang: () => config.lang, code: () => code(),
            questionid: config.questionid});
    }
    // The editor, its buttons and the console on the whole screen (the block of the answer).
    tools.insertBefore(fullscreenButton({root: host.parentElement, editor, label: s.fullscreen,
        exitLabel: s.exitfullscreen}), panel);

    const code = () => program(config.prefix, getMain(), config.suffix);
    const busy = (value) => {
        runButton.disabled = value;
        if (testsButton) {
            testsButton.disabled = value;
        }
    };

    // Python in the browser or the interactive server: the same Run, Step and Stop.
    let session = null;
    if (browser || remote) {
        stopButton.hidden = true;
        const options = {
            editor,
            panel,
            vars,
            files: () => questionFiles,
            compiler: () => config.compiler || '',
            std: () => config.std || '',
            // As Run on the server: the call of the first test with test code, after the student's lines.
            program: () => testProgram(config.lang, code(), config.tests.find((tc) => tc.code)?.code || ''),
            offset: prefixLines(config.prefix),
            onState: (state) => {
                busy(state !== 'idle');
                runButton.disabled = state === 'running';
                if (stepButton) {
                    stepButton.disabled = state === 'running';
                }
                stopButton.hidden = state === 'idle';
            },
        };
        if (config.lang === 'mysql') {
            // SQL: the code before (tables and data) runs first without showing its output; Run shows the answer.
            options.setup = () => config.prefix;
            options.program = () => testProgram(config.lang, program('', getMain(), config.suffix),
                config.tests.find((tc) => tc.code)?.code || '');
            options.offset = 0;
        }
        session = browser
            ? new PythonSession({base: config.pyodide, ...options})
            : new RemoteSession({lang: config.lang, contextid: config.contextid, ...options});
        stepButton?.addEventListener('click', () => {
            if (session.state === 'paused') {
                session.step();
            } else if (session.state === 'idle') {
                tabs?.select(0);
                session.start(true, stdin.value);
            }
        });
        stopButton.addEventListener('click', () => session.stop());
    }

    runButton.addEventListener('click', async() => {
        if (session) {
            if (session.state === 'paused') {
                session.resume();
            } else if (session.state === 'idle') {
                vars.hidden = true;
                await session.start(false, stdin.value);
            }
            return;
        }
        busy(true);
        await showRunning(panel);
        try {
            // A question with function tests has no main of its own: Run calls the function as the first test does.
            const first = config.tests.find((tc) => tc.code)?.code || '';
            await showResult(panel, await run(config.lang, testProgram(config.lang, code(), first), stdin.value,
                config.contextid, questionFiles, config.compiler || '', config.std || ''));
        } catch (e) {
            await showError(panel, e);
        } finally {
            busy(false);
        }
    });

    testsButton?.addEventListener('click', async() => {
        busy(true);
        vars.hidden = true;
        await showRunning(panel);
        try {
            const list = document.createElement('ul');
            list.className = 'list-unstyled mb-0';
            let passed = 0;
            const answer = code();
            const isAssertFail = (result) => result.status === 'runtime' && /FAIL:/.test(result.stderr || '');
            // Up to three tests at the same time; the first result that is not a normal end (a compilation error, the
            // rate limit, a server problem) stops the tests that have not started, and is shown once.
            const results = await runPool(config.tests,
                (tc) => run(config.lang, testProgram(config.lang, answer, tc.code), tc.stdin, config.contextid,
                    questionFiles, config.compiler || '', config.std || ''),
                PARALLEL_TESTS, (result) => result.status !== 'ok' && !isAssertFail(result));
            for (const [i, tc] of config.tests.entries()) {
                const result = results[i];
                const unitFail = isAssertFail(result);
                if (result.status !== 'ok' && !unitFail) {
                    // A compilation error or a server problem: show it as a normal run.
                    await showResult(panel, result);
                    return;
                }
                const {item, ok} = await renderTestItem({i, tc, result, unitFail, config, s});
                passed += ok ? 1 : 0;
                list.append(item);
            }
            panel.replaceChildren();
            const summary = document.createElement('div');
            summary.className = 'tiny_codelab-console-status' + (passed === config.tests.length ? ' tiny_codelab-status-ok' : '');
            summary.textContent = s.testsof.replace('{$a->passed}', passed).replace('{$a->total}', config.tests.length);
            panel.append(summary, list);
            const region = liveRegion(panel);
            if (region) {
                region.textContent = summary.textContent;
            }
        } catch (e) {
            await showError(panel, e);
        } finally {
            busy(false);
        }
    });
};
