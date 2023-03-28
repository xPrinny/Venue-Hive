<!doctype html>
<html lang="en">

<head>
    <title>Register as Member</title>
    <?php include "head.inc.php"; ?>
     <!-- Bootstrap core JS-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php include "navbar.php"; ?>

    <!-- Login Modal-->
    <?php include "login.php"; ?>

    <header class="masthead">
        <div class="container px-5">
            <h1>Member Registration</h1>
            <p>
                For existing members, please
                <a href="#" data-bs-toggle="modal" data-bs-target="#feedbackModal">Log In</a> instead.
            </p>
            <form action="process_register.php" method="post" novalidate class="my-form">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input class="form-control" type="text" id="fname" maxlength="45" name="fname" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input class="form-control" type="text" id="lname" required maxlength="45" name="lname" placeholder="Enter last name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" id="username" required maxlength="45" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" required name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="pwd_confirm">Confirm Password:</label>
                    <input class="form-control" type="password" id="pwd_confirm" required name="pwd_confirm" placeholder="Confirm password" required>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="agree" required>
                        Agree to terms and conditions.
                    </label>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </header>
    <!-- Footer-->
    <?php include "footer.php"; ?>


</body>
    
   
</html>