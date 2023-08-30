<?php
include ('connect.php');
if(!isset($_SESSION['Username'])){
header("location:login.php");
}
?>