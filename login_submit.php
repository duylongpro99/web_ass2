<?php
session_unset();
require_once './controller/userController.php';
require_once './constant/url.php';
require './common/userObj.php';
require './model/response/checkLoginResponse.php';
$userController = new usersController();
// require("./common/common.php");

$email = $_POST['e-mail'];
$password =  $_POST['password'];
$checkUser  = new userObj(0, '', $password, '', $email, '', '');
$data = $userController->checkInLogin($checkUser);

if ($data != null) {
  $loginResponse = new checkLoginResponse(
    $data["userId"],
    $data["userName"],
    $data["roleName"],
    $data["roleId"],
    $data["password"],
    $data["email"],
    $data["contact"],
    $data["city"],
    $data["address"]
  );
  $permissionList = $userController->getPermissionsOfUser($loginResponse->userId);
  foreach ($permissionList as $value) {
    $_SESSION[strval($value)] = strval($value);
  }
  $_SESSION['email'] = strval($email);
  $_SESSION['user_id'] = strval($loginResponse->userId);
  $_SESSION['roleName'] = strval($loginResponse->roleName);
  if ($loginResponse->roleName == 'admin') {
    setcookie('userId', $loginResponse->userId, time() + (86400), "/");
    header($url . 'admin.php');
  } else {
    header($url . 'index.php');
  }
} else {
  header($url . 'login.php');
}