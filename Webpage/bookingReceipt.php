<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Booking Receipt</title>
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
                include "utils/getBookingInfo.php";
            }

            // $bookingId = $row["bookingId"];
            $memberName = $row["lastName"];
            $listingName = $row["listingName"];
            $listingPrice = $row["listingPrice"];
            $bookingDate = $row["bookingDate"];
            $paymentType = $row["paymentType"];
            $listingImg = $row["imagePath"];
            
            $conn->close();
        ?>

        <header class="masthead">
            <div class="container px-5" id="printableReceipt">
                <div class="row gx-5">
                    <div class="col-lg-9">
                        <div class="card shadow" id="paymentBody">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $memberName?>, here is your receipt!</h5>
                                <hr>
                                <h5 class="card-text">Your Booking ID is: <?php echo $bookingId?>.</h5>
                                <div class="card-body" id="bookingReceipt">
                                    <p>Your payment details:</p>
                                    <?php if ($paymentType == "cc") {?>
                                        <p>Payment method: Credit Card</p>
                                        <p>Amount paid: <?php echo $listingPrice?></p>
                                    <?php } else if ($paymentType == "cod") { ?>
                                        <p>Payment method: Cash on Delivery</p>
                                        <p>Date to make payment: <?php echo $bookingDate?></p>
                                        <p>Amount to be paid: <?php echo $listingPrice?></p>
                                    <?php } ?>
                                </div>
                                <input type="button" class="btn btn-primary ms-2 mb-2 mt-2" value="Print Receipt" onclick="PrintDiv();" />
                                <script>
                                    function PrintDiv() {    
                                        var divToPrint = document.getElementById('printableReceipt');
                                        var popupWin = window.open('', '_blank', 'width=800,height=600');
                                        popupWin.document.open();
                                        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                                        popupWin.document.close();
                                    }
                                </script>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow" id="paymentSide">
                            <div class="card-body">
                                <h5 class="card-title">Your order</h5>
                                <hr/>
                                <div class="row align-items-start">
                                        <div class="card itemBorderless">
                                            <img src="<?php echo $listingImg?>" class="card-img-top card-img-thumbnail" alt="...">
                                            <div class="card-body" id="card-body-text">
                                                <p class="card-text"><?php echo $listingName; ?></p>
                                                <p class="card-text"><?php echo $bookingDate; ?></p>
                                                <p class="card-text lead fs-6">S$ <?php echo $listingPrice; ?></p>
                                            </div>
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
