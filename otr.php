<?php
if (isset($_GET["utm_source"]) && $_GET["utm_source"] != "") {
    $utmSource = $_GET["utm_source"];
} else {
    $utmSource = "";
}
if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['type'] = 'otr';
if (!isset($_SESSION['mandate_o_applied'])) {
    $_SESSION['mandate_o_applied'] = false;
}

if (!isset($_SESSION['otp_o_generated'])) {
    $_SESSION['otp_o_generated'] = false;
}

// session_destroy();
include_once 'inc/config.php';
include_once 'api/config.php';
$_SESSION['token'] = createToken();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aadhar Housing Finance Ltd (AHFL)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="One Time Restructuring (OTR) Request" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="One Time Restructuring (OTR) Request" />
    <link rel="canonical" href="https://pay.aadharhousing.com/mandate/otr.php" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="One Time Restructuring (OTR) Request" />
    <meta property="og:description" content="One Time Restructuring (OTR) Request" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Aadhar Housing Finance Ltd" />
    <!-- <script src="https://js.lotuspay.com/"></script>
    <link rel="stylesheet" href="css/normalize.css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <!-- <link rel="stylesheet" href="css/bootstrap-slider.css">    -->
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css">

    <link rel="Stylesheet" type="text/css" href="css/carousel.css" />

    <script src="https://use.fontawesome.com/65c25715a6.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#agreeCheck").click(function() {
                if ($("#agreeCheck").is(':checked')) {
                    //alert("ok");
                    $("#btnsubmit,#MandateCancelBtn,#MandateContinueBtn,#myLpBtn").removeAttr('disabled');
                } else {

                    $("#btnsubmit,#MandateCancelBtn,#MandateContinueBtn,#myLpBtn").attr('disabled', 'disabled');
                }
            });
        });
    </script>
    <style>
        html,
        body {
            -webkit-font-smoothing: antialiased;
        }

        ::i-block-chrome,
        .navbar-nav.top-links {
            margin-top: 40px;
        }
    </style>
    <!-- END Global site tag (gtag.js) - Google Ads: 876788505 -->
    <style>
        @media (max-width:767px) {
            .navbar-toggle {
                display: flex !important;
                align-items: center;
                position: relative;
                top: -6px;
            }

            .menu-text {
                position: relative;
                top: 6px;
                font-weight: 500;
            }
        }
    </style>

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <div class="wrapper">

        


        <style>
            .forminput {
                border-radius: 0;
                border: 1px solid #ea2225;
                background: #fff;
            }

            .form-control[readonly] {
                background-color: #fff !important;
                border: none;
            }

            .date {
                border: 1px solid #ea2225;
            }

            .clsDatePicker {
                z-index: 100000;
            }

            .container-fluid.content .bsh3 {
                z-index: 1 !important;
            }

            .input-group-addon {
                background-color: #fff;
                border: 1px solid #fff;
            }

            .dropdown-menu {
                top: initial;
            }

            #loading {
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                position: fixed;
                display: block;
                opacity: 0.9;
                z-index: 1051;
                text-align: center;
                background-color: #f9f4f4;
            }

            #loading-image {
                position: fixed;
                top: 26%;
                left: 40%;
                z-index: 100;
                width: 15%;
            }

            .mandetary-red {
                font-size: 12px;
                color: #ea2225;
                display: block;
                text-align: center;
                margin-bottom: 12px;
            }

            .required {
                font-size: 12px;
                color: #ea2225;
            }

            .errorDiv {
                font-size: 14px;
                color: #ea2225;
                display: block;
                text-align: center;
                margin-bottom: 30px;
                font-weight: bolder;
            }

            .forminput {
                height: 41px;
            }

            .mtb-8 {
                margin-top: 8px;
                margin-bottom: 8px;
            }

            .d-in {
                display: inline;
            }

            .border-rb {
                border-bottom: 0;
            }

            .border-r {
                border-right: 0;
            }

            .ml-10 {
                margin-left: 10px !important;
            }

            .mtb-15 {
                margin-top: 15px;
                margin-bottom: 15px;
            }

            .mt-10 {
                margin-top: 10px;
            }

            .modal-lg {
                background-color: #374b92;
                padding: 15px;
            }

            .modal-lg p,
            .modal-lg h4 {
                color: #fff;
            }

            .modal-lg ul li {
                margin-bottom: 5px;
                color: #fff;
                padding-left: 20px;
                position: relative;
            }

            .modal-lg ul li::before {
                position: absolute;
                left: 0;
                content: "";
                width: 5px;
                height: 5px;
                background: #fff;
                top: 7px;
                border-radius: 50%;
            }

            .modal-lg ul li a {
                color: #fff;
            }

            .modal-lg label {
                color: #fff;
                position: relative;
                top: -5px;
            }

            .modal-lg input[type="radio"],
            input[type="checkbox"] {
                width: 40px;
                height: 22px;
            }

            .formSubmit:hover {
                color: #fff;
            }

            @media (max-width: 767px) {
                .border-r {
                    border-right: 1px solid #ea2225;
                    margin-bottom: 5px;
                }

                .border-rb {
                    border-bottom: 1px solid #ea2225;
                    margin-bottom: 5px;
                }

                .remove-select-arrow br {
                    display: none;
                }
            }

            @media (min-width: 992px) {
                .modal-lg {
                    max-width: inherit !important;
                    width: 98% !important;
                    margin: 10px auto;
                }
            }

            .error {
                color: #ea2225 !important;
            }
        </style>
        <div id="loading" style="display: none">
            <img id="loading-image" src="loading.gif" alt="Loading..." />
        </div>
       
        <div class="container content">
	<div class="row">
		<div class="col-md-12 mergerPage">
			<div class="row">
				
				<div class="col-md-12" style="padding-top: 150px;text-align: center;">
					<img src="https://aadharhousing.com/page-not-found.png" class="img-responsive center-block" style="height: 100px;">
					<h3 style="color:#254290;line-height: 40px;">Sorry, we are unable to serve your request at this time due to unusual traffic on the website. Thank you for your patience.</h3>
					<p class="mt-30" style="text-align: center;"><a href="https://aadharhousing.com/" style="background-color: #ff0000; color: #FFF;     padding: 9px;
    border-radius: 5px;">Click to visit Home Page</a></p>
				</div>
			</div>
		</div>
		
	</div>
</div>
        
       
        <style>
            .scrollup {
                width: 40px;
                height: 40px;
                position: fixed;
                bottom: 50px;
                right: 100px;
                display: none;
                background-color: #fff;
                border: 1px solid #ea2225;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                font-size: 25px;
                color: #374b92;
                text-decoration: none
            }

            .scrollup:hover {
                text-decoration: none
            }

            @media (max-width:767px) {
                .scrollup {
                    bottom: 20px;
                    right: 20px;
                    z-index: 999999;
                }
            }
        </style>
        
      
        
    </div>


    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
    <script src="js/header.js"></script>
    <script src="js/plugins.js"></script>
    <script src="vendor/jquery.bxslider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="js/jquery.carousel-1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.zoom.min.js"></script>

    <!-- <script src="http://www.youtube.com/player_api"></script> -->
    <script>
        $(document).ready(function () {
            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }
        //$(".newsSection p:nth-child(even)").css("background-color", "#24428e");
        });
        $(window).on('load', function () {
            $('#popup1').modal('show');
            /*  if(readCookie('disc_popup_shown')!='yes')
                 $('#disc_pop_up').modal('show');
             document.cookie = "disc_popup_shown=yes"; */
        });
        $(window).on('unload', function () {
            /* var checkClicked = sessionStorage.getItem('popup_clicked');
            if (typeof checkClicked !== "undefined")
                sessionStorage.removeItem("popup_clicked"); */
        });


        $(document).ready(function () {
            var checkClicked = sessionStorage.getItem('popup_clicked');
            console.log('popup_clicked===>' + checkClicked);
            if (typeof checkClicked === "undefined" || checkClicked !== 'yes') {
                $('#disc_pop_up').modal('show');
            } else {
                $('#disc_pop_up').modal('hide');
            }
            $("#disc_pop_up").modal({
                show: false,
                backdrop: 'static'
            });

            $("#click-me").click(function () {
                $("#disc_pop_up").modal("show");
            });
            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    var check = false;
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                }, ""
            );
            $("#dob").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                maxDate: "-18y",
                yearRange: "-118:-18",
            });
            $('#mandate_form').validate({
                rules: {
                    app_no: {
                        required: true,
                        regex: '[A-Za-z0-9]{8}',//number: true,
                        minlength: 8,
                        maxlength: 8
                    },
                    dob: {
                        required: true
                    }
                },
                messages: {
                    app_no: {
                        required: 'Please enter loan application number',
                        // number: 'Loan application number should be have digits',
                        regex : 'Loan application number should be alphanumeric and must be 8 characters long.',
                        minlength: 'Loan application number should have 8 digits minimum',
                        maxlength: 'Loan application number should have 8 digits maximum'
                    },
                    dob: {
                        required: 'Please choose date of birth'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "dob" ) {
                        error.insertAfter(".input-group");
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    //$("#applyLoan").submit(function() {
                    $("#MandateSubmitBtn").attr('disabled', 'disabled');
                    $('#loading').show();
                    //});
                    $.ajax({ //make ajax request to cart_process.php
                        url: "ajaxGetMandateStatus.php",
                        type: "POST",
                        dataType:"html", // "json", //expect json value from server
                        data: $('#mandate_form').serialize()
                    }).done(function(data) {
                        //on Ajax success
                        /* console.log(data);
                        console.log(typeof(data)); */
                        if (data == 'lsc') {
                            alert('Sorry! We could not process you request.\nLoan Account mention is already closed, You may contact our nearest branch office.In case of any issues/query related to E-Mandate registration you may contact Aadhar Housing Finance Ltd.');
                        }
                        if (data == 'esc') {
                            alert('Sorry! We could not process your request.\n ACH Mandate Not Active for loan account number, you may contact our nearest branch Office.In case of any issues/query related to E-Mandate registration you may contact Aadhar Housing Finance Ltd.');
                        }
                        if (data == 'ndf') {
                            alert('Please enter correct details');
                        }
                        if (data == 'false') {
                            alert('Please try again.');
                        }
                        location.reload(true);
                    });
                }

            });
            $('#disclaimer-form').validate({
                rules: {
                    agree: {
                        required: true
                    }
                },
                messages: {
                    agree: {
                        required: 'Please agree with terms and conditions.'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "agree" ) {
                        $("#ModalErrorDiv").html(error);
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    sessionStorage.setItem('popup_clicked', 'yes');
                    var checkClicked = sessionStorage.getItem('popup_clicked');
                    console.log("done");
                    console.log(checkClicked);


                    $('#disc_pop_up').modal('hide');
                }

            });

            $("#MandateResetBtn").click(function() {
                $('#loading').show();
                //});
                $.ajax({ //make ajax request to cart_process.php
                    url: "ajaxResetMandateStatus.php",
                    type: "POST"
                }).done(function(data) {
                    location.reload(true);
                });
            });
            $("#MandateOtpBtn").click(function() {
                $('#loading').show();
                //});
                $.ajax({ //make ajax request to cart_process.php
                    url: "ajaxGenerateMandateOTP.php",
                    type: "POST"
                }).done(function(data) {
                    location.reload(true);
                });
            });
            $("#MandateContinueBtn").click(function() {
                $('#loading').show();
                //});
                $.ajax({ //make ajax request to cart_process.php
                    url: "ajaxMandateContinueRequest.php",
                    type: "POST"
                }).done(function(data) {
                    if (data == 'true') {
                        alert('Your request for continue with existing mandate is generated sucessfully.');
                    }
                    else
                    {
                        alert('Please try again.');
                    }
                    location.reload(true);
                });
            });
            $('input[type=radio][name=proceed]').change(function() {
                // $('#proceed').on('change', function () {
                var selectVal = $(this).val();
                if(selectVal=='Y')
                    $('.cancel_reason_div').show();
                else
                    $('.cancel_reason_div').hide();
            });
            $('#mandate_otp_form').validate({
                rules: {
                    otp: {
                        required: true,
                        regex: '[0-9]{4}',//number: true,
                        minlength: 4,
                        maxlength: 4
                    }
                },
                messages: {
                    otp: {
                        required: 'Please enter OTP',
                        // number: 'Loan application number should be have digits',
                        regex : 'OTP should be numeric and must be 4 digits long.',
                        minlength: 'OTP should have 4 digits minimum',
                        maxlength: 'OTP should have 4 digits maximum'
                    }
                },
                submitHandler: function(form) {
                    //$("#applyLoan").submit(function() {
                    $("#MandateVerifyBtn").attr('disabled', 'disabled');
                    $('#loading').show();
                    //});
                    $.ajax({ //make ajax request to cart_process.php
                        url: "ajaxVerifyMandateOTP.php",
                        type: "POST",
                        dataType:"html", // "json", //expect json value from server
                        data: $('#mandate_otp_form').serialize()
                    }).done(function(data) {
                        //on Ajax success
                        /* console.log(data);
                        console.log(typeof(data)); */
                        if (data == 'lsc') {
                            $('#loading').hide();
                            $('.errorDiv').html('Sorry! We could not process your request.<br/>The Loan account you mentioned is already closed. Your mandate stands cancelled from the date of loan closed. In case of any issues/queries related to Mandate Cancellation, you may contact Aadhar Housing Finance Ltd.');
                            $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            // mandetary-red
                            $('#MandateResetBtn').show();
                        }
                        if (data == 'esc') {
                            $('#loading').hide();
                            $('.errorDiv').html('Sorry! We could not process your request.<br/> NACH Mandate is not active for the loan application number you mentioned. Please contact the concerned Aadhar branch for details. In case of any issues/queries related to Mandate Cancellation, you may contact Aadhar Housing Finance Ltd.');
                            $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            $('#MandateResetBtn').show();
                        }
                        if (data == 'false') {
                            alert('Please enter valid OTP.');
                            location.reload(true);
                        }
                        if (data == 'ndf') {
                            $('#loading').hide();
                            $('.errorDiv').html('Unable to fetch bank details. Please contact nearest branch.');
                            $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            $('#MandateResetBtn').show();
                        }
                        if(data=='true')
                        {
                            location.reload(true);
                        }
                    });
                }

            });
            $('#mandate_cancel_form').validate({
                rules: {
                    proceed: {
                        required: true
                    },
                    cancel_reason: {
                        required: true
                    }
                },
                messages: {
                    proceed: {
                        required: 'Please choose one option'
                    },
                    cancel_reason: {
                        required: 'Please choose one option'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "proceed" ) {
                        $(".errorDiv").html(error);
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    //$("#applyLoan").submit(function() {
                    $("#MandateCancelBtn").attr('disabled', 'disabled');
                    $('#loading').show();
                    //});
                    $.ajax({ //make ajax request to cart_process.php
                        url: "ajaxMandateCancelRequest.php",
                        type: "POST",
                        dataType:"html", // "json", //expect json value from server
                        data: $('#mandate_cancel_form').serialize()
                    }).done(function(data) {
                        //on Ajax success
                        if (data == 'cancel') {
                            $('#loading').hide();
                            // alert('Your request for Stop NACH mandate is generated sucessfully.');
                            $('.errorDiv').html('Your request for cancellation of NACH mandate is submitted. We’ll get back to you with status soon.');
                            // $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            $('#MandateResetBtn').show();
                        }
                        else if (data == 'continue') {
                            $('#loading').hide();
                            $('.errorDiv').html('Your request for continue with existing mandate is generated sucessfully.');
                            $('.otpFormDiv').remove();
                            $('#MandateResetBtn').show();
                            // alert('Your request for continue with existing mandate is generated sucessfully.');
                        }
                        else
                        {
                            alert('Please try again.');
                            location.reload(true);
                        }
                    });
                }

            });

            $('#otr_otp_form').validate({
                rules: {
                    otp: {
                        required: true,
                        regex: '[0-9]{4}', //number: true,
                        minlength: 4,
                        maxlength: 4
                    }
                },
                messages: {
                    otp: {
                        required: 'Please enter OTP',
                        // number: 'Loan application number should be have digits',
                        regex: 'OTP should be numeric and must be 4 digits long.',
                        minlength: 'OTP should have 4 digits minimum',
                        maxlength: 'OTP should have 4 digits maximum'
                    }
                },
                submitHandler: function(form) {
                    //$("#applyLoan").submit(function() {
                    $("#MandateVerifyBtn").attr('disabled', 'disabled');
                    $('#loading').show();
                    //});
                    $.ajax({ //make ajax request to cart_process.php
                        url: "ajaxVerifyOtrOTP.php",
                        type: "POST",
                        dataType: "html", // "json", //expect json value from server
                        data: $('#otr_otp_form').serialize()
                    }).done(function(data) {
                        //on Ajax success
                        /* console.log(data);
                        console.log(typeof(data)); */
                        if (data == 'lsc') {
                            $('#loading').hide();
                            $('.errorDiv').html(
                                'Sorry! We could not process your request.<br/>Loan Account mention is already closed, You may contact our nearest AHFL branch office.In case of any issues/query related to E-Mandate registration you may contact Aadhar Housing Finance Ltd.'
                            );
                            $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            // mandetary-red
                            $('#MandateResetBtn').show();
                        }
                        if (data == 'false') {
                            alert('Please enter valid OTP.');
                            location.reload(true);
                        }
                        if (data == 'ndf') {
                            $('#loading').hide();
                            $('.errorDiv').html(
                                'Unable to fetch bank details. Please contact nearest branch.'
                            );
                            $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            $('#MandateResetBtn').show();
                        }
                        if (data == 'true') {
                            location.reload(true);
                        }
                    });
                }
            });

            $('#otr_reg_form').validate({
                rules: {
                    agreeCheck: {
                        required: true
                    }
                },
                messages: {
                    agreeCheck: {
                        required: 'Please agree to the condition / कृपया शर्त पर सहमत हों'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "proceed") {
                        $(".errorDiv").html(error);
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    //$("#applyLoan").submit(function() {
                    $("#MandateCancelBtn").attr('disabled', 'disabled');
                    $('#loading').show();
                    //});
                    $.ajax({ //make ajax request to cart_process.php
                        url: "ajaxOtrRegRequest.php",
                        type: "POST",
                        dataType: "json", // "json", //expect json value from server
                        data: $('#otr_reg_form').serialize()
                    }).done(function(data) {
                        // console.log(data);
                        if (data.status == 'true') {
                            // window.location.replace(data.data);
                            $('#loading').hide();
                            // alert('Your request for Stop NACH mandate is generated sucessfully.');
                            var loan_app_no='<?php echo isset($_SESSION["loan_app_no"])?$_SESSION["loan_app_no"]:"";?>';
							// alert('Your request for Stop NACH mandate is generated sucessfully.');
							$('.errorDiv').html(
								'Dear Customer, the OTR request for your AHFL Loan Application No '+loan_app_no+' has been received. Our team will review the application and share a status update soon.'
							);
                            // $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            $('#MandateResetBtn').show();
                        } else if (data.status == 'false') {
                            $('#loading').hide();
                            // alert('Your request for Stop NACH mandate is generated sucessfully.');
                            $('.errorDiv').html(
                                'Something went wrong in generate data.Please try again later.');
                            // $('#MandateVerifyBtn').remove();
                            $('.otpFormDiv').remove();
                            $('#MandateResetBtn').show();
                        } else {
                            alert('Something went wrong.Please try again');
                            location.reload(true);
                        }
                    });
                }

            });
        });
    </script>

</body>
</html>