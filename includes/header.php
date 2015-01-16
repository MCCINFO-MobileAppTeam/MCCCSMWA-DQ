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
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <link href="assets/stylesheets/default.css" rel="stylesheet" type="text/css">
        <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <script src="assets/scripts/html5shiv-3.7.0.min.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<?php
if (isset($scripts)) {
    foreach ($scripts as $script) {
?>
        <script src="<?php echo $script; ?>"></script>
<?php
    }
}
?>
        <script src="assets/scripts/default.js"></script>
        <title>MCC Career Services<?php if (isset($title)) { echo '- ', $title; } ?></title>
    </head>
    <body>
        <div id="wrapper">
		<!--
            <header>
                <nav>
                    <a class="nav-button" id="back-button">Back</a>
                    <a href="index.php" id="logo"></a>
                    <a class="nav-button" href="index.php" id="home-button">Home</a>
                </nav>
            </header>
		-->	
            <div id="content">
                <noscript>Please enable JavaScript in your browser.</noscript>
                <section id="javascript-content" style="display: none;">
