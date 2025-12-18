<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

$file = __DIR__ . "/file.txt";

if (file_exists($file) && is_file($file)) {
    echo "<p>Existe!</p>";
} else {
    echo "<p>NÃO Existe!</p>";
}

/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

if (!file_exists($file) || !is_file($file)) {
    $fileOpen = fopen($file, "w");
    fwrite($fileOpen, "Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica" . PHP_EOL);
    fwrite($fileOpen, "É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação." . PHP_EOL);
    fwrite($fileOpen, "Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico." . PHP_EOL);
    fwrite($fileOpen, "Existem muitas variações disponíveis de passagens de Lorem Ipsum" . PHP_EOL);
    fwrite($fileOpen, "O trecho padrão original de Lorem Ipsum, usado desde o século XVI, está reproduzido abaixo para os interessados." . PHP_EOL);
    fclose($fileOpen);
} else {
    var_dump(
        file($file),
        pathinfo($file)
    );
}

echo "<p>", file($file)[3], "</p>";

$open = fopen($file, "r");

while (!feof($open)) {
    echo "<p>" . fgets($open) . "</p>";
}

fclose($open);

/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

$getContents = __DIR__ . "/teste.txt";
if (file_exists($getContents) && is_file($getContents)) {
    echo "<p>", file_get_contents($getContents), "</p>";
} else {
    $data = "<article><h1>Pedro</h1><p>Professor Senac <br>pedro.silva@ma.senac.br</p><article>";
    file_put_contents($getContents, $data);
    echo "<p>", file_get_contents($getContents), "</p>";
}

//unlink($getContents);
//unlink($file);

if (file_exists(__DIR__ . "/teste2.txt") && is_file(__DIR__ . "/teste2.txt")) {
    unlink(__DIR__ . "/teste2.txt");
}