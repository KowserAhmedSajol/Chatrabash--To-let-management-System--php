<?php 

session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['EMAIL']);
unset($_SESSION['USER_F_NAME']);
unset($_SESSION['PHONE']);
unset($_SESSION['PASSWORD']);
header("location:index.php");

die;


