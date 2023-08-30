<?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('d-m-y h:i:s');
echo $date;
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>YF03 Study</title>
    <link rel="stylesheet" href="style.css">
<!-- Required library for webcam -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>

</head>

<body class="background">`
<br>
<a href="index.php"><img src="pics/home.png" alt="home" style="width:50px;height:50px;"></a>   
<a href="logout.php"><img src="pics/logout2.png" alt="home" style="width:80px;height:50px;" align="right"></a> 

<div class="verify">
<h2>VERIFICATION</h2>
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
        <tr>
        <th colspan="3">SCREENED DATE</th>
        <td colspan="6"><?= $row['ScreenedDate']; ?></td>
        </tr> 
        <tr>
        <th colspan="3">PID</th>
        <td colspan="6"><?= $row['PID']; ?></td>
        </tr>
        <tr>
	<th colspan="3">ID/PASSPORT</th>
        <td colspan="6"><?= $row['ID_passport']; ?></td>
	</tr>
        <tr>
	<th colspan="3">BIRTH CERT NO</th>
        <td colspan="6"><?= $row['BirthCertNo']; ?></td>
	</tr>
	<tr>
	<th colspan="3">BIRTH NOTIFICATION</th>
        <td colspan="6"><?= $row['BirthNotification']; ?></td>
	</tr>
        <tr>
	<th colspan="3">FIRST NAME</th>
        <td colspan="6"><?= $row['FirstName']; ?></td>
	</tr>
        <tr>
	<th colspan="3">MIDDLE NAME</th>
        <td colspan="6"><?= $row['MiddleName']; ?></td>
	</tr>
	<tr>
	<th colspan="3">SURNAME</th>
        <td colspan="6"><?= $row['SurName']; ?></td>
	</tr>
        <tr>
	<th colspan="3">GENDER</th>
        <td colspan="6"><?= $row['Sex']; ?></td>
	</tr>
	<tr>
	<th colspan="3">DATE OF BIRTH 1</th>
        <td colspan="6"><?= $row['DateBirth']; ?></td>
	</tr>
        <tr>
	<th colspan="3">PHONE NO 1</th>
        <td colspan="6"><?= $row['Phone1']; ?></td>
	</tr>
        <tr>
	<th colspan="3">PHONE NO 2</th>
        <td colspan="6"><?= $row['Phone2']; ?></td>
	</tr>
        <tr>
	<th colspan="3">PHONE NO 3</th>
        <td colspan="6"><?= $row['Phone3']; ?></td>
        </tr> 
        <tr>
	<th colspan="3">PHOTO</th>
      	<td colspan="6"><?php echo '<img src="data:image;base64,'.base64_encode($row['Photo']) ?>"/></td>                 
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
    ?>     
  </table>
  </form>
  </div>
</body>
</html>