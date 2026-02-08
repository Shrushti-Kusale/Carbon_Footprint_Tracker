<?php include "header.php"; ?>
<?php
$id=$_SESSION['user']['id'];
$query="SELECT * FROM history WHERE user_id=$id";

if(!empty($_GET['period'])){
    if($_GET['period']=="today")
        $query.=" AND DATE(created_at)=CURDATE()";
    if($_GET['period']=="week")
        $query.=" AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
    if($_GET['period']=="month")
        $query.=" AND created_at >= DATE_SUB(NOW(), INTERVAL 1 MONTH)"; }

if(!empty($_GET['from']))
    $query.=" AND DATE(created_at)>='{$_GET['from']}'";
if(!empty($_GET['to']))
    $query.=" AND DATE(created_at)<='{$_GET['to']}'";
if(!empty($_GET['type']))
    $query.=" AND calc_type='{$_GET['type']}'";

$summaryQuery=$query." ORDER BY created_at ASC";
$r=$conn->query($summaryQuery);

$dates=[];
$values=[];
$total=0;
$count=0;
$best=null;
$latest=null;

while($row=$r->fetch_assoc()){
    $dates[]=date("d M",strtotime($row['created_at']));
    $values[]=$row['footprint'];
    $total+=$row['footprint'];
    $count++;
    if($best===null || $row['footprint']<$best)
        $best=$row['footprint'];
    $latest=$row['footprint']; }

$average=$count?round($total/$count,2):0;

if($average<10)
    $badge="🌱 Green Citizen";
elseif($average<20)
    $badge="🌍 Eco Learner";
else
    $badge="⚠ High Impact";

$trendIcon="";
if($latest && $average){
    if($latest<$average)
        $trendIcon="⬇ Improving";
    elseif($latest>$average)
        $trendIcon="⬆ Increasing";
    else
        $trendIcon="➡ Stable"; }
?>

<div class="header-card">
<div class="header-left">
<h2>🌍 EcoTrace Dashboard</h2>
<p>Track and improve your carbon impact</p>
</div>
<button class="filter-btn" onclick="toggleFilter()">🔍 Filter</button>
</div>

<div class="card filter-panel" id="filterPanel" style="display:none">
<form method="get">
<div class="filter-grid">

<div>
<label>Period</label>
<select name="period">
<option value="">All Time</option>
<option value="today">Today</option>
<option value="week">Last 7 Days</option>
<option value="month">Last 30 Days</option>
</select>
</div>

<div>
<label>From</label>
<input type="date" name="from">
</div>

<div>
<label>To</label>
<input type="date" name="to">
</div>

<div>
<label>Type</label>
<select name="type">
<option value="">All</option>
<option value="individual">Individual</option>
<option value="household">Household</option>
</select>
</div>

</div>
<button class="apply-btn">Apply Filters</button>
</form>
</div>

<div class="stats-grid">
<div class="stat-card">
<h4>Latest</h4>
<h2 class="counter" data-value="<?= $latest ?>">0</h2>
<p>kg CO₂/day</p>
</div>

<div class="stat-card">
<h4>Average</h4>
<h2 class="counter" data-value="<?= $average ?>">0</h2>
<p>kg CO₂/day</p>
</div>

<div class="stat-card">
<h4>Best Day</h4>
<h2 class="counter" data-value="<?= $best ?>">0</h2>
<p>kg CO₂/day</p>
</div>

<div class="stat-card">
<h4>Total</h4>
<h2 class="counter" data-value="<?= $total ?>">0</h2>
<p>kg CO₂</p>
</div>
</div>

<div class="card">
<b>Eco Badge:</b> <?= $badge ?><br>
<b>Trend:</b> <?= $trendIcon ?>
</div>

<?php
$page=$_GET['page']??1;
$limit=10;
$offset=($page-1)*$limit;

$historyQuery=$query." ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$r=$conn->query($historyQuery);
?>

<div class="card">
<h3>History Records</h3>

<?php
if($r->num_rows==0)
    echo "<p>No records found.</p>";

while($row=$r->fetch_assoc()){
    echo "<div class='history-item'>
            📅 ".$row['created_at']."<br>
            📌 ".ucfirst($row['calc_type'])."<br>
            🌍 ".$row['footprint']." kg CO₂<br>
            <a href='delete.php?id=".$row['id']."'>🗑 Delete</a>
          </div>"; }
?>

<a href="?page=<?=$page+1?>">Next Page</a>
</div>

<div class="card">
<h3>Carbon Trend</h3>
<canvas id="carbonChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels=<?= json_encode($dates) ?>;
const dataValues=<?= json_encode($values) ?>;
const avg=<?= $average ?>;

new Chart(document.getElementById('carbonChart'),{
type:'line',
data:{
labels:labels,
datasets:[
{label:'Emission',data:dataValues,borderWidth:2,tension:0.3},
{label:'Average',data:labels.map(()=>avg),borderWidth:1,borderDash:[5,5]}
]},
options:{responsive:true} });

function toggleFilter(){
let panel=document.getElementById("filterPanel");
panel.style.display=panel.style.display==="none"?"block":"none"; }

document.querySelectorAll('.counter').forEach(counter=>{
const target=+counter.dataset.value||0;
let count=0;

const update=()=>{
count+=target/40;
if(count<target){
counter.innerText=count.toFixed(1);
requestAnimationFrame(update);
}else{
counter.innerText=target; }};
update(); });
</script>

<style>
body{
margin:0;
font-family:'Segoe UI', sans-serif;
background:url("CalculatorDashboard.jpeg") center/cover no-repeat fixed; }

.header-card{
max-width:1100px;
margin:20px auto;
padding:26px 32px;
border-radius:22px;
background:linear-gradient(135deg,#7bcf9b,#4caf7d);
color:white;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 10px 30px rgba(0,0,0,0.15); }

.header-left h2{margin:0;}
.header-left p{margin-top:6px;opacity:0.95;}

.filter-btn{
background:white;
color:#3da66f;
border:none;
padding:4px 10px;
border-radius:20px;
font-size:13px;
font-weight:600;
cursor:pointer;
width:auto;
min-width:auto; }

.card{
background:rgba(255,255,255,0.95);
padding:24px;
margin:24px auto;
border-radius:18px;
box-shadow:0 12px 30px rgba(0,0,0,0.15);
max-width:1100px; }

.filter-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:16px; }

.filter-panel input,
.filter-panel select{
width:100%;
padding:12px;
border-radius:10px;
border:1px solid #ddd; }

.apply-btn{
margin-top:18px;
padding:12px;
background:#4caf7d;
color:white;
border:none;
border-radius:10px; }

.stats-grid{
max-width:1100px;
margin:auto;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:18px; }

.stat-card{
background:white;
padding:22px;
border-radius:16px;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
text-align:center; }

.stat-card h2{color:#3da66f;}

.history-item{
background:#f8f9fa;
padding:14px;
border-radius:12px;
margin:12px 0;
border:1px solid #eee; }
</style>

<?php include "footer.php"; ?>
