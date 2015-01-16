<?php require_once 'includes/header.php'; ?>
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
?>
                    <h1>Assessment Results</h1>
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
                            <a class="button" href="careers_majors.php?t1=<?php echo $types[0]; ?>&amp;t2=<?php echo $types[1]; ?>&amp;t3=<?php echo $types[2]; ?>&amp;pt=<?php echo $types[$i]; ?>">See Careers and Majors</a>
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
                    <a class="button wide-button" href="next_steps.php">Next Steps</a>
<?php require_once 'includes/footer.php'; ?>
