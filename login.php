<?php
session_start();
include ('connect.php');
?>

<html>
<head>
<title>Login Form</title>
 <link rel="stylesheet" href="style.css" />
</head>
<body class="sregistry">
<div class="login">
<form method="post">
<h3>LOG IN</h3>
<label>Username:</label>
<input type="text" name="Username" id="username" placeholder="enter your username" required>
<br><br>
<label>Password:</label>
<input type="password" name="Pass" id="password" placeholder="enter your password">
<br><br>
<input type="submit" name="submit" value="LOGIN">
</form>
</div>

<?php
if(isset($_POST['submit'])){
    $Username = $_POST['Username'];
    $Pass = $_POST['Pass'];

$select = mysqli_query($conn, "SELECT * FROM login WHERE Username = '$Username' AND Pass = '$Pass'");
$row = mysqli_fetch_array($select);

if(is_array($row)){
    $_SESSION["Username"] = $row['Username'];
    $_SESSION["Pass"] = $row['Pass'];
}else{
    echo "Login Failed";

}
}
if(isset($_SESSION["Username"])){
    header("location:index.php");
}
?>
</body>
</html>