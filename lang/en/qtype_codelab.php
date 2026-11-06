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
 * Strings for component 'qtype_codelab', language 'en'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Add {no} more tests';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Your program ({$a})';
$string['assist'] = 'Typing help';
$string['cachedef_results'] = 'Results of the tests of submitted programs';
$string['codeheader'] = 'Code';
$string['compare'] = 'Comparing the output';
$string['compileerror'] = 'The program does not compile:';
$string['failed'] = 'Failed';
$string['hiddentest'] = 'Hidden test';
$string['ignorespaces'] = 'Spaces at the end of lines and empty lines at the end do not count';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Programming language';
$string['noanswer'] = 'Write a program first.';
$string['noassist'] = 'Turn off code completion and hints (for tests)';
$string['noexpected'] = 'Give the expected output, or a solution to compute it from.';
$string['passed'] = 'Passed';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'The student writes a program in a code editor. With tests, the program is run on the Jobe server with the input of each test and graded by the share of tests whose output is right. Without tests, the teacher grades it.';
$string['pluginnameadding'] = 'Adding a CodeLab question';
$string['pluginnameediting'] = 'Editing a CodeLab question';
$string['pluginnamesummary'] = 'The student writes a program in C, C++, Python, Java or C#.';
$string['prefix'] = 'Code before';
$string['prefix_help'] = 'Code added before the student\'s program when it is run, for example #include lines or the start of a class. Students do not see it in the editor.';
$string['privacy:metadata:jobe'] = 'Answers are sent to the Jobe server set by the administrator to be run on the tests of the question. Answers themselves are kept by the question engine.';
$string['privacy:metadata:jobe:code'] = 'The program the student wrote';
$string['privacy:metadata:jobe:stdin'] = 'The input of a test';
$string['runtests'] = 'Run the tests';
$string['sandboxfailed'] = 'The program could not be checked on the server (Jobe). Your teacher will grade it.';
$string['showtests'] = 'Tests in the attempt';
$string['showtests_desc'] = 'Students can run the tests that are not hidden before they submit';
$string['solution'] = 'Solution';
$string['solution_help'] = 'The teacher\'s program. Empty expected outputs of the tests are filled in by running it when the question is saved; students see it as the right answer in the review.';
$string['solutionis'] = 'A solution:';
$string['suffix'] = 'Code after';
$string['suffix_help'] = 'Code added after the student\'s program when it is run, for example a main function that calls the student\'s function, or the end of a class. Students do not see it in the editor.';
$string['template'] = 'Starting code';
$string['template_help'] = 'Code students start from in the editor; may be empty.';
$string['test'] = 'Test';
$string['testexpected'] = 'Expected output';
$string['testfailed'] = 'Test {$a}: failed';
$string['testgot'] = 'Output';
$string['testhidden'] = 'Hidden from students';
$string['testinputn'] = 'Test {no}: input';
$string['testpassed'] = 'Test {$a}: passed';
$string['tests'] = 'Tests';
$string['tests_desc'] = 'Each test gives the program an input and compares its output with the expected output. Leave the expected output empty to take it from the solution. Without tests, the teacher grades the answers.';
$string['testsof'] = '{$a->passed} of {$a->total} tests passed';
$string['teststdin'] = 'Input';
$string['testsummary'] = 'Tests passed: {$a->passed} of {$a->total}';
$string['testweight'] = 'Weight';
