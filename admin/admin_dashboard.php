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

        .card-header.bg-indigo-red {
            background: linear-gradient(to right, indigo, red);
            color: white;
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

        .scrollable-card {
            height: 500px; /* Adjust as needed */
            overflow-y: auto;
        }

        .scrollable-notifications {
            height: calc(100vh - 90px);
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="left">
            <img src="https://example.com/logo.png" alt="Ashesi University Logo">
            <span class="title">AJMS Dashboard</span>
        </div>
        <div class="user-info">
            <img src="https://example.com/user.png" alt="User Profile Image">
            <span class="line"></span>
            <span>Welcome, User</span>
        </div>
    </div>

    <nav class="sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-tasks"></i>
                        <span>Tasks</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <!-- Main content goes here -->
        <div class="card card-custom">
            <div class="card-body">
                <h2>Dashboard Content</h2>
                <p>Your main content goes here...</p>
            </div>
        </div>
    </div>

    <div class="card notifications card-special">
        <div class="card-body scrollable-notifications">
            <h2>Notifications</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Today</strong>
                    <span><i class="fas fa-user-friends"></i> Meetings with involved parties</span><br>
                    <span><i class="fas fa-calendar-alt"></i> Committee Meeting</span><br>
                    <span><i class="fas fa-clock"></i> Deliberation meeting</span>
                </li>
                <li class="list-group-item">
                    <strong>Yesterday</strong>
                    <span><i class="fas fa-upload"></i> Submitted Case to Dean</span><br>
                    <span>BSIT 1A<br>Student ID 1235124614</span>
                </li>
                <li class="list-group-item">
                    <strong>December 22, 2024</strong>
                    <span><i class="fas fa-gavel"></i> Case Verdict</span><br>
                    <span>BSIT 1A<br>Student ID 1235124614</span><br>
                    <span><i class="fas fa-envelope"></i> Sending out email</span><br>
                    <span>BSIT 1A<br>Student ID 1235124614</span>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>

