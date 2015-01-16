<?php
require_once 'includes/page_start.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html> 
<html>
	<head>
	<meta charset="utf-8">
	<title>MCCCS Contact Info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head> 
<body> 

<!-- MCCCS Contact Info Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->
	            <h2>Contact Us</h2><p>We are here for you!</p>
                <div class="options">
                    <div class="option">
						<a href="tel:4027384647" class="mobile_tel" data-role="button" data-icon="phone">Call (402) 738-4647</a>
                    </div>
                    <div class="option">
                        <a class="button" rel="external" href="schedule_appointment_2.php" data-role="button" data-icon="calendar" data-mini="false">Schedule Appointment</a>
                    </div>					
                    <div class="option">
						<a href="career_services_locations.php" data-role="button" data-icon="location" rel="external">Our Locations</a>
                    </div>					
                    <div class="option">
						<a href="campus_maps.php" data-role="button" data-icon="location" rel="external">Campus Maps</a>
                    </div>

                </div>
				<script>
					if (screen.width <= 500) {
						$('.mobile_tel').each(function() {
							$(this).wrap("<a href='tel:4028506170'/>");
						});
					}
				</script>
	
	</div><!--closing content div-->

<?php
writeLogMessage($pdo,$_SESSION['visit_num'], 'This is a test message');
?>
	
<?php
include ('includes/footer.php');
?>  
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
