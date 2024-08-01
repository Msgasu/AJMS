<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Submission</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/case_submission.css">
</head>

<body>
    <div class="container-fluid p-0">
        <header class="header d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <img src="../images/ashesi_logo.jpeg" alt="Ashesi University Logo" class="logo">
                <h1 class="ml-2 mb-0 title">AJMS</h1>
            </div>
            <div class="user-info d-flex align-items-center">
                <span>John Doe</span>
                <img src="user_icon.png" alt="User Icon" class="ml-2">
            </div>
        </header>
        <main class="row no-gutters">
            <section class="col-md-8">
                <div class="form-container p-4">
                    <h2>Do You Have Any Complaints or Cases to Report?</h2>
                    <p>Type out your report or complaint in the text box below. You can also add images and audio.</p>
                    <form id="caseForm">
                        <textarea id="report" class="form-control mb-3" placeholder="Type here...." required></textarea>
                        <div class="attachment d-flex justify-content-between align-items-center mb-3">
                            <button type="button" id="addFile" class="btn btn-link p-0"><i class="fas fa-paperclip"></i></button>
                            <button type="button" id="deleteFile" class="btn btn-link p-0"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="note text-center py-2 mb-3">
                            <strong>NOTE: YOU WILL BE HELD ACCOUNTABLE FOR ANYTHING YOU SUBMIT HERE</strong>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </form>
                </div>
            </section>
            <section class="col-md-4">
                <div class="rights-info p-4">
                    <h3>Know Your Rights 👇🏽</h3>
                    <p>
                        "Know your rights... Ignorance isn't an excuse! Ever found yourself thinking, 'But I didn't know it was
                        against the rules'? It's time to take charge. Your student handbook holds the key to understanding what's
                        expected of you and what's not. Don't wait until you're caught off guard—view your handbook now and empower
                        yourself with knowledge. It's your guide to making informed choices and staying on the right side of the
                        rules."
                    </p>
                    <button class="btn btn-primary">View Handbook</button>
                </div>
            </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/case_submission.js"></script>
</body>

</html>
