<?php
session_start();
if (isset($_SESSION['roleName']) && $_SESSION['roleName'] == 'admin') {
    echo "YOu are admin,";
} else {
    echo "YOu are not admin,";
}