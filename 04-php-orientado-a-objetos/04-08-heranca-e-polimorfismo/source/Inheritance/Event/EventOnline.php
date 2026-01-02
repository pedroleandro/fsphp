<?php

namespace Source\Inheritance\Event;

class EventOnline extends Event
{
    private $link;

    public function __construct($event, \DateTime $date, $price, $link, $vacancies = null)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->link = $link;
    }

    public function register($fullName, $mail)
    {
        $this->vacancies++;
        $this->setRegister($fullName, $mail);
        echo "<p>Showww!! {$fullName}, você foi cadastrado no evento!</p>";
    }
}