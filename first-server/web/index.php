<?php

require_once __DIR__.'/../vendor/autoload.php';
use Money\Money;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;

$products_list = scandir("products/");
$products_list = array_diff($products_list, array('.', '..'));

//$current_key = 1;

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

$app->get('/products/{id}', function (Silex\Application $app, $id) {
    $current_key = $id;

    if(!file_exists("products/product" . $current_key)) {
        $app->abort(404, "Product with id $current_key does not exist");
    }

    $output_data = '';
    $output_data .= file_get_contents("products/product" . $current_key);

    return $output_data;
});

$app->post('/products', function (Request $request) {

    $current_key = rand(0, 1000);

    $data = $request->request->all();
    $output = '';
    $output .= $current_key;

    $output_data = '';
    $output_data .= "id: " . $current_key . "\n";

    foreach($data as $key=>$value){
        $output_data .= $key . ": " . $value . "\n";
    }

    file_put_contents("products/product" . $current_key, $output_data);

    return new Response("Created files with id: $output", 201);
});


$app->put('/products/{id}', function ($id, Request $request, Silex\Application $app) {
    $current_key = $id;

    if(!file_exists("products/product" . $current_key)) {
        $app->abort(404, "Product with id $current_key does not exist");
    }

    $data = $request->request->all();
    $output_data = '';

    foreach($data as $key=>$value){
        $output_data .= $key . ": " . $value . "\n";
    }

    file_put_contents("products/product" . $current_key, $output_data);
    return new Response("File with id $current_key successfully updated", 200);
});


$app->delete('/products/{id}', function ($id, Silex\Application $app) use ($products_list) {
    $current_key = $id;

    if(!file_exists("products/product" . $current_key)) {
        $app->abort(404, "Product with id $current_key does not exist");
    }

    $filename = "product" . $current_key;
    unlink("products/$filename");
    return $filename;
});

$app->run();
