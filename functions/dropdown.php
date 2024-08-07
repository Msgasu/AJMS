<?php
function fetchSubmittedCases($con) {
    $query = "SELECT * FROM cases";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['case_id']}</td>";
        echo "<td>{$row['case_title']}</td>";
        echo "<td>{$row['submitted_by']}</td>";
        echo "<td>{$row['date_submitted']}</td>";
        echo "<td>
                <select class='form-control status-dropdown' data-case-id='{$row['case_id']}'>
                    <option value='pending'" . ($row['status'] == 'pending' ? ' selected' : '') . ">Pending</option>
                    <option value='reviewed'" . ($row['status'] == 'reviewed' ? ' selected' : '') . ">Reviewed</option>
                    <option value='urgent'" . ($row['status'] == 'urgent' ? ' selected' : '') . ">Urgent</option>
                </select>
              </td>";
        echo "</tr>";
    }
}

?>


