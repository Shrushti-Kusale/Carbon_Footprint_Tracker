<?php include "header.php"; ?>

<div class="card">
<h2>Average Comparison</h2>

<?php
$id=$_SESSION['user']['id'];
$r=$conn->query("SELECT AVG(footprint) avgf FROM history WHERE user_id=$id");
$row=$r->fetch_assoc();

$userAvg=round($row['avgf'],2);
$globalAvg=20;

echo "Your Average: ".$userAvg." kg CO2<br>";
echo "World Average: ".$globalAvg." kg CO2<br>";

echo ($userAvg<$globalAvg)
? "Great! Below average."
: "Above average. Try reducing emissions.";
?>
</div>

<?php include "footer.php"; ?>
