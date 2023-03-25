<?php 
    include "authCheck.php";

    $success = true;
    $username = $_SESSION['username'];

    // Loads database
    include "utils/loadDB.php";

    if ($success) {
        $preparedStatement = "";
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