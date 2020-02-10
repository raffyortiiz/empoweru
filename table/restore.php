<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
$control = 1;
$n_control = 'Pending';
if(isset($_POST["appID"]))
{
 $query = "UPDATE applicant SET control_id = '$control' , status = '$n_control' WHERE appID = '".$_POST["appID"]."' ";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>