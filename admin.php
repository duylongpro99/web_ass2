<?php
    session_start();
    if(!isset($_SESSION['roleName']) ){
        echo $_SESSION['roleName'];
    }
    else{
        echo "YOu are not admin,";
    }
?>