<?php

namespace Source\Traits;

class User
{
    private $firstName;
    private $lastName;
    private $email;

    /**
     * @param $firstName
     * @param $lastName
     * @param $email
     */
    public function __construct($firstName, $lastName, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }
}