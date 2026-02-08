<?php 
include "header.php"; 

// Handle feedback submission
$success = false;
$error = false;

if(isset($_POST['send'])){
    $rating = $_POST['rating'] ?? null;
    $msg = trim($_POST['msg'] ?? '');
    $user_id = $_SESSION['user']['id'] ?? null;
    
    if($rating && $user_id){
        $stmt = $conn->prepare("INSERT INTO feedback (user_id, rating, message, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $user_id, $rating, $msg);
        
        if($stmt->execute()){
            $success = true;
        } else {
            $error = "Failed to submit feedback. Please try again.";
        }
        $stmt->close();
    } else {
        $error = "Please select a rating before submitting.";
    }
}

// Fetch recent feedback stats (optional - to show social proof)
$stats = $conn->query("SELECT 
    COUNT(*) as total_feedback,
    AVG(rating) as avg_rating
    FROM feedback")->fetch_assoc();

$total_feedback = $stats['total_feedback'] ?? 0;
$avg_rating = $stats['avg_rating'] ? round($stats['avg_rating'], 1) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Tracker</title>
<link rel="stylesheet" href="assets/css/style.css">

<style> 
body{
    font-family: Times New Roman, sans-serif;
    background:url("CalculatorDashboard.jpeg") center/cover no-repeat fixed; 
    margin: 0;
    padding-top: 130px;
}

body::before{
content:"";
position:fixed;
inset:0;
background:rgba(0,0,0,0.3);
z-index:-1;
}

.card{
background:rgba(255,255,255,.7);
padding:40px;
max-width:700px;
margin:50px auto;
padding:50px;
border-radius:25px;
box-shadow:0 20px 60px rgba(0,0,0,0.3);
}

.card h2{
text-align:center;
color: #0c0c0c;
margin-bottom:10px;
font-size:2.2em;
}

.quote{
text-align:center;
font-style:italic;
color: #0c0c0c;
margin-bottom:35px;
font-size:1.1em;
}

.stats-bar{
background:linear-gradient(135deg,#f0f9ff,#e0f2fe);
padding:20px;
border-radius:15px;
margin-bottom:30px;
display:flex;
justify-content:space-around;
text-align:center;
border:3px solid #228B22;
}

.stat-item{
flex:1;
}

.stat-item .number{
font-size:28px;
font-weight:bold;
color: #156bdb;
}

.stat-item .label{
font-size:14px;
color: #0c0c0c  ;
margin-top:5px;
}

.rating-box{
background:linear-gradient(135deg,#f0f9ff,#e0f2fe);
padding:30px;
border-radius:15px;
margin-bottom:30px;
text-align:center;
border:3px solid #006400;
}

.rating-box label{
display:block;
font-weight:bold;
color: #0c0c0c;
margin-bottom:15px;
font-size:1.2em;
}

.rating{
direction:rtl;
display:inline-flex;
font-size:50px;
gap:10px;
}

.rating span{
cursor:pointer;
color:#ddd;
transition:all 0.3s;
filter:drop-shadow(0 4px 6px rgba(0,0,0,0.2));
-webkit-text-stroke:2px #006400;
text-stroke:2px #006400;
}

.rating span:hover,
.rating span:hover ~ span{
color: #228B22;
transform:scale(1.2);
-webkit-text-stroke:2px #006400;
text-stroke:2px #006400;
}

.rating span.active,
.rating span.active ~ span{
color: #228B22;
-webkit-text-stroke:2px  #006400;
text-stroke:2px  #006400;
}

.rating-label{
display:inline-block;
margin-top:10px;
color: #0c0c0c;
font-size:16px;
font-weight:600;
}

.form-group{
margin-bottom:20px;
}

.form-group label{
display:block;
margin-bottom:8px;
font-weight:600;
color: #0c0c0c ;
font-size:1.1em;
}

textarea{
width:100%;
height:110px;
padding:15px;
border-radius:12px;
border:2px solid #228B22;
font-family:inherit;
font-size:1em;
resize:none;
box-sizing:border-box;
}

textarea:focus{
outline:none;
border-color:#FFD700;
box-shadow:0 0 15px rgb(21, 107, 219);
}

.char-counter{
text-align:right;
font-size:12px;
color:#999;
margin-top:5px;
}

button[name="send"]{
margin-top:25px;
padding:18px;
background: rgb(21, 107, 219);
color:white;
border:none;
border-radius:15px;
cursor:pointer;
width:100%;
font-size:1.2em;
font-weight:bold;
transition:all 0.3s;
box-shadow:0 8px 25px hsl(0, 0%, 1%);
}

button[name="send"]:hover{
transform:translateY(-5px);
box-shadow:0 15px 35px rgb(0, 0, 0);
}

button[name="send"]:disabled{
background:#ccc;
cursor:not-allowed;
box-shadow:none;
}

.alert{
padding:20px;
border-radius:12px;
margin-bottom:25px;
font-size:1.1em;
font-weight:bold;
animation:slideIn 0.3s ease;
}

.alert-success{
background:#d4edda;
color:#155724;
border:2px solid #28a745;
}

.alert-error{
background:#f8d7da;
color:#721c24;
border:2px solid #f5c6cb;
}

@keyframes slideIn{
from{
opacity:0;
transform:translateY(-10px);
}
to{
opacity:1;
transform:translateY(0);
}
}

.social-section{
margin-top:50px;
padding-top:30px;
border-top:3px dashed #156bdb;
text-align:center;
}

.social-section h3{
margin-bottom:25px;
color: #228B22;
font-size:1.6em;
}

.social-links{
display:flex;
flex-wrap:wrap;
justify-content:center;
gap:15px;
}

.social-links a{
display:inline-block;
margin:10px;
padding:15px 30px;
background: #156bdb;
border-radius:30px;
text-decoration:none;
color:white;
font-weight:bold;
font-size:1.1em;
transition:all 0.3s;
box-shadow:0 5px 15px rgba(11, 168, 139, 0.3);
}

.social-links a:hover{
background: #228B22;
color: #f1f8f1;
transform:scale(1.1);
box-shadow:0 8px 25px rgba(11, 168, 139, 0.3);
}

@media(max-width:768px){
.card{
padding:30px;
margin:20px;
}

.rating{
font-size:40px;
}

.stats-bar{
flex-direction:column;
gap:15px;
}

.social-links{
flex-direction:column;
}

.social-links a{
justify-content:center;
}
}
</style>
</head>
<body>

<div class="card">
<h2>We Value Your Feedback</h2>

<p class="quote">
"Our planet's alarm is going off, and it is time to wake up and take action!"
</p>

<?php if($success): ?>
<div class="alert alert-success">
✓ Thank you! Your feedback means a lot to us!
</div>
<?php elseif($error): ?>
<div class="alert alert-error">
✗ <?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>

<form method="post" id="feedbackForm">

<div class="rating-box">
<label>Rate Your Experience</label>

<div class="rating" id="starRating">
<span data-value="5">★</span>
<span data-value="4">★</span>
<span data-value="3">★</span>
<span data-value="2">★</span>
<span data-value="1">★</span>
</div>

<div class="rating-label" id="ratingLabel">Click to rate</div>

<input type="hidden" name="rating" id="ratingValue" required>
</div>

<?php if($total_feedback > 0): ?>
<div class="stats-bar">
<div class="stat-item">
<div class="number"><?= $total_feedback ?></div>
<div class="label">Total Reviews</div>
</div>
<div class="stat-item">
<div class="number"><?= $avg_rating ?> ★</div>
<div class="label">Average Rating</div>
</div>
</div>
<?php endif; ?>

<div class="form-group">
<label>💬 Share Your Thoughts (Optional)</label>
<textarea 
name="msg" 
id="feedbackMsg"
placeholder="Tell us what you loved or how we can improve..."
maxlength="500"></textarea>
<div class="char-counter">
<span id="charCount">0</span>/500 characters
</div>
</div>

<button type="submit" name="send" id="submitBtn" disabled>✓ Submit Feedback</button>
</form>

<div class="social-section">
<h3>🌍 Connect With Us</h3>
<div class="social-links">
<a href="https://facebook.com" target="_blank">📘 Facebook</a>
<a href="https://instagram.com" target="_blank">📸 Instagram</a>
<a href="https://twitter.com" target="_blank">🐦 Twitter</a>
<a href="https://linkedin.com" target="_blank">💼 LinkedIn</a>
</div>
</div>
</div>

<script>
const stars = document.querySelectorAll('#starRating span');
const ratingInput = document.getElementById('ratingValue');
const ratingLabel = document.getElementById('ratingLabel');
const submitBtn = document.getElementById('submitBtn');
const feedbackMsg = document.getElementById('feedbackMsg');
const charCount = document.getElementById('charCount');

const ratingTexts = {
    '1': 'Poor 😞',
    '2': 'Fair 😐',
    '3': 'Good 🙂',
    '4': 'Very Good 😊',
    '5': 'Excellent! 🌟'
};

// Star rating functionality
stars.forEach(star => {
    star.addEventListener('click', function(){
        const value = this.getAttribute('data-value');
        
        // Remove all active classes
        stars.forEach(s => s.classList.remove('active'));
        
        // Add active class to clicked star and all stars after it (in RTL)
        this.classList.add('active');
        let nextStar = this.nextElementSibling;
        while(nextStar){
            nextStar.classList.add('active');
            nextStar = nextStar.nextElementSibling;
        }
        
        // Update hidden input and label
        ratingInput.value = value;
        ratingLabel.textContent = ratingTexts[value];
        ratingLabel.style.color = '#006400';
        
        // Enable submit button
        submitBtn.disabled = false;
    });
    
    // Hover effect with label preview
    star.addEventListener('mouseenter', function(){
        const value = this.getAttribute('data-value');
        ratingLabel.textContent = ratingTexts[value];
    });
});

// Reset label on mouse leave if no rating selected
document.getElementById('starRating').addEventListener('mouseleave', function(){
    if(!ratingInput.value){
        ratingLabel.textContent = 'Click to rate';
        ratingLabel.style.color = '#156bdb';
    } else {
        ratingLabel.textContent = ratingTexts[ratingInput.value];
        ratingLabel.style.color = '#006400';
    }
});

// Character counter
feedbackMsg.addEventListener('input', function(){
    charCount.textContent = this.value.length;
});

// Form validation
document.getElementById('feedbackForm').addEventListener('submit', function(e){
    if(!ratingInput.value){
        e.preventDefault();
        alert('Please select a rating before submitting.');
    }
});

// Auto-hide success message after 5 seconds
<?php if($success): ?>
setTimeout(function(){
    const alert = document.querySelector('.alert-success');
    if(alert){
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
    }
}, 5000);
<?php endif; ?>
</script>

</body>
</html>

<?php include "footer.php"; ?>