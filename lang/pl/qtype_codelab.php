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
 * Strings for component 'qtype_codelab', language 'pl' (Polish).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Dodaj jeszcze {no} testów';
$string['aihints'] = 'Wyjaśnienia AI';
$string['aihints_help'] = 'Gdy administrator włączy wyjaśnienia błędów przez AI w CodeLab dla TinyMCE, uczniowie dostają pod komunikatem kompilatora lub błędem swojego programu przycisk, który prosi AI strony o wyjaśnienie. AI ma polecenie, by nigdy nie pisać poprawki. Bez tej opcji przycisk nigdy nie jest pokazywany w quizie.';
$string['aihints_label'] = 'Uczniowie mogą prosić AI o wyjaśnienie komunikatu kompilatora lub błędu';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Twój program ({$a})';
$string['assist'] = 'Pomoc przy pisaniu';
$string['badlimit'] = 'Podaj liczbę całkowitą od 1 do {$a} albo zostaw puste dla wartości domyślnej.';
$string['badregex'] = 'To nie jest poprawne wyrażenie regularne.';
$string['badtimelimit'] = 'Podaj liczbę sekund od 0.1 do 30 albo zostaw puste, aby nie było limitu.';
$string['badtolerance'] = 'Podaj liczbę 0 lub większą, na przykład 0.001.';
$string['bulkcheck'] = 'Sprawdź rozwiązania CodeLab';
$string['bulkcheck_again'] = 'Sprawdź ponownie';
$string['bulkcheck_bank'] = 'Bank pytań';
$string['bulkcheck_done'] = 'Sprawdzono {$a->total} pytań: {$a->ok} przechodzi wszystkie swoje testy, {$a->problems} wymaga uwagi.';
$string['bulkcheck_finished'] = 'Zakończono.';
$string['bulkcheck_intro'] = 'Rozwiązanie każdego z {$a} pytań CodeLab w bankach pytań tego kursu jest uruchamiane na serwerze Jobe z testami jego pytania, jedno po drugim. Pytania, których rozwiązanie nie przechodzi, nie kompiluje się lub go brak, są wymienione najpierw. Wyniki rozwiązań sprawdzonych wcześniej pochodzą z pamięci podręcznej.';
$string['bulkcheck_none'] = 'W bankach pytań tego kursu nie ma pytań CodeLab.';
$string['bulkcheck_progress'] = 'Sprawdzanie {$a->done} z {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Wynik';
$string['bulkcheck_start'] = 'Rozpocznij sprawdzanie';
$string['cachedef_results'] = 'Wyniki testów przesłanych programów';
$string['check_compile'] = 'Nie kompiluje się';
$string['check_failed'] = 'Przechodzi {$a->passed} z {$a->total} testów';
$string['check_jobe'] = 'Jobe nie mógł go uruchomić';
$string['check_nosolution'] = 'Brak rozwiązania';
$string['check_notests'] = 'Brak testów (ocenia nauczyciel)';
$string['check_ok'] = 'Przechodzi wszystkie testy ({$a->total})';
$string['checkfailed'] = 'Nie udało się sprawdzić programu na serwerze (Jobe), więc ta próba się nie liczy. Za chwilę naciśnij ponownie Sprawdź.';
$string['checkorder'] = 'Sprawdź kolejność';
$string['classanalysis'] = 'Analiza';
$string['classanswers'] = 'Odpowiedzi';
$string['classempty'] = 'Jeszcze brak odpowiedzi.';
$string['classemptyoutput'] = '(brak wyniku)';
$string['classexportcsv'] = 'Eksportuj CSV';
$string['classgrades'] = 'Oceny (procent)';
$string['classhidenames'] = 'Ukryj nazwiska';
$string['classmessages'] = 'Najczęstsze komunikaty kompilatora';
$string['classnotgraded'] = 'nieocenione';
$string['classother'] = '{$a} odpowiedzi na inne wersje pytania nie jest analizowanych.';
$string['classpending'] = 'Sprawdzanych jest jeszcze {$a} odpowiedzi; analiza za chwilę się powiększy.';
$string['classshownames'] = 'Pokaż nazwiska';
$string['classsimilar'] = 'Podobne rozwiązania';
$string['classsimilarnote'] = 'Porównano lokalnie według struktury kodu (z pominięciem nazw zmiennych, spacji, komentarzy i kodu startowego); sprawdź odpowiedzi przed decyzją.';
$string['classstudent'] = 'Uczeń {$a}';
$string['classsummary'] = 'Odpowiedzi: {$a->answers} · nie kompilują się: {$a->compile} · błąd w teście: {$a->runtime} · ponad limitem czasu lub pamięci: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: przechodzi {$a->passed} z {$a->total}';
$string['classtesthidden'] = 'Test {$a->n} (ukryty): przechodzi {$a->passed} z {$a->total}';
$string['classunchecked'] = 'Serwer nie mógł sprawdzić {$a} odpowiedzi.';
$string['classwork'] = 'Praca klasy';
$string['classwrong'] = 'Częste błędne wyniki:';
$string['codeheader'] = 'Kod';
$string['compare'] = 'Porównywanie wyniku';
$string['compare_help'] = 'Jak wynik programu jest porównywany z oczekiwanym wynikiem każdego testu.

* **Dokładnie**: liczy się każdy znak.
* **Spacje na końcu się nie liczą**: spacje na końcu wierszy i puste wiersze na końcu są pomijane.
* **Wiersze w dowolnej kolejności**: jak poprzednio, ale wiersze mogą być w dowolnej kolejności, dla zapytań SQL bez ORDER BY.
* **Liczby z tolerancją**: wyniki są porównywane słowo po słowie, a dwie liczby są równe, gdy różnią się nie więcej niż o tolerancję (bezwzględną lub względną wobec większej liczby). Spacje i znaki nowego wiersza między słowami się nie liczą.
* **Wyrażenie regularne**: oczekiwany wynik każdego testu to wyrażenie regularne (PCRE), które musi pasować do całego wyniku, na przykład <code>Sum: [0-9]+</code>. Puste oczekiwane wyniki są wypełniane na podstawie rozwiązania wzorcami, które pasują tylko do tego wyniku.';
$string['comparison_exact'] = 'Dokładnie';
$string['comparison_numbers'] = 'Liczby z tolerancją';
$string['comparison_regex'] = 'Wyrażenie regularne';
$string['comparison_spaces'] = 'Spacje na końcu się nie liczą';
$string['comparison_unordered'] = 'Wiersze w dowolnej kolejności (wiersze SQL)';
$string['compileerror'] = 'Program się nie kompiluje:';
$string['cputime'] = 'Limit czasu procesora (sekundy)';
$string['cputime_help'] = 'Największy czas procesora jednego uruchomienia testu przy ocenianiu odpowiedzi. Puste: ustawienie wtyczki edytora CodeLab (5 sekund, jeśli nie zmieniono). Najwyżej {$a} sekund (ustala administrator). Uruchom i Uruchom testy w podejściu zachowują ustawienie strony.';
$string['distractors'] = 'Wiersze-pułapki';
$string['distractors_help'] = 'Wiersze mieszane z wierszami rozwiązania, ale do niego nienależące, po jednym w wierszu (na przykład błędny warunek lub zbędny wiersz). Uczniowie, którzy ich użyją, nie przejdą testów.';
$string['failed'] = 'Niezaliczony';
$string['gaps'] = 'Luki do uzupełnienia';
$string['gaps_help'] = 'Liczba wyrażeń ukrytych jako luki w wierszach zadania Parsonsa (0 tylko układanie). Uczniowie uzupełniają je podczas układania wierszy.';
$string['gaps_none'] = '0 (tylko układanie)';
$string['hiddensummary'] = 'Zaliczone ukryte testy: {$a->passed} z {$a->total}';
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
$string['language'] = 'Język programowania';
$string['maxcputime'] = 'Największy czas procesora pytania';
$string['maxcputime_desc'] = 'Pytania nie mogą prosić Jobe o więcej czasu procesora niż ten, w sekundach na uruchomienie.';
$string['maxmemory'] = 'Największa pamięć pytania';
$string['maxmemory_desc'] = 'Pytania nie mogą prosić Jobe o więcej pamięci niż ta, w MB na uruchomienie.';
$string['memorylimit'] = 'Limit pamięci (MB)';
$string['memorylimit_help'] = 'Największa pamięć jednego uruchomienia testu przy ocenianiu odpowiedzi. Puste: wartość domyślna serwera Jobe. Najwyżej {$a} MB (ustala administrator). Język, który do startu potrzebuje więcej (JavaScript potrzebuje 1000 MB), dostaje tyle, ile potrzebuje. Na CodeLab runner ten limit nie dotyczy Javy, C# i JavaScript: zawsze dostają tam stertę 256 MB.';
$string['noanswer'] = 'Najpierw napisz program.';
$string['noassist'] = 'Wyłącz podpowiadanie kodu i wskazówki (na sprawdziany)';
$string['noexpected'] = 'Podaj oczekiwany wynik albo rozwiązanie, z którego zostanie obliczony.';
$string['ordercheck'] = 'Sprawdzanie kolejności';
$string['ordercheck_help'] = 'Uczniowie mogą nacisnąć Sprawdź kolejność, aby zobaczyć, ile wierszy jest na swoim miejscu, nigdy które. Wiersz jest na miejscu, gdy należy do najdłuższego wspólnego ciągu ich wierszy i wierszy rozwiązania (w Pythonie także z tym samym wcięciem); spacje się nie liczą, a wiersze-pułapki nigdy nie są na miejscu. Z częścią oceny: odpowiedź, która nie przechodzi testów, dostaje do połowy oceny za wiersze na miejscu. Pełną ocenę nadal decydują testy.';
$string['ordercheck_off'] = 'Nie';
$string['ordercheck_on'] = 'Tak';
$string['ordercheck_partial'] = 'Tak, z częścią oceny za kolejność';
$string['ordercheckfailed'] = 'Nie udało się sprawdzić kolejności.';
$string['orderresult'] = 'Wiersze na miejscu: {$a->placed} z {$a->total}';
$string['parsons'] = 'Zadanie Parsonsa';
$string['parsons_help'] = 'Uczniowie nie piszą programu: dostają wiersze rozwiązania wymieszane z wierszami-pułapkami i układają je w kolejności (w Pythonie także z właściwym wcięciem). Program, który ułożą, jest oceniany testami jak zwykle.';
$string['parsons_label'] = 'Odpowiadanie przez ułożenie wierszy rozwiązania w kolejności';
$string['parsonsadd'] = 'Dodaj do programu: {$a}';
$string['parsonsanswer'] = 'Twój program';
$string['parsonsdown'] = 'Przesuń w dół';
$string['parsonsgap'] = 'Luka w wierszu {$a}';
$string['parsonshint'] = 'Przeciągnij wiersze do swojego programu we właściwej kolejności albo kliknij wiersz, aby dodać go na końcu. Niektóre wiersze mogą być niepotrzebne.';
$string['parsonsindent'] = 'Zwiększ wcięcie';
$string['parsonsnosolution'] = 'Zadanie Parsonsa wymaga rozwiązania: to jego wiersze uczniowie układają w kolejności.';
$string['parsonsoutdent'] = 'Zmniejsz wcięcie';
$string['parsonspool'] = 'Wiersze';
$string['parsonsprogram'] = 'Program złożony z twoich wierszy (używają go Uruchom, Krok i testy):';
$string['parsonsremove'] = 'Z powrotem do wierszy';
$string['parsonsup'] = 'Przesuń w górę';
$string['passed'] = 'Zaliczony';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Uczeń pisze program w edytorze kodu. Z testami program jest uruchamiany na serwerze Jobe z danymi każdego testu i oceniany według udziału testów z poprawnym wynikiem. Bez testów ocenia go nauczyciel.';
$string['pluginnameadding'] = 'Dodawanie pytania CodeLab';
$string['pluginnameediting'] = 'Edytowanie pytania CodeLab';
$string['pluginnamesummary'] = 'Uczeń pisze program w C, C++, Pythonie, Javie lub C#.';
$string['prefix'] = 'Kod przed';
$string['prefix_help'] = 'Kod dodawany przed programem ucznia przy uruchamianiu, na przykład wiersze #include lub początek klasy. Uczniowie nie widzą go w edytorze.';
$string['privacy:metadata:jobe'] = 'Odpowiedzi są wysyłane do serwera Jobe ustawionego przez administratora, aby uruchomić je z testami pytania. Same odpowiedzi przechowuje silnik pytań.';
$string['privacy:metadata:jobe:code'] = 'Program napisany przez ucznia';
$string['privacy:metadata:jobe:stdin'] = 'Dane wejściowe testu';
$string['privacy:metadata:pyodide'] = 'Gdy Python działa w przeglądarce podczas podejścia (Uruchom i Krok), przeglądarka ucznia wczytuje Pyodide (interpreter Pythona) z adresu ustawionego przez administratora, domyślnie z CDN jsDelivr. Żadna odpowiedź ani dane nie są wysyłane.';
$string['privacy:metadata:pyodide:ipaddress'] = 'Adres IP przeglądarki ucznia, jak przy każdym pobieraniu';
$string['privacy:metadata:runner'] = 'Gdy administrator ustawi CodeLab runner (własny lub hostowany), odpowiedzi są tam wysyłane, aby uruchomić je z testami pytania (SQL zawsze, inne języki, gdy runner jest serwerem uruchamiania i oceniania), a Uruchom w podejściu uruchamia tam program, podczas gdy uczeń wpisuje dane. Runner przechowuje program tylko w czasie jego działania. Same odpowiedzi przechowuje silnik pytań.';
$string['privacy:metadata:runner:code'] = 'Program napisany przez ucznia';
$string['privacy:metadata:runner:stdin'] = 'Dane wejściowe testu lub dane wpisywane przez ucznia';
$string['privacy:metadata:runner:userid'] = 'Identyfikator ucznia w podpisanym tokenie dla Uruchom w podejściu, aby ograniczyć liczbę programów, które każdy użytkownik uruchamia jednocześnie';
$string['rules_violated_forbid'] = 'Forbidden in code: {$a}';
$string['rules_violated_penalty'] = 'Constraint penalty: -{$a}%';
$string['rules_violated_require'] = 'Required in code: {$a}';
$string['rulesforbid'] = 'Forbidden tokens in code';
$string['rulesforbid_help'] = 'Comma-separated identifiers or keywords that must not appear in the student\'s code outside comments and strings (for example sort, sorted, eval, goto).';
$string['rulespenalty'] = 'Constraint violation penalty (%)';
$string['rulespenalty_help'] = 'Percentage deducted from the test mark when a forbidden token is used or a required token is missing (100 gives 0 points).';
$string['rulesrequire'] = 'Required tokens in code';
$string['rulesrequire_help'] = 'Comma-separated identifiers or keywords that must appear in the student\'s code outside comments and strings (for example for, while, malloc).';
$string['runtests'] = 'Uruchom testy';
$string['sandboxfailed'] = 'Nie udało się sprawdzić programu na serwerze (Jobe). Oceni go nauczyciel.';
$string['savefailing'] = 'Zapisz, nawet jeśli rozwiązanie nie przechodzi testów';
$string['showtests'] = 'Testy w podejściu';
$string['showtests_desc'] = 'Uczniowie mogą uruchomić testy, które nie są ukryte, przed wysłaniem';
$string['solution'] = 'Rozwiązanie';
$string['solution_help'] = 'Program nauczyciela. Puste oczekiwane wyniki testów są wypełniane przez jego uruchomienie przy zapisywaniu pytania; uczniowie widzą go jako poprawną odpowiedź w przeglądzie.';
$string['solutioncheck'] = 'Sprawdzenie rozwiązania';
$string['solutioncheck_help'] = 'Przy zapisywaniu pytania rozwiązanie jest uruchamiane na Jobe z danymi każdego testu, który ma oczekiwany wynik, a pytanie zostaje zapisane tylko wtedy, gdy przejdzie wszystkie. Zaznacz to pole, aby mimo to zapisać, na przykład gdy jeszcze piszesz testy. Gdy Jobe jest nieosiągalny, pytanie jest zapisywane bez sprawdzenia.';
$string['solutionfails'] = 'Rozwiązanie nie przechodzi tego testu. Jego wynik: {$a}';
$string['solutionis'] = 'Rozwiązanie:';
$string['solutionnocompile'] = 'Rozwiązanie się nie kompiluje: {$a}';
$string['suffix'] = 'Kod po';
$string['suffix_help'] = 'Kod dodawany po programie ucznia przy uruchamianiu, na przykład funkcja main wywołująca funkcję ucznia lub koniec klasy. Uczniowie nie widzą go w edytorze.';
$string['template'] = 'Kod początkowy';
$string['template_help'] = 'Kod, od którego uczniowie zaczynają w edytorze; może być pusty.';
$string['test'] = 'Test';
$string['testcode'] = 'Kod testu';
$string['testcode_help'] = 'Kod uruchamiany w tym teście, na przykład wywołanie funkcji, którą pisze uczeń: <code>printf("%d\\n", sum(2, 3));</code> lub <code>print(sum(2, 3))</code>. Może być pusty.

* Jeśli kod po programie ucznia zawiera znacznik <code>{{TEST}}</code>, na przykład wewnątrz main, który piszesz, kod testu zajmuje jego miejsce.
* W przeciwnym razie program w C lub C++ bez main dostaje go: <code>int main(void) { test code return 0; }</code>.
* W innych językach kod testu jest dodawany na końcu programu.

Test może też mieć dane wejściowe. Uczniowie widzą kod testów, które nie są ukryte.';
$string['testcoden'] = 'Test {no}: kod testu';
$string['testexpected'] = 'Oczekiwany wynik';
$string['testfailed'] = 'Test {$a}: niezaliczony';
$string['testgot'] = 'Wynik';
$string['testhidden'] = 'Ukryty przed uczniami';
$string['testinputn'] = 'Test {no}: dane wejściowe';
$string['testpassed'] = 'Test {$a}: zaliczony';
$string['tests'] = 'Testy';
$string['tests_desc'] = 'Każdy test podaje programowi dane wejściowe i porównuje jego wynik z oczekiwanym. Zostaw oczekiwany wynik pusty, aby wziąć go z rozwiązania. Bez testów odpowiedzi ocenia nauczyciel.';
$string['testsof'] = 'Zaliczono {$a->passed} z {$a->total} testów';
$string['teststdin'] = 'Dane wejściowe';
$string['testsummary'] = 'Zaliczone testy: {$a->passed} z {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Waga';
$string['timelimit'] = 'Limit czasu na test (s)';
$string['timelimit_help'] = 'Ile sekund może trwać jeden test: test trwający dłużej nie przechodzi jako zbyt wolny, nawet gdy jego wynik jest poprawny. Puste: bez limitu. Od 0.1 do 30. Tylko CodeLab runner podaje, jak długo trwał test; na Jobe to pole nie działa i jedynym limitem jest czas procesora. Czas jest mierzony na serwerze i obejmuje uruchomienie języka (około 0.3 sekundy dla Javy i C#), więc zostaw zapas ponad czas dobrego rozwiązania.';
$string['tolerance'] = 'Tolerancja';
$string['tolerance_help'] = 'Przy porównywaniu liczb: największa różnica dwóch liczb, która wciąż oznacza równość, bezwzględna lub względna wobec większej liczby. Przy 0.001 3.1416 pasuje do 3.1414, a 1000.4 do 1000.';
$string['tooslow'] = 'Zbyt wolno: {$a->time} s, limit to {$a->limit} s';
