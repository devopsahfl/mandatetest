<?php
include_once('inc/config.php');
include_once('api/config.php');
if(!isset($_SESSION))
    session_start();
if($_SESSION['mandate_r_applied'] && $_SESSION['otp_r_generated'] && $_SESSION['mandate_detail_shown'])
{
    $mandateProcessDetails=json_decode(json_encode(registerMandateProcess($_SESSION['mandate_details'])),true);
    $loanApplicationNo=$_SESSION['loan_app_no'];
    $dob=$_SESSION['dob'];
    $insertMandateDetails= mysqli_query($con,"INSERT INTO `MANDATE_REGISTRATION_LOG` (`MRL_API_RESPONSE`, `MRL_ADDED_ON`,`MRL_STATUS`,`MRL_LOAN_APP_NO`,`MRL_DOB`) VALUES ('".json_encode($mandateProcessDetails)."','".date('Y-m-d H:i:s')."','failed','{$loanApplicationNo}','{$dob}')");
    $lastInsertedID=mysqli_insert_id($con); 
    if(isset($mandateProcessDetails['id']) && isset($mandateProcessDetails['redirect']) && isset($mandateProcessDetails['nach_debit']) && isset($mandateProcessDetails['status']))
    {
        $sourceID=$mandateProcessDetails['id'];
        $status=$mandateProcessDetails['status'];
        
        $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REGISTRATION_LOG SET MRL_SOURCE_ID ='".$sourceID."', MRL_STATUS='".$status."' WHERE MRL_ID='".$lastInsertedID."'");
        $url=isset($mandateProcessDetails['redirect']['url'])?$mandateProcessDetails['redirect']['url']:'';
        if(!empty($url))
        {
            $returnArr=array(
                'status_code'=>'00',
                'data'=>$url
            );
        }
        else
        {
            $returnArr=array(
                'status_code'=>'01',
                'error'=>''
            );
        }
    }
    else
    {
        $error='Something went wrong. Please try again later.';
        if(isset($mandateProcessDetails['error']) && $mandateProcessDetails['error']['code']=='parameter_invalid')
        {
            if($mandateProcessDetails['error']['param']=='nach_debit.debtor_account_name')
                $error='There are special characters mentioned in Bank Account Holder’s name. We are unable to proceed with E-Mandate Registration.You may visit the concerned AHFL branch to correct the Bank account holder details.';
            if($mandateProcessDetails['error']['param']=='Amount must be between Rs 1.0 and Rs 1000000.0')
                $error='Your EMI amount should be between Re 1 to Rs 10,00,000. We cannot process Mandate Registration. In case of any issue/query related to E-Mandate Registration, you may contact the nearest AHFL branch.';
            if($mandateProcessDetails['error']['param']=='nach_debit.debtor_agent_code')
                $error='Mentioned bank is a ‘Non participative bank’ for E-Mandate Registration. Kindly visit AHFL branch and submit physical NACH Mandate.<br/>In case of any issue/query related to E-mandate registration, you may contact Aadhar Housing Finance Ltd.';
            if($mandateProcessDetails['error']['param']=='nach_debit.debtor_account_number')
                $error='Account .';
			if($mandateProcessDetails['error']['param']=='nach_debit.debtor_agent_mmbid')
                $error='Invalid IFSC Code.';
                // substr("Hello world",0,10)
        }
        
        $returnArr=array(
            'status_code'=>'02',
            'error'=>$error
        );
    }
}
else
    $returnArr=array(
        'status_code'=>'03',
        'error'=>''
    );
unset($_SESSION);
session_destroy();
echo json_encode($returnArr);
?>