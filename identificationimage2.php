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
	<td><strong>Enrolment Status:</strong></td>
	<td>
	<select id="enrolstatus" name="enrolstatus">
	        <option value="">......Select Status.....</option>
            <option value="Randomised & Vaccinated">Randomised & Vaccinated</option>
            <option value="Randomised & not Vaccinated">Randomised & not Vaccinated</option>
			<option value="Screenfailure">Screenfailure</option>
    </select>
	</td>
	</tr>
	<tr>
	<td><strong>Participant ID:</strong></td>
	<td><input type="text" name="pid" id="pid" placeholder="enter assigned number"></td>
    </tr>
	<tr>
	<td><strong>Consented Date:</strong></td>
	<td><input type="date" name="consentdate" id="consentdate"></td>
	</tr>
	<tr>
	<td><strong>Vaccinated Date:</strong></td>
	<td><input type="date" name="vaccinedate" id="vaccinedate"></td>
    </tr>
	<tr>
	<td><strong>Cohort Assigned:</strong></td>
	<td>
	<select id="cohort" name="cohort">
	        <option value="">......Select Cohort .....</option>
            <option value="Main">Main</option>
			<option value="Reactogenicity">Reactogenicity</option>
    </select>
	</td>
	</tr>
</table>
<br>
<input type="submit" name="update" value="Update Record">

<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
if(isset($_POST['update'])){

$id = $_POST['entryno'];

$query = "UPDATE register SET ScreenedDate='$_POST[scrnvstdate]',ID_passport='$_POST[id_passport]',BirthCertNo='$_POST[birthcertno]',BirthNotification='$_POST[birthnotification]',FirstName='$_POST[fname]',MiddleName='$_POST[mname]',SurName='$_POST[sname]',Sex='$_POST[gender]',DateBirth='$_POST[dob]',Location='$_POST[residence]',Phone1='$_POST[contact1]',Phone2='$_POST[contact2]',Phone3='$_POST[contact3]',EnrolStatus='$_POST[enrolstatus]',PID='$_POST[pid]',ConsentDate='$_POST[consentdate]',VaccineDate='$_POST[vaccinedate]',Cohort='$_POST[cohort]' where entryno='$_POST[entryno]'";
$query_run = mysqli_query($con, $query);

if($query_run)
{
	echo '<script type="text/javascript"> alert("Data updated") </script>';
}
else
{
	echo '<script type="text/javascript"> alert("Not updated") </script>';
}
}
?>
</div>
</form>


<div class="col3">
<form method="POST">
    <input type="text" name="id" placeholder="Enter Subject Entry No">
    <input type="submit" name="search" value="SEARCH">
   
<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");

if(isset($_POST['search']))
{
    $id = $_POST['id'];

    $query = "SELECT * FROM register WHERE PID='$id' "; 
	$query_run = mysqli_query($con,$query);
	
	while($row = mysqli_fetch_array($query_run))
{
?>

<table>
 <td><?php echo '<img src="data:image;base64,'.base64_encode($row['Photo']) ?>"/></td>
</table>
<?php
}
}
?>
</form>
</div>

</body>
</html>