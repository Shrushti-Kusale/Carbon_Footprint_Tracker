<?php include "header.php"; ?>

<style>
/* Container */
.page-container {
    width: 100%;
    margin: 0 auto;
    padding: 0;
}

/* Fullscreen Sections */
.section-card {
    height: 100vh;
    display: flex;
    justify-content: center; /* center by default */
    align-items: center;
    background: #f0f7f2;
    padding: 20px;
    box-sizing: border-box;
}

/* Result section overrides vertical centering */
#result.section-card {
    justify-content: flex-start; /* start from top */
    padding-top: 40px;           /* some space from top */
}

/* Inner Card to hold content */
.section-inner {
    background: #ffffff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    width: 90%;
    height: 90%;
    overflow-y: auto;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* For result section, remove vertical centering inside card */
#result .section-inner {
    justify-content: flex-start;
    text-align: left; /* optional: align text left for better readability */
}

/* Section Content */
.section-inner h2 {
    color: #2e7d32;
    margin-bottom: 15px;
}
.section-inner p {
    color: #090909;
    line-height: 1.6;
}
.highlight {
    font-weight: bold;
    color: #100cea;
}

/* Action Cards */
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
    transition: transform 0.2s, box-shadow 0.2s;
}
.action-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
.action-box span {
    font-size: 32px;
    display: block;
}
.action-box h4 {
    margin: 10px 0 5px;
}

/* Formulas */
.formula {
    background: #dff5ff;
    padding: 18px;
    border-left: 5px solid #100cea;
    margin-top: 15px;
    border-radius: 8px;
    font-family: monospace;
    font-size: 15px;
    color: #010101;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.formula:hover {
    transform: translateX(4px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}

/* Smooth scrolling */
body {
    scroll-behavior: smooth;
}
</style>

<div class="page-container">

    <!-- ================= SECTION 1: WELCOME ================= -->
    <section id="welcome" class="section-card">
        <div class="section-inner">
            <h2>🌍 Carbon Footprint Tracker</h2>
            <p>Welcome <span class="highlight"><?=$_SESSION['user']['name']?></span> 👋</p>
            <p>
                Track, understand, and reduce your daily carbon footprint by answering
                a few simple questions. Your small actions today create a sustainable
                future for tomorrow.
            </p>
            <p style="font-style:italic;">
                “Our planet's alarm is going off, and it is time to wake up and take action!”
            </p>
        </div>
    </section>

    <!-- ================= SECTION 2: ABOUT US ================= -->
    <section id="about" class="section-card">
        <div class="section-inner">
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
    </section>

    <!-- ================= SECTION 3: RESULT EXPLANATION ================= -->
    <section id="result" class="section-card; line-height:0.5;">
        <div class="section-inner" style="text-align:left;">
            <h2>📘 Understanding Your Carbon Footprint</h2>
            <p>
                Your carbon footprint shows how much CO₂ your daily lifestyle produces. 
                <span style="display:block; line-height:1.0;">It’s measured in kilograms of carbon dioxide (kg CO₂),the main gas causing climate change.</span> 
            </p>
            
            <p class="highlight">Basic Calculation Formula:</p>

            <div class="formula">
                Total Carbon Footprint (kg CO₂) = <br>
                Transport + Electricity + Food + Waste Emissions
            </div>
            
            <p><b>1 kg CO₂ roughly equals:</b>
                <span style="display:block; line-height:0.0;"><ol style="margin-left:20px; margin-bottom:15px;">
                        <li>Driving a petrol vehicle for 4–5 km</li>
                        <li>Running an air conditioner for 1 hour</li>
                        <li>Using household electricity for a few hours</li>
                        <li>Producing and transporting everyday food or products</li></ol>
                </span>
            </p>
            <p><strong>Understanding your result:</strong></p>
            <ul style="margin-left:20px; margin-bottom:15px;">
                <li>Lower kg CO₂ → smaller environmental impact</li>
                <li>Higher kg CO₂ → more pollution</li>
            </ul>
            <p>
                Use your result to identify major emission sources and take small actions — 
                save electricity, reduce waste, or choose smarter travel. Even minor lifestyle changes make a big difference over time.
            </p>
        </div>
    </section>

</div>

<?php include "footer.php"; ?>
