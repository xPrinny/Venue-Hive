<!DOCTYPE html>
<html lang="en">
<head>
    <title>Venue Hive - Home</title>
    <?php include "head.inc.php"; ?>
</head>

<body id="page-top">
    <!-- Navigation -->
    <?php include "navbar.php"; ?>

    <!-- Login Modal -->
    <?php include "login.php"; ?>

    <!-- Login Response -->
    <?php
        if ($_SESSION["loginStatus"] == "success") {
            echo '<div class="alert alert-success loginAlert" role="alert">Login Successful!</div>';
            $_SESSION["loginStatus"] = null;
        } else if ($_SESSION["loginStatus"] == "fail") {
            echo '<div class="alert alert-danger loginAlert" role="alert">Login Failed!</div>';
            $_SESSION["loginStatus"] = null;
        }
    ?>

    <!-- Carousel -->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-8">
                <div id="carouselDisplayItems" class="carousel slide carousel-fade" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <?php 
                            include "utils/loadDB.php";

                            if($success) {
                                include "utils/randomReviews.php";
                            }
                            $conn->close();

                            foreach ($rows as $index => $row) {
                                $activeClass = ($index == 0) ? 'active' : '';
                        ?>
                        <button type="button" data-bs-target="#carouselDisplayItems" data-bs-slide-to="<?php echo $index ?>" 
                        class="<?php echo $activeClass ?>" aria-label="Slide <?php echo ($index+1) ?>"></button>
                        <?php } ?>
                    </div>
                    <div class="carousel-inner">
                        <?php 
                            $index = 0;
                            foreach ($rows as $row) {
                                $listingId = $row["listingId"];
                                $listingName = $row["listingName"];
                                $listingPrice = $row["listingPrice"];
                                $listingImg = $row["imagePath"];
                                $rating = $row["ratingStar"];
                                $review = $row["ratingComment"];
                                $listingInfo = $row["listingInfo"];
                                $y = 0;

                                if(strlen($listingInfo) > 50){
                                    $listingDesc = substr($listingInfo,0,50) . " ...";
                                }
                                else{
                                    $listingDesc = $listingInfo;
                                }

                                $activeClass = ($index == 0) ? 'active' : '';
                        ?>
                        <div class="carousel-item <?php echo $activeClass ?>">
                            <a href="listing?listingId=<?php echo $listingId?>" style="text-decoration: none; color:white">
                                <img src="<?php echo $listingImg?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block boxed">
                                    <h5><?php echo $listingName?></h5>
                                    <p><?php echo $listingDesc?></p>
                                </div>
                            </a>    
                            <div class="carousel-review d-none">
                                <div class="display-6 lh-1 mb-3"><?php
                                    for($x=0; $x<5; $x++) {
                                        if ($y < $rating) {
                                            echo '<i class="bi bi-star-fill customYellow"></i>';
                                        } else {
                                            echo '<i class="bi bi-star customYellow"></i>';
                                        }
                                        $y++;
                                    }
                                ?></div>
                                <p class="lead fw-normal mb-5"><?php echo $review?></p>
                            </div>
                        </div>
                        <?php 
                            $index++;
                        } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDisplayItems" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDisplayItems" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                </div>
                <div class="col-lg-4">
                    <div id="carouselSideText"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- Moto aside -->
    <aside class="text-center bg-gradient-primary-to-secondary">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-2 mb-4">Discover your perfect event space on VenueHive - book, rent, and earn today!</div>
                    <img src="assets/img/VenueHiveLogo.png" alt="Venue Hive Logo" style="width: 50%">
                </div>
            </div>
        </div>
    </aside>

    <!-- Footer -->
    <?php include "footer.php";?>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>

</html>