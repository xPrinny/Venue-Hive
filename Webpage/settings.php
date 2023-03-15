<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Settings</title>
        <?php include "head.inc.php"; ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>

        <!-- Login Modal-->
        <?php include "login.php"; ?>

        <!-- Profile Information -->
        <?php 
            include "utils/loadDB.php";

            if ($success) {
                include "utils/getUser.php";
            }
            $conn->close();
            $username = $result["username"];
            $firstName = $result["firstName"];
            $lastName = $result["lastName"];
            $email = $result["email"];
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="card shadow" id="editProfileName">
                            <img src="others/pfp.jpg" class="card-img-top-icon rounded-circle" alt="...">
                            <div class="card-header text-white bg-customBrown text-center">
                                <h5 data-editable class="card-title text-center"><?php echo $username; ?><i class="bi bi-pencil-square fs-6 ms-1"></i></h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action active" id="item1">Update Account</a>
                                    <a href="#" class="list-group-item list-group-item-action" id="item2">Account Preference</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow" id="editUserProfile">
                            <div class="card-body" id="updateAccount">
                                <h5 class="card-title">Update Account</h5>
                                <hr/>
                                <form>
                                    <div class="form-inline">
                                        <div class="form-group col-md-5 mb-3 me-md-5">
                                            <label for="inputFirstName" class=" mb-2">First Name</label>
                                            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" autocomplete="off" value=<?php echo "$firstName"; ?>>
                                        </div> 
                                        <div class="form-group col-md-5 mb-2">
                                            <label for="inputLastName" class=" mb-2">Last Name</label>
                                            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" autocomplete="off" value=<?php echo "$lastName"; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 mb-2">
                                        <label for="inputEmail" class=" mb-2">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" autocomplete="off" value=<?php echo "$email"; ?>>
                                    </div>
                                    <hr class="hr-med">
                                    <div class="form-inline">
                                        <div class="form-group col-md-5 mb-3 me-md-5">
                                            <label for="inputPassword" class=" mb-2">New Password</label>
                                            <input type="password" class="form-control" id="inputPassword" placeholder="New Password">
                                        </div>
                                        <div class="form-group col-md-5 mb-2">
                                            <label for="inputPasswordConfirm" class=" mb-2">New Password Confirmation</label>
                                            <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmation">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 mb-2">
                                        <label for="inputPassword" class=" mb-2">Old Password</label>
                                        <input type="password" class="form-control" id="inputOldPassword" placeholder="Old Password">
                                    </div>
                                    <input hidden type="text" class="form-control" id="username"><br>
                                    <button type="submit" class="btn btn-primary">Update!</button>
                                </form>
                            </div>
                            <div class="card-body" id="accountSettings" style="display: none;">
                                <h5 class="card-title">Account Preference</h5><hr>
                                <form>
                                    <div class="form-check">
                                        <p><u>Newsletter</u></p>
                                        <input class="form-check-input" type="checkbox" value="" id="newsletterCheck">
                                        <label class="form-check-label" for="newsletterCheck">
                                          Join our newsletter to stay up to date with the latest news and updates to our site.
                                        </label>
                                    </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-primary">Update Preference</button>
                                </form>
                                <hr class="hr-med">
                                <label for="accountDelete" class=" mb-2">Account deletion</label><br>
                                Are you sure you want to delete your whole account? This action cannot be undone and you'll lose everything you have gathered in your account.<br><br>
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Footer-->
        <?php include "footer.php";?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
