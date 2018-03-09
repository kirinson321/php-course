<?php

//interface MoneyFormatter
//{
//    public function format(Money $object, string $decimal, string $thousands): string;
//}
//
//class Formatter implements MoneyFormatter
//{
//    public function format(Money $object, string $decimal, string $thousands): string
//    {
//        $output = number_format($object->showAmount(), 2, $decimal, $thousands) . " " . $object->showCurrency();
//        return $output;
//    }
//}


interface MoneyFormatter
{
    public function format(Money $object);
}

class CurrencyFormatter implements MoneyFormatter
{

    private $decimal;
    private $thousands;

    /**
     * CurrencyFormatter constructor.
     */
    public function __construct(string $decimal, string $thousands)
    {
        $this->decimal = $decimal;
        $this->thousands = $thousands;
    }

    /**
     * @return string
     */
    public function getDecimal(): string
    {
        return $this->decimal;
    }

    /**
     * @return string
     */
    public function getThousands(): string
    {
        return $this->thousands;
    }

    public function format(Money $object)
    {
        // TODO: Implement format() method.
        $output = number_format($object->getAmount(), 2, $this->decimal, $this->thousands);
        return $output;
    }
}

class Money extends CurrencyFormatter
{
    private $currency;
    private $amount;

    public function __construct(string $currency, float $amount)
    {
        $this->currency = $currency;
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }


    public function multiplyMoney(int $times)
    {
        $this->amount = $this->amount * $times;
    }

    public function divideMoney(int $times)
    {
        $this->amount = $this->amount / $times;
    }

    public function addMoney(Money $second)
    {
        if ($this->currency != $second->currency) {
            throw new Exception("Kwoty powinny być w tych samych walutach");
        }

        $this->amount = $this->amount + $second->amount;
    }

    public function subtractMonet(Money $second)
    {
        if ($this->currency != $second->currency) {
            throw new Exception("Kwoty powinny być w tych samych walutach");
        }

        $this->amount = $this->amount - $second->amount;
    }

//    public function format(Money $object)
//    {
//        // TODO: Implement format() method.
//
//    }

}


if (gettype($argv[1]) != "string") {
    throw new Exception("Jako pierwszy argument wywołania programu powinna zostać podana kwota");
}

$sum = new Money($argv[1], 0.00);

for ($i = 2; $i < $argc; $i++) {
    $second = new Money($argv[1], $argv[$i]);
    $sum->addMoney($second);
}

//echo var_dump($sum);
//
//if(isset($sum->)) {
//    echo "\n\ndebug\n\n";
//}

echo $sum->format($sum, '.', ' ');
