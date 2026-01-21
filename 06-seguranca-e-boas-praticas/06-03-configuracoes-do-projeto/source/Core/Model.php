<?php

namespace Source\Core;

use PDO;
use PDOStatement;
use Source\Core\Connect;

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

    protected function update(string $entity, array $data, string $terms, string $params): bool
    {
        try {
            $set = [];

            foreach (array_keys($data) as $column) {
                $set[] = "{$column} = :{$column}";
            }

            $set = implode(", ", $set);

            $stmt = Connect::getInstance()->prepare(
                "UPDATE {$entity} SET {$set} WHERE {$terms}"
            );

            foreach ($data as $key => $value) {
                $type = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue(":{$key}", $value, $type);
            }

            parse_str($params, $params);

            foreach ($params as $key => $value) {
                $type = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue(":{$key}", $value, $type);
            }

            return $stmt->execute();
        } catch (\PDOException $e) {
            $this->fail = $e;
            return false;
        }
    }

    protected function delete(string $entity, string $terms, string $params): bool
    {
        try {
            $stmt = Connect::getInstance()->prepare(
                "DELETE FROM {$entity} WHERE {$terms}"
            );

            parse_str($params, $params);

            foreach ($params as $key => $value) {
                $type = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue(":{$key}", $value, $type);
            }

            return $stmt->execute();
        } catch (\PDOException $e) {
            $this->fail = $e;
            return false;
        }
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