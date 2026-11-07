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
import {createEditor} from 'tiny_codelab/monaco';
import {run} from 'tiny_codelab/runner';
import {showRunning, showResult, showError} from 'tiny_codelab/console';
import {available as pythonAvailable} from 'tiny_codelab/python';
import {PythonSession} from 'tiny_codelab/session';
import {fullscreenButton} from 'tiny_codelab/fullscreen';
import {RemoteSession, runsInteractively, stepsInteractively} from 'tiny_codelab/remote';
import {getStrings} from 'core/str';

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

export const init = async(config) => {
    const modes = runModes(config);
    const textarea = document.getElementById(config.textareaid);
    if (!textarea) {
        return;
    }
    const keys = ['run', 'input', 'output', 'runtests', 'testpassed', 'testfailed', 'testsof', 'editorlabel', 'step', 'stop',
        'fullscreen', 'exitfullscreen'];
    const values = await getStrings(keys.map((key) => ({key, component: key.startsWith('test') || key === 'runtests'
        ? 'qtype_codelab' : 'tiny_codelab'})));
    const s = Object.fromEntries(keys.map((key, i) => [key, values[i]]));

    const host = document.createElement('div');
    host.className = 'qtype_codelab-editor border rounded';
    textarea.after(host);

    let editor;
    try {
        editor = await createEditor(host, {
            value: textarea.value,
            lang: config.lang,
            readOnly: config.readonly,
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
    editor.onChange((value) => {
        textarea.value = value;
    });
    if (config.readonly) {
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
    const panel = document.createElement('div');
    panel.className = 'tiny_codelab-console mt-2';
    panel.setAttribute('role', 'status');
    panel.setAttribute('aria-label', s.output);
    panel.hidden = true;
    // SQL reads no input.
    stdinLabel.hidden = stdin.hidden = config.lang === 'mysql';
    tools.append(stdinLabel, stdin, runButton);
    [stepButton, stopButton, testsButton].filter(Boolean).forEach((b) => tools.append(b));
    const vars = document.createElement('div');
    vars.className = 'tiny_codelab-vars mt-2';
    vars.hidden = true;
    tools.append(panel, vars);
    host.after(tools);
    // The editor, its buttons and the console on the whole screen (the block of the answer).
    tools.insertBefore(fullscreenButton({root: host.parentElement, editor, label: s.fullscreen,
        exitLabel: s.exitfullscreen}), panel);

    const code = () => program(config.prefix, editor.getValue(), config.suffix);
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
            options.program = () => testProgram(config.lang, program('', editor.getValue(), config.suffix),
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
                config.contextid));
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
            for (const [i, tc] of config.tests.entries()) {
                const result = await run(config.lang, testProgram(config.lang, code(), tc.code), tc.stdin, config.contextid);
                if (result.status !== 'ok') {
                    // A compilation error or a server problem: show it as a normal run.
                    await showResult(panel, result);
                    return;
                }
                const ok = matches(tc.expected, result.stdout, config.comparison, config.tolerance);
                passed += ok ? 1 : 0;
                const item = document.createElement('li');
                item.className = ok ? 'text-success' : 'text-danger';
                item.textContent = (ok ? s.testpassed : s.testfailed).replace('{$a}', i + 1);
                if (!ok) {
                    const detail = document.createElement('pre');
                    detail.className = 'tiny_codelab-console-output';
                    detail.textContent = `${tc.stdin ? `${s.input}:\n${tc.stdin}\n` : ''}${s.output}:\n${result.stdout}`;
                    item.append(detail);
                }
                list.append(item);
            }
            panel.replaceChildren();
            const summary = document.createElement('div');
            summary.className = 'tiny_codelab-console-status' + (passed === config.tests.length ? ' tiny_codelab-status-ok' : '');
            summary.textContent = s.testsof.replace('{$a->passed}', passed).replace('{$a->total}', config.tests.length);
            panel.append(summary, list);
        } catch (e) {
            await showError(panel, e);
        } finally {
            busy(false);
        }
    });
};
