<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.10 - Requisição de arquivos");

/*
 * [ include ] https://php.net/manual/pt_BR/function.include.php
 * [ include_once ] https://php.net/manual/pt_BR/function.include-once.php
 */
fullStackPHPClassSession("include, include_once", __LINE__);

//include "file.php";
//echo "<p>Continue...</p>";

include __DIR__ . "/header.php";

$profile = new StdClass();
$profile->name = "Pedro Leandro";
$profile->company = "Senac";
$profile->email = "pedro.silva@ma.senac.br";

//var_dump($profile);

include __DIR__ . "/profile.php";

/*
 * [ require ] https://php.net/manual/pt_BR/function.require.php
 * [ require_once ] https://php.net/manual/pt_BR/function.require-once.php
 */
fullStackPHPClassSession("require, require_once", __LINE__);

//require "file.php";
//echo "<p>Continue...</p>";

require __DIR__ . "/config.php";
require_once __DIR__ . "/config.php";
echo "<h1>" . COURSE . "</h1>";



