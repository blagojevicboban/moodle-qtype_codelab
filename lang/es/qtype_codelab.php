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
 * Strings for component 'qtype_codelab', language 'es' (Spanish).
 *
 * @package    qtype_codelab
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtests'] = 'Añadir {no} pruebas más';
$string['aihints'] = 'Explicaciones de la IA';
$string['aihints_help'] = 'Cuando el administrador ha activado las explicaciones de errores con IA de CodeLab para TinyMCE, los estudiantes tienen, bajo un mensaje del compilador o un error de su programa, un botón que pide a la IA del sitio que lo explique. La IA tiene la instrucción de no escribir nunca la corrección. Sin esta opción, el botón nunca se muestra en un cuestionario.';
$string['aihints_label'] = 'Los estudiantes pueden pedir a la IA que explique un mensaje del compilador o un error';
$string['answer'] = 'Programa';
$string['answerlabel'] = 'Su programa ({$a})';
$string['assist'] = 'Ayuda de escritura';
$string['badlimit'] = 'Indique un número entero de 1 a {$a}, o déjelo vacío para el valor predeterminado.';
$string['badregex'] = 'Esta no es una expresión regular válida.';
$string['badtimelimit'] = 'Indique un número de segundos de 0.1 a 30, o déjelo vacío para no tener límite.';
$string['badtolerance'] = 'Indique un número de 0 o más, por ejemplo 0.001.';
$string['bulkcheck'] = 'Comprobar las soluciones CodeLab';
$string['bulkcheck_again'] = 'Comprobar de nuevo';
$string['bulkcheck_bank'] = 'Banco de preguntas';
$string['bulkcheck_done'] = '{$a->total} preguntas comprobadas: {$a->ok} superan todas sus pruebas, {$a->problems} necesitan atención.';
$string['bulkcheck_finished'] = 'Terminado.';
$string['bulkcheck_intro'] = 'La solución de cada una de las {$a} preguntas CodeLab de los bancos de preguntas de este curso se ejecuta en el servidor Jobe con las pruebas de su pregunta, una a una. Las preguntas cuya solución falla, no compila o falta aparecen primero. Los resultados de soluciones ya comprobadas se toman de la caché.';
$string['bulkcheck_none'] = 'No hay preguntas CodeLab en los bancos de preguntas de este curso.';
$string['bulkcheck_progress'] = 'Comprobando {$a->done} de {$a->total}: {$a->name}';
$string['bulkcheck_result'] = 'Resultado';
$string['bulkcheck_start'] = 'Iniciar la comprobación';
$string['cachedef_results'] = 'Resultados de las pruebas de los programas enviados';
$string['check_compile'] = 'No compila';
$string['check_failed'] = 'Supera {$a->passed} de {$a->total} pruebas';
$string['check_jobe'] = 'Jobe no pudo ejecutarla';
$string['check_nosolution'] = 'Sin solución';
$string['check_notests'] = 'Sin pruebas (la califica el profesor)';
$string['check_ok'] = 'Supera todas las pruebas ({$a->total})';
$string['checkfailed'] = 'No se pudo comprobar el programa en el servidor (Jobe), así que este intento no cuenta. Pulse Comprobar de nuevo en un momento.';
$string['checkorder'] = 'Comprobar el orden';
$string['classanalysis'] = 'Análisis';
$string['classanswers'] = 'Respuestas';
$string['classempty'] = 'Todavía no hay respuestas.';
$string['classemptyoutput'] = '(sin salida)';
$string['classgrades'] = 'Calificaciones (porcentaje)';
$string['classhidenames'] = 'Ocultar nombres';
$string['classmessages'] = 'Mensajes del compilador más frecuentes';
$string['classnotgraded'] = 'sin calificar';
$string['classother'] = 'No se analizan {$a} respuestas a otras versiones de la pregunta.';
$string['classpending'] = 'Se están comprobando {$a} respuestas más; el análisis crece en un momento.';
$string['classshownames'] = 'Mostrar nombres';
$string['classsimilar'] = 'Entregas similares';
$string['classsimilarnote'] = 'Comparadas localmente por estructura de código (ignorando nombres de variables, espacios, comentarios y código inicial); revise las respuestas antes de decidir.';
$string['classstudent'] = 'Estudiante {$a}';
$string['classsummary'] = 'Respuestas: {$a->answers} · no compilan: {$a->compile} · error en una prueba: {$a->runtime} · por encima del límite de tiempo o memoria: {$a->timelimit}';
$string['classtest'] = 'Prueba {$a->n}: {$a->passed} de {$a->total} la superan';
$string['classtesthidden'] = 'Prueba {$a->n} (oculta): {$a->passed} de {$a->total} la superan';
$string['classunchecked'] = 'El servidor no pudo comprobar {$a} respuestas.';
$string['classwork'] = 'Trabajo de la clase';
$string['classwrong'] = 'Salidas erróneas frecuentes:';
$string['codeheader'] = 'Código';
$string['compare'] = 'Comparación de la salida';
$string['compare_help'] = 'Cómo se compara la salida del programa con la salida esperada de cada prueba.

* **Exactamente**: cuenta cada carácter.
* **Los espacios al final no cuentan**: se omiten los espacios al final de las líneas y las líneas vacías al final.
* **Líneas en cualquier orden**: como el anterior, pero las líneas pueden venir en cualquier orden, para consultas SQL sin ORDER BY.
* **Números con tolerancia**: las salidas se comparan palabra por palabra, y dos números son iguales cuando no difieren en más que la tolerancia (absoluta, o relativa al número mayor). Los espacios y saltos de línea entre las palabras no cuentan.
* **Expresión regular**: la salida esperada de cada prueba es una expresión regular (PCRE) que debe coincidir con toda la salida, por ejemplo <code>Sum: [0-9]+</code>. Las salidas esperadas vacías se rellenan a partir de la solución como patrones que solo coinciden con esa salida.';
$string['comparison_exact'] = 'Exactamente';
$string['comparison_numbers'] = 'Números con tolerancia';
$string['comparison_regex'] = 'Expresión regular';
$string['comparison_spaces'] = 'Los espacios al final no cuentan';
$string['comparison_unordered'] = 'Líneas en cualquier orden (filas SQL)';
$string['compileerror'] = 'El programa no compila:';
$string['cputime'] = 'Límite de tiempo de CPU (segundos)';
$string['cputime_help'] = 'Tiempo de CPU máximo de una ejecución de una prueba cuando se califica la respuesta. Vacío: el ajuste del plugin del editor CodeLab (5 segundos si no se cambió). Como máximo {$a} segundos (fijado por el administrador). Ejecutar y Ejecutar las pruebas durante el intento mantienen el ajuste del sitio.';
$string['distractors'] = 'Líneas distractoras';
$string['distractors_help'] = 'Líneas que se mezclan con las líneas de la solución pero no pertenecen a ella, una por línea (por ejemplo una condición equivocada o una línea innecesaria). Los estudiantes que las usan no superan las pruebas.';
$string['failed'] = 'No superada';
$string['gaps'] = 'Huecos para completar';
$string['gaps_help'] = 'Número de expresiones ocultas como huecos en las líneas de un problema de Parsons (0 solo para ordenar). Los estudiantes los completan mientras ordenan las líneas.';
$string['gaps_none'] = '0 (solo ordenar)';
$string['hiddensummary'] = 'Pruebas ocultas superadas: {$a->passed} de {$a->total}';
$string['lang_c'] = 'C';
$string['lang_cpp'] = 'C++';
$string['lang_csharp'] = 'C#';
$string['lang_java'] = 'Java';
$string['lang_javascript'] = 'JavaScript (Node.js)';
$string['lang_mysql'] = 'MySQL (MariaDB)';
$string['lang_pascal'] = 'Pascal';
$string['lang_php'] = 'PHP';
$string['lang_python'] = 'Python';
$string['language'] = 'Lenguaje de programación';
$string['maxcputime'] = 'Tiempo de CPU máximo de una pregunta';
$string['maxcputime_desc'] = 'Las preguntas no pueden pedir a Jobe más tiempo de CPU que este, en segundos por ejecución.';
$string['maxmemory'] = 'Memoria máxima de una pregunta';
$string['maxmemory_desc'] = 'Las preguntas no pueden pedir a Jobe más memoria que esta, en MB por ejecución.';
$string['memorylimit'] = 'Límite de memoria (MB)';
$string['memorylimit_help'] = 'Memoria máxima de una ejecución de una prueba cuando se califica la respuesta. Vacío: el valor predeterminado del servidor Jobe. Como máximo {$a} MB (fijado por el administrador). Un lenguaje que necesita más para arrancar (JavaScript necesita 1000 MB) recibe lo que necesita. En un CodeLab runner este límite no se aplica a Java, C# y JavaScript: allí reciben siempre un heap de 256 MB.';
$string['noanswer'] = 'Escriba primero un programa.';
$string['noassist'] = 'Desactivar el autocompletado y las pistas (para exámenes)';
$string['noexpected'] = 'Indique la salida esperada, o una solución para calcularla.';
$string['ordercheck'] = 'Comprobación del orden';
$string['ordercheck_help'] = 'Los estudiantes pueden pulsar Comprobar el orden para ver cuántas líneas están en su sitio, nunca cuáles. Una línea está en su sitio cuando pertenece a la secuencia común más larga de sus líneas y las de la solución (en Python también con la misma sangría); los espacios no cuentan y las líneas distractoras nunca están en su sitio. Con parte de la nota: una respuesta que no pasa las pruebas obtiene hasta la mitad de la nota por las líneas en su sitio. Las pruebas siguen decidiendo la nota completa.';
$string['ordercheck_off'] = 'No';
$string['ordercheck_on'] = 'Sí';
$string['ordercheck_partial'] = 'Sí, con parte de la nota por el orden';
$string['ordercheckfailed'] = 'No se pudo comprobar el orden.';
$string['orderresult'] = 'Líneas en su sitio: {$a->placed} de {$a->total}';
$string['parsons'] = 'Problema de Parsons';
$string['parsons_help'] = 'Los estudiantes no escriben el programa: reciben las líneas de la solución, mezcladas con las líneas distractoras, y las ordenan (en Python también con la sangría correcta). El programa que forman se califica con las pruebas como siempre.';
$string['parsons_label'] = 'Responder ordenando las líneas de la solución';
$string['parsonsadd'] = 'Añadir al programa: {$a}';
$string['parsonsanswer'] = 'Su programa';
$string['parsonsdown'] = 'Bajar';
$string['parsonsgap'] = 'Hueco en la línea {$a}';
$string['parsonshint'] = 'Arrastre las líneas a su programa en el orden correcto, o haga clic en una línea para añadirla al final. Puede que algunas líneas no se necesiten.';
$string['parsonsindent'] = 'Sangrar';
$string['parsonsnosolution'] = 'Un problema de Parsons necesita la solución: sus líneas son las que ordenan los estudiantes.';
$string['parsonsoutdent'] = 'Quitar sangría';
$string['parsonspool'] = 'Líneas';
$string['parsonsprogram'] = 'El programa formado por sus líneas (Ejecutar, Paso y las pruebas lo usan):';
$string['parsonsremove'] = 'Volver a las líneas';
$string['parsonsup'] = 'Subir';
$string['passed'] = 'Superada';
$string['pluginname'] = 'CodeLab';
$string['pluginname_help'] = 'El estudiante escribe un programa en un editor de código. Con pruebas, el programa se ejecuta en el servidor Jobe con la entrada de cada prueba y se califica según la parte de pruebas cuya salida es correcta. Sin pruebas, lo califica el profesor.';
$string['pluginnameadding'] = 'Añadiendo una pregunta CodeLab';
$string['pluginnameediting'] = 'Editando una pregunta CodeLab';
$string['pluginnamesummary'] = 'El estudiante escribe un programa en C, C++, Python, Java o C#.';
$string['prefix'] = 'Código antes';
$string['prefix_help'] = 'Código que se añade antes del programa del estudiante al ejecutarlo, por ejemplo líneas #include o el inicio de una clase. Los estudiantes no lo ven en el editor.';
$string['privacy:metadata:jobe'] = 'Las respuestas se envían al servidor Jobe configurado por el administrador para ejecutarlas con las pruebas de la pregunta. Las respuestas en sí las guarda el motor de preguntas.';
$string['privacy:metadata:jobe:code'] = 'El programa que escribió el estudiante';
$string['privacy:metadata:jobe:stdin'] = 'La entrada de una prueba';
$string['privacy:metadata:pyodide'] = 'Cuando Python se ejecuta en el navegador durante un intento (Ejecutar y Paso), el navegador del estudiante carga Pyodide (el intérprete de Python) desde la dirección configurada por el administrador, por defecto el CDN jsDelivr. No se envía ninguna respuesta ni entrada.';
$string['privacy:metadata:pyodide:ipaddress'] = 'La dirección IP del navegador del estudiante, como en cualquier descarga';
$string['privacy:metadata:runner'] = 'Cuando el administrador configura un CodeLab runner (propio o alojado), las respuestas se envían allí para ejecutarlas con las pruebas de la pregunta (SQL siempre, otros lenguajes cuando el runner es el servidor de ejecución y calificación), y Ejecutar durante el intento ejecuta allí el programa mientras el estudiante escribe su entrada. El runner guarda un programa solo mientras se ejecuta. Las respuestas en sí las guarda el motor de preguntas.';
$string['privacy:metadata:runner:code'] = 'El programa que escribió el estudiante';
$string['privacy:metadata:runner:stdin'] = 'La entrada de una prueba, o la entrada que escribe el estudiante';
$string['privacy:metadata:runner:userid'] = 'El id del estudiante, en un token firmado para Ejecutar durante el intento, para limitar el número de programas que cada usuario ejecuta a la vez';
$string['runtests'] = 'Ejecutar las pruebas';
$string['sandboxfailed'] = 'No se pudo comprobar el programa en el servidor (Jobe). Su profesor lo calificará.';
$string['savefailing'] = 'Guardar aunque la solución no supere las pruebas';
$string['showtests'] = 'Pruebas durante el intento';
$string['showtests_desc'] = 'Los estudiantes pueden ejecutar las pruebas no ocultas antes de enviar';
$string['solution'] = 'Solución';
$string['solution_help'] = 'El programa del profesor. Las salidas esperadas vacías de las pruebas se rellenan ejecutándolo al guardar la pregunta; los estudiantes lo ven como respuesta correcta en la revisión.';
$string['solutioncheck'] = 'Comprobación de la solución';
$string['solutioncheck_help'] = 'Al guardar la pregunta, la solución se ejecuta en Jobe con la entrada de cada prueba que tiene una salida esperada, y la pregunta solo se guarda si las supera todas. Marque esta casilla para guardar de todos modos, por ejemplo mientras todavía escribe las pruebas. Cuando no se puede alcanzar Jobe, la pregunta se guarda sin la comprobación.';
$string['solutionfails'] = 'La solución no supera esta prueba. Su salida: {$a}';
$string['solutionis'] = 'Una solución:';
$string['solutionnocompile'] = 'La solución no compila: {$a}';
$string['suffix'] = 'Código después';
$string['suffix_help'] = 'Código que se añade después del programa del estudiante al ejecutarlo, por ejemplo una función main que llama a la función del estudiante, o el final de una clase. Los estudiantes no lo ven en el editor.';
$string['template'] = 'Código inicial';
$string['template_help'] = 'Código desde el que empiezan los estudiantes en el editor; puede estar vacío.';
$string['test'] = 'Prueba';
$string['testcode'] = 'Código de la prueba';
$string['testcode_help'] = 'Código que se ejecuta en esta prueba, por ejemplo una llamada a la función que escribe el estudiante: <code>printf("%d\\n", sum(2, 3));</code> o <code>print(sum(2, 3))</code>. Puede estar vacío.

* Si el código después del programa del estudiante tiene la marca <code>{{TEST}}</code>, por ejemplo dentro de un main que usted escribe, el código de la prueba ocupa su lugar.
* Si no, un programa en C o C++ sin main recibe uno: <code>int main(void) { test code return 0; }</code>.
* En otros lenguajes el código de la prueba se añade al final del programa.

La prueba también puede tener una entrada. Los estudiantes ven el código de las pruebas que no están ocultas.';
$string['testcoden'] = 'Prueba {no}: código de la prueba';
$string['testexpected'] = 'Salida esperada';
$string['testfailed'] = 'Prueba {$a}: no superada';
$string['testgot'] = 'Salida';
$string['testhidden'] = 'Oculta a los estudiantes';
$string['testinputn'] = 'Prueba {no}: entrada';
$string['testpassed'] = 'Prueba {$a}: superada';
$string['tests'] = 'Pruebas';
$string['tests_desc'] = 'Cada prueba da una entrada al programa y compara su salida con la salida esperada. Deje vacía la salida esperada para tomarla de la solución. Sin pruebas, el profesor califica las respuestas.';
$string['testsof'] = '{$a->passed} de {$a->total} pruebas superadas';
$string['teststdin'] = 'Entrada';
$string['testsummary'] = 'Pruebas superadas: {$a->passed} de {$a->total}';
$string['testtime'] = '{$a} s';
$string['testtimemem'] = '{$a->time} s, {$a->memory} MB';
$string['testweight'] = 'Peso';
$string['timelimit'] = 'Límite de tiempo por prueba (s)';
$string['timelimit_help'] = 'Segundos que puede durar una prueba: una prueba que tarda más falla por lenta, aunque su salida sea correcta. Vacío: sin límite. De 0.1 a 30. Solo el CodeLab runner informa cuánto duró una prueba; en Jobe este campo no tiene efecto y el único límite es el de tiempo de CPU. El tiempo se mide en el servidor e incluye el arranque del lenguaje (unos 0.3 segundos para Java y C#), así que deje margen sobre el tiempo de una buena solución.';
$string['tolerance'] = 'Tolerancia';
$string['tolerance_help'] = 'Para la comparación con números: la mayor diferencia entre dos números que todavía cuenta como igualdad, absoluta o relativa al número mayor. Con 0.001, 3.1416 coincide con 3.1414 y 1000.4 con 1000.';
$string['tooslow'] = 'Demasiado lento: {$a->time} s, el límite es {$a->limit} s';
