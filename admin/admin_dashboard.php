<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .sidebar {
            background-color: #2c3e50;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: white;
            font-size: 1.1em;
        }
        .sidebar .nav-link:hover {
            background-color: #34495e;
        }
        .navbar {
            background-color: indianred;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .navbar-brand:hover {
            color: white;
        }
        .card {
            margin: 20px 0;
        }
        .card-header {
            background-color: #ecf0f1;
            font-weight: bold;
        }
        .notifications {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .notification-item {
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #27ae60;
            color: white;
        }
        .badge-urgent {
            background-color: red;
        }
        .badge-reviewed {
            background-color: orange;
        }
        .badge-adv {
            background-color: blue;
        }
        .notification-title {
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <div class="text-center mb-4">
                <img src="../images/ashesi_logo.jpeg" alt="Ashesi University Logo" class="img-fluid">
                <h3 class="text-white">AJMS</h3>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="#">Home</a>
                <a class="nav-link" href="#">Meeting</a>
                <a class="nav-link" href="#">Case stmt</a>
                <a class="nav-link" href="#">Recommender</a>
                <a class="nav-link" href="#">Logout</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-grow-1">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">AJMS</a>
                <div class="ml-auto">
                    <span class="navbar-text text-white">John Doe</span>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h3 class="my-4">Submitted Cases</h3>
                        <div class="row" id="casesContainer">
                            <!-- Cards will be inserted here by JavaScript -->
                        </div>
                    </div>
                    <!-- Notifications -->
                    <div class="col-lg-3">
                        <div class="notifications">
                            <h5 class="mb-4">Notifications</h5>
                            <div id="notificationsContainer">
                                <!-- Notifications will be inserted here by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Sample data
        const cases = [
            {
                status: 'urgent',
                title: 'Meeting with Victim',
                description: 'Case of theft, case: 0004, victim: Ken',
                action: 'Book meeting',
                actionClass: 'btn-custom'
            },
            {
                status: 'reviewed',
                title: 'Cheating Case',
                description: 'Case: 0005, perpetrator: John',
                action: 'Dismiss',
                actionClass: 'btn-custom'
            },
            {
                status: 'adv',
                title: 'Misconduct',
                description: 'Case: 0006, perpetrator: Mike',
                action: 'Submit to Dean',
                actionClass: 'btn-custom'
            }
        ];

        const notifications = [
            {
                date: 'Today',
                items: ['Meetings with involved parties', 'Committee Meeting', 'Deliberation meeting']
            },
            {
                date: 'Yesterday',
                items: ['Submitted Case to Dean']
            },
            {
                date: 'December 22, 2024',
                items: ['Case Verdict', 'Sending out email']
            }
        ];

        // Function to render cases
        function renderCases(cases) {
            const container = document.getElementById('casesContainer');
            container.innerHTML = '';
            cases.forEach(caseItem => {
                const card = document.createElement('div');
                card.className = 'col-md-6 col-lg-4';
                card.innerHTML = `
                    <div class="card">
                        <div class="card-header badge-${caseItem.status} text-white">${caseItem.status.toUpperCase()}</div>
                        <div class="card-body">
                            <h5 class="card-title">${caseItem.title}</h5>
                            <p class="card-text">${caseItem.description}</p>
                            <button class="btn ${caseItem.actionClass}">${caseItem.action}</button>
                        </div>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Function to render notifications
        function renderNotifications(notifications) {
            const container = document.getElementById('notificationsContainer');
            container.innerHTML = '';
            notifications.forEach(notification => {
                const notificationDiv = document.createElement('div');
                notificationDiv.className = 'notification-item';
                notificationDiv.innerHTML = `
                    <p class="notification-title">${notification.date}</p>
                    ${notification.items.map(item => `<p>${item}</p>`).join('')}
                `;
                container.appendChild(notificationDiv);
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            renderCases(cases);
            renderNotifications(notifications);
        });
    </script>
</body>
</html>
