<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Tracker</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;}

body{
font-family:'Inter','Segoe UI',system-ui,-apple-system,sans-serif;
scroll-behavior:smooth;
color:#1a1a1a;
line-height:1.6;
}

/* HEADER */
header{
display:flex;
justify-content:space-between;
align-items:center;
padding:0 50px;
background:linear-gradient(135deg,rgba(34,139,34,0.95),rgba(46,125,50,0.95));
color:#fff;
position:fixed;
top:0;
width:100%;
height:100px;
z-index:1000;
box-shadow:0 4px 20px rgba(34,139,34,0.3);
transition:height 0.3s ease;
}

.logo-container{
display:flex;
align-items:center;
gap:15px;
}

.logo-container img{
height:65px;
width:65px;
object-fit:contain;
border-radius:50%;
background:#fff;
padding:5px;
}

.logo-text{
font-size:1.5rem;
font-weight:700;
}

nav ul{
list-style:none;
display:flex;
gap:30px;
}

nav ul li a{
color:#fff;
text-decoration:none;
font-weight:500;
font-size:1rem;
position:relative;
}

nav ul li a::after{
content:'';
position:absolute;
bottom:-5px;
left:0;
width:0;
height:2px;
background:#a7f3d0;
transition:0.3s;
}

nav ul li a:hover::after,
nav ul li a.active::after{
width:100%;
}

/* HOME */
#home{
height:100vh;
background:url('1bg.jpeg') center/cover no-repeat;
display:flex;
justify-content:center;
align-items:center;
text-align:center;
position:relative;
}

#home::before{
content:'';
position:absolute;
inset:0;
background:rgba(0,0,0,0.25);
}

.overlay-box{
position:relative;
z-index:2;
background:rgba(56,142,60,0.6);
padding:50px;
border-radius:20px;
max-width:700px;
}

.overlay-box h1{
font-size:3rem;
color:#fff;
margin-bottom:15px;
}

.overlay-box p{
font-size:1.2rem;
margin-bottom:30px;
color:#f0fdf4;
}

.cta-button{
background:linear-gradient(135deg,#10b981,#0ea5e9);
color:#fff;
padding:14px 35px;
border-radius:10px;
text-decoration:none;
font-weight:600;
}

/* ABOUT */
#about{
background:#f0fdf4;
padding:130px 20px 80px;
text-align:center;
}

#about h2{
margin-bottom:50px;
font-size:2.3rem;
}

/* TEAM GRID */
.team-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:30px;
max-width:1100px;
margin:auto;
}

.team-member{
background:#fff;
border-radius:18px;
padding:20px;
transition:0.3s;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
}

.team-member:hover{
transform:translateY(-6px);
}

.team-member img{
width:100%;
height:220px;
object-fit:cover;
border-radius:14px;
}

.team-member h3{
margin-top:15px;
font-size:1.2rem;
}

.team-member p{
margin-top:8px;
font-size:0.95rem;
color:#555;
}

/* CONTACT */
#contact{
padding:130px 20px;
text-align:center;
background:#e6fffa;
}

#contact h2{
margin-bottom:40px;
font-size:2.3rem;
}

.contact-form{
max-width:600px;
margin:auto;
background:#a7f3d0;
padding:40px;
border-radius:18px;
}

.contact-form input,
.contact-form textarea{
width:100%;
padding:12px;
border-radius:8px;
border:1px solid #ccc;
margin-bottom:15px;
}

.submit-button{
background:#10b981;
color:#fff;
border:none;
padding:14px;
border-radius:8px;
width:100%;
cursor:pointer;
font-size:1rem;
}

/* FOOTER */
footer{
text-align:center;
padding:30px;
background:#047857;
color:#fff;
}

/* RESPONSIVE */
@media(max-width:768px){

header{
padding:0 20px;
}

.logo-text{
font-size:1.2rem;
}

.overlay-box h1{
font-size:2.2rem;
}

.overlay-box{
padding:35px;
}

}
</style>
</head>

<body>

<header>
<div class="logo-container">
<img src="Logo.jpeg">
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

<!-- HOME -->
<section id="home">
<div class="overlay-box">
<h1>EcoTrace</h1>
<p>What you can see, You can still change!</p>
<a href="login.php" class="cta-button">Get Started Today</a>
</div>
</section>

<!-- ABOUT -->
<section id="about">
<h2>Meet Our Team</h2>

<div class="team-grid">

<div class="team-member">
<img src="Member1.avif">
<h3>Rupali Mane</h3>
<p>Passionate developer focused on building solutions.</p>
</div>

<div class="team-member">
<img src="Member1.avif">
<h3>Shrushti Kusale</h3>
<p>Aspiring developer passionate about innovation.</p>
</div>

<div class="team-member">
<img src="Member3.jpg">
<h3>Harshad More</h3>
<p>Developer committed to efficient solutions.</p>
</div>

<div class="team-member">
<img src="Member1.avif">
<h3>Gauravi Dusar</h3>
<p>Driven developer delivering impactful solutions.</p>
</div>

</div>
</section>

<!-- CONTACT -->
<section id="contact">
<h2>Contact Us</h2>

<form class="contact-form">
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

<script>
window.addEventListener("scroll",()=>{
document.querySelector("header").style.height=
window.scrollY>50?"80px":"100px";
});
</script>

<script>
document.querySelector(".contact-form").addEventListener("submit", function(e){
e.preventDefault();

const form=this;

fetch("submit_contact.php",{
method:"POST",
body:new FormData(form)
})
.then(()=>{
const popup=document.createElement("div");
popup.innerHTML=`
<div style="position:fixed;inset:0;background:rgba(0,0,0,.5);
display:flex;align-items:center;justify-content:center;z-index:2000;">
<div style="background:#fff;padding:30px 40px;border-radius:15px;text-align:center;">
<h3 style="color:#047857;">Message Sent!</h3>
<p>Thank you for contacting us.</p>
<button id="closePopup"
style="margin-top:20px;padding:10px 20px;background:#10b981;
color:#fff;border:none;border-radius:8px;cursor:pointer;">OK</button>
</div></div>`;

document.body.appendChild(popup);

document.getElementById("closePopup").onclick=()=>{
popup.remove();
form.reset();
};
});
});
</script>

</body>
</html>
