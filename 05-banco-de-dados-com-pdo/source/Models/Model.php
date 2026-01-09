<?php

namespace Source\Models;

use PDO;
use PDOStatement;
use Source\Database\Connect;

abstract class Model
{
    protected $data;

    protected $fail;

    protected $message;

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

    protected function read(string $query, ?string $params = null): ?PDOStatement
    {
        try {
            $statement = Connect::getInstance()->prepare($query);

            if ($params) {
                parse_str($params, $params);
                foreach ($params as $key => $value) {
                    $type = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                    $statement->bindValue(":$key", $value, $type);
                }
            }

            $statement->execute();
            return $statement;
        } catch (\PDOException $PDOException) {
            var_dump($PDOException);
            $this->fail = $PDOException;
            return null;
        }
    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function safe(): ?array
    {

    }

    private function filter()
    {

    }
}