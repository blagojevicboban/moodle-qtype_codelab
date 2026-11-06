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
$string['answer'] = 'Program';
$string['answerlabel'] = 'Vaš program ({$a})';
$string['assist'] = 'Pomoć pri kucanju';
$string['cachedef_results'] = 'Rezultati testova predatih programa';
$string['codeheader'] = 'Kod';
$string['compare'] = 'Poređenje izlaza';
$string['compileerror'] = 'Program ne može da se prevede:';
$string['failed'] = 'Nije prošao';
$string['hiddentest'] = 'Skriven test';
$string['ignorespaces'] = 'Razmaci na kraju redova i prazni redovi na kraju se ne računaju';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Programski jezik';
$string['noanswer'] = 'Najpre napišite program.';
$string['noassist'] = 'Isključi dopunjavanje koda i savete (za kontrolne zadatke)';
$string['noexpected'] = 'Upišite očekivani izlaz ili rešenje iz kog će se izračunati.';
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
$string['runtests'] = 'Pokreni testove';
$string['sandboxfailed'] = 'Program nije mogao da se proveri na serveru (Jobe). Oceniće ga nastavnik.';
$string['showtests'] = 'Testovi u pokušaju';
$string['showtests_desc'] = 'Učenici mogu da pokrenu testove koji nisu skriveni pre predaje';
$string['solution'] = 'Rešenje';
$string['solution_help'] = 'Nastavnikov program. Prazni očekivani izlazi testova popunjavaju se njegovim izvršavanjem pri čuvanju pitanja; učenici ga u pregledu vide kao tačan odgovor.';
$string['solutionis'] = 'Jedno rešenje:';
$string['suffix'] = 'Kod iza';
$string['suffix_help'] = 'Kod koji se dodaje iza učenikovog programa pri izvršavanju, na primer funkcija main koja poziva učenikovu funkciju ili kraj klase. Učenici ga ne vide u editoru.';
$string['template'] = 'Početni kod';
$string['template_help'] = 'Kod od kog učenici počinju u editoru; može da bude prazan.';
$string['test'] = 'Test';
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
$string['testweight'] = 'Težina';
