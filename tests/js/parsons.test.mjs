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
 * Tests of qtype_codelab/parsons: a saved answer back into the lists, and the program made of the lines.
 *
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
import test from 'node:test';
import assert from 'node:assert/strict';
import {restore, assemble} from '../../amd/src/parsons.js';

test('a saved Python answer gives the lines with their levels; the rest stay in the pool', () => {
    const blocks = ['print(s)', 'for i in range(n):', 's += i', 's = 0', 's -= i'];
    const answer = 's = 0\nfor i in range(n):\n    s += i\nprint(s)\n';
    const {pool, program} = restore(blocks, answer, true);
    assert.deepEqual(program.map((b) => [b.text, b.level]), [['s = 0', 0], ['for i in range(n):', 0], ['s += i', 1],
        ['print(s)', 0]]);
    assert.deepEqual(pool.map((b) => b.text), ['s -= i']);
    assert.equal(assemble(program, true), answer);
});

test('lines that repeat are used once each; a line that is no block is left out', () => {
    const blocks = ['}', '}', 'int main() {', 'if (x) {'];
    const {pool, program} = restore(blocks, 'int main() {\nif (x) {\n}\nhack();\n', false);
    assert.equal(program.length, 3);
    assert.deepEqual(pool.map((b) => b.text), ['}']);
});

test('C: the indentation follows the braces', () => {
    const lines = ['int main() {', 'for (;;) {', 'x++;', '}', 'return 0;', '}'].map((text) => ({text, level: 5}));
    assert.equal(assemble(lines, false),
        'int main() {\n    for (;;) {\n        x++;\n    }\n    return 0;\n}\n');
    assert.equal(assemble([], false), '');
});
