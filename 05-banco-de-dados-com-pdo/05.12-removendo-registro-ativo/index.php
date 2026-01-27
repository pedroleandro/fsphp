<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.12 - Removendo registro ativo");

require __DIR__ . "/../source/autoload.php";

/*
 * [ destroy ] Deleta um registro ativo
 */
fullStackPHPClassSession("destroy", __LINE__);

//$model = new \Source\Models\UserModel();
//
//$user = $model->findById(2);
//
//$user->destroy();
//
//var_dump($user);

$model = new \source\Models\UserModel();

/**
 * Cenário 1: tentando salvar sem dados obrigatórios
 */

//$user = new \Source\Models\UserModel();
//$user->save();
//
//var_dump($user->getMessage());

/**
 * Cenário 2: Tentando salvar com e-mail inválido
 */

//$user = new \Source\Models\UserModel();
//$user->bootstrap("Pedro", "Silva", "email_invalido");
//$user->save();
//
//var_dump($user->getMessage());

/**
 * Cenário 3: Testando com dados válidos
 */

$user = new \source\Models\UserModel();
$user->bootstrap("Pedro", "Silva", "pedro@email.com");
$user->save();

var_dump($user->getMessage());

/*
 * [ model destroy ] Deletar em cadeia
 */
fullStackPHPClassSession("model destroy", __LINE__);


