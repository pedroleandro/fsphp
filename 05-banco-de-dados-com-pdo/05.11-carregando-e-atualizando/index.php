<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.11 - Carregando e atualizando");

require __DIR__ . "/../source/autoload.php";

/*
 * [ save update ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save update", __LINE__);

$model = new \source\Models\UserModel();

$user  = $model->findById(2);

$user->setFirstName("Elcio");
$user->setLastName("Reis");
$user->setEmail("elcioreis@outlook.com");

$user->save();

var_dump($user);

