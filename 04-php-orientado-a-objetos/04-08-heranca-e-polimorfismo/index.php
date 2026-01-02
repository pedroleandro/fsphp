<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event = new \Source\Inheritance\Event\Event(
    "WorkShop Senac",
    new DateTime("2026-02-01 00:12:00"),
    4997.99,
    3,
);

var_dump($event);

$event->register(
    "Pedro Silva", "pedrosilva@outlook.com",
);

$event->register(
    "Camila Aguiar", "camilaaguiar@outlook.com",
);

$event->register(
    "Concita Aguiar", "concitaaguiar@outlook.com",
);

$event->register(
    "Wilson Santos", "wilsonsantos@outlook.com",
);

var_dump($event);

/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$address = new \Source\Inheritance\Address();

$address = new \Source\Inheritance\Address();

$address->bootAddress(
    "Avenida Luis Sales",
    151,
    "Ponte",
    "Caxias",
    "Maranhão"
);

$eventLive = new \Source\Inheritance\Event\EventLive(
    "WorkShop Senac - Presencial",
    new DateTime("2026-02-01 00:12:00"),
    4997.99,
    3,
    $address
);

$eventLive->register(
    "Pedro Silva", "pedrosilva@outlook.com",
);

$eventLive->register(
    "Camila Aguiar", "camilaaguiar@outlook.com",
);

$eventLive->register(
    "Concita Aguiar", "concitaaguiar@outlook.com",
);

$eventLive->register(
    "Wilson Santos", "wilsonsantos@outlook.com",
);

var_dump($eventLive);


/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$eventOnline = new \Source\Inheritance\Event\EventOnline(
    "WorkShop Senac - Presencial",
    new DateTime("2026-02-01 00:12:00"),
    4997.99,
    "https://www.ma.senac.br/aovivo"
);

$eventOnline->register(
    "Pedro Silva", "pedrosilva@outlook.com",
);

$eventOnline->register(
    "Camila Aguiar", "camilaaguiar@outlook.com",
);

$eventOnline->register(
    "Concita Aguiar", "concitaaguiar@outlook.com",
);

$eventOnline->register(
    "Wilson Santos", "wilsonsantos@outlook.com",
);

var_dump($eventOnline);

