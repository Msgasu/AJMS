<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: indianred;
        }
        .container {
            max-width: 700px;
            margin-top: 95px;
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
            background-color: indianred;
            color: white;
            width: 300px;
            font-size: medium;
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
            height:75px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>
        </div>
        <form action="../action/register_user_action.php" method="POST" id="registerForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Eg: Esther" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Eg: Goku" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Eg: goku@gmail.com" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-custom">Sign Up</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <div class="left">
            <img src="../images/ashesi_logo.jpeg" alt="Ashesi University Logo">
            <div class="title"><h1 style="font-size:x-large;">AJMS</h1></div>
        </div>
        <div class="right">
            <div class="line"></div>
            <div class="text"><h1 style="font-size:x-large; font-style:italic;font-weight: 400;">Ashesi Judicial <br>Committee</h1></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
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
