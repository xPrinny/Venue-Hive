<?php 
    // Prepare statement that gets user
    $stmt = $conn->prepare("SELECT username, firstName, lastName, email FROM members WHERE memberId= " . filter_input(INPUT_GET, "u") . ";");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $errorMsg = "No listings in database!";
        $success = false;
    }
     $result =  $result->fetch_assoc();
    $stmt->close();
?>