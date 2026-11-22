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

namespace qtype_codelab\local;

/**
 * The comparison of the grade gives the results of the shared cases in tests/fixtures/comparison-cases.json, which
 * tests/js/attempt.test.mjs also reads for "Run the tests" in the browser (amd/src/attempt.js).
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\grader
 */
final class comparison_cases_test extends \basic_testcase {
    /**
     * The shared cases.
     *
     * @return array
     */
    protected static function cases(): array {
        $json = file_get_contents(__DIR__ . '/../fixtures/comparison-cases.json');
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    public function test_matches(): void {
        $cases = self::cases()['matches'];
        $this->assertNotEmpty($cases);
        foreach ($cases as $case) {
            $this->assertSame(
                $case['result'],
                grader::matches($case['expected'], $case['got'], $case['comparison'], (float) $case['tolerance']),
                $case['name']
            );
        }
    }

    public function test_test_program(): void {
        $cases = self::cases()['testProgram'];
        $this->assertNotEmpty($cases);
        foreach ($cases as $case) {
            $this->assertSame($case['result'], grader::test_program($case['lang'], $case['program'], $case['code']), $case['name']);
        }
    }

    public function test_program(): void {
        $cases = self::cases()['program'];
        $this->assertNotEmpty($cases);
        foreach ($cases as $case) {
            $result = grader::program($case['prefix'], $case['code'], $case['suffix']);
            $this->assertSame($case['result'], $result, $case['name']);
            // The line where the student's code starts, the offset that prefixLines() gives in the browser.
            $this->assertSame(
                explode("\n", $case['code'])[0],
                explode("\n", $result)[$case['studentline']],
                $case['name']
            );
        }
    }
}
