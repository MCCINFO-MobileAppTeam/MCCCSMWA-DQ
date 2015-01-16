<?php
require_once 'includes/pdo_demo.php';
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <script src="assets/scripts/html5shiv-3.7.0.min.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
        <script src="assets/scripts/default_demo.js"></script>
<?php
if (isset($scripts)) {
    foreach ($scripts as $script) {
?>
        <script src="<?php echo $script; ?>"></script>
<?php
    }
}
?>
        <title>MCC Career Services<?php if (isset($title)) { echo '- ', $title; } ?></title>
    </head>
    <body<?php if ($page === 'index.php') {?> id="page-index"<?php } ?>>
        <div id="wrapper">

            <div id="content">
                <noscript>Please enable JavaScript in your browser.</noscript>
                <section id="javascript-content" style="display: none;">
