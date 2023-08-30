<?php
 
//set random name for the image, used time() for uniqueness
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
$filename =  time() . '.jpg';
$filepath = 'cam/';
if(!is_dir($filepath))
	mkdir($filepath);
if(isset($_FILES['webcam'])){	
	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
	$sql="Insert into camera(camera_upload)values('$filename')";
	$result=mysqli_query($con,$sql);
	echo $filepath.$filename;
}
?>
