<?php  
include ('connect.php');
$connect = mysqli_connect("localhost", "root", "", "registration");

$output = "";

if(isset($_POST["export"]))
{
 $query = "SELECT * FROM register";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
        <tr>    
        <th>Screened Date</th>
        <th>EntryNo</th>
        <th>ID/Passport</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Surname</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Residence</th>
        <th>Contact1</th>
        <th>Contact2</th>
        <th>Contact3</th>

        </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["ScreenedDate"].'</td>  
                         <td>'.$row["entryno"].'</td>
                         <td>'.$row["ID_passport"].'</td>
                         <td>'.$row["FirstName"].'</td>  
                         <td>'.$row["MiddleName"].'</td>  
                         <td>'.$row["SurName"].'</td>  
                         <td>'.$row["Sex"].'</td> 
                         <td>'.$row["DateBirth"].'</td>  
                         <td>'.$row["Location"].'</td>
                         <td>'.$row["Phone1"].'</td>  
                         <td>'.$row["Phone2"].'</td> 
                         <td>'.$row["Phone3"].'</td> 
                    </tr>
   ';
  }
  $output .= '</table>';     
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>