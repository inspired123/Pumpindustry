
<?php
	
	$connect = mysqli_connect("localhost", "travelsa_PumpIndustry", "Inspired@123", "travelsa_PumpIndustry");
	if(isset($_POST['years']))
	{
	$years=$_POST['years'];
	$get_data = "SELECT * FROM dates  where years='".$years."'order by id asc";
	$result = mysqli_query($connect, $get_data);
	
	?>
	<option value="" >Select Month</option>
	<?php
	while($row = mysqli_fetch_array($result))
	{
		$data["months"] = $row["months"];
		
			$row = explode(',',$row["months"]);
			foreach($row as $cell){
				
				$row2 = explode(',',$cell);
		
	?>
<option value="<?php echo $row2[0]; ?>"><?php echo $row2[0]; ?></option>

	<?php
	}
	}
	?>

	<?php
	}
		
?>