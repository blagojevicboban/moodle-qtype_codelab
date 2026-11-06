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
 * @param {Array<{stdin: string, expected: string}>} config.tests tests that are not hidden
 * @param {boolean} config.ignorespaces
 * @param {number} config.contextid
 * @param {string} config.pyodide address of Pyodide for Run and Step of Python in the browser, or ''
 */
export const init = async(config) => {
    const textarea = document.getElementById(config.textareaid);
    if (!textarea) {
        return;
    }
    const keys = ['run', 'input', 'output', 'runtests', 'testpassed', 'testfailed', 'testsof', 'editorlabel', 'step', 'stop'];
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
    const browser = config.lang === 'python' && config.pyodide && pythonAvailable();
    const stepButton = browser ? button(s.step, 'btn-secondary') : null;
    const stopButton = browser ? button(s.stop, 'btn-danger') : null;
    const testsButton = config.tests.length ? button(s.runtests, 'btn-secondary') : null;
    const panel = document.createElement('div');
    panel.className = 'tiny_codelab-console mt-2';
    panel.setAttribute('role', 'status');
    panel.setAttribute('aria-label', s.output);
    panel.hidden = true;
    tools.append(stdinLabel, stdin, runButton);
    [stepButton, stopButton, testsButton].filter(Boolean).forEach((b) => tools.append(b));
    const vars = document.createElement('div');
    vars.className = 'tiny_codelab-vars mt-2';
    vars.hidden = true;
    tools.append(panel, vars);
    host.after(tools);

    const code = () => program(config.prefix, editor.getValue(), config.suffix);
    const busy = (value) => {
        runButton.disabled = value;
        if (testsButton) {
            testsButton.disabled = value;
        }
    };

    let session = null;
    if (browser) {
        stopButton.hidden = true;
        session = new PythonSession({
            base: config.pyodide,
            editor,
            panel,
            vars,
            program: code,
            offset: prefixLines(config.prefix),
            onState: (state) => {
                busy(state !== 'idle');
                runButton.disabled = state === 'running';
                stepButton.disabled = state === 'running';
                stopButton.hidden = state === 'idle';
            },
        });
        stepButton.addEventListener('click', () => {
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
            await showResult(panel, await run(config.lang, code(), stdin.value, config.contextid));
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
                const result = await run(config.lang, code(), tc.stdin, config.contextid);
                if (result.status !== 'ok') {
                    // A compilation error or a server problem: show it as a normal run.
                    await showResult(panel, result);
                    return;
                }
                const ok = normalise(result.stdout, config.ignorespaces) === normalise(tc.expected, config.ignorespaces);
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
