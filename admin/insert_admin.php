<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["username"], $_POST["password"], $_POST["fname"],
 $_POST["lname"], $_POST["type"], $_POST["contact"], $_POST["email"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["username"]);
 $password = mysqli_real_escape_string($connect, $_POST["password"]);
 $fname = mysqli_real_escape_string($connect, $_POST["fname"]);
 $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
 $type = mysqli_real_escape_string($connect, $_POST["type"]);
 $contact = mysqli_real_escape_string($connect, $_POST["contact"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);

 $query = "INSERT INTO 
 	admin (username, password, fname, lname, type,  contact, email)
 	 VALUES 
 	 ('$username', '$password', '$fname','$lname', '$type', '$contact', '$email')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>