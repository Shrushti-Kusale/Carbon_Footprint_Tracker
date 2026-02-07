<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carbon Footprint Tracker</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
    scroll-behavior: smooth;
    color: #1a1a1a;
    line-height: 1.6;
}

/* ---------- Navbar ---------- */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 60px;
    background: linear-gradient(135deg, rgba(34, 139, 34, 0.95), rgba(46, 125, 50, 0.95));
    color: #fff;
    position: fixed;
    top: 0;
    width: 100%;
    height: 80px;
    z-index: 1000;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 30px rgba(34, 139, 34, 0.3);
}

.logo-container {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo-container img {
    height: 50px;
    filter: brightness(1.1);
}

.logo-text {
    font-size: 1.3rem;
    font-weight: 700;
    letter-spacing: -0.5px;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 45px;
    margin: 0;
    padding: 0;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    letter-spacing: 0.3px;
    transition: all 0.3s ease;
    padding: 8px 0;
    position: relative;
}

nav ul li a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: #a7f3d0;
    transition: width 0.3s ease;
}

nav ul li a:hover::after,
nav ul li a.active::after {
    width: 100%;
}

nav ul li a:hover {
    color: #a7f3d0;
}

/* ---------- Hero Section ---------- */
#home {
    height: 100vh;
    background: url('1bg.jpeg') center/cover no-repeat; /* Removed green gradient */
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    overflow: hidden;
}

#home::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    /* Removed green overlay gradient */
    background: rgba(0, 0, 0, 0.25); /* Optional: subtle dark overlay for readability */
    z-index: 1;
}
.overlay-box {
    position: relative;
    z-index: 2;
    background: rgba(56, 142, 60, 0.55);
    padding: 60px 70px;
    border-radius: 24px;
    box-shadow: 0 20px 60px rgba(27, 94, 32, 0.4);
    max-width: 800px;
    animation: fadeInUp 1s ease-out;
    backdrop-filter: blur(20px);
    border: 2px solid rgba(129, 199, 132, 0.4);
}

.overlay-box h1 {
    font-size: 3.5rem;
    background: linear-gradient(135deg, #a7f3d0, #fbbf24);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 20px;
    font-weight: 800;
    line-height: 1.2;
    filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.2));
}

.overlay-box p {
    font-size: 1.3rem;
    margin-bottom: 40px;
    color: #f0fdf4;
    font-weight: 400;
}

.cta-button {
    background: linear-gradient(135deg, #10b981, #0ea5e9);
    color: #fff;
    border: none;
    padding: 18px 45px;
    font-size: 1.15rem;
    border-radius: 12px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
    text-decoration: none;
    display: inline-block;
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(16, 185, 129, 0.5);
    background: linear-gradient(135deg, #059669, #0284c7);
}

/* ---------- About Section ---------- */
#about {
    min-height: 100vh;
    background: linear-gradient(180deg, #f0fdf4 0%, #dcfce7 50%, #d1fae5 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 100px 40px;
    text-align: center;
}

#about h2 {
    font-size: 3rem;
    background: linear-gradient(135deg, #059669, #0891b2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 20px;
    font-weight: 800;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #6b7280;
    margin-bottom: 60px;
    max-width: 600px;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    max-width: 1200px;
    width: 100%;
}

.team-member {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(5, 150, 105, 0.15);
    padding: 30px;
    transition: all 0.4s ease;
    border: 2px solid rgba(129, 199, 132, 0.3);
    backdrop-filter: blur(10px);
}

.team-member:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(16, 185, 129, 0.25);
    border-color: rgba(16, 185, 129, 0.5);
}

.team-member img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 15px;
    margin-bottom: 20px;
    transition: transform 0.3s ease;
}

.team-member:hover img {
    transform: scale(1.05);
}

.team-member h3 {
    margin: 15px 0 8px;
    color: #047857;
    font-size: 1.3rem;
    font-weight: 700;
}

.team-member p {
    font-size: 1rem;
    color: #6b7280;
    line-height: 1.6;
}

/* ---------- Contact Section ---------- */
#contact {
    min-height: 100vh;
    background: linear-gradient(135deg, rgba(167, 243, 208, 0.4), rgba(186, 230, 253, 0.4)),
                url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=2013') center/cover no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 100px 40px;
    position: relative;
}

#contact::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(52, 211, 153, 0.4), rgba(56, 189, 248, 0.3));
    z-index: 0;
}

#contact > * {
    position: relative;
    z-index: 1;
}

#contact h2 {
    font-size: 3rem;
    background: linear-gradient(135deg, #10b981, #fbbf24);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 20px;
    font-weight: 800;
    filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.15));
}

.contact-subtitle {
    font-size: 1.2rem;
    color: #1f2937;
    margin-bottom: 50px;
    font-weight: 500;
}

.contact-form {
    max-width: 650px;
    width: 100%;
    background: rgba(167, 243, 208, 0.55);
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(5, 150, 105, 0.3);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(129, 199, 132, 0.4);
}

.form-group {
    margin-bottom: 25px;
}

.contact-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #1f2937;
    font-size: 0.95rem;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 14px 18px;
    border-radius: 10px;
    border: 2px solid rgba(52, 211, 153, 0.4);
    font-size: 1rem;
    transition: all 0.3s ease;
    font-family: inherit;
    background: rgba(255, 255, 255, 0.85);
    color: #1f2937;
}

.contact-form input::placeholder,
.contact-form textarea::placeholder {
    color: rgba(75, 85, 99, 0.6);
}

.contact-form input:focus,
.contact-form textarea:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    background: rgba(255, 255, 255, 0.95);
}

.contact-form textarea {
    resize: vertical;
    min-height: 120px;
}

.submit-button {
    background: linear-gradient(135deg, #10b981, #14b8a6);
    color: #fff;
    border: none;
    padding: 16px 40px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    font-size: 1.1rem;
    width: 100%;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
}

.submit-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
    background: linear-gradient(135deg, #059669, #0d9488);
}

/* ---------- Footer ---------- */
footer {
    text-align: center;
    padding: 40px 20px;
    background: linear-gradient(135deg, #047857, #0891b2);
    color: #fff;
    font-size: 1rem;
}

footer p {
    margin: 0;
    opacity: 0.9;
}

/* ---------- Animations ---------- */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
    .team-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    header {
        padding: 0 40px;
    }
    
    nav ul {
        gap: 30px;
    }
}

@media (max-width: 768px) {
    header {
        padding: 0 20px;
        height: 70px;
    }
    
    .logo-text {
        font-size: 1.1rem;
    }
    
    nav ul {
        gap: 20px;
    }
    
    nav ul li a {
        font-size: 0.9rem;
    }
    
    .overlay-box {
        padding: 40px 30px;
    }
    
    .overlay-box h1 {
        font-size: 2.5rem;
    }
    
    .overlay-box p {
        font-size: 1.1rem;
    }
    
    #about h2,
    #contact h2 {
        font-size: 2.3rem;
    }
    
    .team-grid {
        grid-template-columns: 1fr;
    }
    
    .contact-form {
        padding: 35px;
    }
}

@media (max-width: 600px) {
    nav ul {
        gap: 15px;
    }
    
    nav ul li a {
        font-size: 0.85rem;
    }
    
    .overlay-box h1 {
        font-size: 2rem;
    }
    
    .overlay-box p {
        font-size: 1rem;
    }
    
    .cta-button {
        padding: 14px 30px;
        font-size: 1rem;
    }
}
</style>
</head>

<body>

<header>
    <div class="logo-container">
        <img src="logo.png" alt="Carbon Tracker Logo">
        <span class="logo-text">Carbon Footprint Tracker</span>
    </div>
    
    <nav>
        <ul>
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
    </nav>
</header>

<!-- Home -->
<section id="home">
    <div class="overlay-box">
        <h1>EcoTrace</h1>
        <p>
            What you can see, You can still change!
        </p>
        <a href="login.php" class="cta-button">Get Started Today</a>
    </div>
</section>

<!-- About -->
<section id="about">
    <h2>Meet Our Team</h2>
    <p class="section-subtitle">
        Dedicated professionals passionate about creating a sustainable future
    </p>
    
    <div class="team-grid">
        <div class="team-member">
            <img src="member1.jpg" alt="Rupali">
            <h3>Rupali</h3>
            <p>Passionate developer focused on building practical solutions through code.</p>
        </div>
        
        <div class="team-member">
            <img src="member2.jpg" alt="Shrushti">
            <h3>Shrushti</h3>
            <p>Aspiring developer passionate about technology and innovation.</p>
        </div>
        
        <div class="team-member">
            <img src="member3.jpg" alt="Harshad">
            <h3>Harshad</h3>
            <p>Developer committed to creating efficient and innovative solutions.</p>
        </div>
        
        <div class="team-member">
            <img src="member4.jpg" alt="Gauravi">
            <h3>Gauravi</h3>
            <p>Driven developer focused on delivering impactful solutions.</p>
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact">
    <h2>Contact Us</h2>
    <p class="contact-subtitle">We'd love to hear from you. Send us a message!</p>
    
    <form action="submit_contact.php" method="POST" class="contact-form">
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">
        </div>
        
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required placeholder="your.email@example.com">
        </div>
        
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="Enter your city">
        </div>
        
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="tel" id="phone" name="phone" placeholder="+1 (555) 000-0000">
        </div>
        
        <div class="form-group">
            <label for="need">How can we help?</label>
            <input type="text" id="need" name="need" placeholder="Brief description of your inquiry">
        </div>
        
        <div class="form-group">
            <label for="other">Additional Information</label>
            <textarea id="other" name="other" rows="4" placeholder="Any additional details you'd like to share..."></textarea>
        </div>
        
        <button type="submit" class="submit-button">Send Message</button>
    </form>
</section>

<footer>
    <p>Â© 2024 Carbon Footprint Tracker. All rights reserved. Building a sustainable future together.</p>
</footer>

</body>
</html>