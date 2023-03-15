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
                $username = $result["username"];
                $firstName = $result["firstName"];
                $lastName = $result["lastName"];
                
                include "utils/getReviews.php";
            }
            $conn->close();
        ?>

        <header class="masthead">
            <div class="container px-5">
                <div class="banner">
                    <img class="w-100 h-auto" src="assets/hiveBanner.png" alt="Hive banner"> 
                </div>
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="card shadow" id="userProfile">
                            <img src="others/pfp.jpg" class="card-img-top-icon rounded-circle" alt="...">
                            <div class="card-header text-white bg-customBrown text-center">
                                <h5 data-editable class="card-title text-center "><?php echo $username; ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item list-group-item-action active" id="item1">Listings</a>
                                    <a href="#" class="list-group-item list-group-item-action" id="item2">Reviews</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow" id="userProfile">
                            <div class="card-body" id="itemListings">
                                <h5 class="card-title">Listings</h5>
                                <hr/>
                                <div class="row align-items-start">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <img src="assets/property-1.jpg" class="card-img-top card-img-thumbnail" alt="...">
                                            <div class="card-body" id="card-body-text">
                                                <p class="card-text">Item 1</p>
                                                <p class="card-text lead fs-6">Item description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4"> 
                                        <div class="card">
                                            <img src="assets/property-2.jpg" class="card-img-top card-img-thumbnail" alt="...">
                                            <div class="card-body" id="card-body-text">
                                                <p class="card-text">Item 2</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <img src="assets/property-3.jpg" class="card-img-top card-img-thumbnail" alt="...">
                                            <div class="card-body" id="card-body-text">
                                                <p class="card-text">Item 3</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="reviewListings" style="display: none;">
                                <h5 class="card-title">Reviews</h5><hr/>
                                <?php
                                    foreach ($rows as $row) {
                                        $reviewOwnerId = $row["reviewOwnerId"];
                                        $ratingStar = $row["ratingStar"];
                                        $ratingComment = $row["ratingComment"];
                                        $y = 0;

                                        echo '<div class="p-3">';

                                        for($x=0; $x<5; $x++) {
                                            if ($y < $ratingStar) {
                                                echo '<i class="bi bi-star-fill"></i>';
                                            } else {
                                                echo '<i class="bi bi-star"></i>';
                                            }
                                            $y++;
                                        }
                                        echo '<br>' . $ratingComment . '</div>';

                                        echo '<hr class="hr-sm">';
                                    }
                                ?>
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
