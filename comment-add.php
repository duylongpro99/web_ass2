<?php
require_once './controller/productController.php';
$productController =  new ProductController();
if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['comment'])) {
    $item_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $result = $productController->insert_comment($user_id, $item_id, $_POST['comment']);
    echo $result;
    // $result = $cartController->cartAdd($item_id, $user_id);
    // if ($result) {
    // } else {
    //     echo "<script>alert('Can't add comment!!!')</script>";
    // }
}
?>