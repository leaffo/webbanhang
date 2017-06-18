<?php

include '../model/dbclass.php';
include '../model/product.php';

$product = new product($db);

    $data = json_decode(file_get_contents("php://input"));
    $id = $data->id;

if (isset($id)) {
    echo $product->xoaproduct($id);

} else
    echo false;


?>