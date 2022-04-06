<?php
include_once('inc/config.php');
include_once('api/config.php');
if(!isset($_SESSION))
    session_start();
if(isset($_POST['agreeCheck']) && !empty($_POST['agreeCheck']) && isset($_SESSION['mandate_id']) && !empty($_SESSION['mandate_id']) && $_SESSION['mandate_o_applied'] && $_SESSION['otp_o_generated']) 
{
    $id=$_SESSION['mandate_id'];
    $InsertRegDetailsQuery = mysqli_query($con, "INSERT INTO OTR_REG_LOG (ORL_MOBILE_NO, ORL_ACC_NO, ORL_DOB, ORL_ADDED_ON, ORL_ENQ_ID) VALUES ('{$_SESSION['mandate_o_status']['mobile_number']}', '{$_SESSION['loan_app_no']}', '{$_SESSION['dob']}', '".date('Y-m-d H:i:s')."','{$_SESSION['mandate_id']}')");
    $mobile=$_SESSION['mandate_o_status']['mobile_number'];
    $CustMsg="Dear Customer, the OTR request for your AHFL Loan Application No ".$_SESSION['loan_app_no']." has been received. Our team will review the application and share a status update soon.";
    $SentSMS=SendSMS($mobile,$CustMsg);
    if($InsertRegDetailsQuery)
        $status='true';
    else
        $status='false';
    $returnArr=array(
        'status'=>$status
    );
    unset($_SESSION);
    session_destroy();
    // echo "true";
}
else
$returnArr=array(
    'status'=>'false'
);
echo json_encode($returnArr,true);
?>