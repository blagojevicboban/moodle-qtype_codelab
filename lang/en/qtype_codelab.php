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
$string['badlimit'] = 'Give a whole number from 1 to {$a}, or leave it empty for the default.';
$string['badregex'] = 'This is not a valid regular expression.';
$string['badtolerance'] = 'Give a number of 0 or more, for example 0.001.';
$string['bulkcheck'] = 'Check CodeLab solutions';
$string['bulkcheck_again'] = 'Check again';
$string['bulkcheck_bank'] = 'Question bank';
$string['bulkcheck_done'] = 'Checked {$a->total} questions: {$a->ok} pass all their tests, {$a->problems} need attention.';
$string['bulkcheck_finished'] = 'Finished.';
$string['bulkcheck_intro'] = 'The solution of each of the {$a} CodeLab questions in the question banks of this course is run on the Jobe server on the tests of its question, one by one. Questions whose solution fails, does not compile or is missing are listed first. Results of solutions checked before are taken from the cache.';
$string['bulkcheck_none'] = 'There are no CodeLab questions in the question banks of this course.';
$string['bulkcheck_progress'] = 'Checking {$a->done} of {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Result';
$string['bulkcheck_start'] = 'Start the check';
$string['cachedef_results'] = 'Results of the tests of submitted programs';
$string['check_compile'] = 'Does not compile';
$string['check_failed'] = 'Passes {$a->passed} of {$a->total} tests';
$string['check_jobe'] = 'Jobe could not run it';
$string['check_nosolution'] = 'No solution';
$string['check_notests'] = 'No tests (graded by the teacher)';
$string['check_ok'] = 'Passes all tests ({$a->total})';
$string['checkfailed'] = 'The program could not be checked on the server (Jobe), so this try does not count. Press Check again in a moment.';
$string['codeheader'] = 'Code';
$string['compare'] = 'Comparing the output';
$string['compare_help'] = 'How the output of the program is compared with the expected output of each test.

* **Exactly**: every character counts.
* **Spaces at the end do not count**: spaces at the end of lines and empty lines at the end are left out.
* **Numbers with a tolerance**: the outputs are compared word by word, and two numbers are equal when they differ by no more than the tolerance (absolute, or relative to the larger number). Spaces and line breaks between the words do not count.
* **Regular expression**: the expected output of each test is a regular expression (PCRE) that must match the whole output, for example <code>Sum: [0-9]+</code>. Empty expected outputs are filled from the solution as patterns that match only that output.';
$string['comparison_exact'] = 'Exactly';
$string['comparison_numbers'] = 'Numbers with a tolerance';
$string['comparison_regex'] = 'Regular expression';
$string['comparison_spaces'] = 'Spaces at the end do not count';
$string['compileerror'] = 'The program does not compile:';
$string['cputime'] = 'CPU time limit (seconds)';
$string['cputime_help'] = 'Largest CPU time of one run of a test when the answer is graded. Empty: the setting of the CodeLab editor plugin (5 seconds unless changed). At most {$a} seconds (set by the administrator). Run and Run the tests in the attempt keep the site setting.';
$string['failed'] = 'Failed';
$string['hiddensummary'] = 'Hidden tests passed: {$a->passed} of {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Programming language';
$string['maxcputime'] = 'Largest CPU time of a question';
$string['maxcputime_desc'] = 'Questions cannot ask Jobe for more CPU time than this, in seconds per run.';
$string['maxmemory'] = 'Largest memory of a question';
$string['maxmemory_desc'] = 'Questions cannot ask Jobe for more memory than this, in MB per run.';
$string['memorylimit'] = 'Memory limit (MB)';
$string['memorylimit_help'] = 'Largest memory of one run of a test when the answer is graded. Empty: the default of the Jobe server. At most {$a} MB (set by the administrator). A language that needs more to start (JavaScript needs 1000 MB) gets what it needs.';
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
$string['savefailing'] = 'Save even if the solution fails the tests';
$string['showtests'] = 'Tests in the attempt';
$string['showtests_desc'] = 'Students can run the tests that are not hidden before they submit';
$string['solution'] = 'Solution';
$string['solution_help'] = 'The teacher\'s program. Empty expected outputs of the tests are filled in by running it when the question is saved; students see it as the right answer in the review.';
$string['solutioncheck'] = 'Check of the solution';
$string['solutioncheck_help'] = 'When the question is saved, the solution is run on Jobe with the input of every test that has an expected output, and the question is saved only if it passes them all. Tick this box to save anyway, for example while you are still writing the tests. When Jobe cannot be reached, the question is saved without the check.';
$string['solutionfails'] = 'The solution fails this test. Its output: {$a}';
$string['solutionis'] = 'A solution:';
$string['solutionnocompile'] = 'The solution does not compile: {$a}';
$string['suffix'] = 'Code after';
$string['suffix_help'] = 'Code added after the student\'s program when it is run, for example a main function that calls the student\'s function, or the end of a class. Students do not see it in the editor.';
$string['template'] = 'Starting code';
$string['template_help'] = 'Code students start from in the editor; may be empty.';
$string['test'] = 'Test';
$string['testcode'] = 'Test code';
$string['testcode_help'] = 'Code run in this test, for example a call of the function the student writes: <code>printf("%d\\n", sum(2, 3));</code> or <code>print(sum(2, 3))</code>. It may be empty.

* If the code after the student\'s program has the marker <code>{{TEST}}</code>, for example inside a main that you write, the test code takes its place.
* Otherwise a C or C++ program without main gets one: <code>int main(void) { test code return 0; }</code>.
* In other languages the test code is added at the end of the program.

The test can also have an input. Students see the test code of the tests that are not hidden.';
$string['testcoden'] = 'Test {no}: test code';
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
$string['tolerance'] = 'Tolerance';
$string['tolerance_help'] = 'For the comparison with numbers: the largest difference of two numbers that still counts as equal, absolute or relative to the larger number. With 0.001, 3.1416 matches 3.1414 and 1000.4 matches 1000.';
