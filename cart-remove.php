<?php
require './controller/cartController.php';
$cartController = new cartController();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    $result = $cartController->removeCart($item_id, $user_id);
    if(!$result){
        echo "<script>alert('Can't remove cart!!!')</script>";
    }
    if($_GET['shop']){
        header('location: products.php');
    }else{

        header("location:cart.php");
    }
}
