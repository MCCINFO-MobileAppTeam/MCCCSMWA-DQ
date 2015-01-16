<?php
function personalityType($hollandCode)
{
	if ($hollandCode === 'r') {
		$personType = 'Realistic';
	} elseif ($hollandCode === 'a') {
		$personType = 'Artistic';
	} elseif ($hollandCode === 's') {
		$personType = 'Social';	
	} elseif ($hollandCode === 'c') {
		$personType = 'Conventional';	
	} elseif ($hollandCode === 'i') {
		$personType = 'Investigative';	
	} elseif ($hollandCode === 'e') {
		$personType = 'Enterprising';		
	} else {
		$personType = 'Unknown';
	}
	return $personType;
}

function personalityTypeDescription($hollandCode)
{
	if ($hollandCode === 'r') {
		$personTypeDescription = 'Realistic people have athletic ability; prefer to work with objects, machines, tools, plants or animals; or enjoy being outdoors.';
	} elseif ($hollandCode === 'a') {
		$personTypeDescription = 'Artistic people have artistic, innovating, or intuition abilities and like to work in unstructured situations using their imagination and creativity.';
	} elseif ($hollandCode === 's') {
		$personTypeDescription = 'Social people like to work with people to enlighten, inform, help, train, or cure them; or they are skilled with words.';	
	} elseif ($hollandCode === 'c') {
		$personTypeDescription = 'Conventional people like to work with data, have clerical or numerical ability, carry out tasks in detail, or follow through on others\' instructions.';	
	} elseif ($hollandCode === 'i') {
		$personTypeDescription = 'Investigative people like to observe, learn, investigate, analyze, evaluate, or solve problems.';	
	} elseif ($hollandCode === 'e') {
		$personTypeDescription = 'Enterprising people like to work with people, influencing, persuading, leading or managing for organizational goals or economic gain.';		
	} else {
		$personTypeDescription = 'Unknown personality type description.';
	}
	return $personTypeDescription;
}

function personalityTypeHtml($hollandCode)
{
	if ($hollandCode === 'r') {
		$personalityTypeHtml = 'http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/realistic_careers_mcc_programs.html';
	} elseif ($hollandCode === 'a') {
		$personalityTypeHtml = 'http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/artistic_careers_mcc_programs.html';
	} elseif ($hollandCode === 's') {
		$personalityTypeHtml = 'http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/social_careers_mcc_programs.html';	
	} elseif ($hollandCode === 'c') {
		$personalityTypeHtml = 'http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/conventional_careers_mcc_programs.html';	
	} elseif ($hollandCode === 'i') {
		$personalityTypeHtml = 'http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/investigative_careers_mcc_programs.html';	
	} elseif ($hollandCode === 'e') {
		$personalityTypeHtml = 'http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/enterprising_careers_mcc_programs.html';	
	} else {
		$personalityTypeHtml = 'Unknown personality type html.';
	}
	return $personalityTypeHtml;
}

function writeLogMessage($pdo,$visitNum, $message)
{

try {
	$query = 'INSERT INTO log_message(visit_num, message) VALUES(:visit_num, :message)';
	$statement = $pdo->prepare($query);
	$statement->bindParam(':visit_num', $visitNum, PDO::PARAM_STR);	
	$statement->bindParam(':message', $message, PDO::PARAM_STR);
	$statement->execute();	
}
catch(PDOException $e)
{
/* Redirect browser to the home page of the app*/
	header("Location: http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/error_apology_no_db_log.php");
 /* Make sure that code below does not get executed when we redirect. */
	exit;	
}

}
