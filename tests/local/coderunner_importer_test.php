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
 * Tests for the CodeRunner Moodle XML importer.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace qtype_codelab\local;

use DOMDocument;

/**
 * Unit tests for coderunner_importer.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
final class coderunner_importer_test extends \basic_testcase {
    /**
     * Converts C function and Python questions and skips unsupported ones.
     */
    public function test_convert_xml_maps_supported_and_skips_unsupported(): void {
        $xml = <<<'XML'
<?xml version="1.0" encoding="UTF-8"?>
<quiz>
  <question type="coderunner">
    <name><text>Sum function in C</text></name>
    <questiontext format="html"><text><![CDATA[<p>Write int add(int a, int b).</p>]]></text></questiontext>
    <defaultgrade>2.0</defaultgrade>
    <penalty>0.2</penalty>
    <coderunnertype>c_function</coderunnertype>
    <prototypetype>0</prototypetype>
    <penaltyregime>0, 0, 15, 30</penaltyregime>
    <cputimelimitsecs>4</cputimelimitsecs>
    <memlimitmb>256</memlimitmb>
    <grader>EqualityGrader</grader>
    <answer><![CDATA[int add(int a, int b) { return a + b; }]]></answer>
    <answerpreload><![CDATA[int add(int a, int b) {
    return 0;
}]]></answerpreload>
    <testcases>
      <testcase testtype="0" mark="1.0" hiderestiffail="0">
        <testcode><text>printf("%d\n", add(2, 3))</text></testcode>
        <stdin><text></text></stdin>
        <expected><text>5</text></expected>
        <display><text>SHOW</text></display>
      </testcase>
      <testcase testtype="0" mark="2.0" hiderestiffail="0">
        <testcode><text>printf("%d\n", add(-1, 4));</text></testcode>
        <stdin><text></text></stdin>
        <expected><text>3</text></expected>
        <display><text>HIDE</text></display>
      </testcase>
      <testcase testtype="1" mark="0.0" hiderestiffail="0">
        <testcode><text>printf("%d\n", add(0, 0))</text></testcode>
        <stdin><text></text></stdin>
        <expected><text>0</text></expected>
        <display><text>SHOW</text></display>
      </testcase>
    </testcases>
  </question>
  <question type="coderunner">
    <name><text>Custom template question</text></name>
    <coderunnertype>python3</coderunnertype>
    <prototypetype>0</prototypetype>
    <template>{{ STUDENT_ANSWER }}</template>
    <testcases>
      <testcase testtype="0" mark="1.0"><expected><text>1</text></expected></testcase>
    </testcases>
  </question>
</quiz>
XML;

        $res = coderunner_importer::convert_xml($xml);
        $this->assertNull($res['error']);
        $this->assertCount(1, $res['converted']);
        $this->assertCount(1, $res['skipped']);
        $this->assertSame('c', $res['converted'][0]['language']);
        $this->assertSame(2, $res['converted'][0]['tests']);
        $this->assertSame('customtemplate', $res['skipped'][0]['reason']);

        $doc = new DOMDocument();
        $this->assertTrue($doc->loadXML($res['xml']));
        $qs = $doc->getElementsByTagName('question');
        $this->assertSame(1, $qs->length);
        $q = $qs->item(0);
        $this->assertSame('codelab', $q->getAttribute('type'));
        $this->assertSame('c', $q->getElementsByTagName('language')->item(0)->textContent);
        $this->assertSame('0.15', $q->getElementsByTagName('penalty')->item(0)->textContent);
        $this->assertStringContainsString('#include <stdio.h>', $q->getElementsByTagName('prefix')->item(0)->textContent);

        $tests = json_decode($q->getElementsByTagName('tests')->item(0)->textContent, true);
        $this->assertCount(2, $tests);
        $this->assertSame('printf("%d\n", add(2, 3));', $tests[0]['code']);
        $this->assertFalse($tests[0]['hidden']);
        $this->assertTrue($tests[1]['hidden']);
        $this->assertEquals(2.0, $tests[1]['weight']);
    }

    /**
     * Invalid XML returns an error code instead of throwing.
     */
    public function test_invalid_xml_returns_error(): void {
        $res = coderunner_importer::convert_xml('<not-valid');
        $this->assertSame('invalidxml', $res['error']);
        $this->assertSame([], $res['converted']);
    }
}
