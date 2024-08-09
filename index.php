<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>


  <link rel="stylesheet" href="../final_project/css/dashboard.css">
  <link rel="stylesheet" href="../final_project/css/landinpage.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>body {
    font-family: 'Playfair Display', serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    position: relative;
  }
  
  .top-left-buttons {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 1;
  }
  
  .top-left-buttons button {
    padding: 10px 20px;
    background-color: #A44C4C;
    color: white;
    border: none;
    cursor: pointer;
    margin-right: 10px;
  }
  
  .top-left-buttons button:hover {
    background-color: #45a049;
  }
  
  header {
    background-color: #A44C4C;
    color: white;
    padding: 40px 20px; 
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
  }
  
  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  nav ul li {
    display: inline;
    margin-right: 20px;
  }
  
  nav ul li a {
    color: white;
    text-decoration: none;
  }
  .hero {
    position: relative;
    text-align: center;
    padding: 650px 0; 
    background-image: url("../AJMS/images/Ashesi.jpg"); 
    background-size: cover;
    background-position: center;
    height:50%
  }
   
  .hero::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(78, 78, 78, 0.5); 
    z-index: 1; 
  }
  
  .hero-content {
    
    position: relative;
    z-index: 2; 
  }
  
  .hero h1 {
    margin-top: 40px !important; 
    margin: 0;
    margin-bottom: 20px;
    font-size: 3em;
    color: white; 
}



  .hero p {
    font-size: 1.2em;
    margin-bottom: 40px;
    color: white;
  }
  
  .hero button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
  }
  
  .hero button:hover {
    background-color: #45a049;
  }
  
  section {
    padding: 50px 0;
    text-align: center;
  }
  
  section h2 {
    margin-bottom: 30px;
  }
  
  footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
  }
  
  footer ul {
    list-style: none;
    padding: 0;
    margin-bottom: 20px;
  }
  
  footer ul li {
    display: inline;
    margin-right: 20px;
  }
  
  .social-media a {
    color: #fff;
    margin-left: 10px;
    font-size: 1.5em;
  }
  </style>
</head>

<body>

<div class="top-left-buttons">
  <nav>
    <ul>
      <li onclick="window.location.href='../AJMS/login/login.php'">AJMS</li>
      
    </ul>
  </nav>

<header>
<div class="logo">
  
  </div>
  <nav>
    <ul>
      <li><a onclick="window.location.href='../AJMS/login/login.php'">About</a></li>
      <li><a onclick="window.location.href='../AJMS/login/register_view.php'">Services</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>
</header>

<section class="hero">
  <div class="hero-content">
    <h1>Welcome to AJMS</h1>
    <h2>Streamlining Judicial Management for Efficiency</h2>
  </div>
</section>

<section id="about">
  <h2>About Us</h2>
  <p>Welcome to AJMS, the Ashesi Judicial Management System designed to enhance judicial processes and improve efficiency.</p>
  <br>
  <p>At AJMS, we recognize the importance of effective judicial management in ensuring justice and maintaining order.</p>
  <br>
  <p>Whether you need to manage cases, track proceedings, or access judicial records,</p>
  <p> our platform offers the tools and resources you need to handle these tasks effectively.</p>
  <br>
  <p>With a user-friendly interface and robust features, AJMS empowers you to:</p>
  <ul>
    <li>Efficiently manage judicial cases</li>
    <li>Track legal proceedings with precision</li>
    <li>Access and organize judicial records seamlessly</li>
  </ul>
  <br>
  <p>Join the AJMS community today and transform your approach to judicial management.</p>
  <br>
  <p>Let's make judicial processes more streamlined, accurate, and efficient than ever before!</p>
</section>

<section id="services">
  <h2>AJMS Features</h2>
  
  <ul>
    <li><strong>Case Management:</strong> 
     Efficiently manage and track judicial cases from initiation to resolution, ensuring all proceedings are properly documented.</li>
    <br>
    <li><strong>Record Tracking:</strong> Access and organize judicial records and case files easily, providing quick and accurate retrieval of information.</li>
    <br>
    <li><strong>Progress Monitoring:</strong> Monitor the progress of cases and legal processes, with tools to set and track milestones and deadlines.</li>
    <br>
    <li><strong>Reporting:</strong> Generate comprehensive reports on case statuses, court proceedings, and judicial metrics to support informed decision-making.</li>
  </ul>
</section>

   
  </ul>

</section>

<section id="contact">
  <h2>Contact Us</h2>
  <p>Feel free to reach out to us with any questions or inquiries.</p>
  <p><i class="material-icons">phone</i> +233-20-911-6445</p>

</section>

<footer>
  <ul>
    <li><a href="#">Privacy Policy</a></li>
    <li><a href="#">Terms of Service</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>
  <div class="social-media">
    <a href="#"><i class="fab fa-facebook"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
  </div>
</footer>

</body>
</html>