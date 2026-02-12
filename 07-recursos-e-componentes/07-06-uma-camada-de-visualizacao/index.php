<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.06 - Uma camada de visualização");

require __DIR__ . "/../vendor/autoload.php";

session_start();

/*
 * [ plates ] https://packagist.org/packages/league/plates
 */
fullStackPHPClassSession("plates", __LINE__);

$plates = new League\Plates\Engine(__DIR__ . "/../assets/views", "php");

var_dump(get_class_methods($plates), $plates);

//$plates->addFolder("test", __DIR__ . "/../assets/views/test");
//
//if(empty($_GET['id'])){
//    echo $plates->render('test::list', [
//        "title" => "Usuários do Sistema",
//        "users" => (new \Source\Models\UserModel())->findAll()
//    ]);
//}else{
//    echo $plates->render('test::user', [
//        "title" => "Editar usuário",
//        "user" => (new \Source\Models\UserModel())->findById($_GET['id'])
//    ]);
//}


/*
 * [ synthesize ] Sintetizando rotina e abstraíndo o recurso (componente)
 */
fullStackPHPClassSession("synthesize", __LINE__);

$plates = new \Source\Core\View(__DIR__ . "/../assets/views", "php");

$plates->path("test", __DIR__ . "/../assets/views/test");

if(empty($_GET['id'])){
    echo $plates->render('test::list', [
        "title" => "Usuários do Sistema",
        "users" => (new \Source\Models\UserModel())->findAll()
    ]);
}else{
    echo $plates->render('test::user', [
        "title" => "Editar usuário",
        "user" => (new \Source\Models\UserModel())->findById($_GET['id'])
    ]);
}