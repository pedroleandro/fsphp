<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

use Source\Members\Config;

$config = new Config();

var_dump($config);

echo "<p> ", $config::COMPANY, "</p>";

var_dump(
    Config::COMPANY,
//    Config::DOMAIN,
//    Config::SECTOR
);

$reflection = new ReflectionClass(Config::class);
var_dump(
    $reflection,
    $reflection->getConstants()
);
var_dump($config);

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

Config::$company = "Senac";
Config::$domain = "ma.senac.br";
Config::$sector = "Educação";

$config::$sector = "Tecnologia";

var_dump($config, $reflection->getProperties(), $reflection->getDefaultProperties());

foreach ($reflection->getProperties() as $property) {
    if ($property->isStatic()) {
        $property->setAccessible(true);
        echo "<p>"."$"."{$property->getName()}: {$property->getValue()}</p>";
//        var_dump(
//            $property->getName(),
//            $property->getValue()
//        );
    }
}

/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

var_dump($config, $reflection->getMethods(), $reflection->getDefaultProperties());

$config::setConfig("", "", "");
$config::setConfig("UpInside", "upinside.com.br", "Educação e Tecnologia");

foreach ($reflection->getProperties() as $property) {
    if ($property->isStatic()) {
        $property->setAccessible(true);
        echo "<p>"."$"."{$property->getName()}: {$property->getValue()}</p>";
    }
}

/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

$trigger = new Trigger();
$trigger::show("Um objeto trigger");

var_dump($trigger);

Trigger::show("Esse é um teste de mensagem ACCEPT", Trigger::ACCEPT);
Trigger::show("Esse é um teste de mensagem WARNING", Trigger::WARNING);
Trigger::show("Esse é um teste de mensagem ERROR", Trigger::ERROR);