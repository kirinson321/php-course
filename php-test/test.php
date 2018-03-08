<?php

    class Money
    {
        private $currency;
        private $amount;

        public function __construct(string $currency, float $amount)
        {
            $this->currency = $currency;
            $this->amount = $amount;
        }

        public function multiplyMoney(int $times): float
        {
            return $this->amount*$times;
        }

        public function divideMoney(int $times): float
        {
            return $this->amount/$times;
        }

        public function addMoney(Money $second): float
        {
            return $this->amount+$second->amount;
        }

        public function subtractMonet(Money $second): float
        {
            return $this->amount-$second->amount;
        }


    }


//    $pieniazki = new Money('PLN', 100.00);
//    $pieniazki2 = new Money('PLN', 125.00);
//    echo "Wynik mnożenia: " . $pieniazki->multiplyMoney(10) . "\n";
//    echo $pieniazki->divideMoney(4) . "\n";
//    echo $pieniazki->addMoney($pieniazki2) . "\n";
//    echo $pieniazki->subtractMonet($pieniazki2) . "\n";

//    echo $argc;

    $sum = 0.00;

    for($i=2; $i<$argc; $i++)
    {
        $sum = $sum + $argv[$i];
    }

    echo $sum;
    //var_dump($pieniazki);

?>