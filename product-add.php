<?php
require_once './controller/productController.php';
$productController =  new ProductController();
$id = (int)$productController->getMaxIndexOfProduct() + 1;
$name = $_POST['name'];
$picture = $_POST['picture_link'];
$category = $_POST['category'];
$price = (int)$_POST['price'];

if($id && $name && $picture && $category && $price){
    $res = $productController->addProduct($id , $name , $picture , $category , $price);
    echo $res;
}
?>