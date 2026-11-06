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
  - hidden or not (students see only whether a hidden test passed);
  - a weight.

  An empty expected output is filled in when the question is saved, by running the solution;
- **hidden code before and after** the student's code, for example the `class` and `Main` around a few statements;
- whether trailing spaces and empty lines at the end are ignored when outputs are compared;
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
- When Jobe cannot check the program (it is down, busy or not set up), the attempt waits for grading by the teacher.
- Backup and restore keep all the settings and tests.

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
