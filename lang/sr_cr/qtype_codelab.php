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
 * Strings for component 'qtype_codelab', language 'sr_cr'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Додај још {no} теста';
$string['answer'] = 'Програм';
$string['answerlabel'] = 'Ваш програм ({$a})';
$string['assist'] = 'Помоћ при куцању';
$string['cachedef_results'] = 'Резултати тестова предатих програма';
$string['codeheader'] = 'Код';
$string['compare'] = 'Поређење излаза';
$string['compileerror'] = 'Програм не може да се преведе:';
$string['failed'] = 'Није прошао';
$string['hiddentest'] = 'Скривен тест';
$string['ignorespaces'] = 'Размаци на крају редова и празни редови на крају се не рачунају';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Програмски језик';
$string['noanswer'] = 'Најпре напишите програм.';
$string['noassist'] = 'Искључи допуњавање кода и савете (за контролне задатке)';
$string['noexpected'] = 'Упишите очекивани излаз или решење из ког ће се израчунати.';
$string['passed'] = 'Прошао';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Ученик пише програм у едитору кода. Ако питање има тестове, програм се извршава на Jobe серверу са улазом сваког теста, а оцена је удео тестова са тачним излазом. Без тестова оцењује наставник.';
$string['pluginnameadding'] = 'Додавање CodeLab питања';
$string['pluginnameediting'] = 'Измена CodeLab питања';
$string['pluginnamesummary'] = 'Ученик пише програм у језику C, C++, Python, Java или C#.';
$string['prefix'] = 'Код испред';
$string['prefix_help'] = 'Код који се додаје испред учениковог програма при извршавању, на пример #include редови или почетак класе. Ученици га не виде у едитору.';
$string['privacy:metadata:jobe'] = 'Одговори се шаљу Jobe серверу који је подесио администратор, да се изврше на тестовима питања. Саме одговоре чува систем питања.';
$string['privacy:metadata:jobe:code'] = 'Програм који је ученик написао';
$string['privacy:metadata:jobe:stdin'] = 'Улаз теста';
$string['runtests'] = 'Покрени тестове';
$string['sandboxfailed'] = 'Програм није могао да се провери на серверу (Jobe). Оцениће га наставник.';
$string['showtests'] = 'Тестови у покушају';
$string['showtests_desc'] = 'Ученици могу да покрену тестове који нису скривени пре предаје';
$string['solution'] = 'Решење';
$string['solution_help'] = 'Наставников програм. Празни очекивани излази тестова попуњавају се његовим извршавањем при чувању питања; ученици га у прегледу виде као тачан одговор.';
$string['solutionis'] = 'Једно решење:';
$string['suffix'] = 'Код иза';
$string['suffix_help'] = 'Код који се додаје иза учениковог програма при извршавању, на пример функција main која позива ученикову функцију или крај класе. Ученици га не виде у едитору.';
$string['template'] = 'Почетни код';
$string['template_help'] = 'Код од ког ученици почињу у едитору; може да буде празан.';
$string['test'] = 'Тест';
$string['testexpected'] = 'Очекивани излаз';
$string['testfailed'] = 'Тест {$a}: није прошао';
$string['testgot'] = 'Излаз';
$string['testhidden'] = 'Скривен од ученика';
$string['testinputn'] = 'Тест {no}: улаз';
$string['testpassed'] = 'Тест {$a}: прошао';
$string['tests'] = 'Тестови';
$string['tests_desc'] = 'Сваки тест даје програму улаз и пореди његов излаз са очекиваним. Оставите очекивани излаз празан да се узме из решења. Без тестова одговоре оцењује наставник.';
$string['testsof'] = 'Прошло {$a->passed} од {$a->total} тестова';
$string['teststdin'] = 'Улаз';
$string['testsummary'] = 'Прошло тестова: {$a->passed} од {$a->total}';
$string['testweight'] = 'Тежина';
