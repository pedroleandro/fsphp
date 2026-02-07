<?php

namespace Source\Models;

use DateTime;
use PDO;
use Source\Core\Model;

class UserModel extends Model
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private ?int $document;
    private string|DateTime|null $createdAt;
    private string|DateTime|null $updatedAt;
    protected static array $safe = ["id", "created_at", "updated_at"];
    protected static string $entity = "users";
    protected static array $required = ["firstName", "lastName", "email", "password"];

    public function bootstrap(string $firstName, string $lastName, string $email, ?string $password, ?int $document = null): ?UserModel
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->setPassword($password);
        $this->document = $document;
        return $this;
    }

    public function data()
    {
        return (object)[
//            "id" => $this->id ?? null,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email,
            "password" => $this->password,
            "document" => $this->document ?? null,
            "createdAt" => $this->createdAt ?? null,
            "updatedAt" => $this->updatedAt ?? null
        ];
    }

    public function find(
        string $terms,
        string $params,
        string $columns = '*'
    ): ?UserModel
    {
        $query = "SELECT {$columns}
              FROM " . self::$entity . "
              WHERE {$terms}
              LIMIT 1";

        $stmt = $this->read($query, $params);

        if (!$stmt) {
            $this->message->warning("Erro ao consultar o usuário");
            return null;
        }

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            $this->message->warning("Usuário não encontrado");
            return null;
        }

        return $this->hydrate($data);
    }

    public function findById(int $id, string $columns = '*'): ?UserModel
    {
        return $this->find(
            'id = :id',
            "id={$id}",
            $columns
        );
    }

    public function findByEmail(string $email, string $columns = '*'): ?UserModel
    {
        return $this->find(
            'email = :email',
            "email={$email}",
            $columns
        );
    }

    public function findAll(int $limit = 30, int $offset = 0, string $columns = '*'): ?array
    {
        $query = "SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset";

        $stmt = $this->read($query, "limit={$limit}&offset={$offset}");

        if (!$stmt) {
            return null;
        }

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) {
            return null;
        }

        $users = [];

        foreach ($rows as $row) {
            $users[] = $this->hydrate($row);
        }

        return $users;
    }

    public function save()
    {
        if (!$this->required()) {
            return null;
        }

        if (empty($this->password)) {
            $this->message->warning("A senha é obrigatória.");
            return null;
        }

        $this->data = (object)[
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "email" => $this->email,
            "password" => $this->password,
            "document" => $this->document ?? null
        ];

        /**
         * UserModel Create
         */
        if (empty($this->id)) {
            if ($this->findByEmail($this->email)) {
                $this->message->warning("O e-mail informado já está cadastrado!");
                return null;
            }

            $userId = $this->create(self::$entity, (array)$this->data);

            if (!$userId) {
                $this->message->error("Erro ao cadastrar, verifique os dados!");
                return null;
            }

            $this->message->success("Cadastro realizado com sucesso!");
        }

        /**
         * UserModel Update
         */
        if (!empty($this->id)) {
            $userId = $this->id;

            var_dump($userId);

            $email = $this->read(
                "SELECT id FROM " . self::$entity . " WHERE email = :email AND id != :id",
                "email={$this->email}&id={$userId}"
            );

            if ($email && $email->rowCount()) {
                $this->message->warning("O e-mail informado já está cadastrado!");
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");

            if (!$userId) {
                $this->message->error("Erro ao atualizar, verifique os dados!");
                return null;
            }

            $this->message->success("Cadastro atualizado com sucesso!");
        }

        $this->data = $this->read(
            "SELECT * FROM " . self::$entity . " WHERE id = :id LIMIT 1",
            "id={$userId}"
        )->fetch(PDO::FETCH_OBJ);

        return $this;

    }

    public function destroy(): bool
    {
        if (empty($this->id)) {
            $this->message->warning("Usuário não identificado para exclusão.");
            return false;
        }

        $delete = $this->delete(
            self::$entity,
            "id = :id",
            "id={$this->id}"
        );

        if (!$delete) {
            $this->message->error("Erro ao remover o usuário.");
            return false;
        }

        $this->message->success("Usuário removido com sucesso!");
        $this->data = null;
        $this->id = 0;

        return true;
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

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        if ($password) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    public function getDocument(): ?int
    {
        return $this->document;
    }

    public function setDocument(?int $document): void
    {
        $this->document = $document;
    }

    public function getCreatedAt(): string|DateTime|null
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string|DateTime|null $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string|DateTime|null
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string|DateTime|null $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}