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

        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
            padding: 0 15px;
            margin-left: auto;
        }

        .sidebar {
            position: fixed;
            top: 55px;
            bottom: 0;
            left: -220px; /* Initially hidden */
            z-index: 100;
            padding: 0;
            width: 220px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            height: calc(90vh - 30px);
            background-color: white;
            border-radius: 15px;
            transition: left 0.3s ease;
        }

        .sidebar.open {
            left: 20px; /* Show sidebar */
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

        .report-form {
            background-color: transparent;
            border-radius: 15px;
            padding: 20px;
        }

        .report-form textarea {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            background-color: lightgrey;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .report-form .submit-button {
            background-color: #28a745;
            color: white;
            font-size: medium;
            width: 30%;
            border: none;
            padding: 10px 20px;
            margin-left: 240px;
            border-radius: 10px;
            cursor: pointer;
        }

        .report-form .note {
            color: red;
            margin-top: 10px;
            margin-left: 25px;
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

        @media (max-width: 768px) {
            .menu-icon {
                display: block !important;
            }

            .content {
                margin-left: 20px;
                margin-right: 20px;
            }
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
            <span>John Doe</span>
            <img src="../images/ashesi_logo.jpeg" alt="User Profile Image">
        </div>
    </div>

    <!-- Sidebar in a Card -->
    <div class="card sidebar card-special" id="sidebar">
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
                        <span> Case statements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-calendar"></i>
                        <span> Hearing Scheduling</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cogs"></i>
                        <span> Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Content Area -->
    <div class="content">
        <div class="report-form">
            <textarea placeholder="Enter report details here..."></textarea>
            <button class="submit-button">Submit</button>
            <div class="note">Note: Ensure all fields are correctly filled.</div>
        </div>
        <div class="equal-space">
            <div class="card card-custom">
                <div class="card-body">
                    <h5 class="card-title">Notifications</h5>
                    <div class="notifications">
                        <h2>Recent Notifications</h2>
                        <div class="scrollable-notifications list-group">
                            <a href="#" class="list-group-item">
                                <strong>Meeting Scheduled</strong>
                                <span>Meeting with the Academic Committee at 10 AM.</span>
                                <i class="fas fa-calendar-day"></i>
                            </a>
                            <a href="#" class="list-group-item">
                                <strong>New Case Statement</strong>
                                <span>Case statement for student disciplinary action added.</span>
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
            } else {
                sidebar.classList.add('open');
            }
        }
    </script>
</body>

</html>

