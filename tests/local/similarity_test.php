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
 * Tests of local MOSS-style token similarity checker.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\similarity
 */
final class similarity_test extends \basic_testcase {
    /**
     * Renamed variables, reformatted whitespace and comments still match at 100%, while different logic does not.
     */
    public function test_renamed_variables_and_different_algorithms(): void {
        $a = <<<'C'
#include <stdio.h>
int main(void) {
    int n, s = 0;
    scanf("%d", &n);
    for (int i = 1; i <= n; i++) {
        if (i % 2 == 0) {
            s += i;
        }
    }
    printf("%d\n", s);
    return 0;
}
C;
        $b = <<<'C'
#include <stdio.h>
/* zbir parnih brojeva */
int main(void)
{
    int broj, zbir = 0;
    scanf("%d", &broj); // unos
    for (int k = 1; k <= broj; k++) {
        if (k % 2 == 0) {
            zbir += k;
        }
    }
    printf("%d\n", zbir);
    return 0;
}
C;
        $c = <<<'C'
#include <stdio.h>
int f(int x) { return x <= 1 ? 1 : x * f(x - 1); }
int main(void) {
    int a[5] = {1, 2, 3, 4, 5};
    int r = f(a[3]);
    while (r > 10) {
        r /= 2;
    }
    puts(r > 5 ? "yes" : "no");
    return 0;
}
C;
        $pairs = similarity::find_pairs([
            ['name' => 'Ana', 'code' => $a],
            ['name' => 'Marko', 'code' => $b],
            ['name' => 'Jovan', 'code' => $c],
        ], 'c');
        $this->assertCount(1, $pairs);
        $this->assertSame('Ana', $pairs[0]['usera']);
        $this->assertSame('Marko', $pairs[0]['userb']);
        $this->assertSame(100, $pairs[0]['percent']);
    }

    /**
     * Shared starting template code is excluded so two students who keep the boilerplate but write different bodies
     * are not flagged.
     */
    public function test_template_subtraction_and_short_snippets(): void {
        $template = <<<'C'
#include <stdio.h>
int main(void) {
    int n;
    scanf("%d", &n);
    return 0;
}
C;
        $s1 = $template . "\nint helper(int x) { return x * 2 + 1; }\n";
        $s2 = $template . "\nvoid show(int k) { while (k > 0) { printf(\"%d\", k); k--; } }\n";
        $pairs = similarity::find_pairs([
            ['name' => 'A', 'code' => $s1],
            ['name' => 'B', 'code' => $s2],
        ], 'c', $template);
        $this->assertSame([], $pairs);

        // Tiny 2-line snippets below MIN_TOKENS are ignored.
        $tiny = similarity::find_pairs([
            ['name' => 'A', 'code' => 'print(1)'],
            ['name' => 'B', 'code' => 'print(2)'],
        ], 'python');
        $this->assertSame([], $tiny);
    }
}
