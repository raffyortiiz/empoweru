<?php
$ses = $_SESSION["username"];
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["setdate"]))
{
 $d = $_POST["int_date"];
 $f =  $_POST["f_time"];
 $t = $_POST["t_time"];

$query = "UPDATE applicant SET int_date = '$d' , f_time = '$f' , t_time = '$t' WHERE appID = '".$_POST["appID"]."' ";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>