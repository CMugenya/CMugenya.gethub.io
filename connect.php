<?php
$hostname="localhost";
$username="root";
$password="";
$database_name="registration";

$conn=mysqli_connect($hostname,$username,$password,$database_name);
//check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());
}
?>