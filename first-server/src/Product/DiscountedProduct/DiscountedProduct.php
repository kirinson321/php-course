<?php

namespace Product\DiscountedProduct;
use Money\Money;
use Product\IProduct;

class DiscountedProduct implements IProduct
{
    private $name;
    private $price;
    private $discount;

    public function __construct(string $argName, Money $argMoney, float $argDiscount)
    {
        $this->name = $argName;
        $this->price = $argMoney;
        $this->discount = $argDiscount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        $discountPrice = $this->price;
        $discountPrice = $discountPrice->multiply(1-($this->discount/100));
        return $discountPrice;
    }
}