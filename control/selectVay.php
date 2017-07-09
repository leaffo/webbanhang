<?php

include "../model/dbclass.php";
/*
ini_set("display_errors","off");
ini_set('log-errors','on');
ini_set('error_log','err.log');
//hiê?n lô?i ra file
ini_set("display_errors","off");
ini_set('log-errors','on');
ini_set('error_log','err.log');*/

if (is_numeric($_GET['idcat'])) {
    $id = $_GET['idcat'];
    $result = $db->query("SELECT * FROM `product` WHERE `id_category`=" . $id)->fetchAll(PDO::FETCH_ASSOC);

    $result_json = json_encode($result);
} else {
    $result = $db->query("SELECT * FROM `product` WHERE 1")->fetchAll(PDO::FETCH_ASSOC);

    $result_json = json_encode($result);

}

/*echo '<pre>';
echo "<script>document.write((JSON.stringify(JSON.parse('$result_json'),null,1)))</script>";
echo '</pre>';*/

print_r($result_json);
?>