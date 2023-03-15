   <?php 
    // Prepare statement that gets item information
   $stmt = $conn->prepare("SELECT reviewOwnerId, ratingStar, ratingComment FROM reviews WHERE reviewOwnerId = " . filter_input(INPUT_GET, "u") .
           " OR reviewRecieveId = " . filter_input(INPUT_GET, "u") . ";");
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