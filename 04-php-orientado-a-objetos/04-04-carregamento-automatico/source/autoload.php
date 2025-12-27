<?php

spl_autoload_register(function ($class) {

    $namespace = "Source\\";

    $baseDir = __DIR__ . "/";

    $lenght = strlen($namespace);

    if (strncmp($namespace, $class, $lenght) !== 0) {
        return;
    }

    $relativeClass = substr($class, $lenght);

    $file = $baseDir . str_replace("\\", "/", $relativeClass) . ".php";

    if(file_exists($file) ){
        require $file;
    }

});
