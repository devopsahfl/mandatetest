<?php
// error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Kolkata");
$con = mysqli_connect("localhost","root","RFV5tgb","aadharhousing");

//$con = mysqli_connect("localhost","root","bitnami","adhaarhousing");

//$con = mysqli_connect("localhost","root","","adhaarhousing");

//$con = mysqli_connect("localhost","root","Samurai@8112","aadharhousing");

// Check connection
if (mysqli_connect_errno())
die("Failed to connect to MySQL: " . mysqli_connect_error());

mysqli_set_charset($con, 'utf8');

/* function sendmail($email,$body,$subject)
{       
    $msg = array();    
    //Create a new PHPMailer instance
    $mail = new PHPMailer;    
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();    
    //$mail->SMTPDebug = 1;
    //Set who the message is to be sent from
    $mail->setFrom('noreply@aadharhousing.com', 'Aadhar Housing');
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
    return $msg;    
} */
function sendmail($email,$body,$subject)
{       
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/PHPMailer/PHPMailerAutoload.php";
    require_once "$root/PHPMailer/PHPMailer.php";
    require_once "$root/PHPMailer/SMTP.php";
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'outlook.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'No-Reply@aadharhousing.com';
    $mail->Password = 'password@123';
    //$mail->Username = 'noreply@aadharhousing.com';
    //$mail->Password = 'password@123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('No-Reply@aadharhousing.com', 'Aadhar Housing');
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
    return $msg;    
}

function sendmailhindi($email,$body,$subject)
{       
    require_once '../PHPMailer/PHPMailerAutoload.php';
    require_once '../PHPMailer/PHPMailer.php';
    require_once '../PHPMailer/SMTP.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'outlook.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply@aadharhousing.com';
    $mail->Password = 'password@123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('noreply@aadharhousing.com', 'Aadhar Housing');
    $mail->addBCC('bhavesh.patel@interactive.in');
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
    return $msg;    
}

// function SendSMS($mobile_number,$message)
// {
// 	$request =""; 
// 	$param['method']= "SendMessage";
// 	$param['send_to'] = $mobile_number;
// 	$param['msg'] = $message;
// 	$param['userid'] = "2000180635";
// 	$param['password'] = "2ewnVFkVA";
// 	$param['v'] = "1.1";
// 	$param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
// 	$param['auth_scheme'] = "PLAIN";

// 	foreach($param as $key=>$val) {
// 	$request.= $key."=".urlencode($val);
// 	$request.= "&";
// 	}
// 	$request = substr($request, 0, strlen($request)-1);
// 	$url ="http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
// 	$ch = curl_init($url);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	$curl_scraped_page = curl_exec($ch);
// 	curl_close($ch);
// 	return $curl_scraped_page;
// }

function SendSMS($mobile_number,$message){

    $request ="";   
   
    $params = array();

    $params['username'] = "adhfl_mark_tr";
    $params['password'] = "gnIT_86-";
    // $params['from'] = "AADHAR";
    $params['from'] = "AHFLCO";
    $params['to'] = $mobile_number;
    $params['text'] = $message;

    foreach($params as $key=>$val) {
        $request.= $key."=".urlencode($val);
        $request.= "&";
    }

    $request = substr($request, 0, strlen($request)-1);

    $url ="https://api.equence.in/pushsms?".$request;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_PROXY, '10.130.1.1');
    curl_setopt($ch, CURLOPT_PROXYPORT, '8080');
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);
    
    return $curl_scraped_page;

}

function SendSMSAlert($mobile_number,$message, $data1){

    $request ="";   
   
    $params = array();

    $params['username'] = "adhfl_mark_tr";
    $params['password'] = "gnIT_86-";
    //$params['from'] = "AADHAR";
    $params['from'] = "AHFLCO";
    $params['to'] = $mobile_number;
    $params['text'] = $message;
    $params['data1'] = $data1;

    foreach($params as $key=>$val) {
        $request.= $key."=".urlencode($val);
        $request.= "&";
    }

    $request = substr($request, 0, strlen($request)-1);

    $url ="https://api.equence.in/pushsms?".$request;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);
    
    return $curl_scraped_page;

}
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}