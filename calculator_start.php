<?php include "header.php"; ?>

<style>
/* Remove gaps */
body, html {
    margin: 0;
    padding: 0;
}

/* Full screen dynamic background */
.forest-bg {
    position: relative;
    min-height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

/* Moving environment */
.forest-bg::before {
    content: "";
    position: fixed;
    top: -5%;
    left: -5%;
    width: 110%;
    height: 110%;
    background: url('forest.jpeg') center/cover no-repeat;
    z-index: -2;

    /* continuous motion */
    animation: bgMove 60s linear infinite;
}

/* Soft pastel overlay */
.forest-bg::after {
    content: "";
    position: fixed;
    inset: 0;
    background: linear-gradient(
        rgba(120,180,140,0.25),
        rgba(210,235,220,0.35)
    );
    z-index: -1;
}

/* Background motion */
@keyframes bgMove {
    0%   { transform: scale(1.1) translate(0, 0); }
    25%  { transform: scale(1.12) translate(-2%, -1%); }
    50%  { transform: scale(1.15) translate(-3%, -2%); }
    75%  { transform: scale(1.12) translate(-1%, -3%); }
    100% { transform: scale(1.1) translate(0, 0); }
}

/* Glass pastel card */
.calculator-box {
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(14px);
    padding: 45px;
    width: 420px;
    text-align: center;
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    transition: 0.3s ease;
}

.calculator-box:hover {
    transform: translateY(-6px);
}

/* Heading */
.calculator-box h2 {
    margin-bottom: 25px;
    color: #2e5d3b;
}

/* Buttons */
.calc-btn {
    width: 100%;
    padding: 16px;
    margin: 12px 0;
    background: linear-gradient(135deg, #7bc47f, #9bd5a0);
    color: #1f3d25;
    border: none;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 6px 0 #5a9c61;
}

.calc-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 9px 0 #5a9c61;
}

.calc-btn:active {
    transform: translateY(3px);
    box-shadow: 0 2px 0 #5a9c61;
}
</style>

<div class="forest-bg">
<div class="calculator-box">

<h2>🌿 Calculate Carbon Footprint For</h2>

<button class="calc-btn"
onclick="location.href='calculator.php?type=individual'">
AN INDIVIDUAL
</button>

<button class="calc-btn"
onclick="location.href='calculator.php?type=household'">
A HOUSEHOLD
</button>

</div>
</div>

<?php include "footer.php"; ?>
