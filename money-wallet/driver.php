<?php

require __DIR__ . '/vendor/autoload.php';

use Money\Money;
use Wallet\Wallet;


$number_of_deposits = $argv[2];

$constructor_array = array();

array_push($constructor_array, $argv[1]);

for ($x = 3; $x <= 2+$number_of_deposits; $x++) {
    $event = new \Event\DepositEvent\DepositEvent('deposit', $argv[$x], $argv[1]);
    array_push($constructor_array, $event->to_string());
}

$event = new \Event\WithdrawEvent\WithdrawEvent('withdraw', $argv[$number_of_deposits+3], $argv[1]);
array_push($constructor_array, $event->to_string());

$test_wallet = Wallet::fromEvents($constructor_array);

echo $test_wallet->getBalance()->getAmount() . ' ' . $test_wallet->getBalance()->getCurrency();

////

//$first_wallet = new Wallet("first_wallet", "PLN");
//
//
//$first_wallet->activate("aktywacja");
//
//$deposit_one = Money::PLN(10);
//$withdraw_one = Money::PLN(1);
//$deposit_two = Money::PLN(20);
//
//$first_wallet->deposit($deposit_one);
//$first_wallet->withdraw($withdraw_one);
//$first_wallet->deposit($deposit_two);
//
//foreach ($first_wallet->getArray() as $elem)
//{
//    echo $elem . PHP_EOL;
//}

//echo $first_wallet->getBalance()->getAmount();