<?php
require __DIR__ . '/../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);

$userFirstName = "Pedro Leandro";
$userLastName = "Gomes Da Silva";

echo "<h3>{$userFirstName} {$userLastName}</h3>";

$user_first_name = $userFirstName;
$user_last_name = $userLastName;

echo "<h3>{$user_first_name} {$user_last_name}</h3>";

$userAge = "26";

echo "<p>{$userFirstName} {$userLastName} <span class='tag'>tem {$userAge} anos</span></p>";

$userEmail = "pedro.leandrog@gmail.com";
echo "<p>{$userEmail}</p>";

//variável variável

$company = "MKS";
$$company = "Sports Group";

echo "<h3>{$company} {$MKS}</h3>";

//Criando referências a partir de outras variáveis

$calcA = 10;
$calcB = 20;

//$calcB = $calcA; isto é uma atribuição normal de uma variável à outra

$calcB = &$calcA; // Nesse caso, está sendo referenciado o valor da variável de $calcA para $calcB.
// Dessa forma, se o valor de $calcB mudar, o valor de $calcA também mudará.

$calcB = 50;

var_dump(
    [
        "a" => $calcA,
        "b" => $calcB
    ]
);

/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);

$true = true;
$false = false;

var_dump(
    $true,
    $false
);

$bestAge = ($userAge > 30);
var_dump($bestAge);

$a = 0;
$b = 0.0;
$c = "";
$d = [];
$e = null;

var_dump(
    $a,
    $b,
    $c,
    $d,
    $e
);

if($a || $b || $c || $d || $e){
    var_dump(true);
}else{
    var_dump(false);
}

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

$code = "<article><h1>Um Call User Function!</h1></article>";
$codeClear = call_user_func("strip_tags", $code);

var_dump($code, $codeClear);

$codeMore = function ($code){
    var_dump($code);
};

$codeMore("#BoraProgramar");

/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "Olá, Mundo!";

$array = [$string];

$object = new StdClass();
$object->hello = $string;

$null = null;

$int = 12123;

$float = 1.23231;

var_dump(
    $string,
    $array,
    $object,
    $null,
    $int,
    $float
);