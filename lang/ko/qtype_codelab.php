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
 * Strings for component 'qtype_codelab', language 'ko'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = '테스트 {no}개 추가';
$string['aihints'] = 'AI 설명';
$string['aihints_help'] = '관리자가 TinyMCE용 CodeLab의 오류 AI 설명 기능을 켠 경우, 학생은 컴파일러 메시지나 프로그램 오류 아래에 표시되는 버튼을 눌러 사이트의 AI에게 설명을 요청할 수 있습니다. AI는 수정된 코드를 작성하지 않도록 지시받습니다. 이 옵션을 선택하지 않으면 퀴즈에 해당 버튼이 표시되지 않습니다.';
$string['aihints_label'] = '학생이 AI에게 컴파일러 메시지나 오류 설명을 요청할 수 있음';
$string['answer'] = '프로그램';
$string['answerlabel'] = '내 프로그램 ({$a})';
$string['assist'] = '입력 보조';
$string['badlimit'] = '1에서 {$a} 사이의 정수를 입력하거나, 기본값을 사용하려면 비워 두세요.';
$string['badregex'] = '올바른 정규 표현식이 아닙니다.';
$string['badtimelimit'] = '0.1에서 30 사이의 초 단위 숫자를 입력하거나, 제한 없이 사용하려면 비워 두세요.';
$string['badtolerance'] = '0 이상의 숫자를 입력하세요(예: 0.001).';
$string['bulkcheck'] = 'CodeLab 모범 답안 검사';
$string['bulkcheck_again'] = '다시 검사';
$string['bulkcheck_bank'] = '문제 은행';
$string['bulkcheck_done'] = '총 {$a->total}개 문제 검사 완료: {$a->ok}개 모두 통과, {$a->problems}개 확인 필요.';
$string['bulkcheck_finished'] = '완료되었습니다.';
$string['bulkcheck_intro'] = '이 강좌의 문제 은행에 있는 {$a}개의 CodeLab 문제 모범 답안을 Jobe 서버에서 각 문제의 테스트로 하나씩 실행합니다. 실패하거나 컴파일되지 않거나 모범 답안이 없는 문제가 먼저 표시됩니다. 이전에 검사한 답안의 결과는 캐시에서 불러옵니다.';
$string['bulkcheck_none'] = '이 강좌의 문제 은행에 CodeLab 문제가 없습니다.';
$string['bulkcheck_progress'] = '{$a->total}개 중 {$a->done}개 검사 중: {$a->name}';
$string['bulkcheck_result'] = '결과';
$string['bulkcheck_start'] = '검사 시작';
$string['cachedef_results'] = '제출된 프로그램의 테스트 결과';
$string['check_compile'] = '컴파일되지 않음';
$string['check_failed'] = '테스트 {$a->total}개 중 {$a->passed}개 통과';
$string['check_jobe'] = 'Jobe에서 실행할 수 없음';
$string['check_nosolution'] = '모범 답안 없음';
$string['check_notests'] = '테스트 없음 (교수자 채점)';
$string['check_ok'] = '모든 테스트 통과 ({$a->total}개)';
$string['checkfailed'] = '서버(Jobe)에서 프로그램을 검사할 수 없었으므로 이번 시도는 반영되지 않습니다. 잠시 후 \'확인\'을 다시 누르세요.';
$string['checkorder'] = '순서 확인';
$string['classanalysis'] = '분석';
$string['classanswers'] = '답안';
$string['classempty'] = '아직 제출된 답안이 없습니다.';
$string['classemptyoutput'] = '(출력 없음)';
$string['classgrades'] = '성적 (백분율)';
$string['classhidenames'] = '이름 숨기기';
$string['classmessages'] = '가장 빈번한 컴파일러 메시지';
$string['classnotgraded'] = '미채점';
$string['classother'] = '문제의 다른 버전에 대한 답안 {$a}개는 분석에서 제외되었습니다.';
$string['classpending'] = '{$a}개의 답안을 추가로 검사 중입니다. 잠시 후 분석에 반영됩니다.';
$string['classshownames'] = '이름 표시';
$string['classsimilar'] = '유사한 제출물';
$string['classsimilarnote'] = '변수 이름, 공백, 주석 및 시작 코드를 제외하고 코드 구조로 로컬 비교한 결과입니다. 판단하기 전에 답안을 직접 확인하세요.';
$string['classstudent'] = '학생 {$a}';
$string['classsummary'] = '답안: {$a->answers} · 컴파일 실패: {$a->compile} · 테스트 중 오류: {$a->runtime} · 시간 또는 메모리 제한 초과: {$a->timelimit}';
$string['classtest'] = '테스트 {$a->n}: {$a->total}명 중 {$a->passed}명 통과';
$string['classtesthidden'] = '테스트 {$a->n} (숨김): {$a->total}명 중 {$a->passed}명 통과';
$string['classunchecked'] = '{$a}개의 답안을 서버에서 검사할 수 없었습니다.';
$string['classwork'] = '학급 과제';
$string['classwrong'] = '자주 나오는 오답 출력:';
$string['codeheader'] = '코드';
$string['compare'] = '출력 비교 방식';
$string['compare_help'] = '프로그램의 출력을 각 테스트의 예상 출력과 비교하는 방법입니다.

* **정확히 일치**: 모든 문자가 정확히 일치해야 합니다.
* **줄 끝 공백 무시**: 각 줄 끝의 공백과 출력 끝의 빈 줄은 무시합니다.
* **줄 순서 무관**: 위와 동일하지만, ORDER BY가 없는 SQL 쿼리 등을 위해 줄의 순서를 따지지 않습니다.
* **오차 범위 내 숫자 비교**: 출력을 단어 단위로 비교하며, 두 숫자의 차이가 허용 오차(절대 오차 또는 큰 수에 대한 상대 오차) 이하이면 같은 것으로 봅니다. 단어 사이의 공백과 줄바꿈은 무시합니다.
* **정규 표현식**: 각 테스트의 예상 출력을 전체 출력과 일치해야 하는 정규 표현식(PCRE)으로 해석합니다(예: <code>Sum: [0-9]+</code>). 비어 있는 예상 출력은 모범 답안의 출력과만 일치하는 패턴으로 자동 채워집니다.';
$string['comparison_exact'] = '정확히 일치';
$string['comparison_numbers'] = '오차 범위 내 숫자 비교';
$string['comparison_regex'] = '정규 표현식';
$string['comparison_spaces'] = '줄 끝 공백 무시';
$string['comparison_unordered'] = '줄 순서 무관 (SQL 행)';
$string['compileerror'] = '프로그램이 컴파일되지 않습니다:';
$string['cputime'] = 'CPU 시간 제한 (초)';
$string['cputime_help'] = '답안을 채점할 때 테스트 1회 실행에 허용되는 최대 CPU 시간입니다. 비워 두면 CodeLab 편집기 플러그인의 설정(기본 5초)을 따릅니다. 최대 {$a}초(관리자 설정)입니다. 응시 중 \'실행\' 및 \'테스트 실행\'에는 사이트 설정이 적용됩니다.';
$string['distractors'] = '방해 줄 (오답 보기)';
$string['distractors_help'] = '모범 답안의 줄과 섞여 제시되지만 실제 답안에는 포함되지 않는 줄을 한 줄씩 입력하세요(예: 잘못된 조건이나 불필요한 줄). 이를 사용한 학생은 테스트를 통과하지 못합니다.';
$string['failed'] = '실패';
$string['gaps'] = '빈칸 채우기';
$string['gaps_help'] = 'Parsons 문제의 코드 줄에서 빈칸으로 숨길 식(expression)의 개수입니다(0이면 순서 맞추기만 사용). 학생은 줄을 순서대로 배열하면서 빈칸을 채웁니다.';
$string['gaps_none'] = '0 (순서 맞추기만)';
$string['hiddensummary'] = '숨김 테스트 통과: {$a->total}개 중 {$a->passed}개';
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
$string['language'] = '프로그래밍 언어';
$string['maxcputime'] = '문제당 최대 CPU 시간';
$string['maxcputime_desc'] = '문제가 Jobe에 요청할 수 있는 1회 실행당 최대 CPU 시간(초)입니다.';
$string['maxmemory'] = '문제당 최대 메모리';
$string['maxmemory_desc'] = '문제가 Jobe에 요청할 수 있는 1회 실행당 최대 메모리(MB)입니다.';
$string['memorylimit'] = '메모리 제한 (MB)';
$string['memorylimit_help'] = '답안을 채점할 때 테스트 1회 실행에 허용되는 최대 메모리입니다. 비워 두면 Jobe 서버의 기본값을 따릅니다. 최대 {$a} MB(관리자 설정)입니다. 시작에 더 많은 메모리가 필요한 언어(JavaScript는 1000 MB 필요)에는 필요한 만큼 할당됩니다. CodeLab runner에서는 이 제한이 Java, C#, JavaScript에 적용되지 않으며 항상 256 MB 힙이 제공됩니다.';
$string['noanswer'] = '먼저 프로그램을 작성하세요.';
$string['noassist'] = '코드 자동 완성 및 힌트 끄기 (시험용)';
$string['noexpected'] = '예상 출력을 입력하거나, 이를 계산할 모범 답안을 입력하세요.';
$string['ordercheck'] = '순서 확인';
$string['ordercheck_help'] = '학생이 \'순서 확인\'을 눌러 제자리에 있는 줄이 몇 개인지 확인할 수 있습니다(어느 줄인지는 알려주지 않음). 학생의 줄과 모범 답안 줄의 최장 공통 부분 수열에 속하는 줄(Python에서는 들여쓰기도 일치)이 제자리에 있는 것으로 계산되며, 공백은 무시되고 방해 줄은 제자리에 있는 것으로 치지 않습니다. \'부분 점수 부여\'를 선택하면 테스트에 실패해도 제자리에 있는 줄 비율에 따라 최대 절반의 점수를 받을 수 있습니다. 만점은 여전히 테스트로 결정됩니다.';
$string['ordercheck_off'] = '아니요';
$string['ordercheck_on'] = '예';
$string['ordercheck_partial'] = '예, 순서에 대한 부분 점수 부여';
$string['ordercheckfailed'] = '순서를 확인할 수 없었습니다.';
$string['orderresult'] = '제자리에 있는 줄: {$a->total}개 중 {$a->placed}개';
$string['parsons'] = 'Parsons 문제';
$string['parsons_help'] = '학생이 코드를 직접 작성하는 대신, 섞여 있는 모범 답안 줄과 방해 줄을 올바른 순서대로 배열합니다(Python에서는 올바른 들여쓰기 포함). 완성된 프로그램은 일반 문제와 마찬가지로 테스트로 채점됩니다.';
$string['parsons_label'] = '모범 답안의 줄을 순서대로 배열하여 답안 작성';
$string['parsonsadd'] = '프로그램에 추가: {$a}';
$string['parsonsanswer'] = '내 프로그램';
$string['parsonsdown'] = '아래로 이동';
$string['parsonsgap'] = '{$a}번 줄의 빈칸';
$string['parsonshint'] = '줄을 올바른 순서로 내 프로그램 영역에 끌어다 놓거나, 클릭하여 맨 아래에 추가하세요. 필요하지 않은 줄이 섞여 있을 수 있습니다.';
$string['parsonsindent'] = '들여쓰기';
$string['parsonsnosolution'] = 'Parsons 문제에는 모범 답안이 필요합니다. 학생들은 모범 답안의 줄을 순서대로 배열합니다.';
$string['parsonsoutdent'] = '내어쓰기';
$string['parsonspool'] = '코드 줄';
$string['parsonsprogram'] = '배열한 줄로 만든 프로그램 (실행, 단계 실행 및 테스트에 사용됨):';
$string['parsonsremove'] = '코드 줄 목록으로 되돌리기';
$string['parsonsup'] = '위로 이동';
$string['passed'] = '통과';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = '학생이 코드 편집기에서 프로그램을 작성합니다. 테스트가 있으면 각 테스트의 입력으로 Jobe 서버에서 프로그램을 실행하고 올바른 출력을 낸 테스트 비율에 따라 채점합니다. 테스트가 없으면 교수자가 직접 채점합니다.';
$string['pluginnameadding'] = 'CodeLab 문제 추가';
$string['pluginnameediting'] = 'CodeLab 문제 편집';
$string['pluginnamesummary'] = '학생이 C, C++, Python, Java 또는 C#으로 프로그램을 작성합니다.';
$string['prefix'] = '앞부분 코드';
$string['prefix_help'] = '실행 시 학생의 프로그램 앞에 자동으로 추가되는 코드입니다(예: #include 줄이나 클래스 시작 부분). 학생 편집기에는 보이지 않습니다.';
$string['privacy:metadata:jobe'] = '답안은 문제의 테스트를 실행하기 위해 관리자가 설정한 Jobe 서버로 전송됩니다. 답안 자체는 문제 엔진에 저장됩니다.';
$string['privacy:metadata:jobe:code'] = '학생이 작성한 프로그램';
$string['privacy:metadata:jobe:stdin'] = '테스트의 입력';
$string['privacy:metadata:pyodide'] = '응시 중 브라우저에서 Python을 실행(실행 및 단계 실행)할 때 학생의 브라우저는 관리자가 설정한 주소(기본값: jsDelivr CDN)에서 Pyodide(Python 인터프리터)를 불러옵니다. 답안이나 입력은 전송되지 않습니다.';
$string['privacy:metadata:pyodide:ipaddress'] = '일반 다운로드와 마찬가지로 학생 브라우저의 IP 주소';
$string['privacy:metadata:runner'] = '관리자가 CodeLab runner(자체 또는 호스팅)를 설정한 경우, 답안이 그곳으로 전송되어 문제의 테스트로 실행되며(SQL은 항상, 다른 언어는 runner가 실행 및 채점 서버일 때), 응시 중 \'실행\' 시 학생이 입력을 타이핑하는 동안 프로그램이 그곳에서 실행됩니다. runner는 실행 중에만 프로그램을 유지하며 답안 자체는 문제 엔진에 저장됩니다.';
$string['privacy:metadata:runner:code'] = '학생이 작성한 프로그램';
$string['privacy:metadata:runner:stdin'] = '테스트의 입력 또는 학생이 타이핑하는 입력';
$string['privacy:metadata:runner:userid'] = '사용자별 동시 실행 프로그램 수를 제한하기 위해 응시 중 실행용 서명 토큰에 포함되는 학생 ID';
$string['runtests'] = '테스트 실행';
$string['sandboxfailed'] = '서버(Jobe)에서 프로그램을 검사할 수 없었습니다. 교수자가 직접 채점할 것입니다.';
$string['savefailing'] = '모범 답안이 테스트에 실패해도 저장';
$string['showtests'] = '응시 중 테스트 제공';
$string['showtests_desc'] = '학생이 제출하기 전에 숨겨지지 않은 테스트를 실행해 볼 수 있음';
$string['solution'] = '모범 답안';
$string['solution_help'] = '교수자의 프로그램입니다. 문제를 저장할 때 이를 실행하여 비어 있는 테스트의 예상 출력을 자동으로 채우며, 학생은 검토 화면에서 정답으로 확인하게 됩니다.';
$string['solutioncheck'] = '모범 답안 검사';
$string['solutioncheck_help'] = '문제를 저장할 때 예상 출력이 있는 모든 테스트의 입력으로 모범 답안을 Jobe에서 실행하며, 모두 통과해야 저장됩니다. 테스트를 작성하는 중이거나 그래도 저장하려면 이 항목을 체크하세요. Jobe에 연결할 수 없는 경우 검사 없이 저장됩니다.';
$string['solutionfails'] = '모범 답안이 이 테스트에 실패했습니다. 실제 출력: {$a}';
$string['solutionis'] = '모범 답안:';
$string['solutionnocompile'] = '모범 답안이 컴파일되지 않습니다: {$a}';
$string['suffix'] = '뒷부분 코드';
$string['suffix_help'] = '실행 시 학생의 프로그램 뒤에 자동으로 추가되는 코드입니다(예: 학생의 함수를 호출하는 main 함수나 클래스 닫는 부분). 학생 편집기에는 보이지 않습니다.';
$string['template'] = '시작 코드';
$string['template_help'] = '학생이 편집기에서 시작할 때 기본으로 주어지는 코드입니다. 비워 둘 수 있습니다.';
$string['test'] = '테스트';
$string['testcode'] = '테스트 코드';
$string['testcode_help'] = '이 테스트에서 실행할 코드입니다(예: 학생이 작성한 함수 호출: <code>printf("%d\\n", sum(2, 3));</code> 또는 <code>print(sum(2, 3))</code>). 비워 둘 수 있습니다.

* 학생 프로그램 뒤의 코드에 <code>{{TEST}}</code> 표시자가 있으면(예: 직접 작성한 main 내부), 그 자리에 테스트 코드가 들어갑니다.
* 그렇지 않으면 main이 없는 C 또는 C++ 프로그램에 자동으로 <code>int main(void) { test code return 0; }</code>가 추가됩니다.
* 다른 언어에서는 테스트 코드가 프로그램 끝에 추가됩니다.

테스트에는 입력을 함께 둘 수도 있습니다. 숨김 처리되지 않은 테스트의 테스트 코드는 학생에게 보입니다.';
$string['testcoden'] = '테스트 {no}: 테스트 코드';
$string['testexpected'] = '예상 출력';
$string['testfailed'] = '테스트 {$a}: 실패';
$string['testgot'] = '출력';
$string['testhidden'] = '학생에게 숨기기';
$string['testinputn'] = '테스트 {no}: 입력';
$string['testpassed'] = '테스트 {$a}: 통과';
$string['tests'] = '테스트';
$string['tests_desc'] = '각 테스트는 프로그램에 입력을 전달하고 출력을 예상 출력과 비교합니다. 예상 출력을 비워 두면 모범 답안의 출력으로 채워집니다. 테스트가 없으면 교수자가 직접 채점합니다.';
$string['testsof'] = '테스트 {$a->total}개 중 {$a->passed}개 통과';
$string['teststdin'] = '입력';
$string['testsummary'] = '테스트 통과: {$a->total}개 중 {$a->passed}개';
$string['testtime'] = '{$a}초';
$string['testtimemem'] = '{$a->time}초, {$a->memory} MB';
$string['testweight'] = '가중치';
$string['timelimit'] = '테스트당 시간 제한 (초)';
$string['timelimit_help'] = '테스트 하나가 실행될 수 있는 최대 시간(초)입니다. 출력이 맞더라도 이 시간을 넘기면 시간 초과로 실패 처리됩니다. 비워 두면 제한이 없으며 0.1에서 30까지 입력할 수 있습니다. 테스트 실행 시간은 CodeLab runner에서만 보고되며, Jobe에서는 이 항목이 적용되지 않고 CPU 시간 제한만 적용됩니다. 시간은 서버에서 측정되며 언어 시작 시간(Java와 C#은 약 0.3초)을 포함하므로 모범 답안 시간보다 여유 있게 설정하세요.';
$string['tolerance'] = '허용 오차';
$string['tolerance_help'] = '숫자 비교 시 같은 값으로 인정하는 두 수의 최대 차이(절대 오차 또는 큰 수에 대한 상대 오차)입니다. 0.001을 지정하면 3.1416과 3.1414가 일치하고, 1000.4와 1000도 일치합니다.';
$string['tooslow'] = '시간 초과: {$a->time}초 (제한: {$a->limit}초)';
