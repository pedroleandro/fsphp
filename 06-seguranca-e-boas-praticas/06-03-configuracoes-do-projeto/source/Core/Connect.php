<?php

namespace Source\Core;

use \PDO;
use \PDOException;

class Connect
{
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static $instance;

    public static function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . CONFIG_DB_HOST . ";dbname=" . CONFIG_DB_NAME . ";port=" . CONFIG_DB_PORT,
                    CONFIG_DB_USER,
                    CONFIG_DB_PASS,
                    self::OPTIONS
                );
            } catch (PDOException $PDOException) {
                die("<h1>Erro ao conectar!</h1>");
            }
        }
        return self::$instance;
    }

    final private function __construct()
    {
    }

    private function __clone(): void
    {
    }
}