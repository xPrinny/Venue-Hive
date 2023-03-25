<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Checkout</title>
        <?php include "head.inc.php"; ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>

        <!-- Login Modal-->
        <?php include "login.php"; ?>

        <?php include "authCheck.php"; ?>

        <!-- Profile Information -->
        <?php 
            $listingId = $_GET['listingId'];
            $bookingDate = $_GET['bookingDate'];
            
            global $listingName, $listingPrice, $username;

            include "utils/loadDB.php";

            if ($success) {
                include "utils/getListingInfo.php";
                
                $listingName = $row["listingName"];
                $listingPrice = $row["listingPrice"];
                $username = $row["username"];
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
                                    <input class="form-check-input" type="radio" name="paymentRadio" id="creditCard" value="ccForm">
                                    <label class="form-check-label" for="creditCardRadio">
                                    Credit Card
                                    </label>
                                </div>
                                <div class="form-check ms-3 mt-3">
                                    <input class="form-check-input" type="radio" name="paymentRadio" id="cashOnDelivery" value="codForm">
                                    <label class="form-check-label" for="cashOnDeliveryRadio">
                                    Cash on Delivery
                                    </label>
                                </div>
                                <div class="card-body" id="creditCardInfo" style="display: none;">
                                    <hr class="hr-sm">
                                    <form id="ccForm" action="confirmation.php" method="post">
                                        <div class="mb-3">
                                          <label for="creditCardInput" class="form-label">Card Number</label>
                                          <input class="form-control" type="tel" name="ccno" placeholder="XXXXXXXXXXXXXXXX" pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}|(?:2131|1800|35\d{3})\d{11})$" title="Please enter a Credit Card number." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nameInput" class="form-label" class="form-label">Name on card</label>
                                            <input class="form-control" type="tel" placeholder="Name on card" title="Please enter the name on the Credit Card." required>
                                        </div>
                                        <div class="form-inline">
                                            <div class="mb-3 col-lg-5">
                                                <label for="expirationInput" class="form-label" class="form-label">Expiration Date (MM/YY)</label><br>
                                                <input class="form-control ccForm" type="tel" minlength="2" maxlength="2" size="2" placeholder="MM" pattern="^[0-9]*$" title="Please enter the month of expiry" required> / <input class="form-control ccForm" type="tel" minlength="2" maxlength="2" size="2" placeholder="YY" pattern="^[0-9]*$" title="Please enter the year of expiry (Last two digit)" required>
                                            </div>
                                            <div class="mb-3 col-lg-5">
                                                <label for="verificationInput" class="form-label" class="form-label">Card Verification Number (CVV)</label><br>   
                                                <input class="form-control ccForm" type="tel" minlength="3" maxlength="3" size="3" placeholder="CVC" pattern="^[0-9]*$" title="Please enter the credit card verficiation number" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="cclistingId" value="<?php echo $listingId ?>">
                                        <input type="hidden" name="ccbookingDate" value="<?php echo $bookingDate ?>">
                                        <input type="hidden" name="ccpaymentType" value="cc">
                                    </form>
                                </div>
                                <form id="codForm" action="confirmation.php" method="get">
                                    <input type="hidden" name="listingId" id="listingId" value="<?php echo $listingId ?>">
                                    <input type="hidden" name="bookingDate" id="bookingDate" value="<?php echo $bookingDate ?>">
                                    <input type="hidden" name="paymentType" id="paymentType" value="cod">
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
                                                <p class="card-text"><?php echo $bookingDate; ?></p>
                                                <p class="card-text lead fs-6">$ <?php echo $listingPrice; ?></p>
                                            </div>
                                            <br><button id="paymentFormBtn" class="btn btn-primary float-end">Place order now</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                }
                        $conn->close();
                    ?>
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
