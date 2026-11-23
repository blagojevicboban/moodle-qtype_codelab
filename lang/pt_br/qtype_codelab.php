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
 * Strings for component 'qtype_codelab', language 'pt_br'.
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Adicionar mais {no} testes';
$string['aihints'] = 'Explicações da IA';
$string['aihints_help'] = 'Com as explicações de erros por IA do CodeLab para TinyMCE ativadas pelo administrador, os alunos veem um botão abaixo de uma mensagem do compilador ou de um erro do programa para pedir à IA do site que o explique. A IA é instruída a nunca escrever a correção. Sem esta opção, o botão nunca é exibido em um questionário.';
$string['aihints_label'] = 'Os alunos podem pedir à IA que explique uma mensagem do compilador ou um erro';
$string['answer'] = 'Programa';
$string['answerlabel'] = 'Seu programa ({$a})';
$string['assist'] = 'Ajuda de digitação';
$string['badlimit'] = 'Informe um número inteiro de 1 a {$a}, ou deixe em branco para usar o padrão.';
$string['badregex'] = 'Esta não é uma expressão regular válida.';
$string['badtimelimit'] = 'Informe um número de segundos de 0.1 a 30, ou deixe em branco para sem limite.';
$string['badtolerance'] = 'Informe um número maior ou igual a 0, por exemplo 0.001.';
$string['bulkcheck'] = 'Verificar soluções CodeLab';
$string['bulkcheck_again'] = 'Verificar novamente';
$string['bulkcheck_bank'] = 'Banco de questões';
$string['bulkcheck_done'] = '{$a->total} questões verificadas: {$a->ok} passam em todos os testes, {$a->problems} precisam de atenção.';
$string['bulkcheck_finished'] = 'Concluído.';
$string['bulkcheck_intro'] = 'A solução de cada uma das {$a} questões CodeLab nos bancos de questões deste curso é executada no servidor Jobe com os testes da respectiva questão, uma por uma. Questões cuja solução falha, não compila ou está ausente são listadas primeiro. Resultados de soluções verificadas anteriormente são obtidos do cache.';
$string['bulkcheck_none'] = 'Não há questões CodeLab nos bancos de questões deste curso.';
$string['bulkcheck_progress'] = 'Verificando {$a->done} de {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Resultado';
$string['bulkcheck_start'] = 'Iniciar verificação';
$string['cachedef_results'] = 'Resultados dos testes dos programas enviados';
$string['check_compile'] = 'Não compila';
$string['check_failed'] = 'Passa em {$a->passed} de {$a->total} testes';
$string['check_jobe'] = 'O Jobe não conseguiu executar';
$string['check_nosolution'] = 'Sem solução';
$string['check_notests'] = 'Sem testes (avaliada pelo professor)';
$string['check_ok'] = 'Passa em todos os testes ({$a->total})';
$string['checkfailed'] = 'Não foi possível verificar o programa no servidor (Jobe), portanto esta tentativa não conta. Pressione Verificar novamente em instantes.';
$string['checkorder'] = 'Verificar ordem';
$string['classanalysis'] = 'Análise';
$string['classanswers'] = 'Respostas';
$string['classempty'] = 'Nenhuma resposta ainda.';
$string['classemptyoutput'] = '(sem saída)';
$string['classgrades'] = 'Notas (porcentagem)';
$string['classhidenames'] = 'Ocultar nomes';
$string['classmessages'] = 'Mensagens do compilador mais frequentes';
$string['classnotgraded'] = 'não avaliada';
$string['classother'] = '{$a} respostas a outras versões da questão não foram analisadas.';
$string['classpending'] = 'Mais {$a} respostas estão sendo verificadas; a análise será atualizada em instantes.';
$string['classshownames'] = 'Mostrar nomes';
$string['classsimilar'] = 'Envios semelhantes';
$string['classsimilarnote'] = 'Comparados localmente pela estrutura do código (ignorando nomes de variáveis, espaços, comentários e código inicial); revise as respostas antes de decidir.';
$string['classstudent'] = 'Aluno {$a}';
$string['classsummary'] = 'Respostas: {$a->answers} · não compilam: {$a->compile} · erro em um teste: {$a->runtime} · acima do limite de tempo ou memória: {$a->timelimit}';
$string['classtest'] = 'Teste {$a->n}: {$a->passed} de {$a->total} passaram';
$string['classtesthidden'] = 'Teste {$a->n} (oculto): {$a->passed} de {$a->total} passaram';
$string['classunchecked'] = '{$a} respostas não puderam ser verificadas pelo servidor.';
$string['classwork'] = 'Trabalho da turma';
$string['classwrong'] = 'Saídas incorretas frequentes:';
$string['codeheader'] = 'Código';
$string['compare'] = 'Comparação da saída';
$string['compare_help'] = 'Como a saída do programa é comparada com a saída esperada de cada teste.

* **Exatamente**: cada caractere conta.
* **Espaços no final não contam**: espaços no final das linhas e linhas vazias no final são ignorados.
* **Linhas em qualquer ordem**: como o anterior, mas as linhas podem aparecer em qualquer ordem, ideal para consultas SQL sem ORDER BY.
* **Números com tolerância**: as saídas são comparadas palavra por palavra, e dois números são considerados iguais quando não diferem mais do que a tolerância (absoluta ou relativa ao maior número). Espaços e quebras de linha entre as palavras não contam.
* **Expressão regular**: a saída esperada de cada teste é uma expressão regular (PCRE) que deve corresponder a toda a saída, por exemplo <code>Sum: [0-9]+</code>. Saídas esperadas em branco são preenchidas a partir da solução com padrões que correspondem apenas àquela saída.';
$string['comparison_exact'] = 'Exatamente';
$string['comparison_numbers'] = 'Números com tolerância';
$string['comparison_regex'] = 'Expressão regular';
$string['comparison_spaces'] = 'Espaços no final não contam';
$string['comparison_unordered'] = 'Linhas em qualquer ordem (linhas SQL)';
$string['compileerror'] = 'O programa não compila:';
$string['cputime'] = 'Limite de tempo de CPU (segundos)';
$string['cputime_help'] = 'Tempo máximo de CPU de uma execução de teste ao avaliar a resposta. Em branco: usa a configuração do plugin do editor CodeLab (5 segundos por padrão). No máximo {$a} segundos (definido pelo administrador). Executar e Executar testes durante a tentativa mantêm a configuração do site.';
$string['distractors'] = 'Linhas distratoras';
$string['distractors_help'] = 'Linhas misturadas às linhas da solução que não fazem parte dela, uma por linha (por exemplo, uma condição incorreta ou uma linha desnecessária). Alunos que as utilizam não passam nos testes.';
$string['failed'] = 'Falhou';
$string['gaps'] = 'Lacunas para preencher';
$string['gaps_help'] = 'Número de expressões ocultas como lacunas para preencher nas linhas de um problema de Parsons (0 apenas para ordenação). Os alunos as preenchem enquanto colocam as linhas em ordem.';
$string['gaps_none'] = '0 (apenas ordenação)';
$string['hiddensummary'] = 'Testes ocultos aprovados: {$a->passed} de {$a->total}';
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
$string['language'] = 'Linguagem de programação';
$string['maxcputime'] = 'Tempo máximo de CPU de uma questão';
$string['maxcputime_desc'] = 'As questões não podem solicitar ao Jobe mais tempo de CPU do que este limite, em segundos por execução.';
$string['maxmemory'] = 'Memória máxima de uma questão';
$string['maxmemory_desc'] = 'As questões não podem solicitar ao Jobe mais memória do que este limite, em MB por execução.';
$string['memorylimit'] = 'Limite de memória (MB)';
$string['memorylimit_help'] = 'Memória máxima de uma execução de teste ao avaliar a resposta. Em branco: usa o padrão do servidor Jobe. No máximo {$a} MB (definido pelo administrador). Uma linguagem que precisa de mais memória para iniciar (JavaScript precisa de 1000 MB) recebe o necessário. No CodeLab runner este limite não se aplica a Java, C# e JavaScript: eles sempre recebem um heap de 256 MB.';
$string['noanswer'] = 'Escreva um programa primeiro.';
$string['noassist'] = 'Desativar preenchimento automático e dicas (para provas)';
$string['noexpected'] = 'Informe a saída esperada ou uma solução para calculá-la.';
$string['ordercheck'] = 'Verificar ordem';
$string['ordercheck_help'] = 'Os alunos podem clicar em Verificar ordem para ver quantas linhas estão no lugar certo, nunca quais. Uma linha está no lugar certo quando pertence à maior subsequência comum entre as linhas do aluno e as da solução (em Python, também com a mesma indentação); espaços não contam e linhas distratoras nunca ficam no lugar certo. Com nota parcial: uma resposta que falha nos testes recebe até metade da nota pelas linhas no lugar certo. Os testes continuam definindo a nota total.';
$string['ordercheck_off'] = 'Não';
$string['ordercheck_on'] = 'Sim';
$string['ordercheck_partial'] = 'Sim, com parte da nota pela ordem';
$string['ordercheckfailed'] = 'Não foi possível verificar a ordem.';
$string['orderresult'] = 'Linhas no lugar certo: {$a->placed} de {$a->total}';
$string['parsons'] = 'Problema de Parsons';
$string['parsons_help'] = 'Os alunos não escrevem o programa: eles recebem as linhas da solução embaralhadas com as linhas distratoras e devem colocá-las em ordem (em Python, também com a indentação correta). O programa montado é avaliado pelos testes normalmente.';
$string['parsons_label'] = 'Responder colocando as linhas da solução em ordem';
$string['parsonsadd'] = 'Adicionar ao programa: {$a}';
$string['parsonsanswer'] = 'Seu programa';
$string['parsonsdown'] = 'Mover para baixo';
$string['parsonsgap'] = 'Lacuna na linha {$a}';
$string['parsonshint'] = 'Arraste as linhas para o seu programa na ordem correta, ou clique em uma linha para adicioná-la ao final. Algumas linhas podem não ser necessárias.';
$string['parsonsindent'] = 'Aumentar indentação';
$string['parsonsnosolution'] = 'Um problema de Parsons precisa de uma solução: são as linhas dela que os alunos colocam em ordem.';
$string['parsonsoutdent'] = 'Diminuir indentação';
$string['parsonspool'] = 'Linhas';
$string['parsonsprogram'] = 'O programa montado com suas linhas (Executar, Passo e os testes usam este código):';
$string['parsonsremove'] = 'Voltar para as linhas';
$string['parsonsup'] = 'Mover para cima';
$string['passed'] = 'Passou';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'O aluno escreve um programa em um editor de código. Com testes, o programa é executado no servidor Jobe com a entrada de cada teste e avaliado pela proporção de testes com saída correta. Sem testes, o professor faz a avaliação.';
$string['pluginnameadding'] = 'Adicionando uma questão CodeLab';
$string['pluginnameediting'] = 'Editando uma questão CodeLab';
$string['pluginnamesummary'] = 'O aluno escreve um programa em C, C++, Python, Java ou C#.';
$string['prefix'] = 'Código antes';
$string['prefix_help'] = 'Código adicionado antes do programa do aluno na execução, por exemplo linhas #include ou o início de uma classe. Os alunos não veem esse código no editor.';
$string['privacy:metadata:jobe'] = 'As respostas são enviadas ao servidor Jobe configurado pelo administrador para serem executadas nos testes da questão. As respostas em si são armazenadas pelo motor de questões.';
$string['privacy:metadata:jobe:code'] = 'O programa que o aluno escreveu';
$string['privacy:metadata:jobe:stdin'] = 'A entrada de um teste';
$string['privacy:metadata:pyodide'] = 'Quando o Python é executado no navegador durante uma tentativa (Executar e Passo), o navegador do aluno carrega o Pyodide (interpretador Python) a partir do endereço configurado pelo administrador, por padrão o CDN jsDelivr. Nenhuma resposta ou entrada é enviada.';
$string['privacy:metadata:pyodide:ipaddress'] = 'O endereço IP do navegador do aluno, como em qualquer download';
$string['privacy:metadata:runner'] = 'Quando o administrador configura um CodeLab runner (próprio ou hospedado), as respostas são enviadas a ele para serem executadas nos testes da questão (SQL sempre, e outras linguagens quando o runner é o servidor de execução e avaliação), e Executar na tentativa executa o programa lá enquanto o aluno digita a entrada. O runner mantém o programa apenas durante a execução. As respostas em si são armazenadas pelo motor de questões.';
$string['privacy:metadata:runner:code'] = 'O programa que o aluno escreveu';
$string['privacy:metadata:runner:stdin'] = 'A entrada de um teste ou a entrada digitada pelo aluno';
$string['privacy:metadata:runner:userid'] = 'O ID do aluno, em um token assinado para Executar na tentativa, para limitar o número de programas executados simultaneamente por cada usuário';
$string['runtests'] = 'Executar testes';
$string['sandboxfailed'] = 'Não foi possível verificar o programa no servidor (Jobe). Seu professor fará a avaliação.';
$string['savefailing'] = 'Salvar mesmo que a solução falhe nos testes';
$string['showtests'] = 'Testes na tentativa';
$string['showtests_desc'] = 'Os alunos podem executar os testes não ocultos antes de enviar';
$string['solution'] = 'Solução';
$string['solution_help'] = 'O programa do professor. Saídas esperadas em branco são preenchidas executando esta solução ao salvar a questão; os alunos a veem como resposta correta na revisão.';
$string['solutioncheck'] = 'Verificação da solução';
$string['solutioncheck_help'] = 'Ao salvar a questão, a solução é executada no Jobe com a entrada de cada teste que possui saída esperada, e a questão só é salva se passar em todos. Marque esta opção para salvar mesmo assim, por exemplo enquanto ainda está escrevendo os testes. Quando o Jobe não estiver acessível, a questão é salva sem a verificação.';
$string['solutionfails'] = 'A solução falhou neste teste. Saída obtida: {$a}';
$string['solutionis'] = 'Uma solução:';
$string['solutionnocompile'] = 'A solução não compila: {$a}';
$string['suffix'] = 'Código depois';
$string['suffix_help'] = 'Código adicionado depois do programa do aluno na execução, por exemplo uma função main que chama a função do aluno, ou o fechamento de uma classe. Os alunos não veem esse código no editor.';
$string['template'] = 'Código inicial';
$string['template_help'] = 'Código com o qual os alunos começam no editor; pode ficar em branco.';
$string['test'] = 'Teste';
$string['testcode'] = 'Código do teste';
$string['testcode_help'] = 'Código executado neste teste, por exemplo uma chamada à função escrita pelo aluno: <code>printf("%d\\n", sum(2, 3));</code> ou <code>print(sum(2, 3))</code>. Pode ficar em branco.

* Se o código depois do programa do aluno tiver o marcador <code>{{TEST}}</code>, por exemplo dentro de um main escrito por você, o código do teste ocupa o lugar dele.
* Caso contrário, um programa em C ou C++ sem main recebe automaticamente: <code>int main(void) { test code return 0; }</code>.
* Nas outras linguagens, o código do teste é adicionado ao final do programa.

O teste também pode ter uma entrada. Os alunos veem o código dos testes que não estão ocultos.';
$string['testcoden'] = 'Teste {no}: código do teste';
$string['testexpected'] = 'Saída esperada';
$string['testfailed'] = 'Teste {$a}: falhou';
$string['testgot'] = 'Saída';
$string['testhidden'] = 'Oculto dos alunos';
$string['testinputn'] = 'Teste {no}: entrada';
$string['testpassed'] = 'Teste {$a}: passou';
$string['tests'] = 'Testes';
$string['tests_desc'] = 'Cada teste fornece uma entrada ao programa e compara sua saída com a saída esperada. Deixe a saída esperada em branco para obtê-la da solução. Sem testes, o professor avalia as respostas.';
$string['testsof'] = '{$a->passed} de {$a->total} testes passaram';
$string['teststdin'] = 'Entrada';
$string['testsummary'] = 'Testes aprovados: {$a->passed} de {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Peso';
$string['timelimit'] = 'Limite de tempo por teste (s)';
$string['timelimit_help'] = 'Tempo em segundos que um teste pode levar: um teste que demora mais falha por ser lento demais, mesmo com a saída correta. Em branco: sem limite. De 0.1 a 30. Apenas o CodeLab runner informa a duração de um teste; no Jobe este campo não tem efeito e o único limite é o tempo de CPU. O tempo é medido no servidor e inclui a inicialização da linguagem (cerca de 0.3 segundos para Java e C#), portanto deixe uma margem acima do tempo de uma boa solução.';
$string['tolerance'] = 'Tolerância';
$string['tolerance_help'] = 'Para a comparação numérica: a maior diferença entre dois números que ainda conta como igual, absoluta ou relativa ao maior número. Com 0.001, 3.1416 corresponde a 3.1414 e 1000.4 corresponde a 1000.';
$string['tooslow'] = 'Lento demais: {$a->time} s, o limite é {$a->limit} s';
