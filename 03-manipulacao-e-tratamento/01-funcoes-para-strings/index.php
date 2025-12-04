<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("01 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

$string = "O último show do Guns N' Roses foi incrível";

var_dump([
    "string" => $string,
    "strlen" => strlen($string),
    "mb_strlen" => mb_strlen($string),
    "substr" => substr($string, 9),
    "mb_substr" => mb_substr($string, 9),
    "strtoupper" => strtoupper($string),
    "mb_strtoupper" => mb_strtoupper($string),
]);

/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

$mbString = $string;

var_dump([
    "mbString" => $mbString,
    "mb_strtoupper" => mb_strtoupper($mbString),
    "mb_strtolower" => mb_strtolower($mbString),
    "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE),
]);

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$mbReplace = $mbString . ", Fui e iria novamente, e foi épico!";

var_dump([
    "mbReplace" => $mbReplace,
    "mb_strlen" => mb_strlen($mbReplace),
    "mb_strpos" => mb_strpos($mbReplace, ", "),
    "mb_strrpos" => mb_strrpos($mbReplace, ", "),
    "mb_substr" => mb_substr($mbReplace, 45, 20),
    "mb_strstr" => mb_strstr($mbReplace, ", "),
    "mb_strstr_true" => mb_strstr($mbReplace, ", ", true),
    "mb_strrchr" => mb_strrchr($mbReplace, ", "),
    "mb_strrchr_true" => mb_strrchr($mbReplace, ", ", true),
]);

$mbStrReplace = $string;

echo "<p>", $mbStrReplace, "</p>";
echo "<p>", str_replace("Guns N' Roses", "Scorpions", $mbStrReplace), "</p>";
echo "<p>", str_replace(["Guns N' Roses", "último", "incrível"], "Scorpions", $mbStrReplace), "</p>";
echo "<p>", str_replace(["Guns N' Roses", "O último", "incrível"], ["Scorpions", "Aquele", "épico"], $mbStrReplace), "</p>";

$article = <<<ROCK
    <article>
        <h2>event</h2>
        <p>desc</p>
    </article>
ROCK;

$articleData = [
    "event" => "Rock in São Luís",
    "desc" => $mbReplace
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);


/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=Pedro&email=pedro.silva@ma.senac.br";
mb_parse_str($endPoint, $parseEndPoint);

var_dump([
    "endPoint" => $endPoint,
    "parseEndPoint" => $parseEndPoint,
    "parseEndPointObject" => (object)$parseEndPoint
]);

fullStackPHPClassSession("sanitização e remoção", __LINE__);

$string = "   PHP 8   ";

var_dump([
    trim($string),
    ltrim($string),
    rtrim($string)
]);

fullStackPHPClassSession("outras manipulações em strings", __LINE__);

var_dump([
    str_repeat("Olá, mundo, isso é um teste de repetição! ", 3),
    str_pad("Pedro", 7, "P", STR_PAD_LEFT),
    strrev("paralelepipedo"),

]);

fullStackPHPClassSession("busca e verificação", __LINE__);

var_dump([
    str_contains($mbString, "Guns"),
    str_starts_with("imagem.png", "img"),
    str_ends_with("arquivo.pdf", ".pdf")
]);

fullStackPHPClassSession("strings como arrays", __LINE__);

var_dump([
    explode(",", "maçã,banana,pera"),
    implode(" | ", ["HTML", "CSS", "PHP"])
]);

fullStackPHPClassSession("segurança e separação", __LINE__);

var_dump([
    htmlspecialchars("<script>alert('Olá, Mundo!')</script>"),
    htmlspecialchars_decode("<script>alert('Olá, Mundo!')</script>"),
    strip_tags("<script>alert('Olá, Mundo!')</script>")
]);

fullStackPHPClassSession("Funções para análise", __LINE__);

var_dump([
    similar_text("João Pedro", "Pedro", $percent),
    $percent,
    levenshtein("PHP", "PXP")
]);

fullStackPHPClassSession("Conversões", __LINE__);

var_dump([
    ucfirst("curso"),
    ucwords("técnico em informática")
]);