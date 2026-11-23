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
 * Strings for component 'qtype_codelab', language 'cs' (Czech).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Přidat dalších {no} testů';
$string['aihints'] = 'Vysvětlení AI';
$string['aihints_help'] = 'Když správce zapne vysvětlení chyb pomocí AI v CodeLab pro TinyMCE, žáci dostanou pod zprávou překladače nebo chybou svého programu tlačítko, které požádá AI webu o její vysvětlení. AI má pokyn nikdy nenapsat opravu. Bez této volby se tlačítko v testu nikdy nezobrazí.';
$string['aihints_label'] = 'Žáci mohou požádat AI o vysvětlení zprávy překladače nebo chyby';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Váš program ({$a})';
$string['assist'] = 'Nápověda při psaní';
$string['badlimit'] = 'Zadejte celé číslo od 1 do {$a} nebo nechte prázdné pro výchozí hodnotu.';
$string['badregex'] = 'Toto není platný regulární výraz.';
$string['badtimelimit'] = 'Zadejte počet sekund od 0.1 do 30 nebo nechte prázdné pro žádný limit.';
$string['badtolerance'] = 'Zadejte číslo 0 nebo větší, například 0.001.';
$string['bulkcheck'] = 'Zkontrolovat řešení CodeLab';
$string['bulkcheck_again'] = 'Zkontrolovat znovu';
$string['bulkcheck_bank'] = 'Banka úloh';
$string['bulkcheck_done'] = 'Zkontrolované úlohy: {$a->total}; {$a->ok} projde všemi svými testy, {$a->problems} vyžaduje pozornost.';
$string['bulkcheck_finished'] = 'Hotovo.';
$string['bulkcheck_intro'] = 'Řešení každé z {$a} úloh CodeLab v bankách úloh tohoto kurzu se spustí na serveru Jobe na testech své úlohy, jedno po druhém. Úlohy, jejichž řešení neprojde, nepřeloží se nebo chybí, jsou uvedeny nejdříve. Výsledky již zkontrolovaných řešení se berou z mezipaměti.';
$string['bulkcheck_none'] = 'V bankách úloh tohoto kurzu nejsou žádné úlohy CodeLab.';
$string['bulkcheck_progress'] = 'Kontroluji {$a->done} z {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Výsledek';
$string['bulkcheck_start'] = 'Spustit kontrolu';
$string['cachedef_results'] = 'Výsledky testů odevzdaných programů';
$string['check_compile'] = 'Nelze přeložit';
$string['check_failed'] = 'Projde {$a->passed} z {$a->total} testů';
$string['check_jobe'] = 'Jobe ho nemohl spustit';
$string['check_nosolution'] = 'Bez řešení';
$string['check_notests'] = 'Bez testů (hodnotí učitel)';
$string['check_ok'] = 'Projde všemi testy ({$a->total})';
$string['checkfailed'] = 'Program se nepodařilo zkontrolovat na serveru (Jobe), proto se tento pokus nepočítá. Za chvíli znovu stiskněte Zkontrolovat.';
$string['checkorder'] = 'Zkontrolovat pořadí';
$string['classanalysis'] = 'Analýza';
$string['classanswers'] = 'Odpovědi';
$string['classempty'] = 'Zatím žádné odpovědi.';
$string['classemptyoutput'] = '(žádný výstup)';
$string['classgrades'] = 'Hodnocení (procenta)';
$string['classhidenames'] = 'Skrýt jména';
$string['classmessages'] = 'Nejčastější zprávy překladače';
$string['classnotgraded'] = 'nehodnoceno';
$string['classother'] = '{$a} odpovědí na jiné verze úlohy se neanalyzuje.';
$string['classpending'] = 'Kontroluje se ještě {$a} odpovědí; analýza se za chvíli rozšíří.';
$string['classshownames'] = 'Zobrazit jména';
$string['classsimilar'] = 'Podobná odevzdání';
$string['classsimilarnote'] = 'Porovnáno lokálně podle struktury kódu (bez názvů proměnných, mezer, komentářů a výchozího kódu); před rozhodnutím odpovědi zkontrolujte.';
$string['classstudent'] = 'Žák {$a}';
$string['classsummary'] = 'Odpovědi: {$a->answers} · nelze přeložit: {$a->compile} · chyba v testu: {$a->runtime} · nad limitem času nebo paměti: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: projde {$a->passed} z {$a->total}';
$string['classtesthidden'] = 'Test {$a->n} (skrytý): projde {$a->passed} z {$a->total}';
$string['classunchecked'] = 'Server nemohl zkontrolovat {$a} odpovědí.';
$string['classwork'] = 'Práce třídy';
$string['classwrong'] = 'Časté nesprávné výstupy:';
$string['codeheader'] = 'Kód';
$string['compare'] = 'Porovnání výstupu';
$string['compare_help'] = 'Jak se výstup programu porovnává s očekávaným výstupem každého testu.

* **Přesně**: počítá se každý znak.
* **Mezery na konci se nepočítají**: mezery na konci řádků a prázdné řádky na konci se vynechají.
* **Řádky v libovolném pořadí**: jako předchozí, ale řádky mohou přijít v libovolném pořadí, pro dotazy SQL bez ORDER BY.
* **Čísla s tolerancí**: výstupy se porovnávají slovo po slově a dvě čísla jsou stejná, když se neliší víc než o toleranci (absolutní nebo relativní vůči většímu číslu). Mezery a konce řádků mezi slovy se nepočítají.
* **Regulární výraz**: očekávaný výstup každého testu je regulární výraz (PCRE), který musí odpovídat celému výstupu, například <code>Sum: [0-9]+</code>. Prázdné očekávané výstupy se doplní z řešení vzory, které odpovídají jen tomuto výstupu.';
$string['comparison_exact'] = 'Přesně';
$string['comparison_numbers'] = 'Čísla s tolerancí';
$string['comparison_regex'] = 'Regulární výraz';
$string['comparison_spaces'] = 'Mezery na konci se nepočítají';
$string['comparison_unordered'] = 'Řádky v libovolném pořadí (řádky SQL)';
$string['compileerror'] = 'Program nelze přeložit:';
$string['cputime'] = 'Časový limit procesoru (sekundy)';
$string['cputime_help'] = 'Největší čas procesoru jednoho spuštění testu při hodnocení odpovědi. Prázdné: nastavení modulu editoru CodeLab (5 sekund, pokud nebylo změněno). Nejvýše {$a} sekund (určuje správce). Spustit a Spustit testy v pokusu si ponechávají nastavení webu.';
$string['distractors'] = 'Klamné řádky';
$string['distractors_help'] = 'Řádky, které se zamíchají mezi řádky řešení, ale nepatří do něj, jeden na řádek (například špatná podmínka nebo zbytečný řádek). Žáci, kteří je použijí, neprojdou testy.';
$string['failed'] = 'Neprošel';
$string['gaps'] = 'Mezery k doplnění';
$string['gaps_help'] = 'Počet výrazů skrytých jako mezery v řádcích Parsonsovy úlohy (0 pouze řazení). Studenti je doplňují při řazení řádků.';
$string['gaps_none'] = '0 (pouze řazení)';
$string['hiddensummary'] = 'Prošlé skryté testy: {$a->passed} z {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Programovací jazyk';
$string['maxcputime'] = 'Největší čas procesoru úlohy';
$string['maxcputime_desc'] = 'Úlohy nemohou od Jobe žádat víc času procesoru než tento, v sekundách na spuštění.';
$string['maxmemory'] = 'Největší paměť úlohy';
$string['maxmemory_desc'] = 'Úlohy nemohou od Jobe žádat víc paměti než tuto, v MB na spuštění.';
$string['memorylimit'] = 'Limit paměti (MB)';
$string['memorylimit_help'] = 'Největší paměť jednoho spuštění testu při hodnocení odpovědi. Prázdné: výchozí hodnota serveru Jobe. Nejvýše {$a} MB (určuje správce). Jazyk, který ke spuštění potřebuje víc (JavaScript potřebuje 1000 MB), dostane, co potřebuje. Na CodeLab runner tento limit neplatí pro Javu, C# a JavaScript: tam vždy dostanou haldu 256 MB.';
$string['noanswer'] = 'Nejprve napište program.';
$string['noassist'] = 'Vypnout doplňování kódu a rady (pro testy)';
$string['noexpected'] = 'Zadejte očekávaný výstup nebo řešení, ze kterého se vypočítá.';
$string['ordercheck'] = 'Kontrola pořadí';
$string['ordercheck_help'] = 'Žáci mohou stisknout Zkontrolovat pořadí a uvidí, kolik řádků je na svém místě, nikdy které. Řádek je na místě, když patří do nejdelší společné posloupnosti jejich řádků a řádků řešení (v Pythonu i se stejným odsazením); mezery se nepočítají a řádky-pasti nejsou nikdy na místě. S částí hodnocení: odpověď, která neprojde testy, dostane až polovinu bodů za řádky na místě. Plné hodnocení stále určují testy.';
$string['ordercheck_off'] = 'Ne';
$string['ordercheck_on'] = 'Ano';
$string['ordercheck_partial'] = 'Ano, s částí hodnocení za pořadí';
$string['ordercheckfailed'] = 'Pořadí se nepodařilo zkontrolovat.';
$string['orderresult'] = 'Řádky na svém místě: {$a->placed} z {$a->total}';
$string['parsons'] = 'Parsonsova úloha';
$string['parsons_help'] = 'Žáci program nepíšou: dostanou řádky řešení zamíchané s klamnými řádky a seřadí je (v Pythonu také se správným odsazením). Program, který sestaví, se hodnotí testy jako obvykle.';
$string['parsons_label'] = 'Odpovídat seřazením řádků řešení';
$string['parsonsadd'] = 'Přidat do programu: {$a}';
$string['parsonsanswer'] = 'Váš program';
$string['parsonsdown'] = 'Posunout dolů';
$string['parsonsgap'] = 'Mezera na řádku {$a}';
$string['parsonshint'] = 'Přetáhněte řádky do svého programu ve správném pořadí nebo klikněte na řádek, abyste ho přidali na konec. Některé řádky možná nejsou potřeba.';
$string['parsonsindent'] = 'Odsadit';
$string['parsonsnosolution'] = 'Parsonsova úloha potřebuje řešení: jeho řádky žáci řadí.';
$string['parsonsoutdent'] = 'Zrušit odsazení';
$string['parsonspool'] = 'Řádky';
$string['parsonsprogram'] = 'Program sestavený z vašich řádků (používají ho Spustit, Krok a testy):';
$string['parsonsremove'] = 'Zpět mezi řádky';
$string['parsonsup'] = 'Posunout nahoru';
$string['passed'] = 'Prošel';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Žák píše program v editoru kódu. S testy se program spustí na serveru Jobe se vstupem každého testu a hodnotí se podle podílu testů se správným výstupem. Bez testů ho hodnotí učitel.';
$string['pluginnameadding'] = 'Přidávání úlohy CodeLab';
$string['pluginnameediting'] = 'Úprava úlohy CodeLab';
$string['pluginnamesummary'] = 'Žák píše program v C, C++, Pythonu, Javě nebo C#.';
$string['prefix'] = 'Kód před';
$string['prefix_help'] = 'Kód přidaný před program žáka při spuštění, například řádky #include nebo začátek třídy. Žáci ho v editoru nevidí.';
$string['privacy:metadata:jobe'] = 'Odpovědi se posílají na server Jobe nastavený správcem, aby se spustily na testech úlohy. Samotné odpovědi uchovává systém úloh.';
$string['privacy:metadata:jobe:code'] = 'Program, který napsal žák';
$string['privacy:metadata:jobe:stdin'] = 'Vstup testu';
$string['privacy:metadata:pyodide'] = 'Když Python běží v prohlížeči během pokusu (Spustit a Krok), prohlížeč žáka načte Pyodide (interpret Pythonu) z adresy nastavené správcem, ve výchozím stavu z CDN jsDelivr. Neposílá se žádná odpověď ani vstup.';
$string['privacy:metadata:pyodide:ipaddress'] = 'IP adresa prohlížeče žáka, jako při každém stahování';
$string['privacy:metadata:runner'] = 'Když správce nastaví CodeLab runner (vlastní nebo hostovaný), odpovědi se posílají tam, aby se spustily na testech úlohy (SQL vždy, ostatní jazyky, když je runner serverem pro spouštění a hodnocení), a Spustit v pokusu tam spouští program, zatímco žák píše vstup. Runner uchovává program jen po dobu jeho běhu. Samotné odpovědi uchovává systém úloh.';
$string['privacy:metadata:runner:code'] = 'Program, který napsal žák';
$string['privacy:metadata:runner:stdin'] = 'Vstup testu nebo vstup, který žák píše';
$string['privacy:metadata:runner:userid'] = 'ID žáka v podepsaném tokenu pro Spustit v pokusu, aby se omezil počet programů, které každý uživatel spouští současně';
$string['runtests'] = 'Spustit testy';
$string['sandboxfailed'] = 'Program se nepodařilo zkontrolovat na serveru (Jobe). Ohodnotí ho váš učitel.';
$string['savefailing'] = 'Uložit, i když řešení neprojde testy';
$string['showtests'] = 'Testy v pokusu';
$string['showtests_desc'] = 'Žáci mohou před odevzdáním spustit testy, které nejsou skryté';
$string['solution'] = 'Řešení';
$string['solution_help'] = 'Program učitele. Prázdné očekávané výstupy testů se doplní jeho spuštěním při uložení úlohy; žáci ho při prohlídce vidí jako správnou odpověď.';
$string['solutioncheck'] = 'Kontrola řešení';
$string['solutioncheck_help'] = 'Při uložení úlohy se řešení spustí na Jobe se vstupem každého testu, který má očekávaný výstup, a úloha se uloží, jen pokud projde všemi. Zaškrtněte toto políčko, chcete-li přesto uložit, například když ještě píšete testy. Když Jobe není dosažitelný, úloha se uloží bez kontroly.';
$string['solutionfails'] = 'Řešení tímto testem neprojde. Jeho výstup: {$a}';
$string['solutionis'] = 'Řešení:';
$string['solutionnocompile'] = 'Řešení nelze přeložit: {$a}';
$string['suffix'] = 'Kód za';
$string['suffix_help'] = 'Kód přidaný za program žáka při spuštění, například funkce main, která volá funkci žáka, nebo konec třídy. Žáci ho v editoru nevidí.';
$string['template'] = 'Počáteční kód';
$string['template_help'] = 'Kód, ze kterého žáci začínají v editoru; může být prázdný.';
$string['test'] = 'Test';
$string['testcode'] = 'Kód testu';
$string['testcode_help'] = 'Kód spuštěný v tomto testu, například volání funkce, kterou píše žák: <code>printf("%d\\n", sum(2, 3));</code> nebo <code>print(sum(2, 3))</code>. Může být prázdný.

* Pokud kód za programem žáka obsahuje značku <code>{{TEST}}</code>, například ve funkci main, kterou píšete vy, kód testu přijde na její místo.
* Jinak program v C nebo C++ bez funkce main dostane jednu: <code>int main(void) { test code return 0; }</code>.
* V ostatních jazycích se kód testu přidá na konec programu.

Test může mít i vstup. Žáci vidí kód testů, které nejsou skryté.';
$string['testcoden'] = 'Test {no}: kód testu';
$string['testexpected'] = 'Očekávaný výstup';
$string['testfailed'] = 'Test {$a}: neprošel';
$string['testgot'] = 'Výstup';
$string['testhidden'] = 'Skryté před žáky';
$string['testinputn'] = 'Test {no}: vstup';
$string['testpassed'] = 'Test {$a}: prošel';
$string['tests'] = 'Testy';
$string['tests_desc'] = 'Každý test dá programu vstup a porovná jeho výstup s očekávaným výstupem. Nechte očekávaný výstup prázdný, aby se vzal z řešení. Bez testů odpovědi hodnotí učitel.';
$string['testsof'] = 'Prošlo {$a->passed} z {$a->total} testů';
$string['teststdin'] = 'Vstup';
$string['testsummary'] = 'Prošlé testy: {$a->passed} z {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Váha';
$string['timelimit'] = 'Časový limit na test (s)';
$string['timelimit_help'] = 'Kolik sekund smí trvat jeden test: test, který trvá déle, neprojde jako příliš pomalý, i když je jeho výstup správný. Prázdné: bez limitu. Od 0.1 do 30. Pouze CodeLab runner hlásí, jak dlouho test trval; na Jobe toto pole nemá účinek a jediným limitem je čas procesoru. Čas se měří na serveru a zahrnuje spuštění jazyka (asi 0.3 sekundy pro Javu a C#), proto nechte rezervu nad časem dobrého řešení.';
$string['tolerance'] = 'Tolerance';
$string['tolerance_help'] = 'Při porovnávání čísel: největší rozdíl dvou čísel, který se ještě považuje za rovnost, absolutní nebo relativní vůči většímu číslu. Při 0.001 odpovídá 3.1416 číslu 3.1414 a 1000.4 číslu 1000.';
$string['tooslow'] = 'Příliš pomalé: {$a->time} s, limit je {$a->limit} s';
