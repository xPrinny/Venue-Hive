<!doctype html>
<html lang="en">

<head>
    <title>Register as Member</title>
    <?php include "head.inc.php"; ?>
</head>

<body>

    <?php include "navbar.php"; ?>

    <header class="masthead">
        <div class="container px-5">
            <h1>Member Registration</h1>
            <p>
                For existing members, please go to
                <a href="login.php">Log In</a>.
            </p>
            <form action="process_register.php" method="post" novalidate class="my-form">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input class="form-control" type="text" id="fname" maxlength="45" name="fname" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input class="form-control" type="text" id="lname" required maxlength="45" name="lname" placeholder="Enter last name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" required name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="pwd_confirm">Confirm Password:</label>
                    <input class="form-control" type="password" id="pwd_confirm" required name="pwd_confirm" placeholder="Confirm password">
                </div>
                <div class="form-check">
                    <label>
                        <input type="checkbox" name="agree">
                        Agree to terms and conditions.
                    </label>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
            <!-- Footer-->
            <?php include "footer.php"; ?>
            </main>


</body>

</html>