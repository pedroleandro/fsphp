<?php

namespace Source\Related;

class User
{

    private $firstName;
    private $lastName;
    private $role;

    /**
     * @param $role
     * @param $firstName
     * @param $lastName
     */
    public function __construct($firstName, $lastName, $role = false)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getRole(): mixed
    {
        return $this->role;
    }

    public function setRole(mixed $role): void
    {
        $this->role = $role;
    }
}