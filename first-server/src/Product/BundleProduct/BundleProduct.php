<?php

namespace Product\BundleProduct;
use Money\Money;
use Product\IProduct;


class BundleProduct implements IProduct
{
    private $tab;
    private $bundleName;
    private $bundlePrice;

    public function __construct(string $name, array $args)
    {
        $this->bundleName = $name;
        $this->tab = $args;
    }

    public function getName(): string
    {
        return $this->bundleName;
    }

    public function getPrice(): Money
    {
        $this->bundlePrice = Money::PLN(0);
        //$this->bundlePrice = $this->bundlePrice->subtract($this->tab[0]);

        foreach($this->tab as $product) {
            $this->bundlePrice = $this->bundlePrice->add($product->absolute());
        }

        return $this->bundlePrice;
    }
}