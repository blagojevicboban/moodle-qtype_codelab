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
 * Tests of qtype_codelab/attempt: the comparison of "Run the tests" in the browser gives the same result as the grade
 * (grader.php). The cases are in tests/fixtures/comparison-cases.json, which tests/local/comparison_cases_test.php also
 * reads.
 *
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
import test from 'node:test';
import assert from 'node:assert/strict';
import {readFileSync} from 'node:fs';

const read = (path) => readFileSync(new URL(path, import.meta.url), 'utf8');

// The module imports Moodle and tiny_codelab modules, which Node cannot load. The functions tested here use none of
// them and nothing runs when the module loads, so the module is loaded without its import lines.
const source = read('../../amd/src/attempt.js').replace(/^import .*;$/gm, '');
const {program, testProgram, prefixLines, matches} =
    await import('data:text/javascript;base64,' + Buffer.from(source).toString('base64'));

const cases = JSON.parse(read('../fixtures/comparison-cases.json'));

test('matches() gives the result of grader::matches()', () => {
    for (const c of cases.matches) {
        assert.equal(matches(c.expected, c.got, c.comparison, c.tolerance), c.result, c.name);
    }
});

test('testProgram() gives the program of grader::test_program()', () => {
    for (const c of cases.testProgram) {
        assert.equal(testProgram(c.lang, c.program, c.code), c.result, c.name);
    }
});

test('program() gives the program of grader::program(), and prefixLines() the line of the student\'s code', () => {
    for (const c of cases.program) {
        assert.equal(program(c.prefix, c.code, c.suffix), c.result, c.name);
        assert.equal(prefixLines(c.prefix), c.studentline, c.name);
        // The student's code really starts there.
        assert.equal(c.result.split('\n')[c.studentline], c.code.split('\n')[0], c.name);
    }
});
