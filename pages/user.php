<?php
session_start();
ob_start();
if($_SESSION["type"] == 'HR'){



}else if( $_SESSION["type"] == 'HR Manager'){



}else if($_SESSION["type"] == 'Admin')




{
   
} else {
    header("location:../pdo_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EmpowerU Dashboard</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <link href="../css/startmin.css" rel="stylesheet">

        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">EmpowerU</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="../pages/index.php">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php   echo $_SESSION["username"];      ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../pdo_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="../table/tables.php"><i class="fa fa-table fa-fw"></i> Applicants</a>
                            </li>

                            <li>
                                <a href="../pages/user.php"><i class="fa fa-table fa-fw"></i> User Profile</a>
                            </li>
                                                          <?php 

                                 if($_SESSION["type"] == 'HR Manager' || $_SESSION["type"] == 'Admin')
                                 {

                                        echo '
                                    <li>
                                <a href="../hr/manage_user.php"><i class="fa fa-cog fa-fw"></i>User</a>
                            </li>

                                        ';
                                 } 
                                 else {


                                 }
                                 if ($_SESSION["type"] == 'Admin')
                                 {
                                     echo '
                                    <li>
                                <a href="../hr/manage_admin.php"><i class="fa fa-cog fa-fw"></i>Admin</a>
                            </li>

                                        ';
                                 } else {


                                 }

                            ?> 

                            <li>
                                <a href="../pages/reports.php"><i class="fa fa-file fa-fw"></i> Reports</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

   <?php
  if($_SESSION["type"] == 'HR' || $_SESSION["type"] == 'HR Manager' ) {
 $conn = mysqli_connect("localhost", "root", "" , "emp");
 $message = "";
 $query = $conn->query("SELECT * FROM hr WHERE username = '".$_SESSION["username"]."' ");
 
 if($rows = mysqli_fetch_array($query)){

    $id = $rows["hrID"];
    $firstname = $rows["fname"];
    $lastname = $rows["lname"];
    $contact = $rows["contact"];
    $type = $rows["type"];
    $email = $rows["email"];    
 } else  {

    }
  if(isset($_POST["submit"])){
       
       $fname = $_POST["fname"];
       $lname = $_POST["lname"];
       $contact = $_POST["contact"];
       $email = $_POST["email"];

      $query = $conn->query("UPDATE hr SET fname = '$fname' , lname = '$lname' , contact = '$contact', email = '$email' WHERE hrID = '$id' ");

      $message = "Successfully Saved!";

  }
} else {

 $conn = mysqli_connect("localhost", "root", "" , "emp");
 $message = "";
 $query = $conn->query("SELECT * FROM admin WHERE username = '".$_SESSION["username"]."' ");
 
 if($rows = mysqli_fetch_array($query)){

    $id = $rows["id"];
    $firstname = $rows["fname"];
    $lastname = $rows["lname"];
    $contact = $rows["contact"];
    $type = $rows["type"];
    $email = $rows["email"];    
 } else  {

    }
  if(isset($_POST["submit"])){
       
       $fname = $_POST["fname"];
       $lname = $_POST["lname"];
       $contact = $_POST["contact"];
       $email = $_POST["email"];

      $query = $conn->query("UPDATE hr SET fname = '$fname' , lname = '$lname' , contact = '$contact', email = '$email' WHERE id = '$id' ");

      $message = "Successfully Saved!";


}

}
    ?> 
                            <h1 class="page-header">Profile</h1>

                            <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title"><?php  echo $message;  ?></h5>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>HR ID</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" 
                        value="<?php echo "$id";  ?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                    </div>
                    <div class="col-md-4 pl-1">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control"  name="fname" placeholder="Company" value="<?php echo "$firstname";  ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo "$lastname";  ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value="<?php echo "$email";  ?>"  class="form-control" placeholder="<?php echo "$email";  ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="contact" class="form-control" placeholder="City" value="<?php echo "$contact";  ?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" placeholder="Country" value="<?php echo "$type";  ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto col-md-8">
                      <button type="submit" name="submit" class="btn btn-primary btn-round">Update Profile</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="../js/jquery.min.js"></script>

        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/metisMenu.min.js"></script>

        <script src="../js/startmin.js"></script>

    </body>
</html>
