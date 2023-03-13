<?php 
    // prepare statement. gets first n (10) listings from listings table
    $stmt = $conn->prepare("SELECT username, firstName, lastName FROM members WHERE memberId=1;");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $errorMsg = "No listings in database!";
        $success = false;
    }
     $result =  $result->fetch_assoc();
    $stmt->close();
?>