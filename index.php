<?php 
    session_start();
    session_destroy();

    include 'php/header.php';
    ?>

<h3> QUIZZY</h3>

<form action = "question.php" method="post">
    <button type="submit" class="btn btn-outline-success btn-sm" value="Start"></button>
    <p class = "warning"></p>
</form>