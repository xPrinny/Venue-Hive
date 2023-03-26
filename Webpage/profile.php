<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Profile</title>
        <?php include "head.inc.php"; ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>

        <!-- Login Modal-->
        <?php include "login.php"; ?>

        <!-- Profile Information -->
        <?php 
            include "utils/loadDB.php";

            if ($success) {
                include "utils/getUser.php";
                if ($success) {
                    $firstName = $result["firstName"];
                    $lastName = $result["lastName"];
                    $profilePicture = $result["profilePicture"];
                    
                    include "utils/getReviews.php";
                } else {
                    echo ' <header class="masthead"><div class="container px-5 mt-4"><h2>Error!</h2>User does not exist.</div></header>';
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
                <div class="banner">
                    <img class="w-100 h-auto" src="assets/userprofile/defaultBanner.png" alt="Hive banner"> 
                </div>
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="card shadow" id="userProfile">
                            <div class="card-img-top-icon">
                                <img src="<?php echo $profilePicture; ?>" class="card-img-top-icon" alt="Profile Picture">
                            </div>
                            <div class="card-header text-white bg-customBrown text-center">
                                <h5 data-editable class="card-title text-center "><?php echo $username; ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action active" id="item1">Listings</a>
                                    <a href="#" class="list-group-item list-group-item-action" id="item2">Reviews</a>
                                    <?php
                                        if ($username === $_SESSION['username']) {?>
                                            <a href="#" class="list-group-item list-group-item-action" id="item3">My Orders</a>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow" id="userProfile">
                            <div class="card-body" id="itemListings">
                                <h5 class="card-title">Listings</h5>
                                <hr/>
                                <div class="row align-items-start" id="listings">
                                    <?php
                                        global $listingId, $listingName, $listingPrice, $listingInfo, $listingInfo, $listingDesc, $listingImg;
                                        include "utils/loadDB.php";

                                        if ($success) {
                                            include "utils/getUserListings.php";
                                        }

                                        $conn->close();

                                        foreach ($rows as $row) {
                                            $listingId = $row["listingId"];
                                            $listingName = $row["listingName"];
                                            $listingPrice = $row["listingPrice"];
                                            $listingImg = $row["imagePath"];
                                            $listingInfo = $row["listingInfo"];

                                            if(strlen($listingInfo) > 200){
                                                $listingDesc = substr($listingInfo,0,200) . " ...";
                                            }
                                            else{
                                                $listingDesc = $listingInfo;
                                            }
                                    ?>
                                    <div class="col-lg-4 mb-4">
                                        <div class="card">
                                            <img src="<?php echo $listingImg?>" class="card-img-top card-img-thumbnail" alt="<?php echo $listingName?>" style="object-fit:cover;">
                                            <a href ='listing.php?listingId=<?php echo $listingId?>' style="text-decoration: none; color:black">
                                            <div class="card-body" id="card-body-text">
                                                <h6 class="bg-customYellow text-center rounded p-1"><?php echo $listingName;?></h6>
                                                    <p>
                                                        <?php echo $listingDesc;?><br>
                                                    </p>      
                                                <h5 class="card-title">Price: <?php echo $listingPrice;?></h5>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="card-body" id="reviewListings" style="display: none;">
                                <h5 class="card-title">Reviews</h5><hr/>
                                <?php
                                    $brCount = 1;
                                    foreach ($rows as $row) {
                                        $ratingStar = $row["ratingStar"];
                                        $ratingComment = $row["ratingComment"];
                                        $reviewOwner = $row["reviewOwner"];
                                        $recievedUser = $row["recievedUser"];
                                        $listingName = $row["listingName"];
                                        $y = 0;

                                        echo '<div class="p-3">';
                                        echo '<u><a href="#">';
                                        if ($reviewOwner == $user) {
                                            echo $recievedUser . '</a></u> | review from Buzzers';
                                        } else {
                                            echo $reviewOwner . '</a></u> | review from Host (tbc)';
                                        }
                                        echo '<br>';
                                        for($x=0; $x<5; $x++) {
                                            if ($y < $ratingStar) {
                                                echo '<i class="bi bi-star-fill"></i>';
                                            } else {
                                                echo '<i class="bi bi-star"></i>';
                                            }
                                            $y++;
                                        }
                                        echo '<br>' . $ratingComment . '<br><br>' . $listingName . '</div>';
                                        if ($brCount < count($rows)) {
                                            echo '<hr class="hr-sm">';
                                        }
                                        $brCount++;
                                    }
                                ?>
                            </div>
                            <div class="card-body" id="profileOrders" style="display: none;">
                                <h5 class="card-title">My Orders</h5>
                                <hr>
                                <?php
                                    include "utils/loadDB.php";

                                    if ($success) {
                                        include "utils/getUserBookings.php";
                                    }
                                    $conn->close();
                                    
                                    foreach ($rows as $row) {
                                        $posterUn = $row["poster"];
                                        $bookerUn = $row["booker"];
                                        $listingName = $row["listingName"];
                                        $listingImg = $row["imagePath"];
                                        $enddate = $row["enddate"];
                                        $valid = $row["valid"];
                                        $bookingDate = $row["bookingDate"];
                                        $bookingTimestamp = $row["BookingTimestamp"];
                                        $bookingState = $row["BookingState"];
                                        $bookingId = $row["bookingId"];
                                        $listingId = $row["listingId"];
                                        $posterId = $row["posterId"];
                                        $bookerId = $row["bookerId"];
                                ?>
                                <div class="card mt-1 mb-3">
                                    <div class="row card-header pt-3 ms-0 me-0">
                                        <div class="col-lg-9">
                                            <p><?php echo $bookingTimestamp?></p>
                                        </div>
                                        <div class="col-lg-3">
                                            <button class="btn btn-primary"><?php echo $bookingState?></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="<?php echo $listingImg?>" class="card-img-thumbnail mt-3 ms-3">
                                            <h5 class="card-title mt-1 ms-3"><?php echo $listingName?></h6>
                                            <h6 class="mt-1 ms-3 mb-3">Posted by: <?php echo $posterUn?></h6>
                                        </div>
                                        <div class="col-lg-9">
                                            <h4 class="mt-3">Booking Details</h4>
                                            <hr class="me-3">
                                            <h6>Booking Id: <?php echo $bookingId?></h6>
                                            <h6>Booker Username: <?php echo $bookerUn?></h6>
                                            <h6>Booking Date: <?php echo $bookingDate?></h6>
                                            <div class="row pt-5">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-5">
                                                    <button class="btn btn-primary">View Booking Confirmation</button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button class="btn btn-primary">Write Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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
