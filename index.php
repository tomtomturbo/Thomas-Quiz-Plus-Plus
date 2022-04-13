<?php include "header.php";
include "data-collector.php";

$currentQuestionIndex = 0; 

if (isset($_POST['lastQuestionIndex'])){
    $lastQuestionIndex = $_POST['lastQuestionIndex'];

    if (isset($_POST['nextQuestionIndex'])) {
    $currentQuestionIndex = $_POST['nextQuestionIndex'];

    }}
$query = $dbh->query("SELECT * FROM Questions");

$questions = $query->fetchAll(PDO::FETCH_ASSOC);

for ($q = 0; $q < count($questions); $q++) {
    $question = $questions[$q];
    $subQuery = $dbh->prepare("SELECT * from Answers where Answers.questionID = ?");
    $subQuery->bindValue(1, $question['ID']);
    $subQuery->execute();
    $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);

$questions[$q]['Answers'] = $answers;
}
//and put the question and answers data into PHP session:
$_SESSION['quizData'] = $questions;
//echo '<pre>';
//print_r($questions[$currentQuestionIndex]);
?>

<div class="container-fluid p-5 mt-5">
    <h3>Frage <?php echo $currentQuestionIndex;?></h3>
    <?php echo $questions[$currentQuestionIndex]['Text']; ?> 
    <form method = "post">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="0" id="checkbox1">
        <label class="form-check-label" for= "checkbox1">
    <?php 
        $answers = $questions[$currentQuestionIndex]['Answers'];
        $answer = $answers[0];
        echo $answer['Text'];
        ?>
        </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" id="checkbox2">
    <label class="form-check-label" for="checkbox2">
        <?php 
            $answers = $questions[$currentQuestionIndex]['Answers'];
            echo $answers[1]['Text'];
            ?>
            </label>
            </div>
     <div class="form-check">
    <input class="form-check-input" type="checkbox" value="2" id="checkbox3">
    <label class="form-check-label" for="checkbox3">

        <?php 
            $answers = $questions[$currentQuestionIndex]['Answers'];
            echo $answers[2]['Text'];
            ?>
            </label>
</div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-outline-success btn-sm">Weiter</button>
        <input type="hidden" name="lastQuestionIndex" value="<?php echo $currentQuestionIndex; ?>">
        <input type="hidden" name="nextQuestionIndex" value="<?php echo $currentQuestionIndex +1; ?>">
</form>
        </body>

        </html>
