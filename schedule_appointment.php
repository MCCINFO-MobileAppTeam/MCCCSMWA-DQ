<?php
require_once 'includes/page_start.php';
require_once 'includes/functions.php';
session_start();
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>MCCCS Schedule Appoint</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	<script>
	  $(document).ready(function(){ 
	    $("input[name='mcc_status']").change(function(){
	      if( this.id != 'radio_never' ){
		    if( $('#time').is(':hidden') ){
		      $('#time').show();
		   	  $('#days').show();			  
			  $('#campus').show();
			  $('#heading').show(); 
			}
		  }
	      if( this.id === 'radio_current' ){
            $("#current").popup('open');
          }else if( this.id === 'radio_alumni' ){
            $("#alumni").popup('open');     
          }else if( this.id === 'radio_prospective' ){
            $("#prospective").popup('open');
		  }else if( this.id === 'radio_never' ){
            $("#never").popup('open');
		      $('#time').hide();
			  $('#days').hide();
			  $('#campus').hide();
			  $('#heading').hide();
		  }
        }); 
	  });
	</script>
</head> 
<body> 

<!-- MCCCS Schedule Appointment Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content">
	
	<?php if ($_SERVER['REQUEST_METHOD'] !== 'POST') { 
			$firstName = $_SESSION['_firstName'];
			$lastName = $_SESSION['_lastName'];
			$email = $_SESSION['_email'];
			$phone = $_SESSION['_phone']; ?>
					<h3 id="heading">Request an Appointment with a Career Navigator</h3>
					<form class="validate" data-ajax="false" method="POST" id="appointment_form" name="appointment_form">
						<!--<div class="form-field"> old wrapper class="form-field"-->
												
						<!--popups for MCC Status-->
						<div data-role="popup" id="prospective" class="ui-content">
							<p>Welcome to MCC! A Career Navigator looks forward to working with you.  Please complete this Request an Appointment form.</p>
						</div>						
						<div data-role="popup" id="current" class="ui-content">
							<p>Great! A Career Navigator looks forward to working with you.  Please complete this Request an Appointment form.</p>
						</div>
						<div data-role="popup" id="alumni" class="ui-content">
							<p>Welcome Back! A Career Navigator looks forward to working with you.  Please complete this Request an Appointment form.</p>
						</div>
						<div data-role="popup" id="never" class="ui-content">
							<p>We appreciate your interest in exploring new career opportunities.  MCC Career Navigators work with prospective students, current students, and alumni. Please contact our partner the Nebraska Department of Labor at <a href="tel:4024737019">402-473-7019</a> or send an email to brittany.urias@nebraska.gov in the NEworks office for additional information.</p>
						</div>
						<div class="ui-field-contain" id="status">	
							<fieldset data-role="controlgroup"> 
								<legend>Please Select One</legend> 
									<label for="radio_prospective" class="apptradio"<a href="http://www.mccneb.edu">I am a <b>PROSPECTIVE</b> student.</label> 			
									<input  type="radio" name="mcc_status" id="radio_prospective" value="a prospective student at MCC.">								
									<label for="radio_current">I am a <b>CURRENT</b> student.</label> 	 
									<input type="radio" name="mcc_status" id="radio_current" value="a current MCC student." required>	
									<label for="radio_alumni">I am an <b>ALUMNI</b> of MCC.</label> 			
									<input  type="radio" name="mcc_status" id="radio_alumni" value="an MCC alumni.">
									<label for="radio_never" class="apptradio">I want to learn more about career opportunities.</label> 			
									<input  type="radio" name="mcc_status" id="radio_never" value="interested in career opportunities.">
							</fieldset>
						</div>
						<!--<div id="hwd_link">
							<br><br><a href="http://www.hws-ne.org/for-workers/career-center/">Heartland Workforce Development</a><br><br>
							<a href="tel:4027384060">Call: 402-738-4060</a>
						</div-->
						<div class="ui-field-contain" id="f_name">
                            <label for="first_name">First Name</label>
                            <input maxlength="50" name="first_name" id="first_name" type="text" value="<?php echo $firstName ?>" required>
                        </div>                        
						<div class="ui-field-contain" id="l_name">
                            <label for="last_name">Last Name</label>
                            <input maxlength="50" name="last_name" type="text" value="<?php echo $lastName ?>" required>
                        </div>
						<div class="ui-field-contain" id="con_method">	
							<fieldset data-role="controlgroup" data-type="horizontal"> 
								<legend>Preferred contact method</legend> 											
									<label for="radio_email">Email Me</label> 	 
									<input  type="radio" name="contact_method" id="radio_email" value="Email" required>					
									<label for="radio_phone">Call Me</label> 			
									<input  type="radio" name="contact_method" id="radio_phone" value="Phone">
							</fieldset>
						</div>
                        <div class="ui-field-contain" id="email">
                            <label for="email">Email Address</label>
                            <input class="required email" data-validation="email" data-validation-error-msg="You did not enter a valid e-mail" maxlength="80" name="email" type="email" value="<?php echo $email ?>">
                        </div>
						<div class="ui-field-contain" id="phone">
                            <label for="phone">Phone Number</label>
                            <input name="phone" id="phone" type="tel" value="<?php echo $phone ?>">
                        </div>	
						<div class="ui-field-contain" id="major">								
							<label for="intended_major" class="select">Your intended major</label> 
							<select name="intended_major" id="intended_major" data-native-menu="false">
								<option></option>
								<option value="Arts"/>Arts</option>
								<option value="Business/Information Technology">Business/Information Technology</option>
								<option value="Criminal Justice">Criminal Justice</option>								
								<option value="Culinary/Hospitality">Culinary/Hospitality</option>								
								<option value="General Studies">General Studies</option>
								<option value="Health Related">Health Related</option>									
								<option value="Horticulture">Horticulture</option>	
								<option value="Human Services">Human Services</option>
								<option value="Legal">Legal</option>	
								<option value="Trades">Trades</option>								
								<option value="Undecided">Undecided</option>		
							</select>
						</div>							
						<div class="ui-field-contain" id="time">								
							<label for="contact_time" class="select">Best contact time</label> 
							<select name="contact_time" id="contact_time" data-native-menu="false">
								<option></option>
								<option value="Any Time"/>Any Time</option>
								<option value="Morning">Morning</option>
								<option value="Afternoon">Afternoon</option>
							</select>
						</div>	
						<div class="ui-field-contain" id="days">								
							<label for="contact_days[]" class="select">Best day(s) to contact you</label> 
							<select name="contact_days[]" id="contact_days[]" multiple="multiple" data-native-menu="false">
								<option></option>
								<option value="Any Day"/>Any Day</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
							</select>
						</div>						
						<div class="ui-field-contain" id="campus">		
							<label for="campus_select" class="select">Preferred campus</label>
							<select name="campus_select" id="campus_select" data-native-menu="false">	
								<option></option>
								<option value="Any Location">Any Location</option> 	
								<option value="Elkhorn Valley Campus">Elkhorn Valley Campus</option> 							
								<option value="Fort Omaha Campus">Fort Omaha Campus</option> 			
								<option value="MCC Express">MCC Express</option> 			
								<option value="South Omaha Campus">South Omaha Campus</option> 
							</select>
						</div>
						<div class="ui-field-contain" id="submit_btn">
							<input id="btn" type="submit" value="Submit">
						</div>
                    </form>
	<?php } else {
		$emailRegex = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		$nameRegex = "/^[A-Za-z .'-]+$/";
		$errors = array();	
		if (empty($_POST['mcc_status'])) {
			$errors[] = 'You must specify your MCC status.';
		} else {
			$mccStatus = $_POST['mcc_status'];
		}
		if (empty($_POST['first_name'])) {
			$errors[] = 'You must specify a first name.';
		} else {
			$firstName = $_POST['first_name'];
			if (!preg_match($nameRegex, $firstName)) {
				$errors[] = 'The first name does not appear to be valid.';
			}
			$_SESSION['_firstName'] = $firstName;
		}
		if (empty($_POST['last_name'])) {
			$errors[] = 'You must specify a last name.';
		} else {
			$lastName = $_POST['last_name'];
			if (!preg_match($nameRegex, $lastName)) {
				$errors[] = 'The last name does not appear to be valid.';
			}  
			$_SESSION['_lastName'] = $lastName;
		}
		if (isset($_POST['contact_method'])) {
			$contactMethod = $_POST['contact_method'];
		} else {
			$errors[] = 'You must select a contact method.';
		}	 
		
		if (empty($_POST['email'])) {
			$errors[] = 'You must specify an email.';
		} else {
			$email = $_POST['email'];
			if (!preg_match($emailRegex, $email)) {
				$errors[] = 'The email does not appear to be valid.';
			} 
			$_SESSION['_email'] = $email;
		}	
		if (isset($_POST['phone'])) {
			$phone = $_POST['phone'];
			$_SESSION['_phone'] = $phone;
		} else {
			$phone = 'None Specified';
		}
		if ($contactMethod == 'Phone'){	
			if (empty($_POST['phone'])) {
				$errors[] = 'You must specify a phone number or select another contact method.';			
			} 
			if (empty($_POST['contact_time'])) {
				$errors[] = 'Please specify a time for us to call you.';			
			} 
			if (empty($_POST['contact_days'])) {
				$errors[] = 'Please specify a day(s) for us to call you.';			
			} 
		} 
		if (isset($_POST['intended_major'])) {
			$intended_major = $_POST['intended_major'];
		} else {
			$intended_major = 'None Specified';
		}		
		if (isset($_POST['contact_time'])) {
			$time = $_POST['contact_time'];
		} else {
			$time = 'None Specified';
		}
		if (isset($_POST['contact_days'])) {
			foreach( $_POST['contact_days'] as $day )
			$days .= "$day  ";     
		} else { 
			$days = 'None Specified';
		}
		if (isset($_POST['campus_select'])) {
			$location = $_POST['campus_select'];
		} else {
			$location = 'None Specified';
		}   
		if (count($errors) === 0) {  
			$_SESSION['_firstName'] = $firstName;
			$_SESSION['_lastName'] = $lastName;
			$_SESSION['_email'] = $email;
			$type1 = personalityType($_SESSION['type1']);
			$type2 = personalityType($_SESSION['type2']);
			$type3 = personalityType($_SESSION['type3']);
			
			if ($mccStatus == "interested in career opportunities.") {
			
			$message_admin = $firstName . ' ' . $lastName . " has requested to learn more about career opportunities.\n\n" .
				"This student is not an alumni, current or prospective student.\n\n" .		
				"This student has taken the Holland Code Assessment.\n\n" .		
				"The student has the following top three personality types: \n" .
				$type1 . "\n" .
				$type2 . "\n" .
				$type3 . "\n\n" .
				"They are " . $mccStatus . "\n" .
				"Preferred Contact Method: " . $contactMethod . "\n" .
				"Student Email Address: " . $email . "\n" .
				"Student Phone Number: " . $phone . "\n" .
				"Intended Major: " . $intended_major . "\n" .					
				"Please do not reply to this message directly.\n\n";
			}else{
			$message_admin = $firstName . ' ' . $lastName . " has requested to meet with a Career Services Navigator.\n\n" .
				"This person has taken the Holland Code Assessment.\n\n" .		
				"This person has the following top three personality types: \n" .
				$type1 . "\n" .
				$type2 . "\n" .
				$type3 . "\n\n" .
				"This person intends to major in " . $intended_major . ".\n\n" .				
				"This person is a " . $mccStatus . "\n" .
				"Preferred Contact Method: " . $contactMethod . "\n" .
				"Student Email Address: " . $email . "\n" .
				"Student Phone Number: " . $phone . "\n" .
				"Preferred Meeting Days: " . $days . "\n" .
				"Preferred Meeting Time: " . $time . "\n" . 
				"Preferred Meeting Location: " . $location . "\n\n" .	
				"Please do not reply to this message directly.\n\n";			
            }			
				
			$fromEmail = 'CCC@MCC.net';
			$subject_admin = 'MCC Career Services Appointment Request: ' . $firstName . ' ' . $lastName;
			//$email_admin = "careerservices@mccneb.edu";  
			$email_admin = "skip123paschall@gmail.com";  			
						
			mail($email_admin, $subject_admin, $message_admin, $fromEmail);
						
			if ($mccStatus == "interested in career opportunities.") {						
			$message_user = "Thank you " . $firstName . " " . $lastName . " for using the MCC Career Services app.\n\n" .
				"We appreciate your interest in exploring new career opportunities.\n" .
				"MCC Career Navigators work with MCC prospective students, current students and alumni.\n" .
				"Please contact our partner the Heartland Workforce Development Office at 402-473-7019 or\n" .	
				"send an email to brittany.urias@nebraska.gov in the Heartland Office for additional information.\n\n" .						
				"These are your top three personality types: \n" .
				$type1 . "\n" .
				$type2 . "\n" .
				$type3 . "\n\n" .
				"You stated you are " . $mccStatus . "\n" .
				"Your preferred Contact Method: " . $contactMethod . "\n" .
				"Your Email Address: " . $email . "\n" .
				"Your Phone Number: " . $phone . "\n" .
				"Your Intended Major: " . $intended_major . "\n" .					
				"Please do not reply to this message directly.\n\n";
			}else{
			$message_user = "Thank you " . $firstName . " " . $lastName . " for requesting to meet with a Career Services Navigator.\n\n" .
				"If you did not make this request or if any of the following information is incorrect, please contact us.\n\n" .
				"These are your top three personality types: \n" .
				$type1 . "\n" .
				$type2 . "\n" .
				$type3 . "\n\n" .
				"You stated you are " . $mccStatus . "\n" .
				"Your preferred Contact Method: " . $contactMethod . "\n" .
				"Your Email Address: " . $email . "\n" .
				"Your Phone Number: " . $phone . "\n" .
				"Your Intended Major: " . $intended_major . "\n" .					
				"Preferred Meeting Days: " . $days . "\n" .
				"Preferred Meeting Time: " . $time . "\n" . 
				"Preferred Meeting Location: " . $location . "\n\n" .	
				"Please do not reply to this message directly.\n\n";			
            }			
				
			$subject_user = 'Your MCC Career Services Appointment Request';
			$email_user = $email;  
			/* $email_user = "mcccsmwa@gmail.com"; */ 
			mail($email_user, $subject_user, $message_user, $fromEmail);
			
			$status = 'requested';
			
            if ($mccStatus == "a prospective student at MCC.") {
				$message_admin = $firstName . ' ' . $lastName . " has used the MCC Career Services mobile web app.\n\n" .
					"This person selected the status of Prospective Student when requesting an appointment with Career Services.\n\n" .				
					"Preferred contact method: " . $contactMethod . "\n" .
					"Email address: " . $email . "\n" .
					"Phone number: " . $phone . "\n\n" .	
				    "Intended Major: " . $intended_major . "\n" .						
					"This student has taken the Holland Code Assessment.\n" .						
					"The student has the following top three personality types: \n" .
					$type1 . "\n" .
					$type2 . "\n" .
					$type3 . "\n\n" .
					"Please do not reply to this message directly.\n\n";
					
					$fromEmail = 'CCC@MCC.net';
					$subject_admin = 'MCC Prospective Student: ' . $firstName . ' ' . $lastName;
					//$email_admin = "outreach@mccneb.edu";  
					$email_admin = "skip123paschall@gmail.com.edu";  					
					mail($email_admin, $subject_admin, $message_admin, $fromEmail);
			}
			
			try {				
				$query = 'INSERT INTO appt_request(visit_num, first_name, last_name, email_addr, type_1, type_2, type_3, mcc_status, contact_method, phone, mtg_days, mtg_time, mtg_location, status, intended_major) ' .
					'VALUES(:visit_num, :first_name, :last_name, :email_addr, :type_1, :type_2, :type_3, :mcc_status, :contact_method, :phone, :mtg_days, :mtg_time, :mtg_location, :status, :intended_major)';
				$statement = $pdo->prepare($query);
				$statement->bindParam(':visit_num', $_SESSION['visit_num'], PDO::PARAM_STR);
				$statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
				$statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
				$statement->bindParam(':email_addr', $email, PDO::PARAM_STR);	
				$statement->bindParam(':type_1', $type1, PDO::PARAM_STR);	
				$statement->bindParam(':type_2', $type2, PDO::PARAM_STR);	
				$statement->bindParam(':type_3', $type3, PDO::PARAM_STR);
				$statement->bindParam(':mcc_status', $mccStatus, PDO::PARAM_STR);
				$statement->bindParam(':contact_method', $contactMethod, PDO::PARAM_STR);	
				$statement->bindParam(':phone', $phone, PDO::PARAM_STR);				
				$statement->bindParam(':mtg_days', $days, PDO::PARAM_STR);	
				$statement->bindParam(':mtg_time', $time, PDO::PARAM_STR);
				$statement->bindParam(':intended_major', $intended_major, PDO::PARAM_STR);						
				$statement->bindParam(':mtg_location', $location, PDO::PARAM_STR);	
				$statement->bindParam(':status', $status, PDO::PARAM_STR);				
				$statement->execute();				
			}	
				catch(PDOException $e)
			{
				writeLogMessage($pdo,$_SESSION['visit_num'], $e->getMessage());	
				/* Redirect browser to the home page of the app*/
				//header("Location: http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/error_apology.php");
				/* Make sure that code below does not get executed when we redirect. */
				//exit;	
			}
			
	?>
			<h3>Thank you for requesting to meet with Career Services.<br>
			A Career Navigator will contact you within two business days.<br>
			Please check your email for your appointment request confirmation.</h3>
			<div><br>
				<!--<h3>Take Charge of Your Future</h3>-->
				<a class="button" href="next_steps.php" data-role="button" data-inline="true" >Next steps</a>
			</div>						
	<?php
		}
		else {
	?>
				<ul class="errors">
	<?php foreach ($errors as $error) { ?>
				<li class="error"><?php echo $error; ?></li>
	<?php } ?>
				</ul>
				<div>					
					<a class="button" href="#csmwa" data-inline="true" data-iconpos="notext" data-role="button" data-rel="back">Back To Form</a>
				</div>
	<?php
		}
	} ?>	
	
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>  
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->

