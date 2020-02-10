<?php
     include '../vendor/autoload.php';
// Include Composer autoloader if not already done.
$db = mysqli_connect("localhost","root","","emp");

if(isset($_POST["submit"])){
$query  = "SELECT filename FROM applicant WHERE appID = (SELECT last_insert_id())";

$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) > 0 ){


   while($row=mysqli_fetch_array($result)){
       $file = $row["filename"];
 

            }

$parser = new \Smalot\PdfParser\Parser();
 $pdf = $parser->parseFile($file);
 $pages  = $pdf->getPages();
//Loop over each page to extract text.
foreach ($pages as $page) {
    $w  = $page->getText();
    $arrange = nl2br($w);
    $lol = array($arrange);
    $get = implode(" ", $lol);
    $name = substr($get, 0, 31);
     // $address = substr($get, 31, 32);
     // $number = substr($get, 0, 31);

$insert = "UPDATE applicant SET jobtitle = '$name' WHERE appID = (SELECT last_insert_id())";

   if(mysqli_query($db, $insert)){
    header("Refresh:1");
    echo 'Saved';
 
                 }
        }  
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

            <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>

    <div class="main">

        <div class="container">

                        <div class="col-lg-12">
                          <center><img src="images/form-img.png" alt="" style="width: 300px;"></center>


                                <!-- .panel-heading -->
                                <div class="panel-body">
                                    <div class ="col-lg-4">
                                    </div>
                                                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                </div>
                                <div class="panel-body">

                                <strong>Thank you. Your application has been received</strong>
                                <br></br>
                                <strong>One of our team member will contact you as soon as possible!</strong>
                                <br></br>
                                <strong>If you have any concerns regarding with your application, contact us through <u>info@empower.com.ph</u></strong>
                                </div>
                                <!-- /.panel-body -->

                                                                    <div class ="col-lg-4">
                                        <a href="#" ></a>
                                    </div>
                            </div>
                            <!-- /.panel -->
                        </div>
                                </div>
                                <!-- .panel-body -->
            
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>


            </div>
        </div>

    </div>



    
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
            <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>
    <script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>

        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

