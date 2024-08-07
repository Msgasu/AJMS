<!DOCTYPE html>
<html lang="en">
<?php include '../functions/fetch_submitted_cases.php'?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Cases - AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/submitted_cases.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            color: #fff;
            padding: 10px;
        }

        .header img {
            height: 50px;
        }

        .header .title h1 {
            margin: 0;
            padding-left: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .sidebar {
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #495057;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .card {
            margin-top: 20px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .dropdown-menu {
            min-width: 150px;
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
            <span>John Doe</span>
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
                    <a class="nav-link" href="../login/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <span> Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <main role="main" class="content">
        <div class="card">
            <div class="card-header">
                Submitted Cases
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Case ID</th>
                                <th>Case Title</th>
                                <th>Submitted By</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php fetchSubmittedCases($con); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- JS & Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.status-dropdown').change(function() {
                var caseId = $(this).data('case-id');
                var status = $(this).val();

                $.ajax({
                    url: '../functions/update_case_status.php',
                    type: 'POST',
                    data: {
                        case_id: caseId,
                        status: status
                    },
                    success: function(response) {
                        alert(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert("An error occurred while updating the status.");
                    }
                });
            });
        });
    </script>

</body>

</html>
