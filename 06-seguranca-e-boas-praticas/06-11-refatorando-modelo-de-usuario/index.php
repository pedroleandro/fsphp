<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);

$model = new Source\Models\UserModel();
$user = $model->find("id = :id", "id=1");

var_dump($user);

/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);

$user = $model->findById(2);
var_dump($user);


/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);

$user = $model->findByEmail('willian28@email.com.br');
var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);

$users = $model->findAll(5);
var_dump($users);


/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);

$user = new \Source\Models\UserModel();
$user->setFirstName("Pedro Leandro");
$user->setLastName("Gomes da Silva");
$user->setEmail("pedro@email.com");
$user->setPassword("12345678");

if($user->save()){
    echo message()->success("Cadastro cadastrado com sucesso");
}else{
    echo message()->error("Erro ao cadastrar");
}

var_dump($user);


/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);


$user = $model->findById(1);
$user->setPassword("12345678");

if($user->save()){
    echo message()->success("Cadastro atualizado com sucesso");
}else{
    echo message()->error("Erro ao atualizar");
}

var_dump($user);
