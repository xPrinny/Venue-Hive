<?php
$errorMsg = "";
$success = true;

$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (empty($fname)) {
    $errorMsg .= "First name is required.<br>";
    $success = false;
}

$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (empty($lname)) {
    $errorMsg .= "Last name is required.<br>";
    $success = false;
}

$username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (empty($username)) {
    $errorMsg .= "Username is required.<br>";
    $success = false;
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
if (empty($email)) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format. <br>";
        $success = false;
    }
}

$pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pwd_confirm = filter_input(INPUT_POST, 'pwd_confirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (empty($pwd) || empty($pwd_confirm)) {
    $errorMsg .= "Password and confirmation are required.<br>";
    $success = false;
} else {
    if ($pwd != $pwd_confirm) {
        $errorMsg .= "Passwords do not match.<br>";
        $success = false;
    } else {
        $pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);
    }

    if ($success) {
        saveMemberToDB($fname, $lname, $username, $email, $pwd_hashed);
    }
}

function sanitize_input($data) {
    $sanitized_data = trim($data);
    $sanitized_data = stripslashes($sanitized_data);
    $sanitized_data = htmlspecialchars($sanitized_data);
    return $sanitized_data;
}

function saveMemberToDB($fname, $lname, $username, $email, $pwd_hashed) {
    include "utils/loadDB.php";

    if ($success) {
            $stmt = $conn->prepare("INSERT INTO members (firstName, lastName, username, email, password, profilePicture, newsletter)
            VALUES (?, ?, ?, ?, ?, ?, 0)");
            $profilePic = "assets/userprofile/default.jpg";
            $stmt->bind_param("ssssss", $fname, $lname, $username, $email, $pwd_hashed, $profilePic);
        echo $stmt->errno;
        if (!$stmt->execute()) {
            // $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $errorMsg = "Something went wrong with the servers. Please try again later.";
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<html>
    <head>
        <title>Registration Results</title>
<?php
include "head.inc.php";
?>
    </head>

<?php
include "navbar.php";
include "login.php";
?>
    <main class="container mt-5">
        <hr>
<?php
if ($success) {
    echo "<h2>Your registration is successful!</h2>";
    echo "<h4>Thank you for signing up, " . $fname . " " . $lname . ".</h4>";
    echo "<a href='#' data-bs-toggle='modal' data-bs-target='#feedbackModal'>Log In</a>";
} else {
    echo "<h2>Oops!</h2>";
    echo "<h4>The following errors were detected:</h4>";
    echo "<p>" . $errorMsg . "</p>";
    echo "<a href='register.php' class='btn btn-danger'>Return to sign up</a>";
}
?>
    </main>
    <br>
<?php
include "footer.php";
?>

<!-- Tempfix for Footer -->
<style>
footer {
    bottom: 0;
    position: fixed;
    width: 100%;
}
</style>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS -->
<script src="js/scripts.js"></script>
</html>