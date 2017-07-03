<?php


?>

<!DOCTYPE html>

<html lang="vi">
<head>

    <title>ONLANG Shop</title><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../lib/css/bootstrap-theme.css">


    <link rel="stylesheet" href="../lib/css/text.css"/>

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
    <style>
        /* The starting CSS styles for the enter animation */
        .fade1.ng-enter {
            transition: 0.5s linear all;
            opacity: 0;
        }

        /* The finishing CSS styles for the enter animation */
        .fade1.ng-enter.ng-enter-active {
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="container-fluid" ng-app="app" ng-controller="con">
    <div class="col-md-4"></div>
    <div class="col-md-8">


        <button ng-click="bool=!bool" class="btn">Fade Out!</button>
            <form action="">

                <div ng-if="bool" class="fade1">
                <input type="text" class="form-control"><input type="text" class="form-control"><input
                    type="text" class="form-control"><input type="text" class="form-control"><input type="text"
                                                                                                    class="form-control"><select
                    name="" id="" class="form-control"></select><select name="" id=""
                                                                        class="form-control"></select><select name=""
                                                                                                              id=""
                                                                                                              class="form-control"></select><select
                    name="" id="" class="form-control"></select><select name="" id="" class="form-control"></select>
            </form>
        </div>
    </div>


</div>
<script>
    var app = angular.module('app', []);
    app.controller('con', function ($scope, $http) {


    });

</script>
<?php

include 'bottompage.php';

?>

