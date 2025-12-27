<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require __DIR__ . "/classes/App/Template.php";
require __DIR__ . "/classes/Web/Template.php";

use classes\App\Template as AppTemplate;
use classes\Web\Template as WebTemplate;

$appTemplate = new AppTemplate();
$webTemplate = new WebTemplate();

var_dump(
    $appTemplate,
    $webTemplate
);

/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);

require __DIR__ . "/source/Qualifield/User.php";

use Source\Qualifield\User as User;

$user = new User();

//$user->setFirstName("Pedro");
//$user->setLastName("Silva");
//$user->setMail("pedro.leandrog@gmail.com");

var_dump($user);

/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);

$pedro = $user->setUser(
    "Pedro",
    "Silva",
    "pedroleandrogomesdasilva@outlook.com"
);

if(!$pedro){
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

var_dump($user);

$elcio = new User();
$validate = $elcio->setUser(
    "Elcio",
    "Silva",
    "elciosilva"
);

if(!$validate){
    echo "<p class='trigger error'>{$elcio->getError()}</p>";
}

var_dump($elcio);
