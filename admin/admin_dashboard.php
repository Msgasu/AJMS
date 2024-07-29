<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS Dashboard</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-size: .875rem;
        }
    
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar-sticky {
           position: relative;
           top: 0;
           height: calc(100vh - 48px);
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

        .card-header {
           font-weight: bold;
        }

        .list-group-item {
            margin-bottom: 10px;
        }

        /* New header styles */
        .header {
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid #dee2e6;
        }

        .header img {
            height: 40px;
        }

        .header .title {
            font-size: 24px;
            font-weight: bold;
            color: #dc3545;
        }

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info img {
            border-radius: 50%;
            height: 40px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="../images/ashesi_logo.jpeg" alt="Ashesi University Logo">
        <div class="title">AJMS</div>
        <div class="user-info">
            <span>John Doe</span>
            <img src="user-profile-image.jpg" alt="User Profile Image">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <div class="text-center my-4">
                        <img src="logo.png" alt="Ashesi University Logo" class="img-fluid">
                        <h4>AJMS</h4>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span>Meeting</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span>Case stmt</                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span>Recommender</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-8 ml-sm-auto col-lg-8 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Submitted Cases</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">John Doe</button>
                        </div>
                    </div>
                </div>

                <!-- Cards -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header text-white bg-danger">
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
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header text-white bg-warning">
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
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header text-white bg-success">
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
            </main>

            <!-- Notifications -->
            <aside class="col-md-2 ml-sm-auto col-lg-2 px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
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
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
