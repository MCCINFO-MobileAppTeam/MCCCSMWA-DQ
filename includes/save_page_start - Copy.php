<?php
require_once 'includes/pdo.php';
session_start();
if (!isset($_SESSION['visit_num'])) {
    $_SESSION['visit_num'] = rand();
    $query = 'INSERT INTO visit(visit_num) VALUES(:visit_num)';
    $statement = $pdo->prepare($query);
    $statement->bindParam(
        ':visit_num',
        $_SESSION['visit_num'],
        PDO::PARAM_STR
    );
    $statement->execute();
}
$query = 'INSERT INTO app_utilization(visit_num, page) ' .
    'VALUES(:visit_num, :page)';
$statement = $pdo->prepare($query);
$statement->bindParam(':visit_num', $_SESSION['visit_num'], PDO::PARAM_STR);
$page = basename($_SERVER['SCRIPT_FILENAME']);
$statement->bindParam(':page', $page, PDO::PARAM_STR);
$statement->execute();
?>