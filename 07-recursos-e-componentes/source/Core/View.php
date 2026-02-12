<?php

namespace Source\Core;

use League\Plates\Engine;

class View
{
    private Engine $engine;

    public function __construct(string $path, string $extension)
    {
        $this->engine = new Engine($path, $extension);
    }

    public function path(string $name, string $path): View
    {
        $this->engine->addFolder($name, $path);
        return $this;
    }

    public function render(string $view, array $data = []): string
    {
        return $this->engine->render($view, $data);
    }

    public function engine()
    {
        return $this->engine;
    }
}