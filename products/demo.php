<?php

namespace Product;

use Money\Money;

require 'vendor/autoload.php';

require 'src/Product.php';
require 'src/BasicProduct/Basic.php';
require 'src/BundleProduct/Bundle.php';
require 'src/DiscountedProduct/Discounted.php';

$arguments = array(
    "bundle1" => \Money\Money::PLN(10),
    "bundle2" => \Money\Money::PLN(15),
    "bundle3" => \Money\Money::PLN(2)
);

$product1 = new BasicProduct\BasicProduct("produkt 1", \Money\Money::PLN(100));
$product2 = new BasicProduct\BasicProduct("produkt 2", \Money\Money::PLN(25));
$product3 = new DiscountedProduct\DiscountedProduct("produkt 3 discount", Money::PLN(100), 20);
$product4 = new BundleProduct\BundleProduct("produkt 4 bundle", $arguments);
$product5 = new BasicProduct\BasicProduct("produkt 5", \Money\Money::PLN(250));

$totalPrice = \Money\Money::PLN(0);

$products = [
    $product1,
    $product2,
    $product3,
    $product4,
    $product5
];

foreach ($products as $product) {
    echo $product->getName() . PHP_EOL;
    $totalPrice = $totalPrice->add($product->getPrice());
}

echo "Total price: " . $totalPrice->getAmount() . $totalPrice->getCurrency();