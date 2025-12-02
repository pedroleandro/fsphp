<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__ . "/functions.php";

var_dump(functionName("Pedro", "Elcio", "Nayra"));
var_dump(functionName("Nayla", "Kassio", "João Pedro"));

var_dump(optionArgs("Marlisson"));
var_dump(optionArgs("Marlisson", "Eduardo"));
var_dump(optionArgs("Marlisson", "Eduardo", "Ezequiel"));

/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);

$weight = 72.85;
$height = 1.65;

echo calcBmi();


/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

$pay = payTotal(200);
$pay = payTotal(150);
$pay = payTotal(300);
echo $pay;

/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam("Pedro", "Elcio", "Nayra", "Eduardo", "Nayla", "Kassio", "Marlisson", "Ezequiel"));

/*
 * [  ]
 */
fullStackPHPClassSession("Funções variádicas modernas", __LINE__);

var_dump(myClass("Pedro", "Elcio", "Nayra"));

/*
 * [  ]
 */
fullStackPHPClassSession("Arrow function", __LINE__);

$dobro = fn($n) => $n * 2;
echo "<p>{$dobro(2)}</p>";

/*
 * [  ]
 */
fullStackPHPClassSession("Matching com funções", __LINE__);

var_dump(concept(90));

/*
 * [  ]
 */
fullStackPHPClassSession("Funções anonimas com use()", __LINE__);

$tax = 10;

$calc = function ($value) use ($tax) {
    return $value + $tax;
};

echo "<p>" . $calc(50) . "</p>";