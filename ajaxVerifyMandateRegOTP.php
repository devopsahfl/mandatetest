<?php
include_once('inc/config.php');
include_once('api/config.php');
if(!isset($_SESSION))
    session_start();
if(isset($_POST['otp']) && !empty($_POST['otp']))
{
    $otp = mysqli_real_escape_string($con, $_POST['otp']);
    $id=$_SESSION['mandate_id'];
    $FetchDetailsQuery = mysqli_query($con, "SELECT * FROM `MANDATE_REQUEST` WHERE MR_ID='" . $id . "' AND MR_OTP='" . $otp . "' AND MR_IS_VERIFIED='N'");
    $loan_status=(isset($_SESSION['mandate_r_status']['loan_status']))?$_SESSION['mandate_r_status']['loan_status']:'';
    $ecs_status=(isset($_SESSION['mandate_r_status']['ecs_status']))?$_SESSION['mandate_r_status']['ecs_status']:'';
    $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REQUEST SET MR_LOAN_STATUS ='{$loan_status}', MR_ECS_STATUS='{$ecs_status}' WHERE MR_ID='" . $id . "'");
    if (mysqli_num_rows($FetchDetailsQuery) > 0) {
        $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REQUEST SET MR_IS_VERIFIED ='Y',MR_VERIFIED_ON='".date('Y-m-d H:i:s')."' WHERE MR_ID='" . $id . "'");
        if($loan_status!='Active')
        {    
            echo "lsc";
            unset($_SESSION);
            session_destroy();
        }
        elseif($ecs_status=='Active')
        {    
            echo "esa";
            unset($_SESSION);
            session_destroy();
        }
        else
        {
            $mandateDetailsResponse=getMandateDetails($_SESSION['mandate_r_status']['application_id'],$_SESSION['token']);
            $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REQUEST SET MR_MAND_DETAIL_API_RESP ='".json_encode($mandateDetailsResponse)."' WHERE MR_ID='" . $id . "'");
            if(!empty($mandateDetailsResponse))
            {
                $mandateDetails=json_decode(json_encode($mandateDetailsResponse),true);
                if(isset($mandateDetails['achmandate_details']['error_code']) && $mandateDetails['achmandate_details']['error_code']=='00')
                {    
                    $_SESSION['mandate_detail_shown']=true;
                    $_SESSION['mandate_details']=$mandateDetails['achmandate_details'];
                    echo "true";
                }
                else
                {
                    echo "ndf";
                    unset($_SESSION);
                    session_destroy();
                }
            }
            else
            {
                echo "ndf";
                unset($_SESSION);
                session_destroy();
            }
        }
        /* unset($_SESSION);
        session_destroy(); */
    }
    else
        echo "false";
} 