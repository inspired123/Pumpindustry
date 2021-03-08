
<?php
	//fetch.php
	
	$connect = mysqli_connect("localhost", "travelsa_PumpIndustry", "Inspired@123", "travelsa_PumpIndustry");
	
	
	if(isset($_POST['letter'])){
		$letter=$_POST['letter'];
		$query = "SELECT * FROM employee where name LIKE '".$letter."%'  order by id asc";
		
		}else{
		$query = "SELECT * FROM employee where name LIKE 'A%' order by id asc";
	}
	
	
	
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$data["name"] = $row["name"];
		
		$data["designation"] = $row["designation"];
		
		echo '   <div align="left">
		<h4 class="employee_name" style="font-size: 19px;font-family: sans-serif;padding: 0px 0 13px 0;">'.$data["name"].'</h4>
		<p class="employee_designation" style="font-family: sans-serif;font-size: 17px;">'.$data["designation"].'</p><hr>
		</div>';
	}
	
	
	
?>