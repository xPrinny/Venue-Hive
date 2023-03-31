<?php 

    $listingId = $_GET['listingId'];

    // prepare statement. gets all info from listings table for relevant listing Id
    $stmt = $conn->prepare("SELECT a.*,  b.username FROM venuehive.listings a INNER JOIN venuehive.members b on a.listingOwnerId = b.memberId WHERE listingId = ?;");
    $stmt->bind_param("i", $listingId);
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