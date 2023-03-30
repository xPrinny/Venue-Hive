<?php 
    include "utils/loadDB.php";

    $stmt = $conn->prepare("SELECT bookingDate FROM bookings WHERE bookingId = " . $bookingId . ";");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $currDate = date('Y-m-d');
    $bookingDate = $result["bookingDate"];

    if ($currDate > $bookingDate) {
        // echo "EXPIRED.";
        $stmt = $conn->prepare("UPDATE bookings SET bookingState = 'Completed' WHERE bookingId = " . $bookingId . ";");
        $stmt->execute();
    }
?>