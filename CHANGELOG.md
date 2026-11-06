# Changelog

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
