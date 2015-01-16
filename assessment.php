<?php
$scripts = array('//code.jquery.com/ui/1.10.3/jquery-ui.min.js', 'assets/scripts/assessment.js');
$title = 'Identity Your Interests';
?>

<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>MCCCS Assessment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head> 
<body> 

<!-- Assessment Home Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->

	
	<div data-role="content"><!-- opening content div-->
		<?php require_once 'includes/header_demo.php'; ?>
						<h1>Identify Your Interests</h1>
						<div id="assessment" style="margin: auto;" ></div>	
	</div><!--closing content div-->
					
<?php
include ('includes/footer.php');
?>   
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
