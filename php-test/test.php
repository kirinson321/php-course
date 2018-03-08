<?php

    interface MoneyFormatter
    {
        public function format(Money $object, string $decimal, string $thousands): string;
    }

    class Formatter implements MoneyFormatter
    {
        public function format(Money $object, string $decimal, string $thousands): string
        {
            // TODO: Implement format() method.
            $output = number_format($object->showAmount(), 2, $decimal, $thousands) . " " . $object->showCurrency();
            //return number_format($object->showAmount(), 2, $decimal, $thousands);
            return $output;
        }
    }


    class Money extends Formatter
    {
        private $currency;
        private $amount;

        public function __construct(string $currency, float $amount)
        {
            $this->currency = $currency;
            $this->amount = $amount;
        }

        public function showAmount(): float
        {
            return $this->amount;
        }

        public function showCurrency(): string
        {
            return $this->currency;
        }

        public function multiplyMoney(int $times)
        {
            $this->amount = $this->amount*$times;
        }

        public function divideMoney(int $times)
        {
            $this->amount = $this->amount / $times;
        }

        public function addMoney(Money $second)
        {
            if($this->currency != $second->currency)
            {
                throw new Exception("Kwoty powinny być w tych samych walutach");
            }
            $this->amount = $this->amount + $second->amount;
        }

        public function subtractMonet(Money $second): float
        {
            if ($this->currency != $second->currency) {
                throw new Exception("Kwoty powinny być w tych samych walutach");
            }
            $this->amount = $this->amount - $second->amount;
        }
    }


//    $pieniazki = new Money('PLN', 100.00);
//    $pieniazki2 = new Money('PLN', 125.00);
//    echo "Wynik mnożenia: " . $pieniazki->multiplyMoney(10) . "\n";
//    echo $pieniazki->divideMoney(4) . "\n";
//    echo $pieniazki->addMoney($pieniazki2) . "\n";
//    echo $pieniazki->subtractMonet($pieniazki2) . "\n";
//    echo $argc;

    if(gettype($argv[1]) != "string")
    {
        throw new Exception("Jako pierwszy argument wywołania programu powinna zostać podana kwota");
    }

    $sum = new Money($argv[1], 0.00);
    for($i=2; $i<$argc; $i++)
    {
        $second = new Money($argv[1], $argv[$i]);
        $sum->addMoney($second);
    }

    echo $sum->format($sum, '.', ' ');

   //echo gettype($argv[3]);
?>