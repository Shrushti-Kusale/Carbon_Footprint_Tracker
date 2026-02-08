<?php include "header.php"; ?>

<div class="card">
<h2>Your Carbon Footprint Result</h2>

<?php
$result=$_SESSION['last_result'];

echo "<h3>$result kg CO₂ per day</h3>";

if($result<10){
    echo "<p style='color:green'>Excellent! You are eco-friendly 🌱</p>";
    $tip="Keep using public transport and saving electricity."; }
elseif($result<20){
    echo "<p style='color:orange'>Average footprint ⚠</p>";
    $tip="Try reducing AC usage or using shared transport."; }
else{
    echo "<p style='color:red'>High footprint 🚨</p>";
    $tip="Reduce vehicle use and electricity consumption."; }

echo "<h4>Suggestion</h4>";
echo "<p>$tip</p>";
?>

<a href="dashboard.php">
<button>Go to Dashboard</button>
</a>

</div>

<?php include "footer.php"; ?>
