<?php 
    include "authCheck.php";

    $success = true;
    $_SESSION['fromSetting'] = True;

    // Loads database
    include "loadDB.php";

    if ($success) {
        $memberId = $_SESSION["userId"];
        $preparedStatement = "DELETE FROM members WHERE memberId = " . $memberId . ";";
        $stmt = $conn->prepare($preparedStatement);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            $success = false;
        }
        $stmt->close();

        session_start();
        session_destroy();
        session_start();
        die();
    }
?>