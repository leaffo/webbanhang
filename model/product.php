<?php

class product
{
    public $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function testthem($ten,$price, $url,$dm=1)
    {
        $sql = "INSERT INTO `product`( `name_product`, `price`,`url_image`, `id_category`)  VALUES ('$ten',$price,'$url',$dm)";
        return $this->db->exec($sql);
    }

   /* function themproduct($ten, $price, $url, $sale_price = 0, $dm = 1, $noibat = 1,
                         $banchay = 1, $thumb = "thumb", $donvi = "chiec",
                         $spmoi = 1,
                         $tenkhongdau = "tenkhongdau",
                         $des = "des", $hienthi = 1, $ngaytao = 0,
                         $xuatxu = "trungquoc", $id_size = 1, $noidung = "noidung")
    {
        $sql = "INSERT INTO `product`(
    `name_product`,`price`, `sale_price`, `url_image`,`id_category`,`noibat`,
     `banchay`,
     `thumb`, `donvi`, `spmoi`, `tenkhongdau`, `des`,
      `hienthi`, `ngaytao`, `ngaysua`,
      `xuatxu`, `id_size`, `noidung`) VALUES (
            '$ten',$price,$sale_price,'$url',$dm,$noibat,
    $banchay,'$thumb','$donvi',$spmoi,'$tenkhongdau',
    '$des',$hienthi,$ngaytao,'$xuatxu',$id_size,'$noidung')";
        return $this->db->exec($sql);
    }*/

    function xoaproduct($id)
    {
        $sql = "DELETE FROM `product` WHERE `id_product`=$id";
        return $this->db->exec($sql);
    }

    function suaproduct($id, $ten, $price, $url)
    {
        $sql = "UPDATE `product` SET `name_product`='$ten',`price`=$price,`url_image`='$url' WHERE `id_product`=$id";
        return $this->db->exec($sql);
    }


}