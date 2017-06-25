<?php
include 'toppage.php';


?>

    <div ng-app="app" ng-controller="con">
        <div>
            <form>
                <table class="table" style="padding:0px; margin:0px">
                    <thead style="font-weight: bold">
                    <td>name</td>
                    <td>price</td>
                    <td>url_image</td>
                    <td></td>
                    </thead>

                    <tr>
                        <td><input id="" type="text"
                                   ng-model="nameT" placeholder="thêm"/></td>
                        <td><input id="" type="number"
                                   ng-model="priceT" placeholder="thêm"/></td>
                        <td><input id="" type="text"
                                   ng-model="urlT" placeholder="thêm"/></td>
                        <td>
                            <button ng-click=them() class="btn btn-green">thêm</button>
                        </td>
                    </tr>
                    <tr ng-repeat="x in product">

                        <td><input id="name{{$index}}" type="text"
                                   value="{{x.name_product}}"/></td>
                        <td><input id="price{{$index}}" type="number"
                                   value="{{x.price}}"
                                /></td>
                        <td><input id="url_image{{$index}}"
                                   type="text"
                                   value="{{x.url_image}}"
                                /></td>
                        <td>
                            <button class="btn btn-green"
                                    data-index="{{$index}}"
                                    ng-click="sua($event,x.id_product)">sửa
                            </button>
                            <button class="btn btn-danger" ng-click="xoa(x.id_product)">xóa</button>
                        </td>

                    </tr>
                </table>
            </form>
        </div>

    </div>




    <script src="../lib/js/angular.1.4.8.min.js"></script>

    <script src="../lib/js/jquery.3.2.1.min.js"></script>

    <script src="../lib/js/bootstrap.3.3.7.min.js"></script>
    <script>
        var app = angular.module('app', []);
        app.controller('con', function ($scope, $http) {
            select = function () {
                $http({
                    method: 'GET',
                    url: '../control/selectVay.php'
                }).then(function (ret) {
                    $scope.product = ret.data;
                });
            };
            select();
            $scope.them = function () {
                dataT = ({'name': $scope.nameT, 'price': $scope.priceT, 'url': $scope.urlT});
                $http.post(
                    '../control/themsptable.php', dataT).then(function (ret) {
                        if (ret.data) {
                            alert(ret.data);
                            select();
                        }
                        else alert('fuck');
                    });
            };

            $scope.xoa = function (id) {
                $http.post('../control/xoasp.php', {'id': id}).then(function (ret) {
                    select();
                });
            };
            $scope.sua = function ($event, id) {
                btn = $event.currentTarget;
                idd = $(btn).data('index');

                names = $('#name' + idd).val();
                prices = $('#price' + idd).val();
                urls = $('#url_image' + idd).val();
                dataSua = ({id: id, name: names, price: prices, url: urls});
                //alert(JSON.stringify(dataSua));
                $http.post('../control/suasp.php', dataSua).then(function (ret) {
                    alert(ret.data);
                });
            };
        });

    </script>

    <script>
        $(function () {

            $('body').on('click', "input", function () {
                $(this).select();
            });
        });
    </script>

<?php
include 'bottompage.php';
?>