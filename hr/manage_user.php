<?php
session_start();
ob_start();
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

        <link href="../css/toastr.css" rel="stylesheet">

        <link rel="stylesheet" href="../css/simplePagination.css" />

        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

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
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION["username"];          ?> <b class="caret"></b>
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
                                <a href="../index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="../table/tables.php"><i class="fa fa-table fa-fw"></i> Applicants</a>
                            </li>
                          
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
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Manage Users</h1>
                                 <div align="right">
         <button type="button" name="add" id="add" class="btn btn-info">Add User</button>
         <br></br>
       </div>
    <div class="table-responsive">
     <div id="alert_message"></div>                       
    <table id="hr_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Username</th>
       <th>Password</th>
       <th>Type</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Contact</th>
       <th>Email</th>
       <th></th>
      </tr>
     </thead>
    </table>
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

        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>
        <script src="../js/jquery.simplePagination.js"></script>
        <script src="../js/startmin.js"></script>
        <script src="../js/toastr.min.js"></script>
  <script>
$(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#hr_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch_hr.php",
     type:"POST"
    }
   });
  }

  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update_hr.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#hr_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#hr_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var username = $('#data1').text();
   var password = $('#data2').text();
   var type = $('#data3').text();
   var fname = $('#data4').text();
   var lname = $('#data5').text();
   var contact = $('#data6').text();
   var email = $('#data7').text();
   if(username != '' && password != '')
   {
    $.ajax({
     url:"insert_hr.php",
     method:"POST",
     data:{username:username, password:password, type:type,  fname:fname, lname:lname, contact:contact,  email:email},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#hr_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });

   
  
  $(document).on('click', '.delete', function(){
   var hrID = $(this).attr("hrID");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"hr_delete.php",
     method:"POST",
     data:{hrID:hrID},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#hr_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   location.reload(true); 
  });

  });

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update_hr.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#hr_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });



  </script>
</html>
