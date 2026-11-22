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
$string['aihints'] = 'AI објашњења';
$string['aihints_help'] = 'Када администратор укључи AI објашњења грешака у CodeLab за TinyMCE, ученици испод поруке компајлера или грешке свог програма добијају дугме које тражи од AI сајта да је објасни. AI добија упутство да никад не пише исправку. Без ове опције дугме се у тесту никад не приказује.';
$string['aihints_label'] = 'Ученици могу да траже од AI да објасни поруку компајлера или грешку';
$string['answer'] = 'Програм';
$string['answerlabel'] = 'Ваш програм ({$a})';
$string['assist'] = 'Помоћ при куцању';
$string['badlimit'] = 'Унесите цео број од 1 до {$a}, или оставите празно за подразумевану вредност.';
$string['badregex'] = 'Ово није исправан регуларни израз.';
$string['badtolerance'] = 'Унесите број 0 или већи, на пример 0.001.';
$string['bulkcheck'] = 'Провера решења CodeLab питања';
$string['bulkcheck_again'] = 'Провери поново';
$string['bulkcheck_bank'] = 'Банка питања';
$string['bulkcheck_done'] = 'Проверено питања: {$a->total}. Све тестове пролази {$a->ok}, пажњу тражи {$a->problems}.';
$string['bulkcheck_finished'] = 'Завршено.';
$string['bulkcheck_intro'] = 'Решење сваког од {$a} CodeLab питања у банкама питања овог курса покреће се на Jobe серверу на тестовима тог питања, једно по једно. Питања чије решење не пролази, не преводи се или не постоји наводе се прва. Резултати решења која су већ проверавана узимају се из кеша.';
$string['bulkcheck_none'] = 'У банкама питања овог курса нема CodeLab питања.';
$string['bulkcheck_progress'] = 'Проверава се {$a->done} од {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Резултат';
$string['bulkcheck_start'] = 'Покрени проверу';
$string['cachedef_results'] = 'Резултати тестова предатих програма';
$string['check_compile'] = 'Не преводи се';
$string['check_failed'] = 'Пролази {$a->passed} од {$a->total} тестова';
$string['check_jobe'] = 'Jobe није могао да га покрене';
$string['check_nosolution'] = 'Нема решења';
$string['check_notests'] = 'Нема тестова (оцењује наставник)';
$string['check_ok'] = 'Пролази све тестове ({$a->total})';
$string['checkfailed'] = 'Програм није могао да се провери на серверу (Jobe), па се овај покушај не рачуна. Притисните Провери поново за који тренутак.';
$string['classanalysis'] = 'Анализа';
$string['classanswers'] = 'Одговори';
$string['classempty'] = 'Још нема одговора.';
$string['classemptyoutput'] = '(без излаза)';
$string['classgrades'] = 'Оцене (проценти)';
$string['classhidenames'] = 'Сакриј имена';
$string['classmessages'] = 'Најчешће поруке компајлера';
$string['classnotgraded'] = 'није оцењено';
$string['classother'] = '{$a} одговора на друге верзије питања није анализирано.';
$string['classpending'] = 'Још {$a} одговора се проверава; анализа се допуњује за тренутак.';
$string['classshownames'] = 'Прикажи имена';
$string['classstudent'] = 'Ученик {$a}';
$string['classsummary'] = 'Одговора: {$a->answers} · не преводи се: {$a->compile} · грешка у тесту: {$a->runtime} · преко ограничења времена или меморије: {$a->timelimit}';
$string['classtest'] = 'Тест {$a->n}: пролази {$a->passed} од {$a->total}';
$string['classtesthidden'] = 'Тест {$a->n} (скривен): пролази {$a->passed} од {$a->total}';
$string['classunchecked'] = 'Сервер није могао да провери {$a} одговора.';
$string['classwork'] = 'Рад разреда';
$string['classwrong'] = 'Чести погрешни излази:';
$string['codeheader'] = 'Код';
$string['compare'] = 'Поређење излаза';
$string['compare_help'] = 'Како се излаз програма пореди са очекиваним излазом сваког теста.

* **Тачно**: рачуна се сваки знак.
* **Размаци на крају се не рачунају**: изостављају се размаци на крају редова и празни редови на крају.
* **Редови било којим редоследом**: као претходно, али редови могу доћи било којим редом, за SQL упите без ORDER BY.
* **Бројеви са толеранцијом**: излази се пореде реч по реч, а два броја су једнака када се разликују највише за толеранцију (апсолутно или у односу на већи број). Размаци и преласци у нови ред између речи се не рачунају.
* **Регуларни израз**: очекивани излаз сваког теста је регуларни израз (PCRE) који мора да одговара целом излазу, на пример <code>Збир: [0-9]+</code>. Празни очекивани излази се попуњавају из решења као изрази који одговарају само том излазу.';
$string['comparison_exact'] = 'Тачно';
$string['comparison_numbers'] = 'Бројеви са толеранцијом';
$string['comparison_regex'] = 'Регуларни израз';
$string['comparison_spaces'] = 'Размаци на крају се не рачунају';
$string['comparison_unordered'] = 'Редови било којим редоследом (SQL)';
$string['compileerror'] = 'Програм не може да се преведе:';
$string['cputime'] = 'Ограничење процесорског времена (секунде)';
$string['cputime_help'] = 'Највеће процесорско време једног покретања теста када се одговор оцењује. Празно: подешавање додатка CodeLab за едитор (5 секунди ако није мењано). Највише {$a} секунди (подешава администратор). Покрени и Покрени тестове у покушају користе подешавање сајта.';
$string['distractors'] = 'Линије за збуњивање';
$string['distractors_help'] = 'Линије које се мешају са линијама решења, а не припадају му, једна по реду (на пример погрешан услов или линија која није потребна). Ко их употреби не пролази тестове.';
$string['failed'] = 'Није прошао';
$string['hiddensummary'] = 'Прошло скривених тестова: {$a->passed} од {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Програмски језик';
$string['maxcputime'] = 'Највеће процесорско време питања';
$string['maxcputime_desc'] = 'Питања не могу да траже од Jobe сервера више процесорског времена од овога, у секундама по покретању.';
$string['maxmemory'] = 'Највећа меморија питања';
$string['maxmemory_desc'] = 'Питања не могу да траже од Jobe сервера више меморије од ове, у MB по покретању.';
$string['memorylimit'] = 'Ограничење меморије (MB)';
$string['memorylimit_help'] = 'Највећа меморија једног покретања теста када се одговор оцењује. Празно: подразумевана вредност Jobe сервера. Највише {$a} MB (подешава администратор). Језик коме треба више за покретање (JavaScript тражи 1000 MB) добија колико му треба. На CodeLab runner-у ово ограничење не важи за Java, C# и JavaScript: тамо увек добијају 256 MB меморије за објекте (heap).';
$string['noanswer'] = 'Најпре напишите програм.';
$string['noassist'] = 'Искључи допуњавање кода и савете (за контролне задатке)';
$string['noexpected'] = 'Упишите очекивани излаз или решење из ког ће се израчунати.';
$string['parsons'] = 'Парсонсов задатак';
$string['parsons_help'] = 'Ученици не пишу програм: добијају измешане линије решења и линије за збуњивање и ређају их (у Python-у и са правим увлачењем). Програм који тако сложе оцењује се тестовима као и обично.';
$string['parsons_label'] = 'Одговор се даје ређањем линија решења';
$string['parsonsadd'] = 'Додај у програм: {$a}';
$string['parsonsanswer'] = 'Ваш програм';
$string['parsonsdown'] = 'Помери доле';
$string['parsonshint'] = 'Превуците линије у свој програм правим редом или кликните линију да је додате на крај. Неке линије можда нису потребне.';
$string['parsonsindent'] = 'Увуци';
$string['parsonsnosolution'] = 'Парсонсовом задатку треба решење: његове линије ученици ређају.';
$string['parsonsoutdent'] = 'Извуци';
$string['parsonspool'] = 'Линије';
$string['parsonsprogram'] = 'Програм од ваших линија (Run, Step и тестови користе њега):';
$string['parsonsremove'] = 'Врати у линије';
$string['parsonsup'] = 'Помери горе';
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
$string['privacy:metadata:pyodide'] = 'Кад Python ради у прегледачу током покушаја (Покрени и Корак), прегледач ученика учитава Pyodide (Python интерпретер) са адресе коју је подесио администратор, подразумевано са jsDelivr CDN-а. Одговор и улаз се не шаљу.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP адреса прегледача ученика, као при сваком преузимању';
$string['privacy:metadata:runner'] = 'Када администратор подеси CodeLab runner (сопствени или хостовани), одговори се шаљу на њега да се изврше на тестовима питања (SQL увек, остали језици када је runner сервер за извршавање и оцењивање), а Покрени у покушају извршава програм на њему док ученик куца улаз. Runner чува програм само док ради. Саме одговоре чува систем питања.';
$string['privacy:metadata:runner:code'] = 'Програм који је ученик написао';
$string['privacy:metadata:runner:stdin'] = 'Улаз теста, или улаз који ученик куца';
$string['privacy:metadata:runner:userid'] = 'Идентификатор ученика, у потписаном токену за Покрени у покушају, ради ограничења броја програма које један корисник покреће истовремено';
$string['runtests'] = 'Покрени тестове';
$string['sandboxfailed'] = 'Програм није могао да се провери на серверу (Jobe). Оцениће га наставник.';
$string['savefailing'] = 'Сачувај и ако решење не пролази тестове';
$string['showtests'] = 'Тестови у покушају';
$string['showtests_desc'] = 'Ученици могу да покрену тестове који нису скривени пре предаје';
$string['solution'] = 'Решење';
$string['solution_help'] = 'Наставников програм. Празни очекивани излази тестова попуњавају се његовим извршавањем при чувању питања; ученици га у прегледу виде као тачан одговор.';
$string['solutioncheck'] = 'Провера решења';
$string['solutioncheck_help'] = 'Када се питање чува, решење се покреће на Jobe серверу са улазом сваког теста који има очекивани излаз, и питање се чува само ако их све прође. Означите ово поље да бисте га ипак сачували, на пример док још пишете тестове. Када Jobe није доступан, питање се чува без провере.';
$string['solutionfails'] = 'Решење не пролази овај тест. Његов излаз: {$a}';
$string['solutionis'] = 'Једно решење:';
$string['solutionnocompile'] = 'Решење се не преводи: {$a}';
$string['suffix'] = 'Код иза';
$string['suffix_help'] = 'Код који се додаје иза учениковог програма при извршавању, на пример функција main која позива ученикову функцију или крај класе. Ученици га не виде у едитору.';
$string['template'] = 'Почетни код';
$string['template_help'] = 'Код од ког ученици почињу у едитору; може да буде празан.';
$string['test'] = 'Тест';
$string['testcode'] = 'Код теста';
$string['testcode_help'] = 'Код који се извршава у овом тесту, на пример позив функције коју пише ученик: <code>printf("%d\\n", zbir(2, 3));</code> или <code>print(zbir(2, 3))</code>. Може бити празан.

* Ако код после учениковог програма има ознаку <code>{{TEST}}</code>, на пример у функцији main коју ви пишете, код теста долази на њено место.
* Иначе C или C++ програм без функције main добија је: <code>int main(void) { код теста return 0; }</code>.
* У осталим језицима код теста се додаје на крај програма.

Тест може имати и улаз. Ученици виде код тестова који нису скривени.';
$string['testcoden'] = 'Тест {no}: код теста';
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
$string['tolerance'] = 'Толеранција';
$string['tolerance_help'] = 'За поређење бројева: највећа разлика два броја која се још рачунају као једнаки, апсолутно или у односу на већи број. Са 0.001, 3.1416 одговара 3.1414, а 1000.4 одговара 1000.';
