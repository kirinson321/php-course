<?php

require_once __DIR__.'/../vendor/autoload.php';
use Money\Money;

#echo "dupa";

$app = new \Silex\Application();
#$app['debug'] = true;

$products_list = scandir("products/");
$products_list = array_diff($products_list, array('.', '..'));

$app->get('/products', function () use ($products_list) {
    $output = '';
    foreach ($products_list as $item){
        if($item != '.' and $item != '..'){
            $output .= $item;
            $output .= '<br />';
        }
    }

    return $output;
});

$app->get('products/{id}', function (Silex\Application $app, $id) use ($products_list) {
   if (!isset($products_list[$id])) {
       $app->abort(404, "Product with id $id does not exist");
   }

   $product = $products_list[$id];
   //$output = var_dump($products_list);
    $filename = $products_list[$id];
    return $filename;
   #return $product;
});

$app->delete('/products/{id}', function ($id, Silex\Application $app) use ($products_list) {
    if(!isset($products_list[$id])) {
       $app->abort(404, "Product with id $id does not exist");
    }
    $filename = $products_list[$id];
    unlink("products/$filename");
    return $filename;
});

$app->run();
