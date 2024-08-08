<?php
function generateAndDisplayCards() {
    include "../settings/connection.php"; // Update with the correct path to your connection file

    // Fetch all cases with user details
    $cases_stmt = $con->prepare("SELECT c.id, c.statement_description, c.document_url, s.status_name, u.f_name AS user_f_name, u.l_name AS user_l_name, u.email AS user_email
                                 FROM cases c
                                 JOIN status s ON c.status_id = s.status_id
                                 JOIN users u ON c.user_id = u.pid");
    $cases_stmt->execute();
    $cases_result = $cases_stmt->get_result();
    $cases = $cases_result->fetch_all(MYSQLI_ASSOC);
    $cases_stmt->close();

    foreach ($cases as $case) {
        // Fetch participants for each case
        $participant_stmt = $con->prepare("SELECT u.f_name, u.l_name, u.participant, cp.student_email
                                           FROM case_parties cp
                                           JOIN users u ON cp.student_email = u.email
                                           WHERE cp.case_id = ?");
        $participant_stmt->bind_param("i", $case['id']);
        $participant_stmt->execute();
        $participant_result = $participant_stmt->get_result();
        $participants = $participant_result->fetch_all(MYSQLI_ASSOC);
        $participant_stmt->close();

        // Echo HTML card with a clickable link
        echo '<div class="col-md-4">
 
                    <div class="card mb-4 shadow-sm card-custom">
                        <div class="case-card-header" style="background-image: url(\'../images/Ashesi.jpg\');">
                            <span>' . htmlspecialchars($case['status_name']) . '</span>
                        </div>
                        <div class="case-card-body">
                                        <a href="case_hearing.php?case_id=' . htmlspecialchars($case['id']) . '" style="text-decoration: none;"> 
                            <h5 class="card-title">Case ID: ' . htmlspecialchars($case['id']) . '</h5></a>
                            <p>Description: ' . htmlspecialchars($case['statement_description']) . '</p>
                            <p>Document: <a href="' . htmlspecialchars($case['document_url']) . '" target="_blank">View Document</a></p>
                            <p>Victim: ' . htmlspecialchars($case['user_f_name']) . ' ' . htmlspecialchars($case['user_l_name']) . ' (' . htmlspecialchars($case['user_email']) . ')</p>
                            <p>Involved Parties:</p>';

        foreach ($participants as $participant) {
            echo '<p>' . htmlspecialchars($participant['f_name'] . ' ' . $participant['l_name']) . ' (' . htmlspecialchars($participant['student_email']) . ') <br>Role: ' . htmlspecialchars($participant['participant']) . '</p>';
        }

        echo '   <button class="btn btn-success">Schedule meeting</button>
                </div>
            </div>
      
    </div>';
    }

    $con->close();
}
?>
