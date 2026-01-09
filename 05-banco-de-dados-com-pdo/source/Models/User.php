<?php

namespace Source\Models;

class User extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];

    protected static string $entity = "users";

    public function bootstrap()
    {

    }

    public function findById(int $id)
    {

    }

    public function findByEmail(string $email)
    {

    }

    public function findAll($limit = 30, $offset = 0)
    {

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
}