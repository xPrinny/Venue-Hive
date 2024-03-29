<?php
    session_start(); 
    include "utils/authCheck.php";
    include "utils/loadDB.php";

    if ($success) {        
        $reviewId = null;
        $reviewPosterId = $_SESSION["userId"];
        $reviewReceiverId = $_POST["receiverId"];
        $listingId = $_POST["listingId"];
        $bookingId = $_POST["bookingId"];
        $ratingStar = $_POST["rating"];
        $ratingComment = $_POST["reviewInput"];

        // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO venuehive.reviews (reviewOwnerId, reviewRecieveId, reviewListId, ratingStar, ratingComment, reviewBookId) VALUES (?, ?, ?, ?, ?, ?);");
        // Bind & execute the query statement:
        $stmt->bind_param("iiiisi", $reviewPosterId, $reviewReceiverId, $listingId, $ratingStar, $ratingComment, $bookingId);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        } else {
        //    $reviewId = mysqli_insert_id($conn);
        }
        $stmt->close();
    }
    $conn->close();
    
    header("Location: /profile?u=".$_SESSION["username"]);
    exit;
?>