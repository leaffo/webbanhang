<?php

session_start();
include('../model/dbclass.php');
include('../model/product.php');


$product = new product($db);
$quantity = 0;
if (isset($_SESSION['cart'])) {

    $array = $_SESSION['cart'];
    $tong = 0;


    if (count($array) > 0) {


//Array ( [0] => {"id_product":"9","quantify":"1"} [1] => {"id_product":"9","quantify":"1"} )

        $newarray = [];
        for ($i = 0; $i < count($array); $i++) {
            $newarray[$i]['id'] = json_decode($array[$i])->id_product;
            $newarray[$i]['quantity'] = json_decode($array[$i])->quantify;
            $quantity += $newarray[$i]['quantity'];

//        echo $newarray[$i]['id'];
        };
        for ($i = 0;
             $i < count($newarray);
             $i++) {
            $item[$i] = ($product->selectidproduct($newarray[$i]['id']));
        }
//    $item[$i][0]['url_image'];
        //  $item[$i][0]['price'];
        //$newarray[$i]['quantity'];

    }
}

?>
<!DOCTYPE html>

<html lang="vi">
<head>

    <title>ONLANG Shop</title><!-- Latest compiled and minified CSS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="shortcut icon" href="../lib/images/iconweb.ico">


    <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
    <!-- Optional theme -->
    <!--Button number input-->

    <link rel="stylesheet" href="../lib/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../lib/css/cart.css"/>
    <link href="../lib/css/fuck.css" rel="stylesheet" type="text/css"/>

    <link href="../lib/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../lib/css/fontNoto.css" rel="stylesheet">


    <script src="../lib/js/jquery.3.2.1.min.js"></script>
    <script src="../lib/js/angular.1.4.8.min.js"></script>
    <script src="../lib/js/bootstrap.3.3.7.min.js"></script>
    <script src="../lib/js/ui-bootstrap-tpls-0.12.0.min.js"></script>

</head>
<body ng-app="app" ng-controller="con">
<div>
    <div class="giohang">
        <div class="cd-cart-container empty">
            <a href="#0" class="cd-cart-trigger">
                Cart
                <ul class="count"> <!-- cart items count -->
                    <li><?php if (isset($array)) {
                            echo $quantity;
                        } else echo 0; ?></li>
                    <li><?php if (isset($array)) {
                            echo $quantity;
                        } else echo 0; ?></li>
                </ul>
                <!-- .count -->
            </a>

            <div class="cd-cart">
                <div class="wrapper">
                    <header>
                        <h2>Cart</h2>
                        <span class="undo">Item removed. <a href="#0">Undo</a></span>
                    </header>

                    <div class="body">
                        <ul>

                            <!-- products added to the cart will be inserted here using JavaScript -->
                            <?php

                            if (isset($newarray)) {

                                for ($i = 0;
                                     $i < count($newarray);
                                     $i++) {
                                    $item[$i] = ($product->selectidproduct($newarray[$i]['id']));

                                    //    $item[$i][0]['url_image'];
                                    //  $item[$i][0]['price'];
                                    //$newarray[$i]['quantity'];
                                    ?>
                                    <li class="product">
                                        <input type="hidden" value="<?php echo $item[$i][0]['id_product'] ?>"
                                               class="idinput"
                                               id="id_product_checkout'+productId+'">

                                        <div class="product-image">
                                            <a href="#0">
                                                <img src="<?php echo $item[$i][0]['url_image']; ?>"
                                                     alt="placeholder"></a>
                                        </div>
                                        <div class="product-details"><h3>
                                                <a href="#0"><?php if (isset($item[$i][0]['name_product'])) {
                                                        echo $item[$i][0]['name_product'];
                                                    } ?></a></h3>
                                            <span class="price"><?php if (isset($item[$i][0]['price'])) {
                                                    echo $item[$i][0]['price'];
                                                }; ?>₫</span>

                                            <div class="actions"><a href="#0" class="delete-item">
                                                    Delete</a>
                                            </div>
                                            <div class="quantity">
                                                <label for="cd-product-'+ productId +'">Qty</label>

                                                <input id="cd-product1-'+ productId +'" class="inputput" type="number"
                                                       value="<?php echo $newarray[$i]['quantity']; ?>">
                                            </div>
                                        </div>
                                    </li>


                                    <?php
                                    $tong += $item[$i][0]['price'] * $newarray[$i]['quantity'];
                                };
                            };

                            ?>
                        </ul>
                    </div>

                    <footer>
                        <a href="" id="checkout" class="checkout"><em>Checkout - <span><?php if (isset($array)) {
                                        echo $tong;
                                    } else echo 0; ?></span>₫</em></a>
                    </footer>
                </div>
            </div>
            <!-- .cd-cart -->
        </div>
        <!-- cd-cart-container -->
    </div>
    <div class="bocContainer">
        <div class="container" style="font-size:12px;">
            <div class="col-xs-6">
                <ul style="">

                    <li class="listhead dropdown"><span
                            class="glyphicon glyphicon-user"></span><?php if (isset($_SESSION['user'])) { ?><a
                            href="adminpage/admin.php" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['user']; ?>
                        </a>
                        <ul class="dropdown-menu">


                            <li><a href="adminpage/admin.php">trang admin</a></li>
                            <li><a href="../control/logout.php">logout</a></li>
                        </ul>
                    </li>

                    <?php
                    }
                    else {
                        echo '<a href = "../view/login.php" >login</a >';
                    } ?></li>
                    <!--or <a href="#">register</a></li>-->
                    <li class="listhead"><a href="#">Currency</a></li>
                    <li class="" id="spanglyphicon"><a href="#">Ship <span class="glyphicon glyphicon-plane"</a></li>
                </ul>
            </div>
            <div class="col-xs-6 ">
                <ul style="float:right">
                    <!--<li class="listhead"><a href="#">MY Account</a></li>-->
                    <li class="listhead" id="spanglyphicon"><a href="#">
                            Wishlist</a></li>
                    <li class="shoppingcart" id="spanglyphicon"><a href="#"><span
                                class="glyphicon glyphicon-shopping-cart"></span>
                            Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bocContainer">

        <div class="container">
            <div class="col-xs-6 first-header">
                <a style="text-decoration: none; font-weight: 400; font-size:34px;" href="#">
                    <image style="vertical-align: middle" src="../lib/images/iconweb.png"></image>
                    Onlang Shop
                </a>
            </div>
            <div class="col-xs-6 second-header">


                <form class="form-group" action="#" style="height:79px;">
                    <div class="input-group">
                        <input type="text" class="form-control pull-right" ng-model="searchText"
                               style="width:100%; background-color: #e5e5e5; border-radius: 0px;"
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
    <div>
        <div class="bocContainer" id="navba">
            <div class="container">

                <ul class="nav navbar-nav">
                    <li><a href="" ng-click="select('null')">All</a></li>
                    <li ng-repeat="y in product_cat"><a href="" ng-click="select(y.id)">{{y.ten}}</a></li>
                    <!--  <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>

                              <li><a href="#">Separated link</a></li>

                              <li><a href="#">One more separated link</a></li>
                          </ul>
                      </li>-->
                </ul>
            </div>
        </div>
        <div class="bocContainer" id="duoinavba" style="padding-top:0">
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
        <div class="bocContainer">
            <div class="shop-items">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-6" ng-repeat="x in product | filter: searchText">
                            <!-- Restaurant Item -->
                            <div class="item">

                                <input type="hidden" id="id_product{{$index}}" value="{{x.id_product}}">
                                <!-- Item's image -->
                                <div class="bocimage">

                                    <img class="fuck" ng-click="modalimage($event,$index)" data-toggle="modal"
                                         data-target="#myModal" id="img{{$index}}" src="{{x.url_image}}" alt="">
                                    <input class="noidung" type="hidden" value="{{x.noidung}}"/>

                                </div>
                                <!-- Item details -->
                                <div class="item-dtls">
                                    <!-- product title -->
                                    <h4>
                                        <a href="chitietsanpham.php?id={{x.id_product}}" id="name{{$index}}">{{x.name_product}}</a>
                                    </h4>

                                    <!-- price -->
                                    <span class="price">{{x.price}}₫</span>
                                </div>

                                <!-- add to cart btn -->
                                <div class="ecom" style="
    background-color: #32c8de !important;">
                                    <a data-index="{{$index}}" data-price="{{x.price}}" data-name="{{x.name_product}}"
                                       data-id_product="{{x.id_product}}"
                                       data-image="{{x.url_image}}"
                                       class="btn addtocart">
                                        Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Mô tả</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="{{idsanphammodal}}">

                        <div class="col-md-5  " style="text-align: center">
                            <div class="bocimagemodal">
                                <img src="{{imageSanpham}}"
                                     style="vertical-align: middle; height:auto; max-width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-7 product_content">
                            <h4 style="padding-top: 20px;">Sản phẩm: <span>{{tensanpham}}</span></h4>

                            <p>{{noidungmodal}}</p>

                            <h1 class="cost"> {{giasanpham}}<span class="glyphicon ">₫
                                </span> <!--<small class="pre-cost">
                                    <span class="glyphicon glyphicon-usd">22</span></small>--></h1>

                            <div class="btn-ground">
                                <button type="button" class="btn btn-primary addtocart"
                                        data-price="{{giasanpham}}"
                                        data-name="{{tensanpham}}"
                                        data-id_product="{{idsanphammodal}}"
                                        data-image="{{imageSanpham}}"
                                    >
                                    <span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart
                                </button>
                            </div>
                            <div class="space-ten"></div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--
    <span>
        <span class="flycart">shopping cart</span>
    </span>-->
</div>

<script>
    $(function () {
        //cho modal vua` voi' kich thuoc' man` hinh`
        $('#myModal').on('show.bs.modal', function () {
            $('.modal .modal-body').css('overflow-y', 'auto');
            $('.modal .modal-body').css('max-height', $(window).height() * 0.7);
        });

        var navY = $('#navba').offset().top;
        var nav = $('#navba');

        var w = $(window);
        w.scroll(function () {
            var wtop = w.scrollTop();
//            $('#countY').text(wtop);
            if (wtop >= navY) {
                /*      $('.flycart').show();
                 */

                $('#navba').css({
                    top: 0,
                    position: 'fixed'
                });

                $('#duoinavba').css("padding-top",$('#navba').css("height"));
            }
            else {
                /*    $('.flycart').hide();
                 */

                $('#navba').css({

                    position: 'relative'

                });
                $('#duoinavba').css("padding-top",0);
            }

        });
    });
</script>
<script>

    var app = angular.module('app', []);
    b = 1;

    app.controller('con', function ($scope, $http) {


        $scope.modalimage = function ($event, $index) {
            var modal = $($event.currentTarget);
            //  alert(modal.parents('.item').child('.item-dtls').child('.price'+$index).text);
            $scope.idsanphammodal = modal.parents('.item').children('input').val();
            $scope.tensanpham = modal.parents('.item').children('.item-dtls').children('h4').children('a').text();
            $scope.imageSanpham = modal.attr('src');
            $scope.giasanpham = modal.parents('.item').children('.item-dtls').children('.price').text().replace('₫', '');
            $scope.noidungmodal = modal.next().val();
        };

        var index;
        var cartbtn;
        selectdm = function () {
            $http({
                method: 'GET',
                url: '../control/selectdm.php'
            }).then(function (ret) {
                items = ret.data;

                $scope.product_cat = items;

            });
        };
        selectdm();
        $scope.select = function (id="null") {

//            $scope.danhmucid = id;
            $http({

                method: 'GET',
                url: '../control/selectVay.php?idcat=' + id
            }).then(function (ret) {
                $scope.product = ret.data;
                //alert(JSON.stringify(ret.data,4,null));
            });
        };
        $scope.select();


        $('#checkout').on('click', function () {
            undo.removeClass('visible');
            cartList.find('.deleted').remove();
            var foo = [];
            $('.product').each(function (i) {
                foo[i] = {};
                foo[i]['id_product'] = $(this).find("input[class='idinput']").val();
                //alert($(this).find("input[class='idinput']").val());
                foo[i]['quantify'] = $(this).find("input[class='inputput']").val();
            });
            if (foo.length != 0) {
                $http({
                    method: "GET",
                    url: "../control/setsession.php",
                    params: foo
                }).then(function mySuccess(response) {
                    //$scope.myWelcome = response.data;
                    //alert(response.data);
                    location.href = "checkout.php";
                });
            }
        });


    });
</script>

<script src="../lib/js/cart.js"></script>

<div class="foter">
    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Lorem Ipsum </h3>
                        <ul>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Lorem Ipsum </h3>
                        <ul>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Lorem Ipsum </h3>
                        <ul>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                        <h3> Lorem Ipsum </h3>
                        <ul>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                            <li><a href="#"> Lorem Ipsum </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                        <h3> Lorem Ipsum </h3>
                        <ul>
                            <li>
                                <div class="input-append newsletter-box text-center">
                                    <input type="text" class="full text-center" placeholder="Email ">
                                    <button class="btn  bg-gray" type="button"> Lorem ipsum <i
                                            class="fa fa-long-arrow-right"> </i></button>
                                </div>
                            </li>
                        </ul>
                        <ul class="social">
                            <li><a href="#"> <i class=" fa fa-facebook"> </i> </a></li>
                            <li><a href="#"> <i class="fa fa-twitter"> </i> </a></li>
                            <li><a href="#"> <i class="fa fa-google-plus"> </i> </a></li>
                            <li><a href="#"> <i class="fa fa-pinterest"> </i> </a></li>
                            <li><a href="#"> <i class="fa fa-youtube"> </i> </a></li>
                        </ul>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>
        <!--/.footer-->

        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left"> Copyright &reg; Footer 2014. All right reserved. </p>

                <div class="pull-right">
                    <ul class="nav nav-pills payments">
                        <li><i class="fa fa-cc-visa"></i></li>
                        <li><i class="fa fa-cc-mastercard"></i></li>
                        <li><i class="fa fa-cc-amex"></i></li>
                        <li><i class="fa fa-cc-paypal"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.footer-bottom-->
    </footer>
</div>

</body>

</html>