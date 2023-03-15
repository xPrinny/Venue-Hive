<?php
$errorMsg = "";
$success = true;

$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
if (empty($fname)) {
    $errorMsg .= "First name is required.<br>";
    $success = false;
}

$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
if (empty($lname)) {
    $errorMsg .= "Last name is required.<br>";
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

$pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
$pwd_confirm = filter_input(INPUT_POST, 'pwd_confirm', FILTER_SANITIZE_STRING);
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
        saveMemberToDB($fname, $lname, $email, $pwd_hashed);
    }
}

function sanitize_input($data) {
    $sanitized_data = trim($data);
    $sanitized_data = stripslashes($sanitized_data);
    $sanitized_data = htmlspecialchars($sanitized_data);
    return $sanitized_data;
}

function saveMemberToDB($fname, $lname, $email, $pwd_hashed) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        $stmt = $conn->prepare("INSERT INTO world_of_pets_members (fname, lname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
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
?>
    <main class="container">
        <hr>
<?php
if ($success) {
    echo "<h2>Your registration is successful!</h2>";
    echo "<h4>Thank you for signing up, " . $fname . " " . $lname . ".</h4>";
    echo "<a href='login.php' class='btn btn-success'>Log in</a>";
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

</html>