 <?php   
 session_start();
 
 session_destroy();  
 header("location: pdo_login.php");  
 ?>  
