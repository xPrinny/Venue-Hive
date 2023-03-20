<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Listings</title>
        <?php include "head.inc.php"; ?>
        <script src="js/scripts.js"></script>
        <!-- jQuery UI library -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <!-- <script>
            $(function() {
                $("#search-bar").autocomplete({
                    source: function(request, response) {
                    $.ajax({
                        url: "utils/searchBar.php",
                        data: {
                        term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                        response(data);
                        }
                    });
                    }
                });
            });
            $("form").on("submit", function(event) {
            event.preventDefault();
            });
        </script> -->
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <?php include "navbar.php";?>
        <?php include "login.php";?>

        <header class="masthead">
            <div class="container px-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card shadow">
                            <div class="card-body" id="filters">
                                <!-- <form action="searchBar.php" method="post">
                                    <div class="form-group">
                                        <input type="text" name="search-bar" id="search-bar" placeholder="Search...", autocomplete="on">
                                    </div>
                                    <input type="submit" name="submit" value="Submit">
                                </form> -->
                                <form action="" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" class="form-control" placeholder="Search...">
                                        <button type="submit" class="btn bg-customYellow">Search</button>
                                    </div>
                                </form>
                                <h5>Filter Listings</h5>
                                <hr>
                                <h6 class="">Location</h6>
                                <ul class="list-group">
                                    <?php $col = "location";
                                    include "utils/getFilters.php"; 
                                    // while($row = $result->fetch_assoc()){?>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input product_check" value="<?php echo $row['location'];?>" id="location"><?php echo $row['location'];?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php //}?>
                                </ul>
                                <hr>
                                <h6 class="">Category</h6>
                                <ul class="list-group">
                                    <?php $col = "category";
                                    include "utils/getFilters.php"; 
                                    // while($row = $result->fetch_assoc()){?>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input product_check" value="<?php echo $row['category'];?>" id="category"><?php echo $row['category'];?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php //}?>
                                </ul>
                                <hr>
                                <h6 class="">Tags</h6>
                                <ul class="list-group">
                                    <?php $col = "tags";
                                    include "utils/getFilters.php"; 
                                    // while($row = $result->fetch_assoc()){?>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input product_check" value="<?php echo $row['tags'];?>" id="tags"><?php echo $row['tags'];?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php //}?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-body" id="listings">
                                <h5 class="card-title">View All Listings</h5>
                                <hr>
                                <div class="row align-items-start">
                                    <?php
                                        global $listingId, $listingName, $listingPrice, $listingInfo, $listingInfo, $listingDesc;
                                        include "utils/loadDB.php";

                                        // if ($success) {
                                        //     if(isset($_POST['search'])) {
                                        //         include "utils/searchBar.php";
                                        //     } elseif (!isset($_POST['search'])) {
                                        //         include "utils/getAllListings.php";
                                        //     }
                                        // }

                                        include "utils/getAllListings.php";
                                        $conn->close();

                                        // echo $filtervalues;

                                        foreach ($rows as $row) {
                                            $listingId = $row["listingId"];
                                            $listingName = $row["listingName"];
                                            $listingPrice = $row["listingPrice"];
                                            $listingInfo = $row["listingInfo"];

                                            if(strlen($listingInfo) > 200){
                                                $listingDesc = substr($listingInfo,0,200) . " ...";
                                            }
                                            else{
                                                $listingDesc = $listingInfo;
                                            }
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <img src="assets/property-1.jpg" class="card-img-top card-img-thumbnail" alt="<?php echo $listingName?>">
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
                                    <?php } echo $filtervalues;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
    <footer>
        <?php include "footer.php";?>
    </footer>
</html>
