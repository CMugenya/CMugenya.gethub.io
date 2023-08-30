<?php
include ('connect.php');
$conn=mysqli_connect($hostname,$username,$password,$database_name);
$sql = "select PID from register";
$res = mysqli_query($conn,$sql);
?>

<html>
<head>
    <title>Gates MRI</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="js/fetchnDisp.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
<div><a href="index.html">HOME</a></div>
 <h2>GATES STUDY</h2> 
<form method="POST">
<h1>SUBJECT VISIT(S) ENTRY</h1>

<label><strong>Study Id:</strong></label>
<select id="PID" onchange="selectstudyid()">
   <?php while($rows = mysqli_fetch_array($res)){
   ?>
   <option value="<?php echo $rows['PID']; ?> " > <?php echo $rows['PID']; ?> </option>

   <?php 
     }
   ?>   
   </select>
   <br><br>
   <table>
     <thead>
         <th>Id/Passport</th>
         <th>FirstName</th>
         <th>MiddleName</th>
          <th>Surname</th>
         <th>Gender</th>
         <th>DOB</th>
         <th>Contact1</th>
        <th>Contact2</th>
         <th>Contact3</th>
       </thead>
   </table>
   <tbody id="ans">

   </tbody>	
</form>
</body>
</html>