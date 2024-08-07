<!DOCTYPE html>
<html lang="en">
<?php include '../settings/core.php'?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Progress</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html, body {
            font-size: .875rem;
            background-color: #A44C4C;
            height: 100%;
            margin: 0;
            overflow: hidden;
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

        .content-wrapper {
            height: 100%;
            overflow: auto;
            padding-top: 110px;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
        }

        .content {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }

        .breadcrumb-item a {
            color: #28a745;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }

        .progress-container {
            margin-top: 20px;
        }

        .progress-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .progress-bar-custom {
            border-radius: 10px;
            
        }

        .progress-description {
            margin-top: 10px;
            font-size: 0.9rem;
        }
        /* .progress-bar progress-bar-custom{
            color: #28a745;
        } */

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
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
            padding: 20px;
        }

        .case-card-body p {
            margin: 5px 0;
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

    <!-- Main Content -->
    <div class="content-wrapper">
        <main role="main" class="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="student_dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Case Progress</li>
                </ol>
            </nav>

            <div class="case-card-header" style="background-image: url('../images/Ashesi.jpg');">
                <span>Case of theft....Page can be changed if initial idea was different</span>
            </div>
            <div class="case-card-body">
                <h5 class="card-title">Case of theft</h5>
                <p class="card-text">Status: In Progress</p>
            </div>

            <div class="progress-container">
                <h6 class="progress-title">Progress</h6>
                <div class="progress mb-3">
                    <div class="progress-bar progress-bar-custom" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                </div>
                <div class="progress-description">
                    <p>The case is currently being reviewed by the Judicial Committee. Additional information has been requested from the involved parties.</p>
                </div>
            </div>

            <div class="progress-container">
                <h6 class="progress-title">Previous Updates</h6>
                <div class="card card-custom mb-3">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Update 1 - 20th July 2024</h6>
                        <p class="card-text">The case has been assigned to the Judicial Committee for further review.</p>
                    </div>
                </div>
                <div class="card card-custom mb-3">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Update 2 - 25th July 2024</h6>
                        <p class="card-text">The initial review has been completed. Further information is needed from the involved parties.</p>
                    </div>
                </div>
                <div class="card card-custom mb-3">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Update 3 - 30th July 2024</h6>
                        <p class="card-text">Additional documents have been received and are under review.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
