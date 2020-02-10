<?php
$con = mysqli_connect('localhost', 'root', '','emp');
if (!$con){
    die("Database Connection Failed" . mysqli_error($con));
}
$select_db = mysqli_select_db($con,'emp');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($con));
}
?>