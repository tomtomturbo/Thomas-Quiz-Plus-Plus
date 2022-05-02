<?php
include "php/data-collector.php";
include "php/header.php";

if (isset($_SESSION['achievedPointsList'])) {
    $achievedPointsList = $_SESSION['achievedPointsList'];
}
else {

    $achievedPointsList = array();
}

if (isset($_SESSION['maxPointsList'])){
    $maxPointsList = $_SESSION['maxPointsList'];
}
else {
    $maxPointsList = $array();
}

$total = 0;

foreach ($achievedPointsList as $key => $value){
    $total += $value;
}
$maxTotal = 0;

foreach ($maxPointsList as $key => $value) {

    $maxTotal += $value;
}

if ($total / $maxTotal >= 0.8) {
    $exclamation = "Fantastisch";
}
else if ($total / $maxTotal >= 0.4) {
    $exclamation = "Gut";
}
else {
    $exclamation = "Autsch";
}
?>

<h3><?php echo $exclamation; ?>, you got <?php echo $total; ?> of <?php echo $maxTotal; ?> points!</h3>
<form action = "index.php" method="post"><input type="submit" value="Nochmals">
<p class="warning"></p>
</form>