<?php
require './controller/cartController.php';
$cartController = new cartController();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];

    $result = $cartController->removeCart($item_id, $user_id);
    if($result){
        header('location: products.php');
    }
    else{
        echo "<script>alert('Can't remove cart!!!')</script>";
    }
    header("location:cart.php");
}
