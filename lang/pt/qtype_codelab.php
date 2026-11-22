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
 * Strings for component 'qtype_codelab', language 'pt' (Portuguese).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Acrescentar mais {no} testes';
$string['aihints'] = 'Explicações da IA';
$string['aihints_help'] = 'Quando o administrador ativou as explicações de erros pela IA do CodeLab para TinyMCE, os alunos têm, por baixo de uma mensagem do compilador ou de um erro do seu programa, um botão que pede à IA do site que o explique. A IA tem a instrução de nunca escrever a correção. Sem esta opção, o botão nunca é mostrado num teste.';
$string['aihints_label'] = 'Os alunos podem pedir à IA que explique uma mensagem do compilador ou um erro';
$string['answer'] = 'Programa';
$string['answerlabel'] = 'O seu programa ({$a})';
$string['assist'] = 'Ajuda à escrita';
$string['badlimit'] = 'Indique um número inteiro de 1 a {$a}, ou deixe vazio para o valor por omissão.';
$string['badregex'] = 'Esta não é uma expressão regular válida.';
$string['badtolerance'] = 'Indique um número igual ou maior que 0, por exemplo 0.001.';
$string['bulkcheck'] = 'Verificar as soluções CodeLab';
$string['bulkcheck_again'] = 'Verificar de novo';
$string['bulkcheck_bank'] = 'Banco de perguntas';
$string['bulkcheck_done'] = '{$a->total} perguntas verificadas: {$a->ok} passam todos os seus testes, {$a->problems} precisam de atenção.';
$string['bulkcheck_finished'] = 'Terminado.';
$string['bulkcheck_intro'] = 'A solução de cada uma das {$a} perguntas CodeLab dos bancos de perguntas desta disciplina é executada no servidor Jobe com os testes da sua pergunta, uma a uma. As perguntas cuja solução falha, não compila ou falta aparecem primeiro. Os resultados de soluções já verificadas vêm da cache.';
$string['bulkcheck_none'] = 'Não há perguntas CodeLab nos bancos de perguntas desta disciplina.';
$string['bulkcheck_progress'] = 'A verificar {$a->done} de {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Resultado';
$string['bulkcheck_start'] = 'Iniciar a verificação';
$string['cachedef_results'] = 'Resultados dos testes dos programas submetidos';
$string['check_compile'] = 'Não compila';
$string['check_failed'] = 'Passa {$a->passed} de {$a->total} testes';
$string['check_jobe'] = 'O Jobe não a conseguiu executar';
$string['check_nosolution'] = 'Sem solução';
$string['check_notests'] = 'Sem testes (avaliada pelo professor)';
$string['check_ok'] = 'Passa todos os testes ({$a->total})';
$string['checkfailed'] = 'Não foi possível verificar o programa no servidor (Jobe), por isso esta tentativa não conta. Prima Verificar de novo daqui a pouco.';
$string['classanalysis'] = 'Análise';
$string['classanswers'] = 'Respostas';
$string['classempty'] = 'Ainda não há respostas.';
$string['classemptyoutput'] = '(sem saída)';
$string['classgrades'] = 'Notas (percentagem)';
$string['classhidenames'] = 'Ocultar nomes';
$string['classmessages'] = 'Mensagens do compilador mais frequentes';
$string['classnotgraded'] = 'não avaliada';
$string['classother'] = '{$a} respostas a outras versões da pergunta não são analisadas.';
$string['classpending'] = 'Estão a ser verificadas mais {$a} respostas; a análise cresce daqui a pouco.';
$string['classshownames'] = 'Mostrar nomes';
$string['classstudent'] = 'Aluno {$a}';
$string['classsummary'] = 'Respostas: {$a->answers} · não compilam: {$a->compile} · erro num teste: {$a->runtime} · acima do limite de tempo ou memória: {$a->timelimit}';
$string['classtest'] = 'Teste {$a->n}: {$a->passed} de {$a->total} passam';
$string['classtesthidden'] = 'Teste {$a->n} (oculto): {$a->passed} de {$a->total} passam';
$string['classunchecked'] = 'O servidor não conseguiu verificar {$a} respostas.';
$string['classwork'] = 'Trabalho da turma';
$string['classwrong'] = 'Saídas erradas frequentes:';
$string['codeheader'] = 'Código';
$string['compare'] = 'Comparação da saída';
$string['compare_help'] = 'Como a saída do programa é comparada com a saída esperada de cada teste.

* **Exatamente**: cada carácter conta.
* **Os espaços no fim não contam**: os espaços no fim das linhas e as linhas vazias no fim são ignorados.
* **Linhas por qualquer ordem**: como o anterior, mas as linhas podem vir por qualquer ordem, para consultas SQL sem ORDER BY.
* **Números com tolerância**: as saídas são comparadas palavra a palavra, e dois números são iguais quando não diferem mais do que a tolerância (absoluta, ou relativa ao número maior). Os espaços e as mudanças de linha entre as palavras não contam.
* **Expressão regular**: a saída esperada de cada teste é uma expressão regular (PCRE) que tem de corresponder a toda a saída, por exemplo <code>Sum: [0-9]+</code>. As saídas esperadas vazias são preenchidas a partir da solução com padrões que só correspondem a essa saída.';
$string['comparison_exact'] = 'Exatamente';
$string['comparison_numbers'] = 'Números com tolerância';
$string['comparison_regex'] = 'Expressão regular';
$string['comparison_spaces'] = 'Os espaços no fim não contam';
$string['comparison_unordered'] = 'Linhas por qualquer ordem (linhas SQL)';
$string['compileerror'] = 'O programa não compila:';
$string['cputime'] = 'Limite de tempo de CPU (segundos)';
$string['cputime_help'] = 'Tempo de CPU máximo de uma execução de um teste quando a resposta é avaliada. Vazio: a definição do plugin do editor CodeLab (5 segundos, salvo alteração). No máximo {$a} segundos (definido pelo administrador). Executar e Executar os testes na tentativa mantêm a definição do site.';
$string['distractors'] = 'Linhas de distração';
$string['distractors_help'] = 'Linhas misturadas com as linhas da solução mas que não fazem parte dela, uma por linha (por exemplo uma condição errada ou uma linha desnecessária). Os alunos que as usam não passam os testes.';
$string['failed'] = 'Falhou';
$string['hiddensummary'] = 'Testes ocultos passados: {$a->passed} de {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Linguagem de programação';
$string['maxcputime'] = 'Tempo de CPU máximo de uma pergunta';
$string['maxcputime_desc'] = 'As perguntas não podem pedir ao Jobe mais tempo de CPU do que este, em segundos por execução.';
$string['maxmemory'] = 'Memória máxima de uma pergunta';
$string['maxmemory_desc'] = 'As perguntas não podem pedir ao Jobe mais memória do que esta, em MB por execução.';
$string['memorylimit'] = 'Limite de memória (MB)';
$string['memorylimit_help'] = 'Memória máxima de uma execução de um teste quando a resposta é avaliada. Vazio: o valor por omissão do servidor Jobe. No máximo {$a} MB (definido pelo administrador). Uma linguagem que precisa de mais para arrancar (JavaScript precisa de 1000 MB) recebe o que precisa. Num CodeLab runner este limite não se aplica a Java, C# e JavaScript: aí recebem sempre um heap de 256 MB.';
$string['noanswer'] = 'Escreva primeiro um programa.';
$string['noassist'] = 'Desativar o preenchimento automático e as sugestões (para testes)';
$string['noexpected'] = 'Indique a saída esperada, ou uma solução a partir da qual a calcular.';
$string['parsons'] = 'Problema de Parsons';
$string['parsons_help'] = 'Os alunos não escrevem o programa: recebem as linhas da solução, baralhadas com as linhas de distração, e põem-nas por ordem (em Python também com a indentação certa). O programa que formam é avaliado pelos testes como habitualmente.';
$string['parsons_label'] = 'Responder pondo as linhas da solução por ordem';
$string['parsonsadd'] = 'Acrescentar ao programa: {$a}';
$string['parsonsanswer'] = 'O seu programa';
$string['parsonsdown'] = 'Mover para baixo';
$string['parsonshint'] = 'Arraste as linhas para o seu programa pela ordem certa, ou clique numa linha para a acrescentar no fim. Algumas linhas podem não ser necessárias.';
$string['parsonsindent'] = 'Aumentar indentação';
$string['parsonsnosolution'] = 'Um problema de Parsons precisa da solução: são as suas linhas que os alunos põem por ordem.';
$string['parsonsoutdent'] = 'Diminuir indentação';
$string['parsonspool'] = 'Linhas';
$string['parsonsprogram'] = 'O programa feito com as suas linhas (Executar, Passo e os testes usam-no):';
$string['parsonsremove'] = 'Voltar às linhas';
$string['parsonsup'] = 'Mover para cima';
$string['passed'] = 'Passou';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'O aluno escreve um programa num editor de código. Com testes, o programa é executado no servidor Jobe com a entrada de cada teste e avaliado pela parte dos testes cuja saída está certa. Sem testes, é o professor que o avalia.';
$string['pluginnameadding'] = 'A acrescentar uma pergunta CodeLab';
$string['pluginnameediting'] = 'A editar uma pergunta CodeLab';
$string['pluginnamesummary'] = 'O aluno escreve um programa em C, C++, Python, Java ou C#.';
$string['prefix'] = 'Código antes';
$string['prefix_help'] = 'Código acrescentado antes do programa do aluno quando é executado, por exemplo linhas #include ou o início de uma classe. Os alunos não o veem no editor.';
$string['privacy:metadata:jobe'] = 'As respostas são enviadas para o servidor Jobe definido pelo administrador para serem executadas com os testes da pergunta. As próprias respostas são guardadas pelo motor de perguntas.';
$string['privacy:metadata:jobe:code'] = 'O programa que o aluno escreveu';
$string['privacy:metadata:jobe:stdin'] = 'A entrada de um teste';
$string['privacy:metadata:pyodide'] = 'Quando o Python corre no navegador numa tentativa (Executar e Passo), o navegador do aluno carrega o Pyodide (o interpretador de Python) a partir do endereço definido pelo administrador, por omissão o CDN jsDelivr. Não é enviada nenhuma resposta nem entrada.';
$string['privacy:metadata:pyodide:ipaddress'] = 'O endereço IP do navegador do aluno, como em qualquer transferência';
$string['privacy:metadata:runner'] = 'Quando o administrador define um CodeLab runner (próprio ou alojado), as respostas são enviadas para lá para serem executadas com os testes da pergunta (SQL sempre, as outras linguagens quando o runner é o servidor de execução e avaliação), e Executar na tentativa corre aí o programa enquanto o aluno escreve a sua entrada. O runner só guarda um programa enquanto ele corre. As próprias respostas são guardadas pelo motor de perguntas.';
$string['privacy:metadata:runner:code'] = 'O programa que o aluno escreveu';
$string['privacy:metadata:runner:stdin'] = 'A entrada de um teste, ou a entrada que o aluno escreve';
$string['privacy:metadata:runner:userid'] = 'O id do aluno, num token assinado para Executar na tentativa, para limitar o número de programas que cada utilizador executa ao mesmo tempo';
$string['runtests'] = 'Executar os testes';
$string['sandboxfailed'] = 'Não foi possível verificar o programa no servidor (Jobe). O seu professor vai avaliá-lo.';
$string['savefailing'] = 'Guardar mesmo que a solução falhe os testes';
$string['showtests'] = 'Testes na tentativa';
$string['showtests_desc'] = 'Os alunos podem executar os testes não ocultos antes de submeter';
$string['solution'] = 'Solução';
$string['solution_help'] = 'O programa do professor. As saídas esperadas vazias dos testes são preenchidas executando-o quando a pergunta é guardada; os alunos veem-no como resposta certa na revisão.';
$string['solutioncheck'] = 'Verificação da solução';
$string['solutioncheck_help'] = 'Quando a pergunta é guardada, a solução é executada no Jobe com a entrada de cada teste que tem uma saída esperada, e a pergunta só é guardada se passar todos. Marque esta caixa para guardar mesmo assim, por exemplo enquanto ainda escreve os testes. Quando o Jobe não pode ser contactado, a pergunta é guardada sem a verificação.';
$string['solutionfails'] = 'A solução falha este teste. A sua saída: {$a}';
$string['solutionis'] = 'Uma solução:';
$string['solutionnocompile'] = 'A solução não compila: {$a}';
$string['suffix'] = 'Código depois';
$string['suffix_help'] = 'Código acrescentado depois do programa do aluno quando é executado, por exemplo uma função main que chama a função do aluno, ou o fim de uma classe. Os alunos não o veem no editor.';
$string['template'] = 'Código inicial';
$string['template_help'] = 'Código com que os alunos começam no editor; pode estar vazio.';
$string['test'] = 'Teste';
$string['testcode'] = 'Código do teste';
$string['testcode_help'] = 'Código executado neste teste, por exemplo uma chamada da função que o aluno escreve: <code>printf("%d\\n", sum(2, 3));</code> ou <code>print(sum(2, 3))</code>. Pode estar vazio.

* Se o código depois do programa do aluno tiver o marcador <code>{{TEST}}</code>, por exemplo dentro de um main que escreve, o código do teste ocupa o seu lugar.
* Caso contrário, um programa em C ou C++ sem main recebe um: <code>int main(void) { test code return 0; }</code>.
* Nas outras linguagens, o código do teste é acrescentado no fim do programa.

O teste também pode ter uma entrada. Os alunos veem o código dos testes que não estão ocultos.';
$string['testcoden'] = 'Teste {no}: código do teste';
$string['testexpected'] = 'Saída esperada';
$string['testfailed'] = 'Teste {$a}: falhou';
$string['testgot'] = 'Saída';
$string['testhidden'] = 'Oculto aos alunos';
$string['testinputn'] = 'Teste {no}: entrada';
$string['testpassed'] = 'Teste {$a}: passou';
$string['tests'] = 'Testes';
$string['tests_desc'] = 'Cada teste dá uma entrada ao programa e compara a sua saída com a saída esperada. Deixe a saída esperada vazia para a tirar da solução. Sem testes, o professor avalia as respostas.';
$string['testsof'] = '{$a->passed} de {$a->total} testes passados';
$string['teststdin'] = 'Entrada';
$string['testsummary'] = 'Testes passados: {$a->passed} de {$a->total}';
$string['testweight'] = 'Peso';
$string['tolerance'] = 'Tolerância';
$string['tolerance_help'] = 'Para a comparação com números: a maior diferença entre dois números que ainda conta como igual, absoluta ou relativa ao número maior. Com 0.001, 3.1416 corresponde a 3.1414 e 1000.4 a 1000.';
