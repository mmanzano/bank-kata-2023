<?php declare(strict_types=1);

namespace KataTests;

use Kata\Account;
use Kata\Balance;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function acceptance_criteria(): void
    {
        $balance = new Balance(0);
        $account = new Account($balance);

        $account->deposit(1000);
        $account->deposit(2000);
        $account->withdraw(500);
        $account->printStatement();
        $result = null;
        $output = <<<RESULT
DATE | AMOUNT | BALANCE
24/01/2012 | 500.00 | 2500.00
23/01/2012 | 2000.00 | 3000.00
20/01/2012 | 1000.00 | 1000.00
RESULT;

        self::assertEquals($output, $result);
    }

    /** @test */
    public function it_can_make_a_deposit()
    {
        $balance = new Balance(0);
        $account = new Account($balance);

        $account->deposit(1000);

        self::assertEquals(1000, $balance->getAmount());
    }

    /** @test */
    public function it_can_make_two_deposits()
    {
        $balance = new Balance(0);
        $account = new Account($balance);

        $account->deposit(1000);
        $account->deposit(500);

        self::assertEquals(1500, $balance->getAmount());
    }

    /** @test */
    public function it_can_make_two_withdraws() {
        $balance = new Balance(500);
        $account = new Account($balance);

        $account->withdraw(100);
        $account->withdraw(100);

        self::assertEquals(300, $balance->getAmount());
    }
}
