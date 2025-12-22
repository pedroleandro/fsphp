<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("10 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear</a></h1>";
echo "<p><a href='index.php?arg1=true&arg2=true'>Argumentos</a></p>";

var_dump($_GET);

$data = [
    "name" => "Pedro Leandro",
    "company" => "Senac",
    "mail" => "pedro.silva@ma.senac.br"
];

$object = (object) $data;
var_dump($object, http_build_query($object));



$arguments =http_build_query($data);

var_dump($data, $arguments);

echo "<p><a href='index.php?{$arguments}'>Arguments by Array</a></p>";

/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

$dataFilter = http_build_query([
    "name" => "Pedro Leandro",
    "company" => "Senac",
    "mail" => "pedro.silva@ma.senac.br",
    "site" => "senac.ma.br",
    "script" => "<script>alert('Olá, Mundo');</script>"
]);

echo "<p><a href='index.php?{$dataFilter}'>Data Filter</a></p>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_UNSAFE_RAW);

var_dump(!filter_var($dataUrl['mail'], FILTER_VALIDATE_EMAIL));

$dataUrl['script'] = htmlspecialchars($dataUrl['script'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

if($dataUrl){

    if(in_array("", $dataUrl)){
        echo "<p class='trigger warning'>Faltam dados!</p>";
    }elseif(empty($dataUrl['mail'])){
        echo "<p class='trigger warning'>Falta o email!</p>";
    }elseif(!filter_var($dataUrl['mail'], FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'>Não é um email válido!</p>";
    }else{
        echo "<p class='trigger accept'>Tudo certo!</p>";
    }

}else{
    var_dump(false);
}

var_dump($dataUrl);

$dataFilter = http_build_query([
    "name" => "Pedro Leandro",
    "company" => "Senac",
    "mail" => "pedro.silva@ma.senac.br",
    "site" => "senac.ma.br",
    "script" => "<script>alert('Olá, Mundo');</script>"
]);

parse_str($dataFilter, $arrDataFilter);
var_dump($dataFilter, $arrDataFilter);

$dataPreFilter = [
    "name" => FILTER_SANITIZE_STRING,
    "company" => FILTER_SANITIZE_STRING,
    "mail" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_DOMAIN,
    "script" => FILTER_SANITIZE_STRIPPED,
];

var_dump(filter_var_array($arrDataFilter, $dataPreFilter));