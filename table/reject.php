<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
$control = 3;
$n_control = 'Rejected';
if(isset($_POST["appID"]))
{
 $query = "UPDATE applicant SET  status = '$n_control' WHERE appID = '".$_POST["appID"]."' ";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>