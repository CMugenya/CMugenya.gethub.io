<?php
include ('connect.php');
$k = $_POST['PID'];
$k = trim($k);
$conn=mysqli_connect($hostname,$username,$password,$database_name);
$sql = "select * from register where PID='{$k}'";
$res = mysqli_query($con,$sql);
while($rows = mysqli_fetch_array($res)){
?>
    <tr>
         <td> <?php echo $rows['Id/Passport']; ?> </td>
         <td> <?php echo $rows['FirstName']; ?> </td>
         <td> <?php echo $rows['MiddleName']; ?> </td>
         <td> <?php echo $rows['Surname']; ?> </td>
         <td> <?php echo $rows['Gender']; ?> </td>
         <td> <?php echo $rows['DOB']; ?> </td>
         <td> <?php echo $rows['Contact1']; ?> </td>
         <td> <?php echo $rows['Contact2']; ?> </td>
         <td> <?php echo $rows['Contact3']; ?> </td>
    </tr>

<?php
}
echo $sql;
?>