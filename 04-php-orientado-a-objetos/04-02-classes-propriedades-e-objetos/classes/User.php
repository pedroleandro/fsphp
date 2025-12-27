<?php

namespace classes;

class User
{
    public $firstName;
    public $lastName;
    public $mail;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = filter_var($firstName, FILTER_UNSAFE_RAW);
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @return void
     */
    public function setLastName($lastName): void
    {
        $this->lastName = filter_var($lastName, FILTER_UNSAFE_RAW);
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param $mail
     * @return bool
     */
    public function setMail($mail): bool
    {
        $this->mail = $mail;
        if(filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }else{
            return false;
        }
    }
}