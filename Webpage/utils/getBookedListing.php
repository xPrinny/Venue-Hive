<?php 
    include "utils/authCheck.php";

    $listingId = $_POST['listingId'];

    // prepare statement. gets all info from listings table for relevant listing Id
    $stmt = $conn->prepare("SELECT a.*,  b.username FROM venuehive.listings a INNER JOIN venuehive.members b on a.listingOwnerId = b.memberId WHERE listingId = " . $listingId . ";");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
    }
    $stmt->close();
?>