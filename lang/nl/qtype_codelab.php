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
 * Strings for component 'qtype_codelab', language 'nl'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = '{no} extra tests toevoegen';
$string['aihints'] = 'AI-uitleg';
$string['aihints_help'] = 'Wanneer AI-uitleg bij fouten van CodeLab voor TinyMCE door de beheerder is ingeschakeld, krijgen studenten een knop onder een compilermelding of fout in hun programma waarmee ze de AI van de site om uitleg kunnen vragen. De AI krijgt de instructie om nooit de oplossing te schrijven. Zonder deze optie wordt de knop nooit in een toets getoond.';
$string['aihints_label'] = 'Studenten mogen de AI vragen om een compilermelding of fout uit te leggen';
$string['answer'] = 'Programma';
$string['answerlabel'] = 'Jouw programma ({$a})';
$string['assist'] = 'Typhulp';
$string['badlimit'] = 'Geef een geheel getal van 1 tot {$a}, of laat leeg voor de standaardwaarde.';
$string['badregex'] = 'Dit is geen geldige reguliere expressie.';
$string['badtimelimit'] = 'Geef een aantal seconden van 0.1 tot 30, of laat leeg voor geen limiet.';
$string['badtolerance'] = 'Geef een getal van 0 of hoger, bijvoorbeeld 0.001.';
$string['bulkcheck'] = 'CodeLab-oplossingen controleren';
$string['bulkcheck_again'] = 'Opnieuw controleren';
$string['bulkcheck_bank'] = 'Vragenpool';
$string['bulkcheck_done'] = '{$a->total} vragen gecontroleerd: {$a->ok} slagen voor alle tests, {$a->problems} vragen aandacht.';
$string['bulkcheck_finished'] = 'Voltooid.';
$string['bulkcheck_intro'] = 'De oplossing van elk van de {$a} CodeLab-vragen in de vragenpools van deze cursus wordt één voor één op de Jobe-server uitgevoerd op de tests van de bijbehorende vraag. Vragen waarvan de oplossing faalt, niet compileert of ontbreekt staan bovenaan. Resultaten van eerder gecontroleerde oplossingen worden uit de cache gehaald.';
$string['bulkcheck_none'] = 'Er zijn geen CodeLab-vragen in de vragenpools van deze cursus.';
$string['bulkcheck_progress'] = 'Controleren {$a->done} van {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Resultaat';
$string['bulkcheck_start'] = 'Controle starten';
$string['cachedef_results'] = 'Resultaten van de tests van ingeleverde programma\'s';
$string['check_compile'] = 'Compileert niet';
$string['check_failed'] = 'Slaagt voor {$a->passed} van {$a->total} tests';
$string['check_jobe'] = 'Jobe kon het niet uitvoeren';
$string['check_nosolution'] = 'Geen oplossing';
$string['check_notests'] = 'Geen tests (beoordeeld door de docent)';
$string['check_ok'] = 'Slaagt voor alle tests ({$a->total})';
$string['checkfailed'] = 'Het programma kon niet op de server (Jobe) worden gecontroleerd, dus deze poging telt niet mee. Klik zo meteen opnieuw op Controleren.';
$string['checkorder'] = 'Volgorde controleren';
$string['classanalysis'] = 'Analyse';
$string['classanswers'] = 'Antwoorden';
$string['classempty'] = 'Nog geen antwoorden.';
$string['classemptyoutput'] = '(geen uitvoer)';
$string['classgrades'] = 'Cijfers (procent)';
$string['classhidenames'] = 'Namen verbergen';
$string['classmessages'] = 'Meest voorkomende compilermeldingen';
$string['classnotgraded'] = 'niet beoordeeld';
$string['classother'] = '{$a} antwoorden op andere versies van de vraag worden niet geanalyseerd.';
$string['classpending'] = 'Nog {$a} antwoorden worden gecontroleerd; de analyse wordt zo bijgewerkt.';
$string['classshownames'] = 'Namen tonen';
$string['classsimilar'] = 'Vergelijkbare inzendingen';
$string['classsimilarnote'] = 'Lokaal vergeleken op codestructuur (zonder variabelenamen, spaties, commentaar en startcode); bekijk de antwoorden zelf voordat je een oordeel velt.';
$string['classstudent'] = 'Student {$a}';
$string['classsummary'] = 'Antwoorden: {$a->answers} · compileren niet: {$a->compile} · fout in een test: {$a->runtime} · boven tijd- of geheugenlimiet: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: {$a->passed} van {$a->total} geslaagd';
$string['classtesthidden'] = 'Test {$a->n} (verborgen): {$a->passed} van {$a->total} geslaagd';
$string['classunchecked'] = '{$a} antwoorden konden niet door de server worden gecontroleerd.';
$string['classwork'] = 'Klaswerk';
$string['classwrong'] = 'Veelvoorkomende foute uitvoer:';
$string['codeheader'] = 'Code';
$string['compare'] = 'Uitvoer vergelijken';
$string['compare_help'] = 'Hoe de uitvoer van het programma wordt vergeleken met de verwachte uitvoer van elke test.

* **Exact**: elk teken telt mee.
* **Spaties aan het einde tellen niet mee**: spaties aan het einde van regels en lege regels aan het einde worden weggelaten.
* **Regels in willekeurige volgorde**: zoals de vorige, maar de regels mogen in elke volgorde staan, voor SQL-query\'s zonder ORDER BY.
* **Getallen met tolerantie**: de uitvoer wordt woord voor woord vergeleken, en twee getallen zijn gelijk als ze niet meer verschillen dan de tolerantie (absoluut, of relatief ten opzichte van het grootste getal). Spaties en regelovergangen tussen de woorden tellen niet mee.
* **Reguliere expressie**: de verwachte uitvoer van elke test is een reguliere expressie (PCRE) die met de hele uitvoer moet overeenkomen, bijvoorbeeld <code>Sum: [0-9]+</code>. Lege verwachte uitvoer wordt ingevuld vanuit de oplossing als patronen die alleen met die uitvoer overeenkomen.';
$string['comparison_exact'] = 'Exact';
$string['comparison_numbers'] = 'Getallen met tolerantie';
$string['comparison_regex'] = 'Reguliere expressie';
$string['comparison_spaces'] = 'Spaties aan het einde tellen niet mee';
$string['comparison_unordered'] = 'Regels in willekeurige volgorde (SQL-rijen)';
$string['compileerror'] = 'Het programma compileert niet:';
$string['cputime'] = 'CPU-tijdslimiet (seconden)';
$string['cputime_help'] = 'Maximale CPU-tijd van één uitvoering van een test bij het beoordelen van het antwoord. Leeg: de instelling van de CodeLab-editorplugin (5 seconden tenzij aangepast). Maximaal {$a} seconden (ingesteld door de beheerder). Uitvoeren en Tests uitvoeren tijdens de poging behouden de site-instelling.';
$string['distractors'] = 'Afleidingsregels';
$string['distractors_help'] = 'Regels die door de regels van de oplossing worden gemengd maar er niet bij horen, één per regel (bijvoorbeeld een verkeerde voorwaarde of een overbodige regel). Studenten die ze gebruiken slagen niet voor de tests.';
$string['failed'] = 'Gefaald';
$string['gaps'] = 'Invulvakken';
$string['gaps_help'] = 'Aantal expressies dat als invulvak wordt verborgen in de regels van een Parsons-probleem (0 voor alleen ordenen). Studenten vullen ze in terwijl ze de regels op volgorde zetten.';
$string['gaps_none'] = '0 (alleen ordenen)';
$string['hiddensummary'] = 'Verborgen tests geslaagd: {$a->passed} van {$a->total}';
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
$string['language'] = 'Programmeertaal';
$string['maxcputime'] = 'Maximale CPU-tijd van een vraag';
$string['maxcputime_desc'] = 'Vragen kunnen niet meer CPU-tijd bij Jobe aanvragen dan dit, in seconden per uitvoering.';
$string['maxmemory'] = 'Maximaal geheugen van een vraag';
$string['maxmemory_desc'] = 'Vragen kunnen niet meer geheugen bij Jobe aanvragen dan dit, in MB per uitvoering.';
$string['memorylimit'] = 'Geheugenlimiet (MB)';
$string['memorylimit_help'] = 'Maximaal geheugen van één uitvoering van een test bij het beoordelen van het antwoord. Leeg: de standaard van de Jobe-server. Maximaal {$a} MB (ingesteld door de beheerder). Een taal die meer nodig heeft om op te starten (JavaScript heeft 1000 MB nodig) krijgt wat nodig is. Op een CodeLab runner geldt deze limiet niet voor Java, C# en JavaScript: die krijgen daar altijd een heap van 256 MB.';
$string['noanswer'] = 'Schrijf eerst een programma.';
$string['noassist'] = 'Code-aanvulling en hints uitschakelen (voor toetsen)';
$string['noexpected'] = 'Geef de verwachte uitvoer op, of een oplossing om die mee te berekenen.';
$string['ordercheck'] = 'Volgorde controleren';
$string['ordercheck_help'] = 'Studenten kunnen op Volgorde controleren klikken om te zien hoeveel regels op de juiste plaats staan, nooit welke. Een regel staat op zijn plaats als deze hoort bij de langste gemeenschappelijke deelreeks van hun regels en de regels van de oplossing (in Python ook met dezelfde inspringing); spaties tellen niet mee en afleidingsregels staan nooit op hun plaats. Met deelcijfer: een antwoord dat faalt voor de tests krijgt tot de helft van de punten voor de regels op hun plaats. De tests bepalen nog steeds het volledige cijfer.';
$string['ordercheck_off'] = 'Nee';
$string['ordercheck_on'] = 'Ja';
$string['ordercheck_partial'] = 'Ja, met een deelcijfer voor de volgorde';
$string['ordercheckfailed'] = 'De volgorde kon niet worden gecontroleerd.';
$string['orderresult'] = 'Regels op de juiste plaats: {$a->placed} van {$a->total}';
$string['parsons'] = 'Parsons-probleem';
$string['parsons_help'] = 'Studenten schrijven het programma niet zelf: ze krijgen de regels van de oplossing door elkaar, samen met de afleidingsregels, en zetten ze in de juiste volgorde (in Python ook met de juiste inspringing). Het programma dat ze samenstellen wordt zoals gebruikelijk door de tests beoordeeld.';
$string['parsons_label'] = 'Beantwoorden door de regels van de oplossing in de juiste volgorde te zetten';
$string['parsonsadd'] = 'Toevoegen aan het programma: {$a}';
$string['parsonsanswer'] = 'Jouw programma';
$string['parsonsdown'] = 'Omlaag verplaatsen';
$string['parsonsgap'] = 'Invulvak op regel {$a}';
$string['parsonshint'] = 'Sleep de regels in de juiste volgorde naar jouw programma, of klik op een regel om die onderaan toe te voegen. Sommige regels zijn mogelijk niet nodig.';
$string['parsonsindent'] = 'Inspringen';
$string['parsonsnosolution'] = 'Een Parsons-probleem vereist een oplossing: de regels daarvan zijn wat studenten op volgorde zetten.';
$string['parsonsoutdent'] = 'Uitspringen';
$string['parsonspool'] = 'Regels';
$string['parsonsprogram'] = 'Het programma opgebouwd uit jouw regels (Uitvoeren, Stappen en de tests gebruiken dit):';
$string['parsonsremove'] = 'Terug naar de regels';
$string['parsonsup'] = 'Omhoog verplaatsen';
$string['passed'] = 'Geslaagd';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'De student schrijft een programma in een code-editor. Met tests wordt het programma op de Jobe-server uitgevoerd met de invoer van elke test en beoordeeld op het aandeel tests met de juiste uitvoer. Zonder tests beoordeelt de docent het antwoord.';
$string['pluginnameadding'] = 'Een CodeLab-vraag toevoegen';
$string['pluginnameediting'] = 'Een CodeLab-vraag bewerken';
$string['pluginnamesummary'] = 'De student schrijft een programma in C, C++, Python, Java of C#.';
$string['prefix'] = 'Code ervoor';
$string['prefix_help'] = 'Code die vóór het programma van de student wordt toegevoegd bij het uitvoeren, bijvoorbeeld #include-regels of het begin van een klasse. Studenten zien dit niet in de editor.';
$string['privacy:metadata:jobe'] = 'Antwoorden worden naar de door de beheerder ingestelde Jobe-server gestuurd om te worden uitgevoerd op de tests van de vraag. De antwoorden zelf worden bewaard door de vragenengine.';
$string['privacy:metadata:jobe:code'] = 'Het programma dat de student schreef';
$string['privacy:metadata:jobe:stdin'] = 'De invoer van een test';
$string['privacy:metadata:pyodide'] = 'Wanneer Python tijdens een poging in de browser draait (Uitvoeren en Stappen), laadt de browser van de student Pyodide (de Python-interpreter) vanaf het door de beheerder ingestelde adres, standaard de jsDelivr CDN. Er worden geen antwoorden of invoer verzonden.';
$string['privacy:metadata:pyodide:ipaddress'] = 'Het IP-adres van de browser van de student, zoals bij elke download';
$string['privacy:metadata:runner'] = 'Wanneer de beheerder een CodeLab runner instelt (eigen of gehost), worden antwoorden daarnaartoe gestuurd om op de tests van de vraag uit te voeren (SQL altijd, andere talen wanneer de runner de server voor uitvoeren en beoordelen is), en Uitvoeren in de poging draait het programma daar terwijl de student invoer typt. De runner bewaart een programma alleen terwijl het draait. De antwoorden zelf worden bewaard door de vragenengine.';
$string['privacy:metadata:runner:code'] = 'Het programma dat de student schreef';
$string['privacy:metadata:runner:stdin'] = 'De invoer van een test, of de invoer die de student typt';
$string['privacy:metadata:runner:userid'] = 'De gebruikers-ID van de student, in een ondertekend token voor Uitvoeren tijdens de poging, om het aantal gelijktijdige programma\'s per gebruiker te beperken';
$string['runtests'] = 'Tests uitvoeren';
$string['sandboxfailed'] = 'Het programma kon niet op de server (Jobe) worden gecontroleerd. Je docent zal het beoordelen.';
$string['savefailing'] = 'Opslaan ook al faalt de oplossing voor de tests';
$string['showtests'] = 'Tests tijdens de poging';
$string['showtests_desc'] = 'Studenten kunnen de niet-verborgen tests uitvoeren voordat ze inleveren';
$string['solution'] = 'Oplossing';
$string['solution_help'] = 'Het programma van de docent. Lege verwachte uitvoer van de tests wordt ingevuld door het uit te voeren bij het opslaan van de vraag; studenten zien het als het juiste antwoord bij het nakijken.';
$string['solutioncheck'] = 'Controle van de oplossing';
$string['solutioncheck_help'] = 'Bij het opslaan van de vraag wordt de oplossing op Jobe uitgevoerd met de invoer van elke test die een verwachte uitvoer heeft, en wordt de vraag alleen opgeslagen als alle tests slagen. Vink dit aan om toch op te slaan, bijvoorbeeld terwijl je de tests nog schrijft. Als Jobe niet bereikbaar is, wordt de vraag zonder controle opgeslagen.';
$string['solutionfails'] = 'De oplossing faalt voor deze test. Uitvoer: {$a}';
$string['solutionis'] = 'Een oplossing:';
$string['solutionnocompile'] = 'De oplossing compileert niet: {$a}';
$string['suffix'] = 'Code erna';
$string['suffix_help'] = 'Code die na het programma van de student wordt toegevoegd bij het uitvoeren, bijvoorbeeld een main-functie die de functie van de student aanroept, of het einde van een klasse. Studenten zien dit niet in de editor.';
$string['template'] = 'Startcode';
$string['template_help'] = 'Code waarmee studenten in de editor beginnen; mag leeg zijn.';
$string['test'] = 'Test';
$string['testcode'] = 'Testcode';
$string['testcode_help'] = 'Code die in deze test wordt uitgevoerd, bijvoorbeeld een aanroep van de functie die de student schrijft: <code>printf("%d\\n", sum(2, 3));</code> of <code>print(sum(2, 3))</code>. Mag leeg zijn.

* Als de code na het programma van de student de markering <code>{{TEST}}</code> bevat, bijvoorbeeld binnen een main die je zelf schrijft, komt de testcode op die plaats.
* Anders krijgt een C- of C++-programma zonder main er automatisch een: <code>int main(void) { test code return 0; }</code>.
* In andere talen wordt de testcode aan het einde van het programma toegevoegd.

De test kan ook invoer hebben. Studenten zien de testcode van de niet-verborgen tests.';
$string['testcoden'] = 'Test {no}: testcode';
$string['testexpected'] = 'Verwachte uitvoer';
$string['testfailed'] = 'Test {$a}: gefaald';
$string['testgot'] = 'Uitvoer';
$string['testhidden'] = 'Verborgen voor studenten';
$string['testinputn'] = 'Test {no}: invoer';
$string['testpassed'] = 'Test {$a}: geslaagd';
$string['tests'] = 'Tests';
$string['tests_desc'] = 'Elke test geeft het programma een invoer en vergelijkt de uitvoer met de verwachte uitvoer. Laat de verwachte uitvoer leeg om deze uit de oplossing te halen. Zonder tests beoordeelt de docent de antwoorden.';
$string['testsof'] = '{$a->passed} van {$a->total} tests geslaagd';
$string['teststdin'] = 'Invoer';
$string['testsummary'] = 'Geslaagde tests: {$a->passed} van {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Gewicht';
$string['timelimit'] = 'Tijdslimiet per test (s)';
$string['timelimit_help'] = 'Aantal seconden dat één test mag duren: een test die langer draait faalt als te traag, ook wanneer de uitvoer juist is. Leeg: geen limiet. Van 0.1 tot 30. Alleen de CodeLab runner meldt hoe lang een test duurde; op Jobe heeft dit veld geen effect en geldt alleen de CPU-tijdslimiet. De tijd wordt op de server gemeten en omvat het opstarten van de taal (ongeveer 0,3 seconden voor Java en C#), dus laat ruimte boven de tijd van een goede oplossing.';
$string['tolerance'] = 'Tolerantie';
$string['tolerance_help'] = 'Voor het vergelijken van getallen: het grootste verschil tussen twee getallen dat nog als gelijk telt, absoluut of relatief ten opzichte van het grootste getal. Met 0.001 komt 3.1416 overeen met 3.1414 en 1000.4 met 1000.';
$string['tooslow'] = 'Te traag: {$a->time} s, de limiet is {$a->limit} s';
