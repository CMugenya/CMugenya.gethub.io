<?php
include ('connect.php');
$conn=mysqli_connect($hostname,$username,$password,$database_name);
$k = $_POST["x"];
$sql = "select * from register where entryno ={$k}";
$result = mysqli_query($conn,$sql);
while($rows = mysqli_fetch_array($result)){
	$data['id_passport'] = $rows["ID_passport"];
	$data['fname'] = $rows["FirstName"];
	$data['mname'] = $rows["MiddleName"];
	$data['sname'] = $rows["SurName"];
	$data['residence'] = $rows["Location"];
	$data['contact1'] = $rows["Phone1"];
	$data['contact2'] = $rows["Phone2"];
}

echo json_encode($data);

?>



