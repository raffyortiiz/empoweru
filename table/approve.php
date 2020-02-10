<?php
session_start();
$ses = $_SESSION["username"];
$connect = mysqli_connect("localhost", "root", "", "emp");
$n_control = 'Approved';
if(isset($_POST["appID"]))
{
 $query = "INSERT INTO approved (applicant_id,fname,lname,birthday,email,contact,education,experience,status) SELECT appID,fname, lname, birthday, email, contact, education, experience, status FROM applicant WHERE status = 'Approved'";
 	$query2 = "UPDATE applicant
              SET status = '$n_control'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
 else {
 }
}
if(isset($_POST["appID"])){

	$query2 = "UPDATE applicant
              SET status = '$n_control' , tagby = '$ses' WHERE appID = '".$_POST["appID"]."'";
               if(mysqli_query($connect, $query2))
 {
  echo 'Data Updated';
 }
 else {
 }

}
?> 