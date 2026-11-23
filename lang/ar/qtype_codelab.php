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
 * Strings for component 'qtype_codelab', language 'ar'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'إضافة {no} اختبارات أخرى';
$string['aihints'] = 'تفسيرات الذكاء الاصطناعي';
$string['aihints_help'] = 'عندما يفعّل المدير ميزة تفسيرات الذكاء الاصطناعي للأخطاء في إضافة CodeLab لمحرّر TinyMCE، يظهر للطلاب زر أسفل رسالة المصرّف أو خطأ برنامجهم لطلب تفسير من الذكاء الاصطناعي في الموقع. يُوجَّه الذكاء الاصطناعي لعدم كتابة الحل أبداً. ومن دون تفعيل هذا الخيار لا يظهر الزر في الاختبار أبداً.';
$string['aihints_label'] = 'يُسمح للطلاب بسؤال الذكاء الاصطناعي لتفسير رسالة المصرّف أو الخطأ';
$string['answer'] = 'البرنامج';
$string['answerlabel'] = 'برنامجك ({$a})';
$string['assist'] = 'مساعدة الكتابة';
$string['badlimit'] = 'أدخل عدداً صحيحاً من 1 إلى {$a}، أو اتركه فارغاً لاستخدام القيمة الافتراضية.';
$string['badregex'] = 'هذا ليس تعبيراً نمطياً صالحاً.';
$string['badtimelimit'] = 'أدخل عدداً من الثواني من 0.1 إلى 30، أو اتركه فارغاً من دون حد.';
$string['badtolerance'] = 'أدخل عدداً يساوي 0 أو أكبر، مثل 0.001.';
$string['bulkcheck'] = 'فحص حلول CodeLab';
$string['bulkcheck_again'] = 'إعادة الفحص';
$string['bulkcheck_bank'] = 'بنك الأسئلة';
$string['bulkcheck_done'] = 'تم فحص {$a->total} سؤالاً: {$a->ok} اجتازت جميع اختباراتها، و{$a->problems} تحتاج إلى مراجعة.';
$string['bulkcheck_finished'] = 'اكتمل الفحص.';
$string['bulkcheck_intro'] = 'يُشغَّل حلّ كل سؤال من أسئلة CodeLab البالغ عددها {$a} في بنوك أسئلة هذا المقرر على خادم Jobe مقابل اختبارات السؤال، واحداً تلو الآخر. تُعرض الأسئلة التي يفشل حلّها أو لا يُصرَّف أو يفتقد الحل أولاً. وتُؤخذ نتائج الحلول التي فُحصت سابقاً من الذاكرة المؤقتة.';
$string['bulkcheck_none'] = 'لا توجد أسئلة CodeLab في بنوك أسئلة هذا المقرر.';
$string['bulkcheck_progress'] = 'جارٍ الفحص {$a->done} من {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'النتيجة';
$string['bulkcheck_start'] = 'بدء الفحص';
$string['cachedef_results'] = 'نتائج اختبارات البرامج المُرسَلة';
$string['check_compile'] = 'لا يُصرَّف';
$string['check_failed'] = 'يجتاز {$a->passed} من {$a->total} اختبارات';
$string['check_jobe'] = 'تعذّر على Jobe تشغيله';
$string['check_nosolution'] = 'لا يوجد حل';
$string['check_notests'] = 'لا توجد اختبارات (يُقيّمه المعلم)';
$string['check_ok'] = 'يجتاز جميع الاختبارات ({$a->total})';
$string['checkfailed'] = 'تعذّر فحص البرنامج على الخادم (Jobe)، لذا لا تُحتسب هذه المحاولة. اضغط على «تحقق» مرة أخرى بعد لحظة.';
$string['checkorder'] = 'التحقق من الترتيب';
$string['classanalysis'] = 'التحليل';
$string['classanswers'] = 'الإجابات';
$string['classempty'] = 'لا توجد إجابات بعد.';
$string['classemptyoutput'] = '(لا يوجد إخراج)';
$string['classgrades'] = 'الدرجات (نسبة مئوية)';
$string['classhidenames'] = 'إخفاء الأسماء';
$string['classmessages'] = 'أكثر رسائل المصرّف تكراراً';
$string['classnotgraded'] = 'غير مُقيَّم';
$string['classother'] = 'لم تُحلَّل {$a} إجابات لإصدارات أخرى من السؤال.';
$string['classpending'] = 'يجري فحص {$a} إجابات أخرى؛ سيكتمل التحليل بعد لحظة.';
$string['classshownames'] = 'إظهار الأسماء';
$string['classsimilar'] = 'تسليمات متشابهة';
$string['classsimilarnote'] = 'تُقارن محلياً حسب بنية الشيفرة (مع تجاهل أسماء المتغيرات والمسافات والتعليقات والشيفرة الابتدائية)؛ راجع الإجابات قبل اتخاذ القرار.';
$string['classstudent'] = 'الطالب {$a}';
$string['classsummary'] = 'الإجابات: {$a->answers} · لا تُصرَّف: {$a->compile} · خطأ في اختبار: {$a->runtime} · تجاوز حدّ الوقت أو الذاكرة: {$a->timelimit}';
$string['classtest'] = 'الاختبار {$a->n}: نجح {$a->passed} من {$a->total}';
$string['classtesthidden'] = 'الاختبار {$a->n} (مخفي): نجح {$a->passed} من {$a->total}';
$string['classunchecked'] = 'تعذّر على الخادم فحص {$a} إجابات.';
$string['classwork'] = 'عمل الصف';
$string['classwrong'] = 'المخرجات الخاطئة المتكررة:';
$string['codeheader'] = 'الشيفرة';
$string['compare'] = 'مقارنة الإخراج';
$string['compare_help'] = 'كيفية مقارنة إخراج البرنامج بالإخراج المتوقع لكل اختبار.

* **مطابقة تامة**: يُحتسب كل حرف.
* **تجاهل المسافات في النهاية**: تُهمَل المسافات في نهاية الأسطر والأسطر الفارغة في النهاية.
* **الأسطر بأي ترتيب**: مثل الخيار السابق، لكن يمكن أن تظهر الأسطر بأي ترتيب، وهو مناسب لاستعلامات SQL من دون ORDER BY.
* **الأرقام مع هامش تفاوت**: تُقارن المخرجات كلمة بكلمة، ويُعدّ الرقمان متساويين إذا لم يتجاوز الفرق بينهما هامش التفاوت (مطلقاً، أو نسبياً إلى الرقم الأكبر). لا تُحتسب المسافات وفواصل الأسطر بين الكلمات.
* **تعبير نمطي**: يكون الإخراج المتوقع لكل اختبار تعبيراً نمطياً (PCRE) يجب أن يطابق الإخراج كاملاً، مثل <code>Sum: [0-9]+</code>. تُملأ المخرجات المتوقعة الفارغة من الحل كأنماط لا تطابق سوى ذلك الإخراج.';
$string['comparison_exact'] = 'مطابقة تامة';
$string['comparison_numbers'] = 'الأرقام مع هامش تفاوت';
$string['comparison_regex'] = 'تعبير نمطي';
$string['comparison_spaces'] = 'تجاهل المسافات في النهاية';
$string['comparison_unordered'] = 'الأسطر بأي ترتيب (صفوف SQL)';
$string['compileerror'] = 'البرنامج لا يُصرَّف:';
$string['cputime'] = 'حدّ وقت المعالج (بالثواني)';
$string['cputime_help'] = 'أقصى وقت للمعالج لتشغيل اختبار واحد عند تقييم الإجابة. إذا تُرك فارغاً: يُستخدم إعداد إضافة محرّر CodeLab (5 ثوانٍ ما لم يُغيَّر). الحد الأقصى هو {$a} ثانية (يحدّده المدير). يحتفظ زرا «تشغيل» و«تشغيل الاختبارات» أثناء المحاولة بإعداد الموقع.';
$string['distractors'] = 'الأسطر المشتِّتة';
$string['distractors_help'] = 'أسطر تُخلط مع أسطر الحل ولكنها لا تنتمي إليه، سطر واحد في كل سطر (مثل شرط خاطئ أو سطر غير مطلوب). الطلاب الذين يستخدمونها لا يجتازون الاختبارات.';
$string['failed'] = 'فشل';
$string['gaps'] = 'فراغات الملء';
$string['gaps_help'] = 'عدد التعبيرات المخفية كفراغات للملء داخل أسطر مسألة Parsons (القيمة 0 للترتيب فقط). يملؤها الطلاب أثناء ترتيب الأسطر.';
$string['gaps_none'] = '0 (الترتيب فقط)';
$string['hiddensummary'] = 'الاختبارات المخفية المجتازة: {$a->passed} من {$a->total}';
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
$string['language'] = 'لغة البرمجة';
$string['maxcputime'] = 'أقصى وقت للمعالج للسؤال';
$string['maxcputime_desc'] = 'لا يمكن للأسئلة أن تطلب من Jobe وقت معالج أكبر من هذا، بالثواني لكل تشغيل.';
$string['maxmemory'] = 'أقصى ذاكرة للسؤال';
$string['maxmemory_desc'] = 'لا يمكن للأسئلة أن تطلب من Jobe ذاكرة أكبر من هذا، بالميغابايت لكل تشغيل.';
$string['memorylimit'] = 'حدّ الذاكرة (ميغابايت)';
$string['memorylimit_help'] = 'أقصى ذاكرة لتشغيل اختبار واحد عند تقييم الإجابة. إذا تُرك فارغاً: تُستخدم القيمة الافتراضية لخادم Jobe. الحد الأقصى هو {$a} ميغابايت (يحدّده المدير). اللغة التي تحتاج ذاكرة أكبر للبدء (مثل JavaScript التي تحتاج 1000 ميغابايت) تحصل على ما تحتاجه. وعلى مشغّل CodeLab لا ينطبق هذا الحد على Java وC# وJavaScript: فهي تحصل هناك دائماً على كومة ذاكرة بحجم 256 ميغابايت.';
$string['noanswer'] = 'اكتب برنامجاً أولاً.';
$string['noassist'] = 'إيقاف الإكمال التلقائي والتلميحات (للاختبارات)';
$string['noexpected'] = 'أدخل الإخراج المتوقع، أو أدخل حلاً لحسابه منه.';
$string['ordercheck'] = 'التحقق من الترتيب';
$string['ordercheck_help'] = 'يمكن للطلاب الضغط على «التحقق من الترتيب» لمعرفة عدد الأسطر الموضوعة في مكانها الصحيح، من دون إظهار أيّها الصحيح. يُعدّ السطر في مكانه الصحيح إذا انتمى إلى أطول متتالية مشتركة بين أسطر الطالب وأسطر الحل (وفي Python بنفس المسافة البادئة أيضاً)؛ لا تُحتسب المسافات ولا تُعدّ الأسطر المشتِّتة في مكانها أبداً. مع جزء من الدرجة: تحصل الإجابة التي تفشل في الاختبارات على ما يصل إلى نصف الدرجة مقابل الأسطر الموضوعة في مكانها الصحيح. وتبقى الاختبارات هي التي تقرّر الدرجة الكاملة.';
$string['ordercheck_off'] = 'لا';
$string['ordercheck_on'] = 'نعم';
$string['ordercheck_partial'] = 'نعم، مع جزء من الدرجة مقابل الترتيب';
$string['ordercheckfailed'] = 'تعذّر التحقق من الترتيب.';
$string['orderresult'] = 'الأسطر في مكانها الصحيح: {$a->placed} من {$a->total}';
$string['parsons'] = 'مسألة Parsons';
$string['parsons_help'] = 'لا يكتب الطلاب البرنامج من الصفر: بل يحصلون على أسطر الحل مبعثرة مع الأسطر المشتِّتة، ثم يرتّبونها (وفي Python مع المسافات البادئة الصحيحة أيضاً). ويُقيَّم البرنامج الذي يكوّنونه بواسطة الاختبارات كالمعتاد.';
$string['parsons_label'] = 'الإجابة عن طريق ترتيب أسطر الحل';
$string['parsonsadd'] = 'إضافة إلى البرنامج: {$a}';
$string['parsonsanswer'] = 'برنامجك';
$string['parsonsdown'] = 'تحريك لأسفل';
$string['parsonsgap'] = 'فراغ في السطر {$a}';
$string['parsonshint'] = 'اسحب الأسطر إلى برنامجك بالترتيب الصحيح، أو انقر على سطر لإضافته في النهاية. قد لا تحتاج إلى بعض الأسطر.';
$string['parsonsindent'] = 'زيادة المسافة البادئة';
$string['parsonsnosolution'] = 'تحتاج مسألة Parsons إلى الحل: فأسطره هي ما يرتّبه الطلاب.';
$string['parsonsoutdent'] = 'إنقاص المسافة البادئة';
$string['parsonspool'] = 'الأسطر';
$string['parsonsprogram'] = 'البرنامج المكوَّن من أسطرك (تستخدمه أوامر التشغيل والخطوة والاختبارات):';
$string['parsonsremove'] = 'إعادة إلى الأسطر';
$string['parsonsup'] = 'تحريك لأعلى';
$string['passed'] = 'ناجح';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'يكتب الطالب برنامجاً في محرّر شيفرة. عند وجود اختبارات، يُشغَّل البرنامج على خادم Jobe بمدخلات كل اختبار ويُقيَّم بحسب نسبة الاختبارات التي يكون إخراجها صحيحاً. ومن دون اختبارات، يقيّمه المعلم.';
$string['pluginnameadding'] = 'إضافة سؤال CodeLab';
$string['pluginnameediting'] = 'تعديل سؤال CodeLab';
$string['pluginnamesummary'] = 'يكتب الطالب برنامجاً بلغة C أو C++ أو Python أو Java أو C#.';
$string['prefix'] = 'شيفرة قبل الحل';
$string['prefix_help'] = 'شيفرة تُضاف قبل برنامج الطالب عند تشغيله، مثل أسطر #include أو بداية صنف (class). لا يراها الطلاب في المحرّر.';
$string['privacy:metadata:jobe'] = 'تُرسل الإجابات إلى خادم Jobe الذي يحدّده المدير لتشغيلها على اختبارات السؤال. أما الإجابات نفسها فتُحفظ في محرّك الأسئلة.';
$string['privacy:metadata:jobe:code'] = 'البرنامج الذي كتبه الطالب';
$string['privacy:metadata:jobe:stdin'] = 'مدخلات الاختبار';
$string['privacy:metadata:pyodide'] = 'عندما يعمل Python في المتصفح أثناء المحاولة (تشغيل وخطوة)، يحمّل متصفح الطالب Pyodide (مفسّر Python) من العنوان الذي يحدّده المدير، وهو افتراضياً شبكة jsDelivr CDN. لا تُرسل أي إجابة أو مدخلات.';
$string['privacy:metadata:pyodide:ipaddress'] = 'عنوان IP لمتصفح الطالب، كما في أي عملية تنزيل';
$string['privacy:metadata:runner'] = 'عندما يضبط المدير مشغّل CodeLab (خاصاً به أو مستضافاً)، تُرسل الإجابات إليه لتشغيلها على اختبارات السؤال (دائماً للغة SQL، ولللغات الأخرى عندما يكون المشغّل هو خادم التشغيل والتقييم)، كما يُشغَّل البرنامج هناك عند الضغط على «تشغيل» أثناء المحاولة بينما يكتب الطالب مدخلاته. يحتفظ المشغّل بالبرنامج أثناء تشغيله فقط، بينما تُحفظ الإجابات نفسها في محرّك الأسئلة.';
$string['privacy:metadata:runner:code'] = 'البرنامج الذي كتبه الطالب';
$string['privacy:metadata:runner:stdin'] = 'مدخلات الاختبار، أو المدخلات التي يكتبها الطالب';
$string['privacy:metadata:runner:userid'] = 'معرّف الطالب، داخل رمز موقَّع لعملية التشغيل أثناء المحاولة، لتحديد عدد البرامج التي يشغّلها كل مستخدم في آن واحد';
$string['runtests'] = 'تشغيل الاختبارات';
$string['sandboxfailed'] = 'تعذّر فحص البرنامج على الخادم (Jobe). سيقوم معلمك بتقييمه.';
$string['savefailing'] = 'الحفظ حتى لو فشل الحل في الاختبارات';
$string['showtests'] = 'الاختبارات أثناء المحاولة';
$string['showtests_desc'] = 'يمكن للطلاب تشغيل الاختبارات غير المخفية قبل التسليم';
$string['solution'] = 'الحل';
$string['solution_help'] = 'برنامج المعلم. تُملأ المخرجات المتوقعة الفارغة للاختبارات بتشغيله عند حفظ السؤال؛ ويراه الطلاب كإجابة صحيحة في المراجعة.';
$string['solutioncheck'] = 'فحص الحل';
$string['solutioncheck_help'] = 'عند حفظ السؤال، يُشغَّل الحل على Jobe بمدخلات كل اختبار له إخراج متوقع، ولا يُحفظ السؤال إلا إذا اجتازها جميعاً. فعّل هذا الخيار للحفظ على أي حال، مثلاً بينما لا تزال تكتب الاختبارات. وإذا تعذّر الوصول إلى Jobe، يُحفظ السؤال من دون فحص.';
$string['solutionfails'] = 'فشل الحل في هذا الاختبار. إخراجه: {$a}';
$string['solutionis'] = 'حلّ مقترح:';
$string['solutionnocompile'] = 'الحل لا يُصرَّف: {$a}';
$string['suffix'] = 'شيفرة بعد الحل';
$string['suffix_help'] = 'شيفرة تُضاف بعد برنامج الطالب عند تشغيله، مثل دالة main تستدعي دالة الطالب، أو نهاية صنف (class). لا يراها الطلاب في المحرّر.';
$string['template'] = 'الشيفرة الابتدائية';
$string['template_help'] = 'الشيفرة التي يبدأ منها الطلاب في المحرّر؛ يمكن أن تكون فارغة.';
$string['test'] = 'اختبار';
$string['testcode'] = 'شيفرة الاختبار';
$string['testcode_help'] = 'شيفرة تُشغَّل في هذا الاختبار، مثل استدعاء الدالة التي يكتبها الطالب: <code>printf("%d\\n", sum(2, 3));</code> أو <code>print(sum(2, 3))</code>. يمكن أن تكون فارغة.

* إذا كانت الشيفرة بعد برنامج الطالب تحتوي على العلامة <code>{{TEST}}</code>، مثلاً داخل دالة main تكتبها أنت، تحل شيفرة الاختبار محلّها.
* وإلا يحصل برنامج C أو C++ الذي لا يحتوي على main على واحدة تلقائياً: <code>int main(void) { test code return 0; }</code>.
* وفي اللغات الأخرى تُضاف شيفرة الاختبار في نهاية البرنامج.

يمكن أن يحتوي الاختبار أيضاً على مدخلات. ويرى الطلاب شيفرة الاختبار للاختبارات غير المخفية.';
$string['testcoden'] = 'الاختبار {no}: شيفرة الاختبار';
$string['testexpected'] = 'الإخراج المتوقع';
$string['testfailed'] = 'الاختبار {$a}: فشل';
$string['testgot'] = 'الإخراج';
$string['testhidden'] = 'مخفي عن الطلاب';
$string['testinputn'] = 'الاختبار {no}: الإدخال';
$string['testpassed'] = 'الاختبار {$a}: ناجح';
$string['tests'] = 'الاختبارات';
$string['tests_desc'] = 'يزوّد كل اختبار البرنامج بمدخلات ويقارن إخراجه بالإخراج المتوقع. اترك الإخراج المتوقع فارغاً لأخذه من الحل. ومن دون اختبارات، يقيّم المعلم الإجابات.';
$string['testsof'] = 'اجتاز {$a->passed} من {$a->total} اختبارات';
$string['teststdin'] = 'الإدخال';
$string['testsummary'] = 'الاختبارات المجتازة: {$a->passed} من {$a->total}';
$string['testtime'] = '{$a} ث';
$string['testtimemem'] = '{$a->time} ث، {$a->memory} ميغابايت';
$string['testweight'] = 'الوزن';
$string['timelimit'] = 'حدّ الوقت لكل اختبار (ث)';
$string['timelimit_help'] = 'عدد الثواني التي يجوز لاختبار واحد أن يستغرقها: الاختبار الذي يستغرق وقتاً أطول يفشل لكونه بطيئاً جداً، حتى لو كان إخراجه صحيحاً. إذا تُرك فارغاً: بلا حد. من 0.1 إلى 30. وحده مشغّل CodeLab يُبلغ عن مدة تشغيل الاختبار؛ أما على Jobe فلا أثر لهذا الحقل، ويكون حدّ وقت المعالج هو الحد الوحيد. يُقاس الوقت على الخادم ويشمل بدء تشغيل اللغة (نحو 0.3 ثانية للغتي Java وC#)، لذا اترك هامشاً أعلى من زمن الحل الجيد.';
$string['tolerance'] = 'هامش التفاوت';
$string['tolerance_help'] = 'لمقارنة الأرقام: أكبر فرق بين رقمين لا يزال يُعدّ تساوياً، سواء كان مطلقاً أو نسبياً إلى الرقم الأكبر. مع القيمة 0.001، يطابق 3.1416 الرقم 3.1414، ويطابق 1000.4 الرقم 1000.';
$string['tooslow'] = 'بطيء جداً: {$a->time} ث، والحدّ هو {$a->limit} ث';
