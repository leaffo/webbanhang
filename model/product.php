<?php
class product{
    public $db;
    function __construct($db){
        $this->db=$db;
    }

    function themproduct($ten,$price,$url,$dm){
            $sql="INSERT INTO `product`(`name_product`, `price`, `url_image`, `id_category`) VALUES ('$ten',$price,'$url',$dm)";
      return  $this->db->exec($sql);
    }
    function xoaproduct($id){
        $sql="DELETE FROM `product` WHERE `id_product`=$id";
        return $this->db->exec($sql);
    }
    function suaproduct($id,$ten,$price,$url){
        $sql="UPDATE `product` SET `name_product`='$ten',`price`=$price,`url_image`='$url' WHERE `id_product`=$id";
        return $this->db->exec($sql);
    }
}