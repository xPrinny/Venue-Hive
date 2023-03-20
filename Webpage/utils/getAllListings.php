<?php // temp workaround, just leave it first

    $stmt = $conn->prepare("SELECT listingId, listingName, listingInfo, listingPrice FROM venuehive.listings;");
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