<?php

namespace Source\Models;

use DateTime;
use PDO;

class User extends Model
{

    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private ?int $document;
    private string|DateTime $createdAt;
    private string|DateTime $updatedAt;
    protected static array $safe = ["id", "created_at", "updated_at"];

    protected static string $entity = "users";

    public function bootstrap()
    {

    }

    public function findById(int $id, string $columns = '*'): ?User
    {
        $query = "SELECT {$columns} FROM " . self::$entity . " WHERE id = :id LIMIT 1";
        $stmt = $this->read($query, "id={$id}");

        if (!$stmt) {
            $this->message = "Erro ao consultar o usuário";
            return null;
        }

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            $this->message = "Usuário não encontrado para o id informado";
            return null;
        }

        $user = new User();

        foreach ($data as $column => $value) {
            $method = 'set' . str_replace('_', '', ucwords($column, '_'));

            if (method_exists($user, $method)) {
                $user->$method($value);
            }
        }

        return $user;
    }

    public function findByEmail(string $email, string $columns = '*'): ?User
    {
        $query = "SELECT {$columns} FROM " . self::$entity . " WHERE email = :email LIMIT 1";
        $stmt = $this->read($query, "email={$email}");

        if (!$stmt) {
            $this->message = "Erro ao consultar o usuário";
            return null;
        }

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }

        $user = new User();

        foreach ($data as $column => $value) {
            $method = 'set' . str_replace('_', '', ucwords($column, '_'));

            if (method_exists($user, $method)) {
                $user->$method($value);
            }
        }

        return $user;
    }

    public function findAll($limit = 30, $offset = 0, $columns = '*'): ?array
    {
        $query = "SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset";

        $stmt = $this->read($query, "limit={$limit}&offset={$offset}");

        if (!$stmt) {
            $this->message = "Erro ao consultar usuários";
            return null;
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) {
            $this->message = "Nenhum usuário encontrado!";
            return null;
        }

        $users = [];

        foreach ($rows as $row) {
            $user = new User();

            foreach ($row as $column => $value) {
                $method = 'set' . str_replace('_', '', ucwords($column, '_'));

                if (method_exists($user, $method)) {
                    $user->$method($value);
                }
            }

            $users[] = $user;
        }

        return $users;
    }

    public function save()
    {

    }

    public function destroy()
    {

    }

    private function required()
    {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getDocument(): int
    {
        return $this->document;
    }

    public function setDocument(?int $document): void
    {
        $this->document = $document;
    }

    public function getCreatedAt(): string|DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string|DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string|DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string|DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}