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

use tiny_codelab\local\jobe;

/**
 * Jobe client with the time and memory limits of a question, kept below the largest values the site allows.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class question_jobe extends jobe {
    /** Default largest CPU time a question may ask for, in seconds. */
    const MAX_CPUTIME = 10;

    /** Default largest memory a question may ask for, in MB. */
    const MAX_MEMORY = 2000;

    /** @var int memory limit in MB, 0 for Jobe's default */
    protected $memorylimit;

    /**
     * Client of the plugin settings with the limits of a question.
     *
     * @param int $cputime seconds, 0 for the setting of tiny_codelab
     * @param int $memorylimit MB, 0 for Jobe's default
     */
    public function __construct(int $cputime = 0, int $memorylimit = 0) {
        $cputime = min($cputime, self::max_cputime());
        parent::__construct(null, null, $cputime > 0 ? $cputime : null);
        $this->memorylimit = max(0, min($memorylimit, self::max_memory()));
    }

    /**
     * A client for the limits of a question, or null when it has none (the grader then uses the default client).
     *
     * @param int $cputime
     * @param int $memorylimit
     * @return jobe|null
     */
    public static function for_limits(int $cputime, int $memorylimit): ?jobe {
        return $cputime > 0 || $memorylimit > 0 ? new self($cputime, $memorylimit) : null;
    }

    /**
     * Largest CPU time a question may ask for (setting of qtype_codelab).
     *
     * @return int seconds
     */
    public static function max_cputime(): int {
        $max = (int) get_config('qtype_codelab', 'maxcputime');
        return $max > 0 ? $max : self::MAX_CPUTIME;
    }

    /**
     * Largest memory a question may ask for (setting of qtype_codelab).
     *
     * @return int MB
     */
    public static function max_memory(): int {
        $max = (int) get_config('qtype_codelab', 'maxmemory');
        return $max > 0 ? $max : self::MAX_MEMORY;
    }

    /**
     * The request with the memory limit of the question. It never goes below the limit a language needs to start
     * (Node.js needs 1000 MB).
     *
     * @param string $lang
     * @param string $code
     * @param string $stdin
     * @return array
     */
    public function run_spec(string $lang, string $code, string $stdin = ''): array {
        $spec = parent::run_spec($lang, $code, $stdin);
        if ($this->memorylimit > 0) {
            $parameters = &$spec['run_spec']['parameters'];
            $parameters['memorylimit'] = max($this->memorylimit, (int) ($parameters['memorylimit'] ?? 0));
        }
        return $spec;
    }
}
