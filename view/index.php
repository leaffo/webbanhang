<!DOCTYPE html>

<html lang="vi">
<head>
    <title>ONLANG Shop</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../lib/css/fuck.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    font-family: 'Noto Sans', sans-serif;
    -->

</head>
<body>
<div class="bocContainer">
    <div class="container" style="font-size:12px;">
        <div class="col-xs-6">
            <ul style="">
                <li class="listhead"><a href="#">login</a> or <a href="#">register</a></li>
                <li class="listhead"><a href="#">Currency</a></li>
                <li class="" id="spanglyphicon"><a href="#">Ship <span class="glyphicon glyphicon-plane"</a></li>
            </ul>
        </div>
        <div class="col-xs-6 ">
            <ul style="float:right">
                <li class="listhead"><a href="#">MY Account</a></li>
                <li class="listhead" id="spanglyphicon"><a href="#"><span class="glyphicon glyphicon-user"></span>
                        Wishlist</a></li>
                <li class="" id="spanglyphicon"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>
                        Shopping cart</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="bocContainer">

    <div class="container">
        <div class="col-xs-6 first-header">
            <a style="text-decoration: none; font-weight: 400; font-size:34px;" href="#">
                <image src="../lib/images/iconweb.png"></image>
                Ơn làng Shop
            </a>
        </div>
        <div class="col-xs-6 second-header">


            <form class="form-group" action="#" style="height:79px;">
                <div class="input-group">
                    <input type="text" class="form-control pull-right"
                           style="width:100%;margin-right: 35px, border: 1px solid black; background-color: #e5e5e5; border-radius: 0px;"
                           placeholder="Search">
						<span class="input-group-btn">
							<button type="reset" class="btn btn-default">
								<span class="glyphicon glyphicon-remove">
									<span class="sr-only">Close</span>
								</span>
                            </button>
							<button type="submit" class="btn btn-default" style="border-radius:0px;">
								<span class="glyphicon glyphicon-search">
									<span class="sr-only">Search</span>
								</span>
                            </button>
						</span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="bocContainer" id="navba">
    <div class="container">

        <ul class="nav navbar-nav">
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>

                    <li><a href="#">Separated link</a></li>

                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>

                    <li><a href="#">Separated link</a></li>

                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="bocContainer">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb" style="padding:30px 15px; background-color:#ffffff; font-size:10px">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pictures</a></li>
                <li><a href="#">Summer 15</a></li>
                <li>Italy</li>
            </ul>
        </div>
    </div>

</div>

<div class="shop-items">
    <div class="container-fluid">
        <div class="row" ng-app="app" ng-controller="con">
            <div class="col-md-3 col-sm-6" ng-repeat="x in product" >
                <!-- Restaurant Item -->
                <div class="item">
                    <!-- Item's image -->
                    <div class="bocimage">
                        <img class="fuck" src="{{x.url_image}}" alt="">
                    </div>
                    <!-- Item details -->
                    <div class="item-dtls">
                        <!-- product title -->
                        <h4><a href="#">{{x.name_product}}</a></h4>
                        <!-- price -->
                        <span class="price ">${{x.price}}</span>
                    </div>
                    <!-- add to cart btn -->
                    <div class="ecom bg-lblue">
                        <a class="btn" href="#">Add to cart</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="../lib/js/angular.1.4.8.min.js"></script>
<script src="../lib/js/jquery.3.2.1.min.js"></script>
<script src="../lib/js/bootstrap.3.3.7.min.js"></script>
<div class="dmm"></div>
<script>
    $(function () {

        $("#click").click(function () {
            alert("");
        });


        var navY = $('#navba').offset().top;
        var nav = $('#navba');

        var w = $(window);
        w.scroll(function () {
            var wtop = w.scrollTop();

            $('#countY').text(wtop);
            if (wtop >= navY) {
                console.log("fuck");
                $('#navba').css({
                    top: 0,
                    position: 'fixed'
                });
            }

            else {
                $('#navba').css({

                    position: 'relative'

                });
            }

        });
    });
</script>
<script>

    var app = angular.module('app', []);
    app.controller('con', function ($scope, $http) {
        $http({
            method: 'GET',
            url: '../model/selectVay.php'
        }).then(function (ret) {
            $scope.product = ret.data;
        });
    });
</script>
</body>
</html>