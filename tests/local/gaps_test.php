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
 * Unit tests for fill-in gaps in Parsons problems.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\gaps
 */
final class gaps_test extends \advanced_testcase {
    public function test_mask_hides_strings_and_comments(): void {
        $masked = gaps::mask('x = "a = b" # if y > 0:', 'python');
        $this->assertSame(strlen('x = "a = b" # if y > 0:'), strlen($masked));
        $this->assertStringStartsWith('x = ', $masked);
        $this->assertStringNotContainsString('a = b', $masked);
        $this->assertStringNotContainsString('if', $masked);

        $cmasked = gaps::mask('printf("x = 1"); // a = b', 'c');
        $this->assertStringNotContainsString('x = 1', $cmasked);
        $this->assertStringNotContainsString('a = b', $cmasked);
    }

    public function test_candidates_per_language(): void {
        $extract = function (string $line, string $lang): ?string {
            $c = gaps::candidate($line, $lang);
            return $c === null ? null : substr($line, $c['start'], $c['length']);
        };

        $this->assertSame('x > 0', $extract('if x > 0:', 'python'));
        $this->assertSame('range(n)', $extract('for i in range(n):', 'python'));
        $this->assertSame('total', $extract('print(total)', 'python'));
        $this->assertSame('i', $extract('total += i', 'python'));
        $this->assertNull($extract('# total = 5', 'python'));
        $this->assertNull($extract('else:', 'python'));

        $this->assertSame('x > 0', $extract('if (x > 0) {', 'c'));
        $this->assertSame('int i = 0; i < n; i++', $extract('for (int i = 0; i < n; i++) {', 'c'));
        $this->assertSame('"%d\\n", total', $extract('printf("%d\\n", total);', 'c'));
        $this->assertSame('i', $extract('total += i;', 'c'));
        $this->assertNull($extract('// x = 1;', 'c'));
        $this->assertNull($extract('}', 'c'));

        $this->assertSame('x > 0', $extract('if x > 0 then', 'pascal'));
    }

    public function test_deterministic_choice_and_no_distractor_gaps(): void {
        $solution = "n = int(input())\ntotal = 0\nfor i in range(n):\n    total += i\nprint(total)\n";
        $distractors = "total = 1\n";
        $a = parsons::blocks($solution, $distractors, '10/1', 2, 'python');
        $b = parsons::blocks($solution, $distractors, '10/1', 2, 'python');
        $this->assertSame($a, $b);

        $gapped = array_values(array_filter($a, 'is_array'));
        $this->assertCount(2, $gapped);
        // Distractor line stays a plain string.
        $this->assertContains('total = 1', $a);
        // Hidden expression text is never leaked in the block array.
        foreach ($gapped as $g) {
            $this->assertArrayHasKey('before', $g);
            $this->assertArrayHasKey('after', $g);
            $this->assertArrayHasKey('size', $g);
            $this->assertArrayNotHasKey('answer', $g);
        }
    }

    public function test_check_order_recognises_wrong_gap_text(): void {
        $solution = "n = int(input())\ntotal = 0\nprint(total)\n";
        // With 3 gaps, every line is a gap template; wrong or empty gap text still counts as in place.
        $wronggaps = "n = 999\ntotal = \nprint(abc)\n";
        $res = order::check($wronggaps, $solution, 'python', 3, '42/1');
        $this->assertSame(['placed' => 3, 'total' => 3], $res);
    }
}
