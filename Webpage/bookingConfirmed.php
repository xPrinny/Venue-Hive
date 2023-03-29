<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Booking Confirmed</title>
        <?php include "head.inc.php"; ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>

        <!-- Login Modal-->
        <?php include "login.php"; ?>

        <?php include "authCheck.php"; ?>

        <?php
            include "utils/loadDB.php";

            $bookingId = $_POST["bookingId"];

            if ($success) {
                include "utils/newBooking.php";
            }
        ?>

        <header class="masthead">
            <div class="container px-5" id="printableReceipt">
                <div class="row gx-5">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Your Booking is Confirmed!</h5>
                                <hr>
                                <div class="row d-flex ms-2 me-2">
                                    <div class="col">
                                        <a href="index.php" class="btn customYellowBorderBtn">Back to Homepage</a>
                                    </div>
                                    <div class="col">
                                        <form action="bookingReceipt.php" method="post">
                                            <input type="hidden" name="bookingId" id="bookingId" value="<?php echo $bookingId; ?>">
                                            <button type="submit" class="btn btn-primary">View Booking Receipt</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <a href="allListings.php" class="btn customYellowBorderBtn">View More Listings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
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
