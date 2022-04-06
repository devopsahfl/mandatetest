<?php
include_once('inc/config.php');
include_once('api/config.php');
if(!isset($_SESSION))
    session_start();
if(isset($_SESSION['mandate_id']) && !empty($_SESSION['mandate_id']))
{
    $id=$_SESSION['mandate_id'];
    $UpdateDetailsQuery = mysqli_query($con, "UPDATE MANDATE_REQUEST SET MR_CANCEL_REQUEST ='continue',MR_CANCEL_ADDEDON='".date('Y-m-d H:i:s')."' WHERE MR_ID='" . $id . "'");
    unset($_SESSION);
    session_destroy();
    echo "true";

}
else
echo "false";
?>