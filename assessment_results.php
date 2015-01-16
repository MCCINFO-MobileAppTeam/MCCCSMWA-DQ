<?php
require_once 'includes/page_start.php';
?>
<?php
require_once 'includes/pdo.php';
require_once 'includes/functions.php';
$title = 'Assessment Results';
$questions = array();
for ($i = 1; $i < 31; $i += 1) {
    $index = (string) $i;
    if ($i < 10) {
        $index = '0' . $index;
    }
    $index = 'q' . $index;
    if (isset($_POST[$index])) {
        if ($_POST[$index]) {
            $questions[$index] = 1;
        } else {
            $questions[$index] = 0;
        }
    } else {
        $questions[$index] = 0;
    }
}
$query = 'INSERT INTO assessment_answers(visit_num, ques_set, ';
$arrayKeys = array_keys($questions);
$keys = implode(', ', $arrayKeys);
$query .= $keys . ') VALUES(:visit_num, :ques_set, ';
foreach ($arrayKeys as $i => $arrayKey) {
    if ($i !== 0) {
        $query .= ', ';
    }
    $query .= ':' . $arrayKey;
}
$query .= ');';
$statement = $pdo->prepare($query);
$statement->bindParam(':visit_num', $_SESSION['visit_num'], PDO::PARAM_STR);
$quesSet = 1;
$statement->bindParam(':ques_set', $quesSet, PDO::PARAM_STR);
foreach ($arrayKeys as $arrayKey) {
    $name = ':' . $arrayKey;
    $statement->bindParam($name, $questions[$arrayKey], PDO::PARAM_STR);
}
$statement->execute();
$matrix = array(
    'q01' => 'r',
    'q02' => 'i',
    'q03' => 'a',
    'q04' => 's',
    'q05' => 'e',
    'q06' => 'c',
    'q07' => 'r',
    'q08' => 'i',
    'q09' => 'a',
    'q10' => 's',
    'q11' => 'e',
    'q12' => 'c',
    'q13' => 'r',
    'q14' => 'i',
    'q15' => 'a',
    'q16' => 's',
    'q17' => 'e',
    'q18' => 'c',
    'q19' => 'r',
    'q20' => 'i',
    'q21' => 'a',
    'q22' => 's',
    'q23' => 'e',
    'q24' => 'c',
    'q25' => 'r',
    'q26' => 'i',
    'q27' => 'a',
    'q28' => 's',
    'q29' => 'e',
    'q30' => 'c'
);
$counts = array(
    'r' => 0,
    'i' => 0,
    'a' => 0,
    's' => 0,
    'e' => 0,
    'c' => 0
);
foreach ($arrayKeys as $arrayKey) {
    if ($questions[$arrayKey] == 1) {
        $counts[$matrix[$arrayKey]] += 1;
    }
}
$query = 'INSERT INTO assessment_catg_ttl(
    visit_num,
    ques_catg,	
    ques_catg_ttl)
    VALUES(
    :visit_num,
    :ques_catg,	
    :ques_catg_ttl
)';
$statement = $pdo->query($query);
foreach ($counts as $key => $count) {
    $statement->bindParam(
        ':visit_num',
        $_SESSION['visit_num'],
        PDO::PARAM_STR
    );
    $statement->bindParam(':ques_catg', $key, PDO::PARAM_STR);
    $statement->bindParam(':ques_catg_ttl', $count, PDO::PARAM_STR);
    $statement->execute();
}
arsort($counts);
$types = array_keys($counts);
for ($i = 1; $i < 4; $i += 1) {
    $key = 'type' . $i;
    $_SESSION[$key] = $types[$i - 1];
    $key = 'typeLong' . $i;
    $_SESSION[$key] = personalityType($types[$i - 1]);
}
$_SESSION['_assessComplete'] = "true";
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>MCC Assessment Results</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head> 
<body> 

<!-- Assessment Results Page -->
<div data-role="page" data-content-theme="a" id="csmwa">

	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->
		
        <h3>Assessment Results</h3>
        <div class="options">
		<?php
		for ($i = 0; $i < 3; $i++) {
			$key = 'type' . $i;
			$type = personalityType($types[$i]);
			$description = personalityTypeDescription($types[$i]);
		?>
			<div class="option">
				<div class="option-text option-text-long">
					<h3>You are <?php echo $type; ?></h3>
					<p><?php echo $description; ?></p>
				</div>
				<!-- <a class="button" href="careers_majors.php?t1=<?php echo $types[0]; ?>&amp;t2=<?php echo $types[1]; ?>&amp;t3=<?php echo $types[2]; ?>&amp;pt=<?php echo $types[$i]; ?>">See Careers and Majors</a> -->
			</div>                        
		<?php
}
				$query = 'INSERT INTO assessment_holl_cd(
					visit_num,
					type_1,	
					type_2,
					type_3
				) VALUES(
					:visit_num,
					:type_1,
					:type_2,	
					:type_3
				)';
				$type1 = personalityType($types[0]);
				$type2 = personalityType($types[1]);
				$type3 = personalityType($types[2]);
				$statement = $pdo->prepare($query);
				$statement->bindParam(':visit_num', $_SESSION['visit_num'], PDO::PARAM_STR);
				$statement->bindParam(':type_1', $type1, PDO::PARAM_STR);
				$statement->bindParam(':type_2', $type2, PDO::PARAM_STR);
				$statement->bindParam(':type_3', $type3, PDO::PARAM_STR);
				$statement->execute();
				?>
        </div>
			<!--<a class="button" href="careers_majors.php?t1=<?php echo $types[0]; ?>&amp;t2=<?php echo $types[1]; ?>&amp;t3=<?php echo $types[2]; ?>&amp;pt=<?php echo $types[$i]; ?>" data-role="button" data-inline="true" >See Majors & Careers</a>	<br><br>-->
		    <a class="button" href="next_steps.php" data-role="button" data-inline="true" >Next steps</a><br><br>			
			<!--<a class="button" href="index.php">Home Page</a>-->	
			<h3>Assessment results don't seem to fit you?</h3>
			<p>Try the assessment again with a new set of questions.</p>				
			<a class="button" href="assessment.php" data-role="button" data-inline="true" >Retake the Assessment</a>
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>   
	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->

