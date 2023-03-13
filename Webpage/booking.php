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
                <?php 
                    $listingId = $_GET['listingId'];
                    $bookingDate = $_GET['bookingDate'];
                    
                    global $listingName, $listingPrice, $username;
                    
                    include "utils/loadDB.php";

                    if ($success) {
                        include "utils/getListingInfo.php";
                    }
                    $conn->close();

                    $listingName = $row["listingName"];
                    $listingPrice = $row["listingPrice"];
                    $username = $row["username"];

                    echo "<br>Listing Id and Booking Date: " . $listingId . ", " . $bookingDate;
                    echo "<br>Listing Name: " . $listingName . "<br>Price: " . $listingPrice . "<br>Host Username: " . $username . "<br><br>";
                    
                    // to add post query upon submission to bookings database once db updated
                ?>
            </div>

            
        </header>
        <!-- Footer-->
        <?php include "footer.php";?>
    </body>
</html>
