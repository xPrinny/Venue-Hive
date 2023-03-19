   <?php 
    // Prepare statement that gets item information
   $user = filter_input(INPUT_GET, "u");
   $stmt = $conn->prepare("SELECT reviewOwnerId, ratingStar, ratingComment, a.username as 'reviewOwner', b.username as 'recievedUser', c.listingName FROM reviews
           INNER JOIN members a ON reviewOwnerId = a.memberId INNER JOIN members b ON reviewRecieveId = b.memberId INNER JOIN listings c ON reviewListId = c.listingId
           WHERE reviewOwnerId = " . $user . " OR reviewRecieveId = " . $user);
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