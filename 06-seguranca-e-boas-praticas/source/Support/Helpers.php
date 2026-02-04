<?php

/**
 * ###################
 * ###   VLIDATE   ###
 * ###################
 */

function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_password(string $password): bool
{
    return (mb_strlen($password) >= CONFIG_PASSWORD_MIN_LENGHT && mb_strlen($password) <= CONFIG_PASSWORD_MAX_LENGHT) ? true : false;
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */
function str_slug(string $string): string
{
    $string = mb_strtolower($string, 'UTF-8');

    $map = [
        'à'=>'a','á'=>'a','â'=>'a','ã'=>'a','ä'=>'a',
        'ç'=>'c',
        'è'=>'e','é'=>'e','ê'=>'e','ë'=>'e',
        'ì'=>'i','í'=>'i','î'=>'i','ï'=>'i',
        'ñ'=>'n',
        'ò'=>'o','ó'=>'o','ô'=>'o','õ'=>'o','ö'=>'o',
        'ù'=>'u','ú'=>'u','û'=>'u','ü'=>'u',
        'ý'=>'y','ÿ'=>'y'
    ];
    $string = strtr($string, $map);

    $string = preg_replace('/[_\-]+/', ' ', $string);

    $string = preg_replace('/[^a-z0-9\s]/', '', $string);

    $string = trim($string);
    $string = preg_replace('/\s+/', ' ', $string);

    return str_replace(' ', '-', $string);
}

function str_studly_case(string $string): string
{
    $string = str_slug($string);

    return str_replace(" ","", mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE, "UTF-8"));
}

function str_camel_case(string $string): string
{
    return lcfirst(str_studly_case($string));
}

function str_title(string $string): string
{
    return mb_convert_case(filter_var($string, FILTER_UNSAFE_RAW), MB_CASE_TITLE, "UTF-8");
}

function str_limit_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_UNSAFE_RAW));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if($numWords < $limit){
        return $string;
    }

    return implode(" ", array_slice($arrWords, 0, $limit)) . $pointer;
}

function str_limit_chars(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_UNSAFE_RAW));
    if(mb_strlen($string) <= $limit){
        return $string;
    }

    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));
    return $chars . $pointer;
}

/**
 * ######################
 * ###   NAVIGATION   ###
 * ######################
 */

function url(string $path): string
{
    return CONFIG_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if(filter_var($url, FILTER_VALIDATE_URL)){
        header("Location: $url");
        exit;
    }

    $location = url($url);
    header("Location: {$location}");
    exit;
}

/**
 * ####################
 * ###   TRIGGERS   ###
 * ####################
 */

function db(): PDO
{
    return \Source\Core\Connect::getInstance();
}

function message(): \Source\Core\Message
{
    return new \Source\Core\Message();
}

function session(): \Source\Core\Session
{
    return new \Source\Core\Session();
}

function user(): \Source\Models\UserModel
{
    return new \Source\Models\UserModel();
}