<?php
require_once('./common/userObj.php');
require_once('./controller/userController.php');

$newuser = new userObj(1,'long','1','HCM','longdaobk17@gmail.com','0854431654','SG TOWN');
$userController = new usersController();
$userController->insertAnUser($newuser);
echo "<script>console.log('done')</script>";
?>