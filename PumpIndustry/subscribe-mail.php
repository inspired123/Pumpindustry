<?php


$errorMSG = "";


/* NAME */
if (empty($_POST["email_data"])) {
    $errorMSG = "<li>email is required</<li>";
} else {
    $email_data = $_POST["email_data"];
}





if(empty($errorMSG)){
	
	
	$to = 'knarasimha615@gamil.com';
		//$to='contact@inspiredinfotech.com';
$subject = $_POST['email_data'].' contact to you';
$from = 'connect@WebSolutionsForMe.com';
 $Cc="knarasimha615@gmail.com";
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
'Cc: '.$Cc."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<h2 style="text-align:center;">Contact datails </h2><br><table style="font-family: verdana, arial, sans-serif; font-size: 11px; color: #333333; border-width: 1px; border-color: #3A3A3A; border-collapse: collapse;">
  <thead>
  <tr style="">
     <th style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #B2CFD8;">Email</th>
  </tr>
  </thead>
  <tbody>
  <tr style="">
       <td style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #ffffff;">'.$_POST['email_data'].'</td>
  </tr>
</tbody>  
</table>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
        echo json_encode(array('success'=>true,'text'=>'Thank you for contacting us'));
} else{
   // echo 'Unable to send email. Please try again.';
   echo json_encode(array('success'=>false,'text'=>'bye'));
}
	
		exit;
	
	

}

 echo json_encode(array('success'=>false,'error'=>$errorMSG));



?>