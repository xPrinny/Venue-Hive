<?php 
    include "utils/loadDB.php";

// temp workaround, just leave it first
    $listingId = $_POST['listingId'];
    $bookingDate = $_POST['bookingDate'];
    $paymentType = $_POST['paymentType'];
    $posterId = $_POST['posterId'];

    // // prepare statement. gets all info from listings table for relevant listing Id
    // // $stmt = $conn->prepare("SELECT a.*,  b.username FROM venuehive.listings a INNER JOIN venuehive.members b on a.listingOwnerId = b.memberId WHERE listingId = " . $listingId . ";");
    $stmt = $conn->prepare("SELECT * FROM venuehive.listings WHERE listingId = " . $listingId . ";");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
    }
    $stmt->close();

    // $listingName = $row["listingName"];
    // $listingPrice = $row["listingPrice"];
    $posterId = $row["listingOwnerId"];
    $listingImg = $row["imagePath"];

    // $bookingId = null;
    $bookerId = $_SESSION["userId"]; //placeholder
    $bookingState = "Confirmed";
    $bookingTimestamp = date('Y-m-d H:i:s');

    // Prepare the statement:
    $stmt = $conn->prepare("INSERT INTO venuehive.bookings (posterId, bookerId, listingId, BookingState, BookingTimestamp, bookingDate, paymentType) VALUES (?, ?, ?, ?, ?, ?, ?);");
    // Bind & execute the query statement:
    $stmt->bind_param("iiissss", $posterId, $bookerId, $listingId, $bookingState, $bookingTimestamp, $bookingDate, $paymentType);
    if (!$stmt->execute()) {
        // $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        $errorMsg = "Failed to make booking. Please try again.";
        $success = false;
    } else {
       $bookingId = mysqli_insert_id($conn);
    }
    $stmt->close();
?>