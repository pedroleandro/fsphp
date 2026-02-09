<?php

use Source\Models\UserModel;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.14 - Consulta em palavras reservadas");

require __DIR__ . "/../source/autoload.php";

/*
 * [ query params ]
 */
fullStackPHPClassSession("query params", __LINE__);

$user = (new \Source\Models\UserModel())->findById(1);
$user->setDocument(22.22);
$user->save();
var_dump($user);

$user = (new UserModel())->find("document = :d", "d=22.22");
var_dump($user);

$list = (new UserModel())->findAll("2");
var_dump($list);

