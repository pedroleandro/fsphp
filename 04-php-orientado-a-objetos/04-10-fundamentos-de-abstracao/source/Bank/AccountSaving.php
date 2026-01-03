<?php

namespace Source\Bank;

use Source\App\Client;
use Source\App\Trigger;

class AccountSaving extends Account
{
    private $interest;

    public function __construct($branch, $account, Client $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    public function deposit($value)
    {
        $this->balance += $value + ($value * $this->interest);
        Trigger::show("Depósito de {$this->toBrl($value)} reais, realizado com sucesso!", Trigger::ACCEPT);
    }

    public function withDraw($value)
    {
        if ($value <= 0) {
            Trigger::show("Saque inválido!", Trigger::ERROR);
            return;
        }

        if ($this->balance < $value) {
            Trigger::show("Saldo insuficiente!", Trigger::WARNING);
            return;
        }

        $this->balance -= $value;
        Trigger::show(
            "Saque de {$this->toBrl($value)} realizado com sucesso!",
            Trigger::ACCEPT
        );
    }
}