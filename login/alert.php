<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        <?php
        session_start();
        if (isset($_SESSION["error_message"])) {
            echo "Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{$_SESSION["error_message"]}'
            }).then(function() {
                window.location.href = '../login/login.php'; // Redirect after showing the alert
            });";
            unset($_SESSION["error_message"]); // Clear the error message after displaying
        }
        ?>
    </script>
</body>
</html>
