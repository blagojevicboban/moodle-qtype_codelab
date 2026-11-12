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
 * Parsons problems: the student puts the shuffled lines of the solution (and distractor lines) in order, by dragging
 * them or with buttons (also by keyboard). In Python the indentation is chosen too; in the languages with braces it
 * follows the braces. The program made of the lines is the answer, graded by the tests as any other.
 *
 * @module     qtype_codelab/parsons
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/** Spaces of one level of indentation. */
const INDENT = 4;

/** Most levels of indentation. */
const MAX_LEVEL = 8;

/**
 * The state of a saved answer: its lines (with their level) taken from the blocks, the other blocks left in the pool.
 * A line of the answer that is no block (changed by hand) is left out.
 *
 * @param {string[]} blocks lines given to the student, in their shuffled order
 * @param {string} answer the program saved so far
 * @param {boolean} indented whether the levels come from the answer (Python)
 * @returns {{pool: Array<{id: number, text: string}>, program: Array<{id: number, text: string, level: number}>}}
 */
export const restore = (blocks, answer, indented) => {
    const free = blocks.map((text, id) => ({id, text}));
    const program = [];
    String(answer || '').replace(/\r\n?/g, '\n').split('\n').forEach((line) => {
        const text = line.trim();
        if (text === '') {
            return;
        }
        const at = free.findIndex((b) => b.text === text);
        if (at < 0) {
            return;
        }
        const [block] = free.splice(at, 1);
        const spaces = line.replace(/\t/g, ' '.repeat(INDENT)).search(/\S/);
        program.push({...block, level: indented ? Math.min(MAX_LEVEL, Math.round(spaces / INDENT)) : 0});
    });
    return {pool: free, program};
};

/**
 * The program made of the lines: with their levels (Python), or indented by the braces (C and the others).
 *
 * @param {Array<{text: string, level: number}>} program
 * @param {boolean} indented
 * @returns {string}
 */
export const assemble = (program, indented) => {
    if (!program.length) {
        return '';
    }
    let depth = 0;
    return program.map((line) => {
        let level = line.level;
        if (!indented) {
            const opens = (line.text.match(/[{]/g) || []).length;
            const closes = (line.text.match(/[}]/g) || []).length;
            // A line that starts by closing a block stands at the level of the block's head.
            level = Math.max(0, line.text.startsWith('}') ? depth - 1 : depth);
            depth = Math.max(0, depth + opens - closes);
        }
        return ' '.repeat(INDENT * level) + line.text;
    }).join('\n') + '\n';
};

/**
 * A small button with a symbol and an accessible name.
 *
 * @param {string} symbol
 * @param {string} label
 * @param {string} action
 * @returns {HTMLButtonElement}
 */
const tool = (symbol, label, action) => {
    const b = document.createElement('button');
    b.type = 'button';
    b.className = 'btn btn-outline-secondary btn-sm qtype_codelab-parsons-tool';
    b.textContent = symbol;
    b.title = label;
    b.setAttribute('aria-label', label);
    b.dataset.action = action;
    return b;
};

export class Parsons {
    /**
     * The two lists in an element.
     *
     * @param {HTMLElement} root
     * @param {Object} options
     * @param {string[]} options.blocks the shuffled lines
     * @param {string} options.answer the saved program
     * @param {boolean} options.indented Python: the student chooses the indentation
     * @param {Object<string, string>} options.strings parsonspool, parsonsanswer, parsonshint, parsonsadd, parsonsremove,
     *     parsonsup, parsonsdown, parsonsindent, parsonsoutdent
     * @param {function(string): void} options.onChange gets the program after each change
     */
    constructor(root, {blocks, answer, indented, strings, onChange}) {
        this.root = root;
        this.indented = indented;
        this.s = strings;
        this.onChange = onChange;
        const state = restore(blocks, answer, indented);
        this.pool = state.pool;
        this.program = state.program;
        this.dragged = null;
        this.render();
    }

    /**
     * The program after a change: drawn again, given to the owner, the focus kept on the moved line.
     *
     * @param {?string} focus selector of the element to focus after drawing
     */
    changed(focus = null) {
        this.render();
        this.onChange(assemble(this.program, this.indented));
        if (focus) {
            this.root.querySelector(focus)?.focus();
        }
    }

    /**
     * Move a block to the program (at an index) or back to the pool.
     *
     * @param {number} id
     * @param {string} to pool or program
     * @param {number} [index] place in the program (default: the end)
     */
    move(id, to, index = null) {
        const from = this.program.findIndex((b) => b.id === id);
        let block;
        if (from >= 0) {
            [block] = this.program.splice(from, 1);
            if (index !== null && index > from) {
                index--;
            }
        } else {
            const at = this.pool.findIndex((b) => b.id === id);
            if (at < 0) {
                return;
            }
            [block] = this.pool.splice(at, 1);
        }
        if (to === 'pool') {
            this.pool.push({id: block.id, text: block.text});
        } else {
            const level = block.level ?? (this.program.length ? this.program[this.program.length - 1].level : 0);
            this.program.splice(index === null ? this.program.length : index, 0, {id: block.id, text: block.text, level});
        }
    }

    /**
     * Draw both lists.
     */
    render() {
        this.root.replaceChildren();
        const hint = document.createElement('p');
        hint.className = 'qtype_codelab-parsons-hint small mb-2';
        hint.textContent = this.s.parsonshint;
        const lists = document.createElement('div');
        lists.className = 'qtype_codelab-parsons-lists';
        lists.append(this.list('pool', this.s.parsonspool, this.pool), this.list('program', this.s.parsonsanswer, this.program));
        this.root.append(hint, lists);
    }

    /**
     * One list with its title; a drop target for dragged lines.
     *
     * @param {string} name pool or program
     * @param {string} title
     * @param {Array} items
     * @returns {HTMLElement}
     */
    list(name, title, items) {
        const box = document.createElement('div');
        box.className = `qtype_codelab-parsons-box qtype_codelab-parsons-${name}`;
        const heading = document.createElement('div');
        heading.className = 'qtype_codelab-parsons-title';
        heading.textContent = title;
        heading.id = `${this.root.id}_${name}`;
        const ol = document.createElement(name === 'program' ? 'ol' : 'ul');
        ol.className = 'qtype_codelab-parsons-list list-unstyled mb-0';
        ol.setAttribute('aria-labelledby', heading.id);
        ol.dataset.list = name;
        items.forEach((item, i) => ol.append(this.item(name, item, i, items.length)));
        ol.addEventListener('dragover', (e) => {
            if (this.dragged !== null) {
                e.preventDefault();
                ol.classList.add('qtype_codelab-parsons-over');
            }
        });
        ol.addEventListener('dragleave', () => ol.classList.remove('qtype_codelab-parsons-over'));
        ol.addEventListener('drop', (e) => {
            e.preventDefault();
            ol.classList.remove('qtype_codelab-parsons-over');
            if (this.dragged === null) {
                return;
            }
            // The place in the program: before the first line whose middle is below the pointer.
            let index = null;
            if (name === 'program') {
                const rows = [...ol.children];
                const at = rows.findIndex((row) => {
                    const r = row.getBoundingClientRect();
                    return e.clientY < r.top + r.height / 2;
                });
                index = at < 0 ? this.program.length : at;
            }
            const id = this.dragged;
            this.dragged = null;
            this.move(id, name, index);
            this.changed();
        });
        box.append(heading, ol);
        return box;
    }

    /**
     * One line: its text (draggable; a click moves it to the other list) and, in the program, its buttons.
     *
     * @param {string} name pool or program
     * @param {Object} item
     * @param {number} index
     * @param {number} count
     * @returns {HTMLLIElement}
     */
    item(name, item, index, count) {
        const li = document.createElement('li');
        li.className = 'qtype_codelab-parsons-item';
        li.draggable = true;
        li.dataset.id = String(item.id);
        li.addEventListener('dragstart', (e) => {
            this.dragged = item.id;
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/plain', item.text);
        });
        li.addEventListener('dragend', () => {
            this.dragged = null;
        });
        const line = document.createElement('button');
        line.type = 'button';
        line.className = 'qtype_codelab-parsons-line';
        line.textContent = item.text;
        line.dataset.action = name === 'pool' ? 'add' : 'remove';
        if (name === 'program') {
            line.style.marginLeft = `${(this.indented ? item.level : 0) * 1.5}rem`;
            line.setAttribute('aria-label', `${index + 1}. ${item.text} (${this.s.parsonsremove})`);
        } else {
            line.setAttribute('aria-label', this.s.parsonsadd.replace('{$a}', item.text));
        }
        line.addEventListener('click', () => {
            this.move(item.id, name === 'pool' ? 'program' : 'pool');
            this.changed(`[data-list="${name}"] .qtype_codelab-parsons-line`);
        });
        li.append(line);
        if (name === 'program') {
            const tools = document.createElement('span');
            tools.className = 'qtype_codelab-parsons-tools';
            const at = (action) => `[data-id="${item.id}"] [data-action="${action}"]`;
            const up = tool('↑', this.s.parsonsup, 'up');
            up.disabled = index === 0;
            up.addEventListener('click', () => {
                this.program.splice(index - 1, 0, this.program.splice(index, 1)[0]);
                this.changed(at(index - 1 === 0 ? 'down' : 'up'));
            });
            const down = tool('↓', this.s.parsonsdown, 'down');
            down.disabled = index === count - 1;
            down.addEventListener('click', () => {
                this.program.splice(index + 1, 0, this.program.splice(index, 1)[0]);
                this.changed(at(index + 1 === count - 1 ? 'up' : 'down'));
            });
            tools.append(up, down);
            if (this.indented) {
                const left = tool('←', this.s.parsonsoutdent, 'outdent');
                left.disabled = item.level === 0;
                left.addEventListener('click', () => {
                    item.level--;
                    this.changed(at(item.level === 0 ? 'indent' : 'outdent'));
                });
                const right = tool('→', this.s.parsonsindent, 'indent');
                right.disabled = item.level >= MAX_LEVEL;
                right.addEventListener('click', () => {
                    item.level++;
                    this.changed(at('indent'));
                });
                tools.append(left, right);
            }
            li.append(tools);
        }
        return li;
    }
}
