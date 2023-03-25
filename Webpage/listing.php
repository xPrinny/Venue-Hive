<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Listing</title>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>
        <?php include "login.php";?>

        <?php 
            global $listingId, $listingName, $listingPrice, $listingInfo, $listingTag, $userId, $username;
            include "utils/loadDB.php";

            if ($success) {
                include "utils/getListingInfo.php";
            }
            $conn->close();
            
            $listingId = $row["listingId"];
            $listingName = $row["listingName"];
            $listingPrice = $row["listingPrice"];
            $listingInfo = $row["listingInfo"];
            $listingImg = $row["imagePath"];
            $listingTag = $row["listingTag"];
            $userId = $row["listingOwnerId"];
            $username = $row["username"];            
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="listingImage">
                    <img class="" src=<?php echo $listingImg?> alt="<?php echo $listingId?>" width="100%" height="300" style="object-fit:cover;">
                </div>
                <br>
                <div class="row gx-5">
                    <div class="col-lg-9">
                        <div class="card shadow" id="listingDesc">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-9">    
                                        <h3><?php echo $listingName?></h3>
                                    </div>
                                    <?php
                                        if($_SESSION['username'] === $username) {
                                    ?>
                                    <div class="col-lg-3">
                                        <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" onclick="editListing.php" id="editListing" name="editListing">
                                            <span class="d-flex align-items-center">
                                                <i class="bi bi-pencil-square me-2"></i>
                                                <span class="small">Edit</span>
                                            </span>
                                        </button>
                                        <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" onclick="deleteListing.php" id="deleteListing" name="deleteListing">
                                            <span class="d-flex align-items-center">
                                                <i class="bi bi-trash me-2"></i>
                                                <span class="small">Delete</span>
                                            </span>
                                        </button>
                                    </div>
                                    <?php } ?>
                                </div>
                                <h3 class="font-weight-bold">$<?php echo $listingPrice?></h3>
                                <hr>
                                <a href="profile.php?u=<?php echo $userId?>" style="text-decoration: none; color:black">
                                    <h5><?php echo $username?></h5>
                                </a>
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
                                            <i class="bi bi-calendar2-check me-2" required></i>
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
