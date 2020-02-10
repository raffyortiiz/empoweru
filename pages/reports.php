
<?php
session_start();
ob_start();

date_default_timezone_set ("Asia/Manila");
include "connect.php";
if($_SESSION["type"] == 'HR' || $_SESSION["type"] == 'HR Manager' || $_SESSION["type"] == 'Admin' ){


    
} else{
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
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION["username"]; ?> <b class="caret"></b>
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
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li> 

                            <!-- START OF APPLICANT -->
                            <li>
                                <a href="../table/tables.php"><i class="fa fa-table fa-fw"></i> Applicants</a>
                            </li>

                            <!-- END OF APPLICANT --> 
                            <li>
                                <a href="../pages/user.php"><i class="fa fa-edit fa-fw"></i> User Profile</a>
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
             <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="tables.php" class="active"><i class="fa fa-table fa-fw"></i> Applicants</a>
                            </li>
                            <li>
                                <a href="approved.php"><i class="fa fa-edit fa-fw"></i> Approved Applicants</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Generate Report</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div>
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>From: </label>
                                                    <input type="date" name="from" class="form-control" 
                                                        value="<?php echo isset($_POST['from']) ? $_POST['from'] : '' ?>"
                                                    />
                                                </div>

                                                <div class="col-md-3">
                                                    <label>To: </label>
                                                    <input type="date" name="to" class="form-control" 
                                                        value="<?php echo isset($_POST['to']) ? $_POST['to'] : '' ?>"
                                                    />
                                                </div>

                                                <div class="col-md-2" style="margin-top:25px;">
                                                    <input type="submit" value="Get Data" name="submit" class="btn btn-md btn-primary form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- added fixed height and scrollable content -->
                                <div class="panel-body" style="max-height: 600px; overflow:hidden; overflow-y:scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email Address</th>
                                                    <th>Contact</th>
                                                    <th>Birthday</th>
                                                    <th>Gender</th>
                                                    <th>Educational Attainment</th>
                                                    <th>Years of Experience</th>
                                                    <th>Date Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeX">
                                                    <?php
                                                    if (isset($_POST['submit'])){

                                                        $from = date('Y-m-d', strtotime($_POST['from'])).' 00:00:00';
                                                        $to = date('Y-m-d', strtotime($_POST['to'])).' 23:59:59';

                                                        $query = "SELECT * FROM `applicant` WHERE `r_date` >= '".$from."' AND `r_date` <= '".$to."'";
                                                        $_POST['from'] == NULL ? $query = "SELECT * FROM `applicant`" : '';
                                                        
                                                        $result = $con->query($query);
                                                        $row = $result->fetch_assoc();
                                                        
                                                        if ($result) {
                                                            $totalApplicantsFiltered = 0;
                                                            $index = 0;
                                                            while ($row = $result->fetch_assoc()) {
                                                                
                                                                $index++;
                                                                $field1name = $row["fname"];
                                                                $field2name = $row["lname"];
                                                                $field3name = $row["email"];
                                                                $field4name = $row["contact"];
                                                                $field5name = $row["birthday"];
                                                                $field6name = $row["gender"];
                                                                $field7name = $row["education"];
                                                                $field8name = $row["experience"];
                                                                $dateCreated = $row["r_date"];
                                                                
                                                                echo '
                                                                    <tr> 
                                                                        <td>'.$index.'</td>
                                                                        <td>'.$field1name." ".$field2name.'</td> 
                                                                        <td>'.$field3name.'</td> 
                                                                        <td>'.$field4name.'</td> 
                                                                        <td>'.$field5name.'</td> 
                                                                        <td>'.$field6name.'</td>
                                                                        <td>'.$field7name.'</td> 
                                                                        <td>'.$field8name.'</td>
                                                                        <td>'.$dateCreated.'</td>
                                                                    </tr>';
                                                                $totalApplicantsFiltered++;
                                                            }
                                                                $result->free();
                                                        }
                                                    } ?>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <h3><?php echo isset($_POST['submit']) ? 'Total Applicants: '.$totalApplicantsFiltered : ''; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

        <script src="../js/jquery.min.js"></script>

        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/metisMenu.min.js"></script>

        <script src="../js/startmin.js"></script>

</html>
