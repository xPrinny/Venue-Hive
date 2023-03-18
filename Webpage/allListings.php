<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Listings</title>
        <?php include "head.inc.php"; ?>
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <?php include "navbar.php";?>
        <?php include "login.php";?>

        <header class="masthead">
            <div class="container px-5">
                <div class="row">
                    <div class="col-lg-3">
                        <h1>Insert filters here</h1>
                        <h2>Location, Tags, Purpose?, Date? etc</h2>
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-body" id="allListings">
                                <h5 class="card-title">View All Listings</h5>
                                <hr>
                                <div class="row align-items-start">
                                    <?php
                                        global $listingId, $listingName, $listingPrice, $listingInfo, $listingInfo, $listingDesc;
                                        include "utils/loadDB.php";

                                        if ($success) {
                                            include "utils/getAllListings.php";
                                        }
                                        $conn->close();

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
                                    <?php } ?>
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
