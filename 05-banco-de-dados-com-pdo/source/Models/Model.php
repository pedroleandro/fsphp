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

    protected function create(string $entity, array $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values  = ":" . implode(", :", array_keys($data));

            $stmt = Connect::getInstance()->prepare(
                "INSERT INTO {$entity} ({$columns}) VALUES ({$values})"
            );

            foreach ($data as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }

            $stmt->execute();

            return Connect::getInstance()->lastInsertId();
        } catch (\PDOException $e) {
            $this->fail = $e;
            return null;
        }
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
        $safe = (array)$this->data;

        foreach (static::$safe as $unset){
            unset($safe[$unset]);
        }
        return $safe;
    }

    protected function filter(array $data): ?array
    {
        $filter = [];
        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_UNSAFE_RAW));
        }

        return $filter;
    }
}