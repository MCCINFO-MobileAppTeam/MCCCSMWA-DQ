<?php
require_once 'includes/pdo.php';
session_start();

if ($_SESSION['_quesSet'] == 1) {
$statement = $pdo->query(
    'SELECT ques_num, ques_text, ques_msg FROM question WHERE ques_set = 1 ORDER BY ques_num;');
	$_SESSION['_quesSet'] = 2;	
} else {
$statement = $pdo->query(
    'SELECT ques_num, ques_text, ques_msg FROM question WHERE ques_set = 2 ORDER BY ques_num;');
	$_SESSION['_quesSet'] = 1;		
}

//$statement = $pdo->query(
//    'SELECT ques_num, ques_text, ques_msg FROM question WHERE ques_set = $_SESSION['_quesSet'] ORDER BY ques_num;'
//);

$questions = $statement->fetchAll();
$questions = json_encode($questions);
header('Content-type: application/json');
echo $questions;
?>
