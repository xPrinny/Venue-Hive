<?php 
    // Prepare statement that gets user
    $stmt = $conn->prepare("SELECT username, firstName, lastName, email FROM members WHERE memberId=1;");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $errorMsg = "No listings in database!";
        $success = false;
    }
     $result =  $result->fetch_assoc();
    $stmt->close();
?>