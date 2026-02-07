<?php include "header.php"; ?>

<div style="
background:url('forest.jpg') center/cover;
height:90vh;
display:flex;
justify-content:center;
align-items:center;
">

<div style="
background:rgba(255,255,255,0.9);
padding:40px;
width:400px;
text-align:center;
border-radius:8px;
">

<h2>Calculate carbon footprint for</h2>

<br>

<button style="
width:100%;
padding:15px;
margin:10px 0;
background:#2d63a7;
color:white;
border:none;
font-size:16px;
cursor:pointer;"
onclick="location.href='calculator.php?type=individual'">
AN INDIVIDUAL
</button>

<button style="
width:100%;
padding:15px;
margin:10px 0;
background:#2d63a7;
color:white;
border:none;
font-size:16px;
cursor:pointer;"
onclick="location.href='calculator.php?type=household'">
A HOUSEHOLD
</button>

</div>
</div>

<?php include "footer.php"; ?>
