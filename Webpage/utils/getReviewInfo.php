<?php 

    $stmt = $conn->prepare("SELECT a.*,  b.username AS 'booker', b.userId AS 'bookerId', 
    c.username AS 'poster', c.userId AS 'posterId', d.listingName, d.listingPrice, d.imagePath 
    FROM (((venuehive.bookings a 
    INNER JOIN venuehive.members b on a.bookerId = b.memberId)
    INNER JOIN venuehive.members c on a.posterId = c.memberId)
    INNER JOIN venuehive.listings d on a.listingId = d.listingId)
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