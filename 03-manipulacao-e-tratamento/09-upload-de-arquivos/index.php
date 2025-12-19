<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("09 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__ . "/uploads";

// Garante que a pasta exista
if (!is_dir($folder)) {
    mkdir($folder, 0755, true);
}

var_dump([
    "upload_max_filesize" => ini_get("upload_max_filesize"),
    "post_max_size"      => ini_get("post_max_size"),
]);

var_dump([
    filetype(__DIR__ . "/index.php"),
    mime_content_type(__DIR__ . "/index.php"),
]);

$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

if (!empty($_FILES['file']['name'])) {

    $file = $_FILES['file'];
    var_dump($file);

    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<p class='trigger error'>Erro no upload do arquivo.</p>";
        include __DIR__ . "/form.php";
        exit;
    }

    $allowedTypes = [
        'image/jpeg',
        'image/png',
        'application/pdf',
    ];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $file['tmp_name']);
    var_dump($mime);
    finfo_close($finfo);

    if (!in_array($mime, $allowedTypes, true)) {
        echo "<p class='trigger error'>Tipo de arquivo não permitido!</p>";
        exit;
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newFilename = uniqid('upload_', true) . '.' . $extension;

    if (move_uploaded_file($file['tmp_name'], $folder . '/' . $newFilename)) {
        echo "<p class='trigger accept'>Arquivo enviado com sucesso!</p>";
    } else {
        echo "<p class='trigger error'>Erro ao salvar o arquivo.</p>";
    }

} elseif ($_FILES) {
    echo "<p class='trigger warning'>Selecione um arquivo antes de enviar!</p>";
} elseif ($getPost) {
    echo "<p class='trigger warning'>Whoops! O arquivo selecionado é muito grande.</p>";
}

include __DIR__ . "/form.php";

var_dump(
    scandir($folder)
);
