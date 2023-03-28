<?php 
    include "authCheck.php";

    $success = true;
    $_SESSION['fromSetting'] = True;

    // Loads database
    include "loadDB.php";

    if ($success) {
        include "getUser.php";

        if ($success) {
            session_start();
            session_destroy();
            session_start();
            
            $memberId = $result['memberId'];
            $preparedStatement = "DELETE FROM members WHERE memberId = " . $memberId . "';";
            $stmt = $conn->prepare($preparedStatement);
            $stmt->execute();
            if ($stmt->affected_rows == 0) {
                $success = false;
            }
            $stmt->close();
            die();
        }
    }
?>