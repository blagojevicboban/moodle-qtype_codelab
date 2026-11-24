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
 * Strings for component 'qtype_codelab', language 'ro'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Adaugă încă {no} teste';
$string['aihints'] = 'Explicații AI';
$string['aihints_help'] = 'Când explicațiile AI ale erorilor din CodeLab pentru TinyMCE sunt activate de administrator, elevii primesc un buton sub un mesaj al compilatorului sau o eroare a programului lor pentru a cere AI-ului site-ului să o explice. AI-ul are instrucțiunea de a nu scrie niciodată rezolvarea. Fără această opțiune, butonul nu este afișat niciodată într-un test.';
$string['aihints_label'] = 'Elevii pot cere AI-ului să explice un mesaj al compilatorului sau o eroare';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Programul tău ({$a})';
$string['assist'] = 'Asistență la tastare';
$string['badlimit'] = 'Introduceți un număr întreg de la 1 la {$a}, sau lăsați gol pentru valoarea implicită.';
$string['badregex'] = 'Aceasta nu este o expresie regulată validă.';
$string['badtimelimit'] = 'Introduceți un număr de secunde de la 0.1 la 30, sau lăsați gol pentru fără limită.';
$string['badtolerance'] = 'Introduceți un număr mai mare sau egal cu 0, de exemplu 0.001.';
$string['bulkcheck'] = 'Verifică soluțiile CodeLab';
$string['bulkcheck_again'] = 'Verifică din nou';
$string['bulkcheck_bank'] = 'Banca de întrebări';
$string['bulkcheck_done'] = 'S-au verificat {$a->total} întrebări: {$a->ok} trec toate testele, {$a->problems} necesită atenție.';
$string['bulkcheck_finished'] = 'Finalizat.';
$string['bulkcheck_intro'] = 'Soluția fiecăreia dintre cele {$a} întrebări CodeLab din băncile de întrebări ale acestui curs este rulată pe serverul Jobe pe testele întrebării respective, una câte una. Întrebările a căror soluție pică, nu se compilează sau lipsește sunt afișate primele. Rezultatele soluțiilor verificate anterior sunt preluate din cache.';
$string['bulkcheck_none'] = 'Nu există întrebări CodeLab în băncile de întrebări ale acestui curs.';
$string['bulkcheck_progress'] = 'Se verifică {$a->done} din {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Rezultat';
$string['bulkcheck_start'] = 'Pornește verificarea';
$string['cachedef_results'] = 'Rezultatele testelor pentru programele trimise';
$string['check_compile'] = 'Nu se compilează';
$string['check_failed'] = 'Trece {$a->passed} din {$a->total} teste';
$string['check_jobe'] = 'Jobe nu a putut rula programul';
$string['check_nosolution'] = 'Fără soluție';
$string['check_notests'] = 'Fără teste (notat de profesor)';
$string['check_ok'] = 'Trece toate testele ({$a->total})';
$string['checkfailed'] = 'Programul nu a putut fi verificat pe server (Jobe), deci această încercare nu se contorizează. Apasă Verifică din nou peste câteva momente.';
$string['checkorder'] = 'Verifică ordinea';
$string['classanalysis'] = 'Analiză';
$string['classanswers'] = 'Răspunsuri';
$string['classempty'] = 'Nu există încă răspunsuri.';
$string['classemptyoutput'] = '(fără ieșire)';
$string['classgrades'] = 'Note (procent)';
$string['classhidenames'] = 'Ascunde numele';
$string['classmessages'] = 'Cele mai frecvente mesaje ale compilatorului';
$string['classnotgraded'] = 'nenotat';
$string['classother'] = '{$a} răspunsuri la alte versiuni ale întrebării nu sunt analizate.';
$string['classpending'] = 'Încă {$a} răspunsuri sunt în curs de verificare; analiza se va actualiza în scurt timp.';
$string['classshownames'] = 'Afișează numele';
$string['classsimilar'] = 'Trimiteri similare';
$string['classsimilarnote'] = 'Comparate local după structura codului (ignorând numele variabilelor, spațiile, comentariile și codul inițial); verificați răspunsurile înainte de a decide.';
$string['classstudent'] = 'Elev {$a}';
$string['classsummary'] = 'Răspunsuri: {$a->answers} · nu se compilează: {$a->compile} · eroare într-un test: {$a->runtime} · depășire limită de timp sau memorie: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: {$a->passed} din {$a->total} trec';
$string['classtesthidden'] = 'Test {$a->n} (ascuns): {$a->passed} din {$a->total} trec';
$string['classunchecked'] = '{$a} răspunsuri nu au putut fi verificate de server.';
$string['classwork'] = 'Activitate la clasă';
$string['classwrong'] = 'Ieșiri greșite frecvente:';
$string['codeheader'] = 'Cod';
$string['compare'] = 'Compararea ieșirii';
$string['compare_help'] = 'Modul în care ieșirea programului este comparată cu ieșirea așteptată a fiecărui test.

* **Exact**: fiecare caracter contează.
* **Spațiile de la final nu contează**: spațiile de la sfârșitul liniilor și liniile goale de la final sunt ignorate.
* **Linii în orice ordine**: la fel ca anterior, dar liniile pot apărea în orice ordine, pentru interogări SQL fără ORDER BY.
* **Numere cu toleranță**: ieșirile sunt comparate cuvânt cu cuvânt, iar două numere sunt egale dacă diferă cu cel mult toleranța (absolută sau relativă la numărul mai mare). Spațiile și liniile noi dintre cuvinte nu contează.
* **Expresie regulată**: ieșirea așteptată a fiecărui test este o expresie regulată (PCRE) care trebuie să se potrivească cu întreaga ieșire, de exemplu <code>Sum: [0-9]+</code>. Ieșirile așteptate goale sunt completate din soluție ca șabloane care se potrivesc doar cu acea ieșire.';
$string['comparison_exact'] = 'Exact';
$string['comparison_numbers'] = 'Numere cu toleranță';
$string['comparison_regex'] = 'Expresie regulată';
$string['comparison_spaces'] = 'Spațiile de la final nu contează';
$string['comparison_unordered'] = 'Linii în orice ordine (rânduri SQL)';
$string['compileerror'] = 'Programul nu se compilează:';
$string['cputime'] = 'Limită de timp CPU (secunde)';
$string['cputime_help'] = 'Timpul CPU maxim pentru o rulare a unui test la notarea răspunsului. Gol: setarea pluginului editorului CodeLab (5 secunde dacă nu a fost modificată). Cel mult {$a} secunde (setat de administrator). Rulează și Rulează testele din încercare păstrează setarea site-ului.';
$string['distractors'] = 'Linii distractor';
$string['distractors_help'] = 'Linii amestecate cu liniile soluției care nu aparțin acesteia, câte una pe linie (de exemplu o condiție greșită sau o linie care nu este necesară). Elevii care le folosesc nu trec testele.';
$string['failed'] = 'Picat';
$string['gaps'] = 'Spații de completat';
$string['gaps_help'] = 'Numărul de expresii ascunse ca spații de completat în liniile unei probleme Parsons (0 doar pentru ordonare). Elevii le completează în timp ce pun liniile în ordine.';
$string['gaps_none'] = '0 (doar ordonare)';
$string['hiddensummary'] = 'Teste ascunse trecute: {$a->passed} din {$a->total}';
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
$string['language'] = 'Limbaj de programare';
$string['maxcputime'] = 'Timpul CPU maxim al unei întrebări';
$string['maxcputime_desc'] = 'Întrebările nu pot solicita serverului Jobe mai mult timp CPU decât această valoare, în secunde per rulare.';
$string['maxmemory'] = 'Memoria maximă a unei întrebări';
$string['maxmemory_desc'] = 'Întrebările nu pot solicita serverului Jobe mai multă memorie decât această valoare, în MB per rulare.';
$string['memorylimit'] = 'Limită de memorie (MB)';
$string['memorylimit_help'] = 'Memoria maximă pentru o rulare a unui test la notarea răspunsului. Gol: valoarea implicită a serverului Jobe. Cel mult {$a} MB (setat de administrator). Un limbaj care are nevoie de mai mult pentru a porni (JavaScript necesită 1000 MB) primește cât are nevoie. Pe un CodeLab runner această limită nu se aplică pentru Java, C# și JavaScript: acolo primesc întotdeauna un heap de 256 MB.';
$string['noanswer'] = 'Scrie mai întâi un program.';
$string['noassist'] = 'Dezactivează completarea automată a codului și indiciile (pentru teste)';
$string['noexpected'] = 'Introduceți ieșirea așteptată sau o soluție din care să fie calculată.';
$string['ordercheck'] = 'Verifică ordinea';
$string['ordercheck_help'] = 'Elevii pot apăsa Verifică ordinea pentru a vedea câte linii sunt la locul lor, dar niciodată care anume. O linie este la locul ei când aparține celui mai lung subșir comun dintre liniile elevului și liniile soluției (în Python și cu aceeași indentare); spațiile nu contează, iar liniile distractor nu sunt niciodată la locul lor. Cu punctaj parțial: un răspuns care pică testele primește până la jumătate din punctaj pentru liniile aflate la locul lor. Testele decid în continuare punctajul complet.';
$string['ordercheck_off'] = 'Nu';
$string['ordercheck_on'] = 'Da';
$string['ordercheck_partial'] = 'Da, cu punctaj parțial pentru ordine';
$string['ordercheckfailed'] = 'Ordinea nu a putut fi verificată.';
$string['orderresult'] = 'Linii la locul lor: {$a->placed} din {$a->total}';
$string['parsons'] = 'Problemă Parsons';
$string['parsons_help'] = 'Elevii nu scriu programul: primesc liniile soluției amestecate, împreună cu liniile distractor, și le pun în ordine (în Python și cu indentarea corectă). Programul format este notat prin teste ca de obicei.';
$string['parsons_label'] = 'Răspunde prin ordonarea liniilor soluției';
$string['parsonsadd'] = 'Adaugă în program: {$a}';
$string['parsonsanswer'] = 'Programul tău';
$string['parsonsdown'] = 'Mută în jos';
$string['parsonsgap'] = 'Spațiu de completat în linia {$a}';
$string['parsonshint'] = 'Trage liniile în programul tău în ordinea corectă sau dă clic pe o linie pentru a o adăuga la final. Unele linii pot să nu fie necesare.';
$string['parsonsindent'] = 'Indentează';
$string['parsonsnosolution'] = 'O problemă Parsons are nevoie de soluție: liniile acesteia sunt cele pe care elevii le ordonează.';
$string['parsonsoutdent'] = 'Deindentează';
$string['parsonspool'] = 'Linii';
$string['parsonsprogram'] = 'Programul format din liniile tale (Rulează, Pas și testele îl folosesc):';
$string['parsonsremove'] = 'Înapoi la linii';
$string['parsonsup'] = 'Mută în sus';
$string['passed'] = 'Trecut';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Elevul scrie un program într-un editor de cod. Cu teste, programul este rulat pe serverul Jobe cu intrarea fiecărui test și notat în funcție de proporția testelor cu ieșire corectă. Fără teste, profesorul îl notează.';
$string['pluginnameadding'] = 'Adăugarea unei întrebări CodeLab';
$string['pluginnameediting'] = 'Editarea unei întrebări CodeLab';
$string['pluginnamesummary'] = 'Elevul scrie un program în C, C++, Python, Java sau C#.';
$string['prefix'] = 'Cod înainte';
$string['prefix_help'] = 'Cod adăugat înaintea programului elevului la rulare, de exemplu linii #include sau începutul unei clase. Elevii nu îl văd în editor.';
$string['privacy:metadata:jobe'] = 'Răspunsurile sunt trimise la serverul Jobe configurat de administrator pentru a fi rulate pe testele întrebării. Răspunsurile în sine sunt păstrate de motorul de întrebări.';
$string['privacy:metadata:jobe:code'] = 'Programul scris de elev';
$string['privacy:metadata:jobe:stdin'] = 'Intrarea unui test';
$string['privacy:metadata:pyodide'] = 'Când Python rulează în browser într-o încercare (Rulează și Pas), browserul elevului încarcă Pyodide (interpretorul Python) de la adresa configurată de administrator, implicit jsDelivr CDN. Nu se trimite niciun răspuns și nicio intrare.';
$string['privacy:metadata:pyodide:ipaddress'] = 'Adresa IP a browserului elevului, ca la orice descărcare';
$string['privacy:metadata:runner'] = 'Când administratorul configurează un CodeLab runner (propriu sau găzduit), răspunsurile sunt trimise acolo pentru a fi rulate pe testele întrebării (SQL întotdeauna, alte limbaje când runner-ul este serverul pentru rulare și notare), iar Rulează din încercare rulează programul acolo în timp ce elevul tastează intrarea. Runner-ul păstrează programul doar cât timp rulează. Răspunsurile în sine sunt păstrate de motorul de întrebări.';
$string['privacy:metadata:runner:code'] = 'Programul scris de elev';
$string['privacy:metadata:runner:stdin'] = 'Intrarea unui test sau intrarea tastată de elev';
$string['privacy:metadata:runner:userid'] = 'ID-ul elevului, într-un token semnat pentru Rulează din încercare, pentru a limita numărul de programe rulate simultan de fiecare utilizator';
$string['rules_violated_forbid'] = 'Forbidden in code: {$a}';
$string['rules_violated_penalty'] = 'Constraint penalty: -{$a}%';
$string['rules_violated_require'] = 'Required in code: {$a}';
$string['rulesforbid'] = 'Forbidden tokens in code';
$string['rulesforbid_help'] = 'Comma-separated identifiers or keywords that must not appear in the student\'s code outside comments and strings (for example sort, sorted, eval, goto).';
$string['rulespenalty'] = 'Constraint violation penalty (%)';
$string['rulespenalty_help'] = 'Percentage deducted from the test mark when a forbidden token is used or a required token is missing (100 gives 0 points).';
$string['rulesrequire'] = 'Required tokens in code';
$string['rulesrequire_help'] = 'Comma-separated identifiers or keywords that must appear in the student\'s code outside comments and strings (for example for, while, malloc).';
$string['runtests'] = 'Rulează testele';
$string['sandboxfailed'] = 'Programul nu a putut fi verificat pe server (Jobe). Profesorul tău îl va nota.';
$string['savefailing'] = 'Salvează chiar dacă soluția pică testele';
$string['showtests'] = 'Teste în încercare';
$string['showtests_desc'] = 'Elevii pot rula testele care nu sunt ascunse înainte de a trimite';
$string['solution'] = 'Soluție';
$string['solution_help'] = 'Programul profesorului. Ieșirile așteptate goale ale testelor sunt completate prin rularea acestuia la salvarea întrebării; elevii îl văd ca răspuns corect în revizuire.';
$string['solutioncheck'] = 'Verificarea soluției';
$string['solutioncheck_help'] = 'La salvarea întrebării, soluția este rulată pe Jobe cu intrarea fiecărui test care are o ieșire așteptată, iar întrebarea este salvată doar dacă trece toate testele. Bifați această casetă pentru a salva oricum, de exemplu cât timp mai scrieți testele. Când Jobe nu poate fi contactat, întrebarea este salvată fără verificare.';
$string['solutionfails'] = 'Soluția pică acest test. Ieșirea ei: {$a}';
$string['solutionis'] = 'O soluție:';
$string['solutionnocompile'] = 'Soluția nu se compilează: {$a}';
$string['suffix'] = 'Cod după';
$string['suffix_help'] = 'Cod adăugat după programul elevului la rulare, de exemplu o funcție main care apelează funcția elevului sau sfârșitul unei clase. Elevii nu îl văd în editor.';
$string['template'] = 'Cod inițial';
$string['template_help'] = 'Codul de la care pornesc elevii în editor; poate fi gol.';
$string['test'] = 'Test';
$string['testcode'] = 'Cod de test';
$string['testcode_help'] = 'Cod rulat în acest test, de exemplu un apel al funcției scrise de elev: <code>printf("%d\\n", sum(2, 3));</code> sau <code>print(sum(2, 3))</code>. Poate fi gol.

* Dacă codul de după programul elevului conține marcajul <code>{{TEST}}</code>, de exemplu în interiorul unui main scris de dumneavoastră, codul de test îi ia locul.
* Altfel, un program C sau C++ fără main primește unul: <code>int main(void) { test code return 0; }</code>.
* În alte limbaje, codul de test este adăugat la sfârșitul programului.

Testul poate avea și date de intrare. Elevii văd codul de test pentru testele care nu sunt ascunse.';
$string['testcoden'] = 'Test {no}: cod de test';
$string['testexpected'] = 'Ieșire așteptată';
$string['testfailed'] = 'Test {$a}: picat';
$string['testgot'] = 'Ieșire';
$string['testhidden'] = 'Ascuns elevilor';
$string['testinputn'] = 'Test {no}: intrare';
$string['testpassed'] = 'Test {$a}: trecut';
$string['tests'] = 'Teste';
$string['tests_desc'] = 'Fiecare test oferă programului date de intrare și compară ieșirea acestuia cu ieșirea așteptată. Lăsați ieșirea așteptată goală pentru a fi preluată din soluție. Fără teste, profesorul notează răspunsurile.';
$string['testsof'] = '{$a->passed} din {$a->total} teste trecute';
$string['teststdin'] = 'Intrare';
$string['testsummary'] = 'Teste trecute: {$a->passed} din {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Pondere';
$string['timelimit'] = 'Limită de timp per test (s)';
$string['timelimit_help'] = 'Numărul de secunde permis pentru un test: un test care rulează mai mult pică ca prea lent, chiar dacă ieșirea este corectă. Gol: fără limită. De la 0.1 la 30. Doar CodeLab runner raportează cât a rulat un test; pe Jobe acest câmp nu are efect, iar limita de timp CPU este singura limită. Timpul este măsurat pe server și include pornirea limbajului (aproximativ 0.3 secunde pentru Java și C#), așa că lăsați o marjă peste timpul unei soluții bune.';
$string['tolerance'] = 'Toleranță';
$string['tolerance_help'] = 'Pentru compararea numerelor: diferența maximă dintre două numere care mai sunt considerate egale, absolută sau relativă la numărul mai mare. Cu 0.001, 3.1416 se potrivește cu 3.1414 și 1000.4 se potrivește cu 1000.';
$string['tooslow'] = 'Prea lent: {$a->time} s, limita este {$a->limit} s';
