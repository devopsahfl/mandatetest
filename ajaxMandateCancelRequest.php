<?php
include_once('inc/config.php');
include_once('api/config.php');
if(!isset($_SESSION))
    session_start();
if(isset($_POST['proceed']) && !empty($_POST['proceed']) && isset($_SESSION['mandate_id']) && !empty($_SESSION['mandate_id']))
{
    $id=$_SESSION['mandate_id'];
    $mobile=$_SESSION['mandate_status']['mobile_number'];
    $cancel_reason = mysqli_real_escape_string($con, $_POST['cancel_reason']);
    $type = mysqli_real_escape_string($con, $_POST['proceed']);
    if($type=='Y')
    {
        $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REQUEST SET MR_CANCEL_REQUEST ='cancel',MR_CANCEL_ADDEDON='".date('Y-m-d H:i:s')."',MR_CANCEL_REASON='{$cancel_reason}' WHERE MR_ID='" . $id . "'");
        $CustMsg="Your request for cancellation of NACH mandate is submitted. We’ll get back to you with status soon.";
        $SentSMS=SendSMS($mobile,$CustMsg);
        echo "cancel";
    }
    if($type=='C')
    {
        $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REQUEST SET MR_CANCEL_REQUEST ='continue',MR_CANCEL_ADDEDON='".date('Y-m-d H:i:s')."' WHERE MR_ID='" . $id . "'");
	$CustMsg="Your request for cancellation of NACH mandate is submitted. We’ll get back to you with status soon.";
        $SentSMS=SendSMS($mobile,$CustMsg);
        echo "continue";
    }
    unset($_SESSION);
    session_destroy();
    // echo "true";
}
else
echo "false";
?>