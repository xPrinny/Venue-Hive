<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Venue Hive - Home</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&family=Roboto+Condensed&display=swap" rel="stylesheet"> 
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- JQuery 3.6.4-->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>	
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <?php include "navbar.php";?>
        <header class="masthead">
            <div class="container px-5">
                <div class="row">
                    <div class="col-lg-3">
                        <h1>Insert filters here</h1>
                        <h2>Location, Tags, Purpose?, Date? etc</h2>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <?php
                                global $listingId, $listingName, $listingPrice, $listingInfo, $listingTag, $username;
                                include "utils/loadDB.php";

                                if ($success) {
                                    include "utils/getTop10Item.php";
                                }
                                $conn->close();

                                foreach ($rows as $row) {
                                    $listingId = $row["listingId"];
                                    $listingName = $row["listingName"];
                                    $listingPrice = $row["listingPrice"];
                                    $listingTag = $row["listingTag"];
                                    $username = $row["username"];
                            ?>
                            <div class="col-md-3 mb-2">
                                <a href ='listing.php?listingId=<?php echo $listingId?>'>
                                    <div class="card-deck">
                                        <div class="card border-secondary">
                                            <div class="card-title">
                                                <h6 style="margin-top:175px" class="text-light bg-info text-center rounded p-1"><?php echo $listingName;?></h6>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Price: <?php echo $listingPrice;?></h4>
                                                <p>
                                                    Tags: <?php echo $listingTag;?><br>
                                                    Host: <?php echo $username;?><br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
