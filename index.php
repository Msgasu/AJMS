<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        html, body {
            font-size: .875rem;
            background-color: #A44C4C;
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
            background-color: #A44C4C;
        }

        .modal-content {
            border-radius: 15px;
            margin: auto;
            padding: 20px;
            height: 100%;
        }
        
        .modal-header {
            border-bottom: none;
            text-align: center;
            width: 100%;
            padding-bottom: 0;
        }

        .modal-title {
            font-size: 1.9rem;
            color: #333;
            
        }

        .modal-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10px;
        }

        .form-group {
            margin-bottom: 1rem;
            width: 100%;
        }

        .form-control {
            border-radius: 15px;
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
    background-color: #A44C4C;
    color: white;
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

<header>
<div class="top-left-buttons">
  <h2 onclick="window.location.href='../AJMS/login/register_view.php'">AJMS</h2>
  
</div>
<div class="logo">
  
  </div>
  <nav>
    <ul>
      <li><a onclick="window.location.href='../AJMS/login/login.php'">Login</a></li>
      <li><a onclick="window.location.href='../AJMS/login/register_view.php'">Sign Up</a></li>
      
    </ul>
  </nav>
</header>

<section class="hero">
  <div class="hero-content">
    <h1>Welcome to AJMS</h1>
    <h2 style="color: white; "><em>Streamlining Judicial Management for Efficiency</em></h2>
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



</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('welcomeForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        var role = document.getElementById('roleSelect').value;
        var studentId = document.getElementById('studentId').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../action/student_login_action.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Handle successful response
                console.log('Response:', xhr.responseText); 
                window.location.href = '../student/student_dashboard.php'; 
                $('#welcomeModal').modal('hide'); 
            } else {
                // Handle error response
                console.error('Error:', xhr.statusText); // Log error for debugging
                alert('An error occurred. Please try again.');
            }
        };

        // Send data in URL-encoded format
        var data = 'role=' + encodeURIComponent(role) + '&studentId=' + encodeURIComponent(studentId);
        xhr.send(data);
    });
});

</script>