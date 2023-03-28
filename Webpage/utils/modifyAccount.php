<?php 
    include "authCheck.php";

    $success = true;
    $username = $_SESSION['username'];
    $_SESSION['fromSetting'] = True;
    $_SESSION['modifyCode'] = 3;

    // Loads database
    include "loadDB.php";

    if ($success) {
        include "getUser.php";

        if ($success) {
            $_SESSION['fromSetting'] = null;
            $_SESSION['modifyCode'] = 1;
            
            $firstName = $result["firstName"];
            $lastName = $result["lastName"];
            $email = $result["email"];
            $newsletter = $result["newsletter"];
            $hashPassword = $result["password"];
            $username = $result['username'];

            $inputFirstName = filter_input(INPUT_POST, "inputFirstName", FILTER_SANITIZE_SPECIAL_CHARS);
            $inputLastName = filter_input(INPUT_POST, "inputLastName", FILTER_SANITIZE_SPECIAL_CHARS);
            $inputEmail = filter_input(INPUT_POST, "inputEmail", FILTER_SANITIZE_EMAIL);
            $inputPassword = filter_input(INPUT_POST, "inputPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $inputPasswordConfirm = filter_input(INPUT_POST, "inputPasswordConfirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $inputOldPassword = filter_input(INPUT_POST, "inputOldPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $inputUsername = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $newsletterCheck = isset($_POST['newsletterCheck']);
            $preparedStatement = "UPDATE members SET ";

            if ($firstName != $inputFirstName) {
                $preparedStatement .= "firstName = '" . $inputFirstName . "', ";
            }
            if ($lastName != $inputLastName) {
                $preparedStatement .= "lastName = '" . $inputLastName . "', ";
            }
            if ($email != $inputEmail) {
                $preparedStatement .= "email = '" . $inputEmail . "', ";
            }
            if ($inputPassword != "" || $inputPasswordConfirm != "" || $inputOldPassword != "") {
                $_SESSION['modifyCode'] = 2;
                if ($inputPassword == $inputPasswordConfirm && password_verify($inputOldPassword, $hashPassword)) {
                    $preparedStatement .= "password = '" . password_hash($inputPassword, PASSWORD_DEFAULT) . "', ";
                    $_SESSION['modifyCode'] = 1;
                }
            }
            if ($username != $inputUsername && $inputUsername != "") {
                $preparedStatement .= "username = '" . $inputUsername . "', ";
                $_SESSION['username'] = $inputUsername;
            }
            if ($newsletter != $newsletterCheck) {
                $preparedStatement .= "newsletter = '" . $newsletterCheck . "', ";
            }

            // Check if any changes to be made to the database
            if (substr($preparedStatement, -4) == "SET ") {
                die();
            } else {
                $preparedStatement = substr($preparedStatement, 0, -2);
                $stmt = $conn->prepare($preparedStatement . " WHERE username = '" . $username . "';");
                $stmt->execute();
                if ($stmt->affected_rows == 0) {
                    $errorMsg = "No listings in database!";
                    $success = false;
                    $_SESSION['modifyCode'] = 3;
                }
                $stmt->close();
                die();
            }
        }
    }
?>