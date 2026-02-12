<?php

/**
 * DATABASE
 */
define("CONFIG_DB_HOST", "localhost");
define("CONFIG_DB_USER", "root");
define("CONFIG_DB_PASS", "");
define("CONFIG_DB_NAME", "fullstackphp");
define("CONFIG_DB_PORT", "3306");

/**
 * URLS
 */
define("CONFIG_URL_BASE", "http://localhost/upinside/fsphp");
//define("CONFIG_URL_BASE", "http://localhost/upinside/fsphp/06-seguranca-e-boas-praticas/06-08-camada-de-manipulacao-pt3");
define("CONFIG_URL_ADMIN", CONFIG_URL_BASE . "/admin");
define("CONFIG_URL_ERROR", CONFIG_URL_BASE . "/404");

/**
 * DATES
 */
define("CONFIG_DATE_BR", "d/m/Y H:i:s");
define("CONFIG_DATE_APP", "Y-m-d H:i:s");

/**
 * SESSION
 */
define("CONFIG_SESSION_PATH", __DIR__ .  "/../../storage/sessions");

/**
 * PASSWORD
 */
define("CONFIG_PASSWORD_MIN_LENGHT", 8);
define("CONFIG_PASSWORD_MAX_LENGHT", 40);
define("CONFIG_PASSWORD_ALGO", PASSWORD_DEFAULT);
define("CONFIG_PASSWORD_OPTIONS", ["cost" => 10]);

/**
 * MESSAGES
 */
define("CONFIG_MESSAGE_CLASS", "trigger");
define("CONFIG_MESSAGE_INFO", "info");
define("CONFIG_MESSAGE_SUCESS", "success");
define("CONFIG_MESSAGE_WARNING", "warning");
define("CONFIG_MESSAGE_ERROR", "error");


/**
 * VIEWS
 */
define("CONFIG_VIEW_PATH", __DIR__ . "/../assets/views");
define("CONFIG_VIEW_EXTENSION", __DIR__ . "php");


/**
 * EMAIL
 */
define("CONFIG_EMAIL_FROM_EMAIL", "pedroleandrogomesdasilva@outlook.com");
define("CONFIG_EMAIL_FROM_NAME", "Pedro Silva");