<?php
//POP UP RECORDS
include ('connect.php');
$conn=mysqli_connect($hostname,$username,$password,$database_name);
$sql = "select entryno from register";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Gates MRI</title>
    <link rel="stylesheet" href="style.css" />
    <script src="emp.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
</head>
<body>
    <div><a href="index.html">HOME</a></div>
 <h1>GATES STUDY</h1> 
<form method="POST">
<table>	
<tr>
<td><strong>Entry No:</strong></td>
<td>
<select name="entryno" id="entryno" onchange="fetchemp()">
	<option value="">Select Entry No</option>
	<?php
	     while($rows = mysqli_fetch_array($result)){
		   $k = $rows['entryno'];
			echo '<option value="'.$k.'">'.$k.'</option>';
			  } 
			  ?>
</select>
</td>
</tr>
  <script>
    $("#entryno").chosen();
    </script>
			
			<tr>	
			<td><strong>Date:</strong></td>
			<td><input type="text" name="scrnvstdate" id="Scrnvstdate"></td>
			</tr>
			<tr>
			<td><strong>Id/Passport:</strong></td>
			<td><input type="text" name="id_passport" id="Id_passport"></td>
		    </tr>
			<tr>
			<td><strong>First Name:</strong></td>
			<td><input type="text" name="fname" id="fname"></td>
			</tr>
			<tr>
			<td><strong>Middle Name:</strong></td>
			<td><input type="text" name="mname" id="mname"></td>
			</tr>
			<tr>
			<td><strong>Surname:</strong></td>
			<td><input type="text" name="sname" id="sname"></td>
            </tr>
			<tr>
			<td><strong>Gender:</strong></td>
			<td><input type="text" name="gender" id="gender"></td>
			</tr>
			<tr>
		    <td><strong>Date of Birth:</strong></td>
			<td><input type="text" name="dob" id="dob"></td>
            </tr>
			<tr>
			<td><strong>Residence:</strong></td>
			<td><input type="text" name="residence" id="residence"></td>
            </tr>
			<tr>
		    <td><strong>Contact1:</strong></td>
			<td><input type="text" name="contact1" id="contact1"></td>
            </tr>
			<tr>
			<td><strong>Contact2:</strong></td>
			<td><input type="text" name="contact2" id="contact2"></td>
            </tr>
			<tr>
			<td><strong>Contact3:</strong></td>
			<td><input type="text" name="contact3" id="contact3"></td>
            </tr>
			<tr>
			</table>
</form>
</body>
</html>