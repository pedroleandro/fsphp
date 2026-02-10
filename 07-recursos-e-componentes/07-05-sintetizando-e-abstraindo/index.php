<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);

$email = new \Source\Core\Email();

$email->bootstrap(
    "Olá, Mundo!",
    "<h1>Olá, Mundo!</h1><p>Mensagem enviada com origem da minha aplicação que envia e-mail</p>",
    "pedro.leandrog@gmail.com",
    "Pedro Leandro"
);

$email->attach(__DIR__ . "/../07-04-utilizando-outro-componente/Premier_League_Player_Statistics_2023-24_20260207_050947.csv", "Base de Dados Premier League");

if ($email->send()) {
    echo message()->success("Mensagem enviada com sucesso!");
} else {
    echo $email->getMessage();
}