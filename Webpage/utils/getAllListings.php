<?php // temp workaround, just leave it first

    // prepare statement. gets first n (10) listings from listings table
    $stmt = $conn->prepare("SELECT listingId, listingName, listingInfo, listingPrice FROM venuehive.listings;");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
        $rows = array();
        // $count = 0;
        // $listingCount = 10; // modify accordingly to change number of listings shown on homepage
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
            // $count++;
            // if ($count >= $listingCount) {
            //     break;
            // }
        }
    }
    else
    {
        $errorMsg = "No listings in database!";
        $success = false;
    }
    $stmt->close();
?>