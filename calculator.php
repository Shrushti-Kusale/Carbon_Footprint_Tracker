<?php include "header.php"; ?>

<div class="card">
<h2>🌍 Daily Carbon Footprint Survey (India)</h2>

<!-- Progress bar -->
<div style="background:#ddd;height:10px;border-radius:5px;margin-bottom:20px;">
<div id="progress" style="height:10px;background:#2e7d32;width:16%;border-radius:5px;"></div>
</div>

<form action="save_result.php" method="post">
    
<!-- STEP 1 Electricity -->
<div class="step">
<h3>⚡ Step 1: Home Electricity Usage</h3>

<label>AC usage in summer?</label>
<select name="ac">
<option value="1">Rarely</option>
<option value="3">4–6 hours/day</option>
<option value="6">8+ hours/day</option>
<option value="10">Whole night</option>
</select>

<label>Fans & lights usage?</label>
<select name="fan">
<option value="2">Low usage</option>
<option value="5">Normal usage</option>
<option value="8">Heavy usage</option>
</select>

<label>Water heater (geyser) usage?</label>
<select name="geyser">
<option value="0">Rarely</option>
<option value="2">Winter only</option>
<option value="4">Daily usage</option>
</select>

<label>Refrigerator usage?</label>
<select name="fridge">
<option value="1">Small fridge</option>
<option value="2">Medium fridge</option>
<option value="3">Large fridge</option>
</select>

<label>Washing machine usage?</label>
<select name="washing">
<option value="0.2">Once a week</option>
<option value="0.5">2–3 times/week</option>
<option value="1">Daily usage</option>
</select>

<button type="button" onclick="nextStep()">Next →</button>
</div>

<!-- STEP 2 Travel -->
<div class="step" style="display:none">
<h3>🚗 Step 2: Daily Travel</h3>

<label>Transport modes you use?</label>
<p style="font-size:14px;color:gray">(Select all that apply)</p>

<label><input type="checkbox" name="vehicle[]" value="car"> Car (alone)</label><br>
<label><input type="checkbox" name="vehicle[]" value="carpool"> Carpool</label><br>
<label><input type="checkbox" name="vehicle[]" value="bike"> Two-wheeler</label><br>
<label><input type="checkbox" name="vehicle[]" value="bus"> Bus</label><br>
<label><input type="checkbox" name="vehicle[]" value="train"> Metro/Train</label><br>
<label><input type="checkbox" name="vehicle[]" value="auto"> Auto-rickshaw</label><br>
<label><input type="checkbox" name="vehicle[]" value="cycle"> Walk/Cycle</label>

<br><br>

<label>Total travel time per day?</label>
<select name="travel">
<option value="5">Less than 15 min</option>
<option value="10">15–30 min</option>
<option value="20">30–60 min</option>
<option value="30">More than 1 hour</option>
</select>

<br><br>

<label>How many days per week do you travel?</label>
<select name="travel_days">
<option value="3">3 days</option>
<option value="5">5 days</option>
<option value="6">6 days</option>
<option value="7">Every day</option>
</select>

<br><br>

<label>Work/Study from home days per week?</label>
<select name="wfh">
<option value="0">None</option>
<option value="1">1 day</option>
<option value="2">2 days</option>
<option value="3">3+ days</option>
</select>

<div style="display:flex;gap:10px;">
<button type="button" style="flex:1" onclick="prevStep()">← Back</button>
<button type="button" style="flex:1" onclick="nextStep()">Next →</button>
</div>
</div>

<!-- STEP 3 Waste -->
<div class="step" style="display:none">
<h3>🗑 Step 3: Waste Handling</h3>

<label>Household waste amount?</label>
<select name="waste">
<option value="0.2">Very low</option>
<option value="0.5">Normal</option>
<option value="1">High</option>
</select>

<label>Do you separate wet & dry waste?</label>
<select name="recycle">
<option value="-0.2">Yes</option>
<option value="0">Sometimes</option>
<option value="0.3">No</option>
</select>

<label>Do you compost kitchen waste?</label>
<select name="compost">
<option value="-0.2">Yes</option>
<option value="0">No</option>
</select>

<div style="display:flex;gap:10px;">
<button style="flex:1" type="button" onclick="prevStep()">← Back</button>
<button style="flex:1" type="button" onclick="nextStep()">Next →</button>
</div>
</div>

<!-- STEP 4 Food Habit -->
<div class="step" style="display:none">
<h3>🍽 Step 4: Food Habit</h3>

<label>Your diet type?</label>
<select name="diet">
<option value="0.2">Vegetarian</option>
<option value="0.4">Eggetarian</option>
<option value="0.6">Mixed diet</option>
<option value="1">Heavy meat consumption</option>
</select>

<label>How often do you order food online?</label>
<select name="food">
<option value="0.1">Rarely</option>
<option value="0.3">Few times/week</option>
<option value="0.6">Almost daily</option>
</select>

<div style="display:flex;gap:10px;">
<button style="flex:1" type="button" onclick="prevStep()">← Back</button>
<button style="flex:1" type="button" onclick="nextStep()">Next →</button>
</div>
</div>

<!-- STEP 5 Shopping -->
<div class="step" style="display:none">
<h3>🛍 Step 5: Shopping & Consumption</h3>

<label>How often do you buy new clothes?</label>
<select name="clothes">
<option value="0.1">Only when needed</option>
<option value="0.3">Few times/year</option>
<option value="0.6">Monthly shopping</option>
</select>

<label>Online shopping frequency?</label>
<select name="shopping">
<option value="0.1">Rarely</option>
<option value="0.3">Monthly</option>
<option value="0.6">Weekly</option>
</select>

<label>Do you carry reusable shopping bags?</label>
<select name="plastic">
<option value="-0.2">Always</option>
<option value="0">Sometimes</option>
<option value="0.3">Never</option>
</select>

<div style="display:flex;gap:10px;">
<button style="flex:1" type="button" onclick="prevStep()">← Back</button>
<button style="flex:1" type="button" onclick="nextStep()">Next →</button>
</div>
</div>

<!-- STEP 6 Confirm -->
<div class="step" style="display:none">
<h3>✅ Confirm & Calculate</h3>

<p>Click calculate to view your carbon footprint.</p>

<div style="display:flex;gap:10px;">
<button style="flex:1" type="button" onclick="prevStep()">← Back</button>
<button style="flex:1" type="submit">Calculate Result</button>
</div>
</div>

</form>
</div>

<script>
let step = 0;
let steps = document.querySelectorAll(".step");
let progress = document.getElementById("progress");

function updateProgress(){
    let percent = ((step+1)/steps.length)*100;
    progress.style.width = percent + "%";
}

function nextStep(){
    steps[step].style.display="none";
    step++;
    steps[step].style.display="block";
    updateProgress();
}

function prevStep(){
    steps[step].style.display="none";
    step--;
    steps[step].style.display="block";
    updateProgress();
}
</script>

<?php include "footer.php"; ?>
