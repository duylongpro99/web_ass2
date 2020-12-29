<?php
require './controller/cartController.php';
$cartController = new cartController();
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $orderId = $_POST['id'];
    $result = $cartController->confirmOrderDone($orderId);
    if ($result) {
        header('location: adminnew.php');
    } else {
        echo "<script>alert('Can't confirm!!!')</script>";
    }
}