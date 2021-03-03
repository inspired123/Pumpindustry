<?php


$errorMSG = "";


/* NAME */
if (empty($_POST["name9"])) {
    $errorMSG = "<li>Name is required</<li>";
} else {
    $name9 = $_POST["name9"];
}


/* EMAIL */
if (empty($_POST["email9"])) {
    $errorMSG .= "<li>Email is required</li>";
} else if(!filter_var($_POST["email9"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "<li>Invalid email format</li>";
}else {
    $email9 = $_POST["email9"];
}

if (empty($_POST["mobile9"])) {
    $errorMSG .= "<li>Mobile no is required</li>";
} else {
    $mobile9 = $_POST["mobile9"];
}




if (empty($_POST["comments9"])) {
    $errorMSG .= "<li>Comment is required</li>";
} else {
    $comments9 = $_POST["comments9"];
}


if(empty($errorMSG)){
	
	
	$to = 'krishnareddyk@yahoo.com';
		//$to='contact@inspiredinfotech.com';
$subject = $_POST['name9'].' contact to you';
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
    <th style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #B2CFD8;">Name</th>
    <th style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #B2CFD8;">Email</th>
    	<th style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #B2CFD8;">Mobile no</th>
	<th style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #B2CFD8;">Subject</th>
	<th style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #B2CFD8;">comment</th>
  </tr>
  </thead>
  <tbody>
  <tr style="">
    <td style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #ffffff;">'.$_POST['name9'].'</td>
    <td style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #ffffff;">'.$_POST['email9'].'</td>
        <td style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #ffffff;">'.$_POST['mobile9'].'</td>
	<td style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #ffffff;">'.$_POST['course9'].'</td>
	<td style="border-width: 1px; padding: 8px; border-style: solid; border-color: #517994; background-color: #ffffff;">'.$_POST['comments9'].'</td>
  </tr>
</tbody>  
</table>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
        echo json_encode(array('success'=>true,'text'=>'Thank you for contacting us – we will get back to you soon'));
} else{
   // echo 'Unable to send email. Please try again.';
   echo json_encode(array('success'=>false,'text'=>'bye'));
}
	
		exit;
	
	

}

 echo json_encode(array('success'=>false,'error'=>$errorMSG));



?>