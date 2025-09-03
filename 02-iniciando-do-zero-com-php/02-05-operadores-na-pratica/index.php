<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
echo fullStackPHPClassName("02.05 - Operadores na prática");

/**
 * [ operadores ] https://php.net/manual/pt_BR/language.operators.php
 * [ atribuição ] https://php.net/manual/pt_BR/language.operators.assignment.php
 */
fullStackPHPClassSession("atribuição", __LINE__);

$operatorA = 5;
$operators = [
    "a += 5" => ($operatorA += 5),
    "a -= 5" => ($operatorA -= 5),
    "a *= 5" => ($operatorA *= 5),
    "a /= 5" => ($operatorA /= 5)
];

var_dump($operators);

$incrementA = 5;
$incrementB = 5;

$increments = [
    "pós-incremento" => $incrementA++,
    "resultado pós incremento" => $incrementA,
    "pré-incremento" => ++$incrementA,
    "resultado pré incremento" => $incrementA
];

var_dump($increments);

$decrements = [
    "pós-decremento" => $incrementB--,
    "resultado pós decremento" => $incrementB,
    "pré-decremento" => --$incrementB,
    "resultado pré decremento" => $incrementB
];

var_dump($decrements);

/**
 * [ comparação ] https://php.net/manual/pt_BR/language.operators.comparison.php
 */
fullStackPHPClassSession("comparação", __LINE__);

$relatedA = 5;
$relatedB = "5";
$relatedC = 10;

$relateds = [
    "a == c" => ($relatedA == $relatedC),
    "a == b" => ($relatedA == $relatedB),
    "a === b" => ($relatedA === $relatedB),
    "a != b" => ($relatedA != $relatedB),
    "a !== b" => ($relatedA !== $relatedB),
    "a > c" => ($relatedA > $relatedC),
    "a < c" => ($relatedA < $relatedC),
    "a >= b" => ($relatedA >= $relatedB),
    "a <= b" => ($relatedA <= $relatedB)
];

var_dump($relateds);

/**
 * [ lógicos ] https://php.net/manual/pt_BR/language.operators.logical.php
 */
fullStackPHPClassSession("lógicos", __LINE__);

$logicA = true;
$logicB = false;

$logics = [
    "a && b" => ($logicA && $logicB),
    "a || b" => ($logicA || $logicB),
    "a" => ($logicA),
    "!a" => (!$logicA),
    "!b" => (!$logicB)
];

var_dump($logics);

/**
 * [ aritiméticos ] https://php.net/manual/pt_BR/language.operators.arithmetic.php
 */
fullStackPHPClassSession("aritiméticos", __LINE__);

$calcA = 5;
$calcB = 10;
$calcC = 2;

$calcs = [
    "a + b" => ($calcA + $calcB),
    "a - c" => ($calcB - $calcC),
    "a * b" => ($calcA * $calcB),
    "b / c" => ($calcB / $calcC),
    "a % c" => ($calcA % $calcC)
];

var_dump($calcs);