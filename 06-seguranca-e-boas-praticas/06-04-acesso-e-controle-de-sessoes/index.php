<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.04 - Acesso e controle de sessões");

require __DIR__ . "/../source/autoload.php";

/*
 * [ session ] Uma classe statless para manipulação de sessões
 */
fullStackPHPClassSession("session", __LINE__);

$session = new \Source\Core\Session();
$session->set("user", 1);
$session->regenerate();

$session->set("test", 255);
$session->set("test_array", ["name" => "pedro", "document" => "423897"]);

$session->unset("test");

if(!$session->has("login")) {
    echo "<p>Logar-se!</p>";
    $user = (new \Source\Models\UserModel())->findById(1);
    $session->set("login", $user->data());
    var_dump($user->data());
}

//$session->destroy();

var_dump(
    $_SESSION,
    $session->all(),
    session_id(),
);

