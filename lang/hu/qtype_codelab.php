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
 * Strings for component 'qtype_codelab', language 'hu'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'További {no} teszt hozzáadása';
$string['aihints'] = 'AI-magyarázatok';
$string['aihints_help'] = 'Ha a rendszergazda bekapcsolta a hibák AI-magyarázatát a TinyMCE CodeLab bővítményében, a tanulók egy fordítóüzenet vagy programhiba alatt kapnak egy gombot, amellyel a portál AI-jától kérhetnek magyarázatot. Az AI utasítást kap, hogy soha ne írja meg a javítást. Ezen opció nélkül a gomb soha nem jelenik meg a kvízben.';
$string['aihints_label'] = 'A tanulók kérhetik az AI-tól egy fordítóüzenet vagy hiba magyarázatát';
$string['answer'] = 'Program';
$string['answerlabel'] = 'A programod ({$a})';
$string['assist'] = 'Gépelési segítség';
$string['badlimit'] = 'Adj meg egy egész számot 1 és {$a} között, vagy hagyd üresen az alapértelmezett értékhez.';
$string['badregex'] = 'Ez nem érvényes reguláris kifejezés.';
$string['badtimelimit'] = 'Adj meg egy másodpercértéket 0.1 és 30 között, vagy hagyd üresen, ha nincs korlát.';
$string['badtolerance'] = 'Adj meg 0 vagy annál nagyobb számot, például 0.001.';
$string['bulkcheck'] = 'CodeLab megoldások ellenőrzése';
$string['bulkcheck_again'] = 'Újraellenőrzés';
$string['bulkcheck_bank'] = 'Kérdésbank';
$string['bulkcheck_done'] = '{$a->total} kérdés ellenőrizve: {$a->ok} minden teszten átment, {$a->problems} figyelmet igényel.';
$string['bulkcheck_finished'] = 'Befejezve.';
$string['bulkcheck_intro'] = 'A kurzus kérdésbankjaiban lévő mind a(z) {$a} CodeLab-kérdés megoldása egyesével lefut a Jobe szerveren a kérdés tesztjein. Elöl jelennek meg azok a kérdések, amelyek megoldása megbukik, nem fordul le vagy hiányzik. A korábban ellenőrzött megoldások eredményei a gyorsítótárból érkeznek.';
$string['bulkcheck_none'] = 'Nincsenek CodeLab-kérdések a kurzus kérdésbankjaiban.';
$string['bulkcheck_progress'] = 'Ellenőrzés: {$a->done} / {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Eredmény';
$string['bulkcheck_start'] = 'Ellenőrzés indítása';
$string['cachedef_results'] = 'Beküldött programok teszteredményei';
$string['check_compile'] = 'Nem fordul le';
$string['check_failed'] = '{$a->passed} / {$a->total} teszten ment át';
$string['check_jobe'] = 'A Jobe nem tudta futtatni';
$string['check_nosolution'] = 'Nincs megoldás';
$string['check_notests'] = 'Nincsenek tesztek (a tanár értékeli)';
$string['check_ok'] = 'Minden teszten átment ({$a->total})';
$string['checkfailed'] = 'A programot nem sikerült ellenőrizni a szerveren (Jobe), ezért ez a próbálkozás nem számít bele. Nyomd meg újra az Ellenőrzés gombot egy pillanat múlva.';
$string['checkorder'] = 'Sorrend ellenőrzése';
$string['classanalysis'] = 'Elemzés';
$string['classanswers'] = 'Válaszok';
$string['classempty'] = 'Még nincsenek válaszok.';
$string['classemptyoutput'] = '(nincs kimenet)';
$string['classgrades'] = 'Eredmények (százalék)';
$string['classhidenames'] = 'Nevek elrejtése';
$string['classmessages'] = 'Leggyakoribb fordítóüzenetek';
$string['classnotgraded'] = 'nincs értékelve';
$string['classother'] = 'A kérdés más verzióira adott {$a} válasz nincs elemezve.';
$string['classpending'] = 'További {$a} válasz ellenőrzése folyamatban van; az elemzés hamarosan bővül.';
$string['classshownames'] = 'Nevek megjelenítése';
$string['classsimilar'] = 'Hasonló beadások';
$string['classsimilarnote'] = 'Helyileg, a kódszerkezet alapján összehasonlítva (a változónevek, szóközök, megjegyzések és a kezdőkód figyelmen kívül hagyásával); döntés előtt vizsgáld meg a válaszokat.';
$string['classstudent'] = '{$a}. tanuló';
$string['classsummary'] = 'Válaszok: {$a->answers} · nem fordul le: {$a->compile} · hiba teszt közben: {$a->runtime} · idő- vagy memóriakorlát túllépve: {$a->timelimit}';
$string['classtest'] = '{$a->n}. teszt: {$a->passed} / {$a->total} sikeres';
$string['classtesthidden'] = '{$a->n}. teszt (rejtett): {$a->passed} / {$a->total} sikeres';
$string['classunchecked'] = '{$a} választ nem tudott ellenőrizni a szerver.';
$string['classwork'] = 'Osztálymunka';
$string['classwrong'] = 'Gyakori hibás kimenetek:';
$string['codeheader'] = 'Kód';
$string['compare'] = 'Kimenet összehasonlítása';
$string['compare_help'] = 'Hogyan hasonlítja össze a program kimenetét az egyes tesztek elvárt kimenetével.

* **Pontosan**: minden karakter számít.
* **A sorvégi szóközök nem számítanak**: a sorok végi szóközök és a végső üres sorok figyelmen kívül maradnak.
* **Sorok tetszőleges sorrendben**: mint az előző, de a sorok tetszőleges sorrendben szerepelhetnek, ORDER BY nélküli SQL-lekérdezésekhez.
* **Számok tűréshatárral**: a kimenetek szavanként hasonlítódnak össze, és két szám egyenlőnek számít, ha legfeljebb a tűréshatárral térnek el (abszolút értelemben, vagy a nagyobb számhoz viszonyítva). A szavak közötti szóközök és sortörések nem számítanak.
* **Reguláris kifejezés**: minden teszt elvárt kimenete egy reguláris kifejezés (PCRE), amelynek a teljes kimenetre illeszkednie kell, például <code>Sum: [0-9]+</code>. Az üres elvárt kimenetek a megoldásból töltődnek fel csak arra a kimenetre illeszkedő mintaként.';
$string['comparison_exact'] = 'Pontosan';
$string['comparison_numbers'] = 'Számok tűréshatárral';
$string['comparison_regex'] = 'Reguláris kifejezés';
$string['comparison_spaces'] = 'A sorvégi szóközök nem számítanak';
$string['comparison_unordered'] = 'Sorok tetszőleges sorrendben (SQL sorok)';
$string['compileerror'] = 'A program nem fordul le:';
$string['cputime'] = 'CPU-időkorlát (másodperc)';
$string['cputime_help'] = 'Egy teszt futtatásának legnagyobb CPU-ideje a válasz értékelésekor. Üresen hagyva a CodeLab szerkesztő bővítmény beállítása érvényes (alapértelmezésben 5 másodperc). Legfeljebb {$a} másodperc (a rendszergazda által beállítva). A próbálkozás közbeni Futtatás és Tesztek futtatása megtartja a portál beállítását.';
$string['distractors'] = 'Zavaró sorok';
$string['distractors_help'] = 'A megoldás sorai közé kevert sorok, amelyek nem tartoznak a megoldáshoz, soronként egy (például hibás feltétel vagy felesleges sor). Azok a tanulók, akik felhasználják őket, nem mennek át a teszteken.';
$string['failed'] = 'Sikertelen';
$string['gaps'] = 'Kitöltendő mezők';
$string['gaps_help'] = 'A Parsons-feladat soraiban kitöltendő mezőként elrejtett kifejezések száma (0 esetén csak sorba rendezés). A tanulók a sorok rendezése közben töltik ki őket.';
$string['gaps_none'] = '0 (csak sorba rendezés)';
$string['hiddensummary'] = 'Sikeres rejtett tesztek: {$a->passed} / {$a->total}';
$string['lang_bash'] = 'Bash';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_dart'] = 'Dart';
$string['lang_elixir'] = 'Elixir';
$string['lang_go'] = 'Go';
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
$string['language'] = 'Programozási nyelv';
$string['maxcputime'] = 'Kérdés legnagyobb CPU-ideje';
$string['maxcputime_desc'] = 'A kérdések ennél több CPU-időt nem kérhetnek a Jobe szervertől futtatásonként, másodpercben.';
$string['maxmemory'] = 'Kérdés legnagyobb memóriája';
$string['maxmemory_desc'] = 'A kérdések ennél több memóriát nem kérhetnek a Jobe szervertől futtatásonként, MB-ban.';
$string['memorylimit'] = 'Memóriakorlát (MB)';
$string['memorylimit_help'] = 'Egy teszt futtatásának legnagyobb memóriája a válasz értékelésekor. Üresen hagyva a Jobe szerver alapértelmezése érvényes. Legfeljebb {$a} MB (a rendszergazda által beállítva). Az induláshoz több memóriát igénylő nyelvek (a JavaScript 1000 MB-ot igényel) megkapják a szükséges mennyiséget. A CodeLab futtatón ez a korlát nem vonatkozik a Java, C# és JavaScript nyelvekre: ott mindig 256 MB heapet kapnak.';
$string['noanswer'] = 'Előbb írj egy programot.';
$string['noassist'] = 'Kódkiegészítés és tippek kikapcsolása (dolgozatokhoz)';
$string['noexpected'] = 'Add meg az elvárt kimenetet, vagy egy megoldást, amelyből kiszámítható.';
$string['ordercheck'] = 'Sorrend ellenőrzése';
$string['ordercheck_help'] = 'A tanulók a Sorrend ellenőrzése gombra kattintva láthatják, hány sor van a helyén, de azt soha, hogy melyek. Egy sor akkor van a helyén, ha a tanuló sorai és a megoldás sorai közötti leghosszabb közös részsorozathoz tartozik (Pythonban azonos behúzással is); a szóközök nem számítanak, és a zavaró sorok soha nincsenek a helyükön. Részpontszámmal: a teszteken megbukó válasz legfeljebb a pontszám felét kaphatja meg a helyükön lévő sorokért. A teljes pontszámról továbbra is a tesztek döntenek.';
$string['ordercheck_off'] = 'Nem';
$string['ordercheck_on'] = 'Igen';
$string['ordercheck_partial'] = 'Igen, a sorrendért járó részpontszámmal';
$string['ordercheckfailed'] = 'A sorrendet nem sikerült ellenőrizni.';
$string['orderresult'] = 'Helyükön lévő sorok: {$a->placed} / {$a->total}';
$string['parsons'] = 'Parsons-feladat';
$string['parsons_help'] = 'A tanulók nem írják meg a programot: megkapják a megoldás sorait összekeverve, a zavaró sorokkal együtt, és sorba rendezik őket (Pythonban a megfelelő behúzással is). Az általuk összeállított programot a szokásos módon a tesztek értékelik.';
$string['parsons_label'] = 'Válaszadás a megoldás sorainak sorba rendezésével';
$string['parsonsadd'] = 'Hozzáadás a programhoz: {$a}';
$string['parsonsanswer'] = 'A programod';
$string['parsonsdown'] = 'Mozgatás lefelé';
$string['parsonsgap'] = 'Hiányzó rész a(z) {$a}. sorban';
$string['parsonshint'] = 'Húzd át a sorokat a programodba a megfelelő sorrendben, vagy kattints egy sorra, hogy a végére kerüljön. Előfordulhat, hogy néhány sorra nincs szükség.';
$string['parsonsindent'] = 'Behúzás növelése';
$string['parsonsnosolution'] = 'A Parsons-feladathoz megoldás szükséges: annak sorait rendezik sorba a tanulók.';
$string['parsonsoutdent'] = 'Behúzás csökkentése';
$string['parsonspool'] = 'Sorok';
$string['parsonsprogram'] = 'A soraidból összeállított program (a Futtatás, a Léptetés és a tesztek ezt használják):';
$string['parsonsremove'] = 'Vissza a sorok közé';
$string['parsonsup'] = 'Mozgatás felfelé';
$string['passed'] = 'Sikeres';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'A tanuló kódszerkesztőben ír meg egy programot. Tesztekkel a program minden teszt bemenetével lefut a Jobe szerveren, és a helyes kimenetű tesztek aránya alapján kap pontot. Tesztek nélkül a tanár értékeli.';
$string['pluginnameadding'] = 'CodeLab-kérdés hozzáadása';
$string['pluginnameediting'] = 'CodeLab-kérdés szerkesztése';
$string['pluginnamesummary'] = 'A tanuló C, C++, Python, Java vagy C# nyelven ír programot.';
$string['prefix'] = 'Előtte lévő kód';
$string['prefix_help'] = 'A tanuló programja elé fűzött kód futtatáskor, például #include sorok vagy egy osztály kezdete. A tanulók nem látják a szerkesztőben.';
$string['privacy:metadata:jobe'] = 'A válaszok a rendszergazda által beállított Jobe szerverre kerülnek elküldésre, hogy lefussanak a kérdés tesztjein. Magukat a válaszokat a kérdésmotor tárolja.';
$string['privacy:metadata:jobe:code'] = 'A tanuló által írt program';
$string['privacy:metadata:jobe:stdin'] = 'Egy teszt bemenete';
$string['privacy:metadata:pyodide'] = 'Amikor a Python a próbálkozás során a böngészőben fut (Futtatás és Léptetés), a tanuló böngészője a rendszergazda által beállított címről (alapértelmezésben a jsDelivr CDN-ről) tölti be a Pyodide Python-értelmezőt. Válasz vagy bemenet nem kerül elküldésre.';
$string['privacy:metadata:pyodide:ipaddress'] = 'A tanuló böngészőjének IP-címe, mint bármely letöltésnél';
$string['privacy:metadata:runner'] = 'Amikor a rendszergazda CodeLab futtatót állít be (sajátot vagy hosztoltat), a válaszok oda kerülnek elküldésre a kérdés tesztjein való futtatáshoz (SQL esetén mindig, más nyelveknél akkor, ha a futtató a futtató és értékelő szerver), és a próbálkozás közbeni Futtatás is ott futtatja a programot, miközben a tanuló begépeli a bemenetet. A futtató csak futás közben őrzi meg a programot. Magukat a válaszokat a kérdésmotor tárolja.';
$string['privacy:metadata:runner:code'] = 'A tanuló által írt program';
$string['privacy:metadata:runner:stdin'] = 'Egy teszt bemenete, vagy a tanuló által begépelt bemenet';
$string['privacy:metadata:runner:userid'] = 'A tanuló azonosítója egy aláírt tokenben a próbálkozás közbeni futtatáshoz, az egyidejűleg futtatott programok számának korlátozásához';
$string['runtests'] = 'Tesztek futtatása';
$string['sandboxfailed'] = 'A programot nem sikerült ellenőrizni a szerveren (Jobe). A tanárod fogja értékelni.';
$string['savefailing'] = 'Mentés akkor is, ha a megoldás megbukik a teszteken';
$string['showtests'] = 'Tesztek a próbálkozás során';
$string['showtests_desc'] = 'A tanulók beküldés előtt futtathatják a nem rejtett teszteket';
$string['solution'] = 'Megoldás';
$string['solution_help'] = 'A tanár programja. A kérdés mentésekor a rendszer lefuttatja a tesztek üres elvárt kimeneteinek kitöltéséhez; a tanulók az áttekintésben ezt látják helyes válaszként.';
$string['solutioncheck'] = 'Megoldás ellenőrzése';
$string['solutioncheck_help'] = 'A kérdés mentésekor a megoldás lefut a Jobe szerveren minden elvárt kimenettel rendelkező teszt bemenetével, és a kérdés csak akkor menthető, ha mindegyiken átmegy. Jelöld be ezt a négyzetet, ha mégis menteni szeretnéd, például miközben még a teszteket írod. Ha a Jobe nem elérhető, a kérdés ellenőrzés nélkül mentődik.';
$string['solutionfails'] = 'A megoldás megbukik ezen a teszten. Kimenete: {$a}';
$string['solutionis'] = 'Egy megoldás:';
$string['solutionnocompile'] = 'A megoldás nem fordul le: {$a}';
$string['suffix'] = 'Utána lévő kód';
$string['suffix_help'] = 'A tanuló programja után fűzött kód futtatáskor, például egy main függvény, amely meghívja a tanuló függvényét, vagy egy osztály vége. A tanulók nem látják a szerkesztőben.';
$string['template'] = 'Kezdőkód';
$string['template_help'] = 'A szerkesztőben a tanulók elé kerülő kezdőkód; üres is lehet.';
$string['test'] = 'Teszt';
$string['testcode'] = 'Tesztkód';
$string['testcode_help'] = 'Ebben a tesztben futtatott kód, például a tanuló által írt függvény meghívása: <code>printf("%d\\n", sum(2, 3));</code> vagy <code>print(sum(2, 3))</code>. Üres is lehet.

* Ha a tanuló programja utáni kód tartalmazza a <code>{{TEST}}</code> jelölőt, például egy általad írt main függvényben, a tesztkód annak a helyére kerül.
* Ellenkező esetben egy main nélküli C vagy C++ program kap egyet: <code>int main(void) { test code return 0; }</code>.
* Más nyelvekben a tesztkód a program végéhez fűződik.

A tesztnek bemenete is lehet. A tanulók látják a nem rejtett tesztek tesztkódját.';
$string['testcoden'] = '{no}. teszt: tesztkód';
$string['testexpected'] = 'Elvárt kimenet';
$string['testfailed'] = '{$a}. teszt: sikertelen';
$string['testgot'] = 'Kimenet';
$string['testhidden'] = 'Elrejtve a tanulók elől';
$string['testinputn'] = '{no}. teszt: bemenet';
$string['testpassed'] = '{$a}. teszt: sikeres';
$string['tests'] = 'Tesztek';
$string['tests_desc'] = 'Minden teszt bemenetet ad a programnak, és összehasonlítja a kimenetét az elvárt kimenettel. Hagyd üresen az elvárt kimenetet, hogy a megoldásból kerüljön kiszámításra. Tesztek nélkül a tanár értékeli a válaszokat.';
$string['testsof'] = '{$a->passed} / {$a->total} teszt sikeres';
$string['teststdin'] = 'Bemenet';
$string['testsummary'] = 'Sikeres tesztek: {$a->passed} / {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Súly';
$string['timelimit'] = 'Időkorlát tesztenként (s)';
$string['timelimit_help'] = 'Hány másodpercig futhat egy teszt: a tovább futó teszt túl lassúként megbukik akkor is, ha a kimenete helyes. Üresen: nincs korlát. 0.1 és 30 között. Csak a CodeLab futtató jelenti, mennyi ideig futott egy teszt; Jobe esetén ez a mező nincs hatással, és a CPU-időkorlát az egyetlen korlát. Az időt a szerver méri, és beleszámít a nyelv indulási ideje is (Java és C# esetén körülbelül 0,3 másodperc), ezért hagyj ráhagyást a jó megoldás ideje fölött.';
$string['tolerance'] = 'Tűréshatár';
$string['tolerance_help'] = 'Számok összehasonlításához: két szám legnagyobb olyan eltérése, amely még egyenlőnek számít, abszolút értelemben vagy a nagyobb számhoz viszonyítva. 0.001 esetén 3.1416 megegyezik 3.1414-gyel, és 1000.4 megegyezik 1000-rel.';
$string['tooslow'] = 'Túl lassú: {$a->time} s, a korlát {$a->limit} s';
