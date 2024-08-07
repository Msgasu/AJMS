<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <?php include '../settings/core.php'?>
    <?php include "../functions/get_username_fxn.php"; ?>

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

        

        .case-card-header {
            height: 150px;
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            position: relative;
        }

        .case-card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .case-card-header span {
            position: relative;
            z-index: 2;
        }

        .case-card-body {
            padding: 10px;
        }

        .case-card-body p {
            margin: 5px 0;
        }

        .case-card-body button {
            width: 100%;
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
            <span> <?php
          if (isset($_SESSION['user_id'])) {
              $userId = $_SESSION['user_id'];
              $userName = getUserName($userId, $con);
              $role= getRole($userId, $con);
              echo '<div class="user-icon"><i class="material-icons">account_circle</i></div>';
              echo '<div class="user-name">' . $userName . '</div>';
              echo '<div class="user-name">' . $role . '</div>';
          } else {
              echo "Error: User ID not set in session";
          }
          ?></span>
            <img src="../images/ashesi_logo.jpeg" alt="User Profile Image">
        </div>
    </div>

    <!-- Sidebar in a Card -->
    <div class="card sidebar card-special">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="../admin/admin_dashboard.php">
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
                    <a class="nav-link" href="../admin/submitted_cases.php">
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
                    <a class="nav-link" href="profile_page.php">
                        <i class="fas fa-user"></i>
                        <span> Profile</span>
                    </a>
                </li>
                <li class="nav-item">
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
    <br>
    <br>
    
    <!-- Main Content in a Card -->
    <main role="main" class="content card card-special">
        <div class="card-body equal-space scrollable-notifications">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Submitted Cases</h1>
            </div>

            <!-- Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="case-card-header" style="background-image: url('../images/Ashesi.jpg');">

                            <span>URGENT</span>
                        </div>
                        <div class="case-card-body">
                            <h5 class="card-title">Meeting with Victim</h5>
                            <p>Case of theft,</p>
                            <p>Victim: Female</p>
                            <p>Year: Class of 2026</p>
                            <p>Suspect: Male</p>
                            <p>Year: 2026</p>
                            <button class="btn btn-success" onclick="location.href='schedule_meeting.php'">Schedule meeting</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="case-card-header" style="background-image: url('../images/Ashesi.jpg');">
                            <span>URGENT</span>
                        </div>
                        <div class="case-card-body">
                            <h5 class="card-title">Meeting with Victim</h5>
                            <p>Case of theft,</p>
                            <p>Victim: Female</p>
                            <p>Year: Class of 2026</p>
                            <p>Suspect: Male</p>
                            <p>Year: 2026</p>
                            <button class="btn btn-success" onclick="location.href='schedule_meeting.php'">Schedule meeting</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="case-card-header" style="background-image: url('../images/Ashesi.jpg');">
                            <span>URGENT</span>
                        </div>
                        <div class="case-card-body">
                            <h5 class="card-title">Meeting with Victim</h5>
                            <p>Case of theft,</p>
                            <p>Victim: Female</p>
                            <p>Year: Class of 2026</p>
                            <p>Suspect: Male</p>
                            <p>Year: 2026</p>
                            <button class="btn btn-success" onclick="location.href='schedule_meeting.php'">Schedule meeting</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="case-card-header" style="background-image: url('../images/Ashesi.jpg');">
                            <span>URGENT</span>
                        </div>
                        <div class="case-card-body">
                            <h5 class="card-title">Meeting with Victim</h5>
                            <p>Case of theft,</p>
                            <p>Victim: Female</p>
                            <p>Year: Class of 2026</p>
                            <p>Suspect: Male</p>
                            <p>Year: 2026</p>
                            <button class="btn btn-success" onclick="location.href='schedule_meeting.php'">Schedule meeting</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
                    <span><i class="fas fa-upload"></i> Submitted Case to Dean</span>
                    <span>Details<br>Student ID 83342025</span><br>
                </li>
                <li class="list-group-item">
                    <strong>December 22, 2024</strong>
                    <span><i class="fas fa-gavel"></i> Case Verdict</span>
                    <span>Details<br>Student ID 83342025</span><br>
                    <span><i class="fas fa-envelope"></i> Sending out email</span>
                    <span>Details<br>Student ID 83342025</span>
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

