<?php

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$settings = array(
		'database' => 'e2v',
		'host'     => 'localhost',
		'password' => 'jcp88skp',
		'username' => 'spaschall'
	);
} else {
	$settings = array(
		'database' => 'repaschall_12FA_2439',
		'host'     => 'localhost',
		'password' => 'skp88jcp',
		'username' => 'repaschall'
	);
}

/*
$settings = array(
    'database' => 'e2v',
    'host'     => 'localhost',
    'password' => 'jcp88skp',
    'username' => 'spaschall'
);
*/

$dsn = 'mysql:host=' . $settings['host'] . ';dbname=' . $settings['database'];

try {
$pdo = new PDO(
    $dsn,
    $settings['username'],
    $settings['password']
);
}
catch(PDOException $e)
{
/* Redirect browser to the home page of the app*/
	header("Location: http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/error_apology_no_db_log.php");
	//header("Location: http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/error_apology_no_db_log.php");	
 /* Make sure that code below does not get executed when we redirect. */
	exit;	
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
