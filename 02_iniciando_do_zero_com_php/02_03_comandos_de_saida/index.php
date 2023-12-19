<?php
require __DIR__ . '/../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);

echo "<h3>Olá, Mundo</h3>";
echo "<p>Olá, Mundo!", " ", "<span class='tag'>#BoraProgramar</span>", "</p>";

$hello = "Olá, Mundo!";
$code = "<span class='tag'>#BoraProgramar</span>";

echo "<p>$hello</p>";
echo '<p>$hello</p>'; //O PHP não interpreta as aspas simples retornando o que realmente está escrito entre elas. Nesse caso, o resultado é $hello.

$day = "dia";

echo "<p>Falta 1 $day para o evento</p>";
echo "<p>Faltam 2 {$day}s para o evento</p>"; //As chaves protegem o valor da variável em PHP

echo "<h3>{$hello}</h3>";
echo "<h4>{$hello} {$code}</h4>";

echo "<h3>" . $hello . " " . $code . "</h3>";

?>

    <!--HTML-->
    <h4><?= $hello ?> <?= $code ?></h4>

<?php

/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

//print $hello, $code; Isto não é permitido pelo PHP
print $hello;
print $code;

print "<h3>{$hello} {$code}</h3>";

/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);

$array = [
    "company" => "MKS Sports Group",
    "product" => "Bola de Vôlei de Praia VLS300",
    "brand" => "MIKASA"
];

print_r($array);

echo "<pre>", print_r($array, true), "</pre>";

/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);

$article = "<article><h1>%s</h1><p>%s</p></article>";
$title = "{$hello} {$code}";
$subtitle = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
 standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type 
 specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
  unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
  and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

printf($article, $title, $subtitle);

echo sprintf($article, $title, $subtitle); //sprintf retorna o valor da função printf

/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);

$company = "<article><h1>Empresa %s</h1><p>Produto <b>%s</b>, Marca <b>%s</b></p></article>";
vprintf($company, $array);
echo vsprintf($company, $array);

/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);

var_dump(
    $array,
    $hello,
    $code
);