<?php
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;                         
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;                               
        $mail->Username = 'vijay.bisht@interactive.in';               
        $mail->Password = 'mind@2204';                           
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 587;                                   
        $mail->setFrom('vijay.bisht@interactive.in', 'Test');
        $mail->addAddress('saptarshi.bose@interactive.in');    
        $mail->addReplyTo('vijay.bisht@interactive.in', 'Test');
        $mail->isHTML(true);                                
        $mail->Subject = html_entity_decode('Test Mail', ENT_QUOTES, 'UTF-8');
        $mail->Body = 'Please Find Attached File';
        $mail->send();
    
?>