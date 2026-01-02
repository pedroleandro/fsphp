<?php

use Source\Related\User;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);

$oldCompany = new \Source\Related\Company();

$oldCompany->bootCompany(
    "Senac",
    "Avenida Luis Sales, 151, Ponte - Caxias, Maranhão"
);

var_dump($oldCompany);

$company = new \Source\Related\Company();
$address = new \Source\Related\Address();

$address->bootAddress(
    "Avenida Luis Sales",
    151,
    "Ponte",
    "Caxias",
    "Maranhão"
);

$company->boot("Senac", $address);

var_dump($company);

echo "<p>A empresa {$company->getCompany()} fica localizada em {$company->getAddress()->getStreet()}</p>";


/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$product1 = new \Source\Related\Product("PHP", 1997);
$product2 = new \Source\Related\Product("HTML5", 397);
$product3 = new \Source\Related\Product("CSS3", 197);
$product4 = new \Source\Related\Product("JQUERY", 597);

$company->addProduct($product1);
$company->addProduct($product2);
$company->addProduct($product3);
$company->addProduct($product4);

var_dump($company);

/**
 * @var \Source\Related\Product $product
 */
foreach ($company->getProducts() as $product) {
    echo "<p>O curso de {$product->getName()} custa apenas {$product->getPrice()}</p>";
}


/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);

$company->addMemberToTeam("Pedro", "Silva", "Professor");
$company->addMemberToTeam("Concita", "Aguiar", "Auxiliar Administrativa");
$company->addMemberToTeam("Rosy", "Bonfim", "Gerente");

var_dump($company);

/**
 * @var User $member
 */
foreach ($company->getTeam() as $member) {
    echo "<p>{$member->getRole()}: {$member->getFirstName()} {$member->getLastName()}</p>";
}










