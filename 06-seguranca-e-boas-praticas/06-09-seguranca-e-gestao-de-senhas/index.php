<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";

session();

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);

$password = password_hash("password", PASSWORD_DEFAULT, ["cost" => 12]);
dump($password);

dump([
    password_get_info($password),
    password_needs_rehash($password, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify("password", $password),
]);

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);

$user = (new \Source\Models\UserModel())->findById(1);
$user->setPassword("password");
$user->save();

dump(password_verify("password", $user->getPassword()));

var_dump($user);

/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);

$login = (new \Source\Models\UserModel())->findByEmail("robson1@email.com.br");
dump($login);

if(!$login){
    echo message()->info("Email informado deve estar inválido!");
}else if(!password_verify("password", $login->getPassword())) {
    echo message()->warning("E-mail ou senha inválida!");
}

session()->set("login", $login->data());

echo message()->success("Seja muito Bem vindo, {$login->getFirstName()}!");

var_dump(session()->all());


/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);
