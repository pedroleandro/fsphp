<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);

echo "Olá, Mundo";

echo "<h3>Olá, Mundo</h3>";

echo "<p>Olá, Mundo", " ", "<span class='tag'>#BoraProgramar!</span>", "</p>";

$hello = "Olá, Mundo";
$code = "<span class='tag'>#BoraProgramar!</span>";

echo "<p>$hello</p>";

$day = "dia";

echo "<p>Falta 1 $day para o evento!</p>";
echo "<p>Faltam 2 {$day}s para o evento!</p>";

echo "<h3>{$hello}</h3>";
echo "<h4>{$hello} {$code}</h4>";

echo '<h3>'. $hello . " " . $code . '</h3>';
?>

<h4><?= $hello ?> <?= $code ?></h4>

<?php

/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

print($hello);

print $code;

print "<h3>{$hello} {$code}</h3>";

/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);

$array = [
    "company" => "UpInside",
    "course" => "FSPHP",
    "class" => "Comandos de Saída"
];

print_r($array);
echo "<pre>", print_r($array, true) ,"</pre>";

/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);

$article = "<article><h1>%s</h1><p>%s</p></article>";
$title = "{$hello} {$code}";
$paragraph = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";

printf($article,$title, $paragraph);
echo sprintf($article,$title, $paragraph);

/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);

$company = "<article><h1>Escola %s</h1><p>Curso <strong>%s</strong>, aula <strong>%s</strong></p></article>";
vprintf($company, $array);

echo vsprintf($company, $array);

/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);

var_dump($array);
var_dump(
    $array,
    $hello,
    $code,
    $company
);