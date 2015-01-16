<?php
require_once 'includes/page_start.php';
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>MCCCS Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head> 
<body> 

<!-- MCCCS Information Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->
                <h3>Career Services Locations</h3>	
					<br>

	<div data-role="collapsible-set">

		<div data-role="collapsible">
		<h3>South Omaha Campus</h3>
		<p>2909 Edward Babe Gomez Ave.<br>Student Services</p>
		</div>

		<div data-role="collapsible">
		<h3>MCC Express - Vinton</h3>
		<p>3002 S. 24th St.<br>Omaha, NE</p>
		</div>		

		<div data-role="collapsible">
		<h3>Fort Omaha Campus</h3>
		<p>5300 N. 30th St.<br>Building 10<br>Student Services</p>
		</div>

		<div data-role="collapsible">
		<h3>Elkhorn Valley Campus</h3>
		<p>N. 204th St. & W. Dodge Rd.<br>Elkhorn, NE<br>Student Services</p>
		</div>	
		
	</div>

					
</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?> 
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
