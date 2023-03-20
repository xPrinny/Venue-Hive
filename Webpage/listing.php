<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Listing</title>
        <?php include "head.inc.php"; ?>
        <!-- JQuery 3.6.4-->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>	
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>

        <?php 
            global $listingId, $listingName, $listingPrice, $listingInfo, $listingTag, $username;
            include "utils/loadDB.php";

            if ($success) {
                include "utils/getListingInfo.php";
            }
            $conn->close();
            
            $listingId = $row["listingId"];
            $listingName = $row["listingName"];
            $listingPrice = $row["listingPrice"];
            $listingInfo = $row["listingInfo"];
            $listingTag = $row["listingTag"];
            $username = $row["username"];            
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="listingImage">
                    <img class="" src="assets/property-2.jpg" alt="<?php echo $listingId?>" width="100%" height="300" style="object-fit:cover;">
                </div>
                <br>
                <div class="row gx-5">
                    <div class="col-lg-9">
                        <div class="card shadow" id="listingDesc">
                            <div class="card-body">
                                <h3><?php echo $listingName?></h3>
                                <h3 class="font-weight-bold">$<?php echo $listingPrice?></h3>
                                <hr>
                                <h5><?php echo $username?></h5>
                                <p><?php echo $listingInfo?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow" id="bookingForm">
                            <div class="card-body">
                                <form action="checkout.php" method="get" id="dateForm">
                                    <div>
                                        <input type="hidden" name="listingId" value="<?php echo $listingId ?>">
                                        <label for="bookingDate">Date:</label>
                                        <!-- the input bar isnt responsive when window width less than 1198, need to find a fix -->
                                        <input type="text" id="bookingDate" name="bookingDate" placeholder="Please select date">
                                    </div>
                                    <br>
                                    <div>
                                        <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" type="submit">
                                            <span class="d-flex align-items-center">
                                            <i class="bi bi-calendar2-check me-2"></i>
                                                <span class="small">Book</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    flatpickr('#bookingDate', {
                        dateFormat: "Y-m-d"
                    });
                </script>
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
