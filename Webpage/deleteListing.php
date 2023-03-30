<?php 
    include "utils/authCheck.php";
    include "utils/loadDB.php";

    if (isset($_POST['listingId'])) {
        $listingId = $_POST['listingId'];

        $stmt = $conn->prepare("DELETE FROM venuehive.listings WHERE listingId = ?;");
        $stmt->bind_param("i", $listingId);
        
        if (!$stmt->execute()) {
            $response = array('success' => false, 'error' => $stmt->error);
        } else {
            $response = array('success' => true);
        }
        $stmt->close();
        
        echo json_encode($response);
        exit;
    } else {
        $response = array('success' => false, 'error' => 'Missing listingId parameter');
        echo json_encode($response);
        exit;
    }
?>