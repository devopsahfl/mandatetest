
        <!-- Place favicon.ico in the root directory -->

		<!-- <link rel="stylesheet" href="css/normalize.css"> -->
		<link rel="stylesheet" href="https://aadharhousing.com/css/header.css">   
        <link rel="stylesheet" href="https://aadharhousing.com/css/main.css">
        <link rel="stylesheet" href="https://aadharhousing.com/css/bootstrap.css">   
		<link rel="stylesheet" href="https://aadharhousing.com/css/jquery.bxslider.css"> 
		<!-- <link rel="stylesheet" href="css/bootstrap-slider.css">    -->
		<link rel="stylesheet" href="https://aadharhousing.com/css/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="https://aadharhousing.com/css/style.css">   

		<link rel="Stylesheet" type="text/css" href="https://aadharhousing.com/css/carousel.css" />
        
		<script src="https://use.fontawesome.com/65c25715a6.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
		<script src="https://aadharhousing.com/js/jquery-3.2.1.min.js"></script>
		
		<script>
	$(document).ready(function(){
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-81813128-1', 'auto');
  ga('send', 'pageview');
</script>
<style>

html,body {
    -webkit-font-smoothing: antialiased;    
}
::i-block-chrome, .navbar-nav.top-links{
		margin-top:40px;
} 
</style>



<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '438441176764905');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=438441176764905&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->



<!-- Global site tag (gtag.js) - Google Ads: 876788505 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-876788505"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-876788505');
</script>
<!-- END Global site tag (gtag.js) - Google Ads: 876788505 -->
<style>
@media (max-width:767px){
.navbar-toggle{
	display: flex !important;
    align-items: center;
    position: relative;
    top: -6px;
}
.menu-text{
	position: relative;
    top: 8px;
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
                        <button type="button" class="navbar-toggle visible-xs" data-toggle="collapse" data-target=".navbar-main-collapse">
							<p class="menu-text">MENU &nbsp;</p>
                        <i class="fa fa-bars" style="opacity:0"></i>
						</button>
						<?php
							$srvr=$_SERVER['SERVER_NAME'];
							$requri=$_SERVER['REQUEST_URI'];
							$url = $srvr.$requri;
							if (strpos($url,'hindi') !== true) {
								$hindiurl = $srvr.'/hindi'.$requri;
							}
						?>
						
						<div class="dropdown chooseL cl-mobile visible-xs">
							<button class="dropdown-toggle" type="button" data-toggle="dropdown">Language / भाषा
							<span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>
								<a id="hindiSite" style="display:inline-block" onClick="window.location.href = 'http://<?php echo $hindiurl; ?>'" href="javascript:void(0)">हिंदी</a>
								</li>
							</ul>
						</div>
						
						<div class="margTop visible-xs"><a class="blink_me" href="https://pay.aadharhousing.com/makepayment/public/" target="_blank">Pay Online</a></div>
						
                        <a class="navbar-brand" href="https://aadharhousing.com/" style="height: 100px !important;">
                            <img src="https://aadharhousing.com/img/logo.png" alt="Aadhar Housing Finance Ltd (AHFL)" />
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
								<li><a href="https://aadharhousing.com/categories/home-loan-salaried-employees.php">Home Loan for Salaried Employees</a></li>
										<li><a href="https://aadharhousing.com/categories/home-loan-self-employed.php">Home Loan for Self Employed</a></li>
										<li><a href="https://aadharhousing.com/categories/loan-for-plot-purchase-construction.php">Loan for Plot Purchase or/and Construction</a></li>
										<li><a href="https://aadharhousing.com/categories/home-improvement-loan.php">Home Improvement Loan</a></li>
										<li><a href="https://aadharhousing.com/categories/home-extension-loan.php">Home Extension Loan</a></li>
										<li><a href="https://aadharhousing.com/categories/loan-against-property.php">Loan against Residential/Commercial Property</a></li>
										<li><a href="https://aadharhousing.com/categories/balance-transfer.php">Balance Transfer and Top up</a></li>
										<li><a href="https://aadharhousing.com/categories/loan-purchase-construction-non-residential-property.php">Loan for Purchase/Construction of Non-residential Property</a></li>
                                        <li><a href="https://aadharhousing.com/categories/home-loan-pradhan-mantri-awas-yojana.php">Pradhan Mantri Awas Yojana</a></li>
										<li><a href="https://aadharhousing.com/categories/home-loan-covid-warriors-griha-loans.php">Covid19 Warriors Griha Loan</a></li>
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
								<li><a href="https://aadharhousing.com/about-us/overview.php">Overview</a></li>
										<li><a href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision, Mission & values</a></li>
										<!--<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman</a></li>-->
										<li><a href="https://aadharhousing.com/about-us/management.php">Management</a></li>
										<li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards & Recognition</a></li>
										<li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer Promise</a></li>
										<!--<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li>-->
										<li><a href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory Approvals</a></li>
								</ul>
							</li>
							<li class=""><a href="#">Ready Reckoner<span class="submenu-indicator"></span></a>
								<ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
									<li><a href="https://aadharhousing.com/ready-reckoner/home-loan-approval-process.php">Home Loan Approval Process</a></li>
									<li><a href="https://aadharhousing.com/ready-reckoner/documents-needed-by-housing-finance-companies.php">Documents Needed</a></li>
									<li><a href="https://aadharhousing.com/ready-reckoner/services-charges-for-loan.php">Services & Charges</a></li>
									<li><a href="https://aadharhousing.com/ready-reckoner/home-loan-eligibility-calculator.php">Eligibility Calculator</a></li>
									<li><a href="https://aadharhousing.com/ready-reckoner/home-loan-emi-calculator.php">EMI Calculator</a></li>
							</ul>
							</li>
								<li class=""><a href="#">Customer Relations<span class="submenu-indicator"></span></a>
								<ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
									<li><a href="https://aadharhousing.com/customer-relations/unauthorized-iondividuals-entities-disclaimer.php">Unauthorized Individuals/Entities Disclaimer</a></li>
										<li><a href="https://aadharhousing.com/customer-relations/AHFL-Policies-Codes.php">AHFL Policies & Codes</a></li>										
										<li><a href="https://aadharhousing.com/pdf/T&Csarfaesi.pdf" target="_blank">Tender format & General Terms & Conditions for Auction of Properties</a></li>
										<li><a href="https://aadharhousing.com/customer-relations/Aadhar-Insurance-Services.php">Aadhar Insurance Services</a></li>
										<li><a href="https://aadharhousing.com/pdf/List-of-Authorized-Collection-and-Recovery-Agents.pdf" target="_blank">List of Authorized Collection and Recovery Agents</a></li>
										<li><a href="https://aadharhousing.com/customer-relations/branch-shifting-relocation-intimation.php">
										Branch Shifting/Relocation Intimation</a></li>
							</ul>
							</li>
							<li><a href="#">Contacts</a></li>
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
								<li><a href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision, Mission & values</a></li>
<!--								<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman s</a></li>-->
								<li><a href="https://aadharhousing.com/about-us/management.php">Board of Directors</a></li>
								<li><a href="https://aadharhousing.com/about-us/management-team.php">Management Team</a></li>
								<li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards & Recognition</a></li>
								<li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer Promise</a></li>
<!--								<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger s</a></li>-->
								<li><a href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory Approvals</a></li>
							</ul>
						</li>
             
                         <li> <a href="https://aadharhousing.com/downloads.php">Downloads</a></li>
                        <!--    <li><a href="https://aadharhousing.com/emi-moratorium.php">EMI Moratorium</a></li>
                        <li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li> -->
                        <li><a class="blink_me" href="https://pay.aadharhousing.com/makepayment/public/" target="_blank">Pay Online</a></li>
                        <li class="branchLocator"><a href="https://aadharhousing.com/become-a-partner.php">Become a Partner</a></li>
						<li class="branchLocator"><a href="https://aadharhousing.com/ahfl-branch-locator.php">Branch Locator</a></li>

						<li class="chooseL">
							<button class="dropdown-toggle" type="button" data-toggle="dropdown">Language / भाषा
							<span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>
									<a id="engSite" style="display:inline-block" onClick="window.location.href = 'http://<?php echo $hindiurl; ?>'" href="javascript:void(0)">हिंदी</a>
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
										<li><a href="https://aadharhousing.com/categories/home-loan-salaried-employees.php">Home Loan for Salaried Employees</a></li>
										<li><a href="https://aadharhousing.com/categories/home-loan-self-employed.php">Home Loan for Self Employed</a></li>
										<li><a href="https://aadharhousing.com/categories/loan-for-plot-purchase-construction.php">Loan for Plot Purchase or/and Construction</a></li>
										<li><a href="https://aadharhousing.com/categories/home-improvement-loan.php">Home Improvement Loan</a></li>
										<li><a href="https://aadharhousing.com/categories/home-extension-loan.php">Home Extension Loan</a></li>
										<li><a href="https://aadharhousing.com/categories/loan-against-property.php">Loan against Residential/Commercial Property</a></li>
										<li><a href="https://aadharhousing.com/categories/balance-transfer.php">Balance Transfer and Top up</a></li>
										<li><a href="https://aadharhousing.com/categories/loan-purchase-construction-non-residential-property.php">Loan for Purchase/Construction of Non-residential Property</a></li>
                                        <li><a href="https://aadharhousing.com/categories/home-loan-pradhan-mantri-awas-yojana.php">Pradhan Mantri Awas Yojana</a></li>
										<li><a href="https://aadharhousing.com/categories/home-loan-covid-warriors-griha-loans.php">Covid19 Warriors Griha Loan</a></li>
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
										<li><a href="https://aadharhousing.com/about-us/vision-mission-values.php">Vision, Mission & values</a></li>
										<!--<li><a href="https://aadharhousing.com/about-us/message-from-the-chairman.php">Message from the Chairman</a></li>-->
										<li><a href="https://aadharhousing.com/about-us/management.php">Management</a></li>
										<li><a href="https://aadharhousing.com/about-us/awards-recognition.php">Awards & Recognition</a></li>
										<li><a href="https://aadharhousing.com/about-us/customer-promise.php">Customer Promise</a></li>
										<!--<li><a href="https://aadharhousing.com/about-us/the-merger-info.php">About the Merger</a></li>-->
										<li><a href="https://aadharhousing.com/about-us/regulatory-approvals.php">Regulatory Approvals</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Ready Reckoner</a>
									<ul class="dropdown-menu">
										<li><a href="https://aadharhousing.com/ready-reckoner/home-loan-approval-process.php">Home Loan Approval Process</a></li>
										<li><a href="https://aadharhousing.com/ready-reckoner/documents-needed-by-housing-finance-companies.php">Documents Needed</a></li>
										<li><a href="https://aadharhousing.com/ready-reckoner/services-charges-for-loan.php">Services & Charges</a></li>
										<li><a href="https://aadharhousing.com/ready-reckoner/home-loan-eligibility-calculator.php">Eligibility Calculator</a></li>
										<li><a href="https://aadharhousing.com/ready-reckoner/home-loan-emi-calculator.php">EMI Calculator</a></li>
									</ul>
								</li>
								
								<li class="dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Customer Relations</a>
									<ul class="dropdown-menu">
									<li><a href="https://aadharhousing.com/customer-relations/unauthorized-iondividuals-entities-disclaimer.php">Unauthorized Individuals/Entities Disclaimer</a></li>
										<li><a href="https://aadharhousing.com/customer-relations/AHFL-Policies-Codes.php">AHFL Policies & Codes</a></li>										
										<li><a href="https://aadharhousing.com/pdf/T&Csarfaesi.pdf" target="_blank">Tender format & General Terms & Conditions for Auction of Properties</a></li>
										<li><a href="https://aadharhousing.com/customer-relations/Aadhar-Insurance-Services.php">Aadhar Insurance Services</a></li>
										<li><a href="https://aadharhousing.com/pdf/List-of-Authorized-Collection-and-Recovery-Agents.pdf" target="_blank">List of Authorized Collection and Recovery Agents</a></li>
										<li><a href="https://aadharhousing.com/customer-relations/branch-shifting-relocation-intimation.php">
										Branch Shifting/Relocation Intimation</a></li>
										
									</ul>
								</li>
								
								<li class="dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Investor Relations</a>
									<ul class="dropdown-menu">
										
										<li><a href="https://aadharhousing.com/investor-relations/Annual-Report-and-Returns.php">Annual Report and Returns</a></li>
										<li><a href="https://aadharhousing.com/investor-relations/aadhar-housing-financial-publications-reports.php">Financial Publications</a></li>
										<li><a href="https://aadharhousing.com/investor-relations/Shareholders-Meetings.php">Shareholders’ Meetings</a></li>
										<li><a href="https://aadharhousing.com/investor-relations/Public-Notice-and-Intimation.php">Public Notice and Intimation</a></li>
										<li><a href="https://aadharhousing.com/investor-relations/NCD-Series.php">NCD Series</a></li>
										<li><a href="https://aadharhousing.com/pdf/related-party-transactions-policy.pdf" target="_blank">Related Party Transaction Policy</a></li>
										<li><a href="https://aadharhousing.com/pdf/Internal-Guidelines-on-Corporate-Governance.pdf" target="_blank">Internal Guidelines on Corporate Governance</a></li>
										<li><a href="https://aadharhousing.com/investor-relations/aadhar-housing-asspl-annual-report.php">Subsidiary Company Annual Report</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="https://aadharhousing.com/media.php">Media</a>
									<ul class="dropdown-menu">
										<li><a href="https://aadharhousing.com/media.php?Print-Publications">Print Publications</a></li>
										<li><a href="https://aadharhousing.com/media.php?Video-Broadcasts">Video Broadcasts</a></li>
										<li><a href="https://aadharhousing.com/media.php?Brand-Films">Brand-Films</a></li>
										<li><a href="https://aadharhousing.com/knowledge-centre.php">Knowledge Centre</a></li>
									</ul>
								</li>
								<li>
									<a href="https://aadharhousing.com/auctions.php">Auctions</a>
								</li>
								<li class="dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-hover="dropdown">Careers</a>
									<ul class="dropdown-menu">
										<li><a href="https://aadharhousing.com/careers/culture-values.php">Culture & Values</a></li>
										<li><a href="https://aadharhousing.com/careers/why-ahfl.php">Why AHFL</a></li>
										<li><a href="https://aadharhousing.com/careers/aadhar-careers-message-from-the-hr-head.php">Message from the HR Head</a></li>
										<li><a href="https://aadharhousing.com/careers/aadhar-careers-benefits.php">Aadhar Benefits</a></li>
										<li><a href="https://aadharhousing.com/careers/life-at-ahfl.php">Life @ AHFL</a></li>
										<li><a href="https://aadharhousing.com/careers/gallery.php">Gallery</a></li>
										<!-- <li><a href="https://aadharhousing.com/careers/start-your-career-at-aadhar.php">Start your career at AHFL</a></li> -->
										<li><a href="https://aadharhousing.com/careers/apply-for-job.php">Apply for a job</a></li>
									</ul>
								</li>
								<li>
									<a href="https://aadharhousing.com/pdf/Unauthorized-Entities-Disclaimer.pdf" target="_blank">Disclaimer</a>
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
								<li class="visible-xs branchLocator"><a href="https://aadharhousing.com/become-a-partner.php">Become a Partner</a></li>
								<li class="visible-xs branchLocator"><a href="https://aadharhousing.com/ahfl-branch-locator.php">Branch Locator</a></li>
							</ul>
							<ul class="nav navbar-nav social">
								<!-- <li><a href="" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
								<li><a href="https://www.facebook.com/aadharhousing/" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/AadharHousing" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/company/aadhar-housing-finance-ltd" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCmQPDjZlhllLQ0mU_CfMVRg" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
								<li><a href="https://www.instagram.com/aadharhousing/" target="_blank"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
            </nav>


