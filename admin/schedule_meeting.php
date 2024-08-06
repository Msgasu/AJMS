<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
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
            height: calc(90vh - 30px);
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
        
    
        .sidebar-container {
            position: fixed;
            top: 90px;
            bottom: 0;
            left: 20px; 
            z-index: 100;
            padding: 10px;
            width: 270px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            height: calc(90vh - 30px);
            background-color: white;
            border-radius: 15px;
            overflow-y: auto;
        }

        .sidebar-container h3 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .sidebar-container .meeting-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .sidebar-container .meeting-item h5 {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .scrollable-notifications {
            height: calc(95vh - 110px); /* Adjusted height */
            overflow-y: auto;
        }

        .content {
            margin-top: 90px;
            margin-left: 310px;
            margin-right: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: calc(89.2vh - 25px);
            overflow-y: auto;
        }

        .content h3 {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;

        }

        .calendar-container {
            margin-bottom: 20px;
            
        }
        .calendar {
            margin-bottom: 10px;
            width: 500%; /* Adjust the width as needed */
            height: 900px; /* Adjust the height as needed */
        }

        .time-slots h4 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 30px;
            margin-left: 150px;
            width: 200px;
        }

        .time-slots button {
            margin-bottom: 10px;
            width: 230px;
        }

        .btn-outline-primary {
            margin-top: 10px;
            margin-left: 100px;
            margin-bottom: 10px;
            color: #b42f2f;
            border-color: #b42f2f;
            width: 200px;
        }

        .btn-outline-primary:hover {
            background-color: #b42f2f;
            color: #ffffff;

        }

        .btn-primary {
            background-color: #b42f2f;
            border-color: #b42f2f;
            width: 200px;
            margin-left: 100px;
        }

        .btn-primary:hover {
            background-color: #a02626;
            border-color: #a02626;
        }
      
    </style>
</head>

<body>
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
        <div class="card sidebar" id="sidebar">
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
                        <i class="fas fa-lightbulb"></i>
                        <span> Recommender</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
   
    


    <main class="main-container">
        <div class="sidebar-container">
            <div class="card-body scrollable-notifications">
               <h3>Upcoming Meetings</h3>
               <div id="upcomingCalendar" class="calendar-container"></div>
                    <div class="meeting-item">
                      <h5>Meeting with Party C</h5>
                     <p>Student ID: 123456789</p>
                     <p>December 9, 2024</p>
                     <button class="btn btn-success btn-sm">Send out meeting invitation</button>
                    </div>
                
            
                <div class="meeting-item">
                    <h5>Meeting with Party D</h5>
                    <p>Student ID: 123456789</p>
                    <p>December 10, 2024</p>
                    <button class="btn btn-success btn-sm">Send out meeting invitation</button>
                </div>
            </div>
        </div>
        <div class="content">
            <button class="btn btn-link" onclick="history.back()">&lt; back</button>
            <h2 style="text-align: center; font-weight: bold;">Schedule a meeting</h2>
            <div style="display: flex; width: 80%;  ">
                <div id="bookingCalendar" class="calendar"></div>
                <div class="time-slots">
                    <h4>Available Time Slots</h4>
                    <button class="btn btn-outline-primary">8:00am - 9:00am</button>
                    <button class="btn btn-outline-primary">9:00pm - 10:00am</button>
                    <button class="btn btn-outline-primary">10:00am - 11:00am</button>
                    <button class="btn btn-outline-primary">11:00am - 12:00pm</button>
                    <button class="btn btn-outline-primary">12:00pm - 1:00pm</button>
                    <button class="btn btn-primary confirm-btn">Confirm</button>
                </div>
            </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#upcomingCalendar').fullCalendar({
                defaultView: 'month',
                events: [{
                        title: 'Meeting with Party C',
                        start: '2024-12-09T10:00:00'
                    },
                    {
                        title: 'Meeting with Party D',
                        start: '2024-12-10T14:00:00'
                    }
                ]
            });

            $('#bookingCalendar').fullCalendar({
                defaultView: 'month'
            });
        });
         // Function to toggle the sidebar
         function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>
</body>

</html>