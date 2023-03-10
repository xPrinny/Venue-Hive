<!doctype html>
<html lang="en">

<head>
    <?php
    include "head.inc.php";
    ?>
    <title>Register</title>
</head>

<body>
    <?php
    include "header.inc.php";
    include "nav.inc.php";
    ?>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1>Be part of VenueHive!</h1>
                    <h2>Discover your perfect event space. Provide venues of your own.</h2>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="process_register.php" method="post" novalidate>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "footer.inc.php";
    ?>
</body>

</html>