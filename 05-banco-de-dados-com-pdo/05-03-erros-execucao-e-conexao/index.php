<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

try{
    throw new Exception("Simulação de erro!");
}catch (Exception $exception){
    echo "<p class='trigger error'>Erro: {$exception->getMessage()}</p>";
}

try{
    throw new PDOException("Simulação de erro de PDO!");
}catch (PDOException $pdoException){
    var_dump($pdoException);
}

try{
    throw new ErrorException("Simulando erro com finally");
}catch (ErrorException $errorException){
    var_dump($errorException);
} finally {
    echo "<p class='trigger error'>Execução terminou!</p>";
}

/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

try {
    $connection = new PDO(
        "mysql:host=localhost;dbname=fullstackphp;port=3306",
        "root",
        "",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
    );

    $statement = $connection->query("SELECT * FROM users LIMIT 3");
    while($user = $statement->fetch(PDO::FETCH_ASSOC)){
        var_dump($user);
    }
}catch (PDOException $pdoException){
    var_dump($pdoException);
}

/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

require __DIR__ . "/../source/autoload.php";

$pdo = \Source\Database\Connect::getInstance();
$pdoTest = \Source\Database\Connect::getInstance();

var_dump($pdo, $pdoTest, $pdo::getAvailableDrivers());