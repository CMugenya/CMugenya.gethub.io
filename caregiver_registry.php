<?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y h:i:s');
echo $date;
?>

<?php
//POP UP RECORDS
include ('connect.php');
$conn=mysqli_connect($hostname,$username,$password,$database_name);
$sql = "select entryno from register";
$result = mysqli_query($conn,$sql);
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>YF03 Study</title>
    <link rel="stylesheet" href="style.css">
    <script src="emp.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
</head>
<body class="background"> 
<br>
<a href="index.php"><img src="pics/home.png" alt="home" style="width:50px;height:50px;"></a>   
<a href="logout.php"><img src="pics/logout2.png" alt="home" style="width:80px;height:50px;" align="right"></a>
<h2>CAREGIVER REGISTRATION</h2>
<div class="details">
<form action="" method="POST">

<label><strong>CAREGIVER PARTICIPATING ?</strong></label>
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

    <label><strong>SUBJECT REF.ENTRY NO:</strong></label>
	<input type="text" name="refentryno" id="refentryno" required>
    <br><br><br>
	<label><strong>ID/PASSPORT:</strong></label>
	<input type="text" name="id_passport" id="id_passport" required>
    <br><br>
	<label><strong>FIRST NAME:</strong></label>
	<input type="text" name="fname" id="fname" required>
	<label><strong>MIDDLE NAME:</strong></label>
	<input type="text" name="mname" id="mname">
	<label><strong>SURNAME:</strong></label>
	<input type="text" name="sname" id="sname" required>
    <br><br>
    <label><strong>RESIDENCE:</strong></label>
	<input type="text" name="residence" id="Residence" required>
    <label><strong>RELATIONSHIP TO SUBJECT:</strong></label>
    <select id="Rship" name="rship" required>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Father">Father</option>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Mother">Mother</option>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Grandfather">Grandfather</option>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Grandmother">Grandmother</option>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Uncle">Uncle</option>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Aunt">Aunt</option>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Brother">Uncle</option>
            <option style="border: 0px solid; border-radius: 05px; font-size: 18px; box-shadow: 1px 1px 2px; height: 25px;" value="Sister">Aunt</option>
    </select>
    <br><br>
    <label><strong>PHONE NO:1:</strong> </label>
	<input type="text" name="contact1" id="contact1" required>
    <br><br>
	<label><strong>PHONE NO:2:</strong> </label>
	<input type="text" name="contact2" id="contact2">
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="addnew" value="Add Record">
    <input type="submit" name="update" value="Update Record">
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label><strong>BACK</strong> </label>
    <a href="childregistry.php"><img src="pics/back.png" alt="home" style="width:50px;height:50px;"></a>
<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
if(isset($_POST['addnew'])){
         $entryno = $_POST['entryno'];
         $refentryno = $_POST['refentryno'];
         $id_passport = $_POST['id_passport'];
         $fname = $_POST['fname'];
         $mname = $_POST['mname'];
         $sname = $_POST['sname'];
         $rship = $_POST['rship'];
         $residence = $_POST['residence'];
         $contact1 = $_POST['contact1'];
         $contact2 = $_POST['contact2'];

$query = "INSERT INTO caregiver (entryno,Refentryno,ID_passport,FirstName,MiddleName,Surname,Relationship,Location,Phone1,Phone2) values ('$entryno','$refentryno','$id_passport','$fname','$mname','$sname','$rship','$residence','$contact1','$contact2')";
$result = mysqli_query($con, $query);

    if($result)
    {
        echo '<script type="text/javascript"> alert("Record Updated Successfully") </script>';
    }else{
        echo '<script type="text/javascript"> alert("FAILED _ RECORD EXISTS!!!") </script>';
    }
    mysqli_close($con);
}
?>
</form>
</div>

<div class="summary">
<h2>RECORDS</h2>
<form class="search" method="GET" action="">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search records">
        <input type="submit" value="SEARCH">
        <br><br>
   <table>
        <tr>
        <th>Caregiver Participating Entry No</th>
        <th>Child Ref.Entry No</th>
        <th>ID/Passport</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Surname</th>
        <th>Relationship</th>
        <th>Residence</th>
        <th>Phone No 1</th>
        <th>Phone No 2</th>
        </tr>
<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
if(isset($_GET["search"]))
{
    $filtervalues = $_GET['search'];
    $query = "SELECT * FROM caregiver WHERE CONCAT(entryno,Refentryno,ID_passport,FirstName,MiddleName,Surname,Relationship,Location,Phone1,Phone2) LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
     foreach($query_run as $items)
     {
     ?> 
        <tr>
        <td><?= $items['entryno']; ?></td>
        <td><?= $items['Refentryno']; ?></td>
        <td><?= $items['ID_passport']; ?></td>
        <td><?= $items['FirstName']; ?></td>
        <td><?= $items['MiddleName']; ?></td>
        <td><?= $items['Surname']; ?></td>
        <td><?= $items['Relationship']; ?></td>
	    <td><?= $items['Location']; ?></td>
        <td><?= $items['Phone1']; ?></td>
        <td><?= $items['Phone2']; ?></td>
        </tr> 
     <?php
     }
    }
    else
    {
     ?>
          <tr>
          <td colspan="3">No record found</td>
          </tr> 
	<?php
    }
}
    ?>     
  </table>
  </form>
  </div>    
</body>
</html>


