<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM admin WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>