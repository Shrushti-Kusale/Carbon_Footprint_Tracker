<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Calculator - Ocean Theme</title>
    <style>
/* ===================================
   OCEAN BLUE THEME
   =================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: url("CalculatorDashboard.jpeg") center/cover no-repeat fixed;
    min-height: 100vh;
    padding: 20px;
    color: #333;
    overflow-x: hidden;
}

/* Soft overlay for readability */
body::before {
    content: "";
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.25);
    z-index: -1;
}

/* ===================================
   LANDING PAGE STYLES
   =================================== */

.landing-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.hero-section {
    text-align: center;
    margin-bottom: 60px;
    animation: slideDown 0.8s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-section h1 {
    font-size: 56px;
    color: white;
    margin-bottom: 20px;
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
    font-weight: 700;
    line-height: 1.2;
}

.hero-section .subtitle {
    font-size: 22px;
    color: rgba(255, 255, 255, 0.95);
    margin-bottom: 10px;
    font-weight: 300;
}

.hero-section .description {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.85);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.choice-container {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 1000px;
    animation: slideUp 0.8s ease-out 0.2s both;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.choice-card {
    background: white;
    border-radius: 24px;
    padding: 50px 40px;
    width: 380px;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.choice-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 8px;
    background: linear-gradient(90deg, #0093E9, #00D4FF);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.choice-card:hover::before {
    transform: scaleX(1);
}

.choice-card:hover {
    transform: translateY(-15px) scale(1.03);
    box-shadow: 0 20px 60px rgba(0, 147, 233, 0.4);
}

.choice-card:active {
    transform: translateY(-10px) scale(1.01);
}

.icon-wrapper {
    width: 120px;
    height: 120px;
    margin: 0 auto 30px;
    background: linear-gradient(135deg, #E3F2FD, #BBDEFB);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    transition: all 0.4s ease;
}

.choice-card:hover .icon-wrapper {
    transform: rotate(10deg) scale(1.1);
    background: linear-gradient(135deg, #42A5F5, #0093E9);
}

.choice-card h3 {
    font-size: 28px;
    color: #01579B;
    margin-bottom: 15px;
    font-weight: 600;
}

.choice-card p {
    font-size: 16px;
    color: #666;
    line-height: 1.7;
    margin-bottom: 25px;
}

.choice-card .features {
    list-style: none;
    text-align: left;
    margin-bottom: 30px;
}

.choice-card .features li {
    padding: 10px 0;
    color: #555;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.choice-card .features li::before {
    content: '✓';
    color: #0093E9;
    font-weight: bold;
    font-size: 18px;
    flex-shrink: 0;
}

.choice-btn {
    background: linear-gradient(135deg, #0093E9, #0277BD);
    color: white;
    border: none;
    padding: 16px 40px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 147, 233, 0.3);
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 100%;
}

.choice-btn:hover {
    box-shadow: 0 6px 25px rgba(0, 147, 233, 0.5);
    transform: translateY(-2px);
}

/* ===================================
   CALCULATOR FORM STYLES
   =================================== */

.calculator-section {
    display: none;
    animation: fadeInScale 0.6s ease-out;
    max-width: 800px;
    margin: 0 auto;
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.calculator-section.active {
    display: block;
}

.back-button {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid white;
    padding: 12px 30px;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    margin-bottom: 30px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.back-button:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateX(-5px);
}

.card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    overflow: hidden;
}

.card h2 {
    background: linear-gradient(135deg, #0093E9 0%, #0277BD 100%);
    color: white;
    padding: 30px;
    text-align: center;
    font-size: 32px;
    font-weight: 600;
    letter-spacing: 1px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

form {
    padding: 40px;
}

h3 {
    color: #0093E9;
    font-size: 26px;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
}

h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #0093E9, #42A5F5);
    border-radius: 2px;
}

h4 {
    color: #01579B;
    font-size: 20px;
    margin: 25px 0 20px;
    padding-left: 10px;
    border-left: 5px solid #42A5F5;
    display: flex;
    align-items: center;
    gap: 10px;
}

label {
    display: inline-block;
    margin: 10px 0;
    font-size: 16px;
    color: #555;
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 6px;
    transition: all 0.3s ease;
}

label:hover {
    background: #E3F2FD;
    color: #0093E9;
}

input[type="checkbox"] {
    margin-right: 10px;
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #0093E9;
}

input[type="number"] {
    width: 100%;
    padding: 12px 16px;
    font-size: 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    transition: all 0.3s ease;
    background: #fafafa;
}

input[type="number"]:focus {
    outline: none;
    border-color: #0093E9;
    background: white;
    box-shadow: 0 0 0 3px rgba(0, 147, 233, 0.1);
}

select {
    width: 100%;
    padding: 14px 16px;
    font-size: 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    background: white;
    cursor: pointer;
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%230093E9' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 20px;
    padding-right: 45px;
}

select:hover {
    border-color: #42A5F5;
    background-color: #E3F2FD;
}

select:focus {
    outline: none;
    border-color: #0093E9;
    box-shadow: 0 0 0 3px rgba(0, 147, 233, 0.1);
}

hr {
    border: none;
    height: 2px;
    background: linear-gradient(90deg, transparent, #e0e0e0, transparent);
    margin: 35px 0;
}

button[type="submit"] {
    padding: 16px 40px !important;
    font-size: 18px !important;
    font-weight: 600;
    background: linear-gradient(135deg, #0093E9 0%, #0277BD 100%) !important;
    color: white !important;
    border: none !important;
    border-radius: 50px !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 15px rgba(0, 147, 233, 0.4);
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 100%;
}

button[type="submit"]:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(0, 147, 233, 0.5);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section h1 { font-size: 36px; }
    .hero-section .subtitle { font-size: 18px; }
    .hero-section .description { font-size: 16px; }
    .choice-container { gap: 20px; }
    .choice-card {
        width: 100%;
        max-width: 380px;
        padding: 40px 30px;
    }
    .card h2 { font-size: 24px; padding: 20px; }
    form { padding: 25px; }
    h3 { font-size: 22px; }
    h4 { font-size: 18px; }
}

::selection { background: #42A5F5; color: white; }
::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: #f1f1f1; }
::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #0093E9, #42A5F5);
    border-radius: 5px;
}
    </style>
</head>
<body>

    <!-- LANDING PAGE -->
    <div class="landing-page" id="landingPage">
        <div class="hero-section">
            <h1>🌍 Carbon Footprint Calculator</h1>
            <p class="subtitle">Measure Your Environmental Impact</p>
            <p class="description">Calculate your carbon emissions and discover ways to reduce your environmental footprint. Choose your survey type to get started.</p>
        </div>

        <div class="choice-container">
            <!-- Individual Card -->
            <div class="choice-card" onclick="showCalculator('individual')">
                <div class="icon-wrapper">👤</div>
                <h3>Individual Survey</h3>
                <p>Calculate your personal carbon footprint based on your daily habits and lifestyle choices.</p>
                <ul class="features">
                    <li>Electricity usage</li>
                    <li>Travel habits</li>
                    <li>Waste & recycling</li>
                    <li>Food & shopping</li>
                </ul>
                <button class="choice-btn">Start Individual Survey</button>
            </div>

            <!-- Household Card -->
            <div class="choice-card" onclick="showCalculator('household')">
                <div class="icon-wrapper">🏠</div>
                <h3>Household Survey</h3>
                <p>Measure your entire household's carbon footprint including family members and shared resources.</p>
                <ul class="features">
                    <li>Family size & home</li>
                    <li>Appliances & energy</li>
                    <li>Vehicles & fuel</li>
                    <li>Waste management</li>
                </ul>
                <button class="choice-btn">Start Household Survey</button>
            </div>
        </div>
    </div>

    <!-- INDIVIDUAL CALCULATOR -->
    <div class="calculator-section" id="individualCalculator">
        <button class="back-button" onclick="location.href='calculator_start.php'"> ← Back to Options </button>
        
        <div class="card">
            <h2>Carbon Footprint Calculator</h2>

            <form action="save_result.php" method="post">
                <input type="hidden" name="calc_type" value="individual">

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

                <hr>

                <div style="text-align:center;margin-top:20px;">
                    <button type="submit">Calculate Carbon Footprint</button>
                </div>
            </form>
        </div>
    </div>

    <!-- HOUSEHOLD CALCULATOR -->
    <div class="calculator-section" id="householdCalculator">
        <button class="back-button" onclick="location.href='calculator_start.php'"> ← Back to Options </button>
        
        <div class="card">
            <h2>Carbon Footprint Calculator</h2>

            <form action="save_result.php" method="post">
                <input type="hidden" name="calc_type" value="household">

                <h3>Household Survey</h3>

                Family members:
                <input type="number" name="members" min="1" placeholder="Enter number of family members"><br><br>

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

                <hr>

                <div style="text-align:center;margin-top:20px;">
                    <button type="submit">Calculate Carbon Footprint</button>
                </div>
            </form>
        </div>
    </div>

    <script>
function showCalculator(type) {
    document.getElementById('landingPage').style.display = 'none';

    if (type === 'individual') {
        document.getElementById('individualCalculator').classList.add('active');
    } else {
        document.getElementById('householdCalculator').classList.add('active');
    }

    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function showLanding() {
    document.getElementById('individualCalculator').classList.remove('active');
    document.getElementById('householdCalculator').classList.remove('active');
    document.getElementById('landingPage').style.display = 'flex';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

/* Auto open calculator if type exists in URL */
window.onload = function () {
    const params = new URLSearchParams(window.location.search);
    const type = params.get("type");

    if (type === "individual" || type === "household") {
        showCalculator(type);
    }
};
</script>

</body>
</html>