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
 * Strings for component 'qtype_codelab', language 'mk' (Macedonian).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Додај уште {no} тестови';
$string['aihints'] = 'Објаснувања од ВИ';
$string['aihints_help'] = 'Кога администраторот ќе ги вклучи објаснувањата на грешки од ВИ на CodeLab за TinyMCE, учениците под порака од компајлерот или грешка во нивната програма добиваат копче што бара од вештачката интелигенција на страницата да ја објасни. Вештачката интелигенција има упатство никогаш да не ја напише поправката. Без оваа опција копчето никогаш не се прикажува во квиз.';
$string['aihints_label'] = 'Учениците смеат да побараат од ВИ да објасни порака од компајлерот или грешка';
$string['answer'] = 'Програма';
$string['answerlabel'] = 'Вашата програма ({$a})';
$string['assist'] = 'Помош при пишување';
$string['badlimit'] = 'Внесете цел број од 1 до {$a} или оставете празно за стандардната вредност.';
$string['badregex'] = 'Ова не е валиден регуларен израз.';
$string['badtimelimit'] = 'Внесете број секунди од 0.1 до 30, или оставете празно за без ограничување.';
$string['badtolerance'] = 'Внесете број 0 или поголем, на пример 0.001.';
$string['bulkcheck'] = 'Провери ги CodeLab решенијата';
$string['bulkcheck_again'] = 'Провери повторно';
$string['bulkcheck_bank'] = 'Банка прашања';
$string['bulkcheck_done'] = 'Проверени прашања: {$a->total}; {$a->ok} ги поминуваат сите свои тестови, {$a->problems} бараат внимание.';
$string['bulkcheck_finished'] = 'Завршено.';
$string['bulkcheck_intro'] = 'Решението на секое од {$a} CodeLab прашања во банките прашања на овој курс се извршува на Jobe серверот на тестовите на своето прашање, едно по едно. Прашањата чие решение паѓа, не се компајлира или недостасува се наведени први. Резултатите на веќе проверените решенија се земаат од кешот.';
$string['bulkcheck_none'] = 'Во банките прашања на овој курс нема CodeLab прашања.';
$string['bulkcheck_progress'] = 'Се проверува {$a->done} од {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Резултат';
$string['bulkcheck_start'] = 'Започни ја проверката';
$string['cachedef_results'] = 'Резултати од тестовите на поднесените програми';
$string['check_compile'] = 'Не се компајлира';
$string['check_failed'] = 'Поминува {$a->passed} од {$a->total} тестови';
$string['check_jobe'] = 'Jobe не можеше да го изврши';
$string['check_nosolution'] = 'Нема решение';
$string['check_notests'] = 'Нема тестови (оценува наставникот)';
$string['check_ok'] = 'Ги поминува сите тестови ({$a->total})';
$string['checkfailed'] = 'Програмата не можеше да се провери на серверот (Jobe), па овој обид не се брои. За момент притиснете повторно Провери.';
$string['checkorder'] = 'Провери го редоследот';
$string['classanalysis'] = 'Анализа';
$string['classanswers'] = 'Одговори';
$string['classempty'] = 'Сè уште нема одговори.';
$string['classemptyoutput'] = '(нема излез)';
$string['classgrades'] = 'Оценки (процент)';
$string['classhidenames'] = 'Скриј ги имињата';
$string['classmessages'] = 'Најчести пораки од компајлерот';
$string['classnotgraded'] = 'не е оценето';
$string['classother'] = '{$a} одговори на други верзии на прашањето не се анализираат.';
$string['classpending'] = 'Се проверуваат уште {$a} одговори; анализата ќе се прошири за момент.';
$string['classshownames'] = 'Прикажи ги имињата';
$string['classsimilar'] = 'Слични предадени решенија';
$string['classsimilarnote'] = 'Споредено локално по структура на код (без имиња на променливи, празни места, коментари и почетен код); прегледајте ги одговорите пред одлука.';
$string['classstudent'] = 'Ученик {$a}';
$string['classsummary'] = 'Одговори: {$a->answers} · не се компајлираат: {$a->compile} · грешка во тест: {$a->runtime} · над ограничувањето на време или меморија: {$a->timelimit}';
$string['classtest'] = 'Тест {$a->n}: поминуваат {$a->passed} од {$a->total}';
$string['classtesthidden'] = 'Тест {$a->n} (скриен): поминуваат {$a->passed} од {$a->total}';
$string['classunchecked'] = 'Серверот не можеше да провери {$a} одговори.';
$string['classwork'] = 'Работа на одделението';
$string['classwrong'] = 'Чести погрешни излези:';
$string['codeheader'] = 'Код';
$string['compare'] = 'Споредба на излезот';
$string['compare_help'] = 'Како излезот на програмата се споредува со очекуваниот излез на секој тест.

* **Точно**: секој знак се брои.
* **Празните места на крајот не се бројат**: празните места на крајот на редовите и празните редови на крајот се изоставуваат.
* **Редови по кој било редослед**: како претходното, но редовите можат да дојдат по кој било редослед, за SQL барања без ORDER BY.
* **Броеви со толеранција**: излезите се споредуваат збор по збор, а два броја се еднакви кога се разликуваат најмногу за толеранцијата (апсолутна или релативна според поголемиот број). Празните места и новите редови меѓу зборовите не се бројат.
* **Регуларен израз**: очекуваниот излез на секој тест е регуларен израз (PCRE) што мора да се совпадне со целиот излез, на пример <code>Sum: [0-9]+</code>. Празните очекувани излези се пополнуваат од решението како шаблони што се совпаѓаат само со тој излез.';
$string['comparison_exact'] = 'Точно';
$string['comparison_numbers'] = 'Броеви со толеранција';
$string['comparison_regex'] = 'Регуларен израз';
$string['comparison_spaces'] = 'Празните места на крајот не се бројат';
$string['comparison_unordered'] = 'Редови по кој било редослед (SQL редови)';
$string['compileerror'] = 'Програмата не се компајлира:';
$string['cputime'] = 'Временско ограничување на процесорот (секунди)';
$string['cputime_help'] = 'Најголемо процесорско време на едно извршување на тест кога се оценува одговорот. Празно: поставката на приклучокот за уредувач CodeLab (5 секунди ако не е променето). Најмногу {$a} секунди (поставува администраторот). Изврши и Изврши ги тестовите во обидот ја задржуваат поставката на страницата.';
$string['distractors'] = 'Редови за заблуда';
$string['distractors_help'] = 'Редови што се мешаат со редовите од решението, но не му припаѓаат, по еден во ред (на пример погрешен услов или непотребен ред). Учениците што ги користат не ги поминуваат тестовите.';
$string['failed'] = 'Не помина';
$string['gaps'] = 'Празнини за дополнување';
$string['gaps_help'] = 'Број на изрази скриени како празнини во редовите на Парсонсовата задача (0 само за подредување). Учениците ги дополнуваат додека ги подредуваат редовите.';
$string['gaps_none'] = '0 (само подредување)';
$string['hiddensummary'] = 'Поминати скриени тестови: {$a->passed} од {$a->total}';
$string['importcr'] = 'Import CodeRunner XML';
$string['importcr_category'] = 'Target question category';
$string['importcr_done'] = 'Imported {$a->converted} CodeLab questions ({$a->skipped} skipped).';
$string['importcr_failed'] = 'The Moodle XML importer reported an error ({$a->converted} converted, {$a->skipped} skipped).';
$string['importcr_file'] = 'CodeRunner Moodle XML file';
$string['importcr_intro'] = 'Upload a Moodle XML file exported from CodeRunner. Supported C, C++, Python, Java, C#, JavaScript, PHP, Pascal, SQL and other standard questions are converted directly into CodeLab questions in the chosen category.';
$string['importcr_invalid'] = 'The uploaded file is not a valid Moodle XML quiz export.';
$string['importcr_none'] = 'No supported CodeRunner questions were found in the uploaded XML file.';
$string['importcr_reason'] = 'Reason';
$string['importcr_skipped'] = 'Skipped questions';
$string['importcr_submit'] = 'Import into question bank';
$string['importcr_type'] = 'CodeRunner type';
$string['lang_bash'] = 'Bash';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_dart'] = 'Dart';
$string['lang_elixir'] = 'Elixir';
$string['lang_go'] = 'Go';
$string['lang_haskell'] = 'Haskell';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_julia'] = 'Julia';
$string['lang_kotlin'] = 'Kotlin';
$string['lang_lua'] = 'Lua';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_octave'] = 'Octave';
$string['lang_pascal'] = 'Pascal';
$string['lang_perl'] = 'Perl';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['lang_r'] = 'R';
$string['lang_ruby'] = 'Ruby';
$string['lang_rust'] = 'Rust';
$string['lang_scala'] = 'Scala';
$string['lang_scheme'] = 'Scheme';
$string['lang_swift'] = 'Swift';
$string['lang_typescript'] = 'TypeScript';
$string['language'] = 'Програмски јазик';
$string['maxcputime'] = 'Најголемо процесорско време на прашање';
$string['maxcputime_desc'] = 'Прашањата не можат да бараат од Jobe повеќе процесорско време од ова, во секунди по извршување.';
$string['maxmemory'] = 'Најголема меморија на прашање';
$string['maxmemory_desc'] = 'Прашањата не можат да бараат од Jobe повеќе меморија од оваа, во MB по извршување.';
$string['memorylimit'] = 'Ограничување на меморијата (MB)';
$string['memorylimit_help'] = 'Најголема меморија на едно извршување на тест кога се оценува одговорот. Празно: стандардната вредност на Jobe серверот. Најмногу {$a} MB (поставува администраторот). Јазик на кој му треба повеќе за да започне (на JavaScript му требаат 1000 MB) добива колку што му треба. На CodeLab runner ова ограничување не важи за Java, C# и JavaScript: таму секогаш добиваат heap од 256 MB.';
$string['noanswer'] = 'Прво напишете програма.';
$string['noassist'] = 'Исклучи го дополнувањето код и советите (за проверки)';
$string['noexpected'] = 'Внесете го очекуваниот излез или решение од кое ќе се пресмета.';
$string['ordercheck'] = 'Проверка на редоследот';
$string['ordercheck_help'] = 'Учениците можат да притиснат Провери го редоследот за да видат колку редови се на своето место, никогаш кои. Редот е на место кога припаѓа на најдолгиот заеднички низ од нивните редови и редовите на решението (во Python и со исто вовлекување); празните места не се сметаат, а редовите-стапици никогаш не се на место. Со дел од оценката: одговор што не ги поминува тестовите добива до половина од оценката за редовите на место. Целосната оценка и понатаму ја одредуваат тестовите.';
$string['ordercheck_off'] = 'Не';
$string['ordercheck_on'] = 'Да';
$string['ordercheck_partial'] = 'Да, со дел од оценката за редоследот';
$string['ordercheckfailed'] = 'Редоследот не можеше да се провери.';
$string['orderresult'] = 'Редови на своето место: {$a->placed} од {$a->total}';
$string['parsons'] = 'Парсонсова задача';
$string['parsons_help'] = 'Учениците не ја пишуваат програмата: ги добиваат редовите од решението, измешани со редовите за заблуда, и ги подредуваат (во Python и со правилно вовлекување). Програмата што ќе ја сложат се оценува со тестовите како и обично.';
$string['parsons_label'] = 'Одговор со подредување на редовите од решението';
$string['parsonsadd'] = 'Додај во програмата: {$a}';
$string['parsonsanswer'] = 'Вашата програма';
$string['parsonsdown'] = 'Помести надолу';
$string['parsonsgap'] = 'Празнина во ред {$a}';
$string['parsonshint'] = 'Повлечете ги редовите во вашата програма по правилниот редослед или кликнете на ред за да го додадете на крајот. Некои редови можеби не се потребни.';
$string['parsonsindent'] = 'Вовлечи';
$string['parsonsnosolution'] = 'На Парсонсовата задача ѝ треба решението: неговите редови учениците ги подредуваат.';
$string['parsonsoutdent'] = 'Извлечи';
$string['parsonspool'] = 'Редови';
$string['parsonsprogram'] = 'Програмата составена од вашите редови (ја користат Изврши, Чекор и тестовите):';
$string['parsonsremove'] = 'Назад меѓу редовите';
$string['parsonsup'] = 'Помести нагоре';
$string['passed'] = 'Помина';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Ученикот пишува програма во уредувач на код. Со тестови, програмата се извршува на Jobe серверот со влезот на секој тест и се оценува според делот од тестовите со точен излез. Без тестови ја оценува наставникот.';
$string['pluginnameadding'] = 'Додавање CodeLab прашање';
$string['pluginnameediting'] = 'Уредување CodeLab прашање';
$string['pluginnamesummary'] = 'Ученикот пишува програма во C, C++, Python, Java или C#.';
$string['prefix'] = 'Код пред';
$string['prefix_help'] = 'Код што при извршувањето се додава пред програмата на ученикот, на пример редови #include или почетокот на класа. Учениците не го гледаат во уредувачот.';
$string['privacy:metadata:jobe'] = 'Одговорите се праќаат на Jobe серверот што го поставил администраторот за да се извршат на тестовите на прашањето. Самите одговори ги чува системот за прашања.';
$string['privacy:metadata:jobe:code'] = 'Програмата што ја напишал ученикот';
$string['privacy:metadata:jobe:stdin'] = 'Влезот на тест';
$string['privacy:metadata:pyodide'] = 'Кога Python се извршува во прелистувачот во обид (Изврши и Чекор), прелистувачот на ученикот го вчитува Pyodide (Python интерпретерот) од адресата што ја поставил администраторот, стандардно од jsDelivr CDN. Не се праќа никаков одговор ниту влез.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP адресата на прелистувачот на ученикот, како при секое преземање';
$string['privacy:metadata:runner'] = 'Кога администраторот ќе постави CodeLab runner (сопствен или хостиран), одговорите се праќаат таму за да се извршат на тестовите на прашањето (SQL секогаш, другите јазици кога runner е серверот за извршување и оценување), а Изврши во обидот таму ја извршува програмата додека ученикот го пишува влезот. Runner ја чува програмата само додека работи. Самите одговори ги чува системот за прашања.';
$string['privacy:metadata:runner:code'] = 'Програмата што ја напишал ученикот';
$string['privacy:metadata:runner:stdin'] = 'Влезот на тест или влезот што го пишува ученикот';
$string['privacy:metadata:runner:userid'] = 'ID на ученикот, во потпишан токен за Изврши во обидот, за да се ограничи бројот на програми што секој корисник ги извршува истовремено';
$string['runtests'] = 'Изврши ги тестовите';
$string['sandboxfailed'] = 'Програмата не можеше да се провери на серверот (Jobe). Ќе ја оцени вашиот наставник.';
$string['savefailing'] = 'Зачувај и ако решението не ги поминува тестовите';
$string['showtests'] = 'Тестови во обидот';
$string['showtests_desc'] = 'Учениците можат да ги извршат тестовите што не се скриени пред да предадат';
$string['solution'] = 'Решение';
$string['solution_help'] = 'Програмата на наставникот. Празните очекувани излези на тестовите се пополнуваат со нејзино извршување при зачувување на прашањето; учениците ја гледаат како точен одговор во прегледот.';
$string['solutioncheck'] = 'Проверка на решението';
$string['solutioncheck_help'] = 'При зачувување на прашањето решението се извршува на Jobe со влезот на секој тест што има очекуван излез, а прашањето се зачувува само ако ги помине сите. Штиклирајте го ова поле за сепак да зачувате, на пример додека сè уште ги пишувате тестовите. Кога Jobe не е достапен, прашањето се зачувува без проверка.';
$string['solutionfails'] = 'Решението не го поминува овој тест. Неговиот излез: {$a}';
$string['solutionis'] = 'Решение:';
$string['solutionnocompile'] = 'Решението не се компајлира: {$a}';
$string['suffix'] = 'Код по';
$string['suffix_help'] = 'Код што при извршувањето се додава по програмата на ученикот, на пример функција main што ја повикува функцијата на ученикот, или крајот на класа. Учениците не го гледаат во уредувачот.';
$string['template'] = 'Почетен код';
$string['template_help'] = 'Код од кој учениците почнуваат во уредувачот; може да биде празен.';
$string['test'] = 'Тест';
$string['testcode'] = 'Код на тестот';
$string['testcode_help'] = 'Код што се извршува во овој тест, на пример повик на функцијата што ја пишува ученикот: <code>printf("%d\\n", sum(2, 3));</code> или <code>print(sum(2, 3))</code>. Може да биде празен.

* Ако кодот по програмата на ученикот ја има ознаката <code>{{TEST}}</code>, на пример во main што вие го пишувате, кодот на тестот доаѓа на нејзиното место.
* Инаку C или C++ програма без main добива една: <code>int main(void) { test code return 0; }</code>.
* Во другите јазици кодот на тестот се додава на крајот на програмата.

Тестот може да има и влез. Учениците го гледаат кодот на тестовите што не се скриени.';
$string['testcoden'] = 'Тест {no}: код на тестот';
$string['testexpected'] = 'Очекуван излез';
$string['testfailed'] = 'Тест {$a}: не помина';
$string['testgot'] = 'Излез';
$string['testhidden'] = 'Скриено од учениците';
$string['testinputn'] = 'Тест {no}: влез';
$string['testpassed'] = 'Тест {$a}: помина';
$string['tests'] = 'Тестови';
$string['tests_desc'] = 'Секој тест ѝ дава влез на програмата и го споредува нејзиниот излез со очекуваниот излез. Оставете го очекуваниот излез празен за да се земе од решението. Без тестови одговорите ги оценува наставникот.';
$string['testsof'] = 'Поминати {$a->passed} од {$a->total} тестови';
$string['teststdin'] = 'Влез';
$string['testsummary'] = 'Поминати тестови: {$a->passed} од {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Тежина';
$string['timelimit'] = 'Временско ограничување по тест (s)';
$string['timelimit_help'] = 'Колку секунди смее да трае еден тест: тест што трае подолго паѓа како премногу бавен, и кога неговиот излез е точен. Празно: без ограничување. Од 0.1 до 30. Само CodeLab runner јавува колку траел тестот; на Jobe ова поле нема ефект и единственото ограничување е процесорското време. Времето се мери на серверот и го вклучува стартувањето на јазикот (околу 0.3 секунди за Java и C#), па оставете простор над времето на добро решение.';
$string['tolerance'] = 'Толеранција';
$string['tolerance_help'] = 'За споредба со броеви: најголемата разлика на два броја што сè уште се смета за еднаквост, апсолутна или релативна според поголемиот број. Со 0.001, 3.1416 се совпаѓа со 3.1414, а 1000.4 со 1000.';
$string['tooslow'] = 'Премногу бавно: {$a->time} s, ограничувањето е {$a->limit} s';
