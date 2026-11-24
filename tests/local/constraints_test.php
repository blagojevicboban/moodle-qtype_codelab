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

/**
 * Tests for static code constraints in qtype_codelab.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace qtype_codelab\local;

/**
 * Unit tests for constraints.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class constraints_test extends \basic_testcase {
    /**
     * Forbidden and required tokens ignore comments and string literals and match at word boundaries.
     */
    public function test_check_forbid_and_require_ignores_comments_and_strings(): void {
        $rules = constraints::encode('sort, eval', 'for, def', 50);
        $clean = "# Do not use sort or eval here\ndef my_sort(a):\n    print('sort')\n    for x in a:\n        pass\n";
        $v1 = constraints::check($clean, 'python', $rules);
        $this->assertSame([], $v1['forbid']);
        $this->assertSame([], $v1['require']);
        $this->assertSame(0, $v1['penalty']);
        $this->assertSame(1.0, constraints::apply_penalty(1.0, $v1));

        $bad = "def f(a):\n    a.sort()\n    return a\n";
        $v2 = constraints::check($bad, 'python', $rules);
        $this->assertSame(['sort'], $v2['forbid']);
        $this->assertSame(['for'], $v2['require']);
        $this->assertSame(50, $v2['penalty']);
        $this->assertEqualsWithDelta(0.5, constraints::apply_penalty(1.0, $v2), 1e-6);
    }

    /**
     * Full 100% penalty zeroes out the grade when a C rule is violated.
     */
    public function test_full_penalty_and_c_comments(): void {
        $rules = constraints::encode('goto, qsort', 'malloc', 100);
        $code = "/* qsort in comment */\nint main() { int *p = malloc(4); return 0; }\n";
        $v1 = constraints::check($code, 'c', $rules);
        $this->assertSame([], $v1['forbid']);
        $this->assertSame([], $v1['require']);

        $bad = "int main() { qsort(a, n, 4, cmp); return 0; }\n";
        $v2 = constraints::check($bad, 'c', $rules);
        $this->assertSame(['qsort'], $v2['forbid']);
        $this->assertSame(['malloc'], $v2['require']);
        $this->assertSame(0.0, constraints::apply_penalty(0.8, $v2));
    }
}
