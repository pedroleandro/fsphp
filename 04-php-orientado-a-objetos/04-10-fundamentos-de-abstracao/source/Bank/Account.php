<?php

namespace Source\Bank;

use Source\App\Client;
use Source\App\Trigger;

abstract class Account
{
    protected $branch;
    protected $account;

    protected $client;

    protected $balance;

    protected function __construct($branch, $account, Client $client, $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    public function extract()
    {
        $triggerExtract = ($this->balance > 0 ? Trigger::ACCEPT : Trigger::ERROR);
        Trigger::show("Extrato: Saldo atual é R$ {$this->getBalance()}", $triggerExtract);
    }

    protected function toBrl($value)
    {
        return "R$ " . number_format($value, 2, ',', '.');
    }

    protected function getBalance()
    {
        return number_format($this->balance, 2, ",", ".");
    }

    abstract public function deposit($value);
    abstract public function withDraw($value);
}