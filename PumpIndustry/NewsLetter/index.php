



<div class="outside-container">
	<div class="newsletter-area">
		
	
	
		<form method="post">
			<input type="email" name="useremail" placeholder="YourEmail@email.com" class="email-box" maxlength="60" id="email_data">
			<span class="email-message" id="email_msg"></span>
			<button class="submit-button" type="button" id="email_submit">Send</button>
		</form>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
	
$(document).ready(function (){

	$("#email_submit").click(function (){

		var $email_data_var;
		$email_data_var = $("#email_data").val();
		if($email_data_var == ''){
			$("#email_msg").html("Please Enter a Email Address");
		}
		else{

			$.ajax({

				type:'POST',
				url:"ajax/email-submit.php",
				data:{email_data_values : $email_data_var},
				success:function(response){
					$("#email_msg").html(response);
				}

			});

		}

	});

});

</script>
