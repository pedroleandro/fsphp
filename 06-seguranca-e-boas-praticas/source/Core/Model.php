<?php

namespace Source\Core;

use PDO;
use PDOStatement;
use Source\Core\Message;

abstract class Model
{
    protected ?object $data = null;
    protected ?\PDOException $fail = null;
    protected Message $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function getData(): ?object
    {
        return $this->data;
    }

    public function getFail(): ?\PDOException
    {
        return $this->fail;
    }

    public function getMessage(): ?Message
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
                    if($key == "limit" || $key == "offset") {
                        $statement->bindValue(":$key", $value, \PDO::PARAM_INT);
                    }else{
                        $statement->bindValue(":$key", $value, \PDO::PARAM_STR);
                    }
                }
            }

            $statement->execute();
            return $statement;
        } catch (\PDOException $PDOException) {
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

            $statement = Connect::getInstance()->prepare(
                "UPDATE {$entity} SET {$set} WHERE {$terms}"
            );

            foreach ($data as $key => $value) {
                if($key == "limit" || $key == "offset") {
                    $statement->bindValue(":$key", $value, \PDO::PARAM_INT);
                }else{
                    $statement->bindValue(":$key", $value, \PDO::PARAM_STR);
                }
            }

            parse_str($params, $params);

            foreach ($params as $key => $value) {
                $type = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $statement->bindValue(":{$key}", $value, $type);
            }

            return $statement->execute();
        } catch (\PDOException $e) {
            $this->fail = $e;
            return false;
        }
    }

    protected function delete(string $entity, string $terms, string $params): bool
    {
        try {
            $statement = Connect::getInstance()->prepare(
                "DELETE FROM {$entity} WHERE {$terms}"
            );

            parse_str($params, $params);

            foreach ($params as $key => $value) {
                if($key == "limit" || $key == "offset") {
                    $statement->bindValue(":$key", $value, \PDO::PARAM_INT);
                }else{
                    $statement->bindValue(":$key", $value, \PDO::PARAM_STR);
                }
            }

            return $statement->execute();
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

    protected function required(): bool
    {
        $data = (array)$this->data();

        foreach (static::$required as $field){
            if(empty($data[$field])){
                return false;
            }
        }

        return true;
    }

    protected function hydrate(array $data): static
    {
        $model = new static();

        foreach ($data as $column => $value) {
            $method = 'set' . str_replace('_', '', ucwords($column, '_'));

            if (method_exists($model, $method)) {
                $model->$method($value);
            }
        }

        return $model;
    }

    abstract protected function data();
}