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
            <form action="process_register.php" onsubmit="return isPasswordMatch()" method="post" class="my-form">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input class="form-control" type="text" id="fname" maxlength="45" name="fname" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input class="form-control" type="text" id="lname" maxlength="45" name="lname" placeholder="Enter last name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" id="username" maxlength="45" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^[^<>\s]{8,16}$" title="Must contain at least one uppercase and lowercase letter, one number, 8 to 16 characters, and does not contain '<>'." placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^[^<>\s]{8,16}$" placeholder="Confirm password" required>
                </div>
                <div class="form-group col-lg-6 collapse" id="passwordCheck">
                    <b>Password must contain the following:</b>
                    <p id="lowercase" class="invalid"><b>A Lowercase letter</b></p>
                    <p id="uppercase" class="invalid"><b>An Uppercase letter</b></p>
                    <p id="number" class="invalid"><b>A Number</b></p>
                    <p id="length" class="invalid"><b>8 - 16 Characters</b></p>
                    <p id="nospecial" class="valid"><b>Does not contain invalid characters. &#x27;&lt; &gt;&#x27;</b></p>
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

    <script>
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        var lowercase = $("#lowercase").val();
        var uppercase = $("#uppercase").val();
        var number = $("#number").val();
        var length = $("#length").val();
        function isPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#confirmPassword").val();
            if (password != confirmPassword) {
                alert('Password does not match!');
                return false;
            }
            else {
                return true;
            }
        }
        $("#password").focus(function() {
            $("#passwordCheck").fadeIn(500);
        })
        $("#password").blur(function() {
            $("#passwordCheck").fadeOut(250);
        })
        $("#password").keyup(function() {
            password = $("#password").val();
            confirmPassword = $("#confirmPassword").val();
            // Validate lowercase letters
            if (password.match(/[a-z]/g)) { 
                $("#lowercase").attr("class", "valid");
            }
            else {
                $("#lowercase").attr("class", "invalid");
            }
            // Validate capital letters
            if (password.match(/[A-Z]/g)) {
                $("#uppercase").attr("class", "valid");
            }
            else {
                $("#uppercase").attr("class", "invalid");
            }
            // Validate numbers
            if (password.match(/[0-9]/g)) {
                $("#number").attr("class", "valid");
            }
            else {
                $("#number").attr("class", "invalid");
            }
  
            // Validate length
            if (password.length >= 8 && password.length <= 16) {
                $("#length").attr("class", "valid");
            }
            else {
                $("#length").attr("class", "invalid");
            }
            
            // Validate special to prevent xss
            if (password.match(/[<\s>]/g)) {
                $("#nospecial").attr("class", "invalid");
            }
            else {
                $("#nospecial").attr("class", "valid");
            }
            
            // Validate password check if changed.
            if (password == confirmPassword && confirmPassword.length != 0) {
                $("input[id=confirmPassword]").css("background-image", "url(images/success.png)");
            }
            else {
                $("input[id=confirmPassword]").css("background-image", "url(images/error.png)");
            }
        })
        $("#confirmPassword").keyup(function() {
            password = $("#password").val();
            confirmPassword = $("#confirmPassword").val();
            // Validate password check
            if (password == confirmPassword && confirmPassword.length != 0) {
                $("input[id=confirmPassword]").css("background-image", "url(images/success.png)");
            }
            else {
                $("input[id=confirmPassword]").css("background-image", "url(images/error.png)");
            }
        })
    </script>

</body>
</html>