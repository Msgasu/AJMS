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
            font-size: 1.1rem;
        }

        .sidebar .nav-link:hover {
            color: #007bff;
        }

        .sidebar .nav-link.active {
            color: #007bff; 
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .content {
            margin-top: 110px;
            margin-left: 260px;
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
            padding: 10px 0;
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

        .notification-item {
            display: flex;
            align-items: center;
            padding: 5px 0;
        }

        .notification-item i {
            margin-right: 10px;
            color: #007bff;
        }

        .notification-item span {
            font-size: 0.9rem;
            color: #333;
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
    <div class="card sidebar card-special">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i>
                        <span>Meeting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-alt"></i>
                        <span>Case stmt</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-lightbulb"></i>
                        <span>Recommender</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
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
        <div class="card-body equal-space scrollable-card">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Submitted Cases</h1>
            </div>

            <!-- Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="card-header bg-indigo-red">
                            URGENT
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Meeting with Victim</h5>
                            <p class="card-text">Case of Theft</p>
                            <p class="card-text">Submitted: 2023-12-05</p>
                            <p class="card-text">Victim: John Smith</p>
                            <button type="button" class="btn btn-success">Book meeting</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="card-header bg-indigo-red">
                            REVIEWED
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Cheating Case</h5>
                            <p class="card-text">Case: Exam Fudging</p>
                            <p class="card-text">Submitted: 2023-11-30</p>
                            <p class="card-text">Accused: Jane Doe</p>
                            <button type="button" class="btn btn-warning">Send Verdict</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="card-header bg-indigo-red">
                            PENDING
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Assignment Plagiarism</h5>
                            <p class="card-text">Case: Homework Duplication</p>
                            <p class="card-text">Submitted: 2023-11-25</p>
                            <p class="card-text">Accused: Bob Johnson</p>
                            <button type="button" class="btn btn-primary">Review Case</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Notifications Sidebar -->
    <div class="card notifications card-special">
        <div class="sidebar-sticky scrollable-notifications">
            <h2>Notifications</h2>
            <ul class="list-group">
                <li class="list-group-item notification-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>Meetings with involved parties</span>
                </li>
                <li class="list-group-item notification-item">
                    <i class="fas fa-users"></i>
                    <span>Committee Meeting</span>
                </li>
                <li class="list-group-item notification-item">
                    <i class="fas fa-gavel"></i>
                    <span>Deliberation meeting</span>
                </li>
                <li class="list-group-item notification-item">
                    <i class="fas fa-file-upload"></i>
                    <span>Submitted Case to Dean<br><small>BSIT 1A<br>Student ID 1235124514</small></span>
                </li>
                <li class="list-group-item notification-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Case Verdict<br><small>BSIT 1A<br>Student ID 1235124514</small></span>
                </li>
                <li class="list-group-item notification-item">
                    <i class="fas fa-envelope"></i>
                    <span>Sending out email<br><small>BSIT 1A<br>Student ID 1235124514</small></span>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>


