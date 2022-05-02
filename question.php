<?php 



include 'php/db.php';
include 'php/data-collector.php';
include 'php/header.php';


$currentQuestionIndex = 0;

// Evaluate data in $_POST variable.
if (isset($_POST['lastQuestionIndex'])) {
    $lastQuestionIndex = $_POST['lastQuestionIndex'];

    if (isset($_POST['nextQuestionIndex'])) {
        $currentQuestionIndex = $_POST['nextQuestionIndex'];
    }
}

if (isset($_SESSION['questions'])){
//echo 'questions do NOT exist in session. <br>';
    $questions = $_SESSION['questions'];
}
else {
//echo 'questions data EXIST in session. <br>';
    $questions = getQuestions();
    $_SESSION['questions'] = $questions;
}

//echo '<pre>';
//print_r($_SESSION['questions']);
//echo '<pre>';
//echo '<pre>';
//print_r($questions[$currentQuestionIndex]);
?>

<div class="container-fluid p-5 mt-5">
    <h3>Frage <?php echo $currentQuestionIndex +1 ; ?></h3>
    <?php echo $questions[$currentQuestionIndex]['Text']; ?>
    <form <?php if ($currentQuestionIndex + 1 >= count($questions)) echo 'action="result.php" '; ?>method="post" onsubmit="return validation();">
        <?php
        $answers = $questions[$currentQuestionIndex]['Answers'];
        $isMultipleChoice = $questions[$currentQuestionIndex]['isMultipleChoice'];

        for ($i = 0; $i < count($answers); $i++) {
            echo  '<div class="form-check">';
            $IsCorrect = $answers[$i]['IsCorrectAnswer'];

            if ($isMultipleChoice == 1) {
                        //multiple choice(checkbox)
                echo '<input class="form-check-input" type="checkbox" name="a-' . $i . '"  value="'. $IsCorrect . '"id="i-' . $i . '">';
            }
            else {
                //single choice (radio) 
                echo '<input class="form-check-input" type="radio" name="a-0" value="'. $IsCorrect . '"id="i-' . $i . '">';
            }

            echo '<label class="form-check-label" for="i-' . $i . '">';
            echo $answers[$i]['Text'];
            echo '</label>';
            echo '</div>';
        }
        ?>
        <br>
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md">
            
            <input type="hidden" name="lastQuestionIndex" value="<?php echo $currentQuestionIndex; ?>">
            <input type="hidden" name="nextQuestionIndex" value="<?php echo $currentQuestionIndex + 1; ?>">
            <input type="hidden" name="maxPoints" value="<?php echo $maxPoints; ?>">

            <p id = "validation-warning"></p>
            <input type="submit" value="Continue">
        
        </div>
    </form>
</div>

</body>
</html>