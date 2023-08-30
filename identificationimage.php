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
    <title>YW03</title>
    <link rel="stylesheet" href="style.css" />
    <script src="js/emp.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
</head>
<body class="background">
<br>
<a href="index.php"><img src="pics/home.png" alt="home" style="width:50px;height:50px;"></a>   
<a href="logout.php"><img src="pics/logout2.png" alt="home" style="width:80px;height:50px;" align="right"></a> 
 <h1>SUBJECT IDENTIFICATION</h1> 
 <div class="col1">
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
	<td><strong>Screened Date:</strong></td>
	<td><input type="text" name="scrnvstdate" id="scrnvstdate"></td>
	<td><strong>Id/Passport:</strong></td>
	<td><input type="text" name="id_passport" id="id_passport"></td>
	</tr>
	<tr>
	<td><strong>Birth Cert No:</strong></td>
	<td><input type="text" name="birthcertno" id="birthcertno"></td>
	<td><strong>Notification No:</strong></td>
	<td><input type="text" name="birthnotification" id="birthnotification"></td>
	</tr>
	<tr>
	<td><strong>First Name:</strong></td>
	<td><input type="text" name="fname" id="fname"></td>
	<td><strong>Middle Name:</strong></td>
	<td><input type="text" name="mname" id="mname"></td>
	</tr>
	<tr>
	<td><strong>Surname:</strong></td>
	<td><input type="text" name="sname" id="sname"></td>
	<td><strong>Gender:</strong></td>
	<td><input type="text" name="gender" id="gender"></td>
	</tr>
	<tr>
    <td><strong>Date of Birth:</strong></td>
	<td><input type="text" name="dob" id="dob"></td>
	<td><strong>Residence:</strong></td>
	<td><input type="text" name="residence" id="residence"></td>
    </tr>
	<tr>
    <td><strong>Phone1:</strong></td>
	<td><input type="text" name="contact1" id="contact1"></td>
	<td><strong>Phone2:</strong></td>
	<td><input type="text" name="contact2" id="contact2"></td>
    </tr>
	<tr>
	<td><strong>Phone3:</strong></td>
	<td><input type="text" name="contact3" id="contact3"></td>
    </tr>
	<tr>
	<td><strong>Profile:</strong></td>
	<td colspan="3"><?php echo '<img src="data:image;base64,'.base64_encode($row['Photo']) ?>"/></td>
    </tr>

</table>
<br>



 


</form>
</div>

</body>
</html>