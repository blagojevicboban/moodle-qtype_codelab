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
 * Strings for component 'qtype_codelab', language 'bs' (Bosnian).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Dodaj još {no} testova';
$string['aihints'] = 'AI objašnjenja';
$string['aihints_help'] = 'Kad administrator uključi AI objašnjenja grešaka CodeLaba za TinyMCE, učenici ispod poruke kompajlera ili greške svog programa dobijaju dugme koji traži od vještačke inteligencije stranice da je objasni. Vještačka inteligencija ima uputu da nikada ne napiše ispravak. Bez ove opcije dugme se u testu nikad ne prikazuje.';
$string['aihints_label'] = 'Učenici smiju zatražiti od vještačke inteligencije da objasni poruku kompajlera ili grešku';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Vaš program ({$a})';
$string['assist'] = 'Pomoć pri pisanju';
$string['badlimit'] = 'Upišite cijeli broj od 1 do {$a} ili ostavite prazno za podrazumijevanu vrijednost.';
$string['badregex'] = 'Ovo nije valjani regularni izraz.';
$string['badtimelimit'] = 'Unesite broj sekundi od 0.1 do 30 ili ostavite prazno za bez ograničenja.';
$string['badtolerance'] = 'Upišite broj 0 ili veći, na primjer 0.001.';
$string['bulkcheck'] = 'Provjeri CodeLab rješenja';
$string['bulkcheck_again'] = 'Provjeri ponovno';
$string['bulkcheck_bank'] = 'Banka pitanja';
$string['bulkcheck_done'] = 'Provjereno pitanja: {$a->total}; {$a->ok} prolazi sve svoje testove, {$a->problems} traži pažnju.';
$string['bulkcheck_finished'] = 'Završeno.';
$string['bulkcheck_intro'] = 'Rješenje svakog od {$a} CodeLab pitanja u bankama pitanja ovog kursa izvršava se na Jobe serveru na testovima svog pitanja, jedno po jedno. Pitanja čije rješenje ne prolazi, ne kompajlira se ili nedostaje navedena su prva. Rezultati već provjerenih rješenja uzimaju se iz keša.';
$string['bulkcheck_none'] = 'U bankama pitanja ovog kursa nema CodeLab pitanja.';
$string['bulkcheck_progress'] = 'Provjeravam {$a->done} od {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Rezultat';
$string['bulkcheck_start'] = 'Pokreni provjeru';
$string['cachedef_results'] = 'Rezultati testova predanih programa';
$string['check_compile'] = 'Ne kompajlira se';
$string['check_failed'] = 'Prolazi {$a->passed} od {$a->total} testova';
$string['check_jobe'] = 'Jobe ga nije mogao izvršiti';
$string['check_nosolution'] = 'Nema rješenja';
$string['check_notests'] = 'Nema testova (ocjenjuje nastavnik)';
$string['check_ok'] = 'Prolazi sve testove ({$a->total})';
$string['checkfailed'] = 'Program nije bilo moguće provjeriti na serveru (Jobe), pa se ovaj pokušaj ne računa. Za trenutak ponovno pritisnite Provjeri.';
$string['checkorder'] = 'Provjeri redoslijed';
$string['classanalysis'] = 'Analiza';
$string['classanswers'] = 'Odgovori';
$string['classempty'] = 'Još nema odgovora.';
$string['classemptyoutput'] = '(nema izlaza)';
$string['classgrades'] = 'Ocjene (postotak)';
$string['classhidenames'] = 'Sakrij imena';
$string['classmessages'] = 'Najčešće poruke kompajlera';
$string['classnotgraded'] = 'nije ocijenjeno';
$string['classother'] = 'Ne analizira se {$a} odgovora na druge verzije pitanja.';
$string['classpending'] = 'Provjerava se još {$a} odgovora; analiza će se za trenutak proširiti.';
$string['classshownames'] = 'Prikaži imena';
$string['classsimilar'] = 'Slične predaje';
$string['classsimilarnote'] = 'Poređeno lokalno po strukturi koda (bez imena promjenljivih, razmaka, komentara i početnog koda); pregledajte odgovore prije odluke.';
$string['classstudent'] = 'Učenik {$a}';
$string['classsummary'] = 'Odgovori: {$a->answers} · ne kompajliraju se: {$a->compile} · greška u testu: {$a->runtime} · preko ograničenja vremena ili memorije: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: prolazi {$a->passed} od {$a->total}';
$string['classtesthidden'] = 'Test {$a->n} (skriveni): prolazi {$a->passed} od {$a->total}';
$string['classunchecked'] = 'Server nije mogao provjeriti {$a} odgovora.';
$string['classwork'] = 'Rad razreda';
$string['classwrong'] = 'Česti pogrešni izlazi:';
$string['codeheader'] = 'Kod';
$string['compare'] = 'Usporedba izlaza';
$string['compare_help'] = 'Kako se izlaz programa uspoređuje s očekivanim izlazom svakog testa.

* **Tačno**: svaki znak se računa.
* **Razmaci na kraju se ne računaju**: razmaci na kraju redova i prazni redovi na kraju se izostavljaju.
* **Redovi bilo kojim redoslijedom**: kao prethodno, ali redovi mogu doći bilo kojim redoslijedom, za SQL upite bez ORDER BY.
* **Brojevi s tolerancijom**: izlazi se uspoređuju riječ po riječ, a dva broja su jednaka kad se razlikuju najviše za toleranciju (apsolutnu ili relativnu prema većem broju). Razmaci i prijelomi redova između riječi se ne računaju.
* **Regularni izraz**: očekivani izlaz svakog testa je regularni izraz (PCRE) koji mora odgovarati cijelom izlazu, na primjer <code>Sum: [0-9]+</code>. Prazni očekivani izlazi popunjavaju se iz rješenja kao uzorci koji odgovaraju samo tom izlazu.';
$string['comparison_exact'] = 'Tačno';
$string['comparison_numbers'] = 'Brojevi s tolerancijom';
$string['comparison_regex'] = 'Regularni izraz';
$string['comparison_spaces'] = 'Razmaci na kraju se ne računaju';
$string['comparison_unordered'] = 'Redovi bilo kojim redoslijedom (SQL redovi)';
$string['compileerror'] = 'Program se ne kompajlira:';
$string['cputime'] = 'Vremensko ograničenje procesora (sekunde)';
$string['cputime_help'] = 'Najveće procesorsko vrijeme jednog izvršavanja testa pri ocjenjivanju odgovora. Prazno: postavka dodatka editora CodeLab (5 sekundi ako nije promijenjeno). Najviše {$a} sekundi (postavlja administrator). Pokreni i Pokreni testove u pokušaju zadržavaju postavku stranice.';
$string['distractors'] = 'Redovi za zavaravanje';
$string['distractors_help'] = 'Redovi koji se miješaju s redovima rješenja, ali mu ne pripadaju, jedan po redu (na primjer pogrešan uvjet ili suvišan red). Učenici koji ih koriste ne prolaze testove.';
$string['failed'] = 'Nije prošao';
$string['gaps'] = 'Praznine za dopunjavanje';
$string['gaps_help'] = 'Broj izraza skrivenih kao praznine u redovima Parsonsovog zadatka (0 samo za redanje). Učenici ih dopunjavaju dok slažu redoslijed.';
$string['gaps_none'] = '0 (samo redanje)';
$string['hiddensummary'] = 'Prođeni skriveni testovi: {$a->passed} od {$a->total}';
$string['lang_bash'] = 'Bash';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_go'] = 'Go';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
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
$string['lang_typescript'] = 'TypeScript';
$string['language'] = 'Programski jezik';
$string['maxcputime'] = 'Najveće procesorsko vrijeme pitanja';
$string['maxcputime_desc'] = 'Pitanja ne mogu od Jobea tražiti više procesorskog vremena od ovoga, u sekundama po izvršavanju.';
$string['maxmemory'] = 'Najveća memorija pitanja';
$string['maxmemory_desc'] = 'Pitanja ne mogu od Jobea tražiti više memorije od ove, u MB po izvršavanju.';
$string['memorylimit'] = 'Ograničenje memorije (MB)';
$string['memorylimit_help'] = 'Najveća memorija jednog izvršavanja testa pri ocjenjivanju odgovora. Prazno: podrazumijevana vrijednost Jobe servera. Najviše {$a} MB (postavlja administrator). Jezik kojem za pokretanje treba više (JavaScriptu treba 1000 MB) dobija koliko mu treba. Na CodeLab runneru ovo ograničenje ne vrijedi za Javu, C# i JavaScript: tamo uvijek dobijaju heap od 256 MB.';
$string['noanswer'] = 'Najprije napišite program.';
$string['noassist'] = 'Isključi dovršavanje koda i savjete (za provjere)';
$string['noexpected'] = 'Upišite očekivani izlaz ili rješenje iz kojeg će se izračunati.';
$string['ordercheck'] = 'Provjera redoslijeda';
$string['ordercheck_help'] = 'Učenici mogu pritisnuti Provjeri redoslijed da vide koliko je redova na svom mjestu, nikad kojih. Red je na mjestu kad pripada najdužem zajedničkom nizu njihovih redova i redova rješenja (u Pythonu i s istim uvlačenjem); razmaci se ne računaju, a redovi-zamke nikad nisu na mjestu. S dijelom ocjene: odgovor koji ne prolazi testove dobija do polovine ocjene za redove na mjestu. Punu ocjenu i dalje određuju testovi.';
$string['ordercheck_off'] = 'Ne';
$string['ordercheck_on'] = 'Da';
$string['ordercheck_partial'] = 'Da, s dijelom ocjene za redoslijed';
$string['ordercheckfailed'] = 'Redoslijed nije bilo moguće provjeriti.';
$string['orderresult'] = 'Redova na svom mjestu: {$a->placed} od {$a->total}';
$string['parsons'] = 'Parsonsov zadatak';
$string['parsons_help'] = 'Učenici ne pišu program: dobijaju redove rješenja, izmiješane s redovima za zavaravanje, i slažu ih redom (u Pythonu i s ispravnim uvlačenjem). Program koji slože ocjenjuje se testovima kao i inače.';
$string['parsons_label'] = 'Odgovor slaganjem redova rješenja redom';
$string['parsonsadd'] = 'Dodaj u program: {$a}';
$string['parsonsanswer'] = 'Vaš program';
$string['parsonsdown'] = 'Pomakni dolje';
$string['parsonsgap'] = 'Praznina u redu {$a}';
$string['parsonshint'] = 'Povucite redove u svoj program ispravnim redoslijedom ili kliknite red da ga dodate na kraj. Neki redovi možda nisu potrebni.';
$string['parsonsindent'] = 'Uvuci';
$string['parsonsnosolution'] = 'Parsonsovom zadatku treba rješenje: njegove redove učenici slažu redom.';
$string['parsonsoutdent'] = 'Izvuci';
$string['parsonspool'] = 'Redovi';
$string['parsonsprogram'] = 'Program sastavljen od vaših redova (koriste ga Pokreni, Korak i testovi):';
$string['parsonsremove'] = 'Natrag među redove';
$string['parsonsup'] = 'Pomakni gore';
$string['passed'] = 'Prošao';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Učenik piše program u editoru koda. S testovima se program izvršava na Jobe serveru s ulazom svakog testa i ocjenjuje prema udjelu testova čiji je izlaz tačan. Bez testova ocjenjuje ga nastavnik.';
$string['pluginnameadding'] = 'Dodavanje CodeLab pitanja';
$string['pluginnameediting'] = 'Uređivanje CodeLab pitanja';
$string['pluginnamesummary'] = 'Učenik piše program u C-u, C++-u, Pythonu, Javi ili C#-u.';
$string['prefix'] = 'Kod prije';
$string['prefix_help'] = 'Kod koji se pri izvršavanju dodaje prije učenikova programa, na primjer redovi #include ili početak klase. Učenici ga ne vide u editoru.';
$string['privacy:metadata:jobe'] = 'Odgovori se šalju Jobe serveru koji je postavio administrator kako bi se izvršili na testovima pitanja. Same odgovore čuva sistem za pitanja.';
$string['privacy:metadata:jobe:code'] = 'Program koji je učenik napisao';
$string['privacy:metadata:jobe:stdin'] = 'Ulaz testa';
$string['privacy:metadata:pyodide'] = 'Kad se Python u pokušaju izvršava u pregledniku (Pokreni i Korak), učenikov preglednik učitava Pyodide (Python interpreter) s adrese koju je postavio administrator, podrazumijevano s jsDelivr CDN-a. Ne šalje se nikakav odgovor ni ulaz.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP adresa učenikova preglednika, kao pri svakom preuzimanju';
$string['privacy:metadata:runner'] = 'Kad administrator postavi CodeLab runner (vlastiti ili hostovani), odgovori se šalju tamo kako bi se izvršili na testovima pitanja (SQL uvijek, ostali jezici kad je runner server za izvršavanje i ocjenjivanje), a Pokreni u pokušaju tamo izvršava program dok učenik upisuje ulaz. Runner čuva program samo dok radi. Same odgovore čuva sistem za pitanja.';
$string['privacy:metadata:runner:code'] = 'Program koji je učenik napisao';
$string['privacy:metadata:runner:stdin'] = 'Ulaz testa ili ulaz koji učenik upisuje';
$string['privacy:metadata:runner:userid'] = 'ID učenika, u potpisanom tokenu za Pokreni u pokušaju, radi ograničenja broja programa koje svaki korisnik istovremeno pokreće';
$string['runtests'] = 'Pokreni testove';
$string['sandboxfailed'] = 'Program nije bilo moguće provjeriti na serveru (Jobe). Ocijenit će ga vaš nastavnik.';
$string['savefailing'] = 'Sačuvaj i ako rješenje ne prolazi testove';
$string['showtests'] = 'Testovi u pokušaju';
$string['showtests_desc'] = 'Učenici mogu pokrenuti testove koji nisu skriveni prije predaje';
$string['solution'] = 'Rješenje';
$string['solution_help'] = 'Nastavnikov program. Prazni očekivani izlazi testova popunjavaju se njegovim izvršavanjem pri čuvanju pitanja; učenici ga u pregledu vide kao tačan odgovor.';
$string['solutioncheck'] = 'Provjera rješenja';
$string['solutioncheck_help'] = 'Pri čuvanju pitanja rješenje se izvršava na Jobeu s ulazom svakog testa koji ima očekivani izlaz, a pitanje se čuva samo ako ih prođe sve. Označite ovaj okvir da biste ipak sačuvali, na primjer dok još pišete testove. Kad Jobe nije dostupan, pitanje se čuva bez provjere.';
$string['solutionfails'] = 'Rješenje ne prolazi ovaj test. Njegov izlaz: {$a}';
$string['solutionis'] = 'Rješenje:';
$string['solutionnocompile'] = 'Rješenje se ne kompajlira: {$a}';
$string['suffix'] = 'Kod poslije';
$string['suffix_help'] = 'Kod koji se pri izvršavanju dodaje nakon učenikova programa, na primjer funkcija main koja poziva učenikovu funkciju ili kraj klase. Učenici ga ne vide u editoru.';
$string['template'] = 'Početni kod';
$string['template_help'] = 'Kod od kojeg učenici počinju u editoru; može biti prazan.';
$string['test'] = 'Test';
$string['testcode'] = 'Kod testa';
$string['testcode_help'] = 'Kod koji se izvršava u ovom testu, na primjer poziv funkcije koju učenik piše: <code>printf("%d\\n", sum(2, 3));</code> ili <code>print(sum(2, 3))</code>. Može biti prazan.

* Ako kod poslije učenikova programa ima oznaku <code>{{TEST}}</code>, na primjer u funkciji main koju vi pišete, kod testa dolazi na njezino mjesto.
* Inače C ili C++ program bez funkcije main dobija je: <code>int main(void) { test code return 0; }</code>.
* U ostalim jezicima kod testa dodaje se na kraj programa.

Test može imati i ulaz. Učenici vide kod testova koji nisu skriveni.';
$string['testcoden'] = 'Test {no}: kod testa';
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
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Težina';
$string['timelimit'] = 'Vremensko ograničenje po testu (s)';
$string['timelimit_help'] = 'Koliko sekundi smije trajati jedan test: test koji traje duže pada kao prespor, i kad mu je izlaz tačan. Prazno: bez ograničenja. Od 0.1 do 30. Samo CodeLab runner javlja koliko je test trajao; na Jobeu ovo polje nema učinka i jedino ograničenje je procesorsko vrijeme. Vrijeme se mjeri na serveru i uključuje pokretanje jezika (oko 0.3 sekunde za Javu i C#), pa ostavite prostora iznad vremena dobrog rješenja.';
$string['tolerance'] = 'Tolerancija';
$string['tolerance_help'] = 'Za usporedbu s brojevima: najveća razlika dvaju brojeva koja se još računa kao jednakost, apsolutna ili relativna prema većem broju. S 0.001 3.1416 odgovara 3.1414, a 1000.4 odgovara 1000.';
$string['tooslow'] = 'Prespor: {$a->time} s, ograničenje je {$a->limit} s';
