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
<body class="background"> 
<br>
<a href="index.php"><img src="pics/home.png" alt="home" style="width:50px;height:50px;"></a>   
<a href="logout.php"><img src="pics/logout2.png" alt="home" style="width:80px;height:50px;" align="right"></a>
<div class="verify">
<h2>VERIFICATION</h2>
<form class="search" method="GET" action="">
        <input type="text" name="searchdata" value="<?php if(isset($_GET['searchdata'])){echo $_GET['searchdata']; } ?>" placeholder="Search records">
        <input type="submit" value="SEARCH">
        <br><br>
   <table>
        <tr>
        <th>Study</th>
        <th>PID</th>
        <th>ID/Passport</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Surname</th>
        <th>Gender</th>
        <th>Phone No 1</th>
        <th>Phone No 2</th>
        <th>Phone No 3</th>
        </tr>
<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
if(isset($_GET["searchdata"]))
{
    $filtervalues = $_GET['searchdata'];
    $query = "SELECT * FROM studies WHERE CONCAT (study,pid,id_passport,fname,mname,sname,gender,contact1,contact2,contact3) LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
     foreach($query_run as $items)
     {
     ?> 
        <tr>
        <td><?= $items['study']; ?></td>
        <td><?= $items['pid']; ?></td>
        <td><?= $items['id_passport']; ?></td>
        <td><?= $items['fname']; ?></td>
        <td><?= $items['mname']; ?></td>
        <td><?= $items['sname']; ?></td>
        <td><?= $items['gender']; ?></td>
        <td><?= $items['contact1']; ?></td>
        <td><?= $items['contact2']; ?></td>
        <td><?= $items['contact3']; ?></td>
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

<h2>CHILD REGISTRATION</h2>
<div class="details">
<form action="" method="POST">
<label><strong>DATE:</strong></label>
	<input type="datetime-local" name="scrnvstdate" id="scrnvstdate" required>
    <label><strong>ENTRY NO:</strong></label>
	<input type="text" name="entryno" id="Entryno" required>
    <br><br><br>
	<label><strong>BIRTH CERTIFICATE NO:</strong></label>
	<input type="text" name="birthcertno" id="Birthcertno">
    <label><strong>NOTIFICATION NO:</strong></label>
	<input type="text" name="birthnotification" id="Birthnotification">
    <br><br>
	<label><strong>FIRST NAME:</strong></label>
	<input type="text" name="fname" id="Fname" required>
	<label><strong>MIDDLE NAME:</strong></label>
	<input type="text" name="mname" id="Mname">
	<label><strong>SURNAME:</strong></label>
	<input type="text" name="sname" id="Sname">
    <br><br>
	<label><strong>GENDER:</strong></label>
    <select id="Gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label><strong>DATE OF BIRTH:</strong></label>
	<input type="date" name="dob" id="Dob" required>
    <label><strong>Upload Image:</strong> </label>
	<input type="file" name="image" id="image">
<br><br>
  <div class="container">	
  <div class="row">
	<div class="col1">
		<label>Capture live photo</label>
		<div id="my_camera" class="pre_capture_frame" ></div>
		<input type="hidden" name="captured_image_data" id="captured_image_data">
		<br>
		<input type="button" class="btn btn-info btn-round btn-file" value="Take Snapshot" onClick="take_snapshot()">	
	</div>
	<div class="col3">
		<label>Result</label>
		<div id="results" >
			<img style="width: 350px;" class="after_capture_frame" src="image_placeholder.jpg" />
		</div>
		<br>
		<button type="button" class="btn btn-success" onclick="saveSnap()">Save Picture</button>
	</div>	
  </div><!--  end row -->
</div><!-- end container -->
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="addnew" value="Add Record">
    <input type="submit" name="update" value="Update Record">
    <label><strong>BACK</strong> </label>
    <a href="register.html"><img src="pics/back.png" alt="home" style="width:50px;height:50px;"></a>


<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
if(isset($_POST['addnew'])){
         $scrnvstdate = $_POST['scrnvstdate'];
         $entryno = $_POST['entryno'];
         $birthcertno = $_POST['birthcertno'];
         $birthnotification = $_POST['birthnotification'];
         $fname = $_POST['fname'];
         $mname = $_POST['mname'];
         $sname = $_POST['sname'];
         $gender = $_POST['gender'];
         $dob = $_POST['dob'];

$insert = "INSERT INTO register (ScreenedDate,entryno,BirthCertNo,BirthNotification,FirstName,MiddleName,SurName,Sex,DateBirth) values ('$scrnvstdate','$entryno','$birthcertno','$birthnotification','$fname','$mname','$sname','$gender','$dob')";
$query = mysqli_query($con, $insert) or die (mysqli_error($con));
    if($query==1)
    {
        $ins="INSERT INTO childregister (ScreenedDate,entryno,BirthCertNo,BirthNotification,FirstName,MiddleName,SurName,Sex,DateBirth) values ('$scrnvstdate','$entryno','$birthcertno','$birthnotification','$fname','$mname','$sname','$gender','$dob')";
        $query = mysqli_query($con, $ins) or die (mysqli_error($con));
        if($query==1)
        {
        echo '<script type="text/javascript"> alert("Record Updated Successfully") </script>';
    }else{
        echo '<script type="text/javascript"> alert("FAILED _ RECORD EXISTS!!!") </script>';
    }
    mysqli_close($con);
}
}
?>
</form>
</div>

<form action="caregiver_registry.php">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="caregiver_registry.php"><button class="other">Register Caregiver Details</button></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="">
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
        <th>Participant_ID</th>
        <th>Screened Date</th>
        <th>Birth Certificate No</th>
        <th>Birth Notification No</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Surname</th>
        <th>Gender</th>
        <th>DOB</th>
	<th>Photo</th>
        </tr>
<?php
include ('connect.php');
$con = mysqli_connect("localhost","root","","registration");
if(isset($_GET["search"]))
{
    $filtervalues = $_GET['search'];
    $query = "SELECT * FROM register WHERE CONCAT(PID,ScreenedDate,BirthCertNo,BirthNotification,FirstName,MiddleName,SurName,Sex,DateBirth) LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
     foreach($query_run as $items)
     {
     ?> 
        <tr>
        <td><?= $items['PID']; ?></td>
        <td><?= $items['ScreenedDate']; ?></td>
        <td><?= $items['BirthCertNo']; ?></td>
        <td><?= $items['BirthNotification']; ?></td>
        <td><?= $items['FirstName']; ?></td>
        <td><?= $items['MiddleName']; ?></td>
        <td><?= $items['SurName']; ?></td>
        <td><?= $items['Sex']; ?></td>
        <td><?= $items['DateBirth']; ?></td>
	<td colspan="6"><?php echo '<img src="data:image;base64,'.base64_encode($items['Photo']) ?>"/></td>
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
  <script language="JavaScript">
	 // Configure a few settings and attach camera 250x187
	 Webcam.set({
	  width: 350,
	  height: 287,
	  image_format: 'jpeg',
	  jpeg_quality: 90
	 });	 
	 Webcam.attach( '#my_camera' );
	
	function take_snapshot() {
	 // play sound effect
	 //shutter.play();
	 // take snapshot and get image data
	 Webcam.snap( function(data_uri) {
	 // display results in page
	 document.getElementById('results').innerHTML = 
	  '<img class="after_capture_frame" src="'+data_uri+'"/>';
	 $("#captured_image_data").val(data_uri);
	 });	 
	}

	function saveSnap(){
	var base64data = $("#captured_image_data").val();
	 $.ajax({
			type: "POST",
			dataType: "json",
			url: "capture_image_upload.php",
			data: {image: base64data},
			success: function(data) { 
				alert(data);
			}
		});
	}
</script>
</body>
</html>


