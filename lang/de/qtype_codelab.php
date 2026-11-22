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
 * Strings for component 'qtype_codelab', language 'de' (German).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = '{no} weitere Tests hinzufügen';
$string['aihints'] = 'KI-Erklärungen';
$string['aihints_help'] = 'Wenn der Administrator die KI-Erklärungen von Fehlern von CodeLab für TinyMCE eingeschaltet hat, erhalten Lernende unter einer Compilermeldung oder einem Fehler ihres Programms eine Schaltfläche, die die KI der Website bittet, ihn zu erklären. Die KI hat die Anweisung, nie die Korrektur zu schreiben. Ohne diese Option wird die Schaltfläche in einem Test nie angezeigt.';
$string['aihints_label'] = 'Lernende dürfen die KI bitten, eine Compilermeldung oder einen Fehler zu erklären';
$string['answer'] = 'Programm';
$string['answerlabel'] = 'Ihr Programm ({$a})';
$string['assist'] = 'Eingabehilfe';
$string['badlimit'] = 'Geben Sie eine ganze Zahl von 1 bis {$a} an oder lassen Sie das Feld für den Standardwert leer.';
$string['badregex'] = 'Dies ist kein gültiger regulärer Ausdruck.';
$string['badtolerance'] = 'Geben Sie eine Zahl von 0 oder mehr an, zum Beispiel 0.001.';
$string['bulkcheck'] = 'CodeLab-Lösungen prüfen';
$string['bulkcheck_again'] = 'Erneut prüfen';
$string['bulkcheck_bank'] = 'Fragensammlung';
$string['bulkcheck_done'] = '{$a->total} Fragen geprüft: {$a->ok} bestehen alle ihre Tests, {$a->problems} brauchen Aufmerksamkeit.';
$string['bulkcheck_finished'] = 'Fertig.';
$string['bulkcheck_intro'] = 'Die Lösung jeder der {$a} CodeLab-Fragen in den Fragensammlungen dieses Kurses wird auf dem Jobe-Server mit den Tests ihrer Frage ausgeführt, eine nach der anderen. Fragen, deren Lösung scheitert, nicht kompiliert oder fehlt, werden zuerst aufgeführt. Ergebnisse von bereits geprüften Lösungen kommen aus dem Cache.';
$string['bulkcheck_none'] = 'In den Fragensammlungen dieses Kurses gibt es keine CodeLab-Fragen.';
$string['bulkcheck_progress'] = 'Prüfe {$a->done} von {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Ergebnis';
$string['bulkcheck_start'] = 'Prüfung starten';
$string['cachedef_results'] = 'Ergebnisse der Tests eingereichter Programme';
$string['check_compile'] = 'Kompiliert nicht';
$string['check_failed'] = 'Besteht {$a->passed} von {$a->total} Tests';
$string['check_jobe'] = 'Jobe konnte es nicht ausführen';
$string['check_nosolution'] = 'Keine Lösung';
$string['check_notests'] = 'Keine Tests (von der Lehrkraft bewertet)';
$string['check_ok'] = 'Besteht alle Tests ({$a->total})';
$string['checkfailed'] = 'Das Programm konnte auf dem Server (Jobe) nicht geprüft werden, daher zählt dieser Versuch nicht. Drücken Sie gleich noch einmal Prüfen.';
$string['classanalysis'] = 'Analyse';
$string['classanswers'] = 'Antworten';
$string['classempty'] = 'Noch keine Antworten.';
$string['classemptyoutput'] = '(keine Ausgabe)';
$string['classgrades'] = 'Bewertungen (Prozent)';
$string['classhidenames'] = 'Namen ausblenden';
$string['classmessages'] = 'Häufigste Compilermeldungen';
$string['classnotgraded'] = 'nicht bewertet';
$string['classother'] = '{$a} Antworten auf andere Versionen der Frage werden nicht analysiert.';
$string['classpending'] = '{$a} weitere Antworten werden geprüft; die Analyse wächst gleich.';
$string['classshownames'] = 'Namen anzeigen';
$string['classstudent'] = 'Lernende/r {$a}';
$string['classsummary'] = 'Antworten: {$a->answers} · kompilieren nicht: {$a->compile} · Fehler in einem Test: {$a->runtime} · über der Zeit- oder Speichergrenze: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: {$a->passed} von {$a->total} bestehen';
$string['classtesthidden'] = 'Test {$a->n} (verborgen): {$a->passed} von {$a->total} bestehen';
$string['classunchecked'] = '{$a} Antworten konnten vom Server nicht geprüft werden.';
$string['classwork'] = 'Arbeit der Klasse';
$string['classwrong'] = 'Häufige falsche Ausgaben:';
$string['codeheader'] = 'Code';
$string['compare'] = 'Vergleich der Ausgabe';
$string['compare_help'] = 'Wie die Ausgabe des Programms mit der erwarteten Ausgabe jedes Tests verglichen wird.

* **Genau**: jedes Zeichen zählt.
* **Leerzeichen am Ende zählen nicht**: Leerzeichen am Zeilenende und leere Zeilen am Ende werden weggelassen.
* **Zeilen in beliebiger Reihenfolge**: wie das vorige, aber die Zeilen dürfen in beliebiger Reihenfolge kommen, für SQL-Abfragen ohne ORDER BY.
* **Zahlen mit Toleranz**: die Ausgaben werden Wort für Wort verglichen, und zwei Zahlen sind gleich, wenn sie sich um nicht mehr als die Toleranz unterscheiden (absolut oder relativ zur größeren Zahl). Leerzeichen und Zeilenumbrüche zwischen den Wörtern zählen nicht.
* **Regulärer Ausdruck**: die erwartete Ausgabe jedes Tests ist ein regulärer Ausdruck (PCRE), der auf die ganze Ausgabe passen muss, zum Beispiel <code>Sum: [0-9]+</code>. Leere erwartete Ausgaben werden aus der Lösung als Muster gefüllt, die nur auf diese Ausgabe passen.';
$string['comparison_exact'] = 'Genau';
$string['comparison_numbers'] = 'Zahlen mit Toleranz';
$string['comparison_regex'] = 'Regulärer Ausdruck';
$string['comparison_spaces'] = 'Leerzeichen am Ende zählen nicht';
$string['comparison_unordered'] = 'Zeilen in beliebiger Reihenfolge (SQL-Zeilen)';
$string['compileerror'] = 'Das Programm kompiliert nicht:';
$string['cputime'] = 'CPU-Zeitgrenze (Sekunden)';
$string['cputime_help'] = 'Größte CPU-Zeit eines Testlaufs, wenn die Antwort bewertet wird. Leer: die Einstellung des CodeLab-Editor-Plugins (5 Sekunden, wenn nicht geändert). Höchstens {$a} Sekunden (vom Administrator festgelegt). Ausführen und Tests ausführen im Versuch behalten die Einstellung der Website.';
$string['distractors'] = 'Ablenkungszeilen';
$string['distractors_help'] = 'Zeilen, die unter die Zeilen der Lösung gemischt werden, aber nicht dazugehören, eine pro Zeile (zum Beispiel eine falsche Bedingung oder eine unnötige Zeile). Lernende, die sie verwenden, bestehen die Tests nicht.';
$string['failed'] = 'Nicht bestanden';
$string['hiddensummary'] = 'Bestandene verborgene Tests: {$a->passed} von {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Programmiersprache';
$string['maxcputime'] = 'Größte CPU-Zeit einer Frage';
$string['maxcputime_desc'] = 'Fragen können bei Jobe nicht mehr CPU-Zeit als diese anfordern, in Sekunden pro Lauf.';
$string['maxmemory'] = 'Größter Speicher einer Frage';
$string['maxmemory_desc'] = 'Fragen können bei Jobe nicht mehr Speicher als diesen anfordern, in MB pro Lauf.';
$string['memorylimit'] = 'Speichergrenze (MB)';
$string['memorylimit_help'] = 'Größter Speicher eines Testlaufs, wenn die Antwort bewertet wird. Leer: der Standardwert des Jobe-Servers. Höchstens {$a} MB (vom Administrator festgelegt). Eine Sprache, die zum Starten mehr braucht (JavaScript braucht 1000 MB), bekommt, was sie braucht. Auf einem CodeLab runner gilt diese Grenze nicht für Java, C# und JavaScript: sie bekommen dort immer einen Heap von 256 MB.';
$string['noanswer'] = 'Schreiben Sie zuerst ein Programm.';
$string['noassist'] = 'Codevervollständigung und Hinweise ausschalten (für Prüfungen)';
$string['noexpected'] = 'Geben Sie die erwartete Ausgabe an oder eine Lösung, aus der sie berechnet wird.';
$string['parsons'] = 'Parsons-Aufgabe';
$string['parsons_help'] = 'Die Lernenden schreiben das Programm nicht: sie bekommen die Zeilen der Lösung gemischt mit den Ablenkungszeilen und bringen sie in die richtige Reihenfolge (in Python auch mit der richtigen Einrückung). Das Programm, das sie bilden, wird wie gewohnt von den Tests bewertet.';
$string['parsons_label'] = 'Antworten, indem die Zeilen der Lösung geordnet werden';
$string['parsonsadd'] = 'Zum Programm hinzufügen: {$a}';
$string['parsonsanswer'] = 'Ihr Programm';
$string['parsonsdown'] = 'Nach unten';
$string['parsonshint'] = 'Ziehen Sie die Zeilen in der richtigen Reihenfolge in Ihr Programm oder klicken Sie auf eine Zeile, um sie am Ende hinzuzufügen. Manche Zeilen werden vielleicht nicht gebraucht.';
$string['parsonsindent'] = 'Einrücken';
$string['parsonsnosolution'] = 'Eine Parsons-Aufgabe braucht die Lösung: ihre Zeilen ordnen die Lernenden.';
$string['parsonsoutdent'] = 'Ausrücken';
$string['parsonspool'] = 'Zeilen';
$string['parsonsprogram'] = 'Das Programm aus Ihren Zeilen (Ausführen, Schritt und die Tests verwenden es):';
$string['parsonsremove'] = 'Zurück zu den Zeilen';
$string['parsonsup'] = 'Nach oben';
$string['passed'] = 'Bestanden';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Die Lernenden schreiben ein Programm in einem Code-Editor. Mit Tests wird das Programm auf dem Jobe-Server mit der Eingabe jedes Tests ausgeführt und nach dem Anteil der Tests mit richtiger Ausgabe bewertet. Ohne Tests bewertet die Lehrkraft.';
$string['pluginnameadding'] = 'CodeLab-Frage hinzufügen';
$string['pluginnameediting'] = 'CodeLab-Frage bearbeiten';
$string['pluginnamesummary'] = 'Die Lernenden schreiben ein Programm in C, C++, Python, Java oder C#.';
$string['prefix'] = 'Code davor';
$string['prefix_help'] = 'Code, der beim Ausführen vor dem Programm des Lernenden eingefügt wird, zum Beispiel #include-Zeilen oder der Anfang einer Klasse. Die Lernenden sehen ihn im Editor nicht.';
$string['privacy:metadata:jobe'] = 'Antworten werden an den vom Administrator eingestellten Jobe-Server gesendet, um mit den Tests der Frage ausgeführt zu werden. Die Antworten selbst speichert die Fragen-Engine.';
$string['privacy:metadata:jobe:code'] = 'Das Programm, das der Lernende geschrieben hat';
$string['privacy:metadata:jobe:stdin'] = 'Die Eingabe eines Tests';
$string['privacy:metadata:pyodide'] = 'Wenn Python in einem Versuch im Browser läuft (Ausführen und Schritt), lädt der Browser des Lernenden Pyodide (den Python-Interpreter) von der vom Administrator eingestellten Adresse, standardmäßig vom jsDelivr-CDN. Es wird keine Antwort und keine Eingabe gesendet.';
$string['privacy:metadata:pyodide:ipaddress'] = 'Die IP-Adresse des Browsers des Lernenden, wie bei jedem Download';
$string['privacy:metadata:runner'] = 'Wenn der Administrator einen CodeLab runner einstellt (einen eigenen oder einen gehosteten), werden Antworten dorthin gesendet, um mit den Tests der Frage ausgeführt zu werden (SQL immer, andere Sprachen, wenn der Runner der Server zum Ausführen und Bewerten ist), und Ausführen im Versuch lässt das Programm dort laufen, während der Lernende seine Eingabe tippt. Der Runner behält ein Programm nur, solange es läuft. Die Antworten selbst speichert die Fragen-Engine.';
$string['privacy:metadata:runner:code'] = 'Das Programm, das der Lernende geschrieben hat';
$string['privacy:metadata:runner:stdin'] = 'Die Eingabe eines Tests oder die Eingabe, die der Lernende tippt';
$string['privacy:metadata:runner:userid'] = 'Die ID des Lernenden in einem signierten Token für Ausführen im Versuch, um die Zahl der Programme zu begrenzen, die jeder Benutzer gleichzeitig ausführt';
$string['runtests'] = 'Tests ausführen';
$string['sandboxfailed'] = 'Das Programm konnte auf dem Server (Jobe) nicht geprüft werden. Ihre Lehrkraft wird es bewerten.';
$string['savefailing'] = 'Speichern, auch wenn die Lösung die Tests nicht besteht';
$string['showtests'] = 'Tests im Versuch';
$string['showtests_desc'] = 'Lernende können die nicht verborgenen Tests vor dem Abgeben ausführen';
$string['solution'] = 'Lösung';
$string['solution_help'] = 'Das Programm der Lehrkraft. Leere erwartete Ausgaben der Tests werden beim Speichern der Frage durch Ausführen der Lösung gefüllt; die Lernenden sehen sie in der Überprüfung als richtige Antwort.';
$string['solutioncheck'] = 'Prüfung der Lösung';
$string['solutioncheck_help'] = 'Beim Speichern der Frage wird die Lösung auf Jobe mit der Eingabe jedes Tests ausgeführt, der eine erwartete Ausgabe hat, und die Frage wird nur gespeichert, wenn sie alle besteht. Kreuzen Sie dieses Feld an, um trotzdem zu speichern, zum Beispiel während Sie die Tests noch schreiben. Wenn Jobe nicht erreichbar ist, wird die Frage ohne die Prüfung gespeichert.';
$string['solutionfails'] = 'Die Lösung besteht diesen Test nicht. Ihre Ausgabe: {$a}';
$string['solutionis'] = 'Eine Lösung:';
$string['solutionnocompile'] = 'Die Lösung kompiliert nicht: {$a}';
$string['suffix'] = 'Code danach';
$string['suffix_help'] = 'Code, der beim Ausführen nach dem Programm des Lernenden eingefügt wird, zum Beispiel eine main-Funktion, die die Funktion des Lernenden aufruft, oder das Ende einer Klasse. Die Lernenden sehen ihn im Editor nicht.';
$string['template'] = 'Startcode';
$string['template_help'] = 'Code, mit dem die Lernenden im Editor beginnen; kann leer sein.';
$string['test'] = 'Test';
$string['testcode'] = 'Testcode';
$string['testcode_help'] = 'Code, der in diesem Test läuft, zum Beispiel ein Aufruf der Funktion, die der Lernende schreibt: <code>printf("%d\\n", sum(2, 3));</code> oder <code>print(sum(2, 3))</code>. Er kann leer sein.

* Wenn der Code danach die Marke <code>{{TEST}}</code> enthält, zum Beispiel in einer main, die Sie schreiben, tritt der Testcode an ihre Stelle.
* Sonst bekommt ein C- oder C++-Programm ohne main eine: <code>int main(void) { test code return 0; }</code>.
* In anderen Sprachen wird der Testcode am Ende des Programms angefügt.

Der Test kann auch eine Eingabe haben. Die Lernenden sehen den Testcode der nicht verborgenen Tests.';
$string['testcoden'] = 'Test {no}: Testcode';
$string['testexpected'] = 'Erwartete Ausgabe';
$string['testfailed'] = 'Test {$a}: nicht bestanden';
$string['testgot'] = 'Ausgabe';
$string['testhidden'] = 'Vor den Lernenden verborgen';
$string['testinputn'] = 'Test {no}: Eingabe';
$string['testpassed'] = 'Test {$a}: bestanden';
$string['tests'] = 'Tests';
$string['tests_desc'] = 'Jeder Test gibt dem Programm eine Eingabe und vergleicht seine Ausgabe mit der erwarteten Ausgabe. Lassen Sie die erwartete Ausgabe leer, um sie aus der Lösung zu übernehmen. Ohne Tests bewertet die Lehrkraft die Antworten.';
$string['testsof'] = '{$a->passed} von {$a->total} Tests bestanden';
$string['teststdin'] = 'Eingabe';
$string['testsummary'] = 'Bestandene Tests: {$a->passed} von {$a->total}';
$string['testweight'] = 'Gewicht';
$string['tolerance'] = 'Toleranz';
$string['tolerance_help'] = 'Für den Vergleich mit Zahlen: der größte Unterschied zweier Zahlen, der noch als gleich gilt, absolut oder relativ zur größeren Zahl. Mit 0.001 passt 3.1416 zu 3.1414 und 1000.4 zu 1000.';
