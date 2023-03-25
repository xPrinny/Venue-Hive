<?php
    $success = true;
    $username = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwdHash = "";

    if ($username == null || $pwd == null) {
        header("Location: /");
        die();
    }

    // Loads database
    include "loadDB.php";

    if ($success) {
        $stmt = $conn->prepare("SELECT password FROM members WHERE username = '" . $username . "';");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            $errorMsg = "No listings in database!";
            $success = false;
        }
        $result =  $result->fetch_assoc();
        $stmt->close();

        $pwdHash = $result["password"];

        // Destroy and make a new session
        session_start();
        session_destroy();
        session_start();
    }
    $conn->close();

    if (password_verify($pwd, $pwdHash)) {
        // Store session data
        $_SESSION['create_time'] = time();
        $_SESSION['username'] = $username;
        $_SESSION["loginStatus"] = "success";

        header("Location: /");
        die();
    }

    $_SESSION["loginStatus"] = "fail";
    header("Location: /");
    die();
?>