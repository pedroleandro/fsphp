<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.12 - Desmistificando rotas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ routes ]
 */
fullStackPHPClassSession("routes", __LINE__);

use Source\Core\Router;

Router::get("/", "UserController@home");

Router::get("/rotas", function (){
    var_dump("Olá, Mundo!");
});
