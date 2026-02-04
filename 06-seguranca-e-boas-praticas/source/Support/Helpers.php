<?php

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