<?php

include "dbclass.php";

$result=$db->query("SELECT * FROM `product` WHERE 1")->fetchAll(PDO::FETCH_ASSOC);
$result_json=json_encode($result);
print_r($result_json);

?>