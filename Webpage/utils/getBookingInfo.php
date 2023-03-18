<?php 
    // prepare statement. gets all info from listings table for relevant listing Id
    $stmt = $conn->prepare("SELECT a.*,  b.lastName, c.listingName, c.listingPrice, c.imagePath FROM ((venuehive.bookings a 
    INNER JOIN venuehive.members b on a.bookerId = b.memberId)
    INNER JOIN venuehive.listings c on a.listingId = c.listingId)
    WHERE a.bookingId = ?;");
    $stmt->bind_param("s", $bookingId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
    }
    else
    {
        $errorMsg = "No listings in database!";
        $success = false;
    }
    $stmt->close();
?>