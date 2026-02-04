<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

require __DIR__ . "/../source/autoload.php";

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);

$message = new \Source\Core\Message();

var_dump($message, get_class_methods($message));


/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);

$error = $message->success("Essa é um exemplo de mensagem de sucesso!");

var_dump(
    $error->getMessage(),
    $error->getType(),
    $error->render()
);

echo $message->info("Essa é um exemplo de mensagem de informação!");
echo $message->success("Essa é um exemplo de mensagem de sucesso!");
echo $message->warning("Essa é um exemplo de mensagem de advertência!");
echo $message->error("Essa é um exemplo de mensagem de erro!");


/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);

echo $message->error("Essa é um exemplo de mensagem de erro!")->json();

/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);

$session = new \Source\Core\Session();

$message->success("Essa é uma mensagem flash")->flash();

if($flash = $session->flash()){
    echo $flash;

    var_dump(
        [
            $flash->getType(),
            $flash->getMessage()
        ]
    );
}

var_dump($_SESSION, $session->all());