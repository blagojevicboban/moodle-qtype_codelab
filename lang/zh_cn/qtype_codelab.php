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
 * Strings for component 'qtype_codelab', language 'zh_cn'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = '再添加 {no} 个测试';
$string['aihints'] = 'AI 解释';
$string['aihints_help'] = '当管理员在 TinyMCE 的 CodeLab 插件中启用了“AI 错误解释”时，学生在编译器消息或程序错误下方会看到一个按钮，可请求站点 AI 解释该错误。AI 被指示绝不直接写出修改后的代码。未勾选此项时，测验中绝不会显示该按钮。';
$string['aihints_label'] = '允许学生请 AI 解释编译器消息或错误';
$string['answer'] = '程序';
$string['answerlabel'] = '你的程序（{$a}）';
$string['assist'] = '输入辅助';
$string['badlimit'] = '请输入 1 到 {$a} 之间的整数，或留空以使用默认值。';
$string['badregex'] = '这不是有效的正则表达式。';
$string['badtimelimit'] = '请输入 0.1 到 30 之间的秒数，或留空表示不限制。';
$string['badtolerance'] = '请输入大于或等于 0 的数字，例如 0.001。';
$string['bulkcheck'] = '检查 CodeLab 参考解答';
$string['bulkcheck_again'] = '重新检查';
$string['bulkcheck_bank'] = '题库';
$string['bulkcheck_done'] = '已检查 {$a->total} 道题目：{$a->ok} 道通过全部测试，{$a->problems} 道需要处理。';
$string['bulkcheck_finished'] = '已完成。';
$string['bulkcheck_intro'] = '将逐一在 Jobe 服务器上用各题的测试用例运行本课程题库中 {$a} 道 CodeLab 题目的参考解答。未通过、无法编译或缺少参考解答的题目会排在最前面。此前已检查过的解答结果会从缓存中读取。';
$string['bulkcheck_none'] = '本课程题库中没有 CodeLab 题目。';
$string['bulkcheck_progress'] = '正在检查第 {$a->done} / {$a->total} 题：{$a->name}';
$string['bulkcheck_result'] = '结果';
$string['bulkcheck_start'] = '开始检查';
$string['cachedef_results'] = '已提交程序的测试结果';
$string['check_compile'] = '无法编译';
$string['check_failed'] = '通过 {$a->passed} / {$a->total} 个测试';
$string['check_jobe'] = 'Jobe 无法运行';
$string['check_nosolution'] = '无参考解答';
$string['check_notests'] = '无测试（由教师评分）';
$string['check_ok'] = '通过全部测试（{$a->total}）';
$string['checkfailed'] = '无法在服务器（Jobe）上检查程序，因此本次尝试不计次。请稍后再点击“检查”。';
$string['checkorder'] = '检查顺序';
$string['classanalysis'] = '分析';
$string['classanswers'] = '作答';
$string['classempty'] = '暂无作答。';
$string['classemptyoutput'] = '（无输出）';
$string['classexportcsv'] = '导出 CSV';
$string['classgrades'] = '成绩（百分比）';
$string['classhidenames'] = '隐藏姓名';
$string['classmessages'] = '最常见的编译器消息';
$string['classnotgraded'] = '未评分';
$string['classother'] = '另有 {$a} 份针对该题目其他版本的作答未纳入分析。';
$string['classpending'] = '另有 {$a} 份作答正在检查中，分析结果稍后会自动更新。';
$string['classshownames'] = '显示姓名';
$string['classsimilar'] = '相似提交';
$string['classsimilarnote'] = '按代码结构在本地比对（忽略变量名、空格、注释和初始代码）；做决定前请人工复核作答。';
$string['classstudent'] = '学生 {$a}';
$string['classsummary'] = '作答数：{$a->answers} · 无法编译：{$a->compile} · 测试运行出错：{$a->runtime} · 超时或超内存：{$a->timelimit}';
$string['classtest'] = '测试 {$a->n}：{$a->passed} / {$a->total} 通过';
$string['classtesthidden'] = '测试 {$a->n}（隐藏）：{$a->passed} / {$a->total} 通过';
$string['classunchecked'] = '有 {$a} 份作答无法由服务器检查。';
$string['classwork'] = '班级作答';
$string['classwrong'] = '常见错误输出：';
$string['codeheader'] = '代码';
$string['compare'] = '输出比对方式';
$string['compare_help'] = '程序输出与每个测试期望输出的比对方式。

* **完全一致**：每个字符都必须完全相同。
* **忽略行尾空格**：忽略每行末尾的空格和输出末尾的空行。
* **忽略行顺序**：与上一项相同，但允许各行以任意顺序出现，适用于不含 ORDER BY 的 SQL 查询。
* **数值容差**：按词逐个比对输出，当两个数值之差不超过容差（绝对差或相对于较大数的相对差）时视为相等。词之间的空格和换行不计。
* **正则表达式**：每个测试的期望输出为一个正则表达式（PCRE），须匹配整个输出，例如 <code>Sum: [0-9]+</code>。留空的期望输出将由参考解答生成，作为仅匹配该输出的模式。';
$string['comparison_exact'] = '完全一致';
$string['comparison_numbers'] = '数值容差';
$string['comparison_regex'] = '正则表达式';
$string['comparison_spaces'] = '忽略行尾空格';
$string['comparison_unordered'] = '忽略行顺序（SQL 行）';
$string['compileerror'] = '程序无法编译：';
$string['cputime'] = 'CPU 时间限制（秒）';
$string['cputime_help'] = '评分时单个测试运行的最长 CPU 时间。留空则使用 CodeLab 编辑器插件的设置（默认 5 秒）。最高不超过 {$a} 秒（由管理员设定）。作答中的“运行”和“运行测试”仍使用站点设置。';
$string['distractors'] = '干扰行';
$string['distractors_help'] = '与参考解答的代码行混在一起但不属于正确解答的代码行，每行一条（例如错误的条件或多余的语句）。使用这些行的学生将无法通过测试。';
$string['failed'] = '未通过';
$string['gaps'] = '填空数量';
$string['gaps_help'] = '在 Parsons 题的代码行中隐藏为填空题的表达式数量（0 表示仅排序）。学生在排列代码行顺序的同时需要填写这些空缺。';
$string['gaps_none'] = '0（仅排序）';
$string['hiddensummary'] = '隐藏测试通过：{$a->passed} / {$a->total}';
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
$string['language'] = '编程语言';
$string['maxcputime'] = '单题最大 CPU 时间';
$string['maxcputime_desc'] = '题目向 Jobe 请求的单次运行 CPU 时间上限（秒）。';
$string['maxmemory'] = '单题最大内存';
$string['maxmemory_desc'] = '题目向 Jobe 请求的单次运行内存上限（MB）。';
$string['memorylimit'] = '内存限制（MB）';
$string['memorylimit_help'] = '评分时单个测试运行的最大内存。留空则使用 Jobe 服务器的默认值。最高不超过 {$a} MB（由管理员设定）。启动所需内存更多的语言（如 JavaScript 需要 1000 MB）会自动获得所需内存。在 CodeLab 运行器上，此限制不适用于 Java、C# 和 JavaScript：它们在该处始终获得 256 MB 堆内存。';
$string['noanswer'] = '请先编写程序。';
$string['noassist'] = '关闭代码补全和提示（适用于测验）';
$string['noexpected'] = '请提供期望输出，或提供用于计算期望输出的参考解答。';
$string['ordercheck'] = '检查顺序';
$string['ordercheck_help'] = '学生可以点击“检查顺序”查看有多少行已放在正确位置，但不会显示具体是哪几行。若某行属于学生排列顺序与参考解答的最长公共子序列（在 Python 中还要求缩进相同），则视为位置正确；空格不计，干扰行永远不计为位置正确。选择“给部分分”时：未通过测试的作答可根据位置正确的行数获得最多一半分数，但满分仍由测试决定。';
$string['ordercheck_off'] = '否';
$string['ordercheck_on'] = '是';
$string['ordercheck_partial'] = '是，并按顺序给予部分分';
$string['ordercheckfailed'] = '无法检查顺序。';
$string['orderresult'] = '位置正确的行数：{$a->placed} / {$a->total}';
$string['parsons'] = 'Parsons 题';
$string['parsons_help'] = '学生无需从头编写程序：系统会将参考解答的代码行打乱并与干扰行混合，学生需将它们排成正确顺序（在 Python 中还需设置正确缩进）。拼成的程序将照常通过测试评分。';
$string['parsons_label'] = '通过将参考解答的代码行排成正确顺序来作答';
$string['parsonsadd'] = '添加到程序：{$a}';
$string['parsonsanswer'] = '你的程序';
$string['parsonsdown'] = '下移';
$string['parsonsgap'] = '第 {$a} 行的填空';
$string['parsonshint'] = '按正确顺序将代码行拖入你的程序，或点击某一行将其添加到末尾。部分代码行可能不需要使用。';
$string['parsonsindent'] = '增加缩进';
$string['parsonsnosolution'] = 'Parsons 题需要提供参考解答：学生排列的正是参考解答中的代码行。';
$string['parsonsoutdent'] = '减少缩进';
$string['parsonspool'] = '备选代码行';
$string['parsonsprogram'] = '由你的代码行组成的程序（运行、单步和测试均使用此程序）：';
$string['parsonsremove'] = '移回备选区';
$string['parsonsup'] = '上移';
$string['passed'] = '通过';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = '学生在代码编辑器中编写程序。如果配置了测试，程序将在 Jobe 服务器上按各测试的输入运行，并根据输出正确的测试比例评分；如果没有测试，则由教师手动评分。';
$string['pluginnameadding'] = '添加 CodeLab 题目';
$string['pluginnameediting'] = '编辑 CodeLab 题目';
$string['pluginnamesummary'] = '学生使用 C、C++、Python、Java 或 C# 编写程序。';
$string['prefix'] = '前置代码';
$string['prefix_help'] = '运行时自动添加到学生程序之前的代码，例如 #include 语句或类的开头。学生在编辑器中看不到这部分代码。';
$string['privacy:metadata:jobe'] = '学生作答会发送到管理员配置的 Jobe 服务器，用于运行题目测试。作答内容本身由题库引擎保存。';
$string['privacy:metadata:jobe:code'] = '学生编写的程序代码';
$string['privacy:metadata:jobe:stdin'] = '测试的输入数据';
$string['privacy:metadata:pyodide'] = '当 Python 在作答期间于浏览器中运行时（运行和单步），学生浏览器会从管理员配置的地址加载 Pyodide（Python 解释器），默认为 jsDelivr CDN。不会发送任何作答内容或输入。';
$string['privacy:metadata:pyodide:ipaddress'] = '学生浏览器的 IP 地址（与任何普通下载相同）';
$string['privacy:metadata:runner'] = '当管理员配置了 CodeLab 运行器（自建或托管）时，作答会发送到该运行器以执行题目测试（SQL 始终如此，其他语言在运行器作为运行与评分服务器时如此），作答中的“运行”也会在学生键入输入时在该运行器上执行程序。运行器仅在运行期间保留程序。作答内容本身由题库引擎保存。';
$string['privacy:metadata:runner:code'] = '学生编写的程序代码';
$string['privacy:metadata:runner:stdin'] = '测试输入或学生键入的输入';
$string['privacy:metadata:runner:userid'] = '作答中用于“运行”的签名令牌内的学生 ID，用于限制每个用户同时运行的程序数量';
$string['rules_violated_forbid'] = 'Forbidden in code: {$a}';
$string['rules_violated_penalty'] = 'Constraint penalty: -{$a}%';
$string['rules_violated_require'] = 'Required in code: {$a}';
$string['rulesforbid'] = 'Forbidden tokens in code';
$string['rulesforbid_help'] = 'Comma-separated identifiers or keywords that must not appear in the student\'s code outside comments and strings (for example sort, sorted, eval, goto).';
$string['rulespenalty'] = 'Constraint violation penalty (%)';
$string['rulespenalty_help'] = 'Percentage deducted from the test mark when a forbidden token is used or a required token is missing (100 gives 0 points).';
$string['rulesrequire'] = 'Required tokens in code';
$string['rulesrequire_help'] = 'Comma-separated identifiers or keywords that must appear in the student\'s code outside comments and strings (for example for, while, malloc).';
$string['runtests'] = '运行测试';
$string['sandboxfailed'] = '无法在服务器（Jobe）上检查程序。将由教师为你评分。';
$string['savefailing'] = '即使参考解答未通过测试也保存';
$string['showtests'] = '作答时运行测试';
$string['showtests_desc'] = '允许学生在提交前运行非隐藏测试';
$string['solution'] = '参考解答';
$string['solution_help'] = '教师编写的程序。保存题目时，系统会运行它来自动填充留空的测试期望输出；学生在回顾作答时会将其作为正确答案查看。';
$string['solutioncheck'] = '检查参考解答';
$string['solutioncheck_help'] = '保存题目时，系统会在 Jobe 上使用每个已填写期望输出的测试来运行参考解答，仅当全部通过时才保存题目。勾选此项可强制保存（例如测试尚未写完时）。若无法连接 Jobe，则跳过检查直接保存。';
$string['solutionfails'] = '参考解答未通过此测试。实际输出：{$a}';
$string['solutionis'] = '参考解答：';
$string['solutionnocompile'] = '参考解答无法编译：{$a}';
$string['suffix'] = '后置代码';
$string['suffix_help'] = '运行时自动添加到学生程序之后的代码，例如调用学生函数的 main 函数或类的结尾。学生在编辑器中看不到这部分代码。';
$string['template'] = '初始代码';
$string['template_help'] = '学生开始作答时编辑器中预置的代码，可留空。';
$string['test'] = '测试';
$string['testcode'] = '测试代码';
$string['testcode_help'] = '在此测试中运行的代码，例如调用学生编写的函数：<code>printf("%d\\n", sum(2, 3));</code> 或 <code>print(sum(2, 3))</code>。可留空。

* 如果学生程序后的后置代码包含标记 <code>{{TEST}}</code>（例如在你编写的 main 函数中），测试代码将替换该标记。
* 否则，没有 main 函数的 C 或 C++ 程序会自动包裹为：<code>int main(void) { test code return 0; }</code>。
* 在其他语言中，测试代码会追加到程序末尾。

测试也可以包含输入数据。学生可以看到非隐藏测试的测试代码。';
$string['testcoden'] = '测试 {no}：测试代码';
$string['testexpected'] = '期望输出';
$string['testfailed'] = '测试 {$a}：未通过';
$string['testgot'] = '实际输出';
$string['testhidden'] = '对学生隐藏';
$string['testinputn'] = '测试 {no}：输入';
$string['testpassed'] = '测试 {$a}：通过';
$string['tests'] = '测试';
$string['tests_desc'] = '每个测试向程序提供一组输入，并将其输出与期望输出进行比对。期望输出留空时将从参考解答自动生成。如果没有测试，则由教师手动评分。';
$string['testsof'] = '通过 {$a->passed} / {$a->total} 个测试';
$string['teststdin'] = '输入';
$string['testsummary'] = '测试通过：{$a->passed} / {$a->total}';
$string['testtime'] = '{$a} 秒';
$string['testtimemem'] = '{$a->time} 秒，{$a->memory} MB';
$string['testweight'] = '权重';
$string['timelimit'] = '单个测试时间限制（秒）';
$string['timelimit_help'] = '单个测试允许运行的最长秒数：超过此时间即使输出正确也会判定为过慢而失败。留空表示不限制。范围 0.1 到 30。仅 CodeLab 运行器会报告测试耗时；在 Jobe 上此项无效，仅 CPU 时间限制生效。时间在服务器端测量，包含语言启动耗时（Java 和 C# 约需 0.3 秒），因此请为优秀解答留出余量。';
$string['tolerance'] = '容差';
$string['tolerance_help'] = '用于数值比对：两个数仍被视为相等的最大差值（绝对差或相对于较大数的相对差）。设为 0.001 时，3.1416 与 3.1414 匹配，1000.4 与 1000 匹配。';
$string['tooslow'] = '运行过慢：{$a->time} 秒，限制为 {$a->limit} 秒';
