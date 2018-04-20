<?php

namespace Wallet;

use Event\IEvent;
use Event\ActivateEvent\ActivateEvent;
use Event\DepositEvent\DepositEvent;
use Event\WithdrawEvent\WithdrawEvent;
use Event\DeactivateEvent\DeactivateEvent;
use Money\Money;

class Wallet
{
    private $isActive;
    private $walletName;
    //private $balance;
    private $eventsArray;

    private $currency;
    private $amount;

    public function __construct(string $walletName, string $currency)
    {
        $this->isActive = false;
        $this->walletName = $walletName;
        //$this->balance = Money::$currency(0);
        $this->eventsArray = array();

        $this->currency = $currency;
        $this->amount = 0.00;
    }

    public static function fromEvents(array $events): Wallet
    {
        //echo $events[0];
        $output_wallet = new Wallet('event reconstructed wallet', $events[0]);

        foreach ($events as $element)
        {
            $parsed = explode(' ', trim($element));
            switch ($parsed[0]) {
                case "activate":
                    $output_wallet->activate('array input activate');
                    break;
                case "deactivate":
                    $output_wallet->deactivate('array input deactivate');
                    break;
                case "deposit":
                    $currency = $parsed[2];
                    $deposit_value = Money::$currency($parsed[1]);
                    $output_wallet->deposit($deposit_value);
                    //echo "DEPOSIT \n";
                    break;
                case "withdraw":
                    $currency = $parsed[2];
                    $withdraw_value = Money::$currency($parsed[1]);
                    $output_wallet->withdraw($withdraw_value);
                    //echo "WITHDRAW \n";
                    break;
                default:
                    continue;
            }   
        }

        return $output_wallet;
    }

    public function deposit(Money $moneyToDeposit)
    {
        if($this->isActive == false)
        {
            throw new \Exception("Account is inactive");
        } else
        {
            $amount = $moneyToDeposit->getAmount();
            $currency = $moneyToDeposit->getCurrency();

            if($currency != $this->currency)
            {
                throw new \Exception("Currencies do not match");
            } else
            {
                $this->amount += (int)$amount;

                $event = new DepositEvent('deposit', $amount, $currency);
                array_push($this->eventsArray, $event->to_string());
            }
        }
    }

    public function withdraw(Money $moneyToWithdraw)
    {
        if($this->isActive == false)
        {
            throw new \Exception("Account is inactive");
        } else
        {
            $amount = $moneyToWithdraw->getAmount();
            $currency = $moneyToWithdraw->getCurrency();

            if($currency != $this->currency)
            {
                throw new \Exception("Currencies do not match");
            } else
            {
                if((int)$amount > $this->amount)
                {
                    throw new \Exception("Not enough money in the wallet");
                } else
                {

                    $this->amount -= (int)$amount;

                    $event = new WithdrawEvent('withdraw', $amount, $currency);
                    array_push($this->eventsArray, $event->to_string());
                }
            }
        }


    }

    public function deactivate(string $reason)
    {
        $this->isActive = false;
        $event = new DeactivateEvent($reason);
        array_push($this->eventsArray, $event->to_string());
    }

    public function activate(string $reason)
    {
        $this->isActive = true;
        $event = new ActivateEvent($reason);
        array_push($this->eventsArray, $event->to_string());
    }

    public function getBalance(): Money
    {
        $currency = $this->currency;
        $output = Money::$currency($this->amount);
        return $output;
    }


    public function getArray(): array
    {
        return $this->eventsArray;
    }
}