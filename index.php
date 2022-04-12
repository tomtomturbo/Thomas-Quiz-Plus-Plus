<?php include "header.php";

$query = $dbh->query("SELECT * FROM Questions");

$questions = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($questions as $key => $question) {
    $subQuery = $dbh->prepare("SELECT * from Answers where Answers.QuestionID = ?");
    $subQuery->bindValue(1, $question['ID']);
    $subQuery->execute();
    $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);

    $questions[$key]['Answers'] = $answers;
};
$firstQuestion = $questions[0];


echo '<div class="container-fluid p-5">';
echo '<h2>' . $firstQuestion['Text'] . '</h2>';

echo '<div class="row border">';
echo '<div class="col-6">';
echo 'A:';
echo '</div>';
echo '<div class="col-6">';
echo 'B:';
echo '</div>';
echo '</div>';

echo '<div class="row border">';
echo '<div class="col-6">';
echo 'C:';
echo   '</div>';
echo '<div class="col-6">';
echo 'D:';
echo '</div>';
echo '</div>';
echo '<br>';
echo '<button type="submit" class="btn btn-outline-primary btn-sm">Primary</button>'

?>

</body>

</html>