<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=travelsa_PumpIndustry", "travelsa_PumpIndustry", "Inspired@123");

$column = array("id", "Category", "Link", "Title", "Date", "Connent", "ImageDtls", "ImageLink", "Source");

$query = "SELECT * FROM  PumpNews ";

if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE id LIKE "%'.$_POST["search"]["value"].'%" 
	OR Category LIKE "%'.$_POST["search"]["value"].'%" 
	OR Link LIKE "%'.$_POST["search"]["value"].'%" 
	OR Title LIKE "%'.$_POST["search"]["value"].'%" 
	OR Date LIKE "%'.$_POST["search"]["value"].'%" 
	OR Connent LIKE "%'.$_POST["search"]["value"].'%" 
	OR ImageDtls LIKE "%'.$_POST["search"]["value"].'%" 
	OR ImageLink LIKE "%'.$_POST["search"]["value"].'%" 
	OR Source LIKE "%'.$_POST["search"]["value"].'%" 
	';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
	$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$result = $connect->query($query . $query1);

$data = array();

foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = substr($row['Category'],0,20);
	$sub_array[] = substr($row['Link'],0,20);
	$sub_array[] = substr($row['Title'],0,20);
	$sub_array[] = substr($row['Date'],0,20);
	$sub_array[] = substr($row['Connent'],0,20);
	$sub_array[] = substr($row['ImageDtls'],0,20);
	$sub_array[] = substr($row['ImageLink'],0,20);
	$sub_array[] = substr($row['Source'],0,20);
	$data[] = $sub_array;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM PumpNews";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

$output = array(
	"draw"		=>	intval($_POST["draw"]),
	"recordsTotal"	=>	count_all_data($connect),
	"recordsFiltered"	=>	$number_filter_row,
	"data"	=>	$data
);

echo json_encode($output);

?>