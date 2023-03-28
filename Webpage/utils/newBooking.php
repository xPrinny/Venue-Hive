<?php
    // $posterId = 1; //placeholder
    $bookingId = null;
    $bookerId = $_SESSION["userId"]; //placeholder
    $bookingState = "Confirmed";
    $bookingTimestamp = date('Y-m-d H:i:s');

    // Prepare the statement:
    $stmt = $conn->prepare("INSERT INTO venuehive.bookings (bookingId, posterId, bookerId, listingId, bookingState, bookingTimestamp, bookingDate) VALUES (?, ?, ?, ?, ?, ?, ?);");
    // Bind & execute the query statement:
    $stmt->bind_param("iiiisss", $bookingId, $posterId, $bookerId, $listingId, $bookingState, $bookingTimestamp, $bookingDate);
    if (!$stmt->execute()) {
        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        $success = false;
    } else {
       $bookingId = mysqli_insert_id($conn);
    }
    $stmt->close();
?>