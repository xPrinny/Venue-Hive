<?php 

    // Prepare statement that gets item information
   $stmt = $conn->prepare("SELECT a.memberId, ratingStar, ratingComment, a.username as 'reviewOwner', b.username as 'recievedUser', c.listingName FROM reviews
           INNER JOIN members a ON reviewOwnerId = a.memberId INNER JOIN members b ON reviewRecieveId = b.memberId INNER JOIN listings c ON reviewListId = c.listingId
           WHERE a.username = '" . $username . "' OR b.username = '" . $username . "'");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    } else {
        $errorMsg = "No listings in database!";
        $success = false;
    }
    $stmt->close();
?>