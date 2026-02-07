<?php include "header.php"; ?>

<style>
.welcome-card {
    max-width: 800px;
    margin: auto;
    text-align: center;
}
.welcome-card h2 {
    font-size: 28px;
}
.welcome-card .tagline {
    font-size: 12p;
    color: #2e7d32;
    font-weight: 500;
    margin-bottom: 10px;
}
.welcome-card .desc {
    color: #0b0a0a;
    margin-bottom: 20px;
}
.action-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
    margin-top: 20px;
}
.action-box {
    padding: 20px;
    border-radius: 10px;
    background: #f4f8f5;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
}
.action-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}
.action-box span {
    font-size: 32px;
}
.action-box h4 {
    margin: 10px 0 5px;
}
.motivation {
    margin-top: 25px;
    font-style: italic;
    color: #08f4bd;
}
</style>

<div class="card welcome-card">
    <h2>Welcome, <?=$_SESSION['user']['name']?> 👋</h2>
    <p class="tagline">Your daily actions shape our planet 🌍</p>
    <p class="desc">
        Answer a few simple questions each day to understand and reduce
        your carbon footprint.
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

    <!-- Motivation Quote -->
    <p class="motivation">
        “The greatest threat to our planet is the belief that someone else will save it.”
    </p>
</div>

<?php include "footer.php"; ?>
