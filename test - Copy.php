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
<form class="search" method="GET" action="">
        <input type="text" name="searchdata" value="<?php if(isset($_GET['searchdata'])){echo $_GET['searchdata']; } ?>" placeholder="Search records">
        <input type="submit" value="SEARCH">
        <br><br>
  
<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
if(isset($_GET["searchdata"]))
{
    $filtervalues = $_GET['searchdata'];
    $query = "SELECT * FROM register WHERE CONCAT (ScreenedDate,PID,ID_passport,BirthCertNo,BirthNotification,FirstName,MiddleName,SurName,Sex,DateBirth,Phone1,Phone2,Phone3,Photo) LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
     foreach($query_run as $items)
     {
     ?> 
<table>
        <tr>
        <th colspan="3">Study</th>
        <td colspan="6"><?= $items['ScreenedDate']; ?></td>
        </tr> 
        <tr>
        <th colspan="3">PID</th>
        <td colspan="6"><?= $items['PID']; ?></td>
        </tr>
        <tr>
	<th colspan="3">ID/Passport</th>
        <td colspan="6"><?= $items['ID_passport']; ?></td>
	</tr>
        <tr>
	<th colspan="3">First Name</th>
        <td colspan="6"><?= $items['BirthCertNo']; ?></td>
	</tr>
	<tr>
	<th colspan="3">First Name</th>
        <td colspan="6"><?= $items['BirthNotification']; ?></td>
	</tr>
        <tr>
	<th colspan="3">Middle Name</th>
        <td colspan="6"><?= $items['FirstName']; ?></td>
	</tr>
        <tr>
	<th colspan="3">Surname</th>
        <td colspan="6"><?= $items['MiddleName']; ?></td>
	</tr>
	<tr>
	<th colspan="3">Surname</th>
        <td colspan="6"><?= $items['SurName']; ?></td>
	</tr>
        <tr>
	<th colspan="3">Gender</th>
        <td colspan="6"><?= $items['Sex']; ?></td>
	</tr>
	<tr>
	<th colspan="3">Phone No 1</th>
        <td colspan="6"><?= $items['DateBirth']; ?></td>
	</tr>
        <tr>
	<th colspan="3">Phone No 1</th>
        <td colspan="6"><?= $items['Phone1']; ?></td>
	</tr>
        <tr>
	<th colspan="3">Phone No 2</th>
        <td colspan="6"><?= $items['Phone2']; ?></td>
	</tr>
        <tr>
	<th colspan="3">Phone No 3</th>
        <td colspan="6"><?= $items['Phone3']; ?></td>
        </tr> 
	<tr>
	<th colspan="3">Phone No 3</th>
      	<td colspan="6"><?php echo $row['Photo']; ?></td>                  
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