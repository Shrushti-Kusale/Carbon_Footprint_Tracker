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
      background: rgba(0,0,0,0.5);
      color: #fff;
      position: fixed;
      top: 0;
      width: 100%;
      height: 100px;
      z-index: 1000;
      backdrop-filter: blur(6px);
    }

    header img {
      height: 65px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 35px;
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

    nav ul li a:hover,
    nav ul li a.active {
      color: #c8e6c9;
      border-bottom: 2px solid #c8e6c9;
    }

    /* Hero Section */
    #home {
      height: 100vh;
      background: url('background.jpg') center/cover no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
    }

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

    /* About Us Section */
    #about {
      height: 100vh;
      background: #f1f8e9;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px 20px;
      text-align: center;
    }

    #about h2 {
      color: #2e7d32;
      margin-bottom: 40px;
      font-size: 2.5rem;
    }

    .team-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 30px;
      max-width: 1100px;
      width: 100%;
    }

    .team-member {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      padding: 20px;
      transition: transform 0.3s ease;
    }

    .team-member:hover {
      transform: translateY(-5px);
    }

    .team-member img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .team-member h3 {
      margin: 10px 0 5px;
      color: #1565c0;
    }

    .team-member p {
      font-size: 0.95rem;
      color: #555;
    }

    /* Contact Section */
    #contact {
      height: 100vh;
      background: #e8f5e9;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 40px;
    }

    #contact h2 {
      color: #2e7d32;
      margin-bottom: 20px;
    }

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
      .team-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 600px) {
      .team-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <header>
    <img src="logo.png" alt="Carbon Tracker Logo">
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

  <!-- Home Section -->
  <section id="home">
    <div class="overlay-box">
      <h1>🌍 Carbon Footprint Tracker</h1>
      <p>Track and reduce your daily carbon emissions using simple lifestyle questions.</p>
      <a href="login.php"><button>Login / Signup to Start Tracking</button></a>
    </div>
  </section>

  <!-- About Us Section -->
  <section id="about">
    <h2>Meet Our Team</h2>
    <div class="team-grid">
      <div class="team-member">
        <img src="member1.jpg" alt="Team Member 1">
        <h3>Rupali</h3>
        <p>Project Lead — Passionate about sustainability and driving innovation in eco‑tech.</p>
      </div>
      <div class="team-member">
        <img src="member2.jpg" alt="Team Member 2">
        <h3>Member 2</h3>
        <p>Developer — Expert in Python and AI, building smart tracking algorithms.</p>
      </div>
      <div class="team-member">
        <img src="member3.jpg" alt="Team Member 3">
        <h3>Member 3</h3>
        <p>Designer — Focused on creating user‑friendly and visually appealing interfaces.</p>
      </div>
      <div class="team-member">
        <img src="member4.jpg" alt="Team Member 4">
        <h3>Member 4</h3>
        <p>Research Analyst — Provides insights on carbon data and eco‑friendly practices.</p>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <h2>Contact Us</h2>
    <form action="submit_contact.php" method="POST" style="max-width:600px; width:100%; text-align:left;">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name" required 
             style="width:100%; padding:10px; margin:10px 0; border-radius:6px; border:1px solid #ccc;"><br>

      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required 
             style="width:100%; padding:10px; margin:10px 0; border-radius:6px; border:1px solid #ccc;"><br>

      <label for="phone">Phone:</label><br>
      <input type="tel" id="phone" name="phone" 
             style