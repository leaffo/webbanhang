<?php
include'../model/dbclass.php';
include'../model/product.php';
$product=new product($db);

$data=json_decode(file_get_contents("php://input"));
if(isset($data)){
$name=$data->name;
$url=$data->url;
$price=$data->price;

    $res=$product->themproduct($name,$price,$url,1);
    if($res>=0){
        echo true;
    }
    else echo false;

}
else{
    echo false;
}
?>