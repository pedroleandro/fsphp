<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/../source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);

$userRepository = new \source\Models\UserModel();

$user = $userRepository->findById(1);

var_dump($user);

/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);

$userRepository = new \source\Models\UserModel();

$user = $userRepository->findByEmail("robson1@email.com.br");

var_dump($user);


/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);

$userRepository = new \source\Models\UserModel();

$user = $userRepository->findAll();

var_dump($user);

