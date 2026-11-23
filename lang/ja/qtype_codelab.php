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
 * Strings for component 'qtype_codelab', language 'ja'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'テストをさらに {no} 件追加';
$string['aihints'] = 'AIによる解説';
$string['aihints_help'] = '管理者がTinyMCE用CodeLabのAIエラー解説を有効にしている場合、コンパイラのメッセージやプログラムのエラーの下にボタンが表示され、サイトのAIに解説を求めることができます。AIには修正コードを書かないよう指示されています。このオプションが無効の場合、小テスト内にボタンは表示されません。';
$string['aihints_label'] = '学生がコンパイラのメッセージやエラーの解説をAIに求められるようにする';
$string['answer'] = 'プログラム';
$string['answerlabel'] = 'あなたのプログラム（{$a}）';
$string['assist'] = '入力支援';
$string['badlimit'] = '1から{$a}までの整数を入力するか、デフォルト値を使う場合は空欄にしてください。';
$string['badregex'] = '有効な正規表現ではありません。';
$string['badtimelimit'] = '0.1から30までの秒数を入力するか、制限なしにする場合は空欄にしてください。';
$string['badtolerance'] = '0以上の数値を入力してください（例: 0.001）。';
$string['bulkcheck'] = 'CodeLabの解答例を一括確認';
$string['bulkcheck_again'] = '再確認';
$string['bulkcheck_bank'] = '問題バンク';
$string['bulkcheck_done'] = '{$a->total} 問を確認しました: {$a->ok} 問が全テスト合格、{$a->problems} 問に要確認あり。';
$string['bulkcheck_finished'] = '完了しました。';
$string['bulkcheck_intro'] = 'このコースの問題バンクにある {$a} 問のCodeLab問題について、それぞれの解答例をJobeサーバー上でテストごとに順番に実行します。テストに失敗した問題、コンパイルできない問題、解答例がない問題が先頭に表示されます。すでに確認済みの解答例の結果はキャッシュから取得されます。';
$string['bulkcheck_none'] = 'このコースの問題バンクにCodeLab問題はありません。';
$string['bulkcheck_progress'] = '{$a->total} 問中 {$a->done} 問目を確認中: {$a->name}';
$string['bulkcheck_result'] = '結果';
$string['bulkcheck_start'] = '確認を開始';
$string['cachedef_results'] = '提出されたプログラムのテスト結果';
$string['check_compile'] = 'コンパイルエラー';
$string['check_failed'] = '{$a->total} 件中 {$a->passed} 件のテストに合格';
$string['check_jobe'] = 'Jobeで実行できませんでした';
$string['check_nosolution'] = '解答例なし';
$string['check_notests'] = 'テストなし（教師が採点）';
$string['check_ok'] = '全テスト合格（{$a->total} 件）';
$string['checkfailed'] = 'サーバー（Jobe）でプログラムを確認できなかったため、この試行はカウントされません。しばらくしてからもう一度「チェック」を押してください。';
$string['checkorder'] = '順序を確認';
$string['classanalysis'] = '分析';
$string['classanswers'] = '解答';
$string['classempty'] = 'まだ解答はありません。';
$string['classemptyoutput'] = '（出力なし）';
$string['classgrades'] = '評点（パーセント）';
$string['classhidenames'] = '氏名を隠す';
$string['classmessages'] = '頻出のコンパイラメッセージ';
$string['classnotgraded'] = '未採点';
$string['classother'] = 'この問題の別バージョンに対する {$a} 件の解答は分析対象外です。';
$string['classpending'] = 'さらに {$a} 件の解答を確認中です。まもなく分析結果に反映されます。';
$string['classshownames'] = '氏名を表示';
$string['classsimilar'] = '類似した提出';
$string['classsimilarnote'] = 'コード構造に基づいてローカルで比較しています（変数名、空白、コメント、初期コードは無視されます）。判断する前に実際の解答を確認してください。';
$string['classstudent'] = '学生 {$a}';
$string['classsummary'] = '解答数: {$a->answers} · コンパイルエラー: {$a->compile} · テスト実行時エラー: {$a->runtime} · 時間またはメモリ制限超過: {$a->timelimit}';
$string['classtest'] = 'テスト {$a->n}: {$a->total} 人中 {$a->passed} 人合格';
$string['classtesthidden'] = 'テスト {$a->n}（非公開）: {$a->total} 人中 {$a->passed} 人合格';
$string['classunchecked'] = '{$a} 件の解答はサーバーで確認できませんでした。';
$string['classwork'] = 'クラスの提出状況';
$string['classwrong'] = 'よくある誤った出力:';
$string['codeheader'] = 'コード';
$string['compare'] = '出力の比較方法';
$string['compare_help'] = 'プログラムの出力と各テストの期待される出力を比較する方法を指定します。

* **完全一致**: すべての文字を厳密に比較します。
* **末尾の空白を無視**: 各行末の空白と末尾の空行を無視します。
* **行の順序を問わない**: 上記と同様ですが、行の順番は問いません（ORDER BYのないSQLクエリ向け）。
* **許容誤差付きの数値比較**: 出力を単語ごとに比較し、2つの数値の差が許容誤差以下（絶対誤差または大きい方の値に対する相対誤差）であれば等しいとみなします。単語間の空白や改行は無視されます。
* **正規表現**: 各テストの期待される出力を正規表現（PCRE）として扱い、出力全体と一致する必要があります（例: <code>Sum: [0-9]+</code>）。期待される出力が空欄の場合は、解答例の出力のみに一致するパターンが自動生成されます。';
$string['comparison_exact'] = '完全一致';
$string['comparison_numbers'] = '許容誤差付きの数値比較';
$string['comparison_regex'] = '正規表現';
$string['comparison_spaces'] = '末尾の空白を無視';
$string['comparison_unordered'] = '行の順序を問わない（SQLの行）';
$string['compileerror'] = 'プログラムをコンパイルできません:';
$string['cputime'] = 'CPU時間制限（秒）';
$string['cputime_help'] = '解答の採点時に1回のテスト実行で使用できる最大CPU時間です。空欄の場合はCodeLabエディタプラグインの設定値（変更されていなければ5秒）が使われます。上限は {$a} 秒（管理者が設定）です。解答中の「実行」や「テストを実行」ではサイトの設定値が使われます。';
$string['distractors'] = 'ダミー行';
$string['distractors_help'] = '解答例の行に混ぜて提示する、解答には不要な行を1行ずつ入力します（例: 誤った条件式や不要な処理など）。学生がこれらを使用するとテストに合格しません。';
$string['failed'] = '不合格';
$string['gaps'] = '穴埋め箇所の数';
$string['gaps_help'] = 'パーソンズ問題の行の中で穴埋めとして隠す式の数です（0にすると並べ替えのみ）。学生は行を並べ替えながら空欄を埋めます。';
$string['gaps_none'] = '0（並べ替えのみ）';
$string['hiddensummary'] = '非公開テストの合格数: {$a->total} 件中 {$a->passed} 件';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'プログラミング言語';
$string['maxcputime'] = '1問あたりの最大CPU時間';
$string['maxcputime_desc'] = '問題からJobeに要求できる1回あたりのCPU時間の上限（秒）です。';
$string['maxmemory'] = '1問あたりの最大メモリ量';
$string['maxmemory_desc'] = '問題からJobeに要求できる1回あたりのメモリ量の上限（MB）です。';
$string['memorylimit'] = 'メモリ制限（MB）';
$string['memorylimit_help'] = '解答の採点時に1回のテスト実行で使用できる最大メモリ量です。空欄の場合はJobeサーバーのデフォルト値が使われます。上限は {$a} MB（管理者が設定）です。起動により多くのメモリを必要とする言語（JavaScriptは1000 MB必要）には必要な量が割り当てられます。CodeLab runnerではJava、C#、JavaScriptにこの制限は適用されず、常に256 MBのヒープが割り当てられます。';
$string['noanswer'] = '先にプログラムを入力してください。';
$string['noassist'] = 'コード補完とヒントを無効にする（テスト用）';
$string['noexpected'] = '期待される出力を入力するか、出力を計算するための解答例を入力してください。';
$string['ordercheck'] = '順序の確認';
$string['ordercheck_help'] = '学生は「順序を確認」を押して、正しい位置にある行の数を確認できます（どの行が正しいかは表示されません）。学生の並べた行と解答例の行との最長共通部分列に含まれる行（Pythonではインデントも一致）が正しい位置とみなされます。空白は無視され、ダミー行が正しい位置になることはありません。「順序に応じた部分点あり」を選ぶと、テストに不合格でも正しい位置の行に応じて最大半分の得点が与えられます。満点を得るにはテストに合格する必要があります。';
$string['ordercheck_off'] = 'なし';
$string['ordercheck_on'] = 'あり';
$string['ordercheck_partial'] = 'あり（順序に応じた部分点あり）';
$string['ordercheckfailed'] = '順序を確認できませんでした。';
$string['orderresult'] = '正しい位置にある行: {$a->total} 行中 {$a->placed} 行';
$string['parsons'] = 'パーソンズ問題';
$string['parsons_help'] = '学生はプログラムを自分で書く代わりに、シャッフルされた解答例の行（およびダミー行）を正しい順序に並べ替えます（Pythonでは適切なインデントも設定します）。組み立てたプログラムは通常通りテストで採点されます。';
$string['parsons_label'] = '解答例の行を正しい順序に並べ替えて解答する';
$string['parsonsadd'] = 'プログラムに追加: {$a}';
$string['parsonsanswer'] = 'あなたのプログラム';
$string['parsonsdown'] = '下に移動';
$string['parsonsgap'] = '{$a} 行目の空欄';
$string['parsonshint'] = '行を正しい順序でプログラム欄にドラッグするか、クリックして末尾に追加してください。不要な行が含まれている場合があります。';
$string['parsonsindent'] = 'インデントを増やす';
$string['parsonsnosolution'] = 'パーソンズ問題には解答例が必要です。学生は解答例の行を並べ替えて解答します。';
$string['parsonsoutdent'] = 'インデントを減らす';
$string['parsonspool'] = '選択肢の行';
$string['parsonsprogram'] = '並べ替えた行から作られたプログラム（実行、ステップ実行、テストで使用されます）:';
$string['parsonsremove'] = '選択肢に戻す';
$string['parsonsup'] = '上に移動';
$string['passed'] = '合格';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = '学生がコードエディタでプログラムを作成します。テストが設定されている場合、各テストの入力を使ってJobeサーバー上でプログラムが実行され、正しい出力が得られたテストの割合で採点されます。テストがない場合は教師が採点します。';
$string['pluginnameadding'] = 'CodeLab問題の追加';
$string['pluginnameediting'] = 'CodeLab問題の編集';
$string['pluginnamesummary'] = '学生がC、C++、Python、Java、C#などでプログラムを作成します。';
$string['prefix'] = '前方コード';
$string['prefix_help'] = '実行時に学生のプログラムの前に追加されるコードです（例: #include行やクラスの宣言開始など）。学生のエディタには表示されません。';
$string['privacy:metadata:jobe'] = '解答は問題のテストを実行するため、管理者が設定したJobeサーバーに送信されます。解答自体は問題エンジンによって保存されます。';
$string['privacy:metadata:jobe:code'] = '学生が作成したプログラム';
$string['privacy:metadata:jobe:stdin'] = 'テストの入力データ';
$string['privacy:metadata:pyodide'] = '解答中にPythonをブラウザ内で実行する際（実行およびステップ実行）、学生のブラウザは管理者が設定したアドレス（デフォルトはjsDelivr CDN）からPyodide（Pythonインタプリタ）を読み込みます。解答や入力データは送信されません。';
$string['privacy:metadata:pyodide:ipaddress'] = '通常のダウンロードと同様に、学生のブラウザのIPアドレス';
$string['privacy:metadata:runner'] = '管理者がCodeLab runner（自前またはホステッド）を設定している場合、問題のテスト実行のため（SQLは常時、他の言語は実行・採点用サーバーとして設定されている場合）に解答が送信されます。また、解答中の「実行」では学生が入力しながらプログラムが実行されます。runnerは実行中のみプログラムを保持します。解答自体は問題エンジンによって保存されます。';
$string['privacy:metadata:runner:code'] = '学生が作成したプログラム';
$string['privacy:metadata:runner:stdin'] = 'テストの入力データ、または学生が入力したデータ';
$string['privacy:metadata:runner:userid'] = '各ユーザーが同時に実行できるプログラム数を制限するため、解答中の「実行」用の署名付きトークンに含まれる学生ID';
$string['runtests'] = 'テストを実行';
$string['sandboxfailed'] = 'サーバー（Jobe）でプログラムを確認できませんでした。教師が採点します。';
$string['savefailing'] = '解答例がテストに失敗しても保存する';
$string['showtests'] = '解答中のテスト実行';
$string['showtests_desc'] = '提出前に学生が非公開以外のテストを実行できるようにする';
$string['solution'] = '解答例';
$string['solution_help'] = '教師が用意する模範プログラムです。問題を保存する際、期待される出力が空欄のテストはこのプログラムを実行して自動で埋められます。レビュー時には学生に正解として表示されます。';
$string['solutioncheck'] = '解答例の確認';
$string['solutioncheck_help'] = '問題の保存時、期待される出力が設定されているすべてのテストの入力を使ってJobe上で解答例を実行し、全テストに合格した場合のみ保存されます。テストを作成中などでそのまま保存したい場合はこのチェックボックスをオンにしてください。Jobeに接続できない場合は確認なしで保存されます。';
$string['solutionfails'] = '解答例はこのテストに失敗しました。出力: {$a}';
$string['solutionis'] = '解答例:';
$string['solutionnocompile'] = '解答例をコンパイルできません: {$a}';
$string['suffix'] = '後方コード';
$string['suffix_help'] = '実行時に学生のプログラムの後ろに追加されるコードです（例: 学生の関数を呼び出すmain関数やクラスの閉じ括弧など）。学生のエディタには表示されません。';
$string['template'] = '初期コード';
$string['template_help'] = 'エディタに最初から表示されるコードです。空欄でも構いません。';
$string['test'] = 'テスト';
$string['testcode'] = 'テストコード';
$string['testcode_help'] = 'このテストで実行するコードです（例: 学生が書く関数の呼び出し <code>printf("%d\\n", sum(2, 3));</code> や <code>print(sum(2, 3))</code>）。空欄でも構いません。

* 後方コードに <code>{{TEST}}</code> というマーカーが含まれている場合（例: 教師が書いたmain関数内）、テストコードがその位置に挿入されます。
* それ以外の場合、main関数のないC/C++プログラムには <code>int main(void) { テストコード return 0; }</code> が自動で追加されます。
* その他の言語では、テストコードがプログラムの末尾に追加されます。

テストには入力データを設定することもできます。非公開でないテストのテストコードは学生にも表示されます。';
$string['testcoden'] = 'テスト {no}: テストコード';
$string['testexpected'] = '期待される出力';
$string['testfailed'] = 'テスト {$a}: 不合格';
$string['testgot'] = '出力';
$string['testhidden'] = '学生に非公開';
$string['testinputn'] = 'テスト {no}: 入力';
$string['testpassed'] = 'テスト {$a}: 合格';
$string['tests'] = 'テスト';
$string['tests_desc'] = '各テストはプログラムに入力を与え、その出力を期待される出力と比較します。期待される出力を空欄にすると、解答例の実行結果が使われます。テストがない場合は教師が解答を採点します。';
$string['testsof'] = '{$a->total} 件中 {$a->passed} 件のテストに合格';
$string['teststdin'] = '入力';
$string['testsummary'] = '合格したテスト: {$a->total} 件中 {$a->passed} 件';
$string['testtime'] = '{$a} 秒';
$string['testtimemem'] = '{$a->time} 秒, {$a->memory} MB';
$string['testweight'] = '配点重み';
$string['timelimit'] = 'テストごとの実行時間制限（秒）';
$string['timelimit_help'] = '1つのテストに許容される実行時間（秒）です。これを超過すると、出力が正しくても時間切れで不合格になります。空欄で制限なし（0.1〜30秒）。実行時間を計測して報告するのはCodeLab runnerのみです。Jobeではこの項目は無効で、CPU時間制限のみが適用されます。時間はサーバー側で計測され言語の起動時間（JavaとC#では約0.3秒）も含まれるため、正しい解答の実行時間より余裕を持たせてください。';
$string['tolerance'] = '許容誤差';
$string['tolerance_help'] = '数値比較において等しいとみなす2つの数値の最大差（絶対誤差、または大きい方の数値に対する相対誤差）です。0.001の場合、3.1416と3.1414、1000.4と1000がそれぞれ一致とみなされます。';
$string['tooslow'] = '実行時間超過: {$a->time} 秒（制限: {$a->limit} 秒）';
