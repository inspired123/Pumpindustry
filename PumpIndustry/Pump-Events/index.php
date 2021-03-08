<?php include "../header.php" ?>
<style>
	hr{
	border-top: 1px solid #b73640 !important;
	
	}
	.form-control{
	    
	width:50%!important;
	}

	body{margin-top:20px;}

.section {
   
    position: relative;
}
.gray-bg {
    background-color: #ebf4fa;
}
/* Blog 
---------------------*/
.blog-grid {
  margin-top: 15px;
  margin-bottom: 15px;
}
.blog-grid .blog-img {
  position: relative;
  border-radius: 5px;
  overflow: hidden;
}
.blog-grid .blog-img .date {
  position: absolute;
  background: #3a3973;
  color: #ffffff;
  padding: 8px 15px;
  left: 0;
  top: 10px;
  font-size: 14px;
}
.blog-grid .blog-info {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  background: #ffffff;
  padding: 20px;
  margin: -30px 20px 0;
  position: relative;
}
.blog-grid .blog-info h5 {
  font-size: 22px;
  font-weight: 500;
  margin: 0 0 10px;
}
.blog-grid .blog-info h5 a {
  color: #3a3973;
}
.blog-grid .blog-info p {
  margin: 0;
}
.blog-grid .blog-info .btn-bar {
  margin-top: 20px;
}

.px-btn-arrow {
    padding: 0 50px 0 0;
    line-height: 20px;
    position: relative;
    display: inline-block;
    color: #fe4f6c;
    -moz-transition: ease all 0.3s;
    -o-transition: ease all 0.3s;
    -webkit-transition: ease all 0.3s;
    transition: ease all 0.3s;
}


.px-btn-arrow .arrow {
    width: 13px;
    height: 2px;
    background: currentColor;
    display: inline-block;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    right: 25px;
    -moz-transition: ease right 0.3s;
    -o-transition: ease right 0.3s;
    -webkit-transition: ease right 0.3s;
    transition: ease right 0.3s;
}

.px-btn-arrow .arrow:after {
    width: 8px;
    height: 8px;
    border-right: 2px solid currentColor;
    border-top: 2px solid currentColor;
    content: "";
    position: absolute;
    top: -3px;
    right: 0;
    display: inline-block;
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
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
<section class="section gray-bg" id="blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <div class="section-title">
                            <h2>Latest Events</h2>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="blog-grid">
                            <div class="blog-img">
                                <div class="date">04 FEB</div>
                                <a href="#">
                                    <img src="https://hire4event.com/blogs/wp-content/uploads/2019/07/Corporate-Events-and-Artist-Performance-750x395.jpg" title="" alt="" style="height:250px;width=280px">
                                </a>
                            </div>
                            <div class="blog-info">
                                <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                                <div class="btn-bar">
                                    <a href="#" class="px-btn-arrow">
                                        <span>Read More</span>
                                        <i class="arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-grid">
                            <div class="blog-img">
                                <div class="date">04 FEB</div>
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgTLSgcXxcjXqCjcPJmKZ_NlcwiUeBVIWx3g&usqp=CAU" title="" alt="" style="height:250px;width=280px">
                                </a>
                            </div>
                            <div class="blog-info">
                                <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                                <div class="btn-bar">
                                    <a href="#" class="px-btn-arrow">
                                        <span>Read More</span>
                                        <i class="arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-grid">
                            <div class="blog-img">
                                <div class="date">04 FEB</div>
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyU7ZPry9r8q8B37BKSiUpRRFPb6tfT0Y41A&usqp=CAU" title="" alt="" style="height:250px;width=280px">
                                </a>
                            </div>
                            <div class="blog-info">
                                <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                                <div class="btn-bar">
                                    <a href="#" class="px-btn-arrow">
                                        <span>Read More</span>
                                        <i class="arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
        </section>

		
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