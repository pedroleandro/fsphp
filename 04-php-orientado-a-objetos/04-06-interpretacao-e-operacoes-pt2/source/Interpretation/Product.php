<?php

namespace Source\Interpretation;

class Product
{
    private $name;
    private $price;
    private $data;

    public function __set(string $name, $value)
    {
        $this->data[$name] = $value;
        $this->notFound(__FUNCTION__, $name);
    }

    public function __get(string $name)
    {
        if (!empty($this->data[$name])) {
            return $this->data[$name];
        }

        $this->notFound(__FUNCTION__, $name);
    }

    public function __isset(string $name): bool
    {
        return property_exists($this, $name) && isset($name);
    }

    public function __call(string $name, array $arguments)
    {
        $this->notFound(__FUNCTION__, $name);
        var_dump($arguments);
    }

    public function __toString(): string
    {
        $name  = $this->name  ?? 'N/A';
        $price = $this->price ?? '0,00';

        return sprintf(
            "Product [name=%s, price=%s]",
            $name,
            $price
        );
    }

    public function __unset(string $name): void
    {
        trigger_error(__FUNCTION__ .  ": Acesso a propriedade negado!");
    }

    public function handler($name, $price)
    {
        $this->name = $name;
        $this->price = number_format($price, 2, ',', '.');
    }

    private function notFound($method, $name)
    {
        echo "<p class='trigger error'>{$method}: A propriedade {$name} não existem em " . __CLASS__ . "</p>";
    }
}