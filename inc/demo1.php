<?php
$email='nirav.patel@interactive.in';
//$email='bhavesh.patel@interactive.in';
$subject="testing";
$body= "this is html body.";
 $root = realpath($_SERVER["DOCUMENT_ROOT"]);
 require_once "$root/PHPMailer/PHPMailerAutoload.php";
 require_once "$root/PHPMailer/PHPMailer.php";
 require_once "$root/PHPMailer/SMTP.php";
 $mail = new PHPMailer;
 $mail->isSMTP();
 $mail->SMTPDebug = 2;
 $mail->Host = 'outlook.office365.com';
 $mail->SMTPAuth = true;
 $mail->Username = 'noreply@aadharhousing.com';
 $mail->Password = 'password@123';
 $mail->SMTPSecure = 'tls';
 $mail->Port = 587;
 $mail->setFrom('noreply@aadharhousing.com', 'Aadhar Housing');
 //$mail->addBCC('bhavesh.patel@interactive.in');
 //Set who the message is to be sent to
 $mail->addAddress($email);       
 $mail->IsHTML(true);    
 $mail->Subject = $subject;
 
 $mail->msgHTML($body); 
 //send the message, check for errors
 if (!$mail->send()) {
     $msg = $mail->ErrorInfo;
     } else {
     $msg = "Sent";
 }    
 echo $msg;
 ?>
