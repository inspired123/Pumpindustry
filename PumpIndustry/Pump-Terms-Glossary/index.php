<? include "../header.php" ?>


<?php 
	//index.php
	$connect = mysqli_connect("https://caasaservice.com/", "travelsa_PumpIndustry", "Inspired@123", "travelsa_PumpIndustry");
	$query = "SELECT * FROM employee ORDER BY name ASC";
	$result = mysqli_query($connect, $query);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<style>
	
	@media screen and (max-width: 600px)
.response {
     color:red!important;
}
/*@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}*/

	hr{
	border-top: 1px solid #b73640 !important;
	}
	.btnn {
    display: inline-block!important;
    padding: 6px 12px!important;
    margin-bottom: 0!important;
    font-size: 14px!important;
    font-weight: 400!important;
    line-height: 1.42857143!important;
    text-align: center!important;
    white-space: nowrap!important;
    vertical-align: middle!important;
    cursor: pointer!important;
    -webkit-user-select: none!important;
    -moz-user-select: none!important;
    -ms-user-select: none!important;
    user-select: none!important;
    background-image: none!important;
    border: 1px solid transparent!important;
    border-radius: 4px!important;
}
</style>

<body>
    
   


  
  






 

	<div class="container " style="padding:11rem 25px 42px 25px ;">

	
	
					  <button class="btn  btn-primary response" id="A" href="javascript:void(0)" onclick="get_content('A')" style="font-weight:bold;">A</button>
					  <button class="btn btn-primary " id="B" href="javascript:void(0)" onclick="get_content('B')" style="font-weight:bold;">B</button>
					  <button class="btn btn-primary  " id="C" href="javascript:void(0)" onclick="get_content('C')"style="font-weight:bold;">C</button>
					  <button class="btn btn-primary" id="D" href="javascript:void(0)" onclick="get_content('D')" style="font-weight:bold;">D</button>
					  <button class="btn btn-primary" id="E" href="javascript:void(0)" onclick="get_content('E')" style="font-weight:bold;">E</button>
					  <button class="btn btn-primary" id="F" href="javascript:void(0)" onclick="get_content('F')" style="font-weight:bold;">F</button>
					  
					  <button class="btn btn-primary"id="G" href="javascript:void(0)" onclick="get_content('G')" style="font-weight:bold;">G</button>
					  <button class="btn btn-primary" id="H" href="javascript:void(0)" onclick="get_content('H')" style="font-weight:bold;">H</button>
					  <button class="btn btn-primary" id="I" href="javascript:void(0)" onclick="get_content('I')" style="font-weight:bold;">I</button>
					  <button class="btn btn-primary" id="J" href="javascript:void(0)" onclick="get_content('J')" style="font-weight:bold;">J</button>
					  <button class="btn btn-primary" id="K" href="javascript:void(0)" onclick="get_content('K')" style="font-weight:bold;">K</button>
					  <button class="btn btn-primary" id="L" href="javascript:void(0)" onclick="get_content('L')" style="font-weight:bold;">L</button>
					  
					  <button class="btn btn-primary" id="M" href="javascript:void(0)" onclick="get_content('M')" style="font-weight:bold;">M</button>
					  <button class="btn btn-primary" id="M" href="javascript:void(0)" onclick="get_content('N')" style="font-weight:bold;">N</button>
					  <button class="btn btn-primary" id="O" href="javascript:void(0)" onclick="get_content('O')" style="font-weight:bold;">O</button>
					  <button class="btn btn-primary" id="P" href="javascript:void(0)" onclick="get_content('P')" style="font-weight:bold;">P</button>
					  <button class="btn btn-primary" id="Q" href="javascript:void(0)" onclick="get_content('Q')" style="font-weight:bold;">Q</button>
					  <button class="btn btn-primary" id="R" href="javascript:void(0)" onclick="get_content('R')" style="font-weight:bold;">R</button>
					  
					  <button class="btn btn-primary"id="S" href="javascript:void(0)" onclick="get_content('S')" style="font-weight:bold;">S</button>
					  <button class="btn btn-primary" id="T" href="javascript:void(0)" onclick="get_content('T')" style="font-weight:bold;">T</button>
					  <button class="btn btn-primary" id="U" href="javascript:void(0)" onclick="get_content('U')" style="font-weight:bold;">U</button>
					  <button class="btn btn-primary" id="V" href="javascript:void(0)" onclick="get_content('V')" style="font-weight:bold;">V</button>
					  <button class="btn btn-primary" id="W" href="javascript:void(0)" onclick="get_content('W')" style="font-weight:bold;">W</button>
					  <button class="btn btn-primary" id="X" href="javascript:void(0)" onclick="get_content('X')" style="font-weight:bold;">X</button>
					  
					  <button class="btn btn-primary" id="Y" href="javascript:void(0)" onclick="get_content('Y')" style="font-weight:bold;">Y</button>
					  <button class="btn btn-primary" id="Z" href="javascript:void(0)" onclick="get_content('Z')" style="font-weight:bold;">Z</button>
						<br>
						
				
	</div>

	<div class="container" >
		<div class="row ">
  <div class="col-sm-1"></div>
 
  <div class="col-sm-10" id="employee_details"></div>
  <div class="col-sm-1"></div>
</div>
		
	</div>
	
	

	
	<div>
		
	</div>
</body>
</html>

<script>
	$(document).ready(function(){
		
		load_data();
		var letter='';
		function load_data(){
			
			$.ajax({
				url:"https://caasaservice.com/PumpIndustry/Pump-Terms-Glossary/fetch.php",
				method:"POST",
				data:{'letter':letter},
				success:function(response)
				{
					$('#employee_details').html(response);
				}
			})
		}
		
		
		
	});
	
	function get_content(letter){
		
		$.ajax({
			url:"https://caasaservice.com/PumpIndustry/Pump-Terms-Glossary/fetch.php",
			method:"POST",
			data:{letter:letter},
			success:function(response)
			{
				$('#employee_details').html(response);
			}
		})
		
		
	}
	
	
	$('button').click(function() {
  $(this).addClass('active').siblings().removeClass('active');
});
	
	
</script>


<? include "../footer.php" ?>