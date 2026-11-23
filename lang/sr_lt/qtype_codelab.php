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
 * Strings for component 'qtype_codelab', language 'sr_lt'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Dodaj još {no} testa';
$string['aihints'] = 'AI objašnjenja';
$string['aihints_help'] = 'Kada administrator uključi AI objašnjenja grešaka u CodeLab za TinyMCE, učenici ispod poruke kompajlera ili greške svog programa dobijaju dugme koje traži od AI sajta da je objasni. AI dobija uputstvo da nikad ne piše ispravku. Bez ove opcije dugme se u testu nikad ne prikazuje.';
$string['aihints_label'] = 'Učenici mogu da traže od AI da objasni poruku kompajlera ili grešku';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Vaš program ({$a})';
$string['assist'] = 'Pomoć pri kucanju';
$string['badlimit'] = 'Unesite ceo broj od 1 do {$a}, ili ostavite prazno za podrazumevanu vrednost.';
$string['badregex'] = 'Ovo nije ispravan regularni izraz.';
$string['badtimelimit'] = 'Unesite broj sekundi od 0.1 do 30, ili ostavite prazno za bez ograničenja.';
$string['badtolerance'] = 'Unesite broj 0 ili veći, na primer 0.001.';
$string['bulkcheck'] = 'Provera rešenja CodeLab pitanja';
$string['bulkcheck_again'] = 'Proveri ponovo';
$string['bulkcheck_bank'] = 'Banka pitanja';
$string['bulkcheck_done'] = 'Provereno pitanja: {$a->total}. Sve testove prolazi {$a->ok}, pažnju traži {$a->problems}.';
$string['bulkcheck_finished'] = 'Završeno.';
$string['bulkcheck_intro'] = 'Rešenje svakog od {$a} CodeLab pitanja u bankama pitanja ovog kursa pokreće se na Jobe serveru na testovima tog pitanja, jedno po jedno. Pitanja čije rešenje ne prolazi, ne prevodi se ili ne postoji navode se prva. Rezultati rešenja koja su već proveravana uzimaju se iz keša.';
$string['bulkcheck_none'] = 'U bankama pitanja ovog kursa nema CodeLab pitanja.';
$string['bulkcheck_progress'] = 'Proverava se {$a->done} od {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Rezultat';
$string['bulkcheck_start'] = 'Pokreni proveru';
$string['cachedef_results'] = 'Rezultati testova predatih programa';
$string['check_compile'] = 'Ne prevodi se';
$string['check_failed'] = 'Prolazi {$a->passed} od {$a->total} testova';
$string['check_jobe'] = 'Jobe nije mogao da ga pokrene';
$string['check_nosolution'] = 'Nema rešenja';
$string['check_notests'] = 'Nema testova (ocenjuje nastavnik)';
$string['check_ok'] = 'Prolazi sve testove ({$a->total})';
$string['checkfailed'] = 'Program nije mogao da se proveri na serveru (Jobe), pa se ovaj pokušaj ne računa. Pritisnite Proveri ponovo za koji trenutak.';
$string['checkorder'] = 'Proveri redosled';
$string['classanalysis'] = 'Analiza';
$string['classanswers'] = 'Odgovori';
$string['classempty'] = 'Još nema odgovora.';
$string['classemptyoutput'] = '(bez izlaza)';
$string['classgrades'] = 'Ocene (procenti)';
$string['classhidenames'] = 'Sakrij imena';
$string['classmessages'] = 'Najčešće poruke kompajlera';
$string['classnotgraded'] = 'nije ocenjeno';
$string['classother'] = '{$a} odgovora na druge verzije pitanja nije analizirano.';
$string['classpending'] = 'Još {$a} odgovora se proverava; analiza se dopunjuje za trenutak.';
$string['classshownames'] = 'Prikaži imena';
$string['classsimilar'] = 'Slične predaje';
$string['classsimilarnote'] = 'Poređeno lokalno po strukturi koda (bez imena promenljivih, razmaka, komentara i početnog koda); pregledajte odgovore pre odluke.';
$string['classstudent'] = 'Učenik {$a}';
$string['classsummary'] = 'Odgovora: {$a->answers} · ne prevodi se: {$a->compile} · greška u testu: {$a->runtime} · preko ograničenja vremena ili memorije: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: prolazi {$a->passed} od {$a->total}';
$string['classtesthidden'] = 'Test {$a->n} (skriven): prolazi {$a->passed} od {$a->total}';
$string['classunchecked'] = 'Server nije mogao da proveri {$a} odgovora.';
$string['classwork'] = 'Rad razreda';
$string['classwrong'] = 'Česti pogrešni izlazi:';
$string['codeheader'] = 'Kod';
$string['compare'] = 'Poređenje izlaza';
$string['compare_help'] = 'Kako se izlaz programa poredi sa očekivanim izlazom svakog testa.

* **Tačno**: računa se svaki znak.
* **Razmaci na kraju se ne računaju**: izostavljaju se razmaci na kraju redova i prazni redovi na kraju.
* **Redovi bilo kojim redosledom**: kao prethodno, ali redovi mogu doći bilo kojim redom, za SQL upite bez ORDER BY.
* **Brojevi sa tolerancijom**: izlazi se porede reč po reč, a dva broja su jednaka kada se razlikuju najviše za toleranciju (apsolutno ili u odnosu na veći broj). Razmaci i prelasci u novi red između reči se ne računaju.
* **Regularni izraz**: očekivani izlaz svakog testa je regularni izraz (PCRE) koji mora da odgovara celom izlazu, na primer <code>Zbir: [0-9]+</code>. Prazni očekivani izlazi se popunjavaju iz rešenja kao izrazi koji odgovaraju samo tom izlazu.';
$string['comparison_exact'] = 'Tačno';
$string['comparison_numbers'] = 'Brojevi sa tolerancijom';
$string['comparison_regex'] = 'Regularni izraz';
$string['comparison_spaces'] = 'Razmaci na kraju se ne računaju';
$string['comparison_unordered'] = 'Redovi bilo kojim redosledom (SQL)';
$string['compileerror'] = 'Program ne može da se prevede:';
$string['cputime'] = 'Ograničenje procesorskog vremena (sekunde)';
$string['cputime_help'] = 'Najveće procesorsko vreme jednog pokretanja testa kada se odgovor ocenjuje. Prazno: podešavanje dodatka CodeLab za editor (5 sekundi ako nije menjano). Najviše {$a} sekundi (podešava administrator). Pokreni i Pokreni testove u pokušaju koriste podešavanje sajta.';
$string['distractors'] = 'Linije za zbunjivanje';
$string['distractors_help'] = 'Linije koje se mešaju sa linijama rešenja, a ne pripadaju mu, jedna po redu (na primer pogrešan uslov ili linija koja nije potrebna). Ko ih upotrebi ne prolazi testove.';
$string['failed'] = 'Nije prošao';
$string['gaps'] = 'Praznine za dopunjavanje';
$string['gaps_help'] = 'Broj izraza sakrivenih kao praznine u redovima Parsonsovog zadatka (0 samo za ređanje). Učenici ih dopunjavaju dok slažu redosled.';
$string['gaps_none'] = '0 (samo ređanje)';
$string['hiddensummary'] = 'Prošlo skrivenih testova: {$a->passed} od {$a->total}';
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
$string['maxcputime'] = 'Najveće procesorsko vreme pitanja';
$string['maxcputime_desc'] = 'Pitanja ne mogu da traže od Jobe servera više procesorskog vremena od ovoga, u sekundama po pokretanju.';
$string['maxmemory'] = 'Najveća memorija pitanja';
$string['maxmemory_desc'] = 'Pitanja ne mogu da traže od Jobe servera više memorije od ove, u MB po pokretanju.';
$string['memorylimit'] = 'Ograničenje memorije (MB)';
$string['memorylimit_help'] = 'Najveća memorija jednog pokretanja testa kada se odgovor ocenjuje. Prazno: podrazumevana vrednost Jobe servera. Najviše {$a} MB (podešava administrator). Jezik kome treba više za pokretanje (JavaScript traži 1000 MB) dobija koliko mu treba. Na CodeLab runneru ovo ograničenje ne važi za Java, C# i JavaScript: tamo uvek dobijaju 256 MB memorije za objekte (heap).';
$string['noanswer'] = 'Najpre napišite program.';
$string['noassist'] = 'Isključi dopunjavanje koda i savete (za kontrolne zadatke)';
$string['noexpected'] = 'Upišite očekivani izlaz ili rešenje iz kog će se izračunati.';
$string['ordercheck'] = 'Provera redosleda';
$string['ordercheck_help'] = 'Učenici mogu da pritisnu Proveri redosled da vide koliko je redova na svom mestu, nikad koji. Red je na svom mestu kada pripada najdužem zajedničkom nizu njihovih redova i redova rešenja (u Pythonu i na istom uvlačenju); razmaci se ne računaju, a redovi-zamke nikad nisu na mestu. Sa delom ocene: odgovor koji ne prolazi testove dobija do polovine ocene za redove na svom mestu. Punu ocenu i dalje određuju testovi.';
$string['ordercheck_off'] = 'Ne';
$string['ordercheck_on'] = 'Da';
$string['ordercheck_partial'] = 'Da, sa delom ocene za redosled';
$string['ordercheckfailed'] = 'Redosled nije mogao da se proveri.';
$string['orderresult'] = 'Redova na svom mestu: {$a->placed} od {$a->total}';
$string['parsons'] = 'Parsonsov zadatak';
$string['parsons_help'] = 'Učenici ne pišu program: dobijaju izmešane linije rešenja i linije za zbunjivanje i ređaju ih (u Python-u i sa pravim uvlačenjem). Program koji tako slože ocenjuje se testovima kao i obično.';
$string['parsons_label'] = 'Odgovor se daje ređanjem linija rešenja';
$string['parsonsadd'] = 'Dodaj u program: {$a}';
$string['parsonsanswer'] = 'Vaš program';
$string['parsonsdown'] = 'Pomeri dole';
$string['parsonsgap'] = 'Praznina u redu {$a}';
$string['parsonshint'] = 'Prevucite linije u svoj program pravim redom ili kliknite liniju da je dodate na kraj. Neke linije možda nisu potrebne.';
$string['parsonsindent'] = 'Uvuci';
$string['parsonsnosolution'] = 'Parsonsovom zadatku treba rešenje: njegove linije učenici ređaju.';
$string['parsonsoutdent'] = 'Izvuci';
$string['parsonspool'] = 'Linije';
$string['parsonsprogram'] = 'Program od vaših linija (Run, Step i testovi koriste njega):';
$string['parsonsremove'] = 'Vrati u linije';
$string['parsonsup'] = 'Pomeri gore';
$string['passed'] = 'Prošao';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Učenik piše program u editoru koda. Ako pitanje ima testove, program se izvršava na Jobe serveru sa ulazom svakog testa, a ocena je udeo testova sa tačnim izlazom. Bez testova ocenjuje nastavnik.';
$string['pluginnameadding'] = 'Dodavanje CodeLab pitanja';
$string['pluginnameediting'] = 'Izmena CodeLab pitanja';
$string['pluginnamesummary'] = 'Učenik piše program u jeziku C, C++, Python, Java ili C#.';
$string['prefix'] = 'Kod ispred';
$string['prefix_help'] = 'Kod koji se dodaje ispred učenikovog programa pri izvršavanju, na primer #include redovi ili početak klase. Učenici ga ne vide u editoru.';
$string['privacy:metadata:jobe'] = 'Odgovori se šalju Jobe serveru koji je podesio administrator, da se izvrše na testovima pitanja. Same odgovore čuva sistem pitanja.';
$string['privacy:metadata:jobe:code'] = 'Program koji je učenik napisao';
$string['privacy:metadata:jobe:stdin'] = 'Ulaz testa';
$string['privacy:metadata:pyodide'] = 'Kad Python radi u pregledaču tokom pokušaja (Pokreni i Korak), pregledač učenika učitava Pyodide (Python interpreter) sa adrese koju je podesio administrator, podrazumevano sa jsDelivr CDN-a. Odgovor i ulaz se ne šalju.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP adresa pregledača učenika, kao pri svakom preuzimanju';
$string['privacy:metadata:runner'] = 'Kada administrator podesi CodeLab runner (sopstveni ili hostovani), odgovori se šalju na njega da se izvrše na testovima pitanja (SQL uvek, ostali jezici kada je runner server za izvršavanje i ocenjivanje), a Pokreni u pokušaju izvršava program na njemu dok učenik kuca ulaz. Runner čuva program samo dok radi. Same odgovore čuva sistem pitanja.';
$string['privacy:metadata:runner:code'] = 'Program koji je učenik napisao';
$string['privacy:metadata:runner:stdin'] = 'Ulaz testa, ili ulaz koji učenik kuca';
$string['privacy:metadata:runner:userid'] = 'Identifikator učenika, u potpisanom tokenu za Pokreni u pokušaju, radi ograničenja broja programa koje jedan korisnik pokreće istovremeno';
$string['runtests'] = 'Pokreni testove';
$string['sandboxfailed'] = 'Program nije mogao da se proveri na serveru (Jobe). Oceniće ga nastavnik.';
$string['savefailing'] = 'Sačuvaj i ako rešenje ne prolazi testove';
$string['showtests'] = 'Testovi u pokušaju';
$string['showtests_desc'] = 'Učenici mogu da pokrenu testove koji nisu skriveni pre predaje';
$string['solution'] = 'Rešenje';
$string['solution_help'] = 'Nastavnikov program. Prazni očekivani izlazi testova popunjavaju se njegovim izvršavanjem pri čuvanju pitanja; učenici ga u pregledu vide kao tačan odgovor.';
$string['solutioncheck'] = 'Provera rešenja';
$string['solutioncheck_help'] = 'Kada se pitanje čuva, rešenje se pokreće na Jobe serveru sa ulazom svakog testa koji ima očekivani izlaz, i pitanje se čuva samo ako ih sve prođe. Označite ovo polje da biste ga ipak sačuvali, na primer dok još pišete testove. Kada Jobe nije dostupan, pitanje se čuva bez provere.';
$string['solutionfails'] = 'Rešenje ne prolazi ovaj test. Njegov izlaz: {$a}';
$string['solutionis'] = 'Jedno rešenje:';
$string['solutionnocompile'] = 'Rešenje se ne prevodi: {$a}';
$string['suffix'] = 'Kod iza';
$string['suffix_help'] = 'Kod koji se dodaje iza učenikovog programa pri izvršavanju, na primer funkcija main koja poziva učenikovu funkciju ili kraj klase. Učenici ga ne vide u editoru.';
$string['template'] = 'Početni kod';
$string['template_help'] = 'Kod od kog učenici počinju u editoru; može da bude prazan.';
$string['test'] = 'Test';
$string['testcode'] = 'Kod testa';
$string['testcode_help'] = 'Kod koji se izvršava u ovom testu, na primer poziv funkcije koju piše učenik: <code>printf("%d\\n", zbir(2, 3));</code> ili <code>print(zbir(2, 3))</code>. Može biti prazan.

* Ako kod posle učenikovog programa ima oznaku <code>{{TEST}}</code>, na primer u funkciji main koju vi pišete, kod testa dolazi na njeno mesto.
* Inače C ili C++ program bez funkcije main dobija je: <code>int main(void) { kod testa return 0; }</code>.
* U ostalim jezicima kod testa se dodaje na kraj programa.

Test može imati i ulaz. Učenici vide kod testova koji nisu skriveni.';
$string['testcoden'] = 'Test {no}: kod testa';
$string['testexpected'] = 'Očekivani izlaz';
$string['testfailed'] = 'Test {$a}: nije prošao';
$string['testgot'] = 'Izlaz';
$string['testhidden'] = 'Skriven od učenika';
$string['testinputn'] = 'Test {no}: ulaz';
$string['testpassed'] = 'Test {$a}: prošao';
$string['tests'] = 'Testovi';
$string['tests_desc'] = 'Svaki test daje programu ulaz i poredi njegov izlaz sa očekivanim. Ostavite očekivani izlaz prazan da se uzme iz rešenja. Bez testova odgovore ocenjuje nastavnik.';
$string['testsof'] = 'Prošlo {$a->passed} od {$a->total} testova';
$string['teststdin'] = 'Ulaz';
$string['testsummary'] = 'Prošlo testova: {$a->passed} od {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Težina';
$string['timelimit'] = 'Vremensko ograničenje po testu (s)';
$string['timelimit_help'] = 'Koliko sekundi sme da traje jedan test: test koji traje duže pada kao prespor, i kada mu je izlaz tačan. Prazno: bez ograničenja. Od 0.1 do 30. Samo CodeLab runner javlja koliko je test trajao; na Jobe-u ovo polje nema dejstva i jedino ograničenje je procesorsko vreme. Vreme se meri na serveru i uključuje pokretanje jezika (oko 0.3 sekunde za Javu i C#), pa ostavite prostora iznad vremena dobrog rešenja.';
$string['tolerance'] = 'Tolerancija';
$string['tolerance_help'] = 'Za poređenje brojeva: najveća razlika dva broja koja se još računaju kao jednaki, apsolutno ili u odnosu na veći broj. Sa 0.001, 3.1416 odgovara 3.1414, a 1000.4 odgovara 1000.';
$string['tooslow'] = 'Prespor: {$a->time} s, ograničenje je {$a->limit} s';
