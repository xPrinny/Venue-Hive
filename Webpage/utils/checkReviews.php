<?php
    include "utils/loadDB.php";
    
    // Query the bookings for the current user
    $userId = $_SESSION['userId'];
    $query = "SELECT * FROM bookings WHERE bookerId = $userId OR posterId = $userId";
    $result = mysqli_query($conn, $query);

    // Initialize an array to store the booking IDs for which the "write review" button should be displayed
    $writeReviewIds = array();
    
    // Loop through the bookings and check for the booking date and review status
    while ($row = mysqli_fetch_assoc($result)) {
        $bookingState = $row['BookingState'];
        $bookingId = intval($row['bookingId']);
        
        // Check if the booking date has passed
        if ($bookingState === "Completed") {
            
            // Check if the user has already written a review for this booking
            $query = "SELECT * FROM reviews WHERE reviewOwnerId = $userId AND reviewBookId = $bookingId";
            $result2 = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result2) == 0) {
                // The user has not written a review yet, so add the booking ID to the array
                $writeReviewIds[] = $bookingId;
            }
        }
    }
?>