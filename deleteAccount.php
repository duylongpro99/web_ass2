<?php
    session_start();
    require './controller/userController.php';
    require_once './constant/url.php';
    header("Content-Type: application/json", true);
    $userController = new usersController();
    if(isset($_POST['userId'])){
        $accountId =  (int)$_POST['userId'];
        $result = $userController->deleteAccount($accountId);
            if($result){
                echo $result;
            }
            else{
                echo 0;
            }
    }
?>