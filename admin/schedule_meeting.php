<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Meeting</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <style>
        html,
        body {
            font-size: .875rem;
            background-color: #A44C4C;
            overflow: hidden;
            /* Prevent general scrollbar */
            height: 100%;
        }

        .header {
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            width: 100%;
            height: 70px;
            z-index: 1030;
        }

        .header .left {
            display: flex;
            align-items: center;
        }

        .header img {
            height: 50px;
            width: auto;
            margin-right: 10px;
        }

        .header .title h1 {
            font-size: 24px;
            font-weight: bolder;
            color: #D00C0C;
            margin: 0;
        }

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info img {
            margin-right: 10px;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            /* Adjust size as needed */
        }

        .header .user-info span {
            font-weight: bold;
            color: grey;
        }


        .sidebar {
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 20px;
            z-index: 100;
            padding: 20px;
            width: 250px;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: white;
            border-radius: 15px;
            overflow-y: auto;
        }

        .sidebar h3 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .sidebar .meeting-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .sidebar .meeting-item h5 {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .content {
            margin-top: 90px;
            margin-left: 300px;
            margin-right: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: calc(100vh - 120px);
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

        .time-slots h4 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 100px;
            margin-left: 100px;
            width: 200px;
        }

        .time-slots button {
            margin-bottom: 10px;
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
            <img src="../images/ashesi_logo.jpeg" alt="Ashesi University Logo">
            <div class="title">
                <h1 style="font-weight: bolder">AJMS</h1>
            </div>
        </div>
        <div class="user-info">
            <img src="path_to_profile_image.png" alt="Profile Image" class="profile-image">
            <span>John Doe</span>
        </div>
    </div>


    <main class="main-container">
        <div class="sidebar">
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
        <div class="content">
            <button class="btn btn-link" onclick="history.back()">&lt; back</button>
            <h3>Schedule a meeting</h3>
            <div style="display: flex; width: 80%;  ">
                <div id="bookingCalendar" class="calendar-container"></div>
                <div class="time-slots">
                    <h4>Mon 8th December</h4>
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
    </script>
</body>

</html>