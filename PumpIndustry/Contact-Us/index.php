<? include "../header.php" ?>

<body>
    
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="../">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="Contact"> Contact Us</a></p>
						</div>	
					</div>
				</div>
			</section>
		<body>
  
 
	<div class="container-contact100" style="padding:50px 0 50px 0;">
	  
		<div class="wrap-contact100">
		  
			<form class="contact100-form validate-form" action="mail.php" method="post" name="form" id="contact-form" class="contact-form" novalidate="novalidate">
				<span class="contact100-form-title">
					Send Us A Message
				</span>
				<div> <span id="super"></span>
<div class="alert alert-danger display-error" style="display: none; width: 150%;" >
    </div>
    </div>

				<label class="label-input100" for="first-name">Tell us your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="name9" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email9" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100">
					<input id="mobile9" class="input100" type="text" name="phone" placeholder="Eg. +91 8899776655">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="comments9" class="input100" name="message" placeholder="Write us a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit"  id="submit"name="submit-form">
						Send Message
					</button>
					<div id="loading" style="display:none"><img src="../images/ajax-loader.png" alt="loading"></div>
											<div class="contact-form-message"></div>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('../img/p1.jpg');padding: 11rem 0 0 8rem;">
				<div class="flex-w size1 p-b-47" >
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt2">
					+91 9000303003 
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt2">
						krishnareddyk@yahoo.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	    
<script type="text/javascript">




	$(document).ready(function() {
	   
	    $("#submit").click(function(e){
	    	e.preventDefault();


	    	var name9 = $("#name9").val();
	    	var email9 = $("#email9").val();
	    	var mobile9 = $("#mobile9").val();
	    	var comments9 = $("#comments9").val();


	        $.ajax({
	            url: "mail.php",
	            type:'POST',
	            dataType: "json",
	            data: {name9:name9, email9:email9, mobile9:mobile9, comments9:comments9},
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
	        });


	    });


	});



</script>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
    
    
</body>
<? include "../footer.php" ?>