<?php

include '../model/dbclass.php';
include '../model/product.php';
$product = new product($db);

$data = json_decode(file_get_contents("php://input"));
if (isset($data)) {
    $id = $data->id;
    $name = $data->name;
    $url = $data->url;
    $price = $data->price;
    echo $product->suaproduct($id, $name, $price, $url);
}


?>