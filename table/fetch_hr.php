
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "emp");
$columns = array('fname', 'lname', 'email');

$query = "SELECT * FROM hr";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE  fname LIKE "%'.$_POST["search"]["value"].'%" 
 OR lname LIKE "%'.$_POST["search"]["value"].'%" OR status LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY hrID ASC ';
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
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["hrID"].'" data-column="fname">' . $row["fname"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["hrID"].'" data-column="lname">' . $row["lname"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["hrID"].'" data-column="email"> <input type="date" value = "'.$row["email"].'" /></div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["hrID"].'" data-column="contact">' . $row["contact"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["hrID"].'" data-column="type">' . $row["type"] . '</div>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM hr ";
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
