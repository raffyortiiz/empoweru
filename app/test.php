<?php
     include '../vendor/autoload.php';
// Include Composer autoloader if not already done.
$db = mysqli_connect("localhost","root","","emp");
$query  = "SELECT filename FROM applicant ORDER BY appID DESC LIMIT 1";

$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) > 0 ){
 

   while($row=mysqli_fetch_array($result)){
       $file = $row["filename"];

            }

$parser = new \Smalot\PdfParser\Parser();
 $pdf = $parser->parseFile($file);
 $pages  = $pdf->getPages();
//Loop over each page to extract text.
foreach ($pages as $page) 
    {
    $w  = $page->getText();
    $arrange = nl2br($w);
    $lol = array($arrange);
    $get = implode(" ", $lol);
    $name = substr($get, 0, 31);
     // $address = substr($get, 31, 32);
     // $number = substr($get, 0, 31);

$insert = "UPDATE applicant SET jobtitle = '$name' WHERE filename = (SELECT last_insert_id()) ";

   if(mysqli_query($db, $insert)){


    echo 'Saved';
 
                 }
        }  

    }


?>

<html>
<head>
    <meta http-equiv="refresh" content="5"/>
</head>
<body>
</body>
</html>
