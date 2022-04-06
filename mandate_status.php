<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET["utm_source"]) && $_GET["utm_source"] != "") {
    $utmSource = $_GET["utm_source"];
} else {
    $utmSource = "";
}
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['mandate_applied'])) {
    $_SESSION['mandate_applied'] = false;
}

if (!isset($_SESSION['otp_generated'])) {
    $_SESSION['otp_generated'] = false;
}

// session_destroy();
include_once 'inc/config.php';
include_once 'api/config.php';
//$_SESSION['token'] = createToken();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aadhar Housing Finance Ltd (AHFL)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Request for Cancellation of NACH Mandate" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Request for Cancellation of NACH Mandate" />
    <link rel="canonical" href="https://aadharhousing.com/apply-for-loan.php" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Request for Cancellation of NACH Mandate" />
    <meta property="og:description" content="Request for Cancellation of NACH Mandate" />
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
            $('.scrollTo a').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var $target = $(this.hash);
                    history.replaceState(null, null, $target.selector);
                    $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
                    if ($target.length) {
                        var targetOffset = $target.offset().top - 120;
                        $('html,body').animate({
                            scrollTop: targetOffset
                        }, 500);
                        return false;
                    }
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

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container customTab paddingl5 topStripe">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle visible-xs" data-toggle="collapse"
                        data-target=".navbar-main-collapse">
                        <p class="menu-text">MENU &nbsp;</p>
                        <i class="fa fa-bars" style="opacity:0"></i>
                    </button>

                    <div class="dropdown chooseL cl-mobile visible-xs">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">Language / भाषा
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="hindiSite" style="display:inline-block"
                                    onClick="window.location.href = 'http://aadharhousing.com/hindi/mandate_status.php'"
                                    href="javascript:void(0)">हिंदी</a>
                            </li>
                        </ul>
                    </div>

                    <div class="margTop visible-xs"><a class="blink_me"
                            href="https://pay.aadharhousing.com/makepayment/public/" target="_blank">Pay Online</a>
                    </div>

                    <a class="navbar-brand" href="https://aadharhousing.com/" style="height: 100px !important;">
                        <img src="img/logo.png" alt="Aadhar Housing Finance Ltd (AHFL)" />
                    </a>

                </div>

                <!-- mobile menu -->
                <div class="header hidden-lg hidden-md hidden-sm" id="home">

                    <div class="container">
                        <div class="header-bottom">

                            <nav id="navigation" class="navigation navigation-landscape">
                                <div class="nav-header">
                                    <div class="nav-toggle"></div>
                                </div>
                                <div class="nav-menus-wrapper" style="transition-property: none;">
                                    <ul class="nav-menu">
                                        <!-- <li class="active"><a href="#">Home</a></li>
							<li><a href="#">About</a></li> -->
                                        <li class=""><a href="#">Loans<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                                <li><a
                                                        href="https://aadharhousing.com/categories/home-loan-salaried-employees.php">Home
                                                        Loan for Salaried Employees</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/home-loan-self-employed.php">Home
                                                        Loan for Self Employed</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/loan-for-plot-purchase-construction.php">Loan
                                                        for Plot Purchase or/and Construction</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/home-improvement-loan.php">Home
                                                        Improvement Loan</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/home-extension-loan.php">Home
                                                        Extension Loan</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/loan-against-property.php">Loan
                                                        against Residential/Commercial Property</a></li>
                                                <li><a href="https://aadharhousing.com/categories/balance-transfer.php">Balance
                                                        Transfer and Top up</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/loan-purchase-construction-non-residential-property.php">Loan
                                                        for Purchase/Construction of Non-residential Property</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/home-loan-pradhan-mantri-awas-yojana.php">Pradhan
                                                        Mantri Awas Yojana (PMAY)</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/categories/home-loan-covid-warriors-griha-loans.php">Covid19
                                                        Warriors Griha Loan</a></li>
                                                <!-- <li class=""><a href="#">Sub Services<span class="submenu-indicator"></span></a>
										<ul class="nav-dropdown nav-submenu" style="display: none;">
											<li><a href="#">Sub Services 1</a></li>
											<li><a href="#">Sub Services 2</a></li>
											<li><a href="#">Sub Services 3</a></li>
											<li><a href="#">Sub Services 4</a></li>
										</ul>
									</li> -->
                                            </ul>
                                        </li>
                                        <li class=""><a href="#">About Us<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                                <li><a
                                                        href="https://aadharhousing.com/about-us/overview.php">Overview</a>
                                                </li>
                                                <li><a
                                                        href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision,
                                                        Mission & values</a></li>
                                                <!--<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman</a></li>-->
                                                <li><a href="https://aadharhousing.com/about-us/management.php">Board of
                                                        Directors</a></li>
                                                <li><a href="https://aadharhousing.com/about-us/management-team.php">Management
                                                        Team</a></li>
                                                <li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards
                                                        & Recognition</a></li>
                                                <li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer
                                                        Promise</a></li>
                                                <!--<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li>-->
                                                <li><a
                                                        href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory
                                                        Approvals</a></li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="#">Ready Reckoner<span
                                                    class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                                <li><a
                                                        href="https://aadharhousing.com/ready-reckoner/home-loan-approval-process.php">Home
                                                        Loan Approval Process</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/ready-reckoner/documents-needed-by-housing-finance-companies.php">Documents
                                                        Needed</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/ready-reckoner/services-charges-for-loan.php">Services
                                                        & Charges</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/ready-reckoner/home-loan-eligibility-calculator.php">Eligibility
                                                        Calculator</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/ready-reckoner/home-loan-emi-calculator.php">EMI
                                                        Calculator</a></li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="#">Customer Relations<span
                                                    class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                                <li><a
                                                        href="https://aadharhousing.com/customer-relations/unauthorized-iondividuals-entities-disclaimer.php">Unauthorized
                                                        Individuals/Entities Disclaimer</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/customer-relations/AHFL-Policies-Codes.php">AHFL
                                                        Policies & Codes</a></li>
                                                <li><a href="https://aadharhousing.com/pdf/T&Csarfaesi.pdf"
                                                        target="_blank">Tender format & General Terms & Conditions for
                                                        Auction of Properties</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/customer-relations/Aadhar-Insurance-Services.php">Aadhar
                                                        Insurance Services</a></li>
                                                <li><a href="https://aadharhousing.com/pdf/List-of-Authorized-Collection-and-Recovery-Agents.pdf"
                                                        target="_blank">List of Authorized Collection and Recovery
                                                        Agents</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/customer-relations/branch-shifting-relocation-intimation.php">
                                                        Branch Shifting/Relocation Intimation</a></li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="#">Investor Relations<span
                                                    class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                                <li><a
                                                        href="https://aadharhousing.com/investor-relations/Annual-Report-and-Returns.php">Annual
                                                        Report and Returns</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/investor-relations/aadhar-housing-financial-publications-reports.php">Financial
                                                        Publications</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/investor-relations/Shareholders-Meetings.php">Shareholders’
                                                        Meetings</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/investor-relations/Public-Notice-and-Intimation.php">Public
                                                        Notice and Intimation</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/investor-relations/NCD-Series.php">NCD
                                                        Series</a></li>
                                                <!--<li><a href="https://aadharhousing.com/pdf/related-party-transactions-policy.pdf" target="_blank">Related Party Transaction Policy</a></li>-->
                                                <li><a href="https://aadharhousing.com/AHFL_CSR-Plan.pdf"
                                                        target="_blank">CSR</a></li>
                                                <li><a href="https://aadharhousing.com/pdf/Internal-Guidelines-on-Corporate-Governance.pdf"
                                                        target="_blank">Internal Guidelines on Corporate Governance</a>
                                                </li>
                                                <li><a
                                                        href="https://aadharhousing.com/investor-relations/aadhar-housing-asspl-annual-report.php">Subsidiary
                                                        Company Annual Report</a></li>
                                                <li><a href="https://aadharhousing.com/pdf/List-of-Creditors.pdf"
                                                        target="_blank">List of Creditors</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/investor-relations/SEBI-Regulations.php">SEBI
                                                        Regulations Disclosures</a></li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="#">Media<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                                <li><a href="https://aadharhousing.com/media.php?Print-Publications">Print
                                                        Publications</a></li>
                                                <li><a href="https://aadharhousing.com/media.php?Video-Broadcasts">Video
                                                        Broadcasts</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/media.php?Brand-Films">Brand-Films</a>
                                                </li>
                                                <li><a href="https://aadharhousing.com/knowledge-centre.php">Knowledge
                                                        Centre</a></li>
                                            </ul>
                                        </li>
                                        <li class="visible-xs"><a
                                                href="https://aadharhousing.com/auctions.php">Auctions</a></li>
                                        <li class=""><a href="#">Careers<span class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                                <li><a href="https://aadharhousing.com/careers/culture-values.php">Culture
                                                        & Values</a></li>
                                                <li><a href="https://aadharhousing.com/careers/why-ahfl.php">Why
                                                        AHFL</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/careers/aadhar-careers-message-from-the-hr-head.php">Message
                                                        from the HR Head</a></li>
                                                <li><a
                                                        href="https://aadharhousing.com/careers/aadhar-careers-benefits.php">Aadhar
                                                        Benefits</a></li>
                                                <li><a href="https://aadharhousing.com/careers/life-at-ahfl.php">Life @
                                                        AHFL</a></li>
                                                <li><a href="https://aadharhousing.com/careers/gallery.php">Gallery</a>
                                                </li>
                                                <!-- <li><a href="https://aadharhousing.com/careers/start-your-career-at-aadhar.php">Start your career at AHFL</a></li> -->
                                                <li><a href="https://aadharhousing.com/careers/apply-for-job.php">Apply
                                                        for a job</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="https://aadharhousing.com/pdf/Unauthorized-Entities-Disclaimer.pdf"
                                                target="_blank">Disclaimer</a>
                                        </li>

                                        <li><a href="https://aadharhousing.com/ahfl-branch-locator.php">Contact Us</a>
                                        </li>
                                        <li class="hide"><a href="https://aadharhousing.com/faq.php">FAQs</a></li>
                                        <li class="visible-xs"><a
                                                href="https://aadharhousing.com/downloads.php">Downloads</a></li>
                                        <li class="visible-xs branchLocator"><a
                                                href="https://aadharhousing.com/become-a-partner.php">Become a
                                                Partner</a></li>
                                        <li class="visible-xs branchLocator"><a
                                                href="https://aadharhousing.com/ahfl-branch-locator.php">Branch
                                                Locator</a></li>
                                    </ul>
                                    <ul class="nav navbar-nav social" style="padding-left: 20px;">
                                        <!-- <li><a href="" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
                                        <li><a href="https://www.facebook.com/aadharhousing/" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/AadharHousing" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/aadhar-housing-finance-ltd"
                                                target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://www.youtube.com/channel/UCmQPDjZlhllLQ0mU_CfMVRg"
                                                target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="https://www.instagram.com/aadharhousing/" target="_blank"><i
                                                    class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
                <!-- mobile menu -->
                <ul class="nav navbar-nav top-links hidden-xs">
                    <li class="dropdown hidden-xs">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">About Us</a>
                        <ul class="dropdown-menu" style="margin-top:10px;left:-10px">
                            <li><a href="https://aadharhousing.com/about-us/overview.php">Overview</a></li>
                            <li><a href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision, Mission &
                                    values</a></li>
                            <!--								<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman s</a></li>-->
                            <li><a href="https://aadharhousing.com/about-us/management.php">Board of Directors</a></li>
                            <li><a href="https://aadharhousing.com/about-us/management-team.php">Management Team</a>
                            </li>
                            <li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards &
                                    Recognition</a></li>
                            <li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer Promise</a>
                            </li>
                            <!--								<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger s</a></li>-->
                            <li><a href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory
                                    Approvals</a></li>
                        </ul>
                    </li>

                    <li> <a href="https://aadharhousing.com/downloads.php">Downloads</a></li>
                    <!--    <li><a href="https://aadharhousing.com/emi-moratorium.php">EMI Moratorium</a></li>
                        <li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li> -->
                    <li><a class="blink_me" href="https://pay.aadharhousing.com/makepayment/public/" target="_blank">Pay
                            Online</a></li>
                    <li class="branchLocator"><a href="https://aadharhousing.com/become-a-partner.php">Become a
                            Partner</a></li>
                    <li class="branchLocator"><a href="https://aadharhousing.com/ahfl-branch-locator.php">Branch
                            Locator</a></li>

                    <li class="chooseL">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">Language / भाषा
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="engSite" style="display:inline-block"
                                    onClick="window.location.href = 'http://aadharhousing.com/hindi/mandate_status.php'"
                                    href="javascript:void(0)">हिंदी</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="navigation EnglishTab hidden-xs">
                <div class="container">
                    <div class="collapse navbar-collapse navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <!-- <li class="hidden-xs dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">About Us</a>
									<ul class="dropdown-menu">
										<li><a href="https://aadharhousing.com/about-us/overview.php">Overview</a></li>
										<li><a href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision Mission & values</a></li>
										<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman</a></li>
										<li><a href="https://aadharhousing.com/about-us/management.php">Management</a></li>
										<li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards & Recognition</a></li>
										<li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer Promise</a></li>
										<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li>
										<li><a href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory Approvals</a></li>
									</ul>
								</li> -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Loans</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://aadharhousing.com/categories/home-loan-salaried-employees.php">Home
                                            Loan for Salaried Employees</a></li>
                                    <li><a href="https://aadharhousing.com/categories/home-loan-self-employed.php">Home
                                            Loan for Self Employed</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/categories/loan-for-plot-purchase-construction.php">Loan
                                            for Plot Purchase or/and Construction</a></li>
                                    <li><a href="https://aadharhousing.com/categories/home-improvement-loan.php">Home
                                            Improvement Loan</a></li>
                                    <li><a href="https://aadharhousing.com/categories/home-extension-loan.php">Home
                                            Extension Loan</a></li>
                                    <li><a href="https://aadharhousing.com/categories/loan-against-property.php">Loan
                                            against Residential/Commercial Property</a></li>
                                    <li><a href="https://aadharhousing.com/categories/balance-transfer.php">Balance
                                            Transfer and Top up</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/categories/loan-purchase-construction-non-residential-property.php">Loan
                                            for Purchase/Construction of Non-residential Property</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/categories/home-loan-pradhan-mantri-awas-yojana.php">Pradhan
                                            Mantri Awas Yojana (PMAY)</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/categories/home-loan-covid-warriors-griha-loans.php">Covid19
                                            Warriors Griha Loan</a></li>
                                </ul>
                            </li>
                            <!--<li class="dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Deposits</a>
									<ul class="dropdown-menu">
										<li class="scrollTo"><a class="fdlinks" href="https://aadharhousing.com/deposits/fixed-deposit.php">FAQs</a></li>
										<li><a href="https://aadharhousing.com/deposits/fixed-deposit.php">Fixed Deposit Calculator</a></li>
										<li class="scrollTo"><a class="fdlinks" href="https://aadharhousing.com/deposits/fixed-deposit.php#featuresRates">Features & Rates</a></li>
										<li class="scrollTo"><a class="fdlinks" href="https://aadharhousing.com/deposits/fixed-deposit.php#category">Category</a></li>
										<li class="scrollTo"><a class="fdlinks" href="https://aadharhousing.com/deposits/fixed-deposit.php#overview">Overview</a></li>
										<li><a href="https://aadharhousing.com/pdf/Fixed-Deposite-Form.pdf">Download Form</a></li>
										<li><a href="https://aadharhousing.com/deposits/apply-for-fixed-deposit.php#fdFormSection">Apply for Fixed Deposit</a></li>
									</ul>
								</li>-->
                            <li class="visible-xs dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">About Us</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://aadharhousing.com/about-us/overview.php">Overview</a></li>
                                    <li><a href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision,
                                            Mission & values</a></li>
                                    <!--<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman</a></li>-->
                                    <li><a href="https://aadharhousing.com/about-us/management.php">Board of
                                            Directors</a></li>
                                    <li><a href="https://aadharhousing.com/about-us/management-team.php">Management
                                            Team</a></li>
                                    <li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards &
                                            Recognition</a></li>
                                    <li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer
                                            Promise</a></li>
                                    <!--<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li>-->
                                    <li><a href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory
                                            Approvals</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Ready
                                    Reckoner</a>
                                <ul class="dropdown-menu">
                                    <li><a
                                            href="https://aadharhousing.com/ready-reckoner/home-loan-approval-process.php">Home
                                            Loan Approval Process</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/ready-reckoner/documents-needed-by-housing-finance-companies.php">Documents
                                            Needed</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/ready-reckoner/services-charges-for-loan.php">Services
                                            & Charges</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/ready-reckoner/home-loan-eligibility-calculator.php">Eligibility
                                            Calculator</a></li>
                                    <li><a href="https://aadharhousing.com/ready-reckoner/home-loan-emi-calculator.php">EMI
                                            Calculator</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Customer
                                    Relations</a>
                                <ul class="dropdown-menu">
                                    <li><a
                                            href="https://aadharhousing.com/customer-relations/unauthorized-iondividuals-entities-disclaimer.php">Unauthorized
                                            Individuals/Entities Disclaimer</a></li>
                                    <li><a href="https://aadharhousing.com/customer-relations/AHFL-Policies-Codes.php">AHFL
                                            Policies & Codes</a></li>
                                    <li><a href="https://aadharhousing.com/pdf/T&Csarfaesi.pdf" target="_blank">Tender
                                            format & General Terms & Conditions for Auction of Properties</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/customer-relations/Aadhar-Insurance-Services.php">Aadhar
                                            Insurance Services</a></li>
                                    <li><a href="https://aadharhousing.com/pdf/List-of-Authorized-Collection-and-Recovery-Agents.pdf"
                                            target="_blank">List of Authorized Collection and Recovery Agents</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/customer-relations/branch-shifting-relocation-intimation.php">
                                            Branch Shifting/Relocation Intimation</a></li>

                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Investor
                                    Relations</a>
                                <ul class="dropdown-menu">

                                    <li><a
                                            href="https://aadharhousing.com/investor-relations/Annual-Report-and-Returns.php">Annual
                                            Report and Returns</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/investor-relations/aadhar-housing-financial-publications-reports.php">Financial
                                            Publications</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/investor-relations/Shareholders-Meetings.php">Shareholders’
                                            Meetings</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/investor-relations/Public-Notice-and-Intimation.php">Public
                                            Notice and Intimation</a></li>
                                    <li><a href="https://aadharhousing.com/investor-relations/NCD-Series.php">NCD
                                            Series</a></li>
                                    <!--<li><a href="https://aadharhousing.com/pdf/related-party-transactions-policy.pdf" target="_blank">Related Party Transaction Policy</a></li>-->
                                    <li><a href="https://aadharhousing.com/AHFL_CSR-Plan.pdf" target="_blank">CSR</a>
                                    </li>
                                    <li><a href="https://aadharhousing.com/pdf/Internal-Guidelines-on-Corporate-Governance.pdf"
                                            target="_blank">Internal Guidelines on Corporate Governance</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/investor-relations/aadhar-housing-asspl-annual-report.php">Subsidiary
                                            Company Annual Report</a></li>
                                    <li><a href="https://aadharhousing.com/pdf/List-of-Creditors.pdf"
                                            target="_blank">List of Creditors</a></li>
                                    <li><a href="https://aadharhousing.com/investor-relations/SEBI-Regulations.php">SEBI
                                            Regulations Disclosures</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="https://aadharhousing.com/media.php">Media</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://aadharhousing.com/media.php?Print-Publications">Print
                                            Publications</a></li>
                                    <li><a href="https://aadharhousing.com/media.php?Video-Broadcasts">Video
                                            Broadcasts</a></li>
                                    <li><a href="https://aadharhousing.com/media.php?Brand-Films">Brand-Films</a></li>
                                    <li><a href="https://aadharhousing.com/knowledge-centre.php">Knowledge Centre</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="https://aadharhousing.com/auctions.php">Auctions</a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Careers</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://aadharhousing.com/careers/culture-values.php">Culture &
                                            Values</a></li>
                                    <li><a href="https://aadharhousing.com/careers/why-ahfl.php">Why AHFL</a></li>
                                    <li><a
                                            href="https://aadharhousing.com/careers/aadhar-careers-message-from-the-hr-head.php">Message
                                            from the HR Head</a></li>
                                    <li><a href="https://aadharhousing.com/careers/aadhar-careers-benefits.php">Aadhar
                                            Benefits</a></li>
                                    <li><a href="https://aadharhousing.com/careers/life-at-ahfl.php">Life @ AHFL</a>
                                    </li>
                                    <li><a href="https://aadharhousing.com/careers/gallery.php">Gallery</a></li>
                                    <!-- <li><a href="https://aadharhousing.com/careers/start-your-career-at-aadhar.php">Start your career at AHFL</a></li> -->
                                    <li><a href="https://aadharhousing.com/careers/apply-for-job.php">Apply for a
                                            job</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="https://aadharhousing.com/pdf/Unauthorized-Entities-Disclaimer.pdf"
                                    target="_blank">Disclaimer</a>
                            </li>

                            <li><a href="https://aadharhousing.com/ahfl-branch-locator.php">Contact Us</a>
                            </li>
                            <!--<li class="visible-xs"><a href="https://aadharhousing.com/emi-moratorium.php">EMI Moratorium</a></li>
                                <li>
								<li class="dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">FAQs</a>
									<ul class="dropdown-menu">
										<li class="scrollTo"><a class="fdlinks" href="https://aadharhousing.com/faq.php">Loans</a></li>
										<li><a href="https://aadharhousing.com/deposits/fixed-deposit.php">Deposits</a></li> --
									</ul>
								</li>-->
                            <li class="hide"><a href="https://aadharhousing.com/faq.php">FAQs</a></li>
                            <li class="visible-xs"><a href="https://aadharhousing.com/downloads.php">Downloads</a></li>
                            <li class="visible-xs branchLocator"><a
                                    href="https://aadharhousing.com/become-a-partner.php">Become a Partner</a></li>
                            <li class="visible-xs branchLocator"><a
                                    href="https://aadharhousing.com/ahfl-branch-locator.php">Branch Locator</a></li>
                        </ul>
                        <ul class="nav navbar-nav social">
                            <!-- <li><a href="" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
                            <li><a href="https://www.facebook.com/aadharhousing/" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/AadharHousing" target="_blank"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/aadhar-housing-finance-ltd" target="_blank"><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCmQPDjZlhllLQ0mU_CfMVRg" target="_blank"><i
                                        class="fa fa-youtube-play"></i></a></li>
                            <li><a href="https://www.instagram.com/aadharhousing/" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


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
        <div class="container-fluid content">
  <div class="row">
    <img src="img/aboutusOverview.jpg" alt="Housing Loan for Everyone" class="img-responsive" />
    <h2 class="bsh3">Request for Cancellation of NACH Mandate</h2>
    <p class="hidden-xs">Home / Request for Cancellation of NACH Mandate</p>
  </div>
</div>
<div class="container content">
  <div class="row">
    <?php
		if (!$_SESSION['mandate_applied']) {
    ?>
    <div class="col-md-12 remove-select-arrow">
      <span class="mandetary-red">* Indicates mandatory fields / * अनिवार्य क्षेत्र संकेत करता है</span>
      <form id="mandate_form" name="mandate_form" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="forminput" id="app_no" placeholder="*Loan Application No" name="app_no" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group forminput">
                <input type="text" name="dob" id="dob" class="form-control clsDatePicker" placeholder="*Date of birth / जन्म तारीख" readonly />
                <div class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 mt-20">
          <button type="submit" class="formSubmit loanSubmit" value="Submit" name="loansubmit" id="MandateSubmitBtn" style="border: 0"><strong>Fetch Account Details</strong></button>
        </div>
      </form>
      <div class="clearfix"></div>
      <br /><br /><br /><br />
    </div>
    <?php
} elseif ($_SESSION['mandate_applied'] && !$_SESSION['otp_generated']) {
    $masked_mobileno = str_pad(substr($_SESSION['mandate_status']['mobile_number'], -4), strlen($_SESSION['mandate_status']['mobile_number']), 'X', STR_PAD_LEFT);
    // $masked_mobileno = substr_replace($_SESSION['mandate_status']['mobile_number'],"xxxxxxxx", 0,6);
    ?>
    <div class="col-md-12 remove-select-arrow">
      <form id="mandate_form" name="mandate_otp_form" method="post">
        <div class="col-md-6 date border-r">
          <div class="form-group mtb-8">
            <label></label>
            Registered Mobile No
          </div>
        </div>
        <div class="col-md-6 date">
          <div class="form-group mtb-8">
            <label class="label"></label>
            <?php echo $masked_mobileno; ?>
          </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12 text-center mt-20">
          <button type="button" class="formSubmit loanSubmit d-in" value="Submit" name="loansubmit" id="MandateOtpBtn" style="border: 0; margin-right: 12px"><strong>Generate OTP</strong></button>
          <button type="button" class="formSubmit loanSubmit d-in" value="reset" name="reset" id="MandateResetBtn" style="border: 0"><strong>Back</strong></button>
        </div>
      </form>
      <div class="clearfix"></div>
      <br /><br /><br /><br />
    </div>
    <?php
} elseif ($_SESSION['mandate_applied'] && $_SESSION['otp_generated'] && (!isset($_SESSION['mandate_detail_shown']) || !$_SESSION['mandate_detail_shown'])) {
    ?>
    <div class="errorDiv"></div>
    <div class="col-md-12 remove-select-arrow">
      <span class="mandetary-red otpFormDiv">* Indicates mandatory fields / * अनिवार्य क्षेत्र संकेत करता है</span>
      <form id="mandate_otp_form" name="mandate_otp_form" method="post">
        <div class="otpFormDiv mt-20">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <div class="form-group mtb-8">One Time Password : <?php //echo $_SESSION['otp']; ?> <span class="required">*</span></div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="forminput" id="otp" placeholder="One Time Password" name="otp" maxlength="4" />
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 mt-20">
          <button type="submit" class="formSubmit loanSubmit" value="Submit" name="loansubmit" id="MandateVerifyBtn" style="border: 0"><strong>Submit</strong></button>
          <button type="button" class="formSubmit loanSubmit" value="reset" name="reset" id="MandateResetBtn" style="border: 0; display: none"><strong>Back</strong></button>
        </div>
      </form>
      <div class="clearfix"></div>
      <br /><br /><br /><br />
    </div>
    <?php
} elseif ($_SESSION['mandate_applied'] && $_SESSION['otp_generated'] && $_SESSION['mandate_detail_shown']) {
    ?>
    <div class="errorDiv"></div>
    <div class="col-md-12 remove-select-arrow">
      <form id="mandate_cancel_form" name="mandate_cancel_form" method="post">
        <div class="otpFormDiv">
          <div class="col-md-6 date border-rb border-r">
            <div class="form-group mtb-8">Bank Name</div>
          </div>
          <div class="col-md-6 date border-rb">
            <div class="form-group mtb-8">
              <?php echo $_SESSION['mandate_details']['m_bankname']; ?>
            </div>
          </div>
        </div>
        <div class="otpFormDiv">
          <div class="col-md-6 date border-rb border-r">
            <div class="form-group mtb-8">Bank Account number</div>
          </div>
          <div class="col-md-6 date border-rb">
            <div class="form-group mtb-8">
              <?php
$maskedAcNo = str_pad(substr($_SESSION['mandate_details']['ap_bankaccount'], -4), strlen($_SESSION['mandate_details']['ap_bankaccount']), 'X', STR_PAD_LEFT);
    echo $maskedAcNo;?>
            </div>
          </div>
        </div>
        <div class="otpFormDiv">
          <div class="col-md-6 date border-rb border-r">
            <div class="form-group mtb-8">Bank Account Holder Name</div>
          </div>
          <div class="col-md-6 date border-rb">
            <div class="form-group mtb-8">
              <?php echo $_SESSION['mandate_details']['ap_bankholder']; ?>
            </div>
          </div>
        </div>
        <div class="otpFormDiv">
          <div class="col-md-6 date border-r">
            <div class="form-group" style="margin-top: 11px; margin-bottom: 11px">Cancel or Continue :</div>
          </div>
          <div class="col-md-6 date">
            <div class="form-group mtb-8">
              <input type="radio" name="proceed" value="Y" /> Cancel NACH Mandate <input type="radio" name="proceed" value="C" class="ml-10" /> Continue with existing mandate
              <!-- <select name="proceed" id="proceed">
                                <option value="">Please choose one option</option>
                                <option value="Y">Cancel/Stop NACH Mandate</option>
                                <option value="C">Continue with existing mandate</option>
                            </select> -->
            </div>
            <div class="errorDiv" style="margin-bottom: 12px"></div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="otpFormDiv cancel_reason_div mt-10" style="display: none">
          <div class="col-md-6 date border-r">
            <div class="form-group mtb-15">Reason for Cancellation :</div>
          </div>
          <div class="col-md-6 date">
            <div class="form-group mtb-8">
              <select name="cancel_reason" class="form-control">
                <option value="">Please choose one option</option>
                <option value="Loan Account Closed">Loan Account Closed</option>
                <option value="Bank Account Change">Bank Account Change</option>
                <option value="Loan Cancelled">Loan Cancelled</option>
              </select>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 otpFormDiv">
          <p style="font-size: 12px; line-height: 24px">
            (Please agree to the condition, by ticking on the box below before submitting. / कृपया फॉर्म को 'सबमिट' करने से पहले निचे दिए गए बॉक्स पर टिक करें, दी गई शर्तों से सहमत हों.)
          </p>
          <p style="font-size: 12px; line-height: 24px">
            <input id="agreeCheck" name="agreeCheck" required style="display: inline; width: 20px; vertical-align: middle; height: 20px" type="checkbox" class="forminput" required /> Disclaimer : I/We
            hereby confirm that I/We would like to initiate mandate cancellation request of NACH for my/our home loan account with Aadhar housing finance limited (AHFL), I/We ensure that my regular
            monthly Equated Monthly Installments (EMI/PEMI) shall be paid as per the agreed terms and conditions of the loan agreement executed with (AHFL). I/We, am/are aware that, If I/We fail to
            pay the EMI/PEMI installments as per the agreed schedule, (AHFL) shall levy additional interest/penal interest for non-payment of EMI/PEMI and as per agreed terms and conditions of the
            loan agreement and other documents executed with AHFL on disbursement, I/am, is/are is also aware that to adhere with the cancellation request done by me/us, is at the sole discretion of
            AHFL.
          </p>
        </div>
        <div class="col-md-12">
          <button type="submit" class="formSubmit loanSubmit otpFormDiv" disabled="disabled" value="Submit" name="loansubmit" id="MandateCancelBtn" style="border: 0"><strong>Submit</strong></button>
          <!-- <button type="button" class="formSubmit loanSubmit" disabled="disabled"  id="myLpBtn" style="border:0;"><strong>Add/Change Mandate</strong>
                    </button> -->
          <button type="button" class="formSubmit loanSubmit" value="reset" name="reset" id="MandateResetBtn" style="border: 0; display: none"><strong>Back</strong></button>
        </div>
      </form>
      <div class="clearfix"></div>
      <br /><br /><br /><br />
    </div>
    <?php
}
?>
    <!-- <h3 class="text-center loanH3">Or</h3> -->
    <div class="loanEnq">
      <h4>For Existing Customers (Customer Service)</h4>
      <div class="col-md-12 contInfoOuter noPad">
        <div class="col-md-6 brdRght contLeft">
          <div class="icoContact text-center"><img src="img/ico-call.png" /><br /><br /><strong>Call</strong></div>
          <div class="contInfoC text-center"><a href="tel:180030042020">1800 3004 2020</a></div>
        </div>
        <div class="col-md-6 contRight">
          <div class="icoContact text-center"><img src="img/ico-mail.png" /><br /><br /><strong>Email</strong></div>
          <div class="contInfoE text-center"><a href="mailto:customercare@aadharhousing.com">customercare@aadharhousing.com</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

        <div id="disc_pop_up" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <form id="disclaimer-form" data-parsley-validate>
                    <div class="modal-content">
                        <div class="modal-body">
                            <p><img src="img/logo.png" alt="Aadhar Housing Finance Ltd (AHFL)"
                                    class="center-block img-responsive" /></p>
                            <p style="text-align: center; font-size: 24px;">Request for Cancellation of NACH Mandate</p>

                            <p>Please note NACH Mandate Cancellation facility is available only for those customers who
                                have availed a Loan from Aadhar Housing Finance Ltd (AHFL) and have been paying their
                                monthly EMI (Instalment) through deduction from Bank account via NACH Mandate.</p>


                            <p>
                                AHFL has introduced Online Facility to cancel the active NACH Mandate through which
                                Monthly EMI (instalment) is deducted from customer’s bank account. The request for NACH
                                Mandate Cancellation would be accepted only after customer authentication is confirmed.
                            </p>



                            <p>Kindly follow the below steps to place a request for cancellation of active mandate:</p>

                            <p>
                                <b>STEP 1</b> Enter your 8-character AHFL’s Loan Application Number and Date of Birth
                                for account verification with our record.
                            </p>
                            <p><b>STEP 2</b> Post Validation webpage will display Applicant’s Mobile number with last
                                four (4) digits. Kindly validate Mobile Number and click on Send OTP option. (Mobile
                                number – XXXXXX1213)</p>
                            <p><b>STEP 3</b> Enter OTP details on webpage to validate mobile number authentication.</p>
                            <p><b>STEP 4</b> If your mandate is active with AHFL, it will display on the webpage.</p>
                            <p><b>STEP 5</b> Kindly check & select the mandate which needs to be cancelled.</p>
                            <p><b>STEP 6</b> Click required option, accept the Declaration and submit mandate
                                cancellation request.</p>
                            <p><b>STEP 7</b> AHFL Team will update you about the mandate cancellation status through
                                SMS.</p>
                            <h4 class="mt-20"><b>Disclaimer : </b></h4>
                            <ul>
                                <li>This service is for Aadhar Housing Finance Ltd customers only.</li>
                                <li>Mandate cancellation facility is only for active mandate from which regular EMI
                                    (instalment) is deducted / paid to AHFL.</li>
                                <li>For Swapping / Change in Bank account for paying monthly instalment, kindly visit
                                    AHFL branch and provide bank details, before cancellation of mandate.</li>
                                <li>New mandate will be accepted for applicant’s and co-applicant’s Bank accounts only.
                                </li>
                                <li>Mandate will not be cancelled automatically after submission of mandate request.
                                    Every submitted request will be Evaluated by AHFL Team and the status will
                                    communicated with the customer through SMS.</li>
                                <li>All future EMI dues of your loan should be paid on due dates as per original
                                    repayment schedule.</li>
                                <li>In case your mobile number has changed, please visit AHFL nearest branch to update
                                    your contact details in record.</li>
                                <li>
                                    In the event you are unable to make submit your mandate cancellation request, you
                                    can re-try after 24 hours. If you still experience an issue, please write a mail to
                                    <a href="mailto:Customercare@aadharhousing.com">Customercare@aadharhousing.com</a>
                                    (or) contact us on 180030042020.
                                </li>
                            </ul>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="agree"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1"> I agree to the above Terms &
                                    conditions.(Please tick) </label>
                            </div>
                            <div id="ModalErrorDiv"></div>

                        </div>
                        <div class="modal-footer" style="justify-content: center !important">
                            <button type="submit" id="i-agree" class="btn formSubmit">I ACCEPT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="categoryFooter">
            <div class="container content">
                <div class="row">
                    <div class="col-sm-6 borderRight">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="downloadIcon">
                                    <img src="img/branch.png" alt="Downloads" class="">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3 class="aboutFooterTitle">Branch Locator</h3>
                                <p class="aboutFooterText">
                                    <a class="transparentBtn"
                                        href="https://aadharhousing.com/ahfl-branch-locator.php">Find nearest branch</a>
                                </p>
                                <hr class="visible-xs">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 padT15">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="customerServiceIcon">
                                    <img src="img/customer-service.png"
                                        alt="Customer Service">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3 class="aboutFooterTitle">Customer Service</h3>
                                <p class="aboutFooterText">
                                    For customer grievances, enquiry, feedback please email your concerns/issues to <a
                                        class="emailLink"
                                        href="mailto:customercare@aadharhousing.com">customercare@aadharhousing.com</a>
                                    or <br>
                                    <a class="transparentBtn" href="tel:180030042020">Call us at : 1800 3004 2020 (Toll
                                        Free)</a>
                                </p>
                            </div>
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
        <div class="container-fluid footer-menu">
            <div class="row">
                <div class="col-md-9 col-xs-12">
                    <div class="col-md-3 col-xs-6 border-right">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="https://aadharhousing.com/about-us/overview.php">Overview</a></li>
                            <li><a href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision Mission &
                                    Values</a></li>
                            <li><a href="https://aadharhousing.com/about-us/management.php">Management</a></li>
                            <li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards &amp;
                                    Recognition</a></li>
                            <li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer Promise</a>
                            </li>
                            <!--<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman</a></li>-->

                            <!-- <li><a href="https://aadharhousing.com/about-us/press-releases.php">Press Releases</a></li> -->
                            <!--<li><a href="aboutus-aadhar-awareness-drive.php">Aadhar Awareness Drive</a></li>-->
                            <!--<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li>-->
                            <li><a href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory
                                    Approvals</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-6 border-right">
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="https://aadharhousing.com/categories/home-loan-salaried-employees.php">Home
                                    Loan For Salaried Employees</a></li>
                            <li><a href="https://aadharhousing.com/categories/home-loan-self-employed.php">Home Loan For
                                    Self Employed</a></li>
                            <li><a href="https://aadharhousing.com/categories/loan-for-plot-purchase-construction.php">Loan
                                    for plot purchase or/and construction</a></li>
                            <li><a href="https://aadharhousing.com/categories/home-improvement-loan.php">Home
                                    improvement loan</a></li>
                            <li><a href="https://aadharhousing.com/categories/home-extension-loan.php">Home extension
                                    loan</a></li>
                            <li><a href="https://aadharhousing.com/categories/loan-against-property.php">Loan against
                                    residential/commercial property</a></li>
                            <li><a href="https://aadharhousing.com/categories/balance-transfer.php">Balance transfer and
                                    Top up</a></li>
                            <li><a
                                    href="https://aadharhousing.com/categories/loan-purchase-construction-non-residential-property.php">Loan
                                    for purchase/Construction of Non-residential Property</a></li>
                            <!--<li><a href="https://aadharhousing.com/deposits/fixed-deposit.php#featuresRates">Fixed Deposits</a></li>ds-->
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 border-right">
                        <h4>Ready Reckoner</h4>
                        <ul>
                            <li><a href="https://aadharhousing.com/ready-reckoner/home-loan-approval-process.php">Home
                                    loan approval process</a></li>
                            <li><a
                                    href="https://aadharhousing.com/ready-reckoner/documents-needed-by-housing-finance-companies.php">Documents
                                    needed</a></li>
                            <li><a href="https://aadharhousing.com/ready-reckoner/services-charges-for-loan.php">Services
                                    & charges</a></li>
                            <li><a href="https://aadharhousing.com/ready-reckoner/home-loan-eligibility-calculator.php">Eligibility
                                    calculator</a></li>
                            <li><a href="https://aadharhousing.com/ready-reckoner/home-loan-emi-calculator.php">EMI
                                    Calculator</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-xs-6">
                        <h4>Careers</h4>
                        <ul>
                            <!--<li><a href="https://aadharhousing.com/careers/why-ahfl.php">Why AHFL</a></li>
                    <li><a href="https://aadharhousing.com/careers/aadhar-careers-benefits.php">Aadhar Benefits</a></li>
                    <li><a href="https://aadharhousing.com/careers/life-at-ahfl.php">Life @ AHFL</a></li>-->
                            <!-- <li><a href="https://aadharhousing.com/careers/start-your-career-at-aadhar.php">Start your career at AHFL</a></li> -->
                            <li><a href="https://aadharhousing.com/careers/culture-values.php">Culture &amp; Values</a>
                            </li>
                            <li><a href="https://aadharhousing.com/careers/why-ahfl.php">Why AHFL</a></li>
                            <li><a href="https://aadharhousing.com/careers/aadhar-careers-message-from-the-hr-head.php">Message
                                    from the HR Head</a></li>
                            <li><a href="https://aadharhousing.com/careers/aadhar-careers-benefits.php">Aadhar
                                    Benefits</a></li>
                            <li><a href="https://aadharhousing.com/careers/life-at-ahfl.php">Life @ AHFL</a></li>
                            <li><a href="https://aadharhousing.com/careers/gallery.php">Gallery</a></li>
                            <!-- <li><a href="https://aadharhousing.com/careers/start-your-career-at-aadhar.php">Start your career at AHFL</a></li> -->
                            <li><a href="https://aadharhousing.com/careers/apply-for-job.php">Apply for a job</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 links">
                    <!-- <a href="javascritp:void(0)">Blogs</a> -->
                    <a href="https://aadharhousing.com/faq.php">FAQ's</a>
                    <a href="https://aadharhousing.com/downloads.php">Downloads</a>
                    <a href="https://aadharhousing.com/customer-relations.php">Customer Relations</a>
                    <a href="https://aadharhousing.com/investor-relations/overview.php">Investor Relations</a>
                    <a href="https://aadharhousing.com/ahfl-branch-locator.php">Find your nearest branch</a>
                </div>
            </div>
        </div>
        <span class="visible-xs">
            <a href="#" class="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        </span>
        <footer>
            <div class="container-fluid bottom">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Copyright 2017. Aadhar Housing Finance Limited. All Rights Reserved | <a
                                href="https://aadharhousing.com/privacy-policy.php"> Privacy Policy</a></p>
                    </div>
                    <!-- <div class="col-md-5">
                <a href="javascript:void(0)">Disclaimer</a> |
                <a href="javascript:void(0)"> Privacy Policy</a> |
                <a href="javascript:void(0)"> Terms of use</a> |
                <a href="javascript:void(0)"> Sitemap</a>
            </div>
            <div class="col-md-2">

            </div> -->
                </div>
            </div>
        </footer>
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
                        regex: '[A-Za-z0-9]{8,16}',//number: true,
                        minlength: 8,
                        maxlength: 16
                    },
                    dob: {
                        required: true
                    }
                },
                messages: {
                    app_no: {
                        required: 'Please enter loan application number',
                        // number: 'Loan application number should be have digits',
                        regex : 'Loan application number should be alphanumeric and must be 8-16 characters long.',
                        minlength: 'Loan application number should have 8 digits minimum',
                        maxlength: 'Loan application number should have 16 digits maximum'
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
        });
    </script>

</body>
</html>