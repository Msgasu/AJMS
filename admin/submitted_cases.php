<!DOCTYPE html>
<html lang="en">
<?php include '../functions/fetch_submitted_cases.php'?>
<?php include '../settings/core.php'?>
<?php include "../functions/get_username_fxn.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Cases - AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href ="../css/submitted_cases.css">
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
            <span>
            <span>
                <?php
                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];
                    $userName = getUserName($userId, $con);
                    $profilePicture = getProfilePicture($userId, $con);

                    echo '<div class="user-icon">';
                    if ($profilePicture) {
                        echo '<img src="../uploads/' . htmlspecialchars($profilePicture) . '" alt="User Profile Picture" style="border-radius: 50%; width: 50px; height: 50px;">';
                    } else {
                        echo '<i class="material-icons">account_circle</i>';
                    }
                    echo '</div>';

                    echo '<div class="user-name">' . htmlspecialchars($userName) . '</div>';
                } else {
                    echo "Error: User ID not set in session";
                }
                ?>
            </span>
            <!-- <img src="../images/ashesi_logo.jpeg" alt="User Profile Image"> -->
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
                    <a class="nav-link" href="schedule_meeting.php">
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
                    <a class="nav-link" href="../admin/recommender_system.php">
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
    
    

    <!-- Main Content -->
    <main role="main" class="content">
        <!-- Profile Header -->
        <div class="profile-header">
            <!-- Profile information can be uncommented and used if needed -->
            <!-- <img src="../images/ashesi_logo.jpeg" alt="Profile Picture">
            <h2>John Doe</h2>
            <p>Email: john.doe@example.com</p>
            <p>Phone: +1234567890</p>
            <p>Address: 123 Main Street, City, Country</p>
            <button type="button" class="btn btn-primary">Edit Profile</button> -->
        </div>

        <!-- Submitted Cases Card -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <h4>Submitted Cases</h4>
                        <tr>
                            <th>Case ID</th>
                            <th>Date</th>
                            <th>Case Description</th>
                            <th>Attachments</th>
                            
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        fetchSubmittedCases($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- JS & Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submitted_cases.js"></script>
</body>

</html>

