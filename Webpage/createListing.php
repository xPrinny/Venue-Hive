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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- <script>
            $('.dateForm').on('submit',function(e){
            e.preventDefault();
            var formData=$(this).serialize();
            var fullUrl = window.location.href;
            var finalUrl = fullUrl+"&"+formData;
            window.location.href = finalUrl;
            alert(finalUrl);
            });
        </script> -->
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>
        <header class="masthead">
            <div class="container px-5">

                <form action="process_listing.php" method="post" novalidate class="my-form">
                <div class="form-group">
                    <label for="listingName">Listing Name:</label>
                    <input class="form-control" type="text" id="listingName" maxlength="45" name="listingName" placeholder="Enter listing name">
                </div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="image">
                        <input type="submit" name="submit" value="Upload">
                    </div>
                </form>
                <div class="form-group">
                    <label for="listingPrice">Listing Price:</label>
                    <input class="form-control" type="text" id="listingPrice" required maxlength="45" name="listingPrice" placeholder="Enter listing price">
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Create Listing</button>
                </div>

                <script>
                    flatpickr('#bookingDate', {
                        dateFormat: "Y-m-d",
                    });
                </script>

            
            </div>

            
          
        </header>
        <!-- Footer-->
        <?php include "footer.php";?>
    </body>
</html>
