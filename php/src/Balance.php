<?php

namespace Kata;

class Balance
{
    public function __construct(private int $amount)
    {
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function addAmount(int $amount)
    {
        $this->amount += $amount;
    }

    public function substractAmount(int $amount)
    {
        $this->amount -= $amount;
    }
}
