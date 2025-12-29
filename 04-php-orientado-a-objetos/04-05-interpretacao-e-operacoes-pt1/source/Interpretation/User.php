<?php

namespace Source\Interpretation;

class User
{
    private $firstName;
    private $lastName;
    private $mail;

    public function __construct($firstName, $lastName, $mail)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->mail = $mail;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    public function __clone(): void
    {
        $this->firstName = null;
        $this->lastName = null;
        $this->mail = null;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}