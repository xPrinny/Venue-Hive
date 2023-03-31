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
                if ($success) {
                    $listingId = $row["listingId"];
                    $listingName = $row["listingName"];
                    $listingPrice = $row["listingPrice"];
                    $listingInfo = $row["listingInfo"];
                    $listingImg = $row["imagePath"];
                    $listingImg2 = $row["imagePathB"];
                    $listingTag = $row["listingTag"];
                    $userId = $row["listingOwnerId"];
                    $username = $row["username"];
                } else {
                    echo ' <header class="masthead"><div class="container px-5 mt-4"><h2>Error!</h2>Listing does not exist.</div></header>';
                        include "footer.php";
                        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                                <script src="js/scripts.js"></script>
                                </body>
                                </html>';
                        die();
                }
            }
            $conn->close();
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="listingImage">
                    <div class="container">
                        <div class="blur-bg">
                            <img src="<?php echo $listingImg ?>" alt="blurred background image for <?php echo $listingName?>">
                        </div>
                        <div class="listingImg-container">
                            <img src="<?php echo $listingImg ?>" style="height:100%; object-fit:contain;" alt="<?php echo $listingName?> image 1">
                            <img src="<?php echo $listingImg2 ?>" style="height:100%; object-fit:contain;" alt="<?php echo $listingName?> image 2">
                        </div> 
                    </div>
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
                                        <a href="editListing.php?listingId=<?php echo $row['listingId']; ?>" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" id="editListing" name="editListing">
                                            <span class="d-flex align-items-center">
                                                <i class="bi bi-pencil-square me-2"></i>
                                                <span class="small">Edit</span>
                                            </span>
                                        </button>
                                        <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#deleteModal" id="deleteListing" name="deleteListing">
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
                                <a href="profile.php?u=<?php echo $username?>" style="text-decoration: none; color:black">
                                    <h5><?php echo $username?></h5>
                                </a>
                                <p><?php echo $listingInfo?></p>
                                <!-- <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" id="listingTag" name="listingTag">
                                            <span class="d-flex align-items-center">
                                                <span class="small">Delete</span>
                                            </span>
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow" id="bookingForm">
                            <div class="card-body">
                                <?php 
                                    include "utils/loadDB.php";
                                    if($success) {
                                        include "utils/bookingCalendar.php";
                                    
                                    if (!isset($_SESSION['username'])) { ?>
                                        <div>
                                            <p>You must be logged in to make a booking</p>
                                        </div>
                                <?php 
                                    } else if ($_SESSION['username'] === $username) { 
                                        if ($endDate >= date("Y-m-d")) {?>
                                            <div>
                                                <p>You can't book your own listing!</p>
                                            </div>
                                <?php   } else { ?>
                                            <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                                                <span class="d-flex align-items-center">
                                                <i class="bi bi-calendar2-check me-2" required></i>
                                                    <span class="small">Listing is Archived</span>
                                                </span>
                                            </button>
                                <?php   }
                                    } else {
                                        if ($endDate >= date("Y-m-d")) {?>
                                            <form action="checkout.php" method="post" id="dateForm">
                                                <div>
                                                    <input type="hidden" name="listingId" value="<?php echo $listingId ?>">
                                                    <input type="hidden" name="listingPrice" value="S$<?php echo $listingPrice ?>">
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
                                <?php   } else {?>
                                            <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                                                <span class="d-flex align-items-center">
                                                <i class="bi bi-calendar2-check me-2" required></i>
                                                    <span class="small">Listing is Archived</span>
                                                </span>
                                            </button>
                                        <?php }}} ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-customYellow p-4">
                                <h5 class="modal-title font-alt" id="deleteListingTitle">Delete Listing</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body border-0 p-4">
                                <h4>Are you sure you want to delete this listing?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-danger" id="deleteListingBtn">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    flatpickr('#bookingDate', {
                        enable: [<?php echo "'" . $availableDatesString . "'"; ?>],
                        dateFormat: "Y-m-d",
                        disable: [<?php echo "'" . $disabledDatesString . "'"; ?>]
                    });
                </script>
                <script>
                    $(function() {
                        $('#deleteListingBtn').click(function() {
                            var listingId = <?php echo json_encode($listingId); ?>;

                            $.ajax({
                                url: 'deleteListing.php',
                                type: 'POST',
                                data: { listingId: listingId },
                                success: function(response) {
                                    alert('Listing deleted successfully!');
                                    location.reload();
                            },
                            error: function(xhr, status, error) {
                                alert('Error deleting listing: ' + error);
                            }
                            });
                        });
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
