<?php 
//    $userID = $_SESSION['userId'];
    $userId = 1;

    $stmt = $conn->prepare("SELECT a.*, b.username AS 'booker', c.username AS 'poster', d.imagePath, d.listingName, d.startdate, d.enddate, d.valid
    FROM ((( venuehive.bookings a
    INNER JOIN members b ON a.bookerId = b.memberId)
    INNER JOIN members c ON a.posterId = c.memberId)
    INNER JOIN listings d ON a.listingId = d.listingId)
    WHERE a.bookerId = ? OR a.posterId = ? ORDER BY a.BookingTimestamp DESC");
    $stmt->bind_param("ii", $userId, $userId);
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