<?php
//require_once 'includes/handler.php';
//include ('includes/handler.php');
//trigger_error ('testing 123', 1024);
require_once 'includes/page_start_index.php';
$_SESSION['_quesSet'] = 1;
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Discover MCC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.ico" />
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
	<link rel="apple-touch-icon" href="touch-icon-iphone.png" /> 
	<!-- For the iPad mini and the first- and second-generation iPad on iOS = 7: -->
	<link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png" /> 
	<!-- For iPhone with high-resolution Retina display running iOS = 7: -->
	<link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png" />
	<!-- For iPad with high-resolution Retina display running iOS = 7: -->
	<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head> 
<body>

<!-- Home Page -->
<div data-role="page" data-content-theme="a" id="csmwa">

	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<!--<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right"></a>-->
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->

	<div data-role="content"><!-- opening content div-->
	    <p class="indexintro">Discover &#9830; Engage &#9830; Navigate</p>
		<div class="collapsible" data-role="collapsible-set">
			<!-- Discover collapsible -->
			<div data-role="collapsible" data-inset="false">
				<h3>Discover</h3>
				<p><a href="assessment_intro.php" data-role="button" data-mini="true">Take Assessment</a></p>
				<p><a href="schedule_appointment_2.php" data-role="button" data-mini="true">Schedule an appointment</a></p>
			</div><!-- End Discover collapsible -->
			
			<!-- Engage collapsible -->
			<div data-role="collapsible" data-inset="false">
				<h3>Engage</h3>
				<p><a href="https://www.mccneb.edu/future/get_content.asp?url=/careercenter/career_cluster/" data-role="button" data-mini="true">Career Education Model</a></p>
				<p><a href="career_services_information.php" data-role="button" data-mini="true">Explore Career Services</a></p>
			</div><!-- End Engage collapsible -->
			
			<!-- Navigate collapsible -->
			<div data-role="collapsible" data-inset="false">
				<h3>Navigate</h3>
				<p><a href="neworks.php" data-role="button" data-mini="true">NE Works</a></p>
				<p><a href="contact_career_services.php" data-role="button" data-mini="true">Contact Career Services</a></p>
			</div><!-- End Navigate collapsible -->
			
		</div>	
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?> 
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
