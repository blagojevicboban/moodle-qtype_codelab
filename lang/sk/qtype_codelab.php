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
 * Strings for component 'qtype_codelab', language 'sk' (Slovak).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Pridať ďalších {no} testov';
$string['aihints'] = 'Vysvetlenia AI';
$string['aihints_help'] = 'Keď správca zapne vysvetlenia chýb pomocou AI v CodeLab pre TinyMCE, žiaci dostanú pod správou prekladača alebo chybou svojho programu tlačidlo, ktoré požiada AI stránky o jej vysvetlenie. AI má pokyn nikdy nenapísať opravu. Bez tejto voľby sa tlačidlo v teste nikdy nezobrazí.';
$string['aihints_label'] = 'Žiaci môžu požiadať AI o vysvetlenie správy prekladača alebo chyby';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Váš program ({$a})';
$string['assist'] = 'Pomoc pri písaní';
$string['badlimit'] = 'Zadajte celé číslo od 1 do {$a} alebo nechajte prázdne pre predvolenú hodnotu.';
$string['badregex'] = 'Toto nie je platný regulárny výraz.';
$string['badtimelimit'] = 'Zadajte počet sekúnd od 0.1 do 30 alebo nechajte prázdne pre žiadny limit.';
$string['badtolerance'] = 'Zadajte číslo 0 alebo väčšie, napríklad 0.001.';
$string['bulkcheck'] = 'Skontrolovať riešenia CodeLab';
$string['bulkcheck_again'] = 'Skontrolovať znova';
$string['bulkcheck_bank'] = 'Banka otázok';
$string['bulkcheck_done'] = 'Skontrolované otázky: {$a->total}; {$a->ok} prejde všetkými svojimi testami, {$a->problems} potrebuje pozornosť.';
$string['bulkcheck_finished'] = 'Hotovo.';
$string['bulkcheck_intro'] = 'Riešenie každej z {$a} otázok CodeLab v bankách otázok tohto kurzu sa spustí na serveri Jobe na testoch svojej otázky, jedna po druhej. Otázky, ktorých riešenie neprejde, nepreloží sa alebo chýba, sú uvedené najprv. Výsledky už skontrolovaných riešení sa berú z vyrovnávacej pamäte.';
$string['bulkcheck_none'] = 'V bankách otázok tohto kurzu nie sú žiadne otázky CodeLab.';
$string['bulkcheck_progress'] = 'Kontrolujem {$a->done} z {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Výsledok';
$string['bulkcheck_start'] = 'Spustiť kontrolu';
$string['cachedef_results'] = 'Výsledky testov odovzdaných programov';
$string['check_compile'] = 'Nedá sa preložiť';
$string['check_failed'] = 'Prejde {$a->passed} z {$a->total} testov';
$string['check_jobe'] = 'Jobe ho nemohol spustiť';
$string['check_nosolution'] = 'Bez riešenia';
$string['check_notests'] = 'Bez testov (hodnotí učiteľ)';
$string['check_ok'] = 'Prejde všetkými testami ({$a->total})';
$string['checkfailed'] = 'Program sa nepodarilo skontrolovať na serveri (Jobe), preto sa tento pokus nepočíta. O chvíľu znova stlačte Skontrolovať.';
$string['checkorder'] = 'Skontrolovať poradie';
$string['classanalysis'] = 'Analýza';
$string['classanswers'] = 'Odpovede';
$string['classempty'] = 'Zatiaľ žiadne odpovede.';
$string['classemptyoutput'] = '(žiadny výstup)';
$string['classgrades'] = 'Hodnotenia (percentá)';
$string['classhidenames'] = 'Skryť mená';
$string['classmessages'] = 'Najčastejšie správy prekladača';
$string['classnotgraded'] = 'nehodnotené';
$string['classother'] = '{$a} odpovedí na iné verzie otázky sa neanalyzuje.';
$string['classpending'] = 'Kontroluje sa ešte {$a} odpovedí; analýza sa o chvíľu rozšíri.';
$string['classshownames'] = 'Zobraziť mená';
$string['classsimilar'] = 'Podobné odovzdania';
$string['classsimilarnote'] = 'Porovnané lokálne podľa štruktúry kódu (bez mien premenných, medzier, komentárov a počiatočného kódu); pred rozhodnutím si odpovede prezrite.';
$string['classstudent'] = 'Žiak {$a}';
$string['classsummary'] = 'Odpovede: {$a->answers} · nedajú sa preložiť: {$a->compile} · chyba v teste: {$a->runtime} · nad limitom času alebo pamäte: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: prejde {$a->passed} z {$a->total}';
$string['classtesthidden'] = 'Test {$a->n} (skrytý): prejde {$a->passed} z {$a->total}';
$string['classunchecked'] = 'Server nemohol skontrolovať {$a} odpovedí.';
$string['classwork'] = 'Práca triedy';
$string['classwrong'] = 'Časté nesprávne výstupy:';
$string['codeheader'] = 'Kód';
$string['compare'] = 'Porovnanie výstupu';
$string['compare_help'] = 'Ako sa výstup programu porovnáva s očakávaným výstupom každého testu.

* **Presne**: počíta sa každý znak.
* **Medzery na konci sa nepočítajú**: medzery na konci riadkov a prázdne riadky na konci sa vynechajú.
* **Riadky v ľubovoľnom poradí**: ako predchádzajúce, ale riadky môžu prísť v ľubovoľnom poradí, pre dopyty SQL bez ORDER BY.
* **Čísla s toleranciou**: výstupy sa porovnávajú slovo po slove a dve čísla sú rovnaké, keď sa nelíšia viac ako o toleranciu (absolútnu alebo relatívnu voči väčšiemu číslu). Medzery a zalomenia riadkov medzi slovami sa nepočítajú.
* **Regulárny výraz**: očakávaný výstup každého testu je regulárny výraz (PCRE), ktorý musí zodpovedať celému výstupu, napríklad <code>Sum: [0-9]+</code>. Prázdne očakávané výstupy sa doplnia z riešenia vzormi, ktoré zodpovedajú len tomuto výstupu.';
$string['comparison_exact'] = 'Presne';
$string['comparison_numbers'] = 'Čísla s toleranciou';
$string['comparison_regex'] = 'Regulárny výraz';
$string['comparison_spaces'] = 'Medzery na konci sa nepočítajú';
$string['comparison_unordered'] = 'Riadky v ľubovoľnom poradí (riadky SQL)';
$string['compileerror'] = 'Program sa nedá preložiť:';
$string['cputime'] = 'Časový limit procesora (sekundy)';
$string['cputime_help'] = 'Najväčší čas procesora jedného spustenia testu pri hodnotení odpovede. Prázdne: nastavenie modulu editora CodeLab (5 sekúnd, ak nebolo zmenené). Najviac {$a} sekúnd (určuje správca). Spustiť a Spustiť testy v pokuse si ponechávajú nastavenie stránky.';
$string['distractors'] = 'Klamlivé riadky';
$string['distractors_help'] = 'Riadky, ktoré sa zamiešajú medzi riadky riešenia, ale nepatria doň, jeden na riadok (napríklad nesprávna podmienka alebo zbytočný riadok). Žiaci, ktorí ich použijú, neprejdú testami.';
$string['failed'] = 'Neprešiel';
$string['gaps'] = 'Medzery na doplnenie';
$string['gaps_help'] = 'Počet výrazov skrytých ako medzery v riadkoch Parsonsovej úlohy (0 iba zoraďovanie). Študenti ich dopĺňajú pri zoraďovaní riadkov.';
$string['gaps_none'] = '0 (iba zoraďovanie)';
$string['hiddensummary'] = 'Prejdené skryté testy: {$a->passed} z {$a->total}';
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
$string['language'] = 'Programovací jazyk';
$string['maxcputime'] = 'Najväčší čas procesora otázky';
$string['maxcputime_desc'] = 'Otázky nemôžu od Jobe žiadať viac času procesora ako tento, v sekundách na spustenie.';
$string['maxmemory'] = 'Najväčšia pamäť otázky';
$string['maxmemory_desc'] = 'Otázky nemôžu od Jobe žiadať viac pamäte ako túto, v MB na spustenie.';
$string['memorylimit'] = 'Limit pamäte (MB)';
$string['memorylimit_help'] = 'Najväčšia pamäť jedného spustenia testu pri hodnotení odpovede. Prázdne: predvolená hodnota servera Jobe. Najviac {$a} MB (určuje správca). Jazyk, ktorý na štart potrebuje viac (JavaScript potrebuje 1000 MB), dostane, čo potrebuje. Na CodeLab runner tento limit neplatí pre Javu, C# a JavaScript: tam vždy dostanú haldu 256 MB.';
$string['noanswer'] = 'Najprv napíšte program.';
$string['noassist'] = 'Vypnúť dopĺňanie kódu a rady (na testy)';
$string['noexpected'] = 'Zadajte očakávaný výstup alebo riešenie, z ktorého sa vypočíta.';
$string['ordercheck'] = 'Kontrola poradia';
$string['ordercheck_help'] = 'Žiaci môžu stlačiť Skontrolovať poradie a uvidia, koľko riadkov je na svojom mieste, nikdy ktoré. Riadok je na mieste, keď patrí do najdlhšej spoločnej postupnosti ich riadkov a riadkov riešenia (v Pythone aj s rovnakým odsadením); medzery sa nepočítajú a riadky-pasce nie sú nikdy na mieste. S časťou hodnotenia: odpoveď, ktorá neprejde testami, dostane až polovicu bodov za riadky na mieste. Plné hodnotenie stále určujú testy.';
$string['ordercheck_off'] = 'Nie';
$string['ordercheck_on'] = 'Áno';
$string['ordercheck_partial'] = 'Áno, s časťou hodnotenia za poradie';
$string['ordercheckfailed'] = 'Poradie sa nepodarilo skontrolovať.';
$string['orderresult'] = 'Riadky na svojom mieste: {$a->placed} z {$a->total}';
$string['parsons'] = 'Parsonsova úloha';
$string['parsons_help'] = 'Žiaci program nepíšu: dostanú riadky riešenia zamiešané s klamlivými riadkami a usporiadajú ich (v Pythone aj so správnym odsadením). Program, ktorý zostavia, sa hodnotí testami ako zvyčajne.';
$string['parsons_label'] = 'Odpovedať usporiadaním riadkov riešenia';
$string['parsonsadd'] = 'Pridať do programu: {$a}';
$string['parsonsanswer'] = 'Váš program';
$string['parsonsdown'] = 'Posunúť nadol';
$string['parsonsgap'] = 'Medzera v riadku {$a}';
$string['parsonshint'] = 'Presuňte riadky do svojho programu v správnom poradí alebo kliknite na riadok, aby ste ho pridali na koniec. Niektoré riadky možno nie sú potrebné.';
$string['parsonsindent'] = 'Odsadiť';
$string['parsonsnosolution'] = 'Parsonsova úloha potrebuje riešenie: jeho riadky žiaci usporadúvajú.';
$string['parsonsoutdent'] = 'Zrušiť odsadenie';
$string['parsonspool'] = 'Riadky';
$string['parsonsprogram'] = 'Program zostavený z vašich riadkov (používajú ho Spustiť, Krok a testy):';
$string['parsonsremove'] = 'Späť medzi riadky';
$string['parsonsup'] = 'Posunúť nahor';
$string['passed'] = 'Prešiel';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Žiak píše program v editore kódu. S testami sa program spustí na serveri Jobe so vstupom každého testu a hodnotí sa podľa podielu testov so správnym výstupom. Bez testov ho hodnotí učiteľ.';
$string['pluginnameadding'] = 'Pridávanie otázky CodeLab';
$string['pluginnameediting'] = 'Úprava otázky CodeLab';
$string['pluginnamesummary'] = 'Žiak píše program v C, C++, Pythone, Jave alebo C#.';
$string['prefix'] = 'Kód pred';
$string['prefix_help'] = 'Kód pridaný pred program žiaka pri spustení, napríklad riadky #include alebo začiatok triedy. Žiaci ho v editore nevidia.';
$string['privacy:metadata:jobe'] = 'Odpovede sa posielajú na server Jobe nastavený správcom, aby sa spustili na testoch otázky. Samotné odpovede uchováva systém otázok.';
$string['privacy:metadata:jobe:code'] = 'Program, ktorý napísal žiak';
$string['privacy:metadata:jobe:stdin'] = 'Vstup testu';
$string['privacy:metadata:pyodide'] = 'Keď Python beží v prehliadači počas pokusu (Spustiť a Krok), prehliadač žiaka načíta Pyodide (interpret Pythonu) z adresy nastavenej správcom, predvolene z CDN jsDelivr. Neposiela sa žiadna odpoveď ani vstup.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP adresa prehliadača žiaka, ako pri každom sťahovaní';
$string['privacy:metadata:runner'] = 'Keď správca nastaví CodeLab runner (vlastný alebo hostovaný), odpovede sa posielajú tam, aby sa spustili na testoch otázky (SQL vždy, ostatné jazyky, keď je runner serverom na spúšťanie a hodnotenie), a Spustiť v pokuse tam spúšťa program, kým žiak píše vstup. Runner uchováva program len počas jeho behu. Samotné odpovede uchováva systém otázok.';
$string['privacy:metadata:runner:code'] = 'Program, ktorý napísal žiak';
$string['privacy:metadata:runner:stdin'] = 'Vstup testu alebo vstup, ktorý žiak píše';
$string['privacy:metadata:runner:userid'] = 'ID žiaka v podpísanom tokene pre Spustiť v pokuse, aby sa obmedzil počet programov, ktoré každý používateľ spúšťa súčasne';
$string['runtests'] = 'Spustiť testy';
$string['sandboxfailed'] = 'Program sa nepodarilo skontrolovať na serveri (Jobe). Ohodnotí ho váš učiteľ.';
$string['savefailing'] = 'Uložiť, aj keď riešenie neprejde testami';
$string['showtests'] = 'Testy v pokuse';
$string['showtests_desc'] = 'Žiaci môžu pred odovzdaním spustiť testy, ktoré nie sú skryté';
$string['solution'] = 'Riešenie';
$string['solution_help'] = 'Program učiteľa. Prázdne očakávané výstupy testov sa doplnia jeho spustením pri uložení otázky; žiaci ho pri prezeraní vidia ako správnu odpoveď.';
$string['solutioncheck'] = 'Kontrola riešenia';
$string['solutioncheck_help'] = 'Pri uložení otázky sa riešenie spustí na Jobe so vstupom každého testu, ktorý má očakávaný výstup, a otázka sa uloží, len ak prejde všetkými. Začiarknite toto políčko, ak chcete aj tak uložiť, napríklad keď ešte píšete testy. Keď Jobe nie je dosiahnuteľný, otázka sa uloží bez kontroly.';
$string['solutionfails'] = 'Riešenie neprejde týmto testom. Jeho výstup: {$a}';
$string['solutionis'] = 'Riešenie:';
$string['solutionnocompile'] = 'Riešenie sa nedá preložiť: {$a}';
$string['suffix'] = 'Kód za';
$string['suffix_help'] = 'Kód pridaný za program žiaka pri spustení, napríklad funkcia main, ktorá volá funkciu žiaka, alebo koniec triedy. Žiaci ho v editore nevidia.';
$string['template'] = 'Počiatočný kód';
$string['template_help'] = 'Kód, z ktorého žiaci začínajú v editore; môže byť prázdny.';
$string['test'] = 'Test';
$string['testcode'] = 'Kód testu';
$string['testcode_help'] = 'Kód spustený v tomto teste, napríklad volanie funkcie, ktorú píše žiak: <code>printf("%d\\n", sum(2, 3));</code> alebo <code>print(sum(2, 3))</code>. Môže byť prázdny.

* Ak kód za programom žiaka obsahuje značku <code>{{TEST}}</code>, napríklad vo funkcii main, ktorú píšete vy, kód testu príde na jej miesto.
* Inak program v C alebo C++ bez funkcie main dostane jednu: <code>int main(void) { test code return 0; }</code>.
* V ostatných jazykoch sa kód testu pridá na koniec programu.

Test môže mať aj vstup. Žiaci vidia kód testov, ktoré nie sú skryté.';
$string['testcoden'] = 'Test {no}: kód testu';
$string['testexpected'] = 'Očakávaný výstup';
$string['testfailed'] = 'Test {$a}: neprešiel';
$string['testgot'] = 'Výstup';
$string['testhidden'] = 'Skryté pred žiakmi';
$string['testinputn'] = 'Test {no}: vstup';
$string['testpassed'] = 'Test {$a}: prešiel';
$string['tests'] = 'Testy';
$string['tests_desc'] = 'Každý test dá programu vstup a porovná jeho výstup s očakávaným výstupom. Nechajte očakávaný výstup prázdny, aby sa vzal z riešenia. Bez testov odpovede hodnotí učiteľ.';
$string['testsof'] = 'Prejdených {$a->passed} z {$a->total} testov';
$string['teststdin'] = 'Vstup';
$string['testsummary'] = 'Prejdené testy: {$a->passed} z {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Váha';
$string['timelimit'] = 'Časový limit na test (s)';
$string['timelimit_help'] = 'Koľko sekúnd smie trvať jeden test: test, ktorý trvá dlhšie, neprejde ako príliš pomalý, aj keď je jeho výstup správny. Prázdne: bez limitu. Od 0.1 do 30. Iba CodeLab runner hlási, ako dlho test trval; na Jobe toto pole nemá účinok a jediným limitom je čas procesora. Čas sa meria na serveri a zahŕňa spustenie jazyka (asi 0.3 sekundy pre Javu a C#), preto nechajte rezervu nad časom dobrého riešenia.';
$string['tolerance'] = 'Tolerancia';
$string['tolerance_help'] = 'Pri porovnávaní čísel: najväčší rozdiel dvoch čísel, ktorý sa ešte považuje za rovnosť, absolútny alebo relatívny voči väčšiemu číslu. Pri 0.001 zodpovedá 3.1416 číslu 3.1414 a 1000.4 číslu 1000.';
$string['tooslow'] = 'Príliš pomalé: {$a->time} s, limit je {$a->limit} s';
