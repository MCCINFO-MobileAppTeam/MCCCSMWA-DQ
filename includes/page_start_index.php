<?php
require_once 'includes/pdo.php';
require_once 'includes/functions.php';

session_start();

if (!isset($_SESSION['visit_num'])) {
    $_SESSION['visit_num'] = rand();
	
	try {	
		$query = 'INSERT INTO visit(visit_num) VALUES(:visit_num)';
		$statement = $pdo->prepare($query);
		$statement->bindParam(
			':visit_num',
			$_SESSION['visit_num'],
			PDO::PARAM_STR
		);
		$statement->execute();
	}
	catch(PDOException $e)
	{
		writeLogMessage($pdo,110, $e->getMessage());	
		/* Redirect browser to the home page of the app*/
		header("Location: http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/error_apology.php");
		/* Make sure that code below does not get executed when we redirect. */
		exit;	
	}	
	
}

try {	
	$query = 'INSERT INTO app_utilization(visit_num, page) ' .
		'VALUES(:visit_num, :page)';
	$statement = $pdo->prepare($query);
	$statement->bindParam(':visit_num', $_SESSION['visit_num'], PDO::PARAM_STR);
	$page = basename($_SERVER['SCRIPT_FILENAME']);
	$statement->bindParam(':page', $page, PDO::PARAM_STR);
	$statement->execute();
}	
catch(PDOException $e)
{
	writeLogMessage($pdo,$_SESSION['visit_num'], $e->getMessage());	
	/* Redirect browser to the home page of the app*/
	header("Location: http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/error_apology.php");
	/* Make sure that code below does not get executed when we redirect. */
	exit;	
}	
?>