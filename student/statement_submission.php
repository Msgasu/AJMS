<!DOCTYPE html>
<html lang="en">
<?php include "../functions/get_username_fxn.php"; ?>
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

        .submit-button{
            background-color: #28a745;
            color: white;
            font-size: medium;
            width: 95%;
            border: none;
            padding: 5px 5px;
            margin-left: 10px;
            border-radius: 10px;
            cursor: pointer;
        }
        
        .report-form {
            background-color: transparent;
            border-radius: 15px;
            padding: 20px;
            
        }

        .report-form textarea {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            background-color: lightgrey;
            border: 1px solid #ccc;
            padding: 10px;
            
        }
        .textarea-wrapper {
            position: relative; /* Positioning context for child elements */
        }
        .report-form .submit-button {
            background-color: #28a745;
            color: white;
            font-size: medium;
            width: 30%;
            border: none;
            padding: 10px 20px;
            margin-left: 335px;
            border-radius: 10px;
            cursor: pointer;
        }
        .report-form .note {
            color: red;
            margin-top: 10px;
            margin-left: 150px;
            
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

        

        .list-group-item {
            border: none;
        }

        .list-group-item strong {
            display: block;
            margin-bottom: 5px;
        }

        .equal-space {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .icon-container {
            position: absolute;
            bottom: 10px; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
            display: flex;
            gap: 10px; /* Space between icons */
        }



        /* Style for the label to act as a button */
        .attach-label {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.5rem;
            color: #007bff; /* Icon color */
            padding: 10px;
            border-radius: 5px;
        }

        /* Hide the file input but make it accessible */
        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }


        .icon-delete, .icon-url {
           color: #333;
           font-size: 1.7rem; /* Adjust size as needed */
           cursor: pointer;
        }

        .icon-delete:hover, .icon-url:hover {
           color: #007bff; /* Change color on hover */
        }

     

        .image-preview-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .image-preview-container img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            display: none; /* Initially hidden */
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
            <span>
                <?php
                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];
                    $userName = getUserName($userId, $con);
                    $profilePicture = getProfilePicture($userId, $con);

                    echo '<div class="user-icon">';
                    if ($profilePicture) {
                        echo '<img src="../uploads/' . htmlspecialchars($profilePicture) . '" alt="User Profile Picture" style="border-radius: 50%; width: 50px; height: 50px;">';
                    } else {
                        echo '<i class="material-icons">account_circle</i>';
                    }
                    echo '</div>';

                    echo '<div class="user-name">' . htmlspecialchars($userName) . '</div>';
                } else {
                    echo "Error: User ID not set in session";
                }
                ?>
            </span>
            <img src="../images/ashesi_logo.jpeg" alt="User Profile Image">
        </div>
    </div>

    <!-- Getting particpnat role to hide some nav bar features -->
    <?php $participant_role = isset($_SESSION['participant_role']) ? $_SESSION['participant_role'] : '';
?>

<!-- Sidebar in a Card -->
<div class="card sidebar card-special">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
       
                <li class="nav-item">
                    <a class="nav-link active" href="student_dashboard.php">
                        <i class="fas fa-home"></i>
                        <span> Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="case_submission.php">
                        <i class="fas fa-users"></i>
                        <span> Submit Case</span>
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="statement_submission.php">
                    <i class="fas fa-file-alt"></i>
                    <span> Submit Statements</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile_page_students.php">
                    <i class="fas fa-user"></i>
                    <span> Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../login/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span> Logout</span>
                </a>
            </li>
               
          
        </ul>
    </div>
</div>
<br>
    
    
    <!-- Main Content in a Card -->


    <main role="main" class="content card card-special">
        <div class="card-body equal-space scrollable-notifications">
            <form class="report-form" method="post" action="../action/statement_submission_action.php" enctype="multipart/form-data">
                <h2>DO YOU HAVE ANY STATEMENTS TO SUBMIT?</h2>
                <p style="font-weight: bolder"><em>Type out your statement in the text box below. You can also add images and audio.</em></p>
                    
                <div class="textarea-wrapper">
            <textarea name="report" placeholder="Type your statement here..." required></textarea>
            <div class="icon-container">
                <label for="file-upload" class="attach-label"><i class="fas fa-link icon-url"></i>
</label>
                <input type="file" id="file-upload" class="file-input" name="document">
            </div>
            <div class="image-preview-container" id="image-preview" style="display: none;">
                <img id="preview-img" src="" alt="Image Preview">
                <button type="button" class="delete-button" id="delete-file">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>

                <h5 style="font-weight: bolder" class="note">NOTE: YOU WILL BE HELD ACCOUNTABLE FOR ANYTHING YOU SUBMIT HERE</h5>
                <button type="submit" name="submit" class="submit-button mt-3">Submit</button>
            </form>
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
                $('.sidebar').toggleClass('open');
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
