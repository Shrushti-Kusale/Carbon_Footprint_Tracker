<?php include "header.php"; ?>

<!-- ================= HEADER ================= -->
<div class="card">
<h2>🌍 Carbon Footprint Dashboard</h2>
<p>Track and improve your carbon impact.</p>
</div>

<?php
$id = $_SESSION['user']['id'];

$query = "SELECT * FROM history WHERE user_id=$id";

if(!empty($_GET['date'])){
    $date = $_GET['date'];
    $query .= " AND DATE(created_at)='$date'";
}

if(!empty($_GET['type'])){
    $type = $_GET['type'];
    $query .= " AND calc_type='$type'";
}

$query .= " ORDER BY created_at ASC";

$r = $conn->query($query);

$dates = [];
$values = [];

$total = 0;
$count = 0;
$best = null;
$latest = null;

while($row = $r->fetch_assoc()){
    $dates[] = date("d M", strtotime($row['created_at']));
    $values[] = $row['footprint'];

    $total += $row['footprint'];
    $count++;

    if($best === null || $row['footprint'] < $best)
        $best = $row['footprint'];

    $latest = $row['footprint'];
}

$average = $count ? round($total/$count,2) : 0;

/* Eco Badge */
if($average < 10){
    $badge = "🌱 Green Citizen";
}
elseif($average < 20){
    $badge = "🌍 Eco Learner";
}
else{
    $badge = "⚠ High Impact";
}
?>

<!-- ================= SUMMARY ================= -->
<div class="card">
<h3>📊 Quick Summary</h3>

<p><b>Latest:</b> <?= $latest ?> kg CO₂/day</p>
<p><b>Average:</b> <?= $average ?> kg CO₂/day</p>
<p><b>Best Day:</b> <?= $best ?> kg CO₂/day</p>
<p><b>Eco Badge:</b> <?= $badge ?></p>

</div>

<!-- ================= MONTHLY ================= -->
<?php
$monthQuery = "
SELECT 
    MONTH(created_at) m,
    YEAR(created_at) y,
    AVG(footprint) avg_fp,
    COUNT(*) entries
FROM history
WHERE user_id=$id
GROUP BY y,m
ORDER BY y DESC, m DESC
LIMIT 1";

$monthResult = $conn->query($monthQuery)->fetch_assoc();

if($monthResult){
?>

<div class="card">
<h3>📅 Monthly Insight</h3>

<p><b>Monthly Average:</b>
<?= round($monthResult['avg_fp'],2) ?> kg CO₂/day</p>

<p><b>Entries:</b>
<?= $monthResult['entries'] ?></p>

<?php
if($monthResult['avg_fp'] < 10){
    echo "<p style='color:green'>🌱 Excellent performance.</p>";
}
elseif($monthResult['avg_fp'] < 20){
    echo "<p style='color:orange'>⚠ Moderate emissions.</p>";
}
else{
    echo "<p style='color:red'>🚨 High emissions.</p>";
}
?>

</div>

<?php } ?>

<!-- ================= FILTER ================= -->
<div class="card">
<h3 style="cursor:pointer;" onclick="toggleFilter()">
🔍 Filters (Show/Hide)
</h3>

<div id="filterPanel" style="display:none">

<form method="get">

Date:
<input type="date" name="date">

Type:
<select name="type">
<option value="">All</option>
<option value="individual">Individual</option>
<option value="household">Household</option>
</select>

<button type="submit">Apply</button>

</form>

</div>
</div>

<!-- ================= HISTORY ================= -->
<div class="card">
<h3>🗂 History Records</h3>

<?php
$r = $conn->query($query);

if($r->num_rows == 0){
    echo "<p>No records found.</p>";
}

while($row = $r->fetch_assoc()){
    echo "<div style='background:#fff;padding:10px;margin:10px 0;border-radius:6px'>
            📅 ".$row['created_at']."<br>
            📌 ".ucfirst($row['calc_type'])."<br>
            🌍 ".$row['footprint']." kg CO₂
          </div>";
}
?>
</div>

<!-- ================= CHART ================= -->
<div class="card">
<h3>📈 Carbon Trend</h3>
<canvas id="carbonChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = <?= json_encode($dates) ?>;
const dataValues = <?= json_encode($values) ?>;

new Chart(document.getElementById('carbonChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Carbon Footprint',
            data: dataValues,
            borderWidth: 2,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true } }
    }
});

function toggleFilter(){
    let panel = document.getElementById("filterPanel");
    panel.style.display =
        panel.style.display === "none" ? "block" : "none";
}
</script>

<?php include "footer.php"; ?>