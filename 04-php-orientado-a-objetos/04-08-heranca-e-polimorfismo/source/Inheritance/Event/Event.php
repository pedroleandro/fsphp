<?php

namespace Source\Inheritance\Event;

class Event
{
    private $event;
    private $date;
    private $price;
    private $register;
    protected $vacancies;

    /**
     * @param $event
     * @param $date
     * @param $price
     * @param $vacancies
     */
    public function __construct($event, \DateTime $date, $price, $vacancies)
    {
        $this->event = $event;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    public function register($fullName, $mail)
    {
        if($this->vacancies >= 1){
            $this->vacancies--;
            $this->setRegister($fullName, $mail);
            echo "<p>Parabéns, {$fullName}, vaga garantida!</p>";
        }else{
            echo "<p>Desculpe, {$fullName}, mas as vagas esgotaram!</p>";
        }
    }

    protected function setRegister($fullName, $mail): void
    {
        $this->register[mb_strstr($mail, "@", true)] = [
            "fullName" => $fullName,
            "mail" => $mail
        ];
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function getDate(): string
    {
        return $this->date->format("d/m/Y H:i");
    }

    public function getPrice()
    {
        return "R$ " . number_format($this->price, 2, ',', '.');
    }

    public function getRegister()
    {
        return $this->register;
    }

    public function getVacancies()
    {
        return $this->vacancies;
    }
}