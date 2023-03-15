   <?php 
    // Prepare statement that gets item information
    $stmt = $conn->prepare("SELECT listingName, listingPrice FROM listings WHERE listingId = " . filter_input(INPUT_GET, "order") . ";");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $errorMsg = "No listings in database!";
        $success = false;
    }
     $result =  $result->fetch_assoc();
    $stmt->close();
?>