<?php
include 'toppage.php';
?>

    <div class="container" ng-app="app" ng-controller="con">
        <div class="col-md-4">
            <h1>Danh Mục</h1>

            <p><a href="#" ng-click="select('null')">all</a></p>

            <div ng-repeat="y in product_cat">

                <p><a href="#" ng-click="select(y.id)">{{y.ten}}</a></p>
            </div>
        </div>

        <div class="col-md-8">
            <form><h1>Thêm</h1>


                <label for="name">Tên<input class="form-control" id="name" type="text" ng-model="nameT"
                                            placeholder="thêm"/></label>
                <label for="price">Giá<input class="form-control" id="price" type="number" ng-model="priceT"
                                             placeholder="thêm"/></label>

                <label for="url">Url ảnh<input class="form-control" id="url" type="text" ng-model="urlT"
                                               placeholder="thêm"/></label>
                <label for="dm">Danh muc
                    <select ng-model="danhmucid" name="" id="dm" class="form-control">
                        <option ng-repeat="y in product_cat"
                                value="{{y.id}}">
                            {{y.ten}}
                        </option>
                    </select>
                </label>

                <button ng-click=them() class="btn btn-green">thêm</button>
            </form>
            <hr>
            <form ng-repeat="x in product">
                <label for="name{{$index}}">Tên</label>
                <input id="name{{$index}}" type="text"
                       value="{{x.name_product}}"/>
                <button ng-click="bool=!bool" class="btn">Chi tiết</button>
                <div ng-if="bool" class="fade1">
                    <label for="price{{$index}}">Giá</label>
                    <input id="price{{$index}}" type="number" class="form-control"
                           value="{{x.price}}"
                        />
                    <label for="url_image{{$index}}">Link Ảnh</label>
                    <input id="url_image{{$index}}" class="form-control"
                           type="text"
                           value="{{x.url_image}}"
                        />
                    <label for="dmcha{{$index}}">Danh mục cha</label>
                    <select class="form-control" name="" id="dmcha{{$index}}">
                        <option ng-selected="ktracodmchakhong(z.id,x.id_category)" ng-repeat="z in product_cat"
                                value="{{z.id}}">{{z.ten}}
                        </option>
                    </select>
                    <button class="btn btn-green"
                            data-index="{{$index}}"
                            ng-click="sua($event,x.id_product)">sửa
                    </button>
                    <button class="btn btn-danger" ng-click="xoa(x.id_product)">xóa</button>

                </div>
            </form>

        </div>


    </div>

    <script>
        var app = angular.module('app', []);
        app.controller('con', function ($scope, $http) {
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

                $scope.danhmucid = id;
                $http({

                    method: 'GET',
                    url: '../control/selectVay.php?idcat=' + id
                }).then(function (ret) {
                    $scope.product = ret.data;

                });

            };
            $scope.select();

            $scope.ktracodmchakhong = function (x, y) {
                if (x == y) {
                    return true;
                }
                else {
                    return false;
                }
            };
            $scope.them = function () {
                dataT = ({'name': $scope.nameT, 'price': $scope.priceT, 'url': $scope.urlT, 'dmcha': $scope.danhmucid});
                 alert(JSON.stringify(dataT));

                $http.post('../control/themsp.php', dataT).then(function (ret) {
                    if (ret.data) {
                        alert(ret.data);
                        $scope.select($scope.danhmucid);
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
                dmcha = $('#dmcha' + idd).val();
                dataSua = ({id: id, name: names, price: prices, url: urls, dmcha: dmcha});
                alert(JSON.stringify(dataSua));
                $http.post('../control/suasptable.php', dataSua).then(function (ret) {
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