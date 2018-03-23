<?php

require_once __DIR__.'/../vendor/autoload.php';
use Money\Money;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;

$products_list = scandir("products/");
$products_list = array_diff($products_list, array('.', '..'));

$current_key = 1;

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

    $filename = $products_list[$id];
    return $filename;
});

$app->post('/products', function (Request $request) use ($products_list, $current_key) {

    $data = $request->request->all();
    $output = '';
    $output .= $current_key;

    $output_data = '';
    $output_data .= "id: " . $current_key . "\n";

    //file_put_contents("products/product" . $current_key, "id: $current_key");

    foreach($data as $key=>$value){
        $output_data .= $key . ": " . $value . "\n";
    }

    file_put_contents("products/product" . $current_key, $output_data);

    $current_key += 1;
    return new Response("Created files with id: $output", 201);
});


$app->put('/products/{id}', function ($id, Request $request) use ($products_list) {
    $data = $request->request->all();
    $output = '';

    foreach($data as $key=>$value) {


    }

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
