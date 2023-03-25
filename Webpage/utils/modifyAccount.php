<?php 
    include "authCheck.php";

    $success = true;
    $username = $_SESSION['username'];

    // Loads database
    include "loadDB.php";
    $_SESSION['fromSetting'] = True;

    if ($success) {
        include "getUser.php";
        $_SESSION['fromSetting'] = null;
        
        $firstName = $result["firstName"];
        $lastName = $result["lastName"];
        $email = $result["email"];
        $newsletter = $result["newsletter"];

        $inputFirstName = filter_input(INPUT_POST, "inputFirstName");
        $inputLastName = filter_input(INPUT_POST, "inputLastName");
        $inputEmail = filter_input(INPUT_POST, "inputEmail");
        $inputPassword = filter_input(INPUT_POST, "inputPassword");
        $inputPasswordConfirm = filter_input(INPUT_POST, "inputPasswordConfirm");
        $inputOldPassword = filter_input(INPUT_POST, "inputOldPassword");
        $inputUsername = filter_input(INPUT_POST, "username");
        $newsletterCheck = isset($_POST['newsletterCheck']);
        $preparedStatement = "UPDATE members SET ";

        if ($firstName != $inputFirstName) {
            $preparedStatement .= "firstName = " . $inputFirstName . ", ";
        }
        if ($lastName != $inputLastName) {
            $preparedStatement .= "lastName = " . $inputLastName . ", ";
        }
        if ($email != $inputEmail) {
            $preparedStatement .= "email = " . $inputEmail . ", ";
        }
        // if ($firstName != $inputFirstName) {
            
        // }
        // if ($firstName != $inputFirstName) {
            
        // }
        // if ($firstName != $inputFirstName) {
            
        // }

        if ($username != $inputUsername) {
            $preparedStatement .= "username = " . $inputUsername . ", ";
        }
        if ($newsletter != $newsletterCheck) {
            $preparedStatement .= "newsletter = " . $newsletterCheck . ", ";
        }

        echo $preparedStatement;

        // $stmt = $conn->prepare($preparedStatement . " WHERE username = '" . $username . "';");
        // $stmt->execute();
        // $result = $stmt->get_result();
        // if ($result->num_rows == 0) {
        //     $errorMsg = "No listings in database!";
        //     $success = false;
        // }
        // $result =  $result->fetch_assoc();
        // $stmt->close();

        // $pwdHash = $result["password"];

    }
    // $conn->close();

    // if (password_verify($pwd, $pwdHash)) {
    //     // Store session data
    //     $_SESSION['create_time'] = time();
    //     $_SESSION['username'] = $username;
    //     $_SESSION["loginStatus"] = "success";

    //     header("Location: /");
    //     die();
    // }

    // $_SESSION["loginStatus"] = "fail";
    // header("Location: /");
    // die();
?>