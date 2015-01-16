<?php
require_once 'includes/page_start.php';
writeLogMessage($pdo,999, 'At top of careers_majors');
writeLogMessage($pdo,999, 'At top of careers_majors 2');
?>
<!DOCTYPE html> 
<html>
<head>

	<meta charset="utf-8">
	<title>MCCCS Careers & Majors</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.min.css">
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
<?php
require_once 'includes/page_start.php';
writeLogMessage($pdo,999, 'In head before script tags');
?>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
	<script src="assets/scripts/html5shiv-3.7.0.min.js"></script>
	<!-- <script src="assets/scripts/default.js"></script> -->	
	<!-- <script src="assets/scripts/careers_majors.js"></script> -->		
</head> 
<body> 

<?php
require_once 'includes/page_start.php';
writeLogMessage($pdo,999, 'Top of body');
?>

<!-- Careers & Majors Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->

	<?php
require_once 'includes/page_start.php';
writeLogMessage($pdo,999, 'Just before get types');
?>
	
	<?php
	require_once 'includes/functions.php';
	$title = 'Careers / Majors';
	$scripts = array('assets/scripts/careers_majors.js');
	$types = array();
	if (isset($_GET['t1'])) {
		$types[0] = $_GET['t1'];
	} else {
		$types[0] = 'r';
	}
	if (isset($_GET['t2'])) {
		$types[1] = $_GET['t2'];
	} else {
		$types[1] = 'r';
	}
	if (isset($_GET['t3'])) {
		$types[2] = $_GET['t3'];
	} else {
		$types[2] = 'r';
	}
	if (isset($_GET['pt'])) {
		$primaryType = $_GET['pt'];
	} else {
		$primaryType = 'r';
	}
	?>
		<h3>MCC Majors & Careers</h3>
		<div>
			<h4>Ready For Your Future?</h4>
		</div>
				
<?php
require_once 'includes/page_start.php';
writeLogMessage($pdo,999, 'Just before careers loop');
?>
				
	<?php for ($i = 0; $i < 3; $i += 1) { ?>	
						<div data-role="collapsible">	

    <h2><?php echo personalityType($types[$i]); ?></h2>
							
	  <h3><?php echo personalityType($types[$i]); ?> Personalities Match With These Majors</h3>
	<!-- <h2><a href="https://www.mccneb.edu/future/get_content.asp?url=/careercenter/career_cluster/">Explore MCC Programs</a></h2> -->
			<div class="data">
	<?php
	$query = 'SELECT major_name FROM majors WHERE holl_catg = :holl_catg ' .
		'ORDER by seq_num';
	//$statement = $pdo->query($query);
	$statement = $pdo->prepare($query);	
	$statement->bindParam(':holl_catg', $types[$i], PDO::PARAM_STR);
	$statement->execute();
	while ($row = $statement->fetch()) {
	?>
			<div class="datum"><?php echo $row['major_name']; ?></div>
	<?php } ?>
						
						

								 <h3><?php echo personalityType($types[$i]); ?> Personalities Match With These Careers</h3>
								 <h4>Career information provided by <a href="http://www.onetonline.org/">My Next Move</a></h4>								 
								 <div class="data">							 
								 
	<?php
	$query = 'SELECT career_name FROM careers WHERE holl_catg = :holl_catg ' .
		'ORDER BY seq_num';
	//$statement = $pdo->query($query);
	$statement = $pdo->prepare($query);	
	$statement->bindParam(':holl_catg', $types[$i], PDO::PARAM_STR);
	$statement->execute();
	while ($row = $statement->fetch()) {
	?>
	
			<div class="datum"><?php echo $row['career_name']; ?></div>
	<?php } ?> </div>	<!--class="data"-->	
	
	
<?php
require_once 'includes/page_start.php';
writeLogMessage($pdo,999, 'Just before majors loop');
?>	

	
	
			</div>
		    </div> <!--id="accordion"-->		   
	<?php } ?>

			<div>
				<!--<h3>Ready For Your Future?</h3>-->
				<a class="button" href="http://www.onetonline.org/explore/interests/" data-role="button" data-inline="true" >More careers</a>
				<a class="button" href="next_steps.php" data-role="button" data-inline="true" >Next steps</a>				
			</div>
					   
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>   
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->
