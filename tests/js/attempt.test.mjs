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
const {program, testProgram, prefixLines, matches, firstDifference, displayLines, runPool, PARALLEL_TESTS, tooSlow,
    seconds, megabytes, isUnitTest} =
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

test('firstDifference() gives the line of grader::first_difference()', () => {
    for (const c of cases.firstDifference) {
        assert.equal(firstDifference(c.expected, c.got, c.comparison), c.result, c.name);
    }
});

test('displayLines() gives the lines of grader::display_lines()', () => {
    for (const c of cases.displayLines) {
        assert.deepEqual(displayLines(c.text, c.differs), c.result, c.name);
    }
});

/**
 * A task that ends after the given milliseconds, counting how many run at the same time.
 *
 * @param {Object} counter {now, most, started}
 * @returns {function(Object, number): Promise<Object>}
 */
const timedTask = (counter) => async(item, i) => {
    counter.now++;
    counter.started.push(i);
    counter.most = Math.max(counter.most, counter.now);
    await new Promise((resolve) => setTimeout(resolve, item.ms));
    counter.now--;
    return {i, status: item.status || 'ok'};
};

test('the pool runs at most three tasks at once and keeps the order', async() => {
    const items = [40, 5, 30, 1, 20, 10, 15, 2].map((ms) => ({ms}));
    const counter = {now: 0, most: 0, started: []};
    const results = await runPool(items, timedTask(counter));
    assert.equal(PARALLEL_TESTS, 3);
    assert.equal(counter.most, 3);
    assert.deepEqual(results.map((r) => r.i), [0, 1, 2, 3, 4, 5, 6, 7]);
});

test('the pool with fewer items than lanes, and with none', async() => {
    const counter = {now: 0, most: 0, started: []};
    assert.deepEqual((await runPool([{ms: 1}, {ms: 1}], timedTask(counter))).map((r) => r.i), [0, 1]);
    assert.deepEqual(await runPool([], timedTask(counter)), []);
});

test('a final result starts no new task, the started ones finish', async() => {
    const items = [{ms: 30}, {ms: 5, status: 'ratelimit'}, {ms: 30}, {ms: 1}, {ms: 1}];
    const counter = {now: 0, most: 0, started: []};
    const results = await runPool(items, timedTask(counter), 3, (r) => r.status !== 'ok');
    assert.deepEqual(counter.started, [0, 1, 2]);
    assert.equal(results[0].status, 'ok');
    assert.equal(results[1].status, 'ratelimit');
    assert.equal(results[2].status, 'ok');
    assert.equal(results[3], undefined);
    assert.equal(results.findIndex((r) => r?.status !== 'ok'), 1, 'the first result that is not ok comes before any missing one');
});

test('a failed task fails the pool and starts no new task', async() => {
    const started = [];
    const task = async(item, i) => {
        started.push(i);
        await new Promise((resolve) => setTimeout(resolve, item.ms));
        if (item.fail) {
            throw new Error('network');
        }
        return {i};
    };
    await assert.rejects(runPool([{ms: 1, fail: true}, {ms: 20}, {ms: 20}, {ms: 1}, {ms: 1}], task), /network/);
    assert.deepEqual(started, [0, 1, 2]);
});

test('a test over the time limit is too slow, only when the server gave a time', () => {
    assert.equal(tooSlow(1.42, 1), true);
    assert.equal(tooSlow(0.5, 1), false);
    assert.equal(tooSlow(1, 1), false);
    // No limit, or no time (Jobe): never too slow.
    assert.equal(tooSlow(5, 0), false);
    assert.equal(tooSlow(null, 1), false);
    assert.equal(seconds(0.123), '0.12');
    assert.equal(seconds(0.001), '0.01');
    assert.equal(seconds(2), '2.00');
    assert.equal(megabytes(3482), '3.4');
    assert.equal(megabytes(50), '0.1');
    assert.equal(megabytes(16384), '16.0');
});

test('unit tests: isUnitTest and testProgram wrap C, C++ and Python assertions', () => {
    assert.equal(isUnitTest('c', 'TEST(sum) { ASSERT_EQ(add(2, 3), 5); }'), true);
    assert.equal(isUnitTest('python', 'assert_eq(add(2, 3), 5)'), true);
    assert.equal(isUnitTest('c', 'printf("%d\\n", add(2, 3));'), false);
    const wrappedC = testProgram('c', 'int add(int a, int b) { return a + b; }\n', 'TEST(a) { ASSERT_EQ(add(2, 3), 5); }');
    assert.match(wrappedC, /#define ASSERT_EQ\(/);
    assert.match(wrappedC, /_cl_test_a\(\);/);
    const wrappedPy = testProgram('python', 'def add(a, b):\n    return a + b\n', 'assert_eq(add(2, 3), 5)');
    assert.match(wrappedPy, /def assert_eq\(/);
});
