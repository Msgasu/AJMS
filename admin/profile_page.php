<!DOCTYPE html>
<html lang="en">
<?php include '../settings/core.php'?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - AJMS Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html, body {
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
            top: 55px;
            bottom: 0;
            left: 0;
            width: 220px;
            height: calc(100vh - 55px);
            background-color: white;
            border-right: 1px solid #dee2e6;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            border-radius: 0 0 15px 15px;
            padding: 10px;
            box-sizing: border-box;
        }

        .sidebar-sticky {
            position: relative;
            height: 100%;
            padding-top: .5rem;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 10px;
            margin: 5px 0;
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
        }

        .content {
            margin-left: 240px;
            padding: 20px;
            height: calc(100vh - 55px);
            overflow-y: auto;
        }

        .profile-header {
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

        .profile-header .profile-picture img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px solid #dee2e6;
            border-radius: 50%;
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

        /* Additional CSS for the new layout */
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
            color: #e74c3c; /* Red color for pending items */
        }

        .user-info-container .user-info-item.active span {
            color: #2ecc71; /* Green color for active items */
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

    <!-- Sidebar -->
    <div class="sidebar">
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
                        <i class="fas fa-file-alt"></i>
                        <span> Case statements</span>
                    </a>
                </li>
                <li class="nav-item
