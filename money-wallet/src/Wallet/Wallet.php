<?php
use events\IEvent;
use Money\Money;

class Wallet
{
    private $isActive;
    private $walletName;
    private $balance;
    private $eventsArray;

    public function __construct(string $walletName, string $currency)
    {
        $this->isActive = false;
        $this->walletName = $walletName;
        $this->balance = Money::$currency(0);
        $this->eventsArray = array();
    }

    public static function fromEvents(array $events): Wallet
    {


    }

    public function deposit(Money $moneyToDeposit): void
    {


    }

    public function withdraw(Money $moneyToWithdraw): void
    {

    }

    public function deactivate(string $reason): void
    {
        $this->isActive = false;

        //mozna dopisac reason do arraya eventow

        return;
    }

    public function activate(string $reason): void
    {
        $this->isActive = true;
        return;
    }

    public function getBalance(): Money
    {

    }

}