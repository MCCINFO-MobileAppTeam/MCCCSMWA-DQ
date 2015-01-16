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
                <h2>Our Mission</h2>	
                    <p>The mission of Career Services at Metropolitan Community College is to foster collaborative relationships with both internal and external partners, to facilitate the development of responsible career decision-making skills and to provide comprehensive career development.</p>
					<br>
				<h2>Career Services Offers</h2>
					<p>Career assessment and exploration<br>
					Career Fairs (Open to all)<br>
					NEworks registration assistance<br>
					Interview preparation<br>
					Job and internship strategies<br>
					Résumé assistance
					</p>
					<br>
                <h2>Get to Know Us Better</h2>
				<<!--<h4>Application Overview Video</h4>-->
                <iframe id="ensembleEmbeddedContent_-ysFDbJJKUKbIrWv-gOBNQ" src="https://mccneb.ensemblevideo.com/app/plugin/embed.aspx?ID=-ysFDbJJKUKbIrWv-gOBNQ&displayTitle=false&startTime=0&autoPlay=false&hideControls=true&showCaptions=false&width=240&height=161&displaySharing=true" frameborder="0" style="width:240px;height:223px;" height="223" width="240" allowfullscreen></iframe>
				<h2><a href="https://www.mccneb.edu/careercenter/" rel="external" data-role="button" data-inline="true" >Visit our Career Center</a></h2>			
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>  
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
