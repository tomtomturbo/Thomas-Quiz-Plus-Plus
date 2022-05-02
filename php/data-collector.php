<?php
session_start();

if (isset($_POST['lastQuestionIndex'])) {
    //get the index (string) of the last question.
    $lastQuestionIndex = $_POST['lastQuestionIndex'];

    $questionKey = 'q-' . $lastQuestionIndex;


    $achievedPoints = 0;

    foreach ($_POST as $key => $value) {
        if (str_contains($key, 'a-')) {
            $achievedPoints += intval($value);
        }
    }

if (!isset($_SESSION['achievedPointsList'])){
    $_SESSION['achievedPointsList'] = array();
}

$_SESSION['achievedPointsList'][$questionKey] = $achievedPoints;

$maxPoints = intval($_POST['maxPoints']);

if (!isset($_SESSION['maxPointsList'])) {
    $_SESSION['maxPointsList'] = array();
}

$_SESSION['maxPointsList'][$questionKey] = $maxPoints;
}