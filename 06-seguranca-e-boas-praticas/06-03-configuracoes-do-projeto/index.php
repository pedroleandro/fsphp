<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.03 - Configurações do projeto");

require __DIR__ . "/source/autoload.php";

/*
 * [ configurações ] Um acesso global a tudo que pode ser configurado no projeto.
 */
fullStackPHPClassSession("configurações", __LINE__);

var_dump(
    get_defined_constants(true)['user']
);

use Source\Core\Connect;
use Source\Models\User;

$read = Connect::getInstance()->query("SELECT * FROM users LIMIT 1");
$read->execute();

var_dump(
    $read->fetchAll()
);

$user = (new User())->findById(1);

var_dump($user);

echo "<p>Meu nome é {$user->getFirstName()} {$user->getLastName()}</p>";

/*
 * [ refatoramento ] Iniciando o desenvolvimento de uma arquitetura de projeto.
 */
fullStackPHPClassSession("refatoramento", __LINE__);