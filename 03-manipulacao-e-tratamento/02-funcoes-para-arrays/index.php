<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$myFavoriteBands = [
    "Engenheiros do Hawaii",
    "Biquini Cavadão",
    "Pouca Vogal"
];

$singers = [
    "singer_1" => "Wesley Safadão",
    "singer_2" => "Bell Marques",
    "singer_3" => "Michael Jackson"
];

//adiciona ao inicio
array_unshift($myFavoriteBands, "Nenhum de Nós", "Cidadão Quem");
array_unshift($myFavoriteBands, "");

$singers = [
        "singer_4" => "",
        "singer_5" => "Humberto Gessinger",
        "singer_6" => "Bruno Gouveia",
        "singer_7" => ""

    ] + $singers;

//adiciona ao final
array_push($myFavoriteBands, "Barão Vermelho", "", "");

$singers = $singers + [
        "singer_6" => "Cazuza",
        "singer_7" => "",
        "singer_8" => "",
    ];

//remove do inicio
array_shift($myFavoriteBands);
array_shift($singers);

//remove do final
array_pop($myFavoriteBands);
array_pop($singers);

//remove qualquer indice que seja vazio
$myFavoriteBands = array_filter($myFavoriteBands);
$singers = array_filter($singers);

var_dump(
    $myFavoriteBands,
    $singers
);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$singersBackup = $singers;

//ordem reversa
$myFavoriteBands = array_reverse($myFavoriteBands);
$singersBackup = array_reverse($singersBackup);

//ordenação alfabética dos valores
asort($myFavoriteBands);
asort($singersBackup);

//ordenação numérica pelas keys - crescente
ksort($myFavoriteBands);
ksort($singersBackup);

//ordenação numérica pelas keys - decrescente
krsort($myFavoriteBands);
krsort($singersBackup);

//reordena de forma alfabética crescente e mantem as keys crescente
sort($myFavoriteBands);
sort($singersBackup);

//reordena de forma alfabética decrescente e mantem as keys crescente
rsort($myFavoriteBands);
rsort($singersBackup);

var_dump(
    $myFavoriteBands,
    $singersBackup
);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
    array_keys($singers),
    array_values($singers)
]);

var_dump([
    in_array("Humberto Gessinger", $singers),
    in_array("Frejat", $singers),
]);

$arrayToString = implode(", ", $myFavoriteBands);

echo "<p>Eu amo ouvir {$arrayToString} e muitas outras!</p>";

var_dump(explode(", ", $arrayToString));

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Pedro Leandro",
    "company" => "Senac",
    "email" => "pedro.silva@ma.senac.br"
];

$template = <<<TEMPLATE
    <article>
        <h1>{{name}}</h1>
        <p>{{company}}<br>
        <a href="mailto:{{email}">Contato</a></p>
        
    </article>
TEMPLATE;

echo $template;

echo str_replace(
    array_keys($profile), array_values($profile), $template
);

$replaces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";

echo $replaces;

var_dump(explode("&", $replaces));

echo str_replace(
    explode("&", $replaces),
    array_values($profile),
    $template
);
