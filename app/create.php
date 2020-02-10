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
<style>
     .block {
      display: block;
   }
   .text-line {
    background-color: transparent;
    color: #000000;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #eeeeee 1px;
    padding: 3px 10px;
}
    </style>
<body>

    <div class="main">

        <div class="container">

                        <div class="col-lg-12">
                          <center><img src="images/form-img.png" alt="" style="width: 300px;"></center>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    APPLY WITH US!
                                </div>
                                <!-- .panel-heading -->
                                <div class="panel-body">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">CREATE FORM</a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                <div class="signup-form">
                                                        <form id="form" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required" >First name</label>
                                    <input type="text" name="fname" id="first_name" required/>
                                </div>
								<div class="form-input">
                                    <label for="middle_name" class="required" >Middle name</label>
                                    <input type="text" name="mname" id="first_name" required/>
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="lname" id="last_name" required/>
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="gender">Gender</label>

                                    </div>
                                    <div class="form-radio-group" required>            
                                        <div class="form-radio-item">
                                            <input type="radio" name="gender" id="male" value="Male" >
                                            <label for="male">Male</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="gender" id="female" value="Female" >
                                            <label for="female">Female</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                </div>

                      <div class="form-input">
                                    <label for="age" class="required">Age:</label>
                                    <input type="number" name="age" id="age" required/>
                                </div>


                                <div class="form-input">
                                    <label for="city" class="required">Current City</label>
                                    <input type="text" rows="2" col="25" name="city" id="address" required/>
                                </div>

                                   <div class="form-input">
                                    <label for="contact" class="required">Phone number</label>
                                    <input type="number" name="contact" id="phone_number" required/>
                                </div>

                                <div class="form-input">
                                    <label for="email" class="required" reqruired>Email</label>
                                    <input type="email" name="email" id="email" required/>
                                </div>

                                    <div class="label-flex">
                                        <label for="meal_preference" class="required">Educational Attainment</label>
                                    </div>
                                      <div class="form-radio-group block"> 
                                        <div class="form-radio-item">
                                            <input type="radio" name="education" id="highschool" value="High School Equivalent">
                                            <label for="highschool">High School Equivalent</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="education" id="associate" value="Associate's Degree">
                                            <label for="associate">Associate's Degree</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="education" id="post" value="Postgraduate">
                                            <label for="post">Postgraduate</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item block"> 
                                            <input type="radio" name="education" id="under" value="Undergraduate">
                                            <label for="under">Undergraduate</label>
                                            <span class="check"></span>
                                             <input type="text" name="education" id="education" placeholder="If undergraduate specify year Level:" class="text-line">
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">

                             <div class="form-select">
                                     <label for="inputdob">Recent Job Experience (N/A if None)</label><input type="text" name="recent job" id="recent job">
                             </div>

                             <div class="form-select">
                                     <label for="inputdob">Company</label><input type="text" name="company" id="company">
                             </div>

                             <div class="form-select">
                                    <div class="label-flex">
                                        <label for="e_preference">Years of Work Experience</label>
                                    </div>
                                      <div class="form-radio-group block"> 
                                        <div class="form-radio-item">
                                            <input type="radio" name="experience" id="lessthan" value="Less than 1 year">
                                            <label for="lessthan">Less than 1 year</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="experience" id="morethan" value="More than 1 year">
                                            <label for="morethan">More than 1 year</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="experience" id="fgrad" value="Fresh Graduate">
                                            <label for="fgrad">Fresh Graduate</label>
                                            <span class="check"></span>
                                        </div>

                                        <div class="form-radio-item">
                                            <input type="radio" name="experience" id="none" value="None">
                                            <label for="none">None</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                            </div>
                                    <div class="form-select">
                                    
                                                    <label>Position you're applying for</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="Customer Serivce">Customer Service
                                                        </label>
                                          
                                   
                                                        <label>
                                                            <input type="checkbox" value="Technical Support">Technical Support
                                                        </label>
                                 
                                                  
                                                        <label>
                                                            <input type="checkbox" value="Sales Representative">Sales Representative
                                                        </label>
                                        
                                                  
                                                        <label>Others:
                                                            <input type="text" placeholder="Please specify" class="text-line" value="">
                                                        </label>


                                                    </div>
                                    </div>
               

    <div class="form-select">
        <label>Download Resume Template (Optional)</label>
     <div>   
    <a href="sample.docx" download>Download EU Template</a>
</div>
    </div>

     <div class="form-submit">
        <label for="e_preference">UPLOAD RESUME (PDF ONLY)</label>
        <input id="uploadImage" type="file" accept="pdf/*" name="image1" required/>
    <br>
        <input class="btn btn-success" action="test.php" name="submit" type="submit" value="Submit Form">
     </div>
        <br></br>
                        </div>
                            </div>
                        </div>

                        </form>

<?php

$valid_extensions = array('pdf' , 'doc'); // valid extensions
$path = '../table/uploads/'; // upload directory

if(!empty($_POST['name']) || !empty($_POST['email']))
{
    $img = $_FILES['image1']['name'];
    $tmp = $_FILES['image1']['tmp_name'];
        
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    
    // check's valid format
    if(in_array($ext, $valid_extensions)) 
    {                   
        $path = $path.strtolower($final_image); 
           
         if(move_uploaded_file($tmp,$path)) 
        {
    echo "<img src='$path' />";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $birthday = $_POST['birthday'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $recent = $_POST['recent job'];
    //pdf read


    //include database configuration file
    include_once 'db.php';


    
    //insert form data in the database
    $insert = $db->query("INSERT INTO applicant (fname, lname, gender,  birthday, address, email, contact, recent job, education, experience, u_resume, filename) VALUES ('".$fname."','".$lname."','".$gender."', '".$birthday."', '".$address."', '".$email."','".$contact."', '".$recent."', ".$education."', '".$experience."','".$path."', '".$path."')");
    
        echo "<script> location.href='create_end.php'; </script>";
        }
    } 
    else 
    {
        echo 'Invalid';
    }
}


?>



                    </form>
                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .panel-body -->
                            </div>
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

