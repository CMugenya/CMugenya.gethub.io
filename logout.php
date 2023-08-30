<?php
include ('connect.php');
session_start();
unset($_SESSION["Username"]);
unset($_SESSION["Pass"]);
header("location:login.php");
die();
?>