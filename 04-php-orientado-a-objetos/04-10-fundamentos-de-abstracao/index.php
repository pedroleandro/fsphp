<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$pedro = new \Source\App\Client("Pedro", "Silva");
//$accountsPedro = new \Source\Bank\Account(
//    "0124-4",
//    "60694-4",
//    $pedro,
//    50,
//);
//
//var_dump($accountsPedro);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

$saving = new \Source\Bank\AccountSaving(
    "0124-4",
    "60694-4",
    $pedro,
    200
);

var_dump($saving);

$saving->extract();
$saving->deposit(1000);
$saving->extract();
$saving->withDraw(300);
$saving->extract();
$saving->withDraw(-300);
$saving->extract();
$saving->withDraw(907);
$saving->extract();


/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new \Source\Bank\AccountCurrent(
    "0124-4",
    "60694-4",
    $pedro,
    1000,
    1000
);

var_dump($current);

$current->deposit(1000);
$current->extract();
$current->withDraw(2000);
$current->extract();
$current->withDraw(500);
$current->extract();
