<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert = "
    INSERT INTO users (first_name, last_name, email, document)
    VALUES ('Pedro Leandro', 'Gomes da Silva', 'pedro@outlook.com', '604383');
";

try {
    /**
     * Usando exec()
     */
//    $pdo = Connect::getInstance();
//    $pdo = $pdo->exec($insert);
//    var_dump(Connect::getInstance()->lastInsertId());
//    var_dump($pdo);

    /**
     * Usando query()
     */
//    $query = Connect::getInstance()->query($insert);
//    var_dump(Connect::getInstance()->lastInsertId());
//    var_dump(
//        $query,
//        $query->errorInfo()
//    );

} catch (PDOException $PDOException) {
    var_dump($PDOException);
}

/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

try {
    $select = "SELECT * FROM users ORDER BY id DESC LIMIT 6;";

    $query = Connect::getInstance()->query($select);

    var_dump(
        [
            $query,
            $query->rowCount(),
            $query->fetchAll()
        ]
    );
} catch (PDOException $PDOException) {
    var_dump($PDOException);
}

/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

try {
    $update = "
        UPDATE users SET first_name = 'Elcio', last_name = 'Reis', email = 'elcio@outlook.com'
        WHERE id = '56';
";

    $execution = Connect::getInstance()->exec($update);

    var_dump($execution);


} catch (PDOException $PDOException) {
    var_dump($PDOException);
}

/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

try {
    $delete = "DELETE FROM users WHERE id IN ('56', '55', '54', '53', '52');";
    $execution = Connect::getInstance()->exec($delete);

    var_dump($execution);
} catch (PDOException $PDOException) {
    var_dump($PDOException);
}