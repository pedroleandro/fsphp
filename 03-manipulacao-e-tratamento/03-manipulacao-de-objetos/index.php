<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
    "name" => "Pedro",
    "company" => "Senac",
    "mail" => "pedro.silva@ma.senac.br"
];

var_dump($arrProfile);

$objProfile = (object) $arrProfile;

var_dump($objProfile);

echo "<p>{$arrProfile['name']} trabalha no {$arrProfile['company']}</p>";
echo "<p>{$objProfile->name} trabalha no {$objProfile->company}</p>";

$ceo = $objProfile;
unset($ceo->company);
var_dump($ceo);

$company = new StdClass();
$company->company = "Senac";
$company->ceo = $ceo;
$company->manager = new StdClass();

$company->manager->name = "Pedro";
$company->manager->mail = "pedro.silva@ma.senac.br";

var_dump($company);

/**

 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

var_dump([
    "class" => get_class($company),
    "methods" => get_class_methods($company),
    "vars"=> get_object_vars($company),
    "parent" => get_parent_class($company),
]);

$date = new DateTime();

var_dump([
    "class" => get_class($date),
    "methods" => get_class_methods($date),
    "vars"=> get_object_vars($date),
    "parent" => get_parent_class($date),
    "subclass" => is_subclass_of($date, "DateTime"),
]);

var_dump($date);

$exception = new PDOException();

var_dump([
    "class" => get_class($exception),
    "methods" => get_class_methods($exception),
    "vars"=> get_object_vars($exception),
    "parent" => get_parent_class($exception),
    "subclass" => is_subclass_of($exception, "Exception"),
]);

var_dump($exception);