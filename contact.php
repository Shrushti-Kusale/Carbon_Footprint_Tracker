<?php include "header.php"; ?>

<style>
body{
background:url("CalculatorDashboard.jpeg") center/cover no-repeat fixed; }

body::before{
content:"";
position:fixed;
inset:0;
background:rgba(0,0,0,0.25);
z-index:-1; }

.card{
background:rgba(255,255,255,0.95);
max-width:800px;
margin:40px auto;
padding:30px;
border-radius:18px;
box-shadow:0 12px 30px rgba(0,0,0,0.2); }

.card h2{
text-align:center;
color:#1f6fe5;
margin-bottom:10px; }

.quote{
text-align:center;
font-style:italic;
color:#555;
margin-bottom:25px; }

.rating{
direction:rtl;
display:inline-flex;
font-size:32px; }

.rating span{
cursor:pointer;
color:#ccc; }

.rating span:hover,
.rating span:hover ~ span,
.rating span.active,
.rating span.active ~ span{
color:#f5b301; }

textarea{
width:100%;
height:100px;
margin-top:12px;
padding:12px;
border-radius:10px;
border:1px solid #ddd; }

button[name="send"]{
margin-top:15px;
padding:12px 18px;
background:#1f6fe5;
color:white;
border:none;
border-radius:10px;
cursor:pointer;
width:100%; }

.social-section{
margin-top:30px;
text-align:center; }

.social-section h3{
margin-bottom:15px;
color:#1f6fe5; }

.social-links a{
display:inline-block;
margin:8px;
padding:10px 16px;
background:white;
border-radius:20px;
text-decoration:none;
color:#1f6fe5;
border:1px solid #1f6fe5;
transition:0.3s; }

.social-links a:hover{
background:#1f6fe5;
color:white; }
</style>

<div class="card">
<h2>We value your feedback</h2>

<p class="quote">
“Our planet's alarm is going off, and it is time to wake up and take action!”
</p>

<form method="post">

<label><strong>Rate us:</strong></label><br>

<div class="rating" id="starRating">
<span data-value="5">★</span>
<span data-value="4">★</span>
<span data-value="3">★</span>
<span data-value="2">★</span>
<span data-value="1">★</span>
</div>

<input type="hidden" name="rating" id="ratingValue" required>

<textarea name="msg" placeholder="Share feedback (optional)"></textarea>

<button name="send">Submit Feedback</button>
</form>

<?php
if(isset($_POST['send'])){
$rating=$_POST['rating'];
$msg=$_POST['msg'] ?? '';

$conn->query("INSERT INTO feedback (rating, message) VALUES ('$rating', '$msg')");
echo "<p style='margin-top:15px;color:green;'>Thank you for your feedback!</p>"; }
?>

<div class="social-section">
<h3>Connect with us</h3>
<div class="social-links">
<a href="https://facebook.com" target="_blank">📘 Facebook</a>
<a href="https://instagram.com" target="_blank">📸 Instagram</a>
<a href="https://twitter.com" target="_blank">🐦 Twitter / X</a>
<a href="https://linkedin.com" target="_blank">💼 LinkedIn</a>
</div>
</div>
</div>

<script>
const stars=document.querySelectorAll('#starRating span');
const ratingInput=document.getElementById('ratingValue');

stars.forEach(star=>{
star.addEventListener('click',function(){
stars.forEach(s=>s.classList.remove('active'));
this.classList.add('active');
ratingInput.value=this.getAttribute('data-value'); }); });
</script>

<?php include "footer.php"; ?>
