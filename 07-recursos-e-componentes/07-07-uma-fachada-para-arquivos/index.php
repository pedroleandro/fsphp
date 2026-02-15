<?php

use Source\Core\Upload;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.07 - Uma fachada para arquivos");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ image ] Fachada para envio de imagens (jpg, png, gif)
 */
fullStackPHPClassSession("image", __LINE__);

$upload = new Upload();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if($post && $post['send'] == 'image'){
//    var_dump($post, $_FILES ?? "");

    $test = $upload->image($_FILES['file'], $post['name'], 500);

    if($test){
        echo "<img src='{$test}' style='width: 100%;'/>";
    }else{
        echo $upload->message();
    }
}


$formSend = "image";
require __DIR__ . "/form.php";


/*
 * [ file ] Fachada para envio de arquivos (pdf, docx, zip, etc)
 */
fullStackPHPClassSession("file", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if($post && $post['send'] == 'file'){
//    var_dump($post, $_FILES ?? "");

    $test = $upload->file($_FILES['file'], $post['name']);

    if($test){
        echo "<p><a target='_blank' href='{$test}'>Ver arquivo</a></p>";
    }else{
        echo $upload->message();
    }
}

$formSend = "file";
require __DIR__ . "/form.php";


/*
 * [ media ] Fachada para envio de midias (audio/video)
 */
fullStackPHPClassSession("media", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if($post && $post['send'] == 'media'){
    var_dump($post, $_FILES ?? "");

    $test = $upload->media($_FILES['file'], $post['name']);

    if($test){
        echo "<p><a target='_blank' href='{$test}'>Ver arquivo</a></p>";
    }else{
        echo $upload->message();
    }
}

$formSend = "media";
require __DIR__ . "/form.php";


/*
 * [ remove ] Um método adicional
 */
fullStackPHPClassSession("remove", __LINE__);

$upload->remove(__DIR__ . "/../storage/uploads/files/2026/02/nome-do-arquivo.pdf");