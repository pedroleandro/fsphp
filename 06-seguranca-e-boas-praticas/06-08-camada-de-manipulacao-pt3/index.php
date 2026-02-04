<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);

$message = new \Source\Core\Message();

$email = "cursos@upinside.com.br";

if(is_email($email)){
    echo $message->success("Email enviado com sucesso! {$email}");
}else{
    echo $message->error("Email inválido! {$email}");
}

$password = "a1b2c3d4";

if(is_password($password)){
    echo $message->success("Senha validada!");
}else{
    echo $message->error("Senha Inválida!");
}

/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump([
    url("/blog/titulo-do-artigo"),
    url("blog/titulo-do-artigo")
]);

//if(empty($_GET)){
//    redirect("https://www.upinside.com.br");
//}

/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);

var_dump([
    user()->findById(1)
]);

echo message()->error("Esse é um exemplo de erro");

session()->set("user", user()->findById(3));

var_dump($_SESSION, session()->all());

