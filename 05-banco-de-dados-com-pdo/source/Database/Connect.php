<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class Connect
{
    private const HOST = "localhost";
    private const USER = "root";
    private const PASSWORD = "";
    private const PORT = "3306";
    private const DBNAME = "fullstackphp";

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
                    "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";port=" . self::PORT,
                    self::USER,
                    self::PASSWORD,
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