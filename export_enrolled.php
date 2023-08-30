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
        <th>EntryNo</th>
        <th>ParticipantID</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>ScreenedDate</th>
        <th>Consented Date</th>
        <th>Enrolment Status</th>
        <th>Vaccinated Date</th>
        <th>Cohort Assigned</th>
        </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["entryno"].'</td>                 
                         <td>'.$row["PID"].'</td> 
                         <td>'.$row["Sex"].'</td>
                         <td>'.$row["DateBirth"].'</td>
                         <td>'.$row["ScreenedDate"].'</td>
                         <td>'.$row["ConsentDate"].'</td>
                         <td>'.$row["EnrolStatus"].'</td>
                         <td>'.$row["VaccineDate"].'</td>
                         <td>'.$row["Cohort"].'</td>  
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