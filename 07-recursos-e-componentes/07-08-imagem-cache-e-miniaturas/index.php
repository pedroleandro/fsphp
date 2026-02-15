<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.08 - Imagem, cache e miniaturas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ cropper ] https://packagist.org/packages/coffeecode/cropper
 */
fullStackPHPClassSession("cropper", __LINE__);

$thumb = new \Source\Core\Thumb();

var_dump($thumb);

/*
 * [ generate ]
 */
fullStackPHPClassSession("generate", __LINE__);

echo "<img src='{$thumb->make("images/2026/02/pedro.jpg", 300)}' alt='' title='' />";
echo "<img src='{$thumb->make("images/2026/02/pedro.jpg", 180, 180)}' alt='' title='' />";

var_dump($thumb->make("image.png", 200));

$thumb->flush("images/2026/02/pedro.jpg");