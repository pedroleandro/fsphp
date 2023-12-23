<?php
require __DIR__ . '/../fullstackphp/fsphp.php';
fullStackPHPClassName("02.08 - Estruturas de repetição");

/*
 * [ while ] https://php.net/manual/pt_BR/control-structures.while.php
 * [ do while ] https://php.net/manual/pt_BR/control-structures.do.while.php
 */
fullStackPHPClassSession("while, do while", __LINE__);

$looping = 1;
$while = [];

while ($looping <= 5) {
    $while[] = $looping;
    $looping++;
}
var_dump($while);

$looping = 5;
$while = [];
do {
    $while[] = $looping;
    $looping--;
} while ($looping >= 1);
var_dump($while);

/*
 * [ for ] https://php.net/manual/pt_BR/control-structures.for.php
 */
fullStackPHPClassSession("for", __LINE__);

for($cont = 1; $cont <= 10; $cont++){
    echo "<p>{$cont}</p>";
}

/**
 * [ break ] https://php.net/manual/pt_BR/control-structures.break.php
 * [ continue ] https://php.net/manual/pt_BR/control-structures.continue.php
 */
fullStackPHPClassSession("break, continue", __LINE__);

for($cont = 1; $cont <= 10; $cont++){
    if($cont % 2 == 0){
        echo "<p>Pulou em {$cont}</p>";
        continue;
    }

    if($cont > 7){
        break;
    }

    echo "<p>Valor de cont :: {$cont}</p>";
}

/**
 * [ foreach ] https://php.net/manual/pt_BR/control-structures.foreach.php
 */
fullStackPHPClassSession("foreach", __LINE__);

$array = [];

for($cont = 0; $cont <= 2; $cont++){
    $array [] = $cont;
}

var_dump($array);

foreach ($array as $item){
    var_dump($item);
}

foreach ($array as $key => $value){
    var_dump("{$key} = {$value}");
}