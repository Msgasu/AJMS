<!DOCTYPE html>
<html lang="en">
<?php include "../functions/get_username_fxn.php";
include "../action/recommender.php";

// Retrieve the suggested verdict from the session
$suggestedVerdict = isset($_SESSION['suggestedVerdict']) ? $_SESSION['suggestedVerdict'] : '';

// Clear the suggested verdict from the session after displaying it
unset($_SESSION['suggestedVerdict']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS Recommender System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html, body {
            font-size: .875rem;
            background-color: #A44C4C;
            overflow:hidden; /* Prevent general scrollbar */
            height: 100%;
            margin: 0;
            padding: 0;
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

        .header .user-info .line {
            height: 40px;
            border-left: 1px solid grey;
            margin: 0 15px;
        }

        .header .user-info span {
            font-weight: bold;
            color: grey;
            margin: 0 10px;
        }

        .header .user-info img {
            border-radius: 30%;
            height: 40px;
            width: 80px;
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
            height: calc(100vh - 70px); /* Adjusted height to match full viewport */
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
            margin-top: 10px;
            margin-left: 10px; /* Reduced margin */
            margin-right: 10px; /* Reduced margin */
            padding: 20px 0;
            height: calc(100vh - 70px); /* Adjusted height to fill viewport */
            display: flex;
            justify-content: center;
            align-items: stretch; /* Ensure children fill available height */
            gap: 10px; /* Reduced gap between boxes */
        }

        .report-form {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            width: 95%; /* Increased width to fill page nicely */
            height: 102%; /* Fill available height */
            display: flex;
            flex-direction: column;
           
            position: relative;
            box-sizing: border-box;
            padding-bottom: 10px; /* Added padding to make room for bottom elements */
            overflow-y:auto;
        }

        .report-form .back-button {
            align-self: flex-start;
            color: #D00C0C;
            margin-bottom: 5px; /* Reduced margin */
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
        }

        .report-form .note {
            color: red; /* Changed color to red */
            margin-top: 5px; /* Reduced margin */
            text-align: center;
            font-size: 16px;
        }

        .report-form .note span {
            color: black; /* Changed color to black for the specified part */
            font-style: italic; /* Italicized the text */
        }

      

        .report-form textarea {
            width: 200%;
            height: 200px; /* Adjusted height */
            border-radius: 10px;
            background-color: lightgrey;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            resize: none; /* Prevent resizing */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        .report-form .submit-button {
            background-color: #28a745;
            color: white;
            font-size: medium;
            width: 40%; /* Made slightly smaller */
            border: none;
            padding: 8px; /* Adjusted padding for smaller size */
            margin: 10px auto 0 auto; /* Reduced margin */
            border-radius: 10px;
            cursor: pointer;
            display: block; /* Ensure the button is a block element for centering */
        }

       

        .suggested-verdict {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            width: 95%; /* Increased width to fill page nicely */
            height: 102%; /* Fill available height */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            font-size: 1.5rem;
            position:relative;
            box-sizing: border-box;
            overflow-y:auto;
        }
        
        .textarea-wrapper {
            position: relative;
            width: 100%;
        }

        .textarea-wrapper .icon-container {
            position: absolute;
            bottom: 10px; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
            display: flex;
            gap: 10px; /* Space between icons */
        }

        .textarea-wrapper .attach-label {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.5rem;
            color: #007bff; /* Icon color */
            padding: 10px;
            border-radius: 5px;
        }

        .textarea-wrapper .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .textarea-wrapper .icon-url {
            color: #333;
            font-size: 1.7rem; /* Adjust size as needed */
            cursor: pointer;
        }

        .textarea-wrapper .icon-url:hover {
            color: #007bff; /* Change color on hover */
        }

        .textarea-wrapper .image-preview-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .textarea-wrapper .image-preview-container img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .textarea-wrapper .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            display: none; /* Initially hidden */
        }

        .textarea-wrapper .delete-button:hover {
            background-color: #c82333; /* Darker red on hover */
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
            <!-- <img src="../images/ashesi_logo.jpeg" alt="User Profile Image"> -->
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="admin_dashboard.php">
                        <i class="fas fa-home"></i>
                        <span> Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#v">
                        <i class="fas fa-file-alt"></i>
                        <span> Case Statements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recommender_system.php">
                        <i class="fas fa-lightbulb"></i>
                        <span> Recommender</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="report-form">
            <a href="#" class="back-button">&larr; back</a>
            <div class="note">
                <strong><i>Note :This is only a recommendation system that gives verdicts based on similar cases and sanctions from the handbook. Please do well to investigate further before handing out the verdict.</strong></i><br><br>
                <span>
                    <i>Type out statements below</i><br>
                    or attach a copy of statement
                </span>
            </div>
            <form method="post" action="../action/recommender.php">
                <div class="textarea-wrapper">
                    <textarea name="report" placeholder="Type your complaint or report here..." required></textarea>
                </div>
                <button class="submit-button" type="submit" name="submit">Submit</button>
            </form>
            
        </div>
        <div class="suggested-verdict">
            <h2>Suggested Verdict</h2>
            <div id="verdict-output">
                <?php
                 if (isset($suggestedVerdict)) {
                    echo $suggestedVerdict;
                } else {
                    echo "<p>No suggested verdict available.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

        // JavaScript to handle file upload preview and delete functionality
        const fileInput = document.getElementById('file-upload');
        const imagePreviewContainer = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const deleteFileButton = document.getElementById('delete-file');

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    previewImg.src = reader.result;
                    imagePreviewContainer.style.display = 'flex'; // Show preview
                    deleteFileButton.style.display = 'block'; // Show delete button
                };
                reader.readAsDataURL(file);
            }
        });

        deleteFileButton.addEventListener('click', () => {
            previewImg.src = '';
            imagePreviewContainer.style.display = 'none'; // Hide preview
            deleteFileButton.style.display = 'none'; // Hide delete button
            fileInput.value = ''; // Clear file input
        });
    </script>
</body>
</html>
