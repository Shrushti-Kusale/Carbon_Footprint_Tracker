<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Tracker</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box; }

body{
    font-family:'Inter','Segoe UI',system-ui,-apple-system,sans-serif;
    scroll-behavior:smooth;
    color:#1a1a1a;
    line-height:1.6; }

header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 70px;
    background:linear-gradient(135deg,rgba(34,139,34,0.95),rgba(46,125,50,0.95));
    color:#fff;
    position:fixed;
    top:0;
    width:100%;
    height:110px;
    z-index:1000;
    backdrop-filter:blur(10px);
    box-shadow:0 4px 30px rgba(34,139,34,0.3);
    transition:height 0.3s ease; }

.logo-container{
    display:flex;
    align-items:center;
    gap:18px; }

/* Circular Logo */
.logo-container img{
    height:75px;
    width:75px;
    object-fit:contain;
    border-radius:50%;
    background:#ffffff;
    padding:5px;
    border:2px solid #fff;
    transition:transform 0.3s ease; }

.logo-container img:hover{
    transform:scale(1.08); }

.logo-text{
    font-size:1.6rem;
    font-weight:700; }

nav ul{
    list-style:none;
    display:flex;
    gap:45px; }

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

/* ---------- Hero ---------- */
#home{
    height:100vh;
    background:url('1bg.jpeg') center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    position:relative; }

#home::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.25); }

.overlay-box{
    position:relative;
    z-index:2;
    background:rgba(56,142,60,0.55);
    padding:60px 70px;
    border-radius:24px;
    box-shadow:0 20px 60px rgba(27,94,32,0.4);
    max-width:800px; }

.overlay-box h1{
    font-size:3.5rem;
    color:#fff;
    margin-bottom:20px; }

.overlay-box p{
    font-size:1.3rem;
    margin-bottom:40px;
    color:#f0fdf4; }

.cta-button{
    background:linear-gradient(135deg,#10b981,#0ea5e9);
    color:#fff;
    border:none;
    padding:18px 45px;
    font-size:1.15rem;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
    text-decoration:none;
    transition:0.3s; }

.cta-button:hover{
    transform:translateY(-3px); }

#about{
    min-height:100vh;
    background:#f0fdf4;
    padding:140px 40px;
    text-align:center; }

.team-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:40px;
    max-width:1200px;
    margin:auto; }

.team-member{
    background:#fff;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(5,150,105,0.15);
    padding:30px;
    transition:0.3s;}

.team-member:hover{
    transform:translateY(-10px); }

.team-member img{
    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:15px; }

#contact{
    min-height:100vh;
    padding:140px 40px;
    text-align:center;
    background:#e6fffa; }

.contact-form{
    max-width:650px;
    margin:auto;
    background:#a7f3d0;
    padding:50px;
    border-radius:20px; }

.contact-form input,
.contact-form textarea{
    width:100%;
    padding:14px;
    border-radius:10px;
    border:1px solid #ccc;
    margin-bottom:15px; }

.submit-button{
    background:#10b981;
    color:#fff;
    border:none;
    padding:16px;
    border-radius:10px;
    width:100%;
    cursor:pointer; }

footer{
    text-align:center;
    padding:40px;
    background:#047857;
    color:#fff; }

/* Responsive */
@media(max-width:1024px){
    .team-grid{grid-template-columns:repeat(2,1fr);} }

@media(max-width:768px){
    header{padding:0 20px;}
    .team-grid{grid-template-columns:1fr;} }
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
<li><a href="#home" class="active">Home</a></li>
<li><a href="#about">About Us</a></li>
<li><a href="#contact">Contact Us</a></li>
</ul>
</nav>
</header>

<section id="home">
<div class="overlay-box">
<h1>EcoTrace</h1>
<p>What you can see, You can still change!</p>
<a href="login.php" class="cta-button">Get Started Today</a>
</div>
</section>

<section id="about">
<h2>Meet Our Team</h2>
<div class="team-grid">

<div class="team-member">
<img src="member1.jpg"><h3>Rupali Mane</h3>
<p>Passionate developer focused on building solutions.</p>
</div>

<div class="team-member">
<img src="member2.jpg"><h3>Shrushti Kusale</h3>
<p>Aspiring developer passionate about innovation.</p>
</div>

<div class="team-member">
<img src="member3.jpg"><h3>Harshad More</h3>
<p>Developer committed to efficient solutions.</p>
</div>

<div class="team-member">
<img src="member4.jpg"><h3>Gauravi Dusar</h3>
<p>Driven developer delivering impactful solutions.</p>
</div>

</div>
</section>

<section id="contact">
<h2>Contact Us</h2>

<form action="submit_contact.php" method="POST" class="contact-form">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="text" name="city" placeholder="City">
<input type="tel" name="phone" placeholder="Phone">
<textarea name="other" rows="4" placeholder="Message"></textarea>
<button class="submit-button">Send Message</button>
</form>
</section>

<footer>
<p>© 2024 Carbon Footprint Tracker. All rights reserved.</p>
</footer>

<!-- Header resize -->
<script>
window.addEventListener("scroll",function(){
const header=document.querySelector("header");
header.style.height=window.scrollY>50?"85px":"110px";
});
</script>

</body>
</html>
