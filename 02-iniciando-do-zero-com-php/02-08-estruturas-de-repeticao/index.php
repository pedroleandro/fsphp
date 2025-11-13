<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.08 - Estruturas de repetição");

/*
 * [ while ] https://php.net/manual/pt_BR/control-structures.while.php
 * [ do while ] https://php.net/manual/pt_BR/control-structures.do.while.php
 */
fullStackPHPClassSession("while, do while", __LINE__);

$looping = 1;
$while = [];

while($looping <= 5){
    $while[] = $looping;
    $looping++;
}

dump($while);

$looping = 5;
$while = [];
do{
    $while[] = $looping;
    $looping--;
}while($looping >= 1);

dump($while);

/*
 * [ for ] https://php.net/manual/pt_BR/control-structures.for.php
 */
fullStackPHPClassSession("for", __LINE__);

for($loop = 1; $loop <= 5; $loop++){
    echo "<p>{$loop}</p>";
}


/**
 * [ break ] https://php.net/manual/pt_BR/control-structures.break.php
 * [ continue ] https://php.net/manual/pt_BR/control-structures.continue.php
 */
fullStackPHPClassSession("break, continue", __LINE__);

for($loop = 1; $loop <= 5; $loop++){
    if($loop % 2 == 0){
        continue;
    }

    if($loop > 7){
        break;
    }

    echo "<p>Passou +2: {$loop}</p>";
}

/**
 * [ foreach ] https://php.net/manual/pt_BR/control-structures.foreach.php
 */
fullStackPHPClassSession("foreach", __LINE__);

$student = [
    "name" => "Pedro",
    "age" => 28,
    "school" => "senac",
    "isFlamenguista" => true
];

foreach ($student as $item){
    echo "<p>{$item}</p>";
}

foreach ($student as $key => $value){
    echo "<p>{$key}: {$value}</p>";
}