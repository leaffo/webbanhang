<?php
session_start();
if (isset($_SESSION['user'])) {

    ?>

    <?php

    header('Content-Type: text/html; charset=utf-8');
    ?>
    <!DOCTYPE html>

    <html lang="vi">
    <head>

        <title>ONLANG Shop</title><!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="../lib/css/bootstrap-theme.css">


        <link rel="stylesheet" href="../lib/css/cart.css"/>

        <link href="../lib/css/fuck.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="../lib/js/jquery.3.2.1.min.js"></script>
        <script src="../lib/js/angular.1.4.8.min.js"></script>

        <script src="../lib/js/bootstrap.3.3.7.min.js"></script>
        <script src="../lib/js/angular-route.js"></script>
    </head>


    <body ng-app="myApp">


    <a href="#!product">product</a>
    <a href="#!category">category</a>

    <div ng-view></div>

    <script>
        var app = angular.module("myApp", ["ngRoute"]);
        app.config(function ($routeProvider) {
            $routeProvider

                .when("/product", {
                    templateUrl: "../view/product.php"
                })
                .when("/category", {
                    templateUrl: "../view/catogery.php"
                });
        });
    </script>
    </body>
    </html>
    <?php

} else {
    header('Location:../view/index.php');
} ?>

