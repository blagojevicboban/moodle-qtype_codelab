# Changelog

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
