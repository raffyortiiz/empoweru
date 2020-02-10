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
  </style>
  @media(min-width:768px) {
    #page-table-wrapper {
        position: inherit;
        margin-left: 90px;
        padding: 40px 15px 0 15px;
        border-left: 1px solid #e7e7e7;
    }
}
    </style>
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
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION["username"]; ?><b class="caret"></b>
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

                <div class="navbar-default top" role="navigation">
                    <div class="top">
                        <ul class="nav navbar-header navbar-top-links">
                            <li>
                                <a href="../index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="../table/tables.php" class="active"><i class="fa fa-table fa-fw"></i> Applicants</a>
                            </li>
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

            <div id="page-table-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Applicants</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body" id="a_app">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#pending" data-toggle="tab">Applicant</a>
                                        </li>
                                        <li><a href="#approved" data-toggle="tab" id ="a_app" name ="a_app">Approved</a>

                                        </li>
                                        <li><a href="#interview" data-toggle="tab">For Interview</a>
                                        </li>
                                        <li><a href="#rejected" data-toggle="tab">Rejected</a>
                                        </li>
                                        <li><a href="#rejected" data-toggle="tab">Completed</a>
                                        </li>
                                        <li><a href="#progress" data-toggle="tab">Progress</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                            <div class="tab-content">
                           <div class="tab-pane fade in active" id="pending">
                                            <!-- for pending -->
                                               <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">

     <div align="left">
         <button type="button" name="add" id="add" class="btn btn-info">Add Walk In</button>
         <br></br>
                            </div>
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Gender</th>
       <th>Email</th>
       <th>Educational Attainment</th>
       <th>Contact</th>
       <th>Experience</th>
       <th>Status</th>
       <th>Resume</th>
       <td style="display:none"></td>
       <td style="display:none"></td>
      </tr>
     </thead>
    </table>
   </div>
                                 
                                </div>
                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="approved">
                                            <!-- approved -->
                                        <div class="panel panel-default">

                                <div class="panel-body">
                                    <div class="table-responsive">


                                              <div class="row col-md-2">
                                                <div class="form-group">
                                                    <label>Filter:</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "customer" value="Customer Service">Customer Service
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "technical" value="Technical Support">Technical Support
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "sales" value="Sales">Sales
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "others" value="Others">Others
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>

                                               <div class="row col-md-2">
                                                <div class="form-group">
                                                    <label>Filter:</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "pg" value="Postgraduate">Postgraduate
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "hs" value="High School Equivalent">High School Equivalent
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "ad" value="Associate's Degree">Associate's Degree
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "ug" value="Undergraduate">Undergraduate
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>

                                                 <div class="row col-md-2">
                                                <div class="form-select">
                                                    <label>Filter:</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "more" value="More than 1 year">More than 1 year
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "less" value="Less than 1 year">Less than 1 year
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "fg" value="Fresh Graduate">Fresh Graduate
                                                        </label>
                                                    </div>
                                                      <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name = "none" value="None">None
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="row col-md-4">
                                                <div class="form-group">
                                                    
<label for="eda">Educational Attaintment</label>
<select id="eda">
  <option value="Postgraduate">Postgraduate</option>
  <option value="High School Equivalent">High School Equivalent</option>
  <option value="Associate's Degree">Associate's Degree</option>
  <option value="Undegraduate">Undegraduate</option>
</select>

                                                </div>
                                                </div>

<div class="row col-md-4">
<div class="form-group">
                                                    
<label for="jp">Job Position</label>
<select id="jp">
  <option value="Customer Service">Customer Service</option>
  <option value="Technical Support">Technical Support</option>
  <option value="Sales">Sales</option>
  <option value="Others">Others</option>
</select>

                                                </div>
                                                </div>

<div class="row col-md-4">
<div class="form-group">
                                                    
<label for="cars">Experience</label>
<select id="cars">
  <option value="More than 1 year">More than 1 year</option>
  <option value="Less than 1 year">Less than 1 year</option>
  <option value="None">None</option>
  <option value="Freshgraduate">Freshgraduate</option>
</select>

                                                </div>
                                                </div>




                            







<br></br>


    <div id="alert_message"></div>
     <table id="approved_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Contact</th>
       <th>Email</th>
       <th>Education</th>
       <th>Position</th>
       <th>Years of Experience</th>
       <th>Status</th>

       <td style="display:none"></td>
       <td style="display:none"></td>
      </tr>
     </thead>
    </table>                                
                                    </div>
                                </div>
                            </div>
                                        </div>


      <div class="tab-pane fade" id="progress">
                                            <!-- approved -->
        <div class="panel panel-default">

       <div class="panel-body">
         <div class="table-responsive">
    <div id="alert_message"></div>
     <table id="approved_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Contact</th>
       <th>Email</th>
       <th>Education</th>
       <th>Position</th>
       <th>Years of Experience</th>
       <th>Status</th>


       <td style="display:none"></td>
       <td style="display:none"></td>
      </tr>
     </thead>
    </table>                                
                                    </div>
                                </div>
                            </div>
                                        </div>



       <div class="tab-pane fade" id="interview">
                                            <!-- for interview -->
       <div class="panel panel-default">
           <div class="panel-body">
      <div class="table-responsive">
        <?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=emp", "root", "");
$query = "SELECT * FROM applicant WHERE status ='For Interview'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>
        <table class="table table-bordered table-striped">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>From</th>
            <th>To</th>
            <th>Select</th>
            <th>Action</th>
            <th>Set</th>
          </tr>
        <?php
        $count = 0;
        foreach($result as $row)
        {
          $count = $count + 1;
          
          echo '
          <tr>
            <td>'.$row["fname"].'</td>
            <td>'.$row["lname"].'</td>
            <td>'.$row["email"].'</td>
            <td>
              <input type="checkbox" name="single_select" class="single_select"  required data-email="'.$row["email"].'" data-name="'.$row["fname"].'"/>
            </td>
            <td>
            <button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["email"].'" data-name="'.$row["fname"].'" data-action="single">Send Notification</button>
            </td>
          </tr>
          ';
        }

        ?>
<?php

$conn=mysqli_connect("localhost","root","","emp");
if (!$conn){
    die("Database Connection Failed" . mysqli_error($con));
}

if(isset($_POST["submit"])) 
{
    $de = $_POST["sdate"];
    $fe =$_POST["ftime"];
    $se = $_POST["ttime"];
$query1 = "UPDATE applicant SET int_date ='$de', f_time = '$fe' , t_time ='$se' ";

if(mysqli_query($conn, $query1)){

  echo 'Data Updated';
  }
} 



?>
<!--             <form method="POST">
            <td><input type="date" name="sdate" /></td>
            <td><input type="time" name="ftime" /></td>
            <td><input type="time" name="ttime" /></td>
            <td><button type="button" name="submit" class="btn btn-success btn-md">Set</button></td>
            </form> -->


          <tr>
            <td colspan="5"></td>
            <td></td>
            <td></td>
            <td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>
          </tr>
        </table>
      </div>
                                </div>
                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="rejected">
                                <!-- rejected --> 
                                        <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="rejected_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Birthday</th>
       <th>Gender</th>
       <th>Email</th>
       <th>Contact</th>
       <th>Education</th>
       <th>Experience</th>
       <th>Status</th>
       <td style="display:none"></td>
       <td style="display:none"></td>
      </tr>
     </thead>
    </table>
                                    </div>
                                </div>
                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <script src="../js/jquery.min.js"></script>

        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/metisMenu.min.js"></script>

        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>
        <script src="../js/jquery.simplePagination.js"></script>
        <script src="../js/startmin.js"></script>
        <script src="../js/toastr.min.js"></script>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();
  // fetch_approved_data();
  fetch_rejected_data();

  function fetch_rejected_data()
  {
   var dataTable = $('#rejected_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"rejected.php",
     type:"POST"
    }
   });
  }

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    }
   });
  }

    function fetch_approved_data()
  {
   var dataTable = $('#approved_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch_approved.php",
     type:"POST"
    }
   });
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

    function f_data(id, d_time, f_time, t_time)
  {
   $.ajax({
    url:"insert_interview.php",
    method:"POST",
    data:{id:id, d_time:d_time, f_time:f_time, t_time:t_time},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
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
   update_data(id, d_time, f_time, t_time);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td><input type="date" id="data3" contenteditable /></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td contenteditable id="data8"></td>';
   html += '<td id="data9"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var fname = $('#data1').text();
   var lname = $('#data2').text();
   var birthday = $('#data3').val();
   var gender = $('#data4').text();
   var email = $('#data5').text();
   var contact = $('#data6').text();
   var education = $('#data7').text();
   var experience = $('#data8').text();
   var status = $('#data9').text();
   if(fname != '' && lname != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{fname:fname, lname:lname, birthday:birthday, gender:gender, email:email, contact:contact, education:education, experience:experience, status:status},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
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

    $(document).on('click', '.setint', function(){
   var appID = $(this).attr("appID");
   if(confirm("Are you sure you want to do this?"))
   {
    $.ajax({
     url:"interview.php",
     method:"POST",
     data:{appID:appID},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   location.reload(true); 
  });

  

    $(document).on('click', '.reject', function(){
   var appID = $(this).attr("appID");
   if(confirm("Are you sure you want to do this?"))
   {
    $.ajax({
     url:"reject.php",
     method:"POST",
     data:{appID:appID},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#rejected_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   location.reload(true); 
  });

        $(document).on('click', '.restore', function(){
   var appID = $(this).attr("appID");
   if(confirm("Are you sure you want to do this?"))
   {
    $.ajax({
     url:"restore.php",
     method:"POST",
     data:{appID:appID},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   location.reload(true); 
  });

                
      $(document).on('click', '.approve', function(){         

               location.reload(true); 
  });    
      $(document).on('click', '.setint', function(){         

               location.reload(true); 
  });    

    
      $(document).on('click', '.approve', function(){
   var appID = $(this).attr("appID");
   if(confirm("Are you sure you want to do this?"))
   {
    $.ajax({
     url:"approve.php",
     method:"POST",
     data:{appID:appID},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>

<script>
$(document).ready(function(){
  $('.email_button').click(function(){
    $(this).attr('disabled', 'disabled');
    var id  = $(this).attr("id");
    var action = $(this).data("action");
    var email_data = [];
    if(action == 'single')
    {
      email_data.push({
        email: $(this).data("email"),
        date: $(this).data("sdate"),
        name: $(this).data("name")
      });
    }
    else
    {
      $('.single_select').each(function(){
        if($(this).prop("checked") == true)
        {
          email_data.push({
            email: $(this).data("email"),
            date: $(this).data("sdate"),
            name: $(this).data('name')
          });
        } 
      });
    }

    $.ajax({
      url:"send_mail.php",
      method:"POST",
      data:{email_data:email_data},
      beforeSend:function(){
        $('#'+id).html('Sending...');
        $('#'+id).addClass('btn-danger');
      },
      success:function(data){
        if(data == 'ok')
        {
          $('#'+id).text('Success');
          $('#'+id).removeClass('btn-danger');
          $('#'+id).removeClass('btn-info');
          $('#'+id).addClass('btn-success');
        }
        else
        {
          $('#'+id).text(data);
        }
        $('#'+id).attr('disabled', false);
      }
    })

  });
});
</script>


    </body>
</html>
