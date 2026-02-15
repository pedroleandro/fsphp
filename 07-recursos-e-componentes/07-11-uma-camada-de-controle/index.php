<?php

use Source\App\Controllers\UserController;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.11 - Uma camada de controle");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ controller ] A camada que consulta o modelo e devolve a visão
 */
fullStackPHPClassSession("controller", __LINE__);

$controller = new UserController();

if(empty($_GET['id'])){
    $controller->home();
}else{
    $controller->edit();
}