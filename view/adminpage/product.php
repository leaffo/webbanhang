<?php
session_start();
if (isset($_SESSION['user'])) {
        include'toppageadmin.php';
    ?>

                <div class="user-dashboard" ng-app="app" ng-controller="con">
                    <nav class="navbar navbar-default">
                        <ul class="nav navbar-nav">

                            <li><a class=""  ng-click="select('null')">All</a>
                            </li>
                            <li style="display:inline" ng-repeat="y in product_cat">
                                <a ng-click="select(y.id)">{{y.ten}}</a>

                            </li>
                        </ul>
                    </nav>
                    <div>
                        <h1>Thêm Hàng</h1>
                        <ul class="col-md-6">
                        <li><label for="name">Tên<input class="form-control" id="name" type="text"
                                                    placeholder="thêm"/></label>
                        </li><li><label for="price">Giá<input class="form-control" id="price" type="number" ng-model="priceT"
                                                     placeholder="thêm"/></label>
</li>
                       <li> <label for="url">Url ảnh<input class="form-control" id="url" type="text" ng-model="urlT"
                                                           placeholder="thêm"/>
                                                           <form enctype="multipart/form-data" ng-submit="uploadsubmit($event)" >
                                                           Choose Image : <input name="img" ng-model="myphoto" size="35" type="file"/><br/>
                                                           <button type="submit">Upload</button>
                                                           </form>
                         </label></li></ul>
                         <ul class="col-md-6"><li>
                        <label for="dm">Danh muc
                            <select ng-model="danhmucid" name="" id="dm" class="form-control">
                                <option ng-repeat="y in product_cat"
                                        value="{{y.id}}">
                                    {{y.ten}}
                                </option>
                            </select>
                        </label>
                        </li>
                        <li><label for="noidung"><textarea name="noidung" placeholder="Nội dung" id="noidung" cols="30" rows="10"></textarea></label>
                    </li>
                       <div> <button ng-click=them() class="btn btn-green">thêm</button></div>

                    </ul>
                    </div>

                    <hr/>
                    <form ng-repeat="x in product">
                        <label for="name{{$index}}">Tên</label>
                        <input id="name{{$index}}" type="text"
                               value="{{x.name_product}}"/>
                        <button ng-click="bool=!bool" class="btn">Chi tiết</button><button class="btn btn-danger" ng-click="xoa(x.id_product)">xóa</button>
                        <div ng-if="bool" class="fade1">
                            <label for="price{{$index}}">Giá</label>
                            <input id="price{{$index}}" type="number" class="form-control"
                                   value="{{x.price}}"/>
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
                            <label for="noidung"><textarea placeholder="Nội dung" name="noidung" id="noidung{{$index}}" cols="30" rows="10" >{{x.noidung}}</textarea></label>

                            <button class="btn btn-success"
                                    data-index="{{$index}}"
                                    ng-click="sua($event,x.id_product)">sửa
                            </button>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        var app = angular.module('app', []);
        app.controller('con', function ($scope, $http) {

            //action="control/uploadimage.php"
            $scope.uploadsubmit=function($event){
            var formimg=$event.currentTarget;


            $.ajax({
                type:'POST',
                url:'control/uploadimage.php',
                data: new FormData(formimg),
                cache:false,
                processData:false,
                contentType:false,
                success:function(res){
                      $('#url').val(res);


                       //alert(res);

                }
                });
            };


            selectdm = function () {
                $http({
                    method: 'GET',
                    url: 'control/selectdm.php'
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
                    url: 'control/selectVay.php?idcat=' + id
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
            var urlt=$('#url').val();
            var noidung=$('#noidung').val();
            var ten=$('#name').val();
            var pri=$('#price').val();
            var dmd=$('#dm option:selected').val();
                dataT = ({'name': ten, 'price':pri , 'url': urlt, 'dmcha': dmd,'noidung':noidung});
                alert(JSON.stringify(dataT));

                $http.post('control/themsp.php', dataT).then(function (ret) {
                    if (ret.data) {
                        alert(ret.data);
                        $scope.select($scope.danhmucid);
                    }
                    else alert('fuck');
                });
            };

            $scope.xoa = function (idxoa) {
            //alert(idxoa);
                $http.post('control/xoasp.php', {'id': idxoa}).then(function (ret) {
                    $scope.select($scope.danhmucid);
                });
            };
            $scope.sua = function ($event, id) {
                btn = $event.currentTarget;
                idd = $(btn).data('index');

                names = $('#name' + idd).val();
                prices = $('#price' + idd).val();
                urls = $('#url_image' + idd).val();
                dmcha = $('#dmcha' + idd).val();
                noidung=$('#noidung'+idd).val();
                dataSua = ({id: id, name: names, price: prices, url: urls, dmcha: dmcha,noidung:noidung});
                //alert(JSON.stringify(dataSua));
                $http.post('control/suasptable.php', dataSua).then(function (ret) {
                    //alert(ret.data);
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
    include('../../view/bottompage.php');
} else {
    header('Location:../index.php');
} ?>

