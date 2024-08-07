<!DOCTYPE html>
<html lang="en">
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
            overflow: hidden; /* Prevent general scrollbar */
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
            margin-top: 70px;
            margin-left: 20px;
            margin-right: 20px;
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
            width: 48%; /* Made box longer */
            height: 102%; /* Fill available height */
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            box-sizing: border-box;
            padding-bottom: 10px; /* Added padding to make room for bottom elements */
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
        }

        .report-form .textarea-wrapper {
            position: relative;
            width: 100%;
            margin-top: 10px; /* Reduced margin */
        }

        .report-form textarea {
            width: 100%;
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

        .white-space {
            height: 100px; /* Adjusted to make the background show more */
            width: 100%;
            background-color: white;
            border-radius: 0 0 15px 15px;
        }

        .suggested-verdict {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            width: 48%; /* Made box longer */
            height: 102%; /* Fill available height */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            font-size: 1.5rem;
            position:relative;
            box-sizing: border-box;
        }
        
        .textarea-icons {
            position: absolute;
            bottom: 10px; /* Align icons at the bottom of the textarea */
            right: 10px; /* Align icons to the right of the textarea */
            display: flex;
            gap: 10px; /* Space between icons */
        }

        .textarea-icons i {
            font-size: 18px;
            cursor: pointer;
            color: #333;
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
            <img src="../images/ashesi_logo.jpeg" alt="User Profile Image">
            <div class="line"></div>
            <span>John Doe</span>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
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
                        <span> Case Statements</span>
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

    <!-- Content -->
    <div class="content">
        <div class="report-form">
            <a href="#" class="back-button">&larr; back</a>
            <div class="note">
                <strong>Note:</strong> This is only a recommendation system that gives verdicts based on similar cases and sanctions from the handbook. Please do well to investigate further before handing out the verdict.<br><br>
               <span>
                Type out statements below<br>
             or attach a copy of statement
                </span>
            </div>
            <div class="textarea-wrapper">
                <textarea name="report" placeholder="Type your complaint or report here..." required></textarea>
                <div class="textarea-icons">
                    <i class="fas fa-file-signature"></i> <!-- Updated icon to curly-like -->
                    <i class="fas fa-trash-alt"></i>
                </div>
            </div>
            <button class="submit-button">Submit</button>
            <div class="white-space"></div> <!-- For white space at the bottom -->
        </div>
        <div class="suggested-verdict">
            <h2>Suggested Verdict</h2>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>
</body>
</html>
