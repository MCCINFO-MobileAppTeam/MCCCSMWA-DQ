<?php
require_once 'includes/page_start.php';
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>MCCCS Next Steps</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	</head> 
<body> 

<!-- Home Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->
            <h3>You're On Your Way!</h3>
			
			<!--<a class="button" href="careers_majors.php?t1=<?php echo $types[0]; ?>&amp;t2=<?php echo $types[1]; ?>&amp;t3=<?php echo $types[2]; ?>&amp;pt=<?php echo $types[$i]; ?>" data-role="button" data-inline="true" >See Majors & Careers</a>	<br><br>-->				
			
                <div class="options">
                    <div class="option">
                        <div class="option-text">
                            <p>Explore MCC Programs.</p>
                        </div>
                        <a class="button" rel="external" href="https://www.mccneb.edu/future/get_content.asp?url=/careercenter/career_cluster/" data-role="button" data-icon="search" data-mini="false">Engage in education</a>
						</div>				
                    <div class="option">
                        <div class="option-text">
                            <p>Our NEworks Partnership</p>
                        </div>
                        <a class="button" rel="external" href="http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/neworks.php" data-role="button" data-icon="info" data-mini="false">Navigate your career</a>
                    </div>
                    <div class="option">
                        <div class="option-text">
                            <p>Career Services for You.</p>
                        </div>
                        <a class="button" rel="external" href="http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/career_services_information.php" data-role="button" data-icon="action" data-mini="false">Explore Career Services</a>
                    </div>
                    <div class="option">
                        <div class="option-text">
                            <p>Contact Career Services.</p>
                        </div>
                        <a class="button" href="contact_career_services.php" data-role="button" data-icon="action" data-mini="false">Contact Us</a>
                    </div>
                    <!--<div class="option">
                        <div class="option-text">
                            <p>Share feedback for our app.</p>
                        </div>
                        <a class="button" href="feedback.php" data-role="button" data-icon="check" data-mini="false">Share Feedback</a>
                    </div>-->					
                 <div class="option-text"><h2>Get to Know Us Better</h2></div>
                <!--<h4>Application Overview Video</h4>-->
                <iframe id="ensembleEmbeddedContent_-ysFDbJJKUKbIrWv-gOBNQ" src="https://mccneb.ensemblevideo.com/app/plugin/embed.aspx?ID=-ysFDbJJKUKbIrWv-gOBNQ&displayTitle=false&startTime=0&autoPlay=false&hideControls=true&showCaptions=false&width=240&height=161&displaySharing=true" frameborder="0" style="width:240px;height:223px;" height="223" width="240" allowfullscreen></iframe>
				<h2><a href="https://www.mccneb.edu/careercenter/" rel="external" data-role="button" data-inline="true" >Visit our Career Center</a></h2>						
				</div>
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>   
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->

