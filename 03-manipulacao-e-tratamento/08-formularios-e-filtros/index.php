<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("08 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);

$form = new stdClass();
$form->name = "Pedro Leandro";
$form->mail = "pedro.silva@ma.senac.br";

var_dump($_REQUEST);

$form->method = "get";
$form->method = "post";
include __DIR__ . "/form2.php";

/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

var_dump($_POST);

$post = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump([
    $post,
    $postArray
]);

if($postArray){
    if(in_array("", $postArray)){
        echo "<p class='trigger warning'>Preencha todos os campos corretamente!</p>";
    }elseif(!filter_var($postArray['mail'], FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'>O e-mail informado não é válido!</p>";
    }else{
        $saveStrip = array_map("strip_tags", $postArray);
        $save = array_map("trim", $saveStrip);

        var_dump($save);
        echo "<p class='trigger accept'>Cadastro realizado com sucesso!</p>";
    }
}

$form->method = "post";
include __DIR__ . "/form2.php";

/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

var_dump($_GET);

$get = filter_input(INPUT_GET, "mail", FILTER_DEFAULT);
$getArray = filter_input_array(INPUT_GET, FILTER_DEFAULT);

var_dump([
    $get,
    $getArray
]);

$form->method = "get";
include __DIR__ . "/form2.php";

/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);

var_dump([
    filter_list(),
    filter_id("validate_email"),
    FILTER_VALIDATE_EMAIL
]);