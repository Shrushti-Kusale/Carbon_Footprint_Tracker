<?php include "db.php"; ?>
<link rel="stylesheet" href="style.css">

<style>
/* ===== Sidebar ===== */
.sidebar{
position:fixed;
left:0;
top:0;
height:100%;
width:240px;
background:linear-gradient(180deg,#7bcf9b,#4caf7d);
padding-top:20px;
box-shadow:4px 0 20px rgba(0,0,0,0.12); }

.sidebar h3{
color:#fff;
text-align:center;
margin-bottom:30px;
font-size:24px;
letter-spacing:1px; }

.sidebar a{
display:block;
color:#fff;
padding:14px 24px;
text-decoration:none;
font-size:15px;
transition:.3s;
border-left:4px solid transparent; }

.sidebar a:hover{
background:rgba(255,255,255,0.25);
border-left:4px solid #fff;
padding-left:28px; }

.sidebar a:last-child{
margin-top:30px;
background:rgba(255,0,0,0.15); }

.sidebar a:last-child:hover{
background:rgba(255,0,0,0.35); }

/* ===== Main ===== */
.main{
margin-left:240px;
padding:20px 30px;
min-height:100vh; }

/* ===== Mobile ===== */
@media(max-width:768px){
.sidebar{width:200px;}
.main{margin-left:200px;} }
</style>

<div class="sidebar">
<h3>🌿 EcoTrace</h3>

<a href="home.php">🏠 Home</a>
<a href="calculator_start.php">🧮 Calculator</a>
<a href="dashboard.php">📊 Dashboard</a>
<a href="map.php">🗺 Emission Map</a>
<a href="compare.php">📈 Insights</a>
<a href="contact.php">💬 Feedback</a>
<a href="logout.php">🚪 Logout</a>
</div>

<div class="main">
