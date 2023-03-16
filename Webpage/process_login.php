<?php
$errorMsg = "";
$success = true;

$fname = filter_input(INPUT_GET, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lname = filter_input(INPUT_GET, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$pwd = filter_input(INPUT_GET, 'pwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pwd_confirm = filter_input(INPUT_GET, 'pwd_confirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

/*
 * Helper function to authenticate the login.
 */

function authenticateUser() {
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
    // Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        // Prepare the statement:
        $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE 
email=?");
        // Bind & execute the query statement:
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Note that email field is unique, so should only have
            // one row in the result set.
            $row = $result->fetch_assoc();
            $fname = $row["fname"];
            $lname = $row["lname"];
            $pwd_hashed = $row["password"];
            // Check if the password matches:
            if (!password_verify($_GET["pwd"], $pwd_hashed)) {
                // Don't be too specific with the error message - hackers don't
                // need to know which one they got right or wrong. :)
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            }
        } else {
            $errorMsg = "Email not found or password doesn't match...";
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

authenticateUser();
?>

<html>
    <head>
        <title>Login Results</title>
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
    echo "<h2>Welcome " . $fname . " " . $lname . "!</h2>";
    echo "<p>You are now logged in.</p>";
} else {
    echo "<h2>Oops!</h2>";
    echo "<h4>The following errors were detected:</h4>";
    echo "<p>" . $errorMsg . "</p>";
    echo "<a href='login.php' class='btn btn-danger'>Return to login</a>";
}
?>
    </main>
    <br>

        <?php
        include "footer.php";
        ?>

</html>
