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
 * Tests of the lines of Parsons problems.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\parsons
 */
final class parsons_test extends \basic_testcase {
    /**
     * The lines lose their indentation, empty lines are left out.
     */
    public function test_lines(): void {
        $this->assertSame(['s = 0', 'for i in range(3):', 's += i'], parsons::lines("s = 0\r\n\nfor i in range(3):\n\ts += i\n"));
    }

    /**
     * The same seed gives the same order; all lines and distractors are there; another seed may give another order.
     */
    public function test_blocks(): void {
        $solution = "a = 1\nb = 2\nc = a + b\nprint(c)\n";
        $one = parsons::blocks($solution, "c = a - b\n", '7/1');
        $this->assertSame($one, parsons::blocks($solution, "c = a - b\n", '7/1'));
        $sorted = $one;
        sort($sorted);
        $expected = ['a = 1', 'b = 2', 'c = a + b', 'c = a - b', 'print(c)'];
        $this->assertSame($expected, $sorted);
        $this->assertNotSame(['a = 1', 'b = 2', 'c = a + b', 'print(c)', 'c = a - b'], $one);
    }
}
