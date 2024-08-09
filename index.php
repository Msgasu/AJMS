<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #A44C4C;
        }

        .container {
            max-width: 800px;
            margin-top: 80px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #A44C4C;
            color: white;
            width: 300px;
            font-size: large;
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .footer {
            background: #000;
            color: white;
            padding: 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer img {
            height: 75px;
            width: 110px;
            margin: 0;
        }

        .footer .left {
            display: flex;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .footer .title {
            margin-left: 10px;
        }

        .footer .right {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .footer .right .line {
            height: 60px;
            border-left: 1px solid white;
            margin: 0 10px;
        }

        label,
        input {
            display: block;
            color: rgb(110, 106, 106);
            font-weight: bold;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 65px;
        }

        .sign-up-link {
            text-align: center;
            margin-top: 20px;
        }

        .sign-up-link a {
            color: #A44C4C;
            font-weight: bold;
        }

        .sign-up-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <div class="header">
            <h2>Welcome to AJMS</h2>
        </div>
        <br>

        <form action="../AJMS/action/login_user_action.php" method="POST" id="loginForm">
            <div class="form-group">
                <label for="email">Enter your details below</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <br>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="btn-container">
                <button type="submit" name="submit" class="btn btn-custom">Login</button>
            </div>
        </form>

        <div class="sign-up-link">
            <p>Don't have an account? <a href="../AJMS/register_view.php">Sign up</a></p>
        </div>
    </div>

    <div class="footer">
        <div class="left">
            <img src="../AJMS/images/ashesi_logo.jpeg" alt="Ashesi University Logo">
            <div class="title">
                <h1 style="font-size:x-large;">AJMS</h1>
            </div>
        </div>
        <div class="right">
            <div class="line"></div>
            <div class="text">
                <h1 style="font-size:x-large; font-style:italic;font-weight: 400;">Ashesi Judicial <br>Committee</h1>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <!-- <script src="../js/login.js"></script> -->
    <script>


    
   
        document.getElementById('registerForm').addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (password !== confirmPassword) {
                alert('Passwords do not match.');
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
