
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "emp");
$columns = array('fname', 'lname', 'birthday', 'gender','email','contact','education', 'experience', 'status');
$control = 1;
$n_control = 'Pending'; 


$query = "SELECT * FROM applicant WHERE status = 'Approved' ";
// if(isset($_POST["search"]["value"]))
// {
//  $query .= '
//  WHERE  fname LIKE "%'.$_POST["search"]["value"].'%" 
//  OR lname LIKE "%'.$_POST["search"]["value"].'%" AND status = "Pending" 
//  ';
// }
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY appID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="fname">' . $row["fname"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="lname">' . $row["lname"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="birthday">' . $row["birthday"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="gender">' . $row["gender"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="email">' . $row["email"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="contact">' . $row["contact"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="education">' . $row["education"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="experience">' . $row["experience"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="">' . $row["status"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["appID"].'" data-column="">' . $row["tagby"] . '</div>';
 $sub_array[] = '<button type="button" name="setint" class="btn btn-success btn-xs setint" appID="'.$row["appID"].'">Set Interview</button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" appID="'.$row["appID"].'">Remove</button>';

 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM applicant";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
