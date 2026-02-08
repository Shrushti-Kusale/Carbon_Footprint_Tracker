<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Calculator - Ocean Theme</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;}

body{
font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
background:url("CalculatorDashboard.jpeg") center/cover no-repeat fixed;
min-height:100vh;
padding:20px;
color:#333;
overflow-x:hidden; }

body::before{
content:"";
position:fixed;
inset:0;
background:rgba(0,0,0,0.25);
z-index:-1; }

/* Landing */
.landing-page{
display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
min-height:100vh;
animation:fadeIn 0.8s ease-out; }

@keyframes fadeIn{
from{opacity:0;}
to{opacity:1;} }

.hero-section{
text-align:center;
margin-bottom:60px;
animation:slideDown 0.8s ease-out; }

@keyframes slideDown{
from{opacity:0;transform:translateY(-30px);}
to{opacity:1;transform:translateY(0);} }

.hero-section h1{
font-size:56px;
color:white;
margin-bottom:20px;
text-shadow:3px 3px 6px rgba(0,0,0,0.3);
font-weight:700;
line-height:1.2; }

.hero-section .subtitle{
font-size:22px;
color:rgba(255,255,255,0.95);
margin-bottom:10px;
font-weight:300; }

.hero-section .description{
font-size:18px;
color:rgba(255,255,255,0.85);
max-width:600px;
margin:0 auto;
line-height:1.6; }

.choice-container{
display:flex;
gap:40px;
flex-wrap:wrap;
justify-content:center;
max-width:1000px;
animation:slideUp 0.8s ease-out 0.2s both; }

@keyframes slideUp{
from{opacity:0;transform:translateY(30px);}
to{opacity:1;transform:translateY(0);} }

.choice-card{
background:white;
border-radius:24px;
padding:50px 40px;
width:380px;
cursor:pointer;
transition:all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);
box-shadow:0 10px 40px rgba(0,0,0,0.2);
position:relative;
overflow:hidden; }

.choice-card::before{
content:'';
position:absolute;
top:0;
left:0;
right:0;
height:8px;
background:linear-gradient(90deg,#0093E9,#00D4FF);
transform:scaleX(0);
transition:transform 0.4s ease; }

.choice-card:hover::before{transform:scaleX(1);}

.choice-card:hover{
transform:translateY(-15px) scale(1.03);
box-shadow:0 20px 60px rgba(0,147,233,0.4); }

.choice-card:active{transform:translateY(-10px) scale(1.01);}

.icon-wrapper{
width:120px;
height:120px;
margin:0 auto 30px;
background:linear-gradient(135deg,#E3F2FD,#BBDEFB);
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
font-size:60px;
transition:all 0.4s ease; }

.choice-card:hover .icon-wrapper{
transform:rotate(10deg) scale(1.1);
background:linear-gradient(135deg,#42A5F5,#0093E9); }

.choice-card h3{
font-size:28px;
color:#01579B;
margin-bottom:15px;
font-weight:600; }

.choice-card p{
font-size:16px;
color:#666;
line-height:1.7;
margin-bottom:25px; }

.choice-card .features{
list-style:none;
text-align:left;
margin-bottom:30px; }

.choice-card .features li{
padding:10px 0;
color:#555;
font-size:15px;
display:flex;
align-items:center;
gap:10px; }

.choice-card .features li::before{
content:'✓';
color:#0093E9;
font-weight:bold;
font-size:18px;
flex-shrink:0; }

.choice-btn{
background:linear-gradient(135deg,#0093E9,#0277BD);
color:white;
border:none;
padding:16px 40px;
border-radius:50px;
font-size:16px;
font-weight:600;
cursor:pointer;
transition:all 0.3s ease;
box-shadow:0 4px 15px rgba(0,147,233,0.3);
text-transform:uppercase;
letter-spacing:1px;
width:100%; }

.choice-btn:hover{
box-shadow:0 6px 25px rgba(0,147,233,0.5);
transform:translateY(-2px); }

/* Calculator */
.calculator-section{
display:none;
animation:fadeInScale 0.6s ease-out;
max-width:800px;
margin:0 auto; }

@keyframes fadeInScale{
from{opacity:0;transform:scale(0.95);}
to{opacity:1;transform:scale(1);} }

.calculator-section.active{display:block;}

.back-button{
background:rgba(255,255,255,0.2);
color:white;
border:2px solid white;
padding:12px 30px;
border-radius:50px;
font-size:16px;
cursor:pointer;
margin-bottom:30px;
transition:all 0.3s ease;
backdrop-filter:blur(10px);
display:inline-flex;
align-items:center;
gap:10px; }

.back-button:hover{
background:rgba(255,255,255,0.3);
transform:translateX(-5px); }

.card{
background:white;
border-radius:20px;
box-shadow:0 20px 60px rgba(0,0,0,0.3);
overflow:hidden; }

.card h2{
background:linear-gradient(135deg,#0093E9 0%,#0277BD 100%);
color:white;
padding:30px;
text-align:center;
font-size:32px;
font-weight:600;
letter-spacing:1px;
text-shadow:2px 2px 4px rgba(0,0,0,0.2); }

form{padding:40px;}

h3{
color:#0093E9;
font-size:26px;
margin-bottom:30px;
text-align:center;
position:relative;
padding-bottom:15px; }

h3::after{
content:'';
position:absolute;
bottom:0;
left:50%;
transform:translateX(-50%);
width:80px;
height:4px;
background:linear-gradient(90deg,#0093E9,#42A5F5);
border-radius:2px; }

/* Scroll */
::selection{background:#42A5F5;color:white;}
::-webkit-scrollbar{width:10px;}
::-webkit-scrollbar-track{background:#f1f1f1;}
::-webkit-scrollbar-thumb{
background:linear-gradient(135deg,#0093E9,#42A5F5);
border-radius:5px; }
</style>
</head>

<body>
<!-- Content unchanged -->
<!-- (All HTML body content remains exactly as you provided) -->

<script>
function showCalculator(type){
document.getElementById('landingPage').style.display='none';
if(type==='individual')
document.getElementById('individualCalculator').classList.add('active');
else
document.getElementById('householdCalculator').classList.add('active');
window.scrollTo({top:0,behavior:'smooth'}); }

function showLanding(){
document.getElementById('individualCalculator').classList.remove('active');
document.getElementById('householdCalculator').classList.remove('active');
document.getElementById('landingPage').style.display='flex';
window.scrollTo({top:0,behavior:'smooth'}); }

window.onload=function(){
const params=new URLSearchParams(window.location.search);
const type=params.get("type");
if(type==="individual"||type==="household")
showCalculator(type); };
</script>

</body>
</html>
