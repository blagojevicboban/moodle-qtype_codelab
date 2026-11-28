import test from 'node:test';
import assert from 'node:assert/strict';
import {readFileSync} from 'node:fs';
import {dirname, join} from 'node:path';
import {fileURLToPath} from 'node:url';

const root = join(dirname(fileURLToPath(import.meta.url)), '..', '..');
const src = readFileSync(join(root, 'amd', 'src', 'classwork.js'), 'utf8')
    .replace(/^import .*$/gm, '');
const mod = await import(`data:text/javascript;base64,${Buffer.from(src).toString('base64')}`);

test('buildAnalysisCsv formats summary, tests, similarity pairs and escapes formulas', () => {
    const csv = mod.buildAnalysisCsv({
        answers: 10,
        compile: 2,
        runtime: 1,
        timelimit: 0,
        tests: [
            {passed: 8, hidden: false, wrong: []},
            {passed: 5, hidden: true, wrong: []},
        ],
        similar: [
            {usera: 'Ana, Petrović', userb: '=SUM(A1)', percent: 94},
        ],
    });
    assert.ok(csv.startsWith('\uFEFFSection,Item,Value,Extra\r\n'));
    assert.ok(csv.includes('Summary,Answers,10,'));
    assert.ok(csv.includes('Test,Test 1,8/10,80%'));
    assert.ok(csv.includes('Test,Test 2 (hidden),5/10,50%'));
    assert.ok(csv.includes('Similarity,"Ana, Petrović",\'=SUM(A1),94%'));
});
