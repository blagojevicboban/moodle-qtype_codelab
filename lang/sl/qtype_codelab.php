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
 * Strings for component 'qtype_codelab', language 'sl' (Slovenian).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Dodaj še {no} preizkusov';
$string['aihints'] = 'Pojasnila UI';
$string['aihints_help'] = 'Ko skrbnik vklopi pojasnila napak z UI v CodeLab za TinyMCE, učenci pod sporočilom prevajalnika ali napako svojega programa dobijo gumb, ki prosi umetno inteligenco spletnega mesta, naj jo pojasni. Umetna inteligenca ima navodilo, naj nikoli ne napiše popravka. Brez te možnosti gumb v kvizu ni nikoli prikazan.';
$string['aihints_label'] = 'Učenci lahko prosijo umetno inteligenco, naj pojasni sporočilo prevajalnika ali napako';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Vaš program ({$a})';
$string['assist'] = 'Pomoč pri pisanju';
$string['badlimit'] = 'Vnesite celo število od 1 do {$a} ali pustite prazno za privzeto vrednost.';
$string['badregex'] = 'To ni veljaven regularni izraz.';
$string['badtimelimit'] = 'Vnesite število sekund od 0.1 do 30 ali pustite prazno za brez omejitve.';
$string['badtolerance'] = 'Vnesite število 0 ali več, na primer 0.001.';
$string['bulkcheck'] = 'Preveri rešitve CodeLab';
$string['bulkcheck_again'] = 'Preveri znova';
$string['bulkcheck_bank'] = 'Banka vprašanj';
$string['bulkcheck_done'] = 'Preverjenih vprašanj: {$a->total}; {$a->ok} jih uspešno opravi vse svoje preizkuse, {$a->problems} potrebuje pozornost.';
$string['bulkcheck_finished'] = 'Končano.';
$string['bulkcheck_intro'] = 'Rešitev vsakega od {$a} vprašanj CodeLab v bankah vprašanj tega predmeta se izvede na strežniku Jobe na preizkusih svojega vprašanja, eno za drugim. Vprašanja, katerih rešitev ne uspe, se ne prevede ali manjka, so navedena najprej. Rezultati že preverjenih rešitev se vzamejo iz predpomnilnika.';
$string['bulkcheck_none'] = 'V bankah vprašanj tega predmeta ni vprašanj CodeLab.';
$string['bulkcheck_progress'] = 'Preverjam {$a->done} od {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Rezultat';
$string['bulkcheck_start'] = 'Začni preverjanje';
$string['cachedef_results'] = 'Rezultati preizkusov oddanih programov';
$string['check_compile'] = 'Se ne prevede';
$string['check_failed'] = 'Uspešno opravi {$a->passed} od {$a->total} preizkusov';
$string['check_jobe'] = 'Jobe je ni mogel izvesti';
$string['check_nosolution'] = 'Ni rešitve';
$string['check_notests'] = 'Ni preizkusov (oceni učitelj)';
$string['check_ok'] = 'Uspešno opravi vse preizkuse ({$a->total})';
$string['checkfailed'] = 'Programa ni bilo mogoče preveriti na strežniku (Jobe), zato ta poskus ne šteje. Čez trenutek znova pritisnite Preveri.';
$string['checkorder'] = 'Preveri vrstni red';
$string['classanalysis'] = 'Analiza';
$string['classanswers'] = 'Odgovori';
$string['classempty'] = 'Še ni odgovorov.';
$string['classemptyoutput'] = '(ni izhoda)';
$string['classgrades'] = 'Ocene (odstotek)';
$string['classhidenames'] = 'Skrij imena';
$string['classmessages'] = 'Najpogostejša sporočila prevajalnika';
$string['classnotgraded'] = 'ni ocenjeno';
$string['classother'] = '{$a} odgovorov na druge različice vprašanja ni analiziranih.';
$string['classpending'] = 'Preverja se še {$a} odgovorov; analiza se bo čez trenutek razširila.';
$string['classshownames'] = 'Prikaži imena';
$string['classsimilar'] = 'Podobne oddaje';
$string['classsimilarnote'] = 'Primerjano lokalno po strukturi kode (brez imen spremenljivk, presledkov, komentarjev in začetne kode); pred odločitvijo preglejte odgovore.';
$string['classstudent'] = 'Učenec {$a}';
$string['classsummary'] = 'Odgovori: {$a->answers} · se ne prevedejo: {$a->compile} · napaka v preizkusu: {$a->runtime} · nad omejitvijo časa ali pomnilnika: {$a->timelimit}';
$string['classtest'] = 'Preizkus {$a->n}: uspešnih {$a->passed} od {$a->total}';
$string['classtesthidden'] = 'Preizkus {$a->n} (skrit): uspešnih {$a->passed} od {$a->total}';
$string['classunchecked'] = 'Strežnik ni mogel preveriti {$a} odgovorov.';
$string['classwork'] = 'Delo razreda';
$string['classwrong'] = 'Pogosti napačni izhodi:';
$string['codeheader'] = 'Koda';
$string['compare'] = 'Primerjava izhoda';
$string['compare_help'] = 'Kako se izhod programa primerja s pričakovanim izhodom vsakega preizkusa.

* **Natančno**: šteje vsak znak.
* **Presledki na koncu ne štejejo**: presledki na koncu vrstic in prazne vrstice na koncu se izpustijo.
* **Vrstice v poljubnem vrstnem redu**: kot prejšnje, vendar so vrstice lahko v poljubnem vrstnem redu, za poizvedbe SQL brez ORDER BY.
* **Števila s toleranco**: izhodi se primerjajo besedo za besedo, dve števili pa sta enaki, ko se razlikujeta največ za toleranco (absolutno ali relativno glede na večje število). Presledki in prelomi vrstic med besedami ne štejejo.
* **Regularni izraz**: pričakovani izhod vsakega preizkusa je regularni izraz (PCRE), ki se mora ujemati s celotnim izhodom, na primer <code>Sum: [0-9]+</code>. Prazni pričakovani izhodi se iz rešitve zapolnijo z vzorci, ki se ujemajo samo s tem izhodom.';
$string['comparison_exact'] = 'Natančno';
$string['comparison_numbers'] = 'Števila s toleranco';
$string['comparison_regex'] = 'Regularni izraz';
$string['comparison_spaces'] = 'Presledki na koncu ne štejejo';
$string['comparison_unordered'] = 'Vrstice v poljubnem vrstnem redu (vrstice SQL)';
$string['compileerror'] = 'Program se ne prevede:';
$string['cputime'] = 'Časovna omejitev procesorja (sekunde)';
$string['cputime_help'] = 'Največji procesorski čas enega izvajanja preizkusa pri ocenjevanju odgovora. Prazno: nastavitev vtičnika urejevalnika CodeLab (5 sekund, če ni spremenjeno). Največ {$a} sekund (določi skrbnik). Zaženi in Zaženi preizkuse v poskusu ohranita nastavitev spletnega mesta.';
$string['distractors'] = 'Zavajajoče vrstice';
$string['distractors_help'] = 'Vrstice, ki so pomešane med vrstice rešitve, vendar ne spadajo vanjo, ena na vrstico (na primer napačen pogoj ali nepotrebna vrstica). Učenci, ki jih uporabijo, ne opravijo preizkusov.';
$string['failed'] = 'Neuspešno';
$string['gaps'] = 'Praznine za dopolnjevanje';
$string['gaps_help'] = 'Število izrazov, skritih kot praznine v vrsticah Parsonsove naloge (0 samo za razvrščanje). Dijaki jih dopolnijo med razvrščanjem vrstic.';
$string['gaps_none'] = '0 (samo razvrščanje)';
$string['hiddensummary'] = 'Uspešni skriti preizkusi: {$a->passed} od {$a->total}';
$string['lang_bash'] = 'Bash';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_go'] = 'Go';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['lang_r'] = 'R';
$string['lang_rust'] = 'Rust';
$string['lang_typescript'] = 'TypeScript';
$string['language'] = 'Programski jezik';
$string['maxcputime'] = 'Največji procesorski čas vprašanja';
$string['maxcputime_desc'] = 'Vprašanja od Jobe ne morejo zahtevati več procesorskega časa od tega, v sekundah na izvajanje.';
$string['maxmemory'] = 'Največji pomnilnik vprašanja';
$string['maxmemory_desc'] = 'Vprašanja od Jobe ne morejo zahtevati več pomnilnika od tega, v MB na izvajanje.';
$string['memorylimit'] = 'Omejitev pomnilnika (MB)';
$string['memorylimit_help'] = 'Največji pomnilnik enega izvajanja preizkusa pri ocenjevanju odgovora. Prazno: privzeta vrednost strežnika Jobe. Največ {$a} MB (določi skrbnik). Jezik, ki za zagon potrebuje več (JavaScript potrebuje 1000 MB), dobi, kar potrebuje. Na CodeLab runner ta omejitev ne velja za Javo, C# in JavaScript: tam vedno dobijo kopico 256 MB.';
$string['noanswer'] = 'Najprej napišite program.';
$string['noassist'] = 'Izklopi dokončevanje kode in namige (za preverjanja)';
$string['noexpected'] = 'Vnesite pričakovani izhod ali rešitev, iz katere se izračuna.';
$string['ordercheck'] = 'Preverjanje vrstnega reda';
$string['ordercheck_help'] = 'Učenci lahko pritisnejo Preveri vrstni red, da vidijo, koliko vrstic je na svojem mestu, nikoli katere. Vrstica je na mestu, ko spada v najdaljše skupno zaporedje njihovih vrstic in vrstic rešitve (v Pythonu tudi z enakim zamikom); presledki ne štejejo, vrstice-pasti pa niso nikoli na mestu. Z delom ocene: odgovor, ki ne prestane testov, dobi do polovice ocene za vrstice na mestu. Polno oceno še vedno določajo testi.';
$string['ordercheck_off'] = 'Ne';
$string['ordercheck_on'] = 'Da';
$string['ordercheck_partial'] = 'Da, z delom ocene za vrstni red';
$string['ordercheckfailed'] = 'Vrstnega reda ni bilo mogoče preveriti.';
$string['orderresult'] = 'Vrstic na svojem mestu: {$a->placed} od {$a->total}';
$string['parsons'] = 'Parsonsova naloga';
$string['parsons_help'] = 'Učenci ne pišejo programa: dobijo vrstice rešitve, premešane z zavajajočimi vrsticami, in jih razvrstijo (v Pythonu tudi s pravilnim zamikom). Program, ki ga sestavijo, se kot običajno oceni s preizkusi.';
$string['parsons_label'] = 'Odgovor z razvrščanjem vrstic rešitve';
$string['parsonsadd'] = 'Dodaj v program: {$a}';
$string['parsonsanswer'] = 'Vaš program';
$string['parsonsdown'] = 'Premakni navzdol';
$string['parsonsgap'] = 'Praznina v vrstici {$a}';
$string['parsonshint'] = 'Povlecite vrstice v svoj program v pravilnem vrstnem redu ali kliknite vrstico, da jo dodate na konec. Nekatere vrstice morda niso potrebne.';
$string['parsonsindent'] = 'Zamakni';
$string['parsonsnosolution'] = 'Parsonsova naloga potrebuje rešitev: njene vrstice učenci razvrščajo.';
$string['parsonsoutdent'] = 'Odmakni';
$string['parsonspool'] = 'Vrstice';
$string['parsonsprogram'] = 'Program iz vaših vrstic (uporabljajo ga Zaženi, Korak in preizkusi):';
$string['parsonsremove'] = 'Nazaj med vrstice';
$string['parsonsup'] = 'Premakni navzgor';
$string['passed'] = 'Uspešno';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Učenec napiše program v urejevalniku kode. S preizkusi se program izvede na strežniku Jobe z vhodom vsakega preizkusa in oceni glede na delež preizkusov s pravilnim izhodom. Brez preizkusov ga oceni učitelj.';
$string['pluginnameadding'] = 'Dodajanje vprašanja CodeLab';
$string['pluginnameediting'] = 'Urejanje vprašanja CodeLab';
$string['pluginnamesummary'] = 'Učenec napiše program v C, C++, Pythonu, Javi ali C#.';
$string['prefix'] = 'Koda pred';
$string['prefix_help'] = 'Koda, ki se pri izvajanju doda pred učenčev program, na primer vrstice #include ali začetek razreda. Učenci je v urejevalniku ne vidijo.';
$string['privacy:metadata:jobe'] = 'Odgovori se pošljejo strežniku Jobe, ki ga je nastavil skrbnik, da se izvedejo na preizkusih vprašanja. Same odgovore hrani pogon vprašanj.';
$string['privacy:metadata:jobe:code'] = 'Program, ki ga je napisal učenec';
$string['privacy:metadata:jobe:stdin'] = 'Vhod preizkusa';
$string['privacy:metadata:pyodide'] = 'Ko se Python v poskusu izvaja v brskalniku (Zaženi in Korak), učenčev brskalnik naloži Pyodide (tolmač Python) z naslova, ki ga je nastavil skrbnik, privzeto z CDN jsDelivr. Ne pošlje se noben odgovor ali vhod.';
$string['privacy:metadata:pyodide:ipaddress'] = 'Naslov IP učenčevega brskalnika, kot pri vsakem prenosu';
$string['privacy:metadata:runner'] = 'Ko skrbnik nastavi CodeLab runner (lastni ali gostovani), se odgovori pošljejo tja, da se izvedejo na preizkusih vprašanja (SQL vedno, drugi jeziki, ko je runner strežnik za izvajanje in ocenjevanje), Zaženi v poskusu pa tam izvaja program, medtem ko učenec tipka vhod. Runner hrani program samo, dokler se izvaja. Same odgovore hrani pogon vprašanj.';
$string['privacy:metadata:runner:code'] = 'Program, ki ga je napisal učenec';
$string['privacy:metadata:runner:stdin'] = 'Vhod preizkusa ali vhod, ki ga učenec vtipka';
$string['privacy:metadata:runner:userid'] = 'ID učenca v podpisanem žetonu za Zaženi v poskusu, da se omeji število programov, ki jih vsak uporabnik hkrati izvaja';
$string['runtests'] = 'Zaženi preizkuse';
$string['sandboxfailed'] = 'Programa ni bilo mogoče preveriti na strežniku (Jobe). Ocenil ga bo vaš učitelj.';
$string['savefailing'] = 'Shrani, tudi če rešitev ne opravi preizkusov';
$string['showtests'] = 'Preizkusi v poskusu';
$string['showtests_desc'] = 'Učenci lahko pred oddajo zaženejo preizkuse, ki niso skriti';
$string['solution'] = 'Rešitev';
$string['solution_help'] = 'Učiteljev program. Prazni pričakovani izhodi preizkusov se ob shranjevanju vprašanja zapolnijo z njegovim izvajanjem; učenci ga v pregledu vidijo kot pravilen odgovor.';
$string['solutioncheck'] = 'Preverjanje rešitve';
$string['solutioncheck_help'] = 'Ob shranjevanju vprašanja se rešitev izvede na Jobe z vhodom vsakega preizkusa, ki ima pričakovani izhod, vprašanje pa se shrani samo, če jih opravi vse. Označite to polje, da vseeno shranite, na primer medtem ko še pišete preizkuse. Ko Jobe ni dosegljiv, se vprašanje shrani brez preverjanja.';
$string['solutionfails'] = 'Rešitev ne opravi tega preizkusa. Njen izhod: {$a}';
$string['solutionis'] = 'Rešitev:';
$string['solutionnocompile'] = 'Rešitev se ne prevede: {$a}';
$string['suffix'] = 'Koda za';
$string['suffix_help'] = 'Koda, ki se pri izvajanju doda za učenčev program, na primer funkcija main, ki kliče učenčevo funkcijo, ali konec razreda. Učenci je v urejevalniku ne vidijo.';
$string['template'] = 'Začetna koda';
$string['template_help'] = 'Koda, s katero učenci začnejo v urejevalniku; je lahko prazna.';
$string['test'] = 'Preizkus';
$string['testcode'] = 'Koda preizkusa';
$string['testcode_help'] = 'Koda, ki se izvede v tem preizkusu, na primer klic funkcije, ki jo piše učenec: <code>printf("%d\\n", sum(2, 3));</code> ali <code>print(sum(2, 3))</code>. Je lahko prazna.

* Če koda za učenčevim programom vsebuje oznako <code>{{TEST}}</code>, na primer v funkciji main, ki jo napišete vi, koda preizkusa pride na njeno mesto.
* Sicer program v C ali C++ brez funkcije main dobi eno: <code>int main(void) { test code return 0; }</code>.
* V drugih jezikih se koda preizkusa doda na konec programa.

Preizkus ima lahko tudi vhod. Učenci vidijo kodo preizkusov, ki niso skriti.';
$string['testcoden'] = 'Preizkus {no}: koda preizkusa';
$string['testexpected'] = 'Pričakovani izhod';
$string['testfailed'] = 'Preizkus {$a}: neuspešen';
$string['testgot'] = 'Izhod';
$string['testhidden'] = 'Skrito pred učenci';
$string['testinputn'] = 'Preizkus {no}: vhod';
$string['testpassed'] = 'Preizkus {$a}: uspešen';
$string['tests'] = 'Preizkusi';
$string['tests_desc'] = 'Vsak preizkus da programu vhod in primerja njegov izhod s pričakovanim izhodom. Pustite pričakovani izhod prazen, da se vzame iz rešitve. Brez preizkusov odgovore oceni učitelj.';
$string['testsof'] = 'Uspešnih {$a->passed} od {$a->total} preizkusov';
$string['teststdin'] = 'Vhod';
$string['testsummary'] = 'Uspešni preizkusi: {$a->passed} od {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Utež';
$string['timelimit'] = 'Časovna omejitev na test (s)';
$string['timelimit_help'] = 'Koliko sekund sme trajati en test: test, ki traja dlje, pade kot prepočasen, tudi ko je njegov izpis pravilen. Prazno: brez omejitve. Od 0.1 do 30. Samo CodeLab runner sporoči, koliko časa je test trajal; na Jobe to polje nima učinka in edina omejitev je procesorski čas. Čas se meri na strežniku in vključuje zagon jezika (približno 0.3 sekunde za Javo in C#), zato pustite rezervo nad časom dobre rešitve.';
$string['tolerance'] = 'Toleranca';
$string['tolerance_help'] = 'Za primerjavo s števili: največja razlika dveh števil, ki še šteje kot enakost, absolutna ali relativna glede na večje število. Z 0.001 se 3.1416 ujema s 3.1414 in 1000.4 s 1000.';
$string['tooslow'] = 'Prepočasno: {$a->time} s, omejitev je {$a->limit} s';
