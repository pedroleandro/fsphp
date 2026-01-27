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
    private ?int $document;
    private string|DateTime|null $createdAt;
    private string|DateTime|null $updatedAt;
    protected static array $safe = ["id", "created_at", "updated_at"];

    protected static string $entity = "users";

    public function bootstrap(string $firstName, string $lastName, string $email, ?int $document = null): ?UserModel
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->document = $document;
        return $this;
    }

    public function findById(int $id, string $columns = '*'): ?UserModel
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

        $user = new UserModel();

        foreach ($data as $column => $value) {
            $method = 'set' . str_replace('_', '', ucwords($column, '_'));

            if (method_exists($user, $method)) {
                $user->$method($value);
            }
        }

        return $user;
    }

    public function findByEmail(string $email, string $columns = '*'): ?UserModel
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

        $user = new UserModel();

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
            $user = new UserModel();

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
        if (!$this->required()) {
            return null;
        }

        $this->data = (object) [
            "first_name" => $this->firstName,
            "last_name"  => $this->lastName,
            "email"      => $this->email,
            "document"   => $this->document
        ];

        /**
         * UserModel Create
         */
        if(empty($this->id))
        {
            if($this->findByEmail($this->email)){
                $this->message = "O e-mail informado já está cadastrado!";
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());

            if(!$userId){
                $this->message = "Erro ao cadastrar, verifique os dados!";
                return null;
            }

            $this->message = "Cadastro realizado com sucesso!";
        }

        /**
         * UserModel Update
         */
        if(!empty($this->id))
        {
            $userId =$this->id;

            $email = $this->read("SELECT id FROM " . self::$entity . " WHERE email = :email AND id =:id", "email={$this->email}&id={$userId}");

            if($email->rowCount()){
                $this->message = "O e-mail informado já está cadastrado!";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");

            if(!$userId){
                $this->message = "Erro ao atualizar, verifique os dados!";
                return null;
            }

            $this->message = "Cadastro atualizado com sucesso!";
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
            $this->message = "Usuário não identificado para exclusão.";
            return false;
        }

        $delete = $this->delete(
            self::$entity,
            "id = :id",
            "id={$this->id}"
        );

        if (!$delete) {
            $this->message = "Erro ao remover o usuário.";
            return false;
        }

        $this->message = "Usuário removido com sucesso!";
        $this->data = null;
        $this->id = 0;

        return true;
    }

    private function required(): bool
    {
        if (empty($this->firstName)) {
            $this->message = "O nome é obrigatório.";
            return false;
        }

        if (empty($this->lastName)) {
            $this->message = "O sobrenome é obrigatório.";
            return false;
        }

        if (empty($this->email)) {
            $this->message = "O e-mail é obrigatório.";
            return false;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "O e-mail informado é inválido.";
            return false;
        }

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

    public function getDocument(): int
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