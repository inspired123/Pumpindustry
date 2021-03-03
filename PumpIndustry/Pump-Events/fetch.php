
<?php
	//fetch.php
	
		$connect = mysqli_connect("localhost", "travelsa_PumpIndustry", "Inspired@123", "travelsa_PumpIndustry");
	if(isset($_POST['years']) and (isset($_POST['months'] ) !== ''))
	{
			$years=$_POST['years'];
$months=$_POST['months'];

	
		 $query = "SELECT * FROM pumpevents where EventStartDate LIKE '%".$months." ".$years."%' order by id asc";

	}else{
	     $query = "SELECT * FROM pumpevents where EventStartDate LIKE '%".$years."%' order by id asc";

	}

	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result))
	{
		$data["EventName"] = $row["EventName"];
		$data["EventDescription"] = $row["EventDescription"];
		$data["EventStartDate"] = $row["EventStartDate"];
	    $data["EventEndDate"] = $row["EventEndDate"];
		$data["EventStartTime"] = $row["EventStartTime"];
		$data["EventEndTime"] = $row["EventEndTime"];
		$data["EventOrganizer"] = $row["EventOrganizer"];
							
		
		echo '   <div class="container">
	<div class="tribe-events-calendar-list__month-separator" style="display: flex;align-items: center;">
	<time class="tribe-events-calendar-list__month-separator-text tribe-common-h7 tribe-common-h6--min-medium tribe-common-h--alt"  style="font-size: 16px;line-height:1.62;flex: none; font-weight: 400;"datetime="2020-08">'.$data["EventStartDate"].'</time>
</div><hr style="margin-top: -14px;margin-bottom: 1.5rem;border: 0;margin-left: 9.5rem;">
<div class="row">
	<div class="col-md-2">
	<h4>Wed 26</h4>
	</div>
	<div class="col-md-10">
	<p>'.$data["EventStartDate"].' @ '.$data["EventStartTime"].'-'.$data["EventEndTime"].'</p>
	<div>
	<h3 style="padding: 0px 0 15px 0;font-family: sans-serif;">'.$data["EventName"].'<h3>
	<h6 style="padding: 0 0 7px 4px;">'.$data["EventOrganizer"].'</h6>
	<p>'.$data["EventDescription"].'</p>
	</div>
	</div>
	</div>
</div>';
	}


	

	
	
	
	
	
	
	
	
	
	
	
	
	
?>