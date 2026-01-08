<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);

$connect = Connect::getInstance();

$users = $connect->query("SELECT * FROM users LIMIT 3");

if($users->rowCount()){
    while($user = $users->fetch()){
        var_dump($user);
    }
}else{
    echo "<p class='trigger warning'>Sem resultados!</p>";
}

/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

$users = $connect->query("SELECT * FROM users LIMIT 3,2");

//while($user = $users->fetchAll()){
//    var_dump($user);
//}

foreach($users->fetchAll() as $user){
    var_dump($user);
}

/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);

$users = $connect->query("SELECT * FROM users LIMIT 5,1");

$result = $users->fetchAll();

var_dump(
    $users->fetchAll(),
    $result,
    $result
);

/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

$users = $connect->query("SELECT * FROM users LIMIT 1");

foreach ($users->fetchAll() as $user) {
    var_dump($user, $user->first_name);
}

$users = $connect->query("SELECT * FROM users LIMIT 1");

foreach ($users->fetchAll(PDO::FETCH_NUM) as $user) {
    var_dump($user, $user[1]);
}

$users = $connect->query("SELECT * FROM users LIMIT 1");

foreach ($users->fetchAll(PDO::FETCH_ASSOC) as $user) {
    var_dump($user, $user['first_name']);
}

$users = $connect->query("SELECT * FROM users LIMIT 1");

foreach ($users->fetchAll(PDO::FETCH_CLASS, \Source\Database\Entity\User::class) as $user) {
    var_dump($user, $user->getFirstName());
}



