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
 * Unit tests for the time and memory limits of a question in the request to Jobe.
 *
 * @package    qtype_codelab
 * @category   test
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \qtype_codelab\local\question_jobe
 */
final class question_jobe_test extends \advanced_testcase {
    /**
     * Parameters of the request for a language.
     *
     * @param question_jobe $jobe
     * @param string $lang
     * @return array
     */
    protected static function parameters(question_jobe $jobe, string $lang): array {
        return $jobe->run_spec($lang, 'x', '')['run_spec']['parameters'];
    }

    public function test_no_limits_is_the_default_client(): void {
        $this->assertNull(question_jobe::for_limits(0, 0));
        $this->assertInstanceOf(question_jobe::class, question_jobe::for_limits(3, 0));
    }

    public function test_limits_in_the_request(): void {
        $this->resetAfterTest();
        $parameters = self::parameters(new question_jobe(8, 512), 'c');
        $this->assertSame(8, $parameters['cputime']);
        $this->assertSame(512, $parameters['memorylimit']);
        // The compiler arguments of the language stay.
        $this->assertContains('-w', $parameters['compileargs']);

        // Without a memory limit Jobe's default is used.
        $this->assertArrayNotHasKey('memorylimit', self::parameters(new question_jobe(2, 0), 'python'));
        // Node.js keeps the 1000 MB it needs to start.
        $this->assertSame(1000, self::parameters(new question_jobe(0, 300), 'javascript')['memorylimit']);
        $this->assertSame(1500, self::parameters(new question_jobe(0, 1500), 'javascript')['memorylimit']);
    }

    public function test_largest_values_of_the_site(): void {
        $this->resetAfterTest();
        $parameters = self::parameters(new question_jobe(60, 9000), 'c');
        $this->assertSame(question_jobe::MAX_CPUTIME, $parameters['cputime']);
        $this->assertSame(question_jobe::MAX_MEMORY, $parameters['memorylimit']);

        set_config('maxcputime', 3, 'qtype_codelab');
        set_config('maxmemory', 256, 'qtype_codelab');
        $parameters = self::parameters(new question_jobe(60, 9000), 'c');
        $this->assertSame(3, $parameters['cputime']);
        $this->assertSame(256, $parameters['memorylimit']);
    }
}
