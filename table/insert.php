<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
if(isset($_POST["fname"], $_POST["lname"],  $_POST["birthday"],  $_POST["gender"],
 $_POST["email"],  $_POST["contact"], $_POST["education"], $_POST["experience"]))
{
 $fname = mysqli_real_escape_string($connect, $_POST["fname"]);
 $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
 $birthday = mysqli_real_escape_string($connect, $_POST["birthday"]);
 $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $contact = mysqli_real_escape_string($connect, $_POST["contact"]);
 $education = mysqli_real_escape_string($connect, $_POST["education"]);
 $experience = mysqli_real_escape_string($connect, $_POST["experience"]);
 $status = mysqli_real_escape_string($connect, $_POST["status"]);
 $query = "INSERT INTO 
 	applicant (fname, lname, birthday, gender, email, contact, education, experience, status, tagby)
 	 VALUES 
 	 ('$fname', '$lname', '$birthday', '$gender', '$email', '$contact','$education', '$experience' , 
 	 'Pending')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>