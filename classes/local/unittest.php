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
 * Self-contained unit-test harness for C, C++ and Python test code: supports TEST(name) { ... } blocks and
 * ASSERT_EQ / ASSERT_NE / ASSERT_TRUE / ASSERT_FALSE / ASSERT_NEAR / ASSERT_STREQ (and assert_* in Python).
 *
 * When a test uses these macros or helpers, the program exits 0 if all assertions pass, or prints a concise
 * "FAIL: ..." diagnostic to stderr and exits 1 on the first failing assertion.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class unittest {
    /** Pattern matching C/C++ unit-test macros in test code. */
    const C_PATTERN = '/\b(?:TEST|ASSERT_EQ|ASSERT_NE|ASSERT_TRUE|ASSERT_FALSE|ASSERT_NEAR|ASSERT_STREQ)\s*\(/';

    /** Pattern matching Python unit-test helpers in test code. */
    const PY_PATTERN = '/\b(?:assert_eq|assert_ne|assert_true|assert_false|assert_near)\s*\(/';

    /**
     * Whether a test's code uses unit-test assertions for the given language.
     *
     * @param string $lang
     * @param string $testcode
     * @return bool
     */
    public static function is_unit_test(string $lang, string $testcode): bool {
        if ($testcode === '') {
            return false;
        }
        if ($lang === 'c' || $lang === 'cpp') {
            return (bool) preg_match(self::C_PATTERN, $testcode);
        }
        if ($lang === 'python') {
            return (bool) preg_match(self::PY_PATTERN, $testcode);
        }
        return false;
    }

    /**
     * Wrap a student program and unit-test code with the self-contained assertion harness.
     *
     * @param string $lang c, cpp or python
     * @param string $program student's program (with prefix/suffix)
     * @param string $testcode test code containing TEST(...) and/or ASSERT_*(...)
     * @return string
     */
    public static function wrap(string $lang, string $program, string $testcode): string {
        if ($lang === 'python') {
            return $program . "\n" . self::python_harness() . "\n" . $testcode . "\n";
        }
        $harness = $lang === 'cpp' ? self::cpp_harness() : self::c_harness();
        $main = $lang === 'cpp' ? 'int main()' : 'int main(void)';
        if (preg_match_all('/\bTEST\s*\(\s*([A-Za-z_]\w*)\s*\)/', $testcode, $m)) {
            $calls = [];
            foreach ($m[1] as $name) {
                $calls[] = "    _cl_test_{$name}();";
                $calls[] = '    if (_cl_fail) { return 1; }';
            }
            return $program . "\n" . $harness . "\n" . $testcode . "\n"
                . $main . "\n{\n" . implode("\n", $calls) . "\n    return 0;\n}\n";
        }
        $body = '    ' . str_replace("\n", "\n    ", $testcode);
        return $program . "\n" . $harness . "\nstatic void _cl_run(void)\n{\n" . $body . "\n}\n"
            . $main . "\n{\n    _cl_run();\n    return _cl_fail;\n}\n";
    }

    /**
     * C assertion macros (no external dependencies).
     *
     * @return string
     */
    protected static function c_harness(): string {
        return implode("\n", [
            '#include <stdio.h>',
            '#include <stdlib.h>',
            '#include <string.h>',
            '#include <math.h>',
            'static int _cl_fail = 0;',
            '#define ASSERT_TRUE(c) do { if (!(c)) { fprintf(stderr, "FAIL: expected true (%s)\n", #c);'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_FALSE(c) do { if (c) { fprintf(stderr, "FAIL: expected false (%s)\n", #c);'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_EQ(a, b) do { double _a = (double)(a), _b = (double)(b); if (_a != _b) {'
                . ' fprintf(stderr, "FAIL: %s == %s (expected %.10g, got %.10g)\n", #a, #b, _b, _a);'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_NE(a, b) do { double _a = (double)(a), _b = (double)(b); if (_a == _b) {'
                . ' fprintf(stderr, "FAIL: %s != %s (both %.10g)\n", #a, #b, _a);'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_NEAR(a, b, eps) do { double _a = (double)(a), _b = (double)(b), _e = (double)(eps);'
                . ' if (fabs(_a - _b) > _e) { fprintf(stderr, "FAIL: %s ~= %s (expected %.10g +- %.10g, got %.10g)\n",'
                . ' #a, #b, _b, _e, _a); _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_STREQ(a, b) do { const char *_a = (a), *_b = (b);'
                . ' if (!_a || !_b || strcmp(_a, _b) != 0) {'
                . ' fprintf(stderr, "FAIL: %s == %s (expected \"%s\", got \"%s\")\n",'
                . ' #a, #b, _b ? _b : "(null)", _a ? _a : "(null)"); _cl_fail = 1; return; } } while (0)',
            '#define TEST(name) static void _cl_test_##name(void)',
        ]);
    }

    /**
     * C++ assertion macros (works with any stream-printable type).
     *
     * @return string
     */
    protected static function cpp_harness(): string {
        return implode("\n", [
            '#include <iostream>',
            '#include <string>',
            '#include <cmath>',
            'static int _cl_fail = 0;',
            '#define ASSERT_TRUE(c) do { if (!(c)) { std::cerr << "FAIL: expected true (" << #c << ")\n";'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_FALSE(c) do { if (c) { std::cerr << "FAIL: expected false (" << #c << ")\n";'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_EQ(a, b) do { auto _a = (a); auto _b = (b); if (!(_a == _b)) {'
                . ' std::cerr << "FAIL: " << #a << " == " << #b << " (expected " << _b << ", got " << _a << ")\n";'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_NE(a, b) do { auto _a = (a); auto _b = (b); if (_a == _b) {'
                . ' std::cerr << "FAIL: " << #a << " != " << #b << " (both " << _a << ")\n";'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_NEAR(a, b, eps) do { double _a = (double)(a), _b = (double)(b), _e = (double)(eps);'
                . ' if (std::fabs(_a - _b) > _e) { std::cerr << "FAIL: " << #a << " ~= " << #b'
                . ' << " (expected " << _b << " +- " << _e << ", got " << _a << ")\n";'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define ASSERT_STREQ(a, b) do { std::string _a(a), _b(b); if (_a != _b) {'
                . ' std::cerr << "FAIL: " << #a << " == " << #b << " (expected \"" << _b << "\", got \"" << _a << "\")\n";'
                . ' _cl_fail = 1; return; } } while (0)',
            '#define TEST(name) static void _cl_test_##name(void)',
        ]);
    }

    /**
     * Python assertion helpers.
     *
     * @return string
     */
    protected static function python_harness(): string {
        return implode("\n", [
            'import sys as _cl_sys',
            'def assert_true(c, msg=""):',
            '    if not c:',
            '        _cl_sys.stderr.write("FAIL: expected true" + (": " + str(msg) if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_false(c, msg=""):',
            '    if c:',
            '        _cl_sys.stderr.write("FAIL: expected false" + (": " + str(msg) if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_eq(a, b, msg=""):',
            '    if a != b:',
            '        _cl_sys.stderr.write(f"FAIL: expected {b!r}, got {a!r}" + (f": {msg}" if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_ne(a, b, msg=""):',
            '    if a == b:',
            '        _cl_sys.stderr.write(f"FAIL: expected value != {b!r}" + (f": {msg}" if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
            'def assert_near(a, b, eps=1e-6, msg=""):',
            '    if abs(a - b) > eps:',
            '        _cl_sys.stderr.write(f"FAIL: expected {b} +- {eps}, got {a}" + (f": {msg}" if msg else "") + "\\n")',
            '        _cl_sys.exit(1)',
        ]);
    }
}
