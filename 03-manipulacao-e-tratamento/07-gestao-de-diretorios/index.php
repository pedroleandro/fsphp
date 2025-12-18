<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

$folder = __DIR__ . "/uploads";

if (!file_exists($folder) && !is_dir($folder)) {
    mkdir($folder, 0755);
} else {
    var_dump(scandir($folder));
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

$temp = __DIR__ . "/temp";

if (!file_exists($temp) || !is_dir($temp)) {
    mkdir($temp, 0755);
}

$file = __DIR__ . "/file.txt";

var_dump(
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__),
);

if (!file_exists($file) || !is_file($file)) {
    fopen($file, "w");
} else {
//    copy($file, $folder . "/" . basename($file));
//    rename(__DIR__ . "/uploads/file.txt", __DIR__ . "/uploads/" . time() . "." . pathinfo($file)['extension']);

    rename($file, __DIR__ . "/uploads/" . time() . "." . pathinfo($file)['extension']);
}

/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

$remove = __DIR__ . "/remove";

if (!file_exists($remove) && !is_dir($remove)) {
    mkdir($remove, 0755);
} else {
    var_dump(scandir($remove));
}

$dirFiles = array_diff(scandir($remove), [".", ".."]);
$dirCount = count($dirFiles);
var_dump($dirFiles, $dirCount);

if ($dirCount >= 1) {
    echo "<h2>Limpando...</h2>";

    foreach (scandir($remove) as $file) {

        $file = __DIR__ . "/remove/{$file}";
        if (file_exists($file) && is_file($file)) {
            unlink($file);
        }
    }
}