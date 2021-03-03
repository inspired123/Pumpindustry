
<?php
	
	$connect = mysqli_connect("localhost", "travelsa_PumpIndustry", "Inspired@123", "travelsa_PumpIndustry");
	
	
	
	$get_data = "SELECT * FROM dates  order by id asc";
	$result = mysqli_query($connect, $get_data);
	
	?>
	<h6 style="padding: 7px;color: brown;font-family: serif;font-size: 19px;">Select the year </h6>
	<div class="container">
	    <div class="row">
	           <div class="col-md-6">
		 	<select name="years" id="years" class="form-control" onchange="getMonthByYear();"  widht="50%">

	<?php
	while($row = mysqli_fetch_array($result))
	{
		$data["years"] = $row["years"];		
		$data["months"] = $row["months"];
		
	?>
<option value="<?php echo $row["years"]; ?>"><?php echo $row["years"]; ?></option>

	<?php
	}
		
?>
			</select>
			</div>
			<div class="col-md-6">
<select id="get_months" class="form-control" style="display:none;" onchange="getDataByMonth();" style="widht:50%"></select>
</div>
</div>
</div>
