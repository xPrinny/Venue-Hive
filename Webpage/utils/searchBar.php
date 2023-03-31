<?php

    $filtervalues = $_POST['search'];
    $stmt = $conn->prepare("SELECT * FROM venuehive.listings WHERE valid = 1 AND listingName LIKE '%$filtervalues%' ORDER BY listingName ASC;");
    // $searchTerm = "'%" . $filtervalues . "%'";
    // $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }
    else
    {
        echo "<h5>No Listings Found!</h5>";
    }
    $stmt->close();

?>