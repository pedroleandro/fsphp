<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.10 - Models bootstrap e cadastro");

require __DIR__ . "/../source/autoload.php";

/*
 * [ bootstrap ] Inicialização de dados
 */
fullStackPHPClassSession("bootstrap", __LINE__);

$userModel = new \source\Models\UserModel();

$user = $userModel->bootstrap(
    "Pedro Leandro",
    "Gomes da Silva",
    "pedroleandrogomesdasilva@outlook.com",
    82392034623
);

var_dump($user);

/*
 * [ save create ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save create", __LINE__);

//$user->setId(10);
//$user->setCreatedAt(date("Y-m-d H:i:s"));

if(!$userModel->findByEmail($user->getEmail())) {
    echo "<p class='trigger warning'>Cadastro!</p>";
    $user->save();
}else{
    echo "<p class='trigger accept'>Leitura!</p>";
}

var_dump($user);

