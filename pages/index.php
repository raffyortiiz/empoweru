<?php
session_start();
ob_start();
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

        <link href="../css/timeline.css" rel="stylesheet">

        <link href="../css/startmin.css" rel="stylesheet">

        <link href="../css/morris.css" rel="stylesheet">

        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">EmpowerU</a>
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
                            <i class="fa fa-user fa-fw"></i>  <?php   echo '<strong>Welcome - '.$_SESSION["username"].'</strong>'; ?>  <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../pages/user.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li> 

                            <!-- START OF APPLICANT -->
                            <li>
                                <a href="../table/tables.php"><i class="fa fa-table fa-fw"></i> Applicants</a>
                            </li>
                            </li>   

                            <!-- END OF APPLICANT --> 
                            <li>
                                <a href="../pages/user.php"><i class="fa fa-edit fa-fw"></i>User Profile</a>
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
                                <a href="../admin/manage_admin.php"><i class="fa fa-cog fa-fw"></i>Admin</a>
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
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                      <!-- /.row -->
                      <!-- APPLICANT -->
                      <?php

$conn = mysqli_connect('localhost','root','' , 'emp');

            $sql = "SELECT count(appID) AS total FROM applicant";
            $result = mysqli_query($conn,$sql);
            $values = mysqli_fetch_assoc($result);
            $num_rows = $values['total'];
        
?>
                      <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"> 
                                                             <?php echo $num_rows; ?>    </div>
                                            <div>Applicants</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../table/tables.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- END OF APPLICANT -->
               <?php

$conn = mysqli_connect('localhost','root','' , 'emp');

            $sql = "SELECT count(appID) AS total FROM applicant WHERE status = 'For Interview' ";
            $result = mysqli_query($conn,$sql);
            $values = mysqli_fetch_assoc($result);
            $num_rows = $values['total'];
        
?>

                        <!--  DEPARTMENT -->
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $num_rows; ?></div>
                                            <div>For Interiew</div>   
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                            <!--  END OF DEPARTMENT -->
                        <!-- REPORTS -->
                            <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-files-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><i class="fa fa-file"></i></div>
                                            <div>Reports</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- END OF REPORTS -->
                         
                                                <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Notification Panel
                                </div>
                                <!-- /.panel-heading -->



                                <div class="panel-body">
                            
                                                  <?php 
                                $conn = mysqli_connect('localhost', 'root', '', 'emp');

                             $sql = $conn->query("SELECT * FROM applicant WHERE status = 'Pending' LIMIT 5");
                             

                                        while($rows = mysqli_fetch_array($sql)){

                                            $status = $rows["status"];

      echo '
        <div class="alert alert-success alert-dismissible"> New  '.$status.' status!
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button><a href="../table/tables.php" class="alert-link">Proceed</a></div>
        ';
                                        }
                                ?>
                                 

                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>


                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Activity Logs
                                </div>
                                <!-- /.panel-heading -->

                                <div class="panel-body">
                                    

                                        <?php 

      $conn = mysqli_connect('localhost', 'root', '', 'emp');
      $sql = $conn->query("SELECT tagby, status, fname FROM applicant ORDER BY appID DESC");

    while ($rows = mysqli_fetch_array($sql)) {

        $status = $rows["status"];
        $name = $rows["fname"];
        $tag  = $rows["tagby"];

        if ( $status == 'Rejected'){

                    echo '
        <div class="alert alert-danger alert-dismissible">Applicant <u> '.$name.' </u> is <strong>'.$status.'</strong> <strong> by: '.$tag.'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button><a href="#" class="alert-link"></a>.
                     </div>
        ';
        } else if ($status == 'Approved'){

        echo '
        <div class="alert alert-info alert-dismissible">Applicant <u> '.$name.' </u> is <strong>'.$status.'</strong> <strong> by: '.$tag.'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button><a href="#" class="alert-link"></a>.
                     </div>
        ';
            }
            else if ($status == 'For Interview') {

             echo '
        <div class="alert alert-info alert-dismissible">Applicant <u> '.$name.' </u> is <strong>'.$status.'</strong> <strong> by: '.$tag.'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
        </button><a href="#" class="alert-link"></a>.
                     </div>
        ';


            }
            else {

                
            }
        }
 ?> 
                  
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        

                    </div>
                    
                   
                </div>
            </div>

        </div>
        <script src="../js/jquery.min.js"></script>

        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/metisMenu.min.js"></script>

        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <script src="../js/startmin.js"></script>
        <script>
            




        </script>
    </body>
</html>
