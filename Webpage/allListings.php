<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Listings</title>
        <?php include "head.inc.php"; ?>
        <script src="js/scripts.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort By
                                    </button>
                                    <!-- <div class="dropdown-menu" aria-labelledby="sortDropdown" id="sort_option">
                                        <a class="dropdown-item" value="default">Default</a>
                                        <a class="dropdown-item" value="newest">Newest to Oldest</a>
                                        <a class="dropdown-item" value="name_atoz">Alphabetically (A to Z)</a>
                                        <a class="dropdown-item" value="name_ztoa">Alphabetically (Z to A)</a>
                                        <a class="dropdown-item" value="price_asc">Price (Low to High)</a>
                                        <a class="dropdown-item" value="price_desc">Price (High to Low)</a>
                                    </div> -->
                                </div>
                                <form action="#" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" class="form-control" placeholder="Search...">
                                        <button type="submit" class="btn bg-customYellow">Search</button>
                                    </div>
                                </form>
                                <?php include "utils/loadDB.php"; ?>
                                <h5>Filter Listings</h5>
                                <hr>
                                <h6 class="">Location</h6>
                                <ul class="list-group">
                                    <?php
                                    $loc = "SELECT DISTINCT location FROM venuehive.listings ORDER BY location";   
                                    $result = $conn->query($loc);
                                    while($row = $result->fetch_assoc()){?>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input listing_check" value="<?php echo $row['location'];?>" id="location_<?php echo preg_replace('/\s+/', '', $row['location']);?>"><?php echo $row['location'];?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                                <hr>
                                <h6 class="">Category</h6>
                                <ul class="list-group">
                                    <?php
                                    $cat = "SELECT DISTINCT category FROM venuehive.listings ORDER BY category;";
                                    $result = $conn->query($cat);
                                    while($row = $result->fetch_assoc()){?>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input listing_check" value="<?php echo $row['category'];?>" id="category_<?php echo preg_replace('/\s+/', '', $row['category']);;?>"><?php echo $row['category'];?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                                <hr>
                                <h6 class="">Tags</h6>
                                <ul class="list-group">
                                    <?php
                                    $tags = "SELECT DISTINCT tag FROM venuehive.Tags ORDER BY tag;";
                                    $result = $conn->query($tags);
                                    while($row = $result->fetch_assoc()){?>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input listing_check" value="<?php echo $row['tag'];?>" id="tag_<?php echo preg_replace('/\s+/', '', $row['tag']);?>"><?php echo $row['tag'];?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">View All Listings</h5>
                                <hr>
                                <div class="row align-items-start" id="listings">
                                    <?php
                                        global $listingId, $listingName, $listingPrice, $listingInfo, $listingInfo, $listingDesc, $listingImg;
                                        include "utils/loadDB.php";

                                        if ($success) {
                                            if(isset($_POST['search'])) {
                                                include "utils/searchBar.php";
                                            } 
                                            elseif (!isset($_POST['search'])) {
                                                include "utils/getAllListings.php";
                                            }
                                        }

                                        $conn->close();

                                        foreach ($rows as $row) {
                                            $listingId = $row["listingId"];
                                            $listingName = $row["listingName"];
                                            $listingPrice = $row["listingPrice"];
                                            $listingImg = $row["imagePath"];
                                            $listingInfo = $row["listingInfo"];

                                            include "utils/updateValidity.php";

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
                                            <div class="card-body">
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
        <!--Plugin CSS file with desired skin-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css">
        <!--jQuery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--Plugin JavaScript file-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".listing_check").click(function(){

                    var action = 'action';
                    var location = filteredText('location');
                    var category = filteredText('category');
                    var tag = filteredText('tag');

                    $.ajax({
                        url: 'filterListings.php',
                        method: 'POST',
                        data:{action:action, location:location, category:category, tag:tag},
                        success:function(response){
                            $("#listings").html(response);
                        }
                    });
                });

                function filteredText(text_id) {
                    var filterData = [];
                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            });
            // // Listen for changes in the sort dropdown
            // document.getElementById("sort-by").addEventListener("change", function() {
            // // Get the selected sort option
            // var sortBy = this.value;

            // // Send an AJAX request to the PHP script to get the sorted search results
            // var xhr = new XMLHttpRequest();
            // xhr.open("POST", "search.php", true);
            // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            // xhr.onreadystatechange = function() {
            //     if (xhr.readyState === 4 && xhr.status === 200) {
            //     document.getElementById("search-results").innerHTML = xhr.responseText;
            //     }
            // };
            // xhr.send("sort=" + sortBy);
            // });
        </script>
    </body>
</html>
