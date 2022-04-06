<?php
include_once('inc/config.php');
include_once('api/config.php');
if(!isset($_SESSION))
    session_start();
if((isset($_SESSION['mandate_status']) && !empty($_SESSION['mandate_status']) || isset($_SESSION['mandate_r_status']) && !empty($_SESSION['mandate_r_status']) || isset($_SESSION['mandate_o_status']) && !empty($_SESSION['mandate_o_status'])) && isset($_SESSION['mandate_id']) && is_numeric($_SESSION['mandate_id']))
{
    $OTP= rand(1000,9999); 
    $CustOTPMsg=$OTP." is the one-time password (OTP) for your enquiry to Aadhar Housing Finance. The OTP will be valid for next 15 mins only.";
	if(isset($_SESSION['mandate_o_status']) && !empty($_SESSION['mandate_o_status']))
		$mobile=$_SESSION['mandate_o_status']['mobile_number'];
	elseif(isset($_SESSION['mandate_r_status']) && !empty($_SESSION['mandate_r_status']))
		$mobile=$_SESSION['mandate_r_status']['mobile_number'];
	else
		$mobile=$_SESSION['mandate_status']['mobile_number'];
    $SentSMS=SendSMS($mobile,$CustOTPMsg);
    $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REQUEST SET MR_OTP='".$OTP."' WHERE MR_ID='" . $_SESSION['mandate_id'] . "'");
    if($_SESSION['type']=='register')
        $_SESSION['otp_r_generated']=true;
	elseif($_SESSION['type']=='otr')
        $_SESSION['otp_o_generated']=true;
    else
        $_SESSION['otp_generated']=true;
    $_SESSION['otp']=$OTP;
}
?>