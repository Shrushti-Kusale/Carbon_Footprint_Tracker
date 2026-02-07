<?php include "header.php"; ?>

<?php
$type = $_GET['type'] ?? 'individual';
?>

<div class="card">
<h2>Carbon Footprint Calculator</h2>

<form action="save_result.php" method="post">

<input type="hidden" name="calc_type" value="<?=$type?>">

<!-- ================= INDIVIDUAL ================= -->
<div style="<?= $type=='individual' ? '' : 'display:none' ?>">

<h3>Individual Survey</h3>

<h4>⚡ Electricity Usage</h4>

AC usage:
<select name="ac">
<option value="1">Rarely</option>
<option value="3">2–4 hrs/day</option>
<option value="6">5–8 hrs/day</option>
<option value="10">Whole night</option>
</select><br><br>

Fan & lights usage:
<select name="fan">
<option value="2">Low usage</option>
<option value="5">Normal usage</option>
<option value="8">Heavy usage</option>
</select><br><br>

Geyser usage:
<select name="geyser">
<option value="0">Rarely</option>
<option value="2">Winter only</option>
<option value="4">Daily</option>
</select>

<hr>

<h4>🚗 Travel Habits</h4>

<label><input type="checkbox" name="vehicle[]" value="bike"> Two-wheeler</label><br>
<label><input type="checkbox" name="vehicle[]" value="bus"> Bus</label><br>
<label><input type="checkbox" name="vehicle[]" value="train"> Metro/Train</label><br>
<label><input type="checkbox" name="vehicle[]" value="car"> Car</label>

<br><br>

Travel time:
<select name="travel">
<option value="5">Less than 15 min</option>
<option value="15">15–30 min</option>
<option value="30">More than 30 min</option>
</select>

<hr>

<h4>🗑 Waste & Recycling</h4>

Waste generated:
<select name="waste">
<option value="0.3">Low</option>
<option value="0.6">Normal</option>
<option value="1">High</option>
</select><br><br>

Do you recycle?
<select name="recycle">
<option value="-0.2">Yes</option>
<option value="0">Sometimes</option>
<option value="0.3">No</option>
</select>

<hr>

<h4>🍽 Food Habits</h4>

Diet type:
<select name="diet">
<option value="0.2">Vegetarian</option>
<option value="0.6">Mixed</option>
<option value="1">Heavy meat</option>
</select><br><br>

Food delivery frequency:
<select name="food">
<option value="0.1">Rarely</option>
<option value="0.3">Few times/week</option>
<option value="0.6">Frequently</option>
</select>

<hr>

<h4>🛍 Shopping Habits</h4>

Online shopping frequency:
<select name="shopping">
<option value="0.1">Rarely</option>
<option value="0.3">Monthly</option>
<option value="0.6">Weekly</option>
</select><br><br>

Carry reusable bags?
<select name="plastic">
<option value="-0.2">Always</option>
<option value="0">Sometimes</option>
<option value="0.3">Never</option>
</select>

</div>

<!-- ================= HOUSEHOLD ================= -->
<div style="<?= $type=='household' ? '' : 'display:none' ?>">

<h3>Household Survey</h3>

Family members:
<input type="number" name="members" min="1"><br><br>

Number of AC units:
<select name="ac_units">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3 or more</option>
</select><br><br>

Fridges:
<select name="fridge">
<option value="1">1 fridge</option>
<option value="2">2 fridges</option>
</select><br><br>

Washing machine usage:
<select name="washing">
<option value="0.3">Weekly</option>
<option value="0.6">Few times/week</option>
<option value="1">Daily</option>
</select><br><br>

Vehicles owned:
<select name="vehicles">
<option value="1">1 vehicle</option>
<option value="2">2 vehicles</option>
<option value="3">3 or more</option>
</select><br><br>

Vehicle fuel type:
<select name="fuel">
<option value="2">Petrol</option>
<option value="2.5">Diesel</option>
<option value="1.2">CNG</option>
<option value="0.5">Electric</option>
</select><br><br>

Cooking fuel:
<select name="cooking">
<option value="1.5">LPG</option>
<option value="1">Induction/Electric</option>
<option value="1.2">PNG Gas</option>
<option value="2.5">Firewood</option>
</select><br><br>

Household waste:
<select name="house_waste">
<option value="0.5">Low</option>
<option value="1">Normal</option>
<option value="2">High</option>
</select><br><br>

Waste segregation:
<select name="segregation">
<option value="-0.3">Yes</option>
<option value="0">Sometimes</option>
<option value="0.4">No</option>
</select><br><br>

Solar energy usage:
<select name="solar">
<option value="-2">Yes</option>
<option value="0">No</option>
</select><br><br>

Home size:
<select name="home_size">
<option value="1">Small apartment</option>
<option value="2">Medium home</option>
<option value="3">Large house</option>
</select>

</div>

<hr>

<div style="text-align:center;margin-top:20px;">
<button type="submit"
style="padding:14px 25px;font-size:16px;background:#2e7d32;color:white;border:none;border-radius:6px;cursor:pointer;">
Calculate Carbon Footprint
</button>
</div>

</form>
</div>

<?php include "footer.php"; ?>
