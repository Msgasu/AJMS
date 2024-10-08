<!DOCTYPE html>
<html lang="en">
<?php include '../action/profile_page_action.php'; ?>
<?php include '../action/edit_profile_action.php'; ?>
<?php include '../functions/get_username_fxn.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html,
        body {
            font-size: .875rem;
            background-color: #A44C4C;
            margin: 0;
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
            border-radius: 50%;
            height: 40px;
            width: 40px;
            object-fit: cover;
        }

        .header .user-info span {
            font-weight: bold;
            color: grey;
        }

        .sidebar {
            position: fixed;
            top: 85px;
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
            font-size: 1.1rem;
            /* Increase font size */
        }

        .content {
            margin-left: 240px;
            margin-top: -87px;
            padding: 20px;
            height: calc(100vh - 55px);
            overflow-y: auto;
        }

        .profile-header {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            top: 80px;
        }

        .profile-header .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            width: 100%;
            border-radius: 15px 15px 0 0;
            padding: 15px;
        }

        .profile-header .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }

        .profile-header .profile-picture {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .profile-header .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: 2px solid #dee2e6;
            border-radius: 50%;
        }

        .profile-header .profile-picture .camera-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
        }

        .profile-header .user-details h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-header .user-details p {
            margin: 0;
            color: #555;
        }

        .profile-header .form-group {
            width: 100%;
            max-width: 500px;
            margin-bottom: 15px;
        }

        .profile-header .form-control {
            border-radius: 5px;
        }

        .profile-header .form-control-file {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .profile-header .btn-primary {
            margin-top: 15px;
            padding: 10px 20px;
        }

        .user-info-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        .user-info-container .user-info-item {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
            width: 48%;
            margin-bottom: 15px;
        }

        .user-info-container .user-info-item label {
            font-weight: bold;
            color: #333;
        }

        .user-info-container .user-info-item span {
            display: block;
            color: #555;
        }

        .user-info-container .user-info-item.pending span {
            color: #e74c3c;
            /* Red color for pending items */
        }

        .user-info-container .user-info-item.active span {
            color: #2ecc71;
            /* Green color for active items */
        }

        .profile-picture input[type="file"] {
            display: none;
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
    <br>
    <br>
    <br>
    <!-- Main Content -->
    <main class="content">
        <div class="profile-header">
            <div class="profile-picture">
                <?php
                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];
                    $profilePicture = getProfilePicture($userId, $con);

                    echo '<img src="../uploads/' . htmlspecialchars($profilePicture) . '" alt="User Profile Picture">';
                }
                ?>
                </span>
                <div class="camera-icon" onclick="document.getElementById('profileImageInput').click();">
                    <i class="fas fa-camera"></i>
                </div>
                <input type="file" id="profileImageInput" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="user-details text-center mb-4">
                <h2 class="mb-1"><?php echo htmlspecialchars($f_name . ' ' . $l_name); ?></h2>
                <p class="text-muted">Email: <?php echo htmlspecialchars($email); ?></p>
                <p class="text-muted">Role: Student</p>
            </div>
            <div class="user-info-container">
                <div class="user-info-item">
                    <label for="emailVerification">First Name</label>
                    <span class="pending"><?php echo htmlspecialchars($f_name); ?></span>
                </div>
                <div class="user-info-item">
                    <label for="emailVerification">Last Name</label>
                    <span class="pending"><?php echo htmlspecialchars($l_name); ?></span>
                </div>
                <div class="user-info-item">
                    <label for="mobileVerification">Email</label>
                    <span class="active"><?php echo htmlspecialchars($email); ?></span>
                </div>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
        </div>
    </main>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="../action/edit_profile_action.php" id="editProfileForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="f_name">First Name</label>
                            <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo htmlspecialchars($f_name); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="l_name">Last Name</label>
                            <input type="text" class="form-control" id="l_name" name="l_name" value="<?php echo htmlspecialchars($l_name); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profileImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        $(document).ready(function() {
            $('#editProfileForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '../action/edit_profile_action.php',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#editProfileModal').modal('hide');
                        const responseData = JSON.parse(response);
                        if (responseData.success) {
                            // Update the UI with the new profile details
                            $('.user-details h2').text(responseData.full_name);
                            $('.user-details p.email').text('Email: ' + responseData.email);
                        } else {
                            alert('Failed to update profile: ' + responseData.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>