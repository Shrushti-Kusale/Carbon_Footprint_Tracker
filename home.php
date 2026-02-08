<?php include "header.php"; ?>
<?php
if(session_status()==PHP_SESSION_NONE)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Tracker</title>
<link rel="stylesheet" href="assets/css/style.css">

<style>
body {
    margin: 0;
    padding-top: 110px; /* Add space for fixed header */
    font-family: Times New Roman, sans-serif;
    scroll-behavior: smooth;
}   

header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 70px;
    background: linear-gradient(135deg,rgba(34,139,34,0.95),rgba(46,125,50,0.95));
    color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: calc(100% - 140px); /* Account for padding */
    min-height: 70px;
    z-index: 9999;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 30px rgba(34,139,34,0.3);}

html {
  scroll-padding-top: 120px;
}

.logo-container {
    display: flex;
    align-items: center;
    gap: 18px;
    flex-shrink: 0; /* Prevents logo from shrinking */
}

.logo-container img {
    height: 60px;
    width: 60px;
    object-fit: contain;
    border-radius: 50%;
    background: #ffffff;
    padding: 5px;
    border: 2px solid #fff;
    transition: transform 0.3s ease;
}

.logo-container img:hover{
    transform:scale(1.08); }

.logo-text{
    font-size:1.6rem;
    font-weight:700; }

nav {
    display: flex;
    align-items: center;
}

nav ul{
    list-style:none;
    display:flex;
    gap:45px;
    margin: 0;
    padding: 0; }

nav ul li a{
    color:#fff;
    text-decoration:none;
    font-weight:500;
    font-size:1.1rem;
    padding:8px 0;
    position:relative; }

nav ul li a::after{
    content:'';
    position:absolute;
    bottom:0;
    left:0;
    width:0;
    height:2px;
    background:#a7f3d0;
    transition:width 0.3s; }

nav ul li a:hover::after,
nav ul li a.active::after{
    width:100%; }

nav ul li a:hover{
    color:#a7f3d0; }

.page-container{width:100%;margin:0 auto;padding:0;position: relative;}

section{
position:relative;
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
overflow:hidden;
padding:40px 20px;
box-sizing:border-box; }

section .section-bg{
position:absolute;
top:0;left:0;
width:100%;height:100%;
object-fit:cover;
z-index:0; }

section .section-inner{
position:relative;
z-index:2;
background:rgba(255,255,255,.7);
padding:40px;
border-radius:15px;
box-shadow:0 6px 20px rgba(0,0,0,.1);
width:90%;
max-width:900px;
text-align:center; }

section .section-inner h2{
font-size:2.5em;
color:#2e7d32;
margin-bottom:20px; }

section .section-inner p{
font-size:1.2em;
color:#090909;
text-shadow:1px 1px 3px rgba(0,0,0,.5);
line-height:1.6; }

#result .section-inner{text-align:left;}

.highlight{font-weight:bold;color:#100cea;}

.action-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:15px;margin-top:25px; }

.action-box{
background:#dff5ff;
padding:20px;
border-radius:10px;
cursor:pointer;
transition:.2s; }

.action-box:hover{
transform:translateY(-5px);
box-shadow:0 6px 15px rgba(0,0,0,.1); }

.action-box span{
font-size:32px;
display:block; }

.action-box h4{margin:10px 0 5px;}

@media(max-width:768px){
section{padding:20px 10px;}
section .section-inner{padding:30px 20px;width:95%;}
section .section-inner h2{font-size:1.8em;}
section .section-inner p{font-size:1em;} }

#welcome {
  background: url('Welcome.jpeg') no-repeat center center/cover;
  position: relative;
}

#about {
  background: url('About.jpg') no-repeat center center/cover;
  position: relative;
}

#result {
  background: url('Result.jpg') no-repeat center center/cover;
  position: relative;
}
</style>
</head>

<body>
    <header>
<div class="logo-container">
    <img src="Logo.jpeg" alt="Carbon Tracker Logo">
    <span class="logo-text">Carbon Footprint Tracker : EcoTrace</span>
</div>

<nav>
  <ul>
    <li><a href="#welcome" class="active">Home</a></li>
    <li><a href="#about">About Us</a></li>
    <li><a href="#result">Result_Info</a></li>
  </ul>
</nav>

</header>
<div class="page-container">

<section id="welcome">
<div class="section-inner">
<h2>🌍 Carbon Footprint Tracker</h2>
<p>Welcome <span class="highlight"><?= $_SESSION['user']['name'] ?? 'Guest' ?></span> 👋</p>

<p>
Track, understand, and reduce your daily carbon footprint by answering
a few simple questions. Your small actions today create a sustainable
future for tomorrow.
</p>

<p style="font-style:italic;">
“Our planet's alarm is going off, and it is time to wake up and take action!”
</p>
</div>
</section>

<section id="about">
<div class="section-inner">
<h2>♻️ About Us</h2>

<p>
EcoTrack is a smart environmental awareness platform designed to help
individuals measure their daily carbon emissions caused by lifestyle
choices such as transportation, electricity usage, and consumption habits.
</p>

<p>
Our goal is not just to calculate emissions, but to provide
<span class="highlight">insights</span> that encourage eco-friendly behavior.
By visualizing your impact, we empower you to make informed and responsible decisions.
</p>

<p>
We believe that <span class="highlight">data + awareness = change</span>.
Even small daily improvements can significantly reduce global carbon emissions.
</p>

<div class="action-grid">
<div class="action-box">
<span>📝</span>
<h4>Start Today’s Check-in</h4>
<p>Log your daily activities in under 2 minutes.</p>
</div>

<div class="action-box">
<span>📊</span>
<h4>View Your Impact</h4>
<p>See how your lifestyle affects the planet.</p>
</div>

<div class="action-box">
<span>🌱</span>
<h4>Get Eco Tips</h4>
<p>Small changes that make a big difference.</p>
</div>
</div>

</div>
</section>

<section id="result">
<div class="section-inner">
<h2>📘 Understanding Your Carbon Footprint</h2>

<p>
Your carbon footprint shows how much CO₂ your daily lifestyle produces.
<span style="display:block;line-height:1;">
It’s measured in kilograms of carbon dioxide (kg CO₂), the main gas causing climate change.
</span>
</p>

<p><b>1 kg CO₂ roughly equals:</b></p>

<ol style="margin-left:20px;margin-bottom:15px;">
<li>Driving a petrol vehicle for 4–5 km</li>
<li>Running an air conditioner for 1 hour</li>
<li>Using household electricity for a few hours</li>
<li>Producing and transporting everyday food or products</li>
</ol>

<p><strong>Understanding your result:</strong></p>

<ul style="margin-left:20px;margin-bottom:15px;">
<li>⬆️ Lower kg CO₂ → smaller environmental impact</li>
<li>⬆️ Higher kg CO₂ → more pollution</li>
</ul>

<p>
Use your result to identify major emission sources and take small actions —
save electricity, reduce waste, or choose smarter travel.
Even minor lifestyle changes make a big difference over time.
</p>

</div>
</section>

</div>
</body>
</html>

<?php include "footer.php"; ?>
