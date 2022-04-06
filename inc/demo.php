<?php
$email='nirav.patel@interactive.in';
$subject='demo email';
$body='Hello This is testing';
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/PHPMailer/PHPMailerAutoload.php";
    require_once "$root/PHPMailer/PHPMailer.php";
    require_once "$root/PHPMailer/SMTP.php";
    $mail = new PHPMailer;                        
    $mail->isSMTP();                                     
    //$mail->Host = 'outlook.office365.com';
    //$mail->SMTPAuth = true;                              
    //$mail->Username = 'noreply@aadharhousing.com';              
    //$mail->Password = 'password@123';                          
    //$mail->SMTPSecure = 'tls';                          
    //$mail->Port = 587;                                  
    //$mail->setFrom('noreply@aadharhousing.com', 'Test');

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                              
    $mail->Username = 'bhavesh.patel@interactive.in';              
    $mail->Password = 'bhavesh123';                          
    $mail->SMTPSecure = 'tls';                          
    $mail->Port = 587;                                  
    $mail->setFrom('bhavesh.patel@interactive.in', 'Test');


    $mail->addAddress($email);   
    $mail->addReplyTo('bhavesh.patel@interactive.in', 'Test');
    $mail->isHTML(true);                               
    $mail->Subject = html_entity_decode($subject, ENT_QUOTES, 'UTF-8');
    $mail->Body = $body;
    //send the message, check for errors
    if (!$mail->send()) {
        $msg = $mail->ErrorInfo;
        } else {
        $msg = "Sent";
    }    
    echo $msg;
?>