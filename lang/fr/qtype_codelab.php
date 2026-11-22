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
 * Strings for component 'qtype_codelab', language 'fr' (French).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Ajouter {no} tests de plus';
$string['aihints'] = 'Explications de l\'IA';
$string['aihints_help'] = 'Quand l\'administrateur a activé les explications des erreurs par l\'IA de CodeLab pour TinyMCE, les élèves ont, sous un message du compilateur ou une erreur de leur programme, un bouton qui demande à l\'IA du site de l\'expliquer. L\'IA a pour consigne de ne jamais écrire la correction. Sans cette option, le bouton n\'est jamais affiché dans un test.';
$string['aihints_label'] = 'Les élèves peuvent demander à l\'IA d\'expliquer un message du compilateur ou une erreur';
$string['answer'] = 'Programme';
$string['answerlabel'] = 'Votre programme ({$a})';
$string['assist'] = 'Aide à la saisie';
$string['badlimit'] = 'Donnez un nombre entier de 1 à {$a}, ou laissez vide pour la valeur par défaut.';
$string['badregex'] = 'Ce n\'est pas une expression régulière valide.';
$string['badtimelimit'] = 'Indiquez un nombre de secondes de 0.1 à 30, ou laissez vide pour aucune limite.';
$string['badtolerance'] = 'Donnez un nombre supérieur ou égal à 0, par exemple 0.001.';
$string['bulkcheck'] = 'Vérifier les solutions CodeLab';
$string['bulkcheck_again'] = 'Vérifier de nouveau';
$string['bulkcheck_bank'] = 'Banque de questions';
$string['bulkcheck_done'] = '{$a->total} questions vérifiées : {$a->ok} réussissent tous leurs tests, {$a->problems} demandent de l\'attention.';
$string['bulkcheck_finished'] = 'Terminé.';
$string['bulkcheck_intro'] = 'La solution de chacune des {$a} questions CodeLab des banques de questions de ce cours est exécutée sur le serveur Jobe avec les tests de sa question, une par une. Les questions dont la solution échoue, ne compile pas ou manque sont listées en premier. Les résultats des solutions déjà vérifiées viennent du cache.';
$string['bulkcheck_none'] = 'Il n\'y a aucune question CodeLab dans les banques de questions de ce cours.';
$string['bulkcheck_progress'] = 'Vérification de {$a->done} sur {$a->total} : {$a->name}';
$string['bulkcheck_result'] = 'Résultat';
$string['bulkcheck_start'] = 'Lancer la vérification';
$string['cachedef_results'] = 'Résultats des tests des programmes soumis';
$string['check_compile'] = 'Ne compile pas';
$string['check_failed'] = 'Réussit {$a->passed} tests sur {$a->total}';
$string['check_jobe'] = 'Jobe n\'a pas pu l\'exécuter';
$string['check_nosolution'] = 'Pas de solution';
$string['check_notests'] = 'Pas de tests (noté par l\'enseignant)';
$string['check_ok'] = 'Réussit tous les tests ({$a->total})';
$string['checkfailed'] = 'Le programme n\'a pas pu être vérifié sur le serveur (Jobe), cet essai ne compte donc pas. Appuyez de nouveau sur Vérifier dans un instant.';
$string['checkorder'] = 'Vérifier l\'ordre';
$string['classanalysis'] = 'Analyse';
$string['classanswers'] = 'Réponses';
$string['classempty'] = 'Pas encore de réponses.';
$string['classemptyoutput'] = '(pas de sortie)';
$string['classgrades'] = 'Notes (pourcentage)';
$string['classhidenames'] = 'Masquer les noms';
$string['classmessages'] = 'Messages du compilateur les plus fréquents';
$string['classnotgraded'] = 'non noté';
$string['classother'] = '{$a} réponses à d\'autres versions de la question ne sont pas analysées.';
$string['classpending'] = '{$a} réponses de plus sont en cours de vérification ; l\'analyse s\'enrichit dans un instant.';
$string['classshownames'] = 'Afficher les noms';
$string['classstudent'] = 'Élève {$a}';
$string['classsummary'] = 'Réponses : {$a->answers} · ne compilent pas : {$a->compile} · erreur dans un test : {$a->runtime} · au-delà de la limite de temps ou de mémoire : {$a->timelimit}';
$string['classtest'] = 'Test {$a->n} : {$a->passed} sur {$a->total} réussissent';
$string['classtesthidden'] = 'Test {$a->n} (caché) : {$a->passed} sur {$a->total} réussissent';
$string['classunchecked'] = '{$a} réponses n\'ont pas pu être vérifiées par le serveur.';
$string['classwork'] = 'Travail de la classe';
$string['classwrong'] = 'Sorties fausses fréquentes :';
$string['codeheader'] = 'Code';
$string['compare'] = 'Comparaison de la sortie';
$string['compare_help'] = 'Comment la sortie du programme est comparée à la sortie attendue de chaque test.

* **Exactement** : chaque caractère compte.
* **Les espaces à la fin ne comptent pas** : les espaces en fin de ligne et les lignes vides à la fin sont ignorés.
* **Lignes dans n\'importe quel ordre** : comme le précédent, mais les lignes peuvent venir dans n\'importe quel ordre, pour les requêtes SQL sans ORDER BY.
* **Nombres avec une tolérance** : les sorties sont comparées mot par mot, et deux nombres sont égaux quand ils ne diffèrent pas de plus que la tolérance (absolue, ou relative au plus grand nombre). Les espaces et les retours à la ligne entre les mots ne comptent pas.
* **Expression régulière** : la sortie attendue de chaque test est une expression régulière (PCRE) qui doit correspondre à toute la sortie, par exemple <code>Sum: [0-9]+</code>. Les sorties attendues vides sont remplies à partir de la solution par des motifs qui ne correspondent qu\'à cette sortie.';
$string['comparison_exact'] = 'Exactement';
$string['comparison_numbers'] = 'Nombres avec une tolérance';
$string['comparison_regex'] = 'Expression régulière';
$string['comparison_spaces'] = 'Les espaces à la fin ne comptent pas';
$string['comparison_unordered'] = 'Lignes dans n\'importe quel ordre (lignes SQL)';
$string['compileerror'] = 'Le programme ne compile pas :';
$string['cputime'] = 'Limite de temps CPU (secondes)';
$string['cputime_help'] = 'Temps CPU maximal d\'une exécution d\'un test quand la réponse est notée. Vide : le réglage du plugin d\'éditeur CodeLab (5 secondes sauf modification). Au plus {$a} secondes (fixé par l\'administrateur). Exécuter et Exécuter les tests pendant la tentative gardent le réglage du site.';
$string['distractors'] = 'Lignes de distraction';
$string['distractors_help'] = 'Lignes mélangées aux lignes de la solution mais qui n\'en font pas partie, une par ligne (par exemple une mauvaise condition ou une ligne inutile). Les élèves qui les utilisent ne réussissent pas les tests.';
$string['failed'] = 'Échoué';
$string['hiddensummary'] = 'Tests cachés réussis : {$a->passed} sur {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Langage de programmation';
$string['maxcputime'] = 'Temps CPU maximal d\'une question';
$string['maxcputime_desc'] = 'Les questions ne peuvent pas demander à Jobe plus de temps CPU que cela, en secondes par exécution.';
$string['maxmemory'] = 'Mémoire maximale d\'une question';
$string['maxmemory_desc'] = 'Les questions ne peuvent pas demander à Jobe plus de mémoire que cela, en Mo par exécution.';
$string['memorylimit'] = 'Limite de mémoire (Mo)';
$string['memorylimit_help'] = 'Mémoire maximale d\'une exécution d\'un test quand la réponse est notée. Vide : la valeur par défaut du serveur Jobe. Au plus {$a} Mo (fixé par l\'administrateur). Un langage qui a besoin de plus pour démarrer (JavaScript a besoin de 1000 Mo) obtient ce dont il a besoin. Sur un CodeLab runner, cette limite ne s\'applique pas à Java, C# et JavaScript : ils y ont toujours un tas de 256 Mo.';
$string['noanswer'] = 'Écrivez d\'abord un programme.';
$string['noassist'] = 'Désactiver l\'autocomplétion et les indications (pour les évaluations)';
$string['noexpected'] = 'Donnez la sortie attendue, ou une solution à partir de laquelle la calculer.';
$string['ordercheck'] = 'Vérification de l\'ordre';
$string['ordercheck_help'] = 'Les élèves peuvent appuyer sur Vérifier l\'ordre pour voir combien de lignes sont à leur place, jamais lesquelles. Une ligne est à sa place quand elle appartient à la plus longue séquence commune de leurs lignes et des lignes de la solution (en Python aussi au même niveau d\'indentation) ; les espaces ne comptent pas et les lignes pièges ne sont jamais à leur place. Avec une partie de la note : une réponse qui échoue aux tests obtient jusqu\'à la moitié de la note pour les lignes à leur place. Les tests décident toujours de la note complète.';
$string['ordercheck_off'] = 'Non';
$string['ordercheck_on'] = 'Oui';
$string['ordercheck_partial'] = 'Oui, avec une partie de la note pour l\'ordre';
$string['ordercheckfailed'] = 'L\'ordre n\'a pas pu être vérifié.';
$string['orderresult'] = 'Lignes à leur place : {$a->placed} sur {$a->total}';
$string['parsons'] = 'Problème de Parsons';
$string['parsons_help'] = 'Les élèves n\'écrivent pas le programme : ils reçoivent les lignes de la solution, mélangées avec les lignes de distraction, et les mettent dans l\'ordre (en Python aussi avec la bonne indentation). Le programme qu\'ils forment est noté par les tests comme d\'habitude.';
$string['parsons_label'] = 'Répondre en remettant les lignes de la solution dans l\'ordre';
$string['parsonsadd'] = 'Ajouter au programme : {$a}';
$string['parsonsanswer'] = 'Votre programme';
$string['parsonsdown'] = 'Descendre';
$string['parsonshint'] = 'Faites glisser les lignes dans votre programme dans le bon ordre, ou cliquez sur une ligne pour l\'ajouter à la fin. Certaines lignes ne sont peut-être pas nécessaires.';
$string['parsonsindent'] = 'Indenter';
$string['parsonsnosolution'] = 'Un problème de Parsons a besoin de la solution : ce sont ses lignes que les élèves remettent dans l\'ordre.';
$string['parsonsoutdent'] = 'Désindenter';
$string['parsonspool'] = 'Lignes';
$string['parsonsprogram'] = 'Le programme formé de vos lignes (Exécuter, Pas à pas et les tests l\'utilisent) :';
$string['parsonsremove'] = 'Retour aux lignes';
$string['parsonsup'] = 'Monter';
$string['passed'] = 'Réussi';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'L\'élève écrit un programme dans un éditeur de code. Avec des tests, le programme est exécuté sur le serveur Jobe avec l\'entrée de chaque test et noté selon la part des tests dont la sortie est juste. Sans tests, l\'enseignant le note.';
$string['pluginnameadding'] = 'Ajout d\'une question CodeLab';
$string['pluginnameediting'] = 'Modification d\'une question CodeLab';
$string['pluginnamesummary'] = 'L\'élève écrit un programme en C, C++, Python, Java ou C#.';
$string['prefix'] = 'Code avant';
$string['prefix_help'] = 'Code ajouté avant le programme de l\'élève lors de l\'exécution, par exemple des lignes #include ou le début d\'une classe. Les élèves ne le voient pas dans l\'éditeur.';
$string['privacy:metadata:jobe'] = 'Les réponses sont envoyées au serveur Jobe configuré par l\'administrateur pour être exécutées avec les tests de la question. Les réponses elles-mêmes sont conservées par le moteur de questions.';
$string['privacy:metadata:jobe:code'] = 'Le programme écrit par l\'élève';
$string['privacy:metadata:jobe:stdin'] = 'L\'entrée d\'un test';
$string['privacy:metadata:pyodide'] = 'Quand Python s\'exécute dans le navigateur pendant une tentative (Exécuter et Pas à pas), le navigateur de l\'élève charge Pyodide (l\'interpréteur Python) depuis l\'adresse configurée par l\'administrateur, par défaut le CDN jsDelivr. Aucune réponse ni aucune entrée ne sont envoyées.';
$string['privacy:metadata:pyodide:ipaddress'] = 'L\'adresse IP du navigateur de l\'élève, comme pour tout téléchargement';
$string['privacy:metadata:runner'] = 'Quand l\'administrateur configure un CodeLab runner (le sien ou un hébergé), les réponses y sont envoyées pour être exécutées avec les tests de la question (SQL toujours, les autres langages quand le runner est le serveur d\'exécution et d\'évaluation), et Exécuter pendant la tentative y exécute le programme pendant que l\'élève tape son entrée. Le runner ne garde un programme que pendant son exécution. Les réponses elles-mêmes sont conservées par le moteur de questions.';
$string['privacy:metadata:runner:code'] = 'Le programme écrit par l\'élève';
$string['privacy:metadata:runner:stdin'] = 'L\'entrée d\'un test, ou l\'entrée que l\'élève tape';
$string['privacy:metadata:runner:userid'] = 'L\'identifiant de l\'élève, dans un jeton signé pour Exécuter pendant la tentative, pour limiter le nombre de programmes que chaque utilisateur exécute en même temps';
$string['runtests'] = 'Exécuter les tests';
$string['sandboxfailed'] = 'Le programme n\'a pas pu être vérifié sur le serveur (Jobe). Votre enseignant le notera.';
$string['savefailing'] = 'Enregistrer même si la solution échoue aux tests';
$string['showtests'] = 'Tests pendant la tentative';
$string['showtests_desc'] = 'Les élèves peuvent exécuter les tests non cachés avant d\'envoyer';
$string['solution'] = 'Solution';
$string['solution_help'] = 'Le programme de l\'enseignant. Les sorties attendues vides des tests sont remplies en l\'exécutant à l\'enregistrement de la question ; les élèves le voient comme bonne réponse dans la relecture.';
$string['solutioncheck'] = 'Vérification de la solution';
$string['solutioncheck_help'] = 'À l\'enregistrement de la question, la solution est exécutée sur Jobe avec l\'entrée de chaque test qui a une sortie attendue, et la question n\'est enregistrée que si elle les réussit tous. Cochez cette case pour enregistrer quand même, par exemple pendant que vous écrivez encore les tests. Quand Jobe ne peut pas être joint, la question est enregistrée sans la vérification.';
$string['solutionfails'] = 'La solution échoue à ce test. Sa sortie : {$a}';
$string['solutionis'] = 'Une solution :';
$string['solutionnocompile'] = 'La solution ne compile pas : {$a}';
$string['suffix'] = 'Code après';
$string['suffix_help'] = 'Code ajouté après le programme de l\'élève lors de l\'exécution, par exemple une fonction main qui appelle la fonction de l\'élève, ou la fin d\'une classe. Les élèves ne le voient pas dans l\'éditeur.';
$string['template'] = 'Code de départ';
$string['template_help'] = 'Code dont les élèves partent dans l\'éditeur ; peut être vide.';
$string['test'] = 'Test';
$string['testcode'] = 'Code du test';
$string['testcode_help'] = 'Code exécuté dans ce test, par exemple un appel de la fonction que l\'élève écrit : <code>printf("%d\\n", sum(2, 3));</code> ou <code>print(sum(2, 3))</code>. Il peut être vide.

* Si le code après le programme de l\'élève contient le marqueur <code>{{TEST}}</code>, par exemple dans un main que vous écrivez, le code du test prend sa place.
* Sinon, un programme C ou C++ sans main en reçoit un : <code>int main(void) { test code return 0; }</code>.
* Dans les autres langages, le code du test est ajouté à la fin du programme.

Le test peut aussi avoir une entrée. Les élèves voient le code des tests qui ne sont pas cachés.';
$string['testcoden'] = 'Test {no} : code du test';
$string['testexpected'] = 'Sortie attendue';
$string['testfailed'] = 'Test {$a} : échoué';
$string['testgot'] = 'Sortie';
$string['testhidden'] = 'Caché aux élèves';
$string['testinputn'] = 'Test {no} : entrée';
$string['testpassed'] = 'Test {$a} : réussi';
$string['tests'] = 'Tests';
$string['tests_desc'] = 'Chaque test donne une entrée au programme et compare sa sortie à la sortie attendue. Laissez la sortie attendue vide pour la prendre de la solution. Sans tests, l\'enseignant note les réponses.';
$string['testsof'] = '{$a->passed} tests réussis sur {$a->total}';
$string['teststdin'] = 'Entrée';
$string['testsummary'] = 'Tests réussis : {$a->passed} sur {$a->total}';
$string['testtime'] = '{$a} s';
$string['testweight'] = 'Poids';
$string['timelimit'] = 'Limite de temps par test (s)';
$string['timelimit_help'] = 'Secondes que peut durer un test : un test plus long échoue comme trop lent, même si sa sortie est juste. Vide : aucune limite. De 0.1 à 30. Seul le CodeLab runner indique la durée d\'un test ; sur Jobe ce champ n\'a aucun effet et seule la limite de temps CPU compte. Le temps est mesuré sur le serveur et inclut le démarrage du langage (environ 0.3 seconde pour Java et C#) : laissez une marge au-dessus du temps d\'une bonne solution.';
$string['tolerance'] = 'Tolérance';
$string['tolerance_help'] = 'Pour la comparaison avec des nombres : la plus grande différence entre deux nombres qui compte encore comme égalité, absolue ou relative au plus grand nombre. Avec 0.001, 3.1416 correspond à 3.1414 et 1000.4 à 1000.';
$string['tooslow'] = 'Trop lent : {$a->time} s, la limite est de {$a->limit} s';
