<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Settings</title>
        <?php include "head.inc.php"; ?>
    </head>
    <body id="page-top">
        <?php include "utils/authCheck.php"; ?>

        <!-- Navigation-->
        <?php include "navbar.php";?>

        <!-- Login Modal-->
        <?php include "login.php"; ?>


        <!-- Profile Information -->
        <?php 
            include "utils/loadDB.php";
            $_SESSION['fromSetting'] = True;

            if ($success) {
                include "utils/getUser.php";
                $firstName = $result["firstName"];
                $lastName = $result["lastName"];
                $email = $result["email"];
                $profilePicture = $result["profilePicture"];
                $newsletter = $result["newsletter"];
            }
            $conn->close();
        ?>

        <?php
            if ($_SESSION["modifyCode"] == 1) {
                echo '<div class="alert alert-success loginAlert" role="alert">Update succesful!</div>';
                $_SESSION["modifyCode"] = null;
            } else if ($_SESSION["modifyCode"] == 2) {
                echo '<div class="alert alert-warning loginAlert" role="alert">Password not updated!</div>';
                $_SESSION["modifyCode"] = null;
            } else if ($_SESSION["modifyCode"] == 3) {
                echo '<div class="alert alert-danger loginAlert" role="alert">Update failed!</div>';
                $_SESSION["modifyCode"] = null;
            }
        ?>


        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="card shadow" id="editProfileName">
                            <div class="card-img-top-icon">
                                <img src="<?php echo $profilePicture; ?>" class="card-img-top-icon" alt="Profile Picture">
                            </div>
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
                                <hr>
                                <form id="settingUpdate" action="utils/modifyAccount">
                                    <div class="form-inline">
                                        <div class="form-group col-md-5 mb-3 me-md-5">
                                            <label for="inputFirstName" class=" mb-2">First Name</label>
                                            <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="First Name" autocomplete="off" value=<?php echo "$firstName"; ?>>
                                        </div> 
                                        <div class="form-group col-md-5 mb-2">
                                            <label for="inputLastName" class=" mb-2">Last Name</label>
                                            <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last Name" autocomplete="off" value=<?php echo "$lastName"; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 mb-2">
                                        <label for="inputEmail" class=" mb-2">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" autocomplete="off" value=<?php echo "$email"; ?>>
                                    </div>
                                    <hr class="hr-med">
                                    <div class="form-inline">
                                        <div class="form-group col-md-5 mb-3 me-md-5">
                                            <label for="inputPassword" class="mb-2">New Password</label>
                                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^[^<>\s]{8,16}$" title="Must contain at least one uppercase and lowercase letter, one number, 8 to 16 characters, and does not contain '<>'." placeholder="New Password">
                                        </div>
                                        <div class="form-group col-md-5 mb-2">
                                            <label for="inputPasswordConfirm" class="mb-2">New Password Confirmation</label>
                                            <input type="password" class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^[^<>\s]{8,16}$" placeholder="Confirmation">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 mb-2">
                                        <label for="inputPassword" class="mb-2">Old Password</label>
                                        <input type="password" class="form-control" id="inputOldPassword" name="inputOldPassword" placeholder="Old Password">
                                    </div>
                                    <input hidden type="text" class="form-control" id="username" name="username"><br>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </form>
                            </div>
                            <div class="card-body" id="accountSettings" style="display: none;">
                                <h5 class="card-title">Account Preference</h5><hr>
                                <form id="settingPreference" action="utils/modifyAccount">
                                    <div class="form-check">
                                        <p><u>Newsletter</u></p>
                                        <input class="form-check-input" type="checkbox" value="" id="newsletterCheck" name="newsletterCheck"
                                        <?php if ($newsletter) { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="newsletterCheck">
                                          Join our newsletter to stay up to date with the latest news and updates to our site.
                                        </label>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Update Preference</button>
                                </form>
                                <hr class="hr-med">
                                <label for="accountDelete" class=" mb-2">Account deletion</label><br>
                                Are you sure you want to delete your whole account?<br><br>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-customYellow p-4">
                                <h5 class="modal-title font-alt" id="deleteListingTitle">Delete Account</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body border-0 p-4">
                                <h4>Are you sure you want to delete your account?</h4>
                                Are you sure you want to delete your whole account? This action cannot be undone and you'll lose everything you have gathered in your account.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-danger" id="deleteAccountBtn">Yes</button>
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
