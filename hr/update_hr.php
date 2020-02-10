<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE hr
 		   SET ".$_POST["column_name"]."='".$value."' WHERE hrID = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
  }
}
?>
