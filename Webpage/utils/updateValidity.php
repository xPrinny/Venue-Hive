<?php 
     include "utils/loadDB.php";

    // prepare statement. gets all info from listings table for relevant listing Id
    $stmt = $conn->prepare("SELECT enddate FROM listings WHERE listingId = " . $listingId . ";");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $currDate = date('Y-m-d');
    $endDate = $result["enddate"];

    if ($currDate > $endDate) {
        // echo "EXPIRED.";
        $stmt = $conn->prepare("UPDATE listings SET valid = 0 WHERE listingId = " . $listingId . ";");
        $stmt->execute();
    }
?>