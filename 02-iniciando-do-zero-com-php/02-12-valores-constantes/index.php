<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.12 - Constantes e constantes mágicas");

/*
 * [ constantes ] https://php.net/manual/pt_BR/language.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

define("COURSE", "Técnico em Informática");
const TEACHER = "Pedro Leandro";

$informarion = true;

if($informarion) {
    define("COURSE_TYPE", "Formação");
}else{
    define("COURSE_TYPE", "Curso");
}

echo "<p>{COURSE_TYPE} {COURSE} {TEACHER}</p>";
echo "<p>". COURSE_TYPE . " " . COURSE . " Por " . TEACHER . "</p>";

/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);

var_dump(get_defined_constants(true)["user"]);

var_dump(
    [
        __LINE__,
        __FILE__,
        __DIR__,
    ]
);
