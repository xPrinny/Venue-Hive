<?php
    include "utils/authCheck.php";

    // Prepare statement that gets user
    $stmt = $conn->prepare("SELECT password FROM members WHERE username = '" . $username . "';");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $errorMsg = "No listings in database!";
        $success = false;
    }
    $result =  $result->fetch_assoc();
    $stmt->close();
?>