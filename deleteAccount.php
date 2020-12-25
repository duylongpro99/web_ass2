<?php
    require './controller/userController.php';
    require_once './constant/url.php';
    header("Content-Type: application/json", true);
    $userController = new usersController();
    if(isset($_POST['userId'])){
        $accountId =  (int)$_POST['userId'];
        //echo $accountId;
        $result = $userController->deleteAccount($accountId);
        if($result){
            echo 1;
         }
         else{
             echo 0;
        }
    }
?>