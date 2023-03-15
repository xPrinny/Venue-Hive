<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Venue Hive - Checkout</title>
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
                include "utils/getItem.php";
            }
            $conn->close();
            $listingName = $result["listingName"];
            $listingPrice = $result["listingPrice"];
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5">
                    <div class="col-lg-9">
                        <div class="card shadow" id="paymentBody">
                            <div class="card-body" id="itemListings">
                                <h5 class="card-title">Choose payment type</h5>
                                <hr/>
                                <div class="form-check ms-3 mt-3">
                                    <input class="form-check-input" type="radio" name="paymentRadio" id="creditCard">
                                    <label class="form-check-label" for="creditCardRadio">
                                    Credit Card
                                    </label>
                                </div>
                                <div class="form-check ms-3 mt-3">
                                    <input class="form-check-input" type="radio" name="paymentRadio" id="cashOnDelivery">
                                    <label class="form-check-label" for="cashOnDeliveryRadio">
                                    Cash on Delivery
                                    </label>
                                </div>
                                <div class="card-body" id="creditCardInfo" style="display: none;">
                                    <hr class="hr-sm">
                                    <form id="ccForm" action="#" method="post">
                                        <div class="mb-3">
                                          <label for="creditCardInput" class="form-label">Card Number</label>
                                          <input class="form-control" type="tel" name="ccno" placeholder="XXXXXXXXXXXXXXXX" pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}|(?:2131|1800|35\d{3})\d{11})$" title="Please enter a Credit Card number." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="expirationInput" class="form-label" class="form-label">Name on card</label>
                                            <input class="form-control" type="tel" placeholder="Name on card" title="Please enter the name on the Credit Card." required>
                                        </div>
                                        <div class="form-inline">
                                            <div class="mb-3 col-lg-5">
                                                <label for="expirationInput" class="form-label" class="form-label">Expiration Date (MM/YY)</label><br>
                                                <input class="form-control ccForm" type="tel" minlength="2" maxlength="2" size="2" placeholder="MM" pattern="^[0-9]*$" title="Please enter the month of expiry" required> / <input class="form-control ccForm"    type="tel" minlength="2" maxlength="2" size="2" placeholder="YY" pattern="^[0-9]*$" title="Please enter the year of expiry (Last two digit)" required>
                                            </div>
                                            <div class="mb-3 col-lg-5">
                                                <label for="expirationInput" class="form-label" class="form-label">Card Verification Number (CVV)</label><br>   
                                                <input class="form-control ccForm" type="tel" minlength="3" maxlength="3" size="3" placeholder="CVC" pattern="^[0-9]*$" title="Please enter the credit card verficiation number" required>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <form id="codForm" action="#" method="post">
                                    <input type="hidden" value="cod">
                                </form>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow" id="paymentSide">
                            <div class="card-body" id="itemListings">
                                <h5 class="card-title">Your order</h5>
                                <hr/>
                                <div class="row align-items-start">
                                        <div class="card itemBorderless">
                                            <img src="assets/property-1.jpg" class="card-img-top card-img-thumbnail" alt="...">
                                            <div class="card-body" id="card-body-text">
                                                <p class="card-text"><?php echo $listingName; ?></p>
                                                <p class="card-text lead fs-6">$ <?php echo $listingPrice; ?></p>
                                            </div>
                                            <br><button type="submit" id="paymentFormBtn" form="" class="btn btn-primary float-end">Place order now</button>
                                        </div>
                                </div>
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
