<?php
require_once 'includes/page_start.php';
?>
<!DOCTYPE html> 
<html>
	<head>
	<meta charset="utf-8">
	<title>MCCCS Campus Maps</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<body> 

<!-- MCCCS Maps Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->			
                <h3>MCC Campus Maps</h3>
				<div id="map" style="width: 300px; height: 300px;"></div>
				
						<script type="text/javascript">
							var locations = [				
								['<div class=\"map-info\">Fort Omaha<br/>5300 North 30th Street<br/>Omaha, NE 68111</div>', 41.31026, -95.95807, 5],
								['<div class=\"map-info\">South Omaha<br/>2902 Edward Babe Gomez Avenue<br/>Omaha, NE 68107</div>', 41.207928, -95.956868, 4],
								['<div class=\"map-info\">Elkhorn<br/>829 North 204th Street<br/>Elkhorn, NE 68022</div>', 41.265098, -96.230378, 3],
								['<div class=\"map-info\">Sarpy Center<br/>South 92nd Street<br/>La Vista, NE 68128</div>', 41.177153, -96.054305, 2],
								['<div class=\"map-info\">MCC Express<br/>3002 S 24th Street<br/>Omaha, NE 68108<br/>(corner of 24th and Vinton Streets)</div>', 41.230791, -95.948075, 1]
							];

							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 10,
								center: new google.maps.LatLng(41.262324, -96.040535),
								mapTypeId: google.maps.MapTypeId.ROADMAP
							});

							var infowindow = new google.maps.InfoWindow();
							var marker, i;

							for (i = 0; i < locations.length; i++) {  
								marker = new google.maps.Marker({
									position: new google.maps.LatLng(locations[i][1], locations[i][2]),
									map: map
								});
								
								google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
									return function() {
										infowindow.setContent(locations[i][0]);
										infowindow.open(map, marker);																					
									}
								})(marker, i));
								
								google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
									return function() {
										infowindow.close(map, marker);																					
									}
								})(marker, i));
								
								google.maps.event.addListener(marker, 'click', (function(marker, i) {
									return function() {																					
										map.setCenter(marker.getPosition());
										map.setZoom(15);
									}
								})(marker, i));
								
								/*
								google.maps.event.addListener(map, 'zoom_changed', function() {
									var zoom = map.getZoom();
									// iterate over markers and call setVisible
									for (i = 0; i < locations.length; i++) {
										markers[i].setVisible(zoom <= 14);
									}
								});
								*/
								
							}		
						</script>
	
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>    
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
