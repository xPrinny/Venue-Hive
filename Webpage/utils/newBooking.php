<?php
    //global $posterId, $bookerId, $listingId, $bookingState, $bookingTimestamp, $errorMsg, $success;

    // $posterId = $username;
    $bookingId = 1; // change to null to post to database for real
    $bookerId = 1;
    $bookingState = "Confirmed";
    $bookingTimestamp = date('Y-m-d H:i:s');

    // Prepare the statement:
    $stmt = $conn->prepare("INSERT INTO venuehive.bookings (bookingId, posterId, bookerId, listingId, bookingState, bookingTimestamp) VALUES (?, ?, ?, ?, ?, ?);");
    // Bind & execute the query statement:
    $stmt->bind_param("ssssss", $bookingId, $posterId, $bookerId, $listingId, $bookingState, $bookingTimestamp);
    if (!$stmt->execute()) {
        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        $success = false;
    } else {
//        $bookingId = mysqli_insert_id($conn); // uncomment to post to database for real
    }
    $stmt->close();
?>