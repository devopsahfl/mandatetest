<?php
include("inc/config.php");
if (isset($_POST['submit']) && ($_POST['submit'] == 'true')) {
    $startDate =mysqli_real_escape_string($con, $_POST['startDate']);
    $endDate = mysqli_real_escape_string($con, $_POST['endDate']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    //$str=str_replace("/","-","$startDate"."$endDate");
    $startDate = date('Y-m-d', strtotime(str_replace("/", "-", $startDate)));
    $endDate = date('Y-m-d', strtotime(str_replace("/", "-", $endDate)));
    mysqli_set_charset($con,"utf8");
    $todayDate = date('d-m-Y');
    if($type=='cancellation')
    {
        $setRec = mysqli_query($con, "SELECT MR_ID, MR_LOAN_APP_NO, MR_DOB, MR_MOBILE, MR_IS_VERIFIED, MR_CANCEL_REQUEST,MR_CANCEL_REASON, MR_LOAN_STATUS,MR_ECS_STATUS, MR_ADDED_ON FROM MANDATE_REQUEST where MR_IS_VERIFIED='Y' AND MR_CANCEL_REQUEST IS NOT NULL AND MR_REQUEST_TYPE='cancellation' AND Date(`MR_ADDED_ON`) between '" . $startDate . "' and '" . $endDate . "'");
        $startDate = date('dmY', strtotime($startDate));
        $endDate = date('dmY', strtotime($endDate));
        $filename = "Mandate_Cancellation_Report_" .$startDate."_".$endDate.".xls";
        $columnHeader = "ID" . "\t";
        $columnHeader .= "Loan_Application_No" . "\t";
        $columnHeader .= "Date_of_Birth" . "\t";
        $columnHeader .= "Registered_Mobile_No" . "\t";
        $columnHeader .= "OTP_Verified(Y/N)" . "\t";
        $columnHeader .= "Cancel_Mandate_Type" . "\t";
        $columnHeader .= "Cancel_Mandate_Reason" . "\t";
        $columnHeader .= "Loan_Status" . "\t";
        $columnHeader .= "ECS_Status" . "\t";
        // $columnHeader .= "Request Type" . "\t";
        $columnHeader .= "Request_Added_On" . "\t";
    }
    elseif($type=='registration')
    {
        $setRec = mysqli_query($con, "SELECT MRL_ID,MRL_SOURCE_ID, MRL_LOAN_APP_NO, MRL_DOB, MRL_STATUS, MRL_ADDED_ON FROM MANDATE_REGISTRATION_LOG WHERE MRL_SOURCE_ID IS NOT NULL AND Date(`MRL_ADDED_ON`) between '" . $startDate . "' and '" . $endDate . "'");
        $startDate = date('dmY', strtotime($startDate));
        $endDate = date('dmY', strtotime($endDate));
        $filename = "Mandate_Registration_Report_" .$startDate."_".$endDate.".xls";
        $columnHeader = "ID" . "\t";
        $columnHeader .= "Source_ID" . "\t";
        $columnHeader .= "Loan_Application_No" . "\t";
        $columnHeader .= "Date_of_Birth" . "\t";
        // $columnHeader .= "Registered Mobile No" . "\t";
        // $columnHeader .= "OTP Verified(Y/N)" . "\t";
        // $columnHeader .= "Cancel Mandate Type" . "\t";
        // $columnHeader .= "Cancel Mandate Reason" . "\t";
        $columnHeader .= "Status" . "\t";
        // $columnHeader .= "ECS Status" . "\t";
        // $columnHeader .= "Request Type" . "\t";
        $columnHeader .= "Request_Added_On" . "\t";
    }
    elseif($type=='otr')
    {
        $setRec = mysqli_query($con, "SELECT ORL_ID, ORL_MOBILE_NO, ORL_ACC_NO, ORL_DOB, ORL_ADDED_ON FROM OTR_REG_LOG where Date(`ORL_ADDED_ON`) between '" . $startDate . "' and '" . $endDate . "'");
        $startDate = date('dmY', strtotime($startDate));
        $endDate = date('dmY', strtotime($endDate));
        $filename = "OTR_Report_" .$startDate."_".$endDate.".xls";
        $columnHeader = "ID" . "\t";
        $columnHeader .= "Registered_Mobile_No" . "\t";
        $columnHeader .= "Loan_Application_No" . "\t";
        $columnHeader .= "Date_of_Birth" . "\t";
        // $columnHeader .= "Registered Mobile No" . "\t";
        // $columnHeader .= "OTP Verified(Y/N)" . "\t";
        // $columnHeader .= "Cancel Mandate Type" . "\t";
        // $columnHeader .= "Cancel Mandate Reason" . "\t";
        // $columnHeader .= "ECS Status" . "\t";
        // $columnHeader .= "Request Type" . "\t";
        $columnHeader .= "Request_Added_On" . "\t";
    }
    

    // websiteType
    $setData = '';

    while ($rec = mysqli_fetch_row($setRec)) {
        $rowData = '';
        foreach ($rec as $value) {
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData) . "\n";
    }


    header("Content-type: application/octet-stream; charset=utf-8");
    header("Content-Disposition: attachment; filename=" . $filename);
    header("Pragma: no-cache");
    header("Expires: 0");

    echo ucwords($columnHeader) . "\n" . $setData . "\n";
    mysqli_close($con);
    exit;
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    </head>
    <style>
        .datetable{
            margin:100px auto;
        }
        .img-responsive{
            margin: 0 auto;
        }
        .m-t-5 {
            margin-top:5em;
        }
    </style>
    <body>
        <div class="container-fluid">
            <div class="row m-t-5">
                
                <div class="col-sm-4 col-sm-offset-4">
                    <img src="img/logo.png" class="img-responsive">
                    <form action="" method="POST" autocomplete="off" class="datetable">
                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="text" readonly class="form-control" name="startDate" id="startDate">
                        </div>
                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <input type="text" readonly class="form-control" name="endDate" id="endDate">
                        </div>
                        <div class="form-group">
                            <label for="type">Report Type</label>
                            <select class="form-control" id="type" name="type">
                            <option value="registration">Mandate Registration</option>
                                <option value="cancellation">Mandate Cancellation</option>
                                <option value="otr">OTR</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control" name="submit" value="true">Generate Report</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
        <script>
            var bindDateRangeValidation = function (f, s, e) {
                if (!(f instanceof jQuery)) {
                    console.log("Not passing a jQuery object");
                }

                var jqForm = f,
                        startDateId = s,
                        endDateId = e;

                var checkDateRange = function (startDate, endDate) {
                    var isValid = (startDate != "" && endDate != "") ? startDate <= endDate : true;
                    return isValid;
                }

                var bindValidator = function () {
                    var bstpValidate = jqForm.data('bootstrapValidator');
                    var validateFields = {
                        startDate: {
                            validators: {
                                notEmpty: {message: 'This field is required.'}/*,
                                 callback: {
                                 message: 'Start Date must less than or equal to End Date.',
                                 callback: function (startDate, validator, $field) {
                                 return checkDateRange(startDate, $('#' + endDateId).val())
                                 }
                                 }*/
                            }
                        },
                        endDate: {
                            validators: {
                                notEmpty: {message: 'This field is required.'}/*,
                                 callback: {
                                 message: 'End Date must greater than or equal to Start Date.',
                                 callback: function (endDate, validator, $field) {
                                 return checkDateRange($('#' + startDateId).val(), endDate);
                                 }
                                 }*/
                            }
                        },
                        customize: {
                            validators: {
                                customize: {message: 'customize.'}
                            }
                        }
                    }
                    if (!bstpValidate) {
                        jqForm.bootstrapValidator({
                            excluded: [':disabled'],
                        })
                    }

                    jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
                    jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);

                };

                var hookValidatorEvt = function () {
                    var dateBlur = function (e, bundleDateId, action) {
                        jqForm.bootstrapValidator('revalidateField', e.target.id);
                    }

                    $('#' + startDateId).on("dp.change dp.update blur", function (e) {
                        $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
                        dateBlur(e, endDateId);
                    });

                    $('#' + endDateId).on("dp.change dp.update blur", function (e) {
                        $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
                        dateBlur(e, startDateId);
                    });
                }

                bindValidator();
                hookValidatorEvt();
            };


            $(function () {
                var sd = new Date(), ed = new Date();

                $('#startDate').datetimepicker({
                    pickTime: false,
                    format: "DD/MM/YYYY",
                    defaultDate: sd,
                    maxDate: (new Date()).getDate()
                });

                $('#endDate').datetimepicker({
                    pickTime: false,
                    format: "DD/MM/YYYY",
                    defaultDate: ed,
                    minDate: sd,
                    maxDate: (new Date()).getDate()
                });

                //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
                bindDateRangeValidation($("#form"), 'startDate', 'endDate');
            });</script>        
    </body>
</html>

