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
        } else if ($_SESSION["loginStatus"] == "fail") {
            echo '<div class="alert alert-danger loginAlert" role="alert">Login Failed!</div>';
        }
    ?>

    <!-- Carousel -->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-8">
                    <div id="carouselDisplayItems" class="carousel slide carousel-fade" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselDisplayItems" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselDisplayItems" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselDisplayItems" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/slide-1.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                                <div class="carousel-review d-none">
                                    <h1 class="display-6 lh-1 mb-3">(Icon) Review User</h1>
                                    <p class="lead fw-normal text-muted mb-5">Review description 1</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/slide-2.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                                <div class="carousel-review d-none">
                                    <h1 class="display-6 lh-1 mb-3">(Icon) Review User</h1>
                                    <p class="lead fw-normal text-muted mb-5">Review description 2</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/slide-3.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                                <div class="carousel-review d-none">
                                    <h1 class="display-6 lh-1 mb-3">(Icon) Review User</h1>
                                    <p class="lead fw-normal text-muted mb-5">Review description 3</p>
                                </div>
                            </div>
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
                    <img src="assets/img/VenueHiveLogo.png" alt="Venue Hive Logo" style="width: 50%" />
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