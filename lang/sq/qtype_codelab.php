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
 * Strings for component 'qtype_codelab', language 'sq'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Shto {no} teste të tjera';
$string['aihints'] = 'Shpjegime nga IA';
$string['aihints_help'] = 'Kur shpjegimet e gabimeve nga IA në CodeLab për TinyMCE janë të aktivizuara nga administratori, nxënësit shohin një buton nën një mesazh të kompiluesit ose gabim të programit të tyre, i cili i kërkon IA-së së faqes ta shpjegojë. IA udhëzohet të mos shkruajë kurrë zgjidhjen. Pa këtë opsion, butoni nuk shfaqet kurrë në një kuiz.';
$string['aihints_label'] = 'Nxënësit mund t\'i kërkojnë IA-së të shpjegojë një mesazh të kompiluesit ose një gabim';
$string['answer'] = 'Programi';
$string['answerlabel'] = 'Programi juaj ({$a})';
$string['assist'] = 'Ndihmë gjatë shkrimit';
$string['badlimit'] = 'Jepni një numër të plotë nga 1 deri në {$a}, ose lëreni bosh për parazgjedhjen.';
$string['badregex'] = 'Kjo nuk është një shprehje e rregullt e vlefshme.';
$string['badtimelimit'] = 'Jepni një numër sekondash nga 0.1 deri në 30, ose lëreni bosh për pa kufi.';
$string['badtolerance'] = 'Jepni një numër 0 ose më të madh, për shembull 0.001.';
$string['bulkcheck'] = 'Kontrollo zgjidhjet CodeLab';
$string['bulkcheck_again'] = 'Kontrollo përsëri';
$string['bulkcheck_bank'] = 'Banka e pyetjeve';
$string['bulkcheck_done'] = 'U kontrolluan {$a->total} pyetje: {$a->ok} i kalojnë të gjitha testet, {$a->problems} kërkojnë vëmendje.';
$string['bulkcheck_finished'] = 'Përfundoi.';
$string['bulkcheck_intro'] = 'Zgjidhja e secilës prej {$a} pyetjeve CodeLab në bankat e pyetjeve të këtij kursi ekzekutohet në serverin Jobe mbi testet e pyetjes së saj, një nga një. Pyetjet zgjidhja e të cilave dështon, nuk kompilohet ose mungon listohen të parat. Rezultatet e zgjidhjeve të kontrolluara më parë merren nga memoria e përkohshme (cache).';
$string['bulkcheck_none'] = 'Nuk ka pyetje CodeLab në bankat e pyetjeve të këtij kursi.';
$string['bulkcheck_progress'] = 'Duke kontrolluar {$a->done} nga {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Rezultati';
$string['bulkcheck_start'] = 'Fillo kontrollin';
$string['cachedef_results'] = 'Rezultatet e testeve të programeve të dorëzuara';
$string['check_compile'] = 'Nuk kompilohet';
$string['check_failed'] = 'Kalon {$a->passed} nga {$a->total} teste';
$string['check_jobe'] = 'Jobe nuk mundi ta ekzekutonte';
$string['check_nosolution'] = 'Pa zgjidhje';
$string['check_notests'] = 'Pa teste (vlerësohet nga mësuesi)';
$string['check_ok'] = 'Kalon të gjitha testet ({$a->total})';
$string['checkfailed'] = 'Programi nuk mund të kontrollohej në server (Jobe), prandaj kjo provë nuk llogaritet. Shtypni Kontrollo përsëri pas një çasti.';
$string['checkorder'] = 'Kontrollo renditjen';
$string['classanalysis'] = 'Analiza';
$string['classanswers'] = 'Përgjigjet';
$string['classempty'] = 'Ende pa përgjigje.';
$string['classemptyoutput'] = '(pa dalje)';
$string['classgrades'] = 'Notat (në përqindje)';
$string['classhidenames'] = 'Fshih emrat';
$string['classmessages'] = 'Mesazhet më të shpeshta të kompiluesit';
$string['classnotgraded'] = 'pa vlerësuar';
$string['classother'] = '{$a} përgjigje për versione të tjera të pyetjes nuk analizohen.';
$string['classpending'] = '{$a} përgjigje të tjera po kontrollohen; analiza do të plotësohet pas një çasti.';
$string['classshownames'] = 'Shfaq emrat';
$string['classsimilar'] = 'Dorëzime të ngjashme';
$string['classsimilarnote'] = 'Krahasuar lokalisht sipas strukturës së kodit (duke injoruar emrat e variablave, hapësirat, komentet dhe kodin fillestar); shqyrtoni përgjigjet para se të vendosni.';
$string['classstudent'] = 'Nxënësi {$a}';
$string['classsummary'] = 'Përgjigje: {$a->answers} · nuk kompilohen: {$a->compile} · gabim në test: {$a->runtime} · mbi kufirin e kohës ose memories: {$a->timelimit}';
$string['classtest'] = 'Testi {$a->n}: {$a->passed} nga {$a->total} kalojnë';
$string['classtesthidden'] = 'Testi {$a->n} (i fshehur): {$a->passed} nga {$a->total} kalojnë';
$string['classunchecked'] = '{$a} përgjigje nuk mund të kontrolloheshin nga serveri.';
$string['classwork'] = 'Puna e klasës';
$string['classwrong'] = 'Dalje të gabuara të shpeshta:';
$string['codeheader'] = 'Kodi';
$string['compare'] = 'Krahasimi i daljes';
$string['compare_help'] = 'Si krahasohet dalja e programit me daljen e pritur të çdo testi.

* **Saktësisht**: çdo karakter llogaritet.
* **Hapësirat në fund nuk llogariten**: hapësirat në fund të rreshtave dhe rreshtat bosh në fund lihen jashtë.
* **Rreshtat në çdo renditje**: si më sipër, por rreshtat mund të vijnë në çdo renditje, për pyetësorët SQL pa ORDER BY.
* **Numra me tolerancë**: daljet krahasohen fjalë për fjalë, dhe dy numra janë të barabartë kur ndryshojnë jo më shumë se toleranca (absolute, ose relative ndaj numrit më të madh). Hapësirat dhe kalimet në rresht të ri midis fjalëve nuk llogariten.
* **Shprehje e rregullt**: dalja e pritur e çdo testi është një shprehje e rregullt (PCRE) që duhet të përputhet me të gjithë daljen, për shembull <code>Sum: [0-9]+</code>. Daljet e pritura bosh plotësohen nga zgjidhja si modele që përputhen vetëm me atë dalje.';
$string['comparison_exact'] = 'Saktësisht';
$string['comparison_numbers'] = 'Numra me tolerancë';
$string['comparison_regex'] = 'Shprehje e rregullt';
$string['comparison_spaces'] = 'Hapësirat në fund nuk llogariten';
$string['comparison_unordered'] = 'Rreshtat në çdo renditje (rreshta SQL)';
$string['compileerror'] = 'Programi nuk kompilohet:';
$string['cputime'] = 'Kufiri i kohës së CPU-së (sekonda)';
$string['cputime_help'] = 'Koha maksimale e CPU-së për një ekzekutim të një testi kur vlerësohet përgjigjja. Bosh: cilësimi i shtojcës së redaktorit CodeLab (5 sekonda nëse nuk është ndryshuar). Të shumtën {$a} sekonda (vendosur nga administratori). Ekzekuto dhe Ekzekuto testet gjatë provës ruajnë cilësimin e faqes.';
$string['distractors'] = 'Rreshta shpërqendrues';
$string['distractors_help'] = 'Rreshta që përzihen me rreshtat e zgjidhjes por nuk i përkasin asaj, një për rresht (për shembull një kusht i gabuar ose një rresht që nuk nevojitet). Nxënësit që i përdorin nuk i kalojnë testet.';
$string['failed'] = 'Dështoi';
$string['gaps'] = 'Zbrazëti për plotësim';
$string['gaps_help'] = 'Numri i shprehjeve të fshehura si zbrazëti për plotësim në rreshtat e një problemi Parsons (0 vetëm për renditje). Nxënësit i plotësojnë ato ndërsa vendosin rreshtat në renditje.';
$string['gaps_none'] = '0 (vetëm renditje)';
$string['hiddensummary'] = 'Teste të fshehura të kaluara: {$a->passed} nga {$a->total}';
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
$string['language'] = 'Gjuha e programimit';
$string['maxcputime'] = 'Koha maksimale e CPU-së për një pyetje';
$string['maxcputime_desc'] = 'Pyetjet nuk mund t\'i kërkojnë Jobe-s më shumë kohë CPU se kjo, në sekonda për ekzekutim.';
$string['maxmemory'] = 'Memoria maksimale e një pyetjeje';
$string['maxmemory_desc'] = 'Pyetjet nuk mund t\'i kërkojnë Jobe-s më shumë memorie se kjo, në MB për ekzekutim.';
$string['memorylimit'] = 'Kufiri i memories (MB)';
$string['memorylimit_help'] = 'Memoria maksimale e një ekzekutimi të një testi kur vlerësohet përgjigjja. Bosh: parazgjedhja e serverit Jobe. Të shumtën {$a} MB (vendosur nga administratori). Një gjuhë që ka nevojë për më shumë për t\'u nisur (JavaScript kërkon 1000 MB) merr aq sa i duhet. Në CodeLab runner ky kufi nuk zbatohet për Java, C# dhe JavaScript: aty ato marrin gjithmonë një heap prej 256 MB.';
$string['noanswer'] = 'Shkruani fillimisht një program.';
$string['noassist'] = 'Çaktivizo plotësimin automatik të kodit dhe ndihmësit (për teste)';
$string['noexpected'] = 'Jepni daljen e pritur, ose një zgjidhje nga e cila të llogaritet ajo.';
$string['ordercheck'] = 'Kontrollo renditjen';
$string['ordercheck_help'] = 'Nxënësit mund të shtypin Kontrollo renditjen për të parë sa rreshta janë në vendin e duhur, por kurrë cilët. Një rresht është në vendin e tij kur i përket nënvargut më të gjatë të përbashkët të rreshtave të tyre me rreshtat e zgjidhjes (në Python edhe me të njëjtën zhvendosje majtas); hapësirat nuk llogariten dhe rreshtat shpërqendrues nuk janë kurrë në vendin e duhur. Me një pjesë të pikëve: një përgjigje që dështon testet merr deri në gjysmën e pikëve për rreshtat në vendin e duhur. Testet përcaktojnë ende pikët e plota.';
$string['ordercheck_off'] = 'Jo';
$string['ordercheck_on'] = 'Po';
$string['ordercheck_partial'] = 'Po, me një pjesë të pikëve për renditjen';
$string['ordercheckfailed'] = 'Renditja nuk mund të kontrollohej.';
$string['orderresult'] = 'Rreshta në vendin e duhur: {$a->placed} nga {$a->total}';
$string['parsons'] = 'Problemi Parsons';
$string['parsons_help'] = 'Nxënësit nuk e shkruajnë programin: ata marrin rreshtat e zgjidhjes, të përzier, së bashku me rreshtat shpërqendrues, dhe i vendosin në renditjen e duhur (në Python edhe me zhvendosjen e saktë djathtas). Programi që ndërtojnë vlerësohet me teste si zakonisht.';
$string['parsons_label'] = 'Përgjigjuni duke vendosur rreshtat e zgjidhjes në renditjen e duhur';
$string['parsonsadd'] = 'Shto në program: {$a}';
$string['parsonsanswer'] = 'Programi juaj';
$string['parsonsdown'] = 'Lëviz poshtë';
$string['parsonsgap'] = 'Zbrazëti në rreshtin {$a}';
$string['parsonshint'] = 'Tërhiqni rreshtat në programin tuaj në renditjen e duhur, ose klikoni një rresht për ta shtuar në fund. Disa rreshta mund të mos nevojiten.';
$string['parsonsindent'] = 'Zhvendos djathtas';
$string['parsonsnosolution'] = 'Një problem Parsons kërkon zgjidhjen: rreshtat e saj janë ato që nxënësit vendosin në renditje.';
$string['parsonsoutdent'] = 'Zhvendos majtas';
$string['parsonspool'] = 'Rreshtat';
$string['parsonsprogram'] = 'Programi i krijuar nga rreshtat tuaj (Ekzekuto, Hapi dhe testet e përdorin atë):';
$string['parsonsremove'] = 'Kthe te rreshtat';
$string['parsonsup'] = 'Lëviz lart';
$string['passed'] = 'Kaloi';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Nxënësi shkruan një program në një redaktor kodi. Me teste, programi ekzekutohet në serverin Jobe me hyrjen e çdo testi dhe vlerësohet sipas përqindjes së testeve dalja e të cilave është e saktë. Pa teste, e vlerëson mësuesi.';
$string['pluginnameadding'] = 'Duke shtuar një pyetje CodeLab';
$string['pluginnameediting'] = 'Duke redaktuar një pyetje CodeLab';
$string['pluginnamesummary'] = 'Nxënësi shkruan një program në C, C++, Python, Java ose C#.';
$string['prefix'] = 'Kodi para';
$string['prefix_help'] = 'Kodi që shtohet para programit të nxënësit kur ekzekutohet, për shembull rreshtat #include ose fillimi i një klase. Nxënësit nuk e shohin atë në redaktor.';
$string['privacy:metadata:jobe'] = 'Përgjigjet dërgohen në serverin Jobe të konfiguruar nga administratori për t\'u ekzekutuar mbi testet e pyetjes. Vetë përgjigjet ruhen nga motori i pyetjeve.';
$string['privacy:metadata:jobe:code'] = 'Programi që shkroi nxënësi';
$string['privacy:metadata:jobe:stdin'] = 'Hyrja e një testi';
$string['privacy:metadata:pyodide'] = 'Kur Python ekzekutohet në shfletues gjatë një prove (Ekzekuto dhe Hapi), shfletuesi i nxënësit ngarkon Pyodide (interpretuesin e Python) nga adresa e vendosur nga administratori, si parazgjedhje jsDelivr CDN. Asnjë përgjigje ose hyrje nuk dërgohet.';
$string['privacy:metadata:pyodide:ipaddress'] = 'Adresa IP e shfletuesit të nxënësit, si në çdo shkarkim';
$string['privacy:metadata:runner'] = 'Kur administratori konfiguron një CodeLab runner (të vetin ose të hostuar), përgjigjet dërgohen aty për t\'u ekzekutuar mbi testet e pyetjes (SQL gjithmonë, gjuhët e tjera kur ekzekutuesi është serveri për ekzekutim dhe vlerësim), dhe Ekzekuto gjatë provës e ekzekuton programin aty ndërsa nxënësi shkruan hyrjen. Ekzekutuesi e mban programin vetëm ndërsa ekzekutohet. Vetë përgjigjet ruhen nga motori i pyetjeve.';
$string['privacy:metadata:runner:code'] = 'Programi që shkroi nxënësi';
$string['privacy:metadata:runner:stdin'] = 'Hyrja e një testi, ose hyrja që shkruan nxënësi';
$string['privacy:metadata:runner:userid'] = 'ID-ja e nxënësit, në një token të nënshkruar për Ekzekuto gjatë provës, për të kufizuar numrin e programeve që secili përdorues ekzekuton njëkohësisht';
$string['runtests'] = 'Ekzekuto testet';
$string['sandboxfailed'] = 'Programi nuk mund të kontrollohej në server (Jobe). Mësuesi juaj do ta vlerësojë.';
$string['savefailing'] = 'Ruaj edhe nëse zgjidhja dështon testet';
$string['showtests'] = 'Testet gjatë provës';
$string['showtests_desc'] = 'Nxënësit mund të ekzekutojnë testet që nuk janë të fshehura para se të dorëzojnë';
$string['solution'] = 'Zgjidhja';
$string['solution_help'] = 'Programi i mësuesit. Daljet e pritura bosh të testeve plotësohen duke e ekzekutuar atë kur ruhet pyetja; nxënësit e shohin atë si përgjigjen e saktë gjatë rishikimit.';
$string['solutioncheck'] = 'Kontrolli i zgjidhjes';
$string['solutioncheck_help'] = 'Kur ruhet pyetja, zgjidhja ekzekutohet në Jobe me hyrjen e çdo testi që ka një dalje të pritur, dhe pyetja ruhet vetëm nëse i kalon të gjitha. Shënoni këtë kuti për ta ruajtur gjithsesi, për shembull ndërsa jeni ende duke shkruar testet. Kur Jobe nuk është i arritshëm, pyetja ruhet pa kontrollin.';
$string['solutionfails'] = 'Zgjidhja dështon në këtë test. Dalja e saj: {$a}';
$string['solutionis'] = 'Një zgjidhje:';
$string['solutionnocompile'] = 'Zgjidhja nuk kompilohet: {$a}';
$string['suffix'] = 'Kodi pas';
$string['suffix_help'] = 'Kodi që shtohet pas programit të nxënësit kur ekzekutohet, për shembull një funksion main që thërret funksionin e nxënësit, ose fundi i një klase. Nxënësit nuk e shohin atë në redaktor.';
$string['template'] = 'Kodi fillestar';
$string['template_help'] = 'Kodi nga i cili fillojnë nxënësit në redaktor; mund të jetë bosh.';
$string['test'] = 'Testi';
$string['testcode'] = 'Kodi i testit';
$string['testcode_help'] = 'Kodi që ekzekutohet në këtë test, për shembull thirrja e funksionit që shkruan nxënësi: <code>printf("%d\\n", sum(2, 3));</code> ose <code>print(sum(2, 3))</code>. Mund të jetë bosh.

* Nëse kodi pas programit të nxënësit ka shënuesin <code>{{TEST}}</code>, për shembull brenda një main që shkruani ju, kodi i testit zë vendin e tij.
* Përndryshe një program C ose C++ pa main merr një të tillë: <code>int main(void) { test code return 0; }</code>.
* Në gjuhët e tjera kodi i testit shtohet në fund të programit.

Testi mund të ketë gjithashtu një hyrje. Nxënësit shohin kodin e testit për testet që nuk janë të fshehura.';
$string['testcoden'] = 'Testi {no}: kodi i testit';
$string['testexpected'] = 'Dalja e pritur';
$string['testfailed'] = 'Testi {$a}: dështoi';
$string['testgot'] = 'Dalja';
$string['testhidden'] = 'I fshehur nga nxënësit';
$string['testinputn'] = 'Testi {no}: hyrja';
$string['testpassed'] = 'Testi {$a}: kaloi';
$string['tests'] = 'Testet';
$string['tests_desc'] = 'Çdo test i jep programit një hyrje dhe krahason daljen e tij me daljen e pritur. Lëreni daljen e pritur bosh për ta marrë nga zgjidhja. Pa teste, mësuesi vlerëson përgjigjet.';
$string['testsof'] = 'U kaluan {$a->passed} nga {$a->total} teste';
$string['teststdin'] = 'Hyrja';
$string['testsummary'] = 'Teste të kaluara: {$a->passed} nga {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Pesha';
$string['timelimit'] = 'Kufiri i kohës për test (s)';
$string['timelimit_help'] = 'Sekondat që mund të zgjasë një test: një test që zgjat më shumë dështon si shumë i ngadaltë, edhe kur dalja e tij është e saktë. Bosh: pa kufi. Nga 0.1 deri në 30. Vetëm CodeLab runner raporton sa zgjati një test; në Jobe kjo fushë nuk ka efekt, dhe kufiri i kohës së CPU-së është i vetmi kufi. Koha matet në server dhe përfshin nisjen e gjuhës (rreth 0.3 sekonda për Java dhe C#), prandaj lini hapësirë mbi kohën e një zgjidhjeje të mirë.';
$string['tolerance'] = 'Toleranca';
$string['tolerance_help'] = 'Për krahasimin me numra: diferenca më e madhe e dy numrave që ende llogariten si të barabartë, absolute ose relative ndaj numrit më të madh. Me 0.001, 3.1416 përputhet me 3.1414 dhe 1000.4 përputhet me 1000.';
$string['tooslow'] = 'Shumë i ngadaltë: {$a->time} s, kufiri është {$a->limit} s';
