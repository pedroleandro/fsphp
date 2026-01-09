<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

$statement = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = 50");
$statement->execute();

var_dump(
    $statement,
    $statement->rowCount(),
    $statement->columnCount(),
    $statement->fetchAll()
);

/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);

//$statement = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = :id");
//
//$statement->bindValue(":id", 50, PDO::PARAM_INT);
//
//$statement->execute();
//
//var_dump(
//    $statement->fetch()
//);

$statement = Connect::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name, email, document) VALUES (:first_name, :last_name, :email, :document);"
);

$statement->bindValue(":first_name", "Pedro", PDO::PARAM_STR);
$statement->bindValue(":last_name", "Silva", PDO::PARAM_STR);
$statement->bindValue(":email", "pedro@email.com", PDO::PARAM_STR);
$statement->bindValue(":document", 9273984723, PDO::PARAM_INT);

$statement->execute();

var_dump(
    $statement->rowCount()
);


/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

$statement = Connect::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name, email, document) VALUES (:first_name, :last_name, :email, :document);"
);

$fistName = "Pedro";
$lastName = "Silva";
$email = "pedro@email.com";
$document = 9273984723;

$statement->bindParam(":first_name", $fistName, PDO::PARAM_STR);
$statement->bindParam(":last_name", $lastName, PDO::PARAM_STR);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->bindParam(":document", $document, PDO::PARAM_INT);

$statement->execute();

var_dump(
    $statement->rowCount()
);

/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

$statement = Connect::getInstance()->prepare(
    "INSERT INTO users (first_name, last_name, email, document) VALUES (:first_name, :last_name, :email, :document);"
);

$user= [
    "first_name" => "Pedro",
    "last_name" => "Silva",
    "email" => "pedro@email.com",
    "document" => 9273984723
];

$statement->execute($user);


/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$statement = Connect::getInstance()->prepare("SELECT *  FROM users LIMIT 3");
$statement->execute();

$nameUser = "";
$statement->bindColumn("first_name", $nameUser);
$emailUser = "";
$statement->bindColumn("email", $emailUser);

//foreach ($statement->fetchAll() as $user) {
//    var_dump($user);
//    echo "<p class='trigger'>O email de {$nameUser} é o {$emailUser}</p>";
//}

while($user = $statement->fetch()){
    var_dump($user);
    echo "<p class='trigger'>O email de {$nameUser} é o {$emailUser}</p>";
}