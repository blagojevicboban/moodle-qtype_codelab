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
 * Class work of a CodeLab question in a quiz, for the teacher: the last answer of every student as a card (name,
 * grade, the program), refreshed every 10 seconds, names can be hidden for the projector; and the Analysis tab (tests
 * passed, frequent wrong outputs, compiler messages, errors, grades).
 *
 * @module     qtype_codelab/classwork
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
import Ajax from 'core/ajax';
import {getStrings} from 'core/str';

const KEYS = ['classwork', 'classanswers', 'classanalysis', 'classempty', 'classexportcsv', 'classhidenames', 'classshownames',
    'classnotgraded', 'classsummary', 'classpending', 'classother', 'classunchecked', 'classtest', 'classtesthidden',
    'classwrong', 'classmessages', 'classgrades', 'classsimilar', 'classsimilarnote', 'classemptyoutput', 'classstudent'];

/** Refresh of the answers while the panel is open, in milliseconds. */
const REFRESH = 10000;

/** Lines of a program shown on a card before it is opened. */
const CARD_LINES = 12;

/**
 * An element with a class and optional text.
 *
 * @param {string} tag
 * @param {string} className
 * @param {string} [text]
 * @returns {HTMLElement}
 */
const el = (tag, className, text) => {
    const e = document.createElement(tag);
    e.className = className;
    if (text !== undefined) {
        e.textContent = text;
    }
    return e;
};

/**
 * Fill a string's placeholders {$a} and {$a->name}.
 *
 * @param {string} text
 * @param {Object|string|number} a
 * @returns {string}
 */
export const fill = (text, a) => (typeof a === 'object'
    ? text.replace(/\{\$a->(\w+)\}/g, (m, k) => String(a[k] ?? ''))
    : text.replace('{$a}', String(a)));

/**
 * Escape one CSV cell (RFC 4180) and neutralise leading spreadsheet formula characters.
 *
 * @param {unknown} value
 * @returns {string}
 */
const csvCell = (value) => {
    let text = String(value ?? '');
    if (/^[=+\-@\t\r]/.test(text)) {
        text = `'${text}`;
    }
    return /[",\r\n]/.test(text) ? `"${text.replace(/"/g, '""')}"` : text;
};

/**
 * Build a UTF-8 BOM CSV report from a class analysis result (summary, tests and similarity pairs).
 *
 * @param {Object} r result of qtype_codelab_get_class_analysis
 * @returns {string}
 */
export const buildAnalysisCsv = (r) => {
    const rows = [
        ['Section', 'Item', 'Value', 'Extra'],
        ['Summary', 'Answers', r.answers ?? 0, ''],
        ['Summary', 'Compile errors', r.compile ?? 0, ''],
        ['Summary', 'Runtime errors', r.runtime ?? 0, ''],
        ['Summary', 'Time or memory limit', r.timelimit ?? 0, ''],
    ];
    (r.tests || []).forEach((t, i) => {
        const pct = r.answers ? Math.round((t.passed / r.answers) * 100) : 0;
        rows.push(['Test', `Test ${i + 1}${t.hidden ? ' (hidden)' : ''}`, `${t.passed}/${r.answers}`, `${pct}%`]);
    });
    if (Array.isArray(r.similar) && r.similar.length) {
        r.similar.forEach((p) => {
            rows.push(['Similarity', p.usera, p.userb, `${p.percent}%`]);
        });
    }
    return '\uFEFF' + rows.map((row) => row.map(csvCell).join(',')).join('\r\n') + '\r\n';
};

/**
 * Cards of the answers.
 *
 * @param {HTMLElement} host
 * @param {Array<Object>} answers
 * @param {Object<string, string>} s strings
 * @param {boolean} names show the names
 */
export const drawAnswers = (host, answers, s, names) => {
    host.replaceChildren();
    if (!answers.length) {
        host.append(el('p', 'qtype_codelab-class-empty', s.classempty));
        return;
    }
    const grid = el('div', 'qtype_codelab-class-cards');
    answers.forEach((a, i) => {
        const card = el('div', 'qtype_codelab-class-card');
        const head = el('div', 'qtype_codelab-class-head');
        head.append(el('span', 'qtype_codelab-class-name', names ? a.fullname : fill(s.classstudent, i + 1)));
        const grade = a.fraction < 0 ? s.classnotgraded : `${Math.round(a.fraction * 100)} %`;
        const badge = el('span', 'qtype_codelab-class-grade', grade);
        if (a.fraction >= 0.999) {
            badge.classList.add('qtype_codelab-class-full');
        } else if (a.fraction === 0) {
            badge.classList.add('qtype_codelab-class-zero');
        }
        head.append(badge);
        const lines = a.code.split('\n');
        const code = el('pre', 'qtype_codelab-class-code', lines.slice(0, CARD_LINES).join('\n') +
            (lines.length > CARD_LINES ? '\n...' : ''));
        if (lines.length > CARD_LINES) {
            code.tabIndex = 0;
            code.classList.add('qtype_codelab-class-more');
            const open = () => {
                code.textContent = a.code;
                code.classList.remove('qtype_codelab-class-more');
            };
            code.addEventListener('click', open);
            code.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    open();
                }
            });
        }
        card.append(head, code);
        grid.append(card);
    });
    host.append(grid);
};

/**
 * The analysis.
 *
 * @param {HTMLElement} host
 * @param {Object} r result of qtype_codelab_get_class_analysis
 * @param {Object<string, string>} s strings
 */
export const drawAnalysis = (host, r, s) => {
    host.replaceChildren();
    host.append(el('p', 'qtype_codelab-class-summary', fill(s.classsummary, r)));
    [['pending', s.classpending], ['otherversions', s.classother], ['unchecked', s.classunchecked]].forEach(([key, text]) => {
        if (r[key]) {
            host.append(el('p', 'qtype_codelab-class-note', fill(text, r[key])));
        }
    });
    if (!r.answers) {
        return;
    }
    const exportBtn = el('button', 'btn btn-sm btn-outline-secondary mb-2', s.classexportcsv);
    exportBtn.type = 'button';
    exportBtn.dataset.action = 'classexportcsv';
    exportBtn.addEventListener('click', () => {
        const blob = new Blob([buildAnalysisCsv(r)], {type: 'text/csv;charset=utf-8'});
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = 'codelab-class-analysis.csv';
        link.click();
        setTimeout(() => URL.revokeObjectURL(url), 1000);
    });
    host.append(exportBtn);
    const tests = el('ol', 'qtype_codelab-class-tests list-unstyled');
    r.tests.forEach((t, i) => {
        const item = el('li', 'qtype_codelab-class-test');
        const share = r.answers ? t.passed / r.answers : 0;
        const label = fill(t.hidden ? s.classtesthidden : s.classtest, {n: i + 1, passed: t.passed, total: r.answers});
        const bar = el('div', 'qtype_codelab-class-bar');
        const fillBar = el('div', 'qtype_codelab-class-bar-fill');
        fillBar.style.width = `${Math.round(share * 100)}%`;
        bar.append(fillBar);
        item.append(el('div', '', label), bar);
        if (t.wrong.length) {
            const list = el('ul', 'qtype_codelab-class-wrong');
            list.append(el('li', 'qtype_codelab-class-wrong-title', s.classwrong));
            t.wrong.forEach((w) => {
                const li = el('li', '');
                li.append(el('code', '', w.text === '' ? s.classemptyoutput : w.text), document.createTextNode(` (${w.count})`));
                list.append(li);
            });
            item.append(list);
        }
        tests.append(item);
    });
    host.append(tests);
    if (r.messages.length) {
        host.append(el('div', 'qtype_codelab-class-subtitle', s.classmessages));
        const list = el('ul', 'qtype_codelab-class-messages');
        r.messages.forEach((m) => {
            const li = el('li', '');
            li.append(el('code', '', m.text), document.createTextNode(` (${m.count})`));
            list.append(li);
        });
        host.append(list);
    }
    host.append(el('div', 'qtype_codelab-class-subtitle', s.classgrades));
    const grades = el('div', 'qtype_codelab-class-grades');
    const most = Math.max(1, ...r.grades);
    r.grades.forEach((count, i) => {
        const column = el('div', 'qtype_codelab-class-gradecol');
        const bar = el('div', 'qtype_codelab-class-gradebar');
        bar.style.height = `${Math.round((count / most) * 100)}%`;
        const range = i === 9 ? '90-100 %' : `${i * 10}-${i * 10 + 9} %`;
        column.title = `${range}: ${count}`;
        column.append(el('span', 'qtype_codelab-class-gradecount', String(count)), bar,
            el('span', 'qtype_codelab-class-gradelabel', String(i * 10)));
        grades.append(column);
    });
    host.append(grades);
    if (Array.isArray(r.similar) && r.similar.length) {
        host.append(el('div', 'qtype_codelab-class-subtitle', s.classsimilar));
        host.append(el('p', 'qtype_codelab-class-note small text-muted mb-1', s.classsimilarnote));
        const simList = el('ul', 'qtype_codelab-class-similar');
        r.similar.forEach((p) => {
            simList.append(el('li', '', `${p.usera} \u2014 ${p.userb}: ${p.percent} %`));
        });
        host.append(simList);
    }
};

/**
 * Add the Class work button and its panel after an element.
 *
 * @param {HTMLElement} after
 * @param {{cmid: number, slot: number}} classwork the quiz and the slot of the question
 */
export const addClassWork = async(after, classwork) => {
    const values = await getStrings(KEYS.map((key) => ({key, component: 'qtype_codelab'})));
    const s = Object.fromEntries(KEYS.map((key, i) => [key, values[i]]));
    const args = {cmid: classwork.cmid, slot: classwork.slot};
    const wrap = el('div', 'qtype_codelab-class mt-2');
    const toggle = el('button', 'btn btn-outline-secondary btn-sm', s.classwork);
    toggle.type = 'button';
    toggle.dataset.action = 'classwork';
    toggle.setAttribute('aria-expanded', 'false');
    const panel = el('div', 'qtype_codelab-class-panel mt-2');
    panel.hidden = true;
    const bar = el('div', 'd-flex flex-wrap gap-2 align-items-center mb-2');
    const tabAnswers = el('button', 'btn btn-sm btn-secondary', s.classanswers);
    const tabAnalysis = el('button', 'btn btn-sm btn-outline-secondary', s.classanalysis);
    const names = el('button', 'btn btn-sm btn-outline-secondary', s.classhidenames);
    [tabAnswers, tabAnalysis, names].forEach((b) => {
        b.type = 'button';
    });
    tabAnswers.dataset.action = 'classanswers';
    tabAnalysis.dataset.action = 'classanalysis';
    names.dataset.action = 'classnames';
    bar.append(tabAnswers, tabAnalysis, names);
    const body = el('div', 'qtype_codelab-class-body');
    body.setAttribute('aria-live', 'polite');
    panel.append(bar, body);
    wrap.append(toggle, panel);
    after.after(wrap);

    let tab = 'answers';
    let showNames = true;
    let timer = null;
    let last = [];
    const refresh = async() => {
        clearTimeout(timer);
        if (panel.hidden || !wrap.isConnected) {
            return;
        }
        try {
            if (tab === 'answers') {
                last = (await Ajax.call([{methodname: 'qtype_codelab_get_class_answers', args}])[0]).answers;
                drawAnswers(body, last, s, showNames);
                timer = setTimeout(refresh, REFRESH);
            } else {
                const r = await Ajax.call([{methodname: 'qtype_codelab_get_class_analysis', args}])[0];
                drawAnalysis(body, r, s);
                // Answers still to be run: the next part comes soon.
                timer = setTimeout(refresh, r.pending ? 2000 : REFRESH * 3);
            }
        } catch (e) {
            body.replaceChildren(el('p', 'text-danger', (e && e.message) || String(e)));
        }
    };
    const choose = (value) => {
        tab = value;
        tabAnswers.className = `btn btn-sm ${tab === 'answers' ? 'btn-secondary' : 'btn-outline-secondary'}`;
        tabAnalysis.className = `btn btn-sm ${tab === 'analysis' ? 'btn-secondary' : 'btn-outline-secondary'}`;
        names.hidden = tab !== 'answers';
        body.replaceChildren();
        refresh();
    };
    toggle.addEventListener('click', () => {
        panel.hidden = !panel.hidden;
        toggle.setAttribute('aria-expanded', panel.hidden ? 'false' : 'true');
        if (panel.hidden) {
            clearTimeout(timer);
        } else {
            refresh();
        }
    });
    tabAnswers.addEventListener('click', () => choose('answers'));
    tabAnalysis.addEventListener('click', () => choose('analysis'));
    names.addEventListener('click', () => {
        showNames = !showNames;
        names.textContent = showNames ? s.classhidenames : s.classshownames;
        drawAnswers(body, last, s, showNames);
    });
};
