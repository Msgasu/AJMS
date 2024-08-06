<!DOCTYPE html>
<html lang="en">

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

        .sidebar {
            position: fixed;
            top: 55px;
            bottom: 0;
            left: 20px;
            z-index: 100;
            padding: 0;
            width: 220px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            height: calc(90vh - 30px);
            background-color: white;
            border-radius: 15px;
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
            margin-left: 255px;
            margin-right: 280px;
            padding: 20px 0;
            height: calc(89.2vh - 25px);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .notifications {
            position: fixed;
            top: 55px;
            bottom: 0;
            right: 20px;
            z-index: 100;
            padding: 10px;
            width: 250px;
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

        .report-form {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .report-form textarea {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .report-form .submit-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
        }

        .report-form .note {
            color: red;
            margin-top: 10px;
            font-weight: bold;
        }

        .rights-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .rights-card h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .rights-card p {
            margin-bottom: 0;
        }

        .view-handbook {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="left">
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
    <div class="card sidebar">
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
                        <i class="fas fa-file-alt"> </i>
                        
                        <span> Case statements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-lightbulb"></i>
                        <span> Recommender</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span> Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content in a Card -->
    <main role="main" class="content">
        <div class="report-form">
            <h2>DO YOU HAVE ANY COMPLAINTS OR CASES TO REPORT?</h2>
            <p>Type out your report or complaint in the text box below. You can also add images and audio.</p>
            <textarea placeholder="Type your complaint or report here..."></textarea>
            <button class="submit-button mt-3">Submit</button>
            <p class="note">Please Note: The reports will only be seen by authorized personnel.</p>
        </div>

        <div class="rights-card mt-5">
            <h5>Know Your Rights</h5>
            <p>You have the right to file a complaint without fear of retaliation.</p>
            <a href="#" class="view-handbook mt-3">View Handbook</a>
        </div>
    </main>

    <!-- Notifications in a Card -->
    <div class="card notifications">
        <h2>Notifications</h2>
        <div class="scrollable-notifications">
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Case Update</strong>
                    <span>Your recent case has been updated. Click to view more.</span>
                    <i class="fas fa-eye"></i>
                </li>
                <li class="list-group-item">
                    <strong>Meeting Reminder</strong>
                    <span>Remember to attend the meeting on Monday at 10 AM.</span>
                    <i class="fas fa-calendar-alt"></i>
                </li>
                <li class="list-group-item">
                    <strong>New Recommendation</strong>
                    <span>You have a new recommendation. Click to view details.</span>
                    <i class="fas fa-lightbulb"></i>
                </li>
                <li class="list-group-item">
                    <strong>System Maintenance</strong>
                    <span>The system will be down for maintenance on Friday at 8 PM.</span>
                    <i class="fas fa-tools"></i>
                </li>
                <li class="list-group-item">
                    <strong>New Message</strong>
                    <span>You have received a new message from admin.</span>
                    <i class="fas fa-envelope"></i>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>

