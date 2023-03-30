<?php 
    include "utils/authCheck.php";
    $username = $_GET['u'];

    // prepare statement. gets all info from listings table for relevant listing Id
    $stmt = $conn->prepare("SELECT a.*,  b.username FROM venuehive.listings a INNER JOIN venuehive.members b on a.listingOwnerId = b.memberId WHERE b.username = ? ORDER BY timestamp DESC;");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }
    else
    {
        $errorMsg = "No listings in database!";
        $success = false;
    }
    $stmt->close();
?>