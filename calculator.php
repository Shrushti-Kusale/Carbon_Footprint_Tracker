<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Calculator</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;}

body{
font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
background:url("CalculatorDashboard.jpeg") center/cover no-repeat fixed;
min-height:100vh;
padding:20px;
color:#333;
}

body::before{
content:"";
position:fixed;
inset:0;
background:rgba(0,0,0,0.25);
z-index:-1;
}

.calculator-section{
display:none;
max-width:900px;
margin:auto;
margin-bottom:50px;
}

.back-button{
background:white;
border:none;
padding:12px 20px;
border-radius:25px;
cursor:pointer;
margin-bottom:20px;
font-weight:600;
box-shadow:0 3px 8px rgba(0,0,0,0.2);
}

.card{
background:white;
border-radius:18px;
overflow:hidden;
box-shadow:0 20px 50px rgba(0,0,0,0.35);
}

.card h2{
background:#0093E9;
color:white;
padding:22px;
text-align:center;
}

form{ padding:35px; }

.section-title{
margin:30px 0 15px;
color:#01579B;
font-size:20px;
border-left:5px solid #0093E9;
padding-left:10px;
}

.form-group{ margin-bottom:20px; }

.form-group label{
display:block;
margin-bottom:8px;
font-weight:600;
}

.form-group select,
.form-group input{
width:100%;
padding:12px;
border-radius:8px;
border:1px solid #ccc;
font-size:15px;
}

.checkbox-group{
background:#f7f9fc;
padding:12px 15px;
border-radius:8px;
}

.travel-option{
display:flex;
align-items:center;
gap:10px;
margin:8px 0;
font-weight:normal;
cursor:pointer;
}

.travel-option input{
width:auto;
}

hr{
margin:30px 0;
border:0;
height:1px;
background:#ddd;
}

.submit-area{
text-align:center;
margin-top:25px;
}

form button[type="submit"]{
background:#0093E9;
color:white;
border:none;
padding:16px 35px;
border-radius:50px;
cursor:pointer;
font-size:17px;
font-weight:600;
}

@media(max-width:600px){
form{padding:20px;}
}
</style>
</head>

<body>

<!-- ================= INDIVIDUAL ================= -->
<div class="calculator-section" id="individualForm">

<button class="back-button"
onclick="window.location.href='calculator_start.php'">
← Back
</button>

<div class="card">
<h2>Individual Survey</h2>

<form action="save_result.php" method="post">
<input type="hidden" name="calc_type" value="individual">

<h3 class="section-title">Electricity Usage</h3>

<div class="form-group">
<label>AC usage</label>
<select name="ac" required>
<option value="1">Rarely</option>
<option value="3">2–4 hrs/day</option>
<option value="6">5–8 hrs/day</option>
<option value="10">Whole night</option>
</select>
</div>

<div class="form-group">
<label>Fan & lights usage</label>
<select name="fan">
<option value="2">Low</option>
<option value="5">Normal</option>
<option value="8">Heavy</option>
</select>
</div>

<div class="form-group">
<label>Geyser usage</label>
<select name="geyser">
<option value="0">Rarely</option>
<option value="2">Winter only</option>
<option value="4">Daily</option>
</select>
</div>

<hr>

<h3 class="section-title">Travel Habits</h3>

<div class="form-group checkbox-group">
<label>Select all transport modes you use</label>

<label class="travel-option"><input type="checkbox" name="vehicle[]" value="1"><span>Walking / Cycling</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="2"><span>Metro</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="3"><span>Local Train</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="4"><span>Bus</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="5"><span>Auto-rickshaw</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="4"><span>E-rickshaw</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="6"><span>Two-wheeler</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="7"><span>Cab / Taxi</span></label>
<label class="travel-option"><input type="checkbox" name="vehicle[]" value="9"><span>Private Car</span></label>

</div>

<div class="form-group">
<label>Average daily travel distance</label>
<select name="travel">
<option value="2">Less than 5 km</option>
<option value="5">5–15 km</option>
<option value="8">15–30 km</option>
<option value="12">More than 30 km</option>
</select>
</div>

<hr>

<h3 class="section-title">Waste & Recycling</h3>

<div class="form-group">
<label>Waste generated</label>
<select name="waste">
<option value="0.3">Low</option>
<option value="0.6">Normal</option>
<option value="1">High</option>
</select>
</div>

<div class="form-group">
<label>Do you recycle?</label>
<select name="recycle">
<option value="-0.2">Yes</option>
<option value="0">Sometimes</option>
<option value="0.3">No</option>
</select>
</div>

<div class="submit-area">
<button type="submit">Calculate Footprint</button>
</div>

</form>
</div>
</div>

<!-- ================= HOUSEHOLD ================= -->
<div class="calculator-section" id="householdForm">

<button class="back-button"
onclick="window.location.href='calculator_start.php'">
← Back
</button>

<div class="card">
<h2>Household Survey</h2>

<form action="save_result.php" method="post">
<input type="hidden" name="calc_type" value="household">

<h3 class="section-title">Household Details</h3>

<div class="form-group">
<label>Family members</label>
<input type="number" name="members" min="1" required>
</div>

<div class="form-group">
<label>Number of AC units</label>
<select name="ac_units">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3+</option>
</select>
</div>

<div class="form-group">
<label>Fridges</label>
<select name="fridge">
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>

<div class="form-group">
<label>Washing machine usage</label>
<select name="washing">
<option value="0.3">Weekly</option>
<option value="0.6">Few times/week</option>
<option value="1">Daily</option>
</select>
</div>

<div class="form-group">
<label>Vehicles owned</label>
<select name="vehicles">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3+</option>
</select>
</div>

<div class="form-group">
<label>Fuel type</label>
<select name="fuel">
<option value="2">Petrol</option>
<option value="2.5">Diesel</option>
<option value="1.2">CNG</option>
<option value="0.5">Electric</option>
</select>
</div>

<div class="form-group">
<label>Cooking fuel</label>
<select name="cooking">
<option value="1.5">LPG</option>
<option value="1">Electric</option>
<option value="2.5">Firewood</option>
</select>
</div>

<div class="form-group">
<label>Solar energy usage</label>
<select name="solar">
<option value="-2">Yes</option>
<option value="0">No</option>
</select>
</div>

<div class="submit-area">
<button type="submit">Calculate Footprint</button>
</div>

</form>
</div>
</div>

<script>
const params = new URLSearchParams(window.location.search);
const type = params.get("type");

if(type === "household"){
document.getElementById("householdForm").style.display = "block";
}else{
document.getElementById("individualForm").style.display = "block";
}
</script>

</body>
</html>
