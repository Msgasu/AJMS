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
            background-color: #A44C4C;
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
            top: 70px;
            bottom: 0;
            left: 20px;
            z-index: 100;
            padding: 0;
            width: 220px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            height: calc(100vh - 70px);
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
            margin-top: 100px;
            margin-left: 260px;
            margin-right: 280px;
            padding: 20px 0;
            height: calc(100vh - 70px);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .notifications {
            position: fixed;
            top: 70px;
            right: 20px;
            width: 250px;
            padding: 10px;
            background-color: #f8f9fa;
            box-shadow: inset 1px 0 0 rgba(0, 0, 0, .1);
            height: calc(100vh - 70px);
            overflow-y: auto;
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

    <!-- Notifications Section in a Card -->
    <div class="card notifications card-special">
        <div class="card-body">
            <h2>Notifications</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Today</strong>
                    <span>Meetings with involved parties</span>
                    <span>Committee Meeting</span>
                    <span>Deliberation meeting</span>
                </li>
                <li class="list-group-item">
                    <strong>Yesterday</strong>
                    <span>Submitted Case to Dean</span>
                    <span>Student ID 12345684</span>
                </li>
                <li class="list-group-item">
                    <strong>December 22, 2024</strong>
                    <span>Case Verdict</span>
                    <span>Start 11</span>
                    <span>Student ID 12345684</span>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

