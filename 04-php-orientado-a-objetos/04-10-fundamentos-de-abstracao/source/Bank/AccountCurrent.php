<?php

namespace Source\Bank;

use Source\App\Client;
use Source\App\Trigger;

class AccountCurrent extends Account
{

    private $limit;
    private $interest;

    public function __construct($branch, $account, Client $client, $balance, $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
        $this->interest = 0.006;
    }

    final public function deposit($value)
    {
        $this->balance += $value;
        Trigger::show("Depósito de {$this->toBrl($value)} efetuado com sucesso!", Trigger::ACCEPT);
    }

    final public function withDraw($value)
    {
        if($value <= ($this->balance + $this->limit)){
            $this->balance -= $value;
            Trigger::show("Saque de {$this->toBrl($value)} efetuado com sucesso!", Trigger::ERROR);

            if($this->balance < 0){
                $tax = abs($this->balance) * $this->interest;
                $this->balance -= $tax;
                Trigger::show("Taxa de uso de limite de {$this->toBrl($tax)}", Trigger::WARNING);
            }
        }else{
            Trigger::show("Saldo Insuficiente", Trigger::WARNING);
        }
    }

}