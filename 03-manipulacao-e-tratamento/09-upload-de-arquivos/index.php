<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("09 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__ . "/uploads";

if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}

var_dump([
    "filesize" => ini_get("upload_max_filesize"),
    "post_max_size" => ini_get("post_max_size"),
]);

var_dump([
    filetype(__DIR__ . "/index.php"),
    mime_content_type(__DIR__ . "/index.php"),
]);

$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

var_dump($getPost);

if ($_FILES && !empty($_FILES['file']['name'])) {
    $fileUpload = $_FILES['file'];
    var_dump($fileUpload);

    $allowedTypes = [
        "image/jpeg",
        "image/jpg",
        "image/png",
        "application/pdf",
    ];

    $newFilename = time() . mb_strstr($fileUpload['name'], '.');
    if(in_array($fileUpload['type'], $allowedTypes)) {
        if(move_uploaded_file($fileUpload['tmp_name'], __DIR__ . "/uploads/" . $newFilename)) {
            echo "<p class='trigger accept'>Arquivo enviado com sucesso!</p>";
        }else{
            echo "<p class='trigger error'>Erro ao tentar enviar arquivo!</p>";
        }
    }else{
        echo "<p class='trigger error'>Tipo de arquivo não permitido!</p>";
    }

} elseif ($_FILES) {
    echo "<p class='trigger warning'>Selecione um arquivo antes de enviar!</p>";
} elseif ($getPost) {
    echo "<p class='trigger warning'>Whoops! O arquivo selecionado é muito grande</p>";
}

include __DIR__ . "/form.php";

var_dump(
    scandir(__DIR__ . "/uploads"),
);