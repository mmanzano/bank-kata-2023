<?php declare(strict_types=1);

namespace Kata;

use Exception;
use Kata\Balance;

class Account
{
    public function __construct(
        private Balance $balance,
        private Printer $printer
    ) {
    }

    public function deposit(int $amount): void
    {
        $this->balance->addAmount($amount);
    }

    public function withdraw(int $amount): void
    {
        $this->balance->substractAmount($amount);
    }

    public function printStatement(): void
    {
        $this->printer->print('');
    }
}
