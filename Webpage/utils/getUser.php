<?php 
    // Prepare statement that gets user
    $username = filter_input(INPUT_GET, "u");
    if ($_SESSION['fromSetting']) {
        $username = $_SESSION['username'];
        $_SESSION['fromSetting'] = null;
    }

    $stmt = $conn->prepare("SELECT username, firstName, lastName, email, profilePicture, newsletter,
                            password FROM members WHERE username='" . $username . "';");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $errorMsg = "No listings in database!";
        $success = false;
    }
    $result =  $result->fetch_assoc();
    $stmt->close();
?>