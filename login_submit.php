<?php
session_unset();
require_once './controller/userController.php';
require_once './constant/url.php';
require './common/userObj.php';
require './model/response/checkLoginResponse.php';
$userController = new usersController();
// require("./common/common.php");

$email = $_POST['e-mail'];
$password = $_POST['password'];
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
  $_SESSION['email'] = $email;
  $_SESSION['roleName'] = $loginResponse->roleName;
  header($url . 'index.php');
} else {
  echo "<script>alert('Login failed!!!')</script>";
}