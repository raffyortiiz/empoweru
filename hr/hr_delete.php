<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["hrID"]))
{
 $query = "DELETE FROM hr WHERE hrID = '".$_POST["hrID"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>