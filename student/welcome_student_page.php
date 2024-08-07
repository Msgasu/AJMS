<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        html, body {
            font-size: .875rem;
            background-color: #A44C4C;
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
            background-color: #A44C4C;
        }

        .modal-content {
            border-radius: 15px;
            margin: auto;
            padding: 20px;
            height: 100%;
        }
        
        .modal-header {
            border-bottom: none;
            text-align: center;
            width: 100%;
            padding-bottom: 0;
        }

        .modal-title {
            font-size: 1.7rem;
            color: #333;
            
        }

        .modal-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10px;
        }

        .form-group {
            margin-bottom: 1rem;
            width: 100%;
        }

        .form-control {
            border-radius: 15px;
        }

        .text-center {
            display: flex;
            justify-content: center;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 15px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.2s, border-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .modal-footer {
            border-top: none;
            display: flex;
            justify-content: center;
            padding-top: 0;
        }

        .modal-body p {
            font-style: italic;
            color: #555;
            text-align: center;
            margin-bottom: 1rem;
            font-size:14px;
        }

    </style>
</head>

<body>
    <!-- Modal HTML -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true" style="background-color: #A44C4C;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="welcomeModalLabel">Welcome to the AJMS!</h3>
                    <p><em>Please enter your details.</em></p>
                </div>
                <div class="modal-body">
                    
                    <form id="welcomeForm">
                        <div class="form-group">
                            <label for="roleSelect">Are you a Witness or a Victim?</label>
                            <select class="form-control" id="roleSelect" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="witness">Witness</option>
                                <option value="victim">Victim</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studentId">Student ID</label>
                            <input type="text" class="form-control" id="studentId" placeholder="Enter your student ID" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#welcomeModal').modal('show');
        });
    </script>
</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('welcomeForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        var role = document.getElementById('roleSelect').value;
        var studentId = document.getElementById('studentId').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../action/student_login_action.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Handle successful response
                console.log('Response:', xhr.responseText); 
                window.location.href = '../student/student_dashboard.php'; 
                $('#welcomeModal').modal('hide'); 
            } else {
                // Handle error response
                console.error('Error:', xhr.statusText); // Log error for debugging
                alert('An error occurred. Please try again.');
            }
        };

        // Send data in URL-encoded format
        var data = 'role=' + encodeURIComponent(role) + '&studentId=' + encodeURIComponent(studentId);
        xhr.send(data);
    });
});

</script>
