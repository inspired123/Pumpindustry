	<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;2006-2018 All rights reserved |  by <a href="https://PumpIndustry.com" target="_blank">PumpIndustry.com</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>								
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
							<div class="outside-container">
	<div class="newsletter-area">
		
	
		<span class="email-message" id="email_msg"></span>
		<form method="post">
			<input type="email" name="useremail" placeholder="YourEmail@email.com" class="email-box" maxlength="60" id="email_data">
		
			<button class="submit-button" type="button" id="email_submit"><i class="fa fa-long-arrow-right" style="color: white;background-color: #f8c405;padding: 14px;margin: 0px 0 0 -4px;" aria-hidden="true"></i></button>
		</form>
	</div>
</div>
								</div>
							</div>
						</div>	





<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
	
$(document).ready(function (){

	$("#email_submit").click(function (){

     /*	var email_data = $("#email_data").val();*/
		var $email_data_var;
		$email_data_var = $("#email_data").val();
		if($email_data_var == ''){
			$("#email_msg").html("Please Enter a Email Address");
		}
		else{

			$.ajax({

				type:'POST',
				url:"https://caasaservice.com/PumpIndustry/ajax/email-submit.php",
				data:{email_data_values : $email_data_var},
				success:function(response){
					$("#email_msg").html(response);
				}

			});
			
	       /* $.ajax({
	            url: "https://caasaservice.com/PumpIndustry/subscribe-mail.php",
	            type:'POST',
	            dataType: "json",
	            data: {email_data:email_data},
	           	success: function(response) {
	                if (response.success == true) {
				//	window.location.href='thankyou.html';
				$('.form-group').removeClass('has-error')
								.removeClass('has-success');
				$('.text-danger').remove();

			$('#super').html('<h5 style="color:green;">'+response.text+'</h5>');

		$(".display-error").hide();
			$("#contact-form").trigger("reset");
			return true;

				}else{
				$(".display-error").html("<ul>"+response.error+"</ul>");
                    $(".display-error").css("display","block");

				$('#super').html('');
				return false;
				}

	            }
	        });*/

		}

	});

});

</script>						
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
							                 	<a href="https://www.facebook.com/Pump-Industry-120516858033092"><i class="fa fa-facebook"></i></a>
							                 	<a href="https://twitter.com/PumpIndustry"><i class="fa fa-twitter"></i></a>
							                	<a href="https://www.linkedin.com/groups/3938215/"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->	

			<script src="../js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="../js/easing.min.js"></script>			
			<script src="../js/hoverIntent.js"></script>
			<script src="../js/superfish.min.js"></script>	
			<script src="../js/jquery.ajaxchimp.min.js"></script>
			<script src="../js/jquery.magnific-popup.min.js"></script>	
			<script src="../js/owl.carousel.min.js"></script>	
			<script src="../js/hexagons.min.js"></script>							
			<script src="../js/jquery.nice-select.min.js"></script>	
			<script src="../js/jquery.counterup.min.js"></script>
			<script src="../js/waypoints.min.js"></script>							
			<script src="../js/mail-script.js"></script>	
			<script src="../js/main.js"></script>	
		</body>
	</html>



