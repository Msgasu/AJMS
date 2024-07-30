<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-size: .875rem;
            background-color: indianred;
        }

        .header {
            background-color: #f8f9fa;
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
            height: 75px;
            width: 110px;
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
            color: #dc3545;
            margin-left: 10px;
        }

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info img {
            border-radius: 0%;
            height: 40px;
            margin-left: 10px;
            padding: 0;
        }
        .header .user-info .line {
            height: 60px;
            border-left: 1px solid white;
            margin: 0 10px;
        }

        .sidebar {
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 20px;
            z-index: 100;
            padding: 0;
            width: 220px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            height: calc(100vh - 80px);
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
            margin-top: 70px;
            margin-left: 260px;
            margin-right: 280px;
            padding: 20px;
            height: calc(100vh - 80px);
            overflow-y: auto;
        }

        .notifications {
            position: fixed;
            top: 70px;
            right: 20px;
            width: 250px;
            padding: 10px;
            background-color: #f8f9fa;
            box-shadow: inset 1px 0 0 rgba(0, 0, 0, .1);
            height: calc(100vh - 80px);
            overflow-y: auto;
        }

        .notifications h2 {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="left">
            <img src="../images/ashesi_logo.jpeg" alt="Ashesi University Logo">
            <div class="title">AJMS</div>
        </div>
        <div class="user-info">
            <div class="line"></div>
            <span>John Doe</span>
            <img src="../images/user_profile_img" alt="User Profile Image">
        </div>
    </div>




   
    <!-- Sidebar in a Card -->
    <div class="card sidebar card-custom">
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

    <!-- Main Content in a Card -->
    <main role="main" class="content card card-custom">
        <div class="card-body equal-space">
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
                            <p class="card-text">Submitted: 2023-11-20</p>
                            <p class="card-text">Victim: Jane Doe</p>
                            <button type="button" class="btn btn-secondary">Dismiss</button>
                            <button type="button" class="btn btn-success">Submit to Dean</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="card-header bg-indigo-red">
                            ADV
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Accusation</h5>
                            <p class="card-text">Case: Misconduct</p>
                            <p class="card-text">Submitted: 2023-10-12</p>
                            <p class="card-text">Victim: Mark Smith</p>
                            <button type="button" class="btn btn-success">Submit to Dean</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Notifications in a Card -->
    <aside class="notifications card card-custom">
        <div class="card-body">
            <h2>Notifications</h2>
            <ul class="list-group">
                <li class="list-group-item">
                    <div>
                        <strong>Today</strong>
                        <p>Meetings with involved parties</p>
                        <p>Committee Meeting</p>
                        <p>Deliberation meeting</p>
                    </div>
                </li>
                <li class="list-group-item">
                    <div>
                        <strong>Yesterday</strong>
                        <p>Submitted Case to Dean</p>
                    </div>
                </li>
                <li class="list-group-item">
                    <div>
                        <strong>December 22, 2024</strong>
                        <p>Case Verdict</p>
                        <p>Sending out email</p>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
