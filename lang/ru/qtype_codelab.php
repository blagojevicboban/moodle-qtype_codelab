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
 * Strings for component 'qtype_codelab', language 'ru'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Добавить ещё {no} тестов';
$string['aihints'] = 'Объяснения ИИ';
$string['aihints_help'] = 'Если администратор включил объяснения ошибок ИИ в CodeLab для TinyMCE, ученики получают кнопку под сообщением компилятора или ошибкой своей программы, по которой ИИ сайта объясняет причину. ИИ запрещено писать готовое исправление. Без этой опции кнопка в тесте никогда не показывается.';
$string['aihints_label'] = 'Ученики могут просить ИИ объяснить сообщение компилятора или ошибку';
$string['answer'] = 'Программа';
$string['answerlabel'] = 'Ваша программа ({$a})';
$string['assist'] = 'Подсказки при наборе';
$string['badlimit'] = 'Введите целое число от 1 до {$a} или оставьте пустым для значения по умолчанию.';
$string['badregex'] = 'Недопустимое регулярное выражение.';
$string['badtimelimit'] = 'Введите число секунд от 0.1 до 30 или оставьте пустым, чтобы не ограничивать.';
$string['badtolerance'] = 'Введите число не меньше 0, например 0.001.';
$string['bulkcheck'] = 'Проверить решения CodeLab';
$string['bulkcheck_again'] = 'Проверить снова';
$string['bulkcheck_bank'] = 'Банк вопросов';
$string['bulkcheck_done'] = 'Проверено вопросов: {$a->total}. Проходят все тесты: {$a->ok}, требуют внимания: {$a->problems}.';
$string['bulkcheck_finished'] = 'Готово.';
$string['bulkcheck_intro'] = 'Решение каждого из {$a} вопросов CodeLab в банках вопросов этого курса по очереди запускается на сервере Jobe на тестах этого вопроса. Вопросы, решения которых не проходят тесты, не компилируются или отсутствуют, выводятся первыми. Результаты ранее проверенных решений берутся из кеша.';
$string['bulkcheck_none'] = 'В банках вопросов этого курса нет вопросов CodeLab.';
$string['bulkcheck_progress'] = 'Проверка {$a->done} из {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Результат';
$string['bulkcheck_start'] = 'Начать проверку';
$string['cachedef_results'] = 'Результаты тестов отправленных программ';
$string['check_compile'] = 'Не компилируется';
$string['check_failed'] = 'Проходит {$a->passed} из {$a->total} тестов';
$string['check_jobe'] = 'Jobe не смог выполнить';
$string['check_nosolution'] = 'Нет решения';
$string['check_notests'] = 'Нет тестов (оценивается преподавателем)';
$string['check_ok'] = 'Проходит все тесты ({$a->total})';
$string['checkfailed'] = 'Не удалось проверить программу на сервере (Jobe), поэтому эта попытка не засчитывается. Нажмите «Проверить» ещё раз через мгновение.';
$string['checkorder'] = 'Проверить порядок';
$string['classanalysis'] = 'Анализ';
$string['classanswers'] = 'Ответы';
$string['classempty'] = 'Ответов пока нет.';
$string['classemptyoutput'] = '(нет вывода)';
$string['classgrades'] = 'Оценки (проценты)';
$string['classhidenames'] = 'Скрыть имена';
$string['classmessages'] = 'Наиболее частые сообщения компилятора';
$string['classnotgraded'] = 'не оценено';
$string['classother'] = 'Ответы к другим версиям вопроса ({$a}) не включены в анализ.';
$string['classpending'] = 'Ещё {$a} ответов проверяются; анализ обновится через мгновение.';
$string['classshownames'] = 'Показать имена';
$string['classsimilar'] = 'Похожие работы';
$string['classsimilarnote'] = 'Сравнение выполняется локально по структуре кода (без учёта имён переменных, пробелов, комментариев и исходного шаблона); просмотрите ответы перед принятием решения.';
$string['classstudent'] = 'Ученик {$a}';
$string['classsummary'] = 'Ответов: {$a->answers} · не компилируются: {$a->compile} · ошибка в тесте: {$a->runtime} · превышен лимит времени или памяти: {$a->timelimit}';
$string['classtest'] = 'Тест {$a->n}: прошли {$a->passed} из {$a->total}';
$string['classtesthidden'] = 'Тест {$a->n} (скрытый): прошли {$a->passed} из {$a->total}';
$string['classunchecked'] = 'Ответов, которые не удалось проверить на сервере: {$a}.';
$string['classwork'] = 'Работа класса';
$string['classwrong'] = 'Частые неверные выводы:';
$string['codeheader'] = 'Код';
$string['compare'] = 'Сравнение вывода';
$string['compare_help'] = 'Способ сравнения вывода программы с ожидаемым выводом каждого теста.

* **Точное совпадение**: учитывается каждый символ.
* **Пробелы в конце не учитываются**: пробелы в конце строк и пустые строки в конце игнорируются.
* **Строки в любом порядке**: как предыдущий вариант, но строки могут идти в любом порядке — для SQL-запросов без ORDER BY.
* **Числа с допуском**: вывод сравнивается пословно, и два числа считаются равными, если отличаются не более чем на величину допуска (абсолютного или относительного к большему числу). Пробелы и переводы строк между словами не учитываются.
* **Регулярное выражение**: ожидаемый вывод каждого теста задаётся регулярным выражением (PCRE), которому должен соответствовать весь вывод, например <code>Sum: [0-9]+</code>. Пустые ожидаемые выводы заполняются из решения как шаблоны, совпадающие только с этим выводом.';
$string['comparison_exact'] = 'Точное совпадение';
$string['comparison_numbers'] = 'Числа с допуском';
$string['comparison_regex'] = 'Регулярное выражение';
$string['comparison_spaces'] = 'Пробелы в конце не учитываются';
$string['comparison_unordered'] = 'Строки в любом порядке (строки SQL)';
$string['compileerror'] = 'Программа не компилируется:';
$string['cputime'] = 'Лимит времени ЦП (в секундах)';
$string['cputime_help'] = 'Максимальное время ЦП на один запуск теста при оценивании ответа. Если пусто — используется настройка плагина редактора CodeLab (5 секунд по умолчанию). Не более {$a} секунд (задано администратором). Кнопки «Запустить» и «Запустить тесты» в попытке используют настройку сайта.';
$string['distractors'] = 'Лишние строки (дистракторы)';
$string['distractors_help'] = 'Строки, которые перемешиваются со строками решения, но не принадлежат ему — по одной на строку (например, неверное условие или лишний оператор). Ученики, использовавшие их, не пройдут тесты.';
$string['failed'] = 'Не пройден';
$string['gaps'] = 'Пропуски для заполнения';
$string['gaps_help'] = 'Количество выражений, скрытых в виде пропусков в строках задачи Парсонса (0 — только упорядочивание). Ученики заполняют их, расставляя строки в нужном порядке.';
$string['gaps_none'] = '0 (только упорядочивание)';
$string['hiddensummary'] = 'Скрытых тестов пройдено: {$a->passed} из {$a->total}';
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
$string['language'] = 'Язык программирования';
$string['maxcputime'] = 'Максимальное время ЦП для вопроса';
$string['maxcputime_desc'] = 'Вопросы не могут запрашивать у Jobe больше времени ЦП, чем указано здесь (в секундах на запуск).';
$string['maxmemory'] = 'Максимальный объём памяти для вопроса';
$string['maxmemory_desc'] = 'Вопросы не могут запрашивать у Jobe больше памяти, чем указано здесь (в МБ на запуск).';
$string['memorylimit'] = 'Лимит памяти (МБ)';
$string['memorylimit_help'] = 'Максимальный объём памяти на один запуск теста при оценивании ответа. Если пусто — значение по умолчанию сервера Jobe. Не более {$a} МБ (задано администратором). Язык, которому для запуска нужно больше памяти (для JavaScript требуется 1000 МБ), получает необходимый минимум. На CodeLab runner этот лимит не применяется к Java, C# и JavaScript: там им всегда выделяется куча 256 МБ.';
$string['noanswer'] = 'Сначала напишите программу.';
$string['noassist'] = 'Отключить автодополнение кода и подсказки (для контрольных)';
$string['noexpected'] = 'Укажите ожидаемый вывод или решение, по которому его можно вычислить.';
$string['ordercheck'] = 'Проверка порядка';
$string['ordercheck_help'] = 'Ученики могут нажать «Проверить порядок», чтобы узнать, сколько строк стоит на своих местах, без указания, какие именно. Строка считается на месте, если она входит в наибольшую общую подпоследовательность строк ученика и решения (в Python также с правильным отступом); пробелы не учитываются, а лишние строки никогда не считаются верными. При частичной оценке ответ, не прошедший тесты, получает до половины балла за строки на своих местах. Полный балл по-прежнему определяют тесты.';
$string['ordercheck_off'] = 'Нет';
$string['ordercheck_on'] = 'Да';
$string['ordercheck_partial'] = 'Да, с частичной оценкой за порядок';
$string['ordercheckfailed'] = 'Не удалось проверить порядок.';
$string['orderresult'] = 'Строк на своих местах: {$a->placed} из {$a->total}';
$string['parsons'] = 'Задача Парсонса';
$string['parsons_help'] = 'Ученики не пишут программу с нуля: они получают перемешанные строки решения вместе с лишними строками и расставляют их в правильном порядке (в Python также с нужными отступами). Собранная программа проверяется тестами как обычно.';
$string['parsons_label'] = 'Ответьте, расставив строки решения в правильном порядке';
$string['parsonsadd'] = 'Добавить в программу: {$a}';
$string['parsonsanswer'] = 'Ваша программа';
$string['parsonsdown'] = 'Переместить вниз';
$string['parsonsgap'] = 'Пропуск в строке {$a}';
$string['parsonshint'] = 'Перетащите строки в вашу программу в правильном порядке или нажмите на строку, чтобы добавить её в конец. Некоторые строки могут быть лишними.';
$string['parsonsindent'] = 'Увеличить отступ';
$string['parsonsnosolution'] = 'Для задачи Парсонса требуется решение: именно его строки ученики расставляют по порядку.';
$string['parsonsoutdent'] = 'Уменьшить отступ';
$string['parsonspool'] = 'Строки';
$string['parsonsprogram'] = 'Программа, собранная из ваших строк (её используют «Запустить», «Шаг» и тесты):';
$string['parsonsremove'] = 'Вернуть к списку строк';
$string['parsonsup'] = 'Переместить вверх';
$string['passed'] = 'Пройден';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Ученик пишет программу в редакторе кода. Если заданы тесты, программа запускается на сервере Jobe с входными данными каждого теста и оценивается по доле тестов с правильным выводом. Без тестов работу оценивает преподаватель.';
$string['pluginnameadding'] = 'Добавление вопроса CodeLab';
$string['pluginnameediting'] = 'Редактирование вопроса CodeLab';
$string['pluginnamesummary'] = 'Ученик пишет программу на C, C++, Python, Java или C#.';
$string['prefix'] = 'Код до решения';
$string['prefix_help'] = 'Код, добавляемый перед программой ученика при запуске, например строки #include или начало класса. Ученики не видят его в редакторе.';
$string['privacy:metadata:jobe'] = 'Ответы отправляются на сервер Jobe, указанный администратором, для выполнения на тестах вопроса. Сами ответы хранятся в системе вопросов Moodle.';
$string['privacy:metadata:jobe:code'] = 'Программа, написанная учеником';
$string['privacy:metadata:jobe:stdin'] = 'Входные данные теста';
$string['privacy:metadata:pyodide'] = 'Когда Python запускается в браузере во время попытки («Запустить» и «Шаг»), браузер ученика загружает Pyodide (интерпретатор Python) с адреса, заданного администратором, по умолчанию с CDN jsDelivr. Ответ и входные данные не отправляются.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP-адрес браузера ученика, как при любой загрузке';
$string['privacy:metadata:runner'] = 'Если администратор настроил CodeLab runner (собственный или размещённый), ответы отправляются туда для запуска на тестах вопроса (SQL всегда, остальные языки — когда runner выбран сервером запуска и проверки), а «Запустить» в попытке выполняет программу на нём во время ввода данных учеником. Runner хранит программу только во время выполнения. Сами ответы хранятся в системе вопросов Moodle.';
$string['privacy:metadata:runner:code'] = 'Программа, написанная учеником';
$string['privacy:metadata:runner:stdin'] = 'Входные данные теста или ввод ученика';
$string['privacy:metadata:runner:userid'] = 'Идентификатор ученика в подписанном токене для запуска в попытке, чтобы ограничивать число одновременно запускаемых программ';
$string['runtests'] = 'Запустить тесты';
$string['sandboxfailed'] = 'Не удалось проверить программу на сервере (Jobe). Её оценит преподаватель.';
$string['savefailing'] = 'Сохранить, даже если решение не проходит тесты';
$string['showtests'] = 'Тесты в попытке';
$string['showtests_desc'] = 'Ученики могут запускать нескрытые тесты до отправки ответа';
$string['solution'] = 'Решение';
$string['solution_help'] = 'Программа преподавателя. Пустые ожидаемые выводы тестов заполняются путём её запуска при сохранении вопроса; ученики видят её как правильный ответ при просмотре результатов.';
$string['solutioncheck'] = 'Проверка решения';
$string['solutioncheck_help'] = 'При сохранении вопроса решение запускается на Jobe с входными данными каждого теста, у которого задан ожидаемый вывод, и вопрос сохраняется только при прохождении всех тестов. Отметьте этот флажок, чтобы сохранить в любом случае, например пока вы ещё составляете тесты. Если Jobe недоступен, вопрос сохраняется без проверки.';
$string['solutionfails'] = 'Решение не проходит этот тест. Его вывод: {$a}';
$string['solutionis'] = 'Решение:';
$string['solutionnocompile'] = 'Решение не компилируется: {$a}';
$string['suffix'] = 'Код после решения';
$string['suffix_help'] = 'Код, добавляемый после программы ученика при запуске, например функция main, вызывающая функцию ученика, или конец класса. Ученики не видят его в редакторе.';
$string['template'] = 'Исходный код';
$string['template_help'] = 'Код, с которого ученики начинают работу в редакторе; может быть пустым.';
$string['test'] = 'Тест';
$string['testcode'] = 'Код теста';
$string['testcode_help'] = 'Код, выполняемый в этом тесте, например вызов функции, которую пишет ученик: <code>printf("%d\\n", sum(2, 3));</code> или <code>print(sum(2, 3))</code>. Может быть пустым.

* Если в коде после программы ученика есть маркер <code>{{TEST}}</code>, например внутри написанной вами функции main, код теста подставляется на его место.
* Иначе программа на C или C++ без main получает её автоматически: <code>int main(void) { код теста return 0; }</code>.
* В других языках код теста добавляется в конец программы.

У теста также могут быть входные данные. Ученики видят код нескрытых тестов.';
$string['testcoden'] = 'Тест {no}: код теста';
$string['testexpected'] = 'Ожидаемый вывод';
$string['testfailed'] = 'Тест {$a}: не пройден';
$string['testgot'] = 'Вывод';
$string['testhidden'] = 'Скрыт от учеников';
$string['testinputn'] = 'Тест {no}: ввод';
$string['testpassed'] = 'Тест {$a}: пройден';
$string['tests'] = 'Тесты';
$string['tests_desc'] = 'Каждый тест передаёт программе входные данные и сравнивает её вывод с ожидаемым. Оставьте ожидаемый вывод пустым, чтобы получить его из решения. Без тестов ответы оценивает преподаватель.';
$string['testsof'] = 'Пройдено {$a->passed} из {$a->total} тестов';
$string['teststdin'] = 'Ввод';
$string['testsummary'] = 'Пройдено тестов: {$a->passed} из {$a->total}';
$string['testtime'] = '{$a} с';
$string['testtimemem'] = '{$a->time} с, {$a->memory} МБ';
$string['testweight'] = 'Вес';
$string['timelimit'] = 'Лимит времени на тест (с)';
$string['timelimit_help'] = 'Время в секундах, которое может выполняться один тест: более долгий тест считается не пройденным как слишком медленный, даже если вывод верный. Если пусто — без ограничения. От 0.1 до 30. Время выполнения теста сообщает только CodeLab runner; на Jobe это поле не действует, и единственным ограничением остаётся лимит времени ЦП. Время измеряется на сервере и включает запуск среды языка (около 0.3 с для Java и C#), поэтому оставляйте запас сверх времени хорошего решения.';
$string['tolerance'] = 'Допуск';
$string['tolerance_help'] = 'Для сравнения чисел: наибольшая разность двух чисел, при которой они ещё считаются равными (абсолютная или относительная к большему числу). При 0.001 значение 3.1416 совпадает с 3.1414, а 1000.4 — с 1000.';
$string['tooslow'] = 'Слишком медленно: {$a->time} с, лимит — {$a->limit} с';
