<?php 
    session_start();
    session_destroy();

    include 'php/header.php';
    ?>
<br>
<br>
<br>
<div class="container">
<h3> QUIZZY</h3>

<br>
<br>
<br>

<form action = "question.php" method="post">
    <input type="submit" class="btn btn-outline-success pl-5 btn-sm " value="Start"></button>
    <p class = "warning"></p>
</form>
</div>