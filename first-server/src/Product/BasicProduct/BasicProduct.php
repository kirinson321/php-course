<?php

namespace Product\BasicProduct;
use Money\Money;
use Product\IProduct;

class BasicProduct implements IProduct
{
    private $name;
    private $price;
    private $id;

    public function __construct(string $sign, Money $object, int $id)
    {
        $this->name = $sign;
        $this->price = $object;
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getId(): int
    {
        return $this->id;
    }
}