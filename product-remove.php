<?php
require_once './controller/productController.php';
$productController =  new ProductController();
if($_POST['itemId']){
    $itemId = (int)$_POST['itemId'];
    $res = $productController->removeProduct($itemId);
    echo $res;
}
?>