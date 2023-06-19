<?php 

session_start();
unset($_SESSION['ADMIN_ID']);
unset($_SESSION['ADMIN_FIRST_NAME']);
unset($_SESSION['ADMIN_LAST_NAME']);
unset($_SESSION['ADMIN_EMAIL']);
unset($_SESSION['ADMIN_USERNAME']);
unset($_SESSION['ADMIN_PASSWORD']);
header("location:login.php");

die;
