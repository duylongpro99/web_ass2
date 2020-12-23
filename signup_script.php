<?php

  //require("./common/common.php");
  session_unset();
  require_once './controller/userController.php';
  require_once './controller/userrolesController.php';
  require_once './constant/url.php';
  require './common/userObj.php';
  require './common/userRolesObj.php';
  $userController = new usersController();
  $userroleController = new userrolesController();

  $newName = $_POST['name'];
  $newemail = $_POST['email'];
  $newPassword = $_POST['password'];
  $newContact = $_POST['contact'];
  $newCity = $_POST['city'];
  $newAddress = $_POST['address'];
  $newId = $userController->getMaxIndex() + 1;  
  $newUser = new userObj($newId, $newName, $newPassword, $newCity, $newemail, $newContact, $newAddress);
  $newUserRoleId = $userroleController->getMaxIndex() + 1;

  $doneUser  = $userController->insert($newUser);
  if($doneUser > 0){
    $newUserRole = new userRolesObj($newUserRoleId, $doneUser, 3);
    $doneUserRole = $userroleController->insert($newUserRole);
    if($doneUserRole > 0){
      header($url.'login.php');
    }
  }



// Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
// $name = $_POST['name'];
// $name = mysqli_real_escape_string($con, $name);

// $email = $_POST['email'];
// $email = mysqli_real_escape_string($con, $email);

// $password = $_POST['password'];
// $password = mysqli_real_escape_string($con, $password);
// $password = MD5($password);

// $contact = $_POST['contact'];
// $contact = mysqli_real_escape_string($con, $contact);

// $city = $_POST['city'];
// $city = mysqli_real_escape_string($con, $city);

// $address = $_POST['address'];
// $address = mysqli_real_escape_string($con, $address);

// $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
// $regex_num = "/^[789][0-9]{9}$/";

// $query = "SELECT * FROM users WHERE email='$email'";
// $result = mysqli_query($con, $query) or die($mysqli_error($con));
// $num = mysqli_num_rows($result);

// if ($num != 0) {
//   $m = "<span class='red'>Email Already Exists</span>";
//   header('location: signup.php?m1=' . $m);
// } else if (!preg_match($regex_email, $email)) {
//   $m = "<span class='red'>Not a valid Email Id</span>";
//   header('location: signup.php?m1=' . $m);
// } else {

//   $query = "INSERT INTO users(name, email, password, contact, city, address)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "','" . $city . "','" . $address . "')";
//   mysqli_query($con, $query) or die(mysqli_error($con));
//   $user_id = mysqli_insert_id($con);
//   $_SESSION['email'] = $email;
//   $_SESSION['user_id'] = $user_id;
//   header('location: products.php');
// }
?>