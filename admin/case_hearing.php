<!DOCTYPE html>
<html lang="en">
<?php include '../settings/core.php'?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html, body {
            font-size: .875rem;
            background-color: #A44C4C;
            overflow: hidden; /* Prevent general scrollbar */
            height: 100%;
        }

        .header {
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
            border-bottom: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }

        .header img {
            height: 70px;
            width: 90px;
            margin: 0;
        }

        .header .left {
            display: flex;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .header .title {
            font-size: 24px;
            font-weight: bold;
            color: #D00C0C;
            margin-left: 10px;
        }

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info img {
            margin-right: 10px;
            border-radius: 30%;
            height: 40px;
            width: 80px;
            padding: 0;
        }

        .header .user-info .line {
            height: 40px;
            border-left: 1px solid grey;
            margin: 0 15px;
        }

        .header .user-info span {
            font-weight: bold;
            color: grey;
            margin-right: 10px;
        }
        .menu-icon {
            font-size: 24px;
            cursor: pointer;
            
            margin-left: 10px;
        }
        

        .sidebar {
            position: fixed;
            top: 72px;
            bottom: 0;
            left: -220px; /* Initially hidden */
            z-index: 100;
            padding: 0;
            width: 220px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            height: calc(90vh - 30px);
            background-color: white;
            border-radius: 15px;
            transition: left 0.3s ease;
        }

        .sidebar.open {
            left: 15px; /* Show sidebar */
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: 100%;
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 10px;
            margin: 5px 10px;
        }

        .sidebar .nav-link:hover {
            color: #007bff;
            background-color: #f8f9fa;
        }

        .sidebar .nav-link.active {
            color: #007bff;
            background-color: #e9ecef;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .sidebar .nav-link span {
            font-size: 1.1rem; /* Increase font size */
        }
        
    

        .content {
            margin-top: 110px;
            margin-left: 20px;
            margin-right: 300px;
            padding: 20px 0;
            height: calc(89.2vh - 25px);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .notifications {
            position: fixed;
            top: 55px;
            bottom: 0;
            right: 20px;
            z-index: 100;
            padding: 10px;
            width: 260px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            height: calc(90vh - 30px);
        }

        
        .notifications h2 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .notifications .list-group-item {
           border: none;
           padding: 0.5rem 0;
        }

        .notifications .list-group-item strong {
           display: block;
           margin-bottom: 0.5rem;
        }

        .notifications .list-group-item span {
           display: block;
           font-size: 0.875rem;
           margin-bottom: 0.5rem;
        }

        .notifications .list-group-item i {
            margin-right: 5px;
            color: #555;
        }

        .scrollable-notifications {
            height: calc(90vh - 110px); /* Adjusted height */
            overflow-y: auto;
        }
        .equal-space {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

      
        

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .card-special {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            margin-top: 30px;
        }

        

       
        .card-custom {
            height: 125px;
            border-radius: 15px;
            background-color: #f5f5f5; /* Greyish white background */
            padding: 40px;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px; /* Red line design */
            background-color: #A44C4C; /* Red color */
            border-radius: 15px 15px 0 0; /* Rounded corners for the line */
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
        }

        .card-custom p {
            margin: 0;
            font-weight: bold;
            font-size: 20px;
        }
        
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="left">
            <i class="fas fa-bars menu-icon" onclick="toggleSidebar()"></i>
            <img src="../images/ashesi_logo.jpeg" alt="Ashesi University Logo">
            <div class="title">
                <h1 style="font-weight: bolder">AJMS</h1>
            </div>
        </div>
        <div class="user-info">
            <div class="line"></div>
            <span>John Doe</span>
            <img src="../images/ashesi_logo.jpeg" alt="User Profile Image">
        </div>
    </div>

    <!-- Sidebar in a Card -->
    <div class="card sidebar" id="sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-home"></i>
                        <span> Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i>
                        <span> Meeting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-alt"></i>
                        <span> Case statements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-lightbulb"></i>
                        <span> Recommender</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- Main Content in a Card -->


    <main role="main" class="content card card-special">
        <div class="card-body equal-space scrollable-notifications">
            <a href="#" class="back-button">&larr; back</a>
            <h2>CASE: (NAME OF CASE FROM DB)</h2>
            <p style="font-weight: bolder"><em>Find below the statements of the involved parties.</em></p>
            <div class="container">
                <div class="card-container">
                    <div class="card-custom">
                        <p>View report of complainant</p>
                    </div>
                    <div class="card-custom">
                        <p>View report of accused party</p>
                    </div>
                    <div class="card-custom">
                        <p>View report of witness</p>
                    </div>
                </div>
            </div>  
                
           
         
        </div>
    </main>


    <div class="card notifications card-special">
        <div class="card-body scrollable-notifications">
            <h2>Know Your Rights👇🏽</h2>
            
                
                    
            <span style="font-size:16 px">
                "Know your rights... <br>
                <span style="color: red; font-weight: bold;">Ignorance isn't an excuse!</span><br>
                Ever found yourself thinking,<br>
                'But I didn't know it was against the rules'?<br>
                It's time to <span style="color: red; font-weight: bold;">take charge</span>.<br>
                Your student handbook holds the key to understanding what's expected of you and what's not.<br>
                Don't wait until you're caught off guard—view your handbook now and empower yourself with knowledge. <br>
                It's your guide to making informed choices and staying on the right side of the rules"<br>
            </span>
            <a href="https://www.ashesi.edu.gh/wp-content/uploads/2010/11/Ashesi_StudentHandbook_2019-2020-compressed.pdf" class="submit-button-wrapper">
                <button class="submit-button mt-3">View Handbook</button>
            </a>
                
            
               
              
          
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle file input click
        document.querySelector('.attach-label').addEventListener('click', function () {
            document.getElementById('file-upload').click();
        });

        // Handle file selection and image preview
        document.getElementById('file-upload').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const previewImg = document.getElementById('preview-img');
                    previewImg.src = e.target.result;
                    document.getElementById('image-preview').style.display = 'flex';
                    document.getElementById('delete-file').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle image deletion
        document.getElementById('delete-file').addEventListener('click', function () {
            document.getElementById('file-upload').value = ''; // Clear the file input
            document.getElementById('preview-img').src = ''; // Clear the image source
            document.getElementById('image-preview').style.display = 'none'; // Hide the image preview
            this.style.display = 'none'; // Hide the delete button
        });

        // Function to toggle the sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    });
</script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- <script src="../js/case_submission.js" ></script> -->
</body>

</html>
