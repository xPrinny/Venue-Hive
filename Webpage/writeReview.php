<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Write a Review</title>
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

            if ($success) {
                $bookingId = $_GET["bookingId"];
                include "utils/getBookingInfo.php";
            }

            $bookingId = $row["bookingId"];
            $listingName = $row["listingName"];
            $listingImg = $row["imagePath"];
            $listingPrice = $row["listingPrice"];
            
            if ($_SESSION["username"] === $row["booker"]) {
                $receiverUn = $row["poster"];
                $role = "booker";
            } else {
                $receiverUn = $row["booker"];
                $role = "poster";
            }
            $conn->close();
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5">
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Leave a Review for <?php echo $receiverName?></h5>
                                <hr>
                                <form>
                                    <div class="form-group row">
                                        <label for="listingName" class="col-sm-2 col-form-label">Listing Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="listingName" value="<?php echo $listingName?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bookingDate" class="col-sm-2 col-form-label">Booking Date</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="bookingDate" value="<?php echo $bookingDate?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rating">Star Rating</label>
                                        <input type="hidden" name="rating" id="rating">
                                        <div class="rating">
                                          <i class="bi bi-star customYellow" data-rating="1"></i>
                                          <i class="bi bi-star customYellow" data-rating="2"></i>
                                          <i class="bi bi-star customYellow" data-rating="3"></i>
                                          <i class="bi bi-star customYellow" data-rating="4"></i>
                                          <i class="bi bi-star customYellow" data-rating="5"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="reviewInput">Review</label>
                                        <textarea class="form-control" id="reviewInput" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 float-right">Submit Review</button>
                                </form>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Your Booking</h5>
                                <hr/>
                                <div class="row align-items-start">
                                    <div class="card itemBorderless">
                                        <img src="<?php echo $listingImg?>" class="card-img-top card-img-thumbnail" alt="...">
                                        <div class="card-body" id="card-body-text">
                                            <p class="card-text"><?php echo $bListingName; ?></p>
                                            <p class="card-text"><?php echo $bookingDate; ?></p>
                                            <p class="card-text lead fs-6">$ <?php echo $bListingPrice; ?></p>
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
