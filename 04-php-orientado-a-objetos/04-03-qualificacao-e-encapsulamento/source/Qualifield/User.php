<?php

namespace Source\Qualifield;

class User
{
    private $firstName;
    private $lastName;
    private $mail;

    /**
     * @param $firstName
     * @param $lastName
     * @param $mail
     */
//    public function __construct($firstName, $lastName, $mail)
//    {
//        $this->firstName = $firstName;
//        $this->lastName = $lastName;
//        $this->mail = $mail;
//    }

    private $error;

    public function setUser($firstName, $lastName, $mail)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        if(!$this->setMail($mail)){
            $this->error = "O email {$mail} não é válido!";
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

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
    private function setFirstName($firstName)
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
    private function setLastName($lastName): void
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
    private function setMail($mail): bool
    {
        $this->mail = $mail;
        if(filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }else{
            return false;
        }
    }
}