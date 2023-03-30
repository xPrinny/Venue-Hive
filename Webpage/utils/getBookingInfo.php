<?php 
    include "utils/authCheck.php";

    // prepare statement. gets all info from listings table for relevant listing Id
    $stmt = $conn->prepare("SELECT a.*, b.lastName,  b.username AS 'booker', c.username AS 'poster', 
    d.listingName, d.listingPrice, d.imagePath FROM (((venuehive.bookings a 
    INNER JOIN venuehive.members b on a.bookerId = b.memberId)
    INNER JOIN venuehive.members c on a.posterId = c.memberId)
    INNER JOIN venuehive.listings d on a.listingId = d.listingId)
    WHERE a.bookingId = ?;");
    $stmt->bind_param("i", $bookingId);
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