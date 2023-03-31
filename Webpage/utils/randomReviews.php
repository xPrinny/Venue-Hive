<?php 

   $stmt = $conn->prepare("SELECT a.*, b.* FROM venuehive.reviews a
           INNER JOIN listings b ON a.reviewListId = b.listingId
           ORDER BY RAND() LIMIT 3");
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