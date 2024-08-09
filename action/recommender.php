<?php
// Start the session
session_start();

// Include the connection file
include "../settings/connection.php";

if (isset($_POST['submit'])) {
    $report = mysqli_real_escape_string($con, $_POST['report']);
    
    // Keyword matching logic
    $keywords = explode(' ', $report);  // Split report into words
    $suggestedSanctions = [];
    $relatedCases = [];
    $adviceToCommunity = '';

    foreach ($keywords as $keyword) {
        // Find matching sanctions
        $sanctionQuery = "SELECT Violation_Description, Sanction_Description FROM sanctions WHERE Violation_Description LIKE '%$keyword%'";
        $sanctionResult = $con->query($sanctionQuery);

        if ($sanctionResult->num_rows > 0) {
            while ($row = $sanctionResult->fetch_assoc()) {
                $suggestedSanctions[] = $row['Sanction_Description'];
                $adviceToCommunity .= $row['Violation_Description'] . ": " . $row['Sanction_Description'] . ". ";
            }
        }
       
        // Find related past cases (limit to top 5)
        $caseQuery = "SELECT Case_Description, Advice_to_Community FROM pastcases WHERE Violation_type LIKE '%$keyword%' LIMIT 5";
        $caseResult = $con->query($caseQuery);

        if ($caseResult->num_rows > 0) {
            $caseNumber = 1;
            while ($row = $caseResult->fetch_assoc()) {
                $relatedCases[] = "#Case " . $caseNumber . ": " . $row['Case_Description'] . " - " . $row['Advice_to_Community'];
                $caseNumber++;
            }
        }
    }
    
    // Construct the suggested verdict
    $suggestedVerdict = "<strong>Sanctions:</strong><br>" . implode('<br>', $suggestedSanctions);
    $suggestedVerdict .= "<br><br><strong>Related Cases:</strong><br>" . implode('<br>', $relatedCases);
    $suggestedVerdict .= "<br><br><strong>Advice to the Community:</strong><br>" . $adviceToCommunity;
    
    // Store the suggested verdict in session
    $_SESSION['suggestedVerdict'] = $suggestedVerdict;
    
    // Redirect to the recommender system page
    header("Location: ../admin/recommender_system.php");
    exit();
    
    // Close connection
    $con->close();
}
?>

