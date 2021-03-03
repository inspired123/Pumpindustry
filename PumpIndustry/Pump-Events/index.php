<?php include "../header.php" ?>
<style>
	hr{
	border-top: 1px solid #b73640 !important;
	
	}
	.form-control{
	    
	width:50%!important;
	}
	
</style>

<?php 
	//index.php
		$connect = mysqli_connect("localhost", "travelsa_PumpIndustry", "Inspired@123", "travelsa_PumpIndustry");
	$query = "SELECT * FROM events ORDER BY name ASC";
	$result = mysqli_query($connect, $query);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



<body>
	<div class="container" style="padding:11rem 15px 42px 15px ;" id="get_data">
		
		
		
        
        
	</div>
	
	
	
	
	<div class="container" >
		<div class="row ">
			<div class="col-sm-1"></div>
			
			<div class="col-sm-10" id="events_details"></div>
			<div class="col-sm-1"></div>
		</div>
		
	</div>
	
	
	
	
	<div>
		
	</div>
</body>
</html>

<script>
	  function getMonthByYear() {
        var years = $("#years").val();

	$.ajax({
				url:"get_months.php",
				method:"POST",
				data:{years:years},
				success:function(response)
				{
				$('#get_months').css('display','block');
					$('#get_months').html(response);
							var months = $("#get_months").val();

					load_data(years,months);
				}
			})
    }
	
		  function getDataByMonth() {
        var years = $("#years").val();
		var months = $("#get_months").val();
			load_data(years,months);
    }
	
	
	$(document).ready(function(){
		
		
		get_data();
		var letter='';
		

		
		function get_data(){
			
			$.ajax({
				url:"get_data.php",
				method:"POST",
				data:{},
				success:function(response)
				{
					$('#get_data').html(response);
					var years = $("#years").val();
		var months = '';


					load_data(years,months);
					
				}
			})
		}
		
	});
	

	function load_data(years,months){
		
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{'years':years,'months':months},
			success:function(response)
			{
				$('#events_details').html(response);
			}
		})
	}
	
</script>

<div class="container">
	<p style="font-size: 17px;font-family: sans-serif;color: black;">
		The pump industry is an enormous industry and plays a critical role in almost every facet of our lives. Water supply, fire protection, oil &amp; gas, power   plants, waste water treatment, sump pumps at homes, processing chemicals, foods   &amp; pharmaceuticals, and many more.
		  This site is part of the Pump related portal of sites.	<br>
		  These provides users with quality useful information about the pump industry.	<br>	 
          Pump Events is a repository of all pump related events and happenings around the   world.<br>
          Please feel free to contact us to get you events listed and also explore the   advertisement avenues we have to offer.<br>
		Access to all the sections of this site are free for all users and we are always   looking at adding new features, functionality and content to make it more useful   to you all. Please feel free to let us know what you like, don't like and would   like on the site.
     Hope you find this site useful and please keep coming back as we evolve with   your feedback
	
	</div>


















<?php include "../footer.php" ?>		