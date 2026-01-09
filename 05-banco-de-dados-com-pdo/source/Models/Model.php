<?php

namespace Source\Models;

abstract class Model
{
    protected object|null $data;

    protected \PDOException|null $fail;

    protected string|null $message;

    public function getData(): ?object
    {
        return $this->data;
    }

    public function getFail(): ?\PDOException
    {
        return $this->fail;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    protected function create()
    {

    }

    protected function read()
    {

    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function safe():?array
    {

    }

    private function filter()
    {

    }
}