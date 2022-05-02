<?php

function getQuestions() {
$dbHost = getenv('DB_HOST');
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');

$dbh = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);


$query = $dbh->query("SELECT * FROM Questions");

$questions = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($questions); $i++) {
    $question = $questions[$i];
    $subQuery = $dbh->prepare("SELECT * from Answers where Answers.questionID = ?");
    $subQuery->bindValue(1, $question['ID']);
    $subQuery->execute();
    $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);

    $questions[$i]['Answers'] = $answers;
}

return $questions;
}