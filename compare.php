<?php include "header.php"; ?>

<style>
.card{
background:#fff;
padding:20px;
margin:15px 0;
border-radius:14px;
transition:all 0.3s ease;
box-shadow:0 4px 10px rgba(0,0,0,0.08); }

.card:hover{
transform:translateY(-8px) scale(1.02);
box-shadow:0 20px 40px rgba(0,0,0,0.15); }

.card h2{transition:color 0.3s;}

.card:hover h2{color:#4CAF50;}

.progress-wrap{
background:#eee;
width:100%;
border-radius:10px;
overflow:hidden;
margin-top:10px; }

.progress-bar{
background:#4CAF50;
padding:8px;
color:white;
border-radius:10px;
transition:width 1s ease-in-out; }

.card li{
margin:6px 0;
transition:0.2s; }

.card li:hover{
transform:translateX(6px);
color:#4CAF50; }
</style>

<?php
$id=$_SESSION['user']['id'];

$r=$conn->query("SELECT AVG(footprint) AS avgf FROM history WHERE user_id=$id");
$row=$r->fetch_assoc();

$userAvg=round($row['avgf'] ?? 0,2);
$globalAvg=20;
$communityAvg=18;

$percent=($globalAvg>0)
?min(($userAvg/$globalAvg)*100,100)
:0;
?>

<div class="card">
<h2>🌍 Average Comparison</h2>

<?php
echo "<p>Your Average: <b>$userAvg kg CO2</b></p>";
echo "<p>World Average: <b>$globalAvg kg CO2</b></p>";

echo "
<div class='progress-wrap'>
<div class='progress-bar' style='width:$percent%'>
".round($percent)."% of world average
</div>
</div>";

if($userAvg<$globalAvg)
echo "<p style='color:green'>🎉 Great! You're below average!</p>";
else
echo "<p style='color:red'>⚠ Above average. Let’s improve!</p>";
?>
</div>

<div class="card">
<h2>👥 Community Comparison</h2>

<?php
echo "<p>Community Average: <b>$communityAvg kg CO2</b></p>";

if($userAvg<$communityAvg)
echo "<p style='color:green'>You are greener than most users! 🌱</p>";
else
echo "<p style='color:red'>Try to beat the community average!</p>";
?>
</div>

<div class="card">
<h2>📊 Personal Improvement</h2>

<?php
$r=$conn->query("
SELECT
AVG(CASE
WHEN created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
THEN footprint END) recent,
AVG(CASE
WHEN created_at < DATE_SUB(NOW(), INTERVAL 30 DAY)
THEN footprint END) old
FROM history
WHERE user_id=$id
");

$data=$r->fetch_assoc();

$recent=round($data['recent'] ?? 0,2);
$old=round($data['old'] ?? 0,2);

if($old>0){
$change=round((($old-$recent)/$old)*100,1);

echo "<p>Previous Average: <b>$old kg CO₂</b></p>";
echo "<p>Recent Average: <b>$recent kg CO₂</b></p>";

if($change>0)
echo "<p style='color:green'>🎉 Emissions reduced by $change%</p>";
else
echo "<p style='color:red'>Emissions increased. Try improving habits.</p>"; }
else{
echo "<p>Not enough history to calculate improvement.</p>"; }
?>
</div>

<div class="card">
<h2>📉 Reduction Suggestions</h2>

<ul>
<?php
if($userAvg>25){
echo "<li>Reduce car travel.</li>";
echo "<li>Use public transport.</li>";
echo "<li>Reduce AC usage.</li>"; }
else{
echo "<li>Maintain your eco habits.</li>"; }

echo "<li>Turn off unused appliances.</li>";
echo "<li>Walk or cycle short distances.</li>";
echo "<li>Switch to LED lighting.</li>";
echo "<li>Reduce food waste.</li>";
?>
</ul>
</div>

<div class="card">
<h2>🌳 Carbon Offset Ideas</h2>

<?php
$treesNeeded=ceil($userAvg/20);

echo "<p>Planting <b>$treesNeeded trees</b> yearly can offset your footprint.</p>";
echo "<p>Support renewable energy or tree projects.</p>";
?>
</div>

<div class="card">
<h2>🎯 Today's Eco Challenge</h2>

<?php
$challenges=[
"Use public transport today.",
"Avoid plastic bottles.",
"Switch off lights for 1 hour.",
"Eat one plant-based meal.",
"Walk instead of driving.",
"Carry reusable bags.",
"Reduce AC usage today."
];

$challenge=$challenges[array_rand($challenges)];
echo "<p><b>$challenge</b></p>";
?>
</div>

<div class="card">
<h2>🔮 Future Prediction</h2>

<?php
$nextMonth=round($userAvg*1.05,2);

echo "<p>If habits stay the same, next month's average may be:</p>";
echo "<h3>$nextMonth kg CO2</h3>";
echo "<p>Reduce now to beat this prediction!</p>";
?>
</div>

<?php include "footer.php"; ?>
