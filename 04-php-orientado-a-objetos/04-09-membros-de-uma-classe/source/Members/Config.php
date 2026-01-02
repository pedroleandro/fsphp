<?php

namespace Source\Members;

class Config
{

    public const COMPANY = "Senac";
    protected const DOMAIN = "ma.senac.br";
    private const SECTOR = "Educação";

    public static $company;
    public static $domain;
    public static $sector;

    public static function setConfig($company, $domain, $sector)
    {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }
}