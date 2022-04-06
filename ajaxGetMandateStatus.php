<?php
include_once('inc/config.php');
include_once('api/config.php');
if(!isset($_SESSION))
    session_start();
if(isset($_POST['app_no']) && !empty($_POST['app_no']) && isset($_POST['dob']) && !empty($_POST['dob']))
{
    $app_no = trim(mysqli_real_escape_string($con, $_POST['app_no']));
    $_SESSION['token'] = createToken(strlen($app_no));
	$dob = date('Y-m-d',strtotime($_POST['dob']));
    $mandateStatusResponse=getMandateStatus($app_no,$dob,$_SESSION['token']);
    if(!empty($mandateStatusResponse))
    {
        $_SESSION['loan_app_no']=$app_no;
        $_SESSION['dob']=$dob;
        $mandateDetails=json_decode(json_encode($mandateStatusResponse),true);
        if(isset($mandateDetails['mandate_status']['error_code']) && $mandateDetails['mandate_status']['error_code']=='00')
        {    
            /* if(isset($mandateDetails['mandate_status']['loan_status']) && $mandateDetails['mandate_status']['loan_status']!='Active')
            {    
                echo "lsc";
            }
            elseif(isset($mandateDetails['mandate_status']['ecs_status']) && $mandateDetails['mandate_status']['ecs_status']!='Active')
            {    
                echo "esc";
            }
            else
            { */
                // $request_type=($_SESSION['type']=='register')?'registration':'cancellation';
				 if($_SESSION['type']=='register')
				{
					$request_type='registration';
				}
				elseif($_SESSION['type']=='otr')
				{
					$request_type='otr';
				}
				else
				{
					$request_type='cancellation';
				}
                $insert_apply_query= mysqli_query($con,"INSERT INTO `MANDATE_REQUEST` (`MR_LOAN_APP_NO`, `MR_DOB`, `MR_MOBILE`, `MR_ADDED_ON`, `MR_MAND_API_RESP`,`MR_REQUEST_TYPE`) VALUES ('".$app_no."','".$dob."','".$mandateDetails['mandate_status']['mobile_number']."','".date('Y-m-d H:i:s')."','".json_encode($mandateStatusResponse)."','{$request_type}')");
                $_SESSION['mandate_id']=mysqli_insert_id($con);
                if($_SESSION['type']=='register')
                {
                    $_SESSION['mandate_r_applied']=true;
                    $_SESSION['mandate_r_status']=$mandateDetails['mandate_status'];
                }
				elseif($_SESSION['type']=='otr')
				{
					$_SESSION['mandate_o_applied']=true;
					$_SESSION['mandate_o_status']=$mandateDetails['mandate_status'];
				}
                else
                {
                    $_SESSION['mandate_applied']=true;
                    $_SESSION['mandate_status']=$mandateDetails['mandate_status'];
                }
                echo "true";
           /*  } */
        }
        else
        {
            echo "ndf";
        }
    }
    else
    {
        echo "ndf";
    }
}
else
echo "false";
?>