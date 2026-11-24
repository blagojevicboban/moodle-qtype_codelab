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
 * Strings for component 'qtype_codelab', language 'tr'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = '{no} test daha ekle';
$string['aihints'] = 'Yapay zeka açıklamaları';
$string['aihints_help'] = 'Yönetici tarafından TinyMCE için CodeLab eklentisinin Hataların yapay zeka açıklamaları özelliği açıldığında, öğrenciler bir derleyici mesajının veya program hatasının altında sitenin yapay zekasından bunu açıklamasını isteyen bir düğme görür. Yapay zekaya düzeltmeyi asla yazmaması söylenir. Bu seçenek kapalıysa düğme sınavda hiç gösterilmez.';
$string['aihints_label'] = 'Öğrenciler bir derleyici mesajını veya hatayı açıklaması için yapay zekaya sorabilir';
$string['answer'] = 'Program';
$string['answerlabel'] = 'Programınız ({$a})';
$string['assist'] = 'Yazma yardımı';
$string['badlimit'] = '1 ile {$a} arasında bir tam sayı girin veya varsayılan için boş bırakın.';
$string['badregex'] = 'Bu geçerli bir düzenli ifade değil.';
$string['badtimelimit'] = '0.1 ile 30 arasında saniye cinsinden bir sayı girin veya sınırsız olması için boş bırakın.';
$string['badtolerance'] = '0 veya daha büyük bir sayı girin, örneğin 0.001.';
$string['bulkcheck'] = 'CodeLab çözümlerini kontrol et';
$string['bulkcheck_again'] = 'Tekrar kontrol et';
$string['bulkcheck_bank'] = 'Soru bankası';
$string['bulkcheck_done'] = '{$a->total} soru kontrol edildi: {$a->ok} soru tüm testlerden geçiyor, {$a->problems} soru ilgi gerektiriyor.';
$string['bulkcheck_finished'] = 'Tamamlandı.';
$string['bulkcheck_intro'] = 'Bu dersin soru bankalarındaki {$a} CodeLab sorusunun her birinin çözümü, Jobe sunucusunda sorunun kendi testleriyle tek tek çalıştırılır. Çözümü başarısız olan, derlenmeyen veya eksik olan sorular önce listelenir. Daha önce kontrol edilen çözümlerin sonuçları önbellekten alınır.';
$string['bulkcheck_none'] = 'Bu dersin soru bankalarında CodeLab sorusu yok.';
$string['bulkcheck_progress'] = 'Kontrol ediliyor {$a->done} / {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Sonuç';
$string['bulkcheck_start'] = 'Kontrolü başlat';
$string['cachedef_results'] = 'Gönderilen programların test sonuçları';
$string['check_compile'] = 'Derlenmiyor';
$string['check_failed'] = '{$a->total} testten {$a->passed} tanesinden geçiyor';
$string['check_jobe'] = 'Jobe çalıştıramadı';
$string['check_nosolution'] = 'Çözüm yok';
$string['check_notests'] = 'Test yok (öğretmen tarafından değerlendirilir)';
$string['check_ok'] = 'Tüm testlerden geçiyor ({$a->total})';
$string['checkfailed'] = 'Program sunucuda (Jobe) kontrol edilemedi, bu yüzden bu deneme sayılmaz. Biraz sonra Kontrol et düğmesine tekrar basın.';
$string['checkorder'] = 'Sırayı kontrol et';
$string['classanalysis'] = 'Analiz';
$string['classanswers'] = 'Yanıtlar';
$string['classempty'] = 'Henüz yanıt yok.';
$string['classemptyoutput'] = '(çıktı yok)';
$string['classgrades'] = 'Notlar (yüzde)';
$string['classhidenames'] = 'Adları gizle';
$string['classmessages'] = 'En sık derleyici mesajları';
$string['classnotgraded'] = 'değerlendirilmedi';
$string['classother'] = 'Sorunun diğer sürümlerine verilen {$a} yanıt analiz edilmedi.';
$string['classpending'] = '{$a} yanıt daha kontrol ediliyor; analiz birazdan güncellenecektir.';
$string['classshownames'] = 'Adları göster';
$string['classsimilar'] = 'Benzer gönderimler';
$string['classsimilarnote'] = 'Kod yapısına göre yerel olarak karşılaştırılır (değişken adları, boşluklar, yorumlar ve başlangıç kodu göz ardı edilir); karar vermeden önce yanıtları inceleyin.';
$string['classstudent'] = 'Öğrenci {$a}';
$string['classsummary'] = 'Yanıtlar: {$a->answers} · derlenmeyen: {$a->compile} · testte hata: {$a->runtime} · süre veya bellek sınırı aşımı: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: {$a->total} öğrenciden {$a->passed} tanesi geçti';
$string['classtesthidden'] = 'Test {$a->n} (gizli): {$a->total} öğrenciden {$a->passed} tanesi geçti';
$string['classunchecked'] = '{$a} yanıt sunucu tarafından kontrol edilemedi.';
$string['classwork'] = 'Sınıf çalışması';
$string['classwrong'] = 'Sık görülen yanlış çıktılar:';
$string['codeheader'] = 'Kod';
$string['compare'] = 'Çıktı karşılaştırma';
$string['compare_help'] = 'Programın çıktısının her testin beklenen çıktısıyla nasıl karşılaştırılacağı.

* **Tam olarak**: her karakter önemlidir.
* **Sondaki boşluklar sayılmaz**: satır sonlarındaki boşluklar ve sondaki boş satırlar dikkate alınmaz.
* **Satırlar herhangi bir sırada**: bir önceki gibidir, ancak satırlar herhangi bir sırada gelebilir; ORDER BY olmayan SQL sorguları için.
* **Toleranslı sayılar**: çıktılar kelime kelime karşılaştırılır ve iki sayı arasındaki fark toleransı (mutlak veya büyük sayıya göre görece) aşmıyorsa eşit sayılır. Kelimeler arasındaki boşluklar ve satır sonları sayılmaz.
* **Düzenli ifade**: her testin beklenen çıktısı, tüm çıktıyla eşleşmesi gereken bir düzenli ifadedir (PCRE), örneğin <code>Sum: [0-9]+</code>. Boş beklenen çıktılar çözümden yalnızca o çıktıyla eşleşen kalıplar olarak doldurulur.';
$string['comparison_exact'] = 'Tam olarak';
$string['comparison_numbers'] = 'Toleranslı sayılar';
$string['comparison_regex'] = 'Düzenli ifade';
$string['comparison_spaces'] = 'Sondaki boşluklar sayılmaz';
$string['comparison_unordered'] = 'Satırlar herhangi bir sırada (SQL satırları)';
$string['compileerror'] = 'Program derlenmiyor:';
$string['cputime'] = 'CPU süre sınırı (saniye)';
$string['cputime_help'] = 'Yanıt değerlendirilirken tek bir test çalıştırması için en fazla CPU süresi. Boşsa: CodeLab düzenleyici eklentisinin ayarı (değiştirilmediyse 5 saniye). En fazla {$a} saniye (yönetici tarafından ayarlanır). Denemedeki Çalıştır ve Testleri çalıştır düğmeleri site ayarını korur.';
$string['distractors'] = 'Çeldirici satırlar';
$string['distractors_help'] = 'Çözüm satırlarına karıştırılan ancak çözüme ait olmayan satırlar, her satırda bir tane (örneğin yanlış bir koşul veya gereksiz bir satır). Bunları kullanan öğrenciler testlerden geçemez.';
$string['failed'] = 'Başarısız';
$string['gaps'] = 'Boşluk doldurma';
$string['gaps_help'] = 'Bir Parsons probleminin satırlarında doldurulacak boşluk olarak gizlenen ifade sayısı (yalnızca sıralama için 0). Öğrenciler satırları sıralarken bunları doldurur.';
$string['gaps_none'] = '0 (yalnızca sıralama)';
$string['hiddensummary'] = 'Geçilen gizli testler: {$a->passed} / {$a->total}';
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
$string['language'] = 'Programlama dili';
$string['maxcputime'] = 'Bir sorunun en fazla CPU süresi';
$string['maxcputime_desc'] = 'Sorular Jobe sunucusundan çalıştırma başına saniye cinsinden bundan fazla CPU süresi isteyemez.';
$string['maxmemory'] = 'Bir sorunun en fazla belleği';
$string['maxmemory_desc'] = 'Sorular Jobe sunucusundan çalıştırma başına MB cinsinden bundan fazla bellek isteyemez.';
$string['memorylimit'] = 'Bellek sınırı (MB)';
$string['memorylimit_help'] = 'Yanıt değerlendirilirken tek bir test çalıştırması için en fazla bellek. Boşsa: Jobe sunucusunun varsayılanı. En fazla {$a} MB (yönetici tarafından ayarlanır). Başlamak için daha fazla bellek gereken bir dil (JavaScript 1000 MB gerektirir) ihtiyacı olanı alır. CodeLab çalıştırıcısında bu sınır Java, C# ve JavaScript için geçerli değildir; orada her zaman 256 MB yığın alırlar.';
$string['noanswer'] = 'Önce bir program yazın.';
$string['noassist'] = 'Kod tamamlama ve ipuçlarını kapat (sınavlar için)';
$string['noexpected'] = 'Beklenen çıktıyı girin veya çıktıyı hesaplamak için bir çözüm yazın.';
$string['ordercheck'] = 'Sırayı kontrol et';
$string['ordercheck_help'] = 'Öğrenciler hangi satırlar olduğunu görmeden kaç satırın yerinde olduğunu görmek için Sırayı kontrol et düğmesine basabilir. Bir satır, öğrencinin satırları ile çözüm satırlarının en uzun ortak alt dizisine aitse (Python\'da aynı girintide olmak şartıyla) yerindedir; boşluklar sayılmaz ve çeldirici satırlar asla yerinde değildir. Kısmi puan seçeneğiyle: testlerden geçemeyen bir yanıt, yerindeki satırlar için puanın yarısına kadar alabilir. Tam puana yine testler karar verir.';
$string['ordercheck_off'] = 'Hayır';
$string['ordercheck_on'] = 'Evet';
$string['ordercheck_partial'] = 'Evet, sıralama için kısmi puanla';
$string['ordercheckfailed'] = 'Sıra kontrol edilemedi.';
$string['orderresult'] = 'Yerindeki satırlar: {$a->placed} / {$a->total}';
$string['parsons'] = 'Parsons problemi';
$string['parsons_help'] = 'Öğrenciler programı yazmaz: çözümün karıştırılmış satırlarını çeldirici satırlarla birlikte alır ve sıraya koyar (Python\'da doğru girintiyle birlikte). Oluşturdukları program her zamanki gibi testlerle değerlendirilir.';
$string['parsons_label'] = 'Çözüm satırlarını sıraya koyarak yanıtla';
$string['parsonsadd'] = 'Programa ekle: {$a}';
$string['parsonsanswer'] = 'Programınız';
$string['parsonsdown'] = 'Aşağı taşı';
$string['parsonsgap'] = '{$a}. satırdaki boşluk';
$string['parsonshint'] = 'Satırları doğru sırada programınıza sürükleyin veya sona eklemek için bir satıra tıklayın. Bazı satırlar gerekmeyebilir.';
$string['parsonsindent'] = 'Girintiyi artır';
$string['parsonsnosolution'] = 'Bir Parsons problemi için çözüm gerekir: öğrencilerin sıraya koyacağı satırlar çözümden alınır.';
$string['parsonsoutdent'] = 'Girintiyi azalt';
$string['parsonspool'] = 'Satırlar';
$string['parsonsprogram'] = 'Satırlarınızdan oluşan program (Çalıştır, Adım adım ve testler bunu kullanır):';
$string['parsonsremove'] = 'Satırlara geri gönder';
$string['parsonsup'] = 'Yukarı taşı';
$string['passed'] = 'Geçti';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Öğrenci bir kod düzenleyicide program yazar. Testler varsa program her testin girdisiyle Jobe sunucusunda çalıştırılır ve çıktısı doğru olan testlerin oranına göre notlandırılır. Test yoksa öğretmen değerlendirir.';
$string['pluginnameadding'] = 'CodeLab sorusu ekleme';
$string['pluginnameediting'] = 'CodeLab sorusunu düzenleme';
$string['pluginnamesummary'] = 'Öğrenci C, C++, Python, Java veya C# dilinde bir program yazar.';
$string['prefix'] = 'Öncesindeki kod';
$string['prefix_help'] = 'Program çalıştırılırken öğrencinin programından önce eklenen kod, örneğin #include satırları veya bir sınıf başlangıcı. Öğrenciler bunu düzenleyicide görmez.';
$string['privacy:metadata:jobe'] = 'Yanıtlar sorunun testlerinde çalıştırılmak üzere yönetici tarafından ayarlanan Jobe sunucusuna gönderilir. Yanıtların kendisi soru motoru tarafından saklanır.';
$string['privacy:metadata:jobe:code'] = 'Öğrencinin yazdığı program';
$string['privacy:metadata:jobe:stdin'] = 'Bir testin girdisi';
$string['privacy:metadata:pyodide'] = 'Bir denemede Python tarayıcıda çalıştığında (Çalıştır ve Adım adım), öğrencinin tarayıcısı Pyodide (Python yorumlayıcısı) dosyalarını yönetici tarafından ayarlanan adresten, varsayılan olarak jsDelivr CDN üzerinden yükler. Hiçbir yanıt veya girdi gönderilmez.';
$string['privacy:metadata:pyodide:ipaddress'] = 'Herhangi bir indirmede olduğu gibi öğrencinin tarayıcısının IP adresi';
$string['privacy:metadata:runner'] = 'Yönetici bir CodeLab çalıştırıcısı (kendi sunucusu veya barındırılan bir çalıştırıcı) ayarladığında, yanıtlar sorunun testlerinde çalıştırılmak üzere oraya gönderilir (SQL her zaman, diğer diller ise çalıştırıcı çalıştırma ve değerlendirme sunucusu olduğunda) ve denemedeki Çalıştır seçeneği öğrenci girdiyi yazarken programı orada çalıştırır. Çalıştırıcı bir programı yalnızca çalışırken tutar. Yanıtların kendisi soru motoru tarafından saklanır.';
$string['privacy:metadata:runner:code'] = 'Öğrencinin yazdığı program';
$string['privacy:metadata:runner:stdin'] = 'Bir testin girdisi veya öğrencinin yazdığı girdi';
$string['privacy:metadata:runner:userid'] = 'Her kullanıcının aynı anda çalıştırdığı program sayısını sınırlamak için denemedeki Çalıştır işleminde imzalı belirteç içindeki öğrenci kimliği';
$string['rules_violated_forbid'] = 'Forbidden in code: {$a}';
$string['rules_violated_penalty'] = 'Constraint penalty: -{$a}%';
$string['rules_violated_require'] = 'Required in code: {$a}';
$string['rulesforbid'] = 'Forbidden tokens in code';
$string['rulesforbid_help'] = 'Comma-separated identifiers or keywords that must not appear in the student\'s code outside comments and strings (for example sort, sorted, eval, goto).';
$string['rulespenalty'] = 'Constraint violation penalty (%)';
$string['rulespenalty_help'] = 'Percentage deducted from the test mark when a forbidden token is used or a required token is missing (100 gives 0 points).';
$string['rulesrequire'] = 'Required tokens in code';
$string['rulesrequire_help'] = 'Comma-separated identifiers or keywords that must appear in the student\'s code outside comments and strings (for example for, while, malloc).';
$string['runtests'] = 'Testleri çalıştır';
$string['sandboxfailed'] = 'Program sunucuda (Jobe) kontrol edilemedi. Öğretmeniniz değerlendirecektir.';
$string['savefailing'] = 'Çözüm testlerden geçmese bile kaydet';
$string['showtests'] = 'Denemede testler';
$string['showtests_desc'] = 'Öğrenciler göndermeden önce gizli olmayan testleri çalıştırabilir';
$string['solution'] = 'Çözüm';
$string['solution_help'] = 'Öğretmenin programı. Soru kaydedilirken bu program çalıştırılarak boş beklenen test çıktıları doldurulur; öğrenciler inceleme ekranında bunu doğru yanıt olarak görür.';
$string['solutioncheck'] = 'Çözüm kontrolü';
$string['solutioncheck_help'] = 'Soru kaydedilirken çözüm, beklenen çıktısı olan her testin girdisiyle Jobe üzerinde çalıştırılır ve soru yalnızca tüm testlerden geçerse kaydedilir. Örneğin testleri hâlâ yazarken yine de kaydetmek için bu kutuyu işaretleyin. Jobe sunucusuna ulaşılamazsa soru kontrol edilmeden kaydedilir.';
$string['solutionfails'] = 'Çözüm bu testten geçemedi. Çıktısı: {$a}';
$string['solutionis'] = 'Bir çözüm:';
$string['solutionnocompile'] = 'Çözüm derlenmiyor: {$a}';
$string['suffix'] = 'Sonrasındaki kod';
$string['suffix_help'] = 'Program çalıştırılırken öğrencinin programından sonra eklenen kod, örneğin öğrencinin fonksiyonunu çağıran bir main fonksiyonu veya bir sınıfın sonu. Öğrenciler bunu düzenleyicide görmez.';
$string['template'] = 'Başlangıç kodu';
$string['template_help'] = 'Öğrencilerin düzenleyicide başlayacağı kod; boş olabilir.';
$string['test'] = 'Test';
$string['testcode'] = 'Test kodu';
$string['testcode_help'] = 'Bu testte çalıştırılan kod, örneğin öğrencinin yazdığı fonksiyonun bir çağrısı: <code>printf("%d\\n", sum(2, 3));</code> veya <code>print(sum(2, 3))</code>. Boş olabilir.

* Öğrencinin programından sonraki kodda <code>{{TEST}}</code> işaretçisi varsa, örneğin kendi yazdığınız bir main içinde, test kodu onun yerini alır.
* Aksi halde main fonksiyonu olmayan bir C veya C++ programına şu eklenir: <code>int main(void) { test code return 0; }</code>.
* Diğer dillerde test kodu programın sonuna eklenir.

Testin ayrıca bir girdisi de olabilir. Öğrenciler gizli olmayan testlerin test kodunu görür.';
$string['testcoden'] = 'Test {no}: test kodu';
$string['testexpected'] = 'Beklenen çıktı';
$string['testfailed'] = 'Test {$a}: başarısız';
$string['testgot'] = 'Çıktı';
$string['testhidden'] = 'Öğrencilerden gizli';
$string['testinputn'] = 'Test {no}: girdi';
$string['testpassed'] = 'Test {$a}: geçti';
$string['tests'] = 'Testler';
$string['tests_desc'] = 'Her test programa bir girdi verir ve çıktısını beklenen çıktıyla karşılaştırır. Çözümden alınması için beklenen çıktıyı boş bırakın. Test yoksa yanıtları öğretmen değerlendirir.';
$string['testsof'] = '{$a->total} testten {$a->passed} tanesi geçti';
$string['teststdin'] = 'Girdi';
$string['testsummary'] = 'Geçilen testler: {$a->passed} / {$a->total}';
$string['testtime'] = '{$a} sn';
$string['testtimemem'] = '{$a->time} sn, {$a->memory} MB';
$string['testweight'] = 'Ağırlık';
$string['timelimit'] = 'Test başına süre sınırı (sn)';
$string['timelimit_help'] = 'Tek bir testin sürebileceği saniye sayısı: daha uzun süren bir test, çıktısı doğru olsa bile çok yavaş olduğu için başarısız sayılır. Boş: sınır yok. 0.1 ile 30 arasında. Yalnızca CodeLab çalıştırıcısı bir testin ne kadar sürdüğünü bildirir; Jobe üzerinde bu alanın etkisi yoktur ve tek sınır CPU süre sınırıdır. Süre sunucuda ölçülür ve dilin başlama süresini de içerir (Java ve C# için yaklaşık 0.3 saniye), bu yüzden iyi bir çözümün süresinin üzerinde pay bırakın.';
$string['tolerance'] = 'Tolerans';
$string['tolerance_help'] = 'Sayılarla karşılaştırma için: iki sayının yine de eşit sayılacağı en büyük fark (mutlak veya büyük sayıya göre görece). 0.001 ile 3.1416 değeri 3.1414 ile, 1000.4 değeri ise 1000 ile eşleşir.';
$string['tooslow'] = 'Çok yavaş: {$a->time} sn, sınır {$a->limit} sn';
