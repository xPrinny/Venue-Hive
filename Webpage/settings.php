<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Venue Hive - Home</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&family=Roboto+Condensed&display=swap" rel="stylesheet"> 
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- JQuery 3.6.4-->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>
    </head>
    <body id="page-top">
        
        <!-- Navigation-->
        <?php include "navbar.php";?>

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
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="card shadow" id="userProfile">
                            <img src="others/pfp.jpg" class="card-img-top rounded-circle" alt="...">
                            <div class="card-header text-white bg-gradient-primary-to-secondary text-center">
                                <h5 data-editable class="card-title text-center"><?php echo $username; ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action active" id="item1">Update Account</a>
                                    <a href="#" class="list-group-item list-group-item-action" id="item2">Account Settings</a>
                                    <a href="#" class="list-group-item list-group-item-action" id="item3">Delete Account</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow" id="userProfile">
                            <div class="card-body">
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
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
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
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Footer-->
        <?php include "footer.php";?>

        <!-- Feedback Modal-->
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>