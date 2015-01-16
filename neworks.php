<?php
require_once 'includes/page_start.php';
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<titleNEWorks Information</title>
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
                <h3>Our Partnership <br>with NEworks</h3>	
                    <p>MCC is the first institution in the state to partner with the Nebraska Department of Labor and utilize their NEworks job site.</p>
					<br>
					
				<h3>NEworks can benefit <br>your career planning</h3>
					<p>Current MCC students and alumni use the keyword search <strong>Recruit MCC</strong> to view open positions. <br>
					<p>Employers interested in connecting with MCC talent can add <strong>Recruit MCC</strong> in their postings.<br>
					<br>
                <h2><a href="https://neworks.nebraska.gov/vosnet/Default.aspx" rel="external" data-role="button" data-inline="true" >Visit NEworks</a></h2>				
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>    
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
