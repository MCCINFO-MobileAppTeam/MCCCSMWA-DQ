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
$pdo = new PDO(
    $dsn,
    $settings['username'],
    $settings['password']
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
