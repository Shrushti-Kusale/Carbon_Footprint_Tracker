<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carbon Footprint Tracker</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, sans-serif;
      scroll-behavior: smooth;
    }

    /* Navbar */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 50px;
      background: rgba(0,0,0,0.5); /* 50% transparent black strip */
      color: #fff;
      position: fixed;
      top: 0;
      width: 100%;
      height: 100px; /* larger strip size */
      z-index: 1000;
      backdrop-filter: blur(6px);
    }

    header img {
      height: 65px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 40px;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 1.05rem;
      letter-spacing: 0.5px;
      transition: color 0.3s ease, border-bottom 0.3s ease;
      padding-bottom: 5px;
    }

    nav ul li a:hover {
      color: #c8e6c9;
      border-bottom: 2px solid #c8e6c9;
    }

    /* Hero Section */
    #home {
      height: 100vh;
      background: url('background.jpg') center/cover no-repeat; /* replace with your image */
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
    }

    /* Middle transparent box */
    .overlay-box {
      background: rgba(255,255,255,0.85);
      padding: 50px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      max-width: 700px;
      animation: fadeIn 1.2s ease-in-out;
    }

    .overlay-box h1 {
      font-size: 3rem;
      color: #2e7d32;
      margin-bottom: 20px;
    }

    .overlay-box p {
      font-size: 1.2rem;
      margin-bottom: 30px;
      color: #333;
    }

    .overlay-box button {
      background: #1565c0;
      color: #fff;
      border: none;
      padding: 14px 30px;
      font-size: 1.1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .overlay-box button:hover {
      background: #0d47a1;
      transform: translateY(-2px);
    }

    /* Other Sections */
    section {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 40px;
    }

    #about { background: #f1f8e9; }
    #contact { background: #e8f5e9; }

    h2 { color: #2e7d32; }

    footer {
      text-align: center;
      padding: 20px;
      background: rgba(0,0,0,0.7);
      color: #fff;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 900px) {
      nav ul { gap: 20px; }
      nav ul li a { font-size: 0.9rem; }
      .overlay-box h1 { font-size: 2rem; }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <header>
    <img src="logo.png" alt="Carbon Tracker Logo"> <!-- replace with your logo -->
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="joinus.php">Join Us</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="feedback.php">Feedback</a></li>
      </ul>
    </nav>
  </header>

  <!-- Home Section with overlay box -->
  <section id="home">
    <div class="overlay-box">
      <h1>🌍 Carbon Footprint Tracker</h1>
      <p>Track and reduce your daily carbon emissions using simple lifestyle questions.</p>
      <a href="login.php"><button>Login / Signup to Start Tracking</button></a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about">
    <h2>Why use this tracker?</h2>
    <ul>
      <li>Understand your carbon impact</li>
      <li>Improve eco habits</li>
      <li>Reduce energy usage</li>
      <li>Help the environment</li>
    </ul>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <h2>Contact Us</h2>
    <p>Email: <a href="mailto:support@carbontracker.com">support@carbontracker.com</a></p>
    <p>Phone: +91-0000000000</p>
    <p>Location: India</p>
  </section>

  <footer>
    © 2026 Carbon Tracker | Designed with care for the planet 🌱
  </footer>

</body>
</html>