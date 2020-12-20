<?php
    $con = mysqli_connect("localhost", "xyz", "9499", "ecommerce")
    or die(mysqli_error($con));
    if(!isset($_SESSION)){
      session_start();
    }