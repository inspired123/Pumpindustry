<?php
//import.php

include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=travelsa_PumpIndustry", "travelsa_PumpIndustry", "Inspired@123");

if($_FILES["import_excel"]["name"] != '')
{
    
	$allowed_extension = array('xls', 'csv', 'xlsx');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name = time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$data = $spreadsheet->getActiveSheet()->toArray();

		foreach($data as $row)
		{
			
			$query = "
			INSERT INTO PumpNews 
			(id,Category, Link, Title, Date,Connent,ImageDtls,ImageLink,Source) 
			VALUES ('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '".$row[4]."', '".$row[5]."', '".$row[6]."', '".$row[7].", '".$row[8]."')
			";

			$statement = $connect->prepare($query);
			$statement->execute($insert_data);
			echo $query;
		}
		$message = '<div class="alert alert-success">Data Imported Successfully</div>';

	}
	else
	{
		$message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
	}
}
else
{
	$message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>