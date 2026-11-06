# CodeLab question type (qtype_codelab)

[![Moodle Plugin CI](https://github.com/blagojevicboban/moodle-qtype_codelab/actions/workflows/ci.yml/badge.svg)](https://github.com/blagojevicboban/moodle-qtype_codelab/actions/workflows/ci.yml)
[![Moodle](https://img.shields.io/badge/Moodle-4.5%20to%205.3-orange.svg)](https://moodle.org)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-purple.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](LICENSE)

A programming question for Moodle quizzes. The student writes a program in the code editor of VS Code
([Monaco](https://microsoft.github.io/monaco-editor/)). The program is run on the teacher's tests on a
[Jobe](https://github.com/trampgeek/jobe) server, and the grade is the weighted share of the tests it passes.

Languages: **C**, **C++**, **Python**, **Java**, **C#**, **JavaScript** (Node.js), **Pascal** and **PHP**.

> Status: **alpha** (0.5.0), under development.

## The teacher sets

- the language (only those that can run on the site are offered), the starting code and a model solution;
- **tests**, each with:
  - the input;
  - the expected output;
  - test code (optional), for questions where the student writes a function: for example
    `printf("%d\n", zbir(2, 3));`. It replaces the marker `{{TEST}}` in the code after the student's program; without
    the marker, a C or C++ program without `main` gets one around the test code, and other languages run it at the end;
  - hidden or not (students see only how many hidden tests passed);
  - a weight.

  An empty expected output is filled in when the question is saved, by running the solution. The solution must
  also pass the tests that have an expected output, or the question is not saved (unless *Save even if the solution
  fails the tests* is ticked; when Jobe cannot be reached the question is saved without the check);
- **hidden code before and after** the student's code, for example the `class` and `Main` around a few statements;
- how outputs are compared:
  - **exactly**;
  - **spaces at the end do not count** (the default): trailing spaces and empty lines at the end are ignored;
  - **numbers with a tolerance**: word by word, numbers may differ by the tolerance (absolute, or relative to the larger
    number; 0.001 by default), so `3.14159` matches `3.1416`;
  - **regular expression**: the expected output of each test is a PCRE pattern that must match the whole output;
- a **CPU time limit** and a **memory limit** for grading, when the defaults are not enough (the administrator sets
  the largest values, 10 s and 2000 MB by default, in the settings of the question type);
- whether typing help is turned off, for tests.

A question without tests is graded by the teacher.

## The student

- writes the program in the code editor, with typing help;
- can **Run** it with their own input, and **Run the tests** to check the tests that are not hidden;
- for Python, in browsers that support it, can run the program in the browser: `input()` asks in the console, and
  **Step** goes line by line with the variables. The hidden code is passed over, and the student's lines are marked.
  Python answers also get typing help from Jedi.

## Grading

- The grade is computed on the server only, on Jobe. The browser never sends a grade.
- Results are cached by program and tests, so the review and regrading do not load Jobe again.
- When Jobe cannot check the program (it is down, busy or not set up) at the final submit, the answer waits for grading
  by the teacher. During Check the try does not count (see below).
- Backup and restore keep all the settings and tests.

## Check with penalties

In the quiz settings, under *Question behaviour*, choose **Interactive with multiple tries** or **Adaptive mode**.
The student then has a **Check** button: the program is run on all tests, and the feedback lists the visible tests
with their output and gives the hidden tests only as a count. Each wrong Check takes the *Penalty for each incorrect
try* of the question off the mark (for example 10 %: a right answer at the second try gets 0.9). In Interactive mode
the number of tries is the number of hints plus one.

If Jobe cannot check the program during Check, the try does not count: the student sees a message and presses Check
again. Only at the final submit does such an answer wait for the teacher.

## Check all solutions of a course

Teachers who can edit questions find **Check CodeLab solutions** in the course menu (*More*). The page runs the
solution of every CodeLab question in the question banks of the course on its tests, one by one with a progress bar,
and lists first the questions whose solution fails, does not compile or is missing, with a link to edit each. Use it
after a change on the Jobe server or after a restore.

## Installation

1. Install **tiny_codelab** first, then **filter_codelab** and **qtype_codelab**.
2. In the settings of tiny_codelab, set the address and the API key of your Jobe server.
3. **Important: switch the filter on.** Go to *Site administration → Plugins → Filters → Manage filters* and set
   **CodeLab** to **On**. Until the filter is on, readers see the examples as plain code: they cannot edit or run them.

## Requirements

- Moodle 4.5 to 5.3
- PHP 8.2+
- [tiny_codelab](https://github.com/blagojevicboban/moodle-tiny_codelab) 0.6.0 or newer, installed first, with a Jobe
  server in its settings

## The CodeLab plugins

| Plugin | What it does |
|---|---|
| [tiny_codelab](https://github.com/blagojevicboban/moodle-tiny_codelab) | Inserts examples in the TinyMCE editor; the core of the others |
| [filter_codelab](https://github.com/blagojevicboban/moodle-filter_codelab) | Turns examples into code editors that readers can edit and run |
| **qtype_codelab** (this plugin) | Programming question: the student's program is graded on the teacher's tests |

## Privacy

The answers are stored like any quiz answer. Programs and their input are sent to the Jobe server set by the
administrator to be compiled and run.

## License

GNU GPL v3 or later. © 2026 Boban Blagojević
