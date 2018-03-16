<?php

namespace Product\BasicProduct;
use Money\Money;
use Product\IProduct;

class BasicProduct implements IProduct
{
    private $name;
    private $price;

    public function __construct(string $sign, Money $object)
    {
        $this->name = $sign;
        $this->price = $object;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }
}