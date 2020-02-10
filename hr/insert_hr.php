<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["username"], $_POST["password"],  $_POST["type"],  $_POST["fname"],
 $_POST["lname"],  $_POST["contact"], $_POST["email"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["username"]);
 $password = mysqli_real_escape_string($connect, $_POST["password"]);
 $type = mysqli_real_escape_string($connect, $_POST["type"]);
 $fname = mysqli_real_escape_string($connect, $_POST["fname"]);
 $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
 $contact = mysqli_real_escape_string($connect, $_POST["contact"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);

 $query = "INSERT INTO 
 	hr (username, password, type, fname, lname,  contact, email)
 	 VALUES 
 	 ('$username', '$password', '$type', '$fname','$lname', '$contact', '$email')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>