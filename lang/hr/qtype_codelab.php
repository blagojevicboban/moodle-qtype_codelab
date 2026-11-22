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
 * Strings for component 'qtype_codelab', language 'hr' (Croatian).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Dodaj još {no} testova';
$string['aihints'] = 'UI objašnjenja';
$string['aihints_help'] = 'Kad administrator uključi UI objašnjenja pogrešaka CodeLaba za TinyMCE, učenici ispod poruke prevoditelja ili pogreške svojeg programa dobivaju gumb koji traži od umjetne inteligencije stranice da je objasni. Umjetna inteligencija ima uputu da nikada ne napiše ispravak. Bez ove opcije gumb se u testu nikad ne prikazuje.';
$string['aihints_label'] = 'Učenici smiju zatražiti od umjetne inteligencije da objasni poruku prevoditelja ili pogrešku';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Vaš program ({$a})';
$string['assist'] = 'Pomoć pri pisanju';
$string['badlimit'] = 'Upišite cijeli broj od 1 do {$a} ili ostavite prazno za zadanu vrijednost.';
$string['badregex'] = 'Ovo nije valjani regularni izraz.';
$string['badtimelimit'] = 'Unesite broj sekundi od 0.1 do 30 ili ostavite prazno za bez ograničenja.';
$string['badtolerance'] = 'Upišite broj 0 ili veći, na primjer 0.001.';
$string['bulkcheck'] = 'Provjeri CodeLab rješenja';
$string['bulkcheck_again'] = 'Provjeri ponovno';
$string['bulkcheck_bank'] = 'Baza pitanja';
$string['bulkcheck_done'] = 'Provjereno pitanja: {$a->total}; {$a->ok} prolazi sve svoje testove, {$a->problems} traži pažnju.';
$string['bulkcheck_finished'] = 'Završeno.';
$string['bulkcheck_intro'] = 'Rješenje svakog od {$a} CodeLab pitanja u bazama pitanja ovog e-kolegija izvršava se na Jobe poslužitelju na testovima svojeg pitanja, jedno po jedno. Pitanja čije rješenje ne prolazi, ne prevodi se ili nedostaje navedena su prva. Rezultati već provjerenih rješenja uzimaju se iz predmemorije.';
$string['bulkcheck_none'] = 'U bazama pitanja ovog e-kolegija nema CodeLab pitanja.';
$string['bulkcheck_progress'] = 'Provjeravam {$a->done} od {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Rezultat';
$string['bulkcheck_start'] = 'Pokreni provjeru';
$string['cachedef_results'] = 'Rezultati testova predanih programa';
$string['check_compile'] = 'Ne prevodi se';
$string['check_failed'] = 'Prolazi {$a->passed} od {$a->total} testova';
$string['check_jobe'] = 'Jobe ga nije mogao izvršiti';
$string['check_nosolution'] = 'Nema rješenja';
$string['check_notests'] = 'Nema testova (ocjenjuje nastavnik)';
$string['check_ok'] = 'Prolazi sve testove ({$a->total})';
$string['checkfailed'] = 'Program nije bilo moguće provjeriti na poslužitelju (Jobe), pa se ovaj pokušaj ne računa. Za trenutak ponovno pritisnite Provjeri.';
$string['classanalysis'] = 'Analiza';
$string['classanswers'] = 'Odgovori';
$string['classempty'] = 'Još nema odgovora.';
$string['classemptyoutput'] = '(nema izlaza)';
$string['classgrades'] = 'Ocjene (postotak)';
$string['classhidenames'] = 'Sakrij imena';
$string['classmessages'] = 'Najčešće poruke prevoditelja';
$string['classnotgraded'] = 'nije ocijenjeno';
$string['classother'] = 'Ne analizira se {$a} odgovora na druge inačice pitanja.';
$string['classpending'] = 'Provjerava se još {$a} odgovora; analiza će se za trenutak proširiti.';
$string['classshownames'] = 'Prikaži imena';
$string['classstudent'] = 'Učenik {$a}';
$string['classsummary'] = 'Odgovori: {$a->answers} · ne prevode se: {$a->compile} · pogreška u testu: {$a->runtime} · preko ograničenja vremena ili memorije: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: prolazi {$a->passed} od {$a->total}';
$string['classtesthidden'] = 'Test {$a->n} (skriveni): prolazi {$a->passed} od {$a->total}';
$string['classunchecked'] = 'Poslužitelj nije mogao provjeriti {$a} odgovora.';
$string['classwork'] = 'Rad razreda';
$string['classwrong'] = 'Česti pogrešni izlazi:';
$string['codeheader'] = 'Kôd';
$string['compare'] = 'Usporedba izlaza';
$string['compare_help'] = 'Kako se izlaz programa uspoređuje s očekivanim izlazom svakog testa.

* **Točno**: svaki znak se računa.
* **Razmaci na kraju se ne računaju**: razmaci na kraju redaka i prazni retci na kraju se izostavljaju.
* **Retci bilo kojim redoslijedom**: kao prethodno, ali retci mogu doći bilo kojim redoslijedom, za SQL upite bez ORDER BY.
* **Brojevi s tolerancijom**: izlazi se uspoređuju riječ po riječ, a dva broja su jednaka kad se razlikuju najviše za toleranciju (apsolutnu ili relativnu prema većem broju). Razmaci i prijelomi redaka između riječi se ne računaju.
* **Regularni izraz**: očekivani izlaz svakog testa je regularni izraz (PCRE) koji mora odgovarati cijelom izlazu, na primjer <code>Sum: [0-9]+</code>. Prazni očekivani izlazi popunjavaju se iz rješenja kao uzorci koji odgovaraju samo tom izlazu.';
$string['comparison_exact'] = 'Točno';
$string['comparison_numbers'] = 'Brojevi s tolerancijom';
$string['comparison_regex'] = 'Regularni izraz';
$string['comparison_spaces'] = 'Razmaci na kraju se ne računaju';
$string['comparison_unordered'] = 'Retci bilo kojim redoslijedom (SQL retci)';
$string['compileerror'] = 'Program se ne prevodi:';
$string['cputime'] = 'Vremensko ograničenje procesora (sekunde)';
$string['cputime_help'] = 'Najveće procesorsko vrijeme jednog izvršavanja testa pri ocjenjivanju odgovora. Prazno: postavka dodatka uređivača CodeLab (5 sekundi ako nije promijenjeno). Najviše {$a} sekundi (postavlja administrator). Pokreni i Pokreni testove u pokušaju zadržavaju postavku stranice.';
$string['distractors'] = 'Retci za zavaravanje';
$string['distractors_help'] = 'Retci koji se miješaju s retcima rješenja, ali mu ne pripadaju, jedan po retku (na primjer pogrešan uvjet ili suvišan redak). Učenici koji ih koriste ne prolaze testove.';
$string['failed'] = 'Nije prošao';
$string['hiddensummary'] = 'Prođeni skriveni testovi: {$a->passed} od {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Programski jezik';
$string['maxcputime'] = 'Najveće procesorsko vrijeme pitanja';
$string['maxcputime_desc'] = 'Pitanja ne mogu od Jobea tražiti više procesorskog vremena od ovoga, u sekundama po izvršavanju.';
$string['maxmemory'] = 'Najveća memorija pitanja';
$string['maxmemory_desc'] = 'Pitanja ne mogu od Jobea tražiti više memorije od ove, u MB po izvršavanju.';
$string['memorylimit'] = 'Ograničenje memorije (MB)';
$string['memorylimit_help'] = 'Najveća memorija jednog izvršavanja testa pri ocjenjivanju odgovora. Prazno: zadana vrijednost Jobe poslužitelja. Najviše {$a} MB (postavlja administrator). Jezik kojem za pokretanje treba više (JavaScriptu treba 1000 MB) dobiva koliko mu treba. Na CodeLab runneru ovo ograničenje ne vrijedi za Javu, C# i JavaScript: ondje uvijek dobivaju gomilu od 256 MB.';
$string['noanswer'] = 'Najprije napišite program.';
$string['noassist'] = 'Isključi dovršavanje koda i savjete (za provjere)';
$string['noexpected'] = 'Upišite očekivani izlaz ili rješenje iz kojeg će se izračunati.';
$string['parsons'] = 'Parsonsov zadatak';
$string['parsons_help'] = 'Učenici ne pišu program: dobivaju retke rješenja, izmiješane s retcima za zavaravanje, i slažu ih redom (u Pythonu i s ispravnim uvlačenjem). Program koji slože ocjenjuje se testovima kao i inače.';
$string['parsons_label'] = 'Odgovor slaganjem redaka rješenja redom';
$string['parsonsadd'] = 'Dodaj u program: {$a}';
$string['parsonsanswer'] = 'Vaš program';
$string['parsonsdown'] = 'Pomakni dolje';
$string['parsonshint'] = 'Povucite retke u svoj program ispravnim redoslijedom ili kliknite redak da ga dodate na kraj. Neki retci možda nisu potrebni.';
$string['parsonsindent'] = 'Uvuci';
$string['parsonsnosolution'] = 'Parsonsovom zadatku treba rješenje: njegove retke učenici slažu redom.';
$string['parsonsoutdent'] = 'Izvuci';
$string['parsonspool'] = 'Retci';
$string['parsonsprogram'] = 'Program sastavljen od vaših redaka (koriste ga Pokreni, Korak i testovi):';
$string['parsonsremove'] = 'Natrag među retke';
$string['parsonsup'] = 'Pomakni gore';
$string['passed'] = 'Prošao';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Učenik piše program u uređivaču koda. S testovima se program izvršava na Jobe poslužitelju s ulazom svakog testa i ocjenjuje prema udjelu testova čiji je izlaz točan. Bez testova ocjenjuje ga nastavnik.';
$string['pluginnameadding'] = 'Dodavanje CodeLab pitanja';
$string['pluginnameediting'] = 'Uređivanje CodeLab pitanja';
$string['pluginnamesummary'] = 'Učenik piše program u C-u, C++-u, Pythonu, Javi ili C#-u.';
$string['prefix'] = 'Kôd prije';
$string['prefix_help'] = 'Kôd koji se pri izvršavanju dodaje prije učenikova programa, na primjer retci #include ili početak klase. Učenici ga ne vide u uređivaču.';
$string['privacy:metadata:jobe'] = 'Odgovori se šalju Jobe poslužitelju koji je postavio administrator kako bi se izvršili na testovima pitanja. Same odgovore čuva sustav pitanja.';
$string['privacy:metadata:jobe:code'] = 'Program koji je učenik napisao';
$string['privacy:metadata:jobe:stdin'] = 'Ulaz testa';
$string['privacy:metadata:pyodide'] = 'Kad se Python u pokušaju izvršava u pregledniku (Pokreni i Korak), učenikov preglednik učitava Pyodide (Python interpreter) s adrese koju je postavio administrator, zadano s jsDelivr CDN-a. Ne šalje se nikakav odgovor ni ulaz.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP adresa učenikova preglednika, kao pri svakom preuzimanju';
$string['privacy:metadata:runner'] = 'Kad administrator postavi CodeLab runner (vlastiti ili udomljeni), odgovori se šalju onamo kako bi se izvršili na testovima pitanja (SQL uvijek, ostali jezici kad je runner poslužitelj za izvršavanje i ocjenjivanje), a Pokreni u pokušaju ondje izvršava program dok učenik upisuje ulaz. Runner čuva program samo dok radi. Same odgovore čuva sustav pitanja.';
$string['privacy:metadata:runner:code'] = 'Program koji je učenik napisao';
$string['privacy:metadata:runner:stdin'] = 'Ulaz testa ili ulaz koji učenik upisuje';
$string['privacy:metadata:runner:userid'] = 'ID učenika, u potpisanom tokenu za Pokreni u pokušaju, radi ograničenja broja programa koje svaki korisnik istodobno pokreće';
$string['runtests'] = 'Pokreni testove';
$string['sandboxfailed'] = 'Program nije bilo moguće provjeriti na poslužitelju (Jobe). Ocijenit će ga vaš nastavnik.';
$string['savefailing'] = 'Spremi i ako rješenje ne prolazi testove';
$string['showtests'] = 'Testovi u pokušaju';
$string['showtests_desc'] = 'Učenici mogu pokrenuti testove koji nisu skriveni prije predaje';
$string['solution'] = 'Rješenje';
$string['solution_help'] = 'Nastavnikov program. Prazni očekivani izlazi testova popunjavaju se njegovim izvršavanjem pri spremanju pitanja; učenici ga u pregledu vide kao točan odgovor.';
$string['solutioncheck'] = 'Provjera rješenja';
$string['solutioncheck_help'] = 'Pri spremanju pitanja rješenje se izvršava na Jobeu s ulazom svakog testa koji ima očekivani izlaz, a pitanje se sprema samo ako ih prođe sve. Označite ovaj okvir da biste ipak spremili, na primjer dok još pišete testove. Kad Jobe nije dostupan, pitanje se sprema bez provjere.';
$string['solutionfails'] = 'Rješenje ne prolazi ovaj test. Njegov izlaz: {$a}';
$string['solutionis'] = 'Rješenje:';
$string['solutionnocompile'] = 'Rješenje se ne prevodi: {$a}';
$string['suffix'] = 'Kôd poslije';
$string['suffix_help'] = 'Kôd koji se pri izvršavanju dodaje nakon učenikova programa, na primjer funkcija main koja poziva učenikovu funkciju ili kraj klase. Učenici ga ne vide u uređivaču.';
$string['template'] = 'Početni kôd';
$string['template_help'] = 'Kôd od kojeg učenici počinju u uređivaču; može biti prazan.';
$string['test'] = 'Test';
$string['testcode'] = 'Kôd testa';
$string['testcode_help'] = 'Kôd koji se izvršava u ovom testu, na primjer poziv funkcije koju učenik piše: <code>printf("%d\\n", sum(2, 3));</code> ili <code>print(sum(2, 3))</code>. Može biti prazan.

* Ako kôd poslije učenikova programa ima oznaku <code>{{TEST}}</code>, na primjer u funkciji main koju vi pišete, kôd testa dolazi na njezino mjesto.
* Inače C ili C++ program bez funkcije main dobiva je: <code>int main(void) { test code return 0; }</code>.
* U ostalim jezicima kôd testa dodaje se na kraj programa.

Test može imati i ulaz. Učenici vide kôd testova koji nisu skriveni.';
$string['testcoden'] = 'Test {no}: kôd testa';
$string['testexpected'] = 'Očekivani izlaz';
$string['testfailed'] = 'Test {$a}: nije prošao';
$string['testgot'] = 'Izlaz';
$string['testhidden'] = 'Skriveno od učenika';
$string['testinputn'] = 'Test {no}: ulaz';
$string['testpassed'] = 'Test {$a}: prošao';
$string['tests'] = 'Testovi';
$string['tests_desc'] = 'Svaki test daje programu ulaz i uspoređuje njegov izlaz s očekivanim izlazom. Ostavite očekivani izlaz prazan da se uzme iz rješenja. Bez testova odgovore ocjenjuje nastavnik.';
$string['testsof'] = 'Prođeno {$a->passed} od {$a->total} testova';
$string['teststdin'] = 'Ulaz';
$string['testsummary'] = 'Prođeni testovi: {$a->passed} od {$a->total}';
$string['testtime'] = '{$a} s';
$string['testweight'] = 'Težina';
$string['timelimit'] = 'Vremensko ograničenje po testu (s)';
$string['timelimit_help'] = 'Koliko sekundi smije trajati jedan test: test koji traje dulje pada kao prespor, i kad mu je izlaz točan. Prazno: bez ograničenja. Od 0.1 do 30. Samo CodeLab runner javlja koliko je test trajao; na Jobeu ovo polje nema učinka i jedino je ograničenje procesorsko vrijeme. Vrijeme se mjeri na poslužitelju i uključuje pokretanje jezika (oko 0.3 sekunde za Javu i C#), pa ostavite prostora iznad vremena dobrog rješenja.';
$string['tolerance'] = 'Tolerancija';
$string['tolerance_help'] = 'Za usporedbu s brojevima: najveća razlika dvaju brojeva koja se još računa kao jednakost, apsolutna ili relativna prema većem broju. S 0.001 3.1416 odgovara 3.1414, a 1000.4 odgovara 1000.';
$string['tooslow'] = 'Prespor: {$a->time} s, ograničenje je {$a->limit} s';
