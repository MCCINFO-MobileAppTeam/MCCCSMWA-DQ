<?php


function handler($e_number, $e_msg, $e_file, $e-line, $e_vars) {
	$err = "error message: " . $e_msg;
	
	error_log($err, 3, 'log/events.log');
	
}

set_error_handler('handler', E_ALL);

?>