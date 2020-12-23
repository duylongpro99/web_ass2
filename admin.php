<?php
    session_start();
    if(isset($_SESSION['roleName']) ){
        echo "you are admin";
    }
    else{
        echo "YOu are not admin,";
    }
?>