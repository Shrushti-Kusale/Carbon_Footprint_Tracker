<?php include "header.php"; ?>

<style>
.page-container {
    max-width: 1000px;
    margin: auto;
}
.section-card {
    background: #ffffff;
    padding: 30px;
    margin-bottom: 25px;
    border-radius: 12px;
}
.section-card h2 {
    color: #2e7d32;
    margin-bottom: 10px;
}
.section-card p {
    color: #555;
    line-height: 1.6;
}
.highlight {
    font-weight: bold;
    color: #1b5e20;
}
.action-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
    margin-top: 25px;
}

.action-box {
    background: #dff5ff;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.action-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

.action-box span {
    font-size: 32px;
    display: block;
}

.action-box h4 {
    margin: 10px 0 5px;
}
.formula {
    background: #dff5ff;              /* soft green */
    padding: 18px;
    border-left: 5px solid #1e0af7;   /* eco green accent */
    margin-top: 15px;
    border-radius: 8px;
    font-family: monospace;
    font-size: 15px;
    color: #010101;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.formula:hover {
    transform: translateX(4px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
}

</style>

<div class="page-container">

    <!-- ================= SECTION 1: WEBSITE NAME + WELCOME ================= -->
    <div class="section-card">
        <h2>🌍 Carbon Footprint Tracker</h2>
        <p>
            Welcome <span class="highlight"><?=$_SESSION['user']['name']?></span> 👋
        </p>
        <p>
            Track, understand, and reduce your daily carbon footprint by answering
            a few simple questions. Your small actions today create a sustainable
            future for tomorrow.
        </p>
        <p style="font-style:italic;">
            “Our planet's alarm is going off, and it is time to wake up and take action!”
        </p>
    </div>

    <!-- ================= SECTION 2: ABOUT US ================= -->
    <div class="section-card">
        <h2>♻️ About Us</h2>
        <p>
            EcoTrack is a smart environmental awareness platform designed to help
            individuals measure their daily carbon emissions caused by lifestyle
            choices such as transportation, electricity usage, and consumption habits.
        </p>
        <p>
            Our goal is not just to calculate emissions, but to provide
            <span class="highlight">insights</span> that encourage eco-friendly behavior.
            By visualizing your impact, we empower you to make informed and responsible decisions.
        </p>
        <p>
            We believe that <span class="highlight">data + awareness = change</span>.
            Even small daily improvements can significantly reduce global carbon emissions.
        </p>

        <!-- Action Cards -->
        <div class="action-grid">
            <div class="action-box">
                <span>📝</span>
                <h4>Start Today’s Check-in</h4>
                <p>Log your daily activities in under 2 minutes.</p>
            </div>

            <div class="action-box">
                <span>📊</span>
                <h4>View Your Impact</h4>
                <p>See how your lifestyle affects the planet.</p>
            </div>

            <div class="action-box">
                <span>🌱</span>
                <h4>Get Eco Tips</h4>
                <p>Small changes that make a big difference.</p>
            </div>
        </div>
    </div>

    <!-- ================= SECTION 3: RESULT EXPLANATION ================= -->
    <div class="section-card">
        <h2>📊 What does Your Result Mean</h2>
        <p>
            Your carbon footprint is calculated based on daily activities.
            Each activity contributes a specific amount of CO₂ emissions.
        </p>

        <p class="highlight">Basic Calculation Formula:</p>

        <div class="formula">
            Total Carbon Footprint (kg CO₂) = <br>
            Transport + Electricity + Food + Waste Emissions
        </div>

        <p class="highlight" style="margin-top:15px;">Example Breakdown:</p>

        <div class="formula">
            Transport = Distance × Emission Factor<br>
            Electricity = Units × 0.82 kg CO₂<br>
            Food = Diet Type × Emission Value<br>
            Waste = Waste × Disposal Factor
        </div>

        <p>Result categories:</p>
        <ul>
            <li><strong>Low:</strong> Eco-friendly lifestyle 🌱</li>
            <li><strong>Medium:</strong> Moderate impact ⚖️</li>
            <li><strong>High:</strong> Needs improvement 🚨</li>
        </ul>

        <p>
            Based on your result, the system generates personalized
            <span class="highlight">insights and tips</span> to help you reduce emissions.
        </p>
    </div>

</div>

<?php include "footer.php"; ?>
