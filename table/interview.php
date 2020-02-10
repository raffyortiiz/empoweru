<?php
$connect = mysqli_connect("localhost", "root", "", "emp");
$n_control = 'For Interview';
if(isset($_POST["appID"])){

	$query2 = "UPDATE applicant
              SET status = '$n_control' WHERE appID = '".$_POST["appID"]."' ";
               if(mysqli_query($connect, $query2))
 {
  echo 'Data Updated';
 }
 else {
 }

}
?> 