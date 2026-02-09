<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.12 - Efetuando cadastro de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ register ] Uma rotina de cadastro blindada contra ataques XSS e CSRF.
 */
fullStackPHPClassSession("register", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if($post){
    $data = (object)$post;

    if(!csrf_verify($post)){
        $error = message()->error("Erro ao enviar dados de formulários!");
    }else{
        $user = new \Source\Models\UserModel();

        $user->bootstrap(
            $data->first_name,
            $data->last_name,
            $data->email,
            $data->password,
        );

        if($user->save()){
            echo $user->getMessage(); //sucesso
        }else{
            echo message()->error("Falha ao cadastrar!");
            echo $user->getMessage(); //erro
            //unset($data);
        }
    }
}

require __DIR__ . "/form.php";