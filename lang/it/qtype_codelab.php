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
 * Strings for component 'qtype_codelab', language 'it' (Italian).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Aggiungi altri {no} test';
$string['aihints'] = 'Spiegazioni dell\'IA';
$string['aihints_help'] = 'Quando l\'amministratore ha attivato le spiegazioni degli errori con l\'IA di CodeLab per TinyMCE, gli studenti hanno, sotto un messaggio del compilatore o un errore del loro programma, un pulsante che chiede all\'IA del sito di spiegarlo. L\'IA ha l\'istruzione di non scrivere mai la correzione. Senza questa opzione il pulsante non viene mai mostrato in un quiz.';
$string['aihints_label'] = 'Gli studenti possono chiedere all\'IA di spiegare un messaggio del compilatore o un errore';
$string['answer'] = 'Programma';
$string['answerlabel'] = 'Il tuo programma ({$a})';
$string['assist'] = 'Aiuto alla scrittura';
$string['badlimit'] = 'Indica un numero intero da 1 a {$a}, oppure lascia vuoto per il valore predefinito.';
$string['badregex'] = 'Questa non è un\'espressione regolare valida.';
$string['badtimelimit'] = 'Indicare un numero di secondi da 0.1 a 30, oppure lasciare vuoto per nessun limite.';
$string['badtolerance'] = 'Indica un numero pari o maggiore di 0, per esempio 0.001.';
$string['bulkcheck'] = 'Controlla le soluzioni CodeLab';
$string['bulkcheck_again'] = 'Controlla di nuovo';
$string['bulkcheck_bank'] = 'Banca delle domande';
$string['bulkcheck_done'] = '{$a->total} domande controllate: {$a->ok} superano tutti i loro test, {$a->problems} richiedono attenzione.';
$string['bulkcheck_finished'] = 'Finito.';
$string['bulkcheck_intro'] = 'La soluzione di ciascuna delle {$a} domande CodeLab nelle banche delle domande di questo corso viene eseguita sul server Jobe con i test della sua domanda, una alla volta. Le domande la cui soluzione fallisce, non compila o manca sono elencate per prime. I risultati delle soluzioni già controllate vengono dalla cache.';
$string['bulkcheck_none'] = 'Non ci sono domande CodeLab nelle banche delle domande di questo corso.';
$string['bulkcheck_progress'] = 'Controllo {$a->done} di {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Risultato';
$string['bulkcheck_start'] = 'Avvia il controllo';
$string['cachedef_results'] = 'Risultati dei test dei programmi inviati';
$string['check_compile'] = 'Non compila';
$string['check_failed'] = 'Supera {$a->passed} test su {$a->total}';
$string['check_jobe'] = 'Jobe non ha potuto eseguirla';
$string['check_nosolution'] = 'Nessuna soluzione';
$string['check_notests'] = 'Nessun test (valutata dal docente)';
$string['check_ok'] = 'Supera tutti i test ({$a->total})';
$string['checkfailed'] = 'Non è stato possibile controllare il programma sul server (Jobe), quindi questo tentativo non conta. Premi di nuovo Controlla tra un momento.';
$string['checkorder'] = 'Controlla l\'ordine';
$string['classanalysis'] = 'Analisi';
$string['classanswers'] = 'Risposte';
$string['classempty'] = 'Ancora nessuna risposta.';
$string['classemptyoutput'] = '(nessun output)';
$string['classgrades'] = 'Voti (percentuale)';
$string['classhidenames'] = 'Nascondi i nomi';
$string['classmessages'] = 'Messaggi del compilatore più frequenti';
$string['classnotgraded'] = 'non valutata';
$string['classother'] = '{$a} risposte ad altre versioni della domanda non vengono analizzate.';
$string['classpending'] = 'Si stanno controllando altre {$a} risposte; l\'analisi cresce tra un momento.';
$string['classshownames'] = 'Mostra i nomi';
$string['classstudent'] = 'Studente {$a}';
$string['classsummary'] = 'Risposte: {$a->answers} · non compilano: {$a->compile} · errore in un test: {$a->runtime} · oltre il limite di tempo o di memoria: {$a->timelimit}';
$string['classtest'] = 'Test {$a->n}: {$a->passed} su {$a->total} lo superano';
$string['classtesthidden'] = 'Test {$a->n} (nascosto): {$a->passed} su {$a->total} lo superano';
$string['classunchecked'] = 'Il server non ha potuto controllare {$a} risposte.';
$string['classwork'] = 'Lavoro della classe';
$string['classwrong'] = 'Output errati frequenti:';
$string['codeheader'] = 'Codice';
$string['compare'] = 'Confronto dell\'output';
$string['compare_help'] = 'Come l\'output del programma viene confrontato con l\'output atteso di ogni test.

* **Esattamente**: conta ogni carattere.
* **Gli spazi alla fine non contano**: gli spazi alla fine delle righe e le righe vuote alla fine vengono ignorati.
* **Righe in qualsiasi ordine**: come il precedente, ma le righe possono venire in qualsiasi ordine, per le query SQL senza ORDER BY.
* **Numeri con tolleranza**: gli output vengono confrontati parola per parola, e due numeri sono uguali quando non differiscono più della tolleranza (assoluta, o relativa al numero maggiore). Spazi e a capo tra le parole non contano.
* **Espressione regolare**: l\'output atteso di ogni test è un\'espressione regolare (PCRE) che deve corrispondere all\'intero output, per esempio <code>Sum: [0-9]+</code>. Gli output attesi vuoti vengono riempiti dalla soluzione con modelli che corrispondono solo a quell\'output.';
$string['comparison_exact'] = 'Esattamente';
$string['comparison_numbers'] = 'Numeri con tolleranza';
$string['comparison_regex'] = 'Espressione regolare';
$string['comparison_spaces'] = 'Gli spazi alla fine non contano';
$string['comparison_unordered'] = 'Righe in qualsiasi ordine (righe SQL)';
$string['compileerror'] = 'Il programma non compila:';
$string['cputime'] = 'Limite di tempo CPU (secondi)';
$string['cputime_help'] = 'Tempo CPU massimo di un\'esecuzione di un test quando la risposta viene valutata. Vuoto: l\'impostazione del plugin dell\'editor CodeLab (5 secondi se non modificata). Al massimo {$a} secondi (fissato dall\'amministratore). Esegui ed Esegui i test durante il tentativo mantengono l\'impostazione del sito.';
$string['distractors'] = 'Righe distrattrici';
$string['distractors_help'] = 'Righe mescolate con le righe della soluzione ma che non ne fanno parte, una per riga (per esempio una condizione sbagliata o una riga inutile). Gli studenti che le usano non superano i test.';
$string['failed'] = 'Non superato';
$string['hiddensummary'] = 'Test nascosti superati: {$a->passed} su {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Linguaggio di programmazione';
$string['maxcputime'] = 'Tempo CPU massimo di una domanda';
$string['maxcputime_desc'] = 'Le domande non possono chiedere a Jobe più tempo CPU di questo, in secondi per esecuzione.';
$string['maxmemory'] = 'Memoria massima di una domanda';
$string['maxmemory_desc'] = 'Le domande non possono chiedere a Jobe più memoria di questa, in MB per esecuzione.';
$string['memorylimit'] = 'Limite di memoria (MB)';
$string['memorylimit_help'] = 'Memoria massima di un\'esecuzione di un test quando la risposta viene valutata. Vuoto: il valore predefinito del server Jobe. Al massimo {$a} MB (fissato dall\'amministratore). Un linguaggio che ha bisogno di più memoria per avviarsi (JavaScript ha bisogno di 1000 MB) riceve quello che gli serve. Su un CodeLab runner questo limite non si applica a Java, C# e JavaScript: lì ricevono sempre un heap di 256 MB.';
$string['noanswer'] = 'Scrivi prima un programma.';
$string['noassist'] = 'Disattiva il completamento del codice e i suggerimenti (per le verifiche)';
$string['noexpected'] = 'Indica l\'output atteso, o una soluzione da cui calcolarlo.';
$string['ordercheck'] = 'Controllo dell\'ordine';
$string['ordercheck_help'] = 'Gli studenti possono premere Controlla l\'ordine per vedere quante righe sono al loro posto, mai quali. Una riga è al suo posto quando appartiene alla più lunga sequenza comune delle loro righe e delle righe della soluzione (in Python anche con la stessa indentazione); gli spazi non contano e le righe distrattrici non sono mai al loro posto. Con parte del punteggio: una risposta che non supera i test ottiene fino a metà del punteggio per le righe al loro posto. I test decidono sempre il punteggio pieno.';
$string['ordercheck_off'] = 'No';
$string['ordercheck_on'] = 'Sì';
$string['ordercheck_partial'] = 'Sì, con parte del punteggio per l\'ordine';
$string['ordercheckfailed'] = 'Non è stato possibile controllare l\'ordine.';
$string['orderresult'] = 'Righe al loro posto: {$a->placed} di {$a->total}';
$string['parsons'] = 'Problema di Parsons';
$string['parsons_help'] = 'Gli studenti non scrivono il programma: ricevono le righe della soluzione, mescolate con le righe distrattrici, e le mettono in ordine (in Python anche con l\'indentazione giusta). Il programma che formano viene valutato dai test come al solito.';
$string['parsons_label'] = 'Rispondere mettendo in ordine le righe della soluzione';
$string['parsonsadd'] = 'Aggiungi al programma: {$a}';
$string['parsonsanswer'] = 'Il tuo programma';
$string['parsonsdown'] = 'Sposta giù';
$string['parsonshint'] = 'Trascina le righe nel tuo programma nell\'ordine giusto, oppure fai clic su una riga per aggiungerla alla fine. Alcune righe potrebbero non servire.';
$string['parsonsindent'] = 'Aumenta rientro';
$string['parsonsnosolution'] = 'Un problema di Parsons ha bisogno della soluzione: le sue righe sono quelle che gli studenti mettono in ordine.';
$string['parsonsoutdent'] = 'Riduci rientro';
$string['parsonspool'] = 'Righe';
$string['parsonsprogram'] = 'Il programma formato dalle tue righe (Esegui, Passo e i test lo usano):';
$string['parsonsremove'] = 'Torna alle righe';
$string['parsonsup'] = 'Sposta su';
$string['passed'] = 'Superato';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'Lo studente scrive un programma in un editor di codice. Con i test, il programma viene eseguito sul server Jobe con l\'input di ogni test e valutato in base alla quota di test con l\'output giusto. Senza test, lo valuta il docente.';
$string['pluginnameadding'] = 'Aggiunta di una domanda CodeLab';
$string['pluginnameediting'] = 'Modifica di una domanda CodeLab';
$string['pluginnamesummary'] = 'Lo studente scrive un programma in C, C++, Python, Java o C#.';
$string['prefix'] = 'Codice prima';
$string['prefix_help'] = 'Codice aggiunto prima del programma dello studente quando viene eseguito, per esempio righe #include o l\'inizio di una classe. Gli studenti non lo vedono nell\'editor.';
$string['privacy:metadata:jobe'] = 'Le risposte vengono inviate al server Jobe impostato dall\'amministratore per essere eseguite con i test della domanda. Le risposte stesse sono conservate dal motore delle domande.';
$string['privacy:metadata:jobe:code'] = 'Il programma scritto dallo studente';
$string['privacy:metadata:jobe:stdin'] = 'L\'input di un test';
$string['privacy:metadata:pyodide'] = 'Quando Python viene eseguito nel browser durante un tentativo (Esegui e Passo), il browser dello studente carica Pyodide (l\'interprete Python) dall\'indirizzo impostato dall\'amministratore, per impostazione predefinita il CDN jsDelivr. Non viene inviata nessuna risposta né input.';
$string['privacy:metadata:pyodide:ipaddress'] = 'L\'indirizzo IP del browser dello studente, come per ogni download';
$string['privacy:metadata:runner'] = 'Quando l\'amministratore imposta un CodeLab runner (proprio o ospitato), le risposte vengono inviate lì per essere eseguite con i test della domanda (SQL sempre, gli altri linguaggi quando il runner è il server di esecuzione e valutazione), ed Esegui durante il tentativo esegue lì il programma mentre lo studente digita il suo input. Il runner conserva un programma solo mentre è in esecuzione. Le risposte stesse sono conservate dal motore delle domande.';
$string['privacy:metadata:runner:code'] = 'Il programma scritto dallo studente';
$string['privacy:metadata:runner:stdin'] = 'L\'input di un test, o l\'input che lo studente digita';
$string['privacy:metadata:runner:userid'] = 'L\'id dello studente, in un token firmato per Esegui durante il tentativo, per limitare il numero di programmi che ogni utente esegue contemporaneamente';
$string['runtests'] = 'Esegui i test';
$string['sandboxfailed'] = 'Non è stato possibile controllare il programma sul server (Jobe). Lo valuterà il tuo docente.';
$string['savefailing'] = 'Salva anche se la soluzione non supera i test';
$string['showtests'] = 'Test durante il tentativo';
$string['showtests_desc'] = 'Gli studenti possono eseguire i test non nascosti prima di inviare';
$string['solution'] = 'Soluzione';
$string['solution_help'] = 'Il programma del docente. Gli output attesi vuoti dei test vengono riempiti eseguendolo quando la domanda viene salvata; gli studenti lo vedono come risposta corretta nella revisione.';
$string['solutioncheck'] = 'Controllo della soluzione';
$string['solutioncheck_help'] = 'Quando la domanda viene salvata, la soluzione viene eseguita su Jobe con l\'input di ogni test che ha un output atteso, e la domanda viene salvata solo se li supera tutti. Spunta questa casella per salvare comunque, per esempio mentre stai ancora scrivendo i test. Quando Jobe non è raggiungibile, la domanda viene salvata senza il controllo.';
$string['solutionfails'] = 'La soluzione non supera questo test. Il suo output: {$a}';
$string['solutionis'] = 'Una soluzione:';
$string['solutionnocompile'] = 'La soluzione non compila: {$a}';
$string['suffix'] = 'Codice dopo';
$string['suffix_help'] = 'Codice aggiunto dopo il programma dello studente quando viene eseguito, per esempio una funzione main che chiama la funzione dello studente, o la fine di una classe. Gli studenti non lo vedono nell\'editor.';
$string['template'] = 'Codice iniziale';
$string['template_help'] = 'Codice da cui gli studenti partono nell\'editor; può essere vuoto.';
$string['test'] = 'Test';
$string['testcode'] = 'Codice del test';
$string['testcode_help'] = 'Codice eseguito in questo test, per esempio una chiamata della funzione che lo studente scrive: <code>printf("%d\\n", sum(2, 3));</code> o <code>print(sum(2, 3))</code>. Può essere vuoto.

* Se il codice dopo il programma dello studente contiene il segnaposto <code>{{TEST}}</code>, per esempio dentro un main che scrivi tu, il codice del test prende il suo posto.
* Altrimenti un programma C o C++ senza main ne riceve uno: <code>int main(void) { test code return 0; }</code>.
* Negli altri linguaggi il codice del test viene aggiunto alla fine del programma.

Il test può avere anche un input. Gli studenti vedono il codice dei test che non sono nascosti.';
$string['testcoden'] = 'Test {no}: codice del test';
$string['testexpected'] = 'Output atteso';
$string['testfailed'] = 'Test {$a}: non superato';
$string['testgot'] = 'Output';
$string['testhidden'] = 'Nascosto agli studenti';
$string['testinputn'] = 'Test {no}: input';
$string['testpassed'] = 'Test {$a}: superato';
$string['tests'] = 'Test';
$string['tests_desc'] = 'Ogni test dà un input al programma e confronta il suo output con l\'output atteso. Lascia vuoto l\'output atteso per prenderlo dalla soluzione. Senza test, il docente valuta le risposte.';
$string['testsof'] = '{$a->passed} test superati su {$a->total}';
$string['teststdin'] = 'Input';
$string['testsummary'] = 'Test superati: {$a->passed} su {$a->total}';
$string['testtime'] = '{$a} s';
$string['testweight'] = 'Peso';
$string['timelimit'] = 'Limite di tempo per test (s)';
$string['timelimit_help'] = 'Secondi che un test può durare: un test più lungo fallisce come troppo lento, anche se il suo output è giusto. Vuoto: nessun limite. Da 0.1 a 30. Solo il CodeLab runner riporta quanto è durato un test; su Jobe questo campo non ha effetto e conta solo il limite di tempo CPU. Il tempo è misurato sul server e comprende l\'avvio del linguaggio (circa 0.3 secondi per Java e C#), quindi lasciare margine sopra il tempo di una buona soluzione.';
$string['tolerance'] = 'Tolleranza';
$string['tolerance_help'] = 'Per il confronto con i numeri: la differenza più grande tra due numeri che conta ancora come uguaglianza, assoluta o relativa al numero maggiore. Con 0.001, 3.1416 corrisponde a 3.1414 e 1000.4 a 1000.';
$string['tooslow'] = 'Troppo lento: {$a->time} s, il limite è {$a->limit} s';
