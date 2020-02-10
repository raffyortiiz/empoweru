 <?php  
 session_start();  
 ob_start();
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "emp";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["type"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM hr WHERE username = :username AND password = :password AND type = :type " ;  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"],
                          'type'         =>     $_POST["type"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {    
                   if($_POST["type"] == 'HR'){
                     $_SESSION["username"] = $_POST["username"];  
                     $_SESSION["type"] = $_POST["type"];
                     header("location:../EUDashboard/pages/index.php");  
                   }
                   else if ($_POST["type"] == 'HR Manager'){
                      $_SESSION["username"] = $_POST["username"];
                      $_SESSION["type"] = $_POST["type"];
                     header("location:../EUDashboard/pages/index.php"); 
                   }
                   else {
                      $message = '<label>Invalid User Type</label>';  
                   }
                }  
                else  
                {  
                     $message = '<label>Invalid Username or Password</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  

  try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["type"]) )  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM admin WHERE username = :username AND password = :password AND type = :type";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"],
                          'type'         =>     $_POST["type"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {    
                     $_SESSION["username"] = $_POST["username"];  
                     $_SESSION["type"] = $_POST["type"];
                     header("location: /EUDashboard/pages/index.php");  
                }  
                else  
                {  
                     $message = '<label>Invalid Username or Password</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Dashboard Login</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <style>
      </style>
      <body> 
           <div class="container" style="width:500px;">  
                <br></br>
                <img src="images/form-img.png" alt="" style="width: 500px;">
                <h3 align="">Dashboard Login</h3><br />  
                <form method="post">  
                     <label>Username</label>  
                     <input required type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input required type="password" name="password" class="form-control" />  
                     <br />
                                     <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                     <br />  
                     <select name="type" required>
                              <option value="" name ="type"></option>
                              <option value="HR" name="type">HR</option>
                              <option value="HR Manager" name="type">HR Manager</option>
                               <option value="Admin" name="type">Admin</option>
                    </select>
                    <br />
                    <br/>
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>   
      </body>  
 </html>  