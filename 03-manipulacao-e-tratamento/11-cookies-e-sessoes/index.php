<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("11 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

setcookie("fsphp", "Esse é meu cookie", time() + 60);
//setcookie("fsphp", null, time() - 60);

$cookie = filter_input_array(INPUT_COOKIE, FILTER_UNSAFE_RAW);
var_dump(
    $_COOKIE,
    $cookie,
);

$time = time() + 60 * 60 * 24 * 7;

$user = [
    "user" => "root",
    "password" => "root",
    "expire" => $time
];

setcookie(
    "fsphplogin",
    http_build_query($user),
    $time,
    "/",
    "localhost",
    false
);

$login = filter_input(INPUT_COOKIE, "fsphplogin", FILTER_UNSAFE_RAW);

if($login){
    var_dump($login);
    parse_str($login, $user);
    var_dump($user);
}

/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);

$sessionPath = __DIR__ . "/sessions";

if(!file_exists($sessionPath) || !is_dir($sessionPath)){
    mkdir($sessionPath);
}else{
    echo "<p class='trigger accept'>Pasta de sessões já criadas! Tudo certo agora!</p>";
}

session_save_path($sessionPath);
session_name("FSPHPSESSID");
session_start([
    "cookie_lifetime" => 60 * 60 * 24,
]);

var_dump(
[
    "id" => session_id(),
    "name" => session_name(),
    "status" => session_status(),
    "path" => session_save_path(),
    "cookie" => session_get_cookie_params(),
]);

//$_SESSION['login'] = (object)$user;
//$_SESSION['user'] = $user;

//unset($_SESSION['user']);

session_destroy();

var_dump($_SESSION);