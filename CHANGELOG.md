# Changelog

## 1.18.1 (2026-11-27)

- Dark Moodle theme support: question containers, test tables, diffs, Parsons cards, Class work and Analysis panels now
  use Bootstrap 5 CSS variables so they adapt cleanly to dark Moodle themes.

## 1.18.0 (2026-11-24)

- Built-in CodeRunner Moodle XML importer (*More → Import CodeRunner XML*): upload a CodeRunner XML export and convert
  standard C, C++, Python, Java, C#, JavaScript, PHP, Pascal, SQL and other questions directly into the chosen course
  question category, with a summary table of converted and skipped questions.
- Static code constraints and penalties: teachers can set comma-separated forbidden tokens (e.g. `sort, eval`) and
  required tokens (e.g. `for, malloc`) matched outside comments and string literals, with a configurable 0–100% grade
  penalty and clear violation feedback above the test results.

## 1.17.0 (2026-11-23)

- Interface translated into 14 more languages (29 total): Portuguese (Brazil), Turkish, Dutch, Russian, Ukrainian,
  Romanian, Hungarian, Bulgarian, Greek, Albanian, Japanese, Simplified Chinese, Korean and Arabic.
- 17 new question languages on the CodeLab runner (26 server-graded languages total): TypeScript, Bash, Go, Rust, R,
  Ruby, Lua, Kotlin, Perl, Octave, Julia, Scheme, Dart, Scala, Elixir, Swift and Haskell, offered automatically when
  installed on the runner.
- Updated Parsons gap comment masking for Bash, R, Ruby, Perl, Julia and Elixir.
- Requires tiny_codelab 1.24.0.

## 1.16.0 (2026-11-23)

- Unit tests for C, C++ and Python: a test may hold assertions (TEST and ASSERT_EQ) instead of an expected output; a
  failing assertion is shown with its message.
- Similarity of answers: the Analysis tab compares the students' answers by their normalized tokens, so renamed
  variables, comments, spaces and the starter code do not hide a copy. It runs inside Moodle, with no outside service.
- Compiler profile and standard per question for C and C++ (GCC, Clang or MSVC compatibility), kept by backup and
  restore.
- Peak memory beside the run time in the test results and the feedback, with the CodeLab runner 0.13.0 or newer.
- Companion files of a question appear as read-only tabs above the editor.
- Requires tiny_codelab 1.23.0.

## 1.15.0 (2026-11-23)

- Parsons problems: Check order button with optional partial mark for lines in their place (`ordercheck`), and fill-in
  gaps (0 to 10 expressions hidden in solution lines, never in distractors, single-line inputs, `gaps`).
- Input files for questions (`files`): up to 5 input files placed in the working folder before each run (Run, Run tests
  and grading on CodeLab runner 0.10.0, Jobe and Pyodide), shown read-only to students.
- Database upgrade (`2026112904`–`2026112906`): new fields `ordercheck`, `files` and `gaps`.

## 1.14.0 (2026-11-22)

- Time of each test: Run tests and the feedback show how long each test ran, when the CodeLab runner (0.9.0) runs
  it. Jobe reports no times.
- New optional field Time limit per test (s), 0.1 to 30: a test that runs longer fails with "Too slow: 1.42 s, the
  limit is 1 s", also when its output is right. It has no effect on Jobe, and its help says so. The times are kept
  with the results, so a regrade does not change a grade because the server is busier. Database upgrade: new field
  timelimit.
- The interface in 12 more languages: German, French, Spanish, Italian, Portuguese, Polish, Croatian, Bosnian,
  Slovenian, Macedonian, Slovak and Czech (15 with English and Serbian).
- Needs tiny_codelab 1.21.0.

## 1.13.1 (2026-11-22)

- Accessibility: the console of the attempt is a region that can be scrolled with the keyboard; screen readers hear
  the end of a run with the start of its output, and the result of Run tests (2 of 3 tests passed), instead of every
  line while it is written.
- Requires tiny_codelab 1.20.0.

## 1.13.0 (2026-11-22)

- A failed test shows the input, the expected and the actual output side by side, in the attempt and in the
  feedback; the first line that differs is marked, and spaces at the end of a line and line ends are made visible.
- Run tests runs up to three tests at the same time; the results keep the order of the tests, and a compilation error
  or the rate limit is shown once.
- Privacy: the CodeLab runner and Pyodide are declared as places the program is sent to or loaded from.
- Question form: the memory limit says that it does not apply to Java, C# and JavaScript on the runner.

## 1.12.0 (2026-11-22)

- New option AI explanations: with the AI explanations of errors of tiny_codelab 1.19 turned on by the administrator,
  students get a button under a compiler message or an error in the attempt that asks the AI of the site to explain
  it, without writing the fix. Off by default; without it the button is never shown in a quiz. Kept in backup,
  restore, import and export.
- Requires tiny_codelab 1.19.0.

## 1.11.0 (2026-11-22)

- Class work in the quiz: a teacher who may see the reports of the quiz (mod/quiz:viewreports) gets a Class work
  button in a CodeLab question (review of an attempt, preview, manual grading). It shows the last answer of every
  student to that question as a card with the grade, newest first, refreshed every 10 seconds; a long program opens
  with a click, and the names can be hidden for the projector. Previews are left out, separate groups are respected,
  at most 200 answers; students send nothing extra (the answers come from the quiz attempts).
- Analysis tab: for each test how many answers pass it and the three most frequent wrong outputs, the most frequent
  compiler messages, how many answers do not compile, end with an error or go over the time or memory limit, and the
  grades in ten groups. Results come from the results cache of the question; answers not in it are run at most 20 per
  request, the rest follow with the next refresh. Only the version of the question most students got is analysed.
- Web services qtype_codelab_get_class_answers and qtype_codelab_get_class_analysis.
- Requires tiny_codelab 1.18.0.

## 1.10.0 (2026-11-16)

- Grading follows the setting Server for running and grading of tiny_codelab 1.13: on Jobe, on the CodeLab runner
  (no Jobe needed), or Automatic. The CPU time and memory limits of a question also apply on the runner, and are kept
  when Automatic moves a run from an unreachable Jobe to the runner.
- The states quota, suspended and expired of a hosted runner count as the server not being able to check the program:
  the answer is left for the teacher, never graded as wrong.
- Needs tiny_codelab 1.13.0.

## 1.9.0 (2026-11-12)

- Parsons problems: a new option of the question, Answer by putting the lines of the solution in order. Students get
  the lines of the solution, shuffled the same way for each attempt, with the teacher's distractor lines, and put them
  into their program by dragging or with buttons (also by keyboard). In Python they also choose the indentation; in
  the languages with braces it follows the braces. The program goes into the answer, so Run, Step, the tests and the
  grading work as for a written answer.
- New fields parsons and distractors (upgrade step, backup and restore through the extra fields), the module
  qtype_codelab/parsons with Node tests (a new CI job), PHPUnit tests of the lines.
- Needs tiny_codelab 1.8.0 (step back, the memory view and the complexity chart come with it).

## 1.5.0 (2026-11-08)

- Synchronized with tiny_codelab 1.5.0: questions automatically inherit site theme and dark mode preferences. Needs tiny_codelab 1.5.0.

## 1.4.0 (2026-11-07)

- Debugger of Step, as in the algorithm plugins, for Python in the browser and C and C++ on the CodeLab runner
  0.5.0: breakpoints (a click left of the line number; Run stops there), Step over, Step out, automatic steps with a
  speed, the call stack (a frame shows its variables) and a trace table of the values after each step. The hidden code before and after the answer is passed over. Needs tiny_codelab 1.4.0.

## 1.3.0 (2026-11-06)

- SQL questions (MySQL / MariaDB), graded on the CodeLab runner: the code before is the tables and data, a test may
  have a query that checks the tables after the answer, expected outputs come from the solution.
- New comparison: lines in any order (rows of a query without ORDER BY).
- Full screen button in the attempt. Needs tiny_codelab 1.3.0.

## 1.2.0 (2026-11-06)

- Step for C and C++ answers in the attempt when the site has a CodeLab runner; the hidden code before and after
  the answer is passed over. Needs tiny_codelab 1.2.0.

## 1.1.0 (2026-11-06)

- Run in the attempt is interactive for C, C++, Java and C# when the site has a CodeLab runner: the student types the
  input while the program runs. Run the tests and the grade stay on Jobe. Needs tiny_codelab 1.1.0.

## 1.0.0 (2026-11-06)

- First stable release. Needs tiny_codelab 1.0.0. Tested on the CodeRunner questions of three courses converted
  to CodeLab: 1109 of 1111 checked answers of students got the same grade.

## 0.7.0 (2026-11-06)

- Function tests: a test may have test code, for example a call of the function the student writes. It replaces the
  marker {{TEST}} in the code after the answer; a C or C++ program without main gets one around it; other languages
  run it at the end. Run the tests in the attempt works the same way.
- Check CodeLab solutions: a page in the course menu runs the solution of every CodeLab question of the course on its
  tests, with a progress bar, and lists the questions whose solution fails, does not compile or is missing.
- When no test compiles the feedback shows the compiler message once; with test code a single test may fail to compile.

## 0.6.0 (2026-11-06)

- Check with penalties: in Interactive with multiple tries and Adaptive mode, each wrong Check takes the penalty of
  the question off the mark. When Jobe cannot check the program during Check, the try does not count and the student
  is asked to check again. The feedback lists the visible tests and gives the hidden tests only as a count.
- Output comparison: exactly, spaces at the end do not count, numbers with a tolerance (absolute or relative), or a
  regular expression per test. Questions with *ignore trailing spaces* off become *exactly* on upgrade.
- The solution must pass the tests when the question is saved, unless *Save even if the solution fails the tests* is
  ticked; when Jobe cannot be reached the question is saved without the check.
- CPU time and memory limit per question, with largest values in the new settings of the question type.

## 0.5.0 (2026-11-06)

- The language menu of the question offers only the languages that can run on the site; a question keeps its own.
  When the Jobe server does not have the language, the attempt waits for the teacher. Needs tiny_codelab 0.6.0.

## 0.4.0 (2026-11-06)

- Python typing help from Jedi in the answer. Needs tiny_codelab 0.5.0.

## 0.3.0 (2026-11-06)

- JavaScript (Node.js), Pascal and PHP questions.
- Python answers can run in the browser: Run with `input()` in the console, and Step line by line with the variables.
  The hidden code before and after the answer is passed over. The tests and the grade still come from Jobe.
- Needs tiny_codelab 0.4.0.

## 0.2.0 (2026-11-06)

- Tests with input, expected output, hidden and weight; the grade is computed on Jobe and cached.
- Expected outputs filled from the solution, hidden code before and after the answer, Monaco in the form and the
  attempt, Run the tests in the attempt, backup and restore, privacy provider.

## 0.1.0 (2026-11-05)

- First skeleton of the plugin.
