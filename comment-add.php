<?php
function insert_comment($user_id, $item_id, $content)
{
    require("./common/common.php");
    $query = "INSERT INTO `comments`(`user_id`, `item_id`, `comment`) VALUES ('$user_id','$item_id','$content')";
    $ipresult = mysqli_query($con, $query) or die($mysqli_error($con));
}
if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['comment'])) {
    $item_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    insert_comment($user_id, $item_id, $_POST['comment']);
    echo $_POST['comment'];
    // $result = $cartController->cartAdd($item_id, $user_id);
    // if ($result) {
    header('location: product_detail.php?id=' . $_POST['id']);
    // } else {
    //     echo "<script>alert('Can't add comment!!!')</script>";
    // }
}