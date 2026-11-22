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
 * Unit tests of Check order of Parsons problems.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\order
 */
final class order_test extends \advanced_testcase {
    /** A Python solution of 5 lines with two levels. */
    const SOLUTION = "n = int(input())\ntotal = 0\nfor i in range(n):\n    total += i\nprint(total)\n";

    public function test_entries(): void {
        // Empty lines are left out, a tab is one level.
        $this->assertSame([
            ['text' => 'foriinrange(n):', 'level' => 0],
            ['text' => 'total+=i', 'level' => 1],
        ], order::entries("for i in range(n):\n\n\ttotal  +=  i\n", true));
        // Spaces do not count; without levels (languages with braces) every level is 0.
        $expected = [['text' => 'if(x>0){', 'level' => 0], ['text' => 'x--;', 'level' => 0]];
        $this->assertSame($expected, order::entries("if (x > 0) {\n        x--;", false));
    }

    public function test_placed_lines(): void {
        $this->assertSame(['placed' => 5, 'total' => 5], order::check(self::SOLUTION, self::SOLUTION, 'python'));
        // Two lines swapped: one of them is out of place.
        $swapped = "total = 0\nn = int(input())\nfor i in range(n):\n    total += i\nprint(total)\n";
        $this->assertSame(['placed' => 4, 'total' => 5], order::check($swapped, self::SOLUTION, 'python'));
        // The right line at the wrong level is not in place in Python.
        $outdented = "n = int(input())\ntotal = 0\nfor i in range(n):\ntotal += i\nprint(total)\n";
        $this->assertSame(['placed' => 4, 'total' => 5], order::check($outdented, self::SOLUTION, 'python'));
        // A distractor is never in place; missing lines are not either.
        $distractor = "n = int(input())\ntotal = 1\ntotal = 0\nfor i in range(n):\n    total += i\n";
        $this->assertSame(['placed' => 4, 'total' => 5], order::check($distractor, self::SOLUTION, 'python'));
        $this->assertSame(['placed' => 0, 'total' => 5], order::check('', self::SOLUTION, 'python'));
        // In C the levels come from the braces: only the order counts.
        $c = "int main(void) {\n    int x = 1;\n    return x;\n}\n";
        $this->assertSame(['placed' => 4, 'total' => 4], order::check("int main(void) {\nint x = 1;\nreturn x;\n}", $c, 'c'));
    }

    public function test_partial_fraction(): void {
        $this->assertEqualsWithDelta(0.5, order::partial_fraction(self::SOLUTION, self::SOLUTION, 'python'), 1e-9);
        $swapped = "total = 0\nn = int(input())\nfor i in range(n):\n    total += i\nprint(total)\n";
        $this->assertEqualsWithDelta(0.4, order::partial_fraction($swapped, self::SOLUTION, 'python'), 1e-9);
        // Extra lines (distractors) lower the share: 5 in place of 6 lines.
        $extra = self::SOLUTION . "print(n)\n";
        $this->assertEqualsWithDelta(0.5 * 5 / 6, order::partial_fraction($extra, self::SOLUTION, 'python'), 1e-9);
        $this->assertSame(0.0, order::partial_fraction('x = 1', '', 'python'));
    }
}
