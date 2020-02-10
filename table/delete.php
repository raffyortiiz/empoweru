<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["appID"]))
{
 $query = "DELETE FROM applicant WHERE appID = '".$_POST["appID"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>