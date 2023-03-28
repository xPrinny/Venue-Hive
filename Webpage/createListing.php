<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Create Listing</title>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput@0.8.0/dist/bootstrap-tagsinput.css" rel="stylesheet">
        <style>
            .form-group{
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>
        <header class="masthead">
            <div class="container-md">
                        <div class="card shadow">
                            <div class="card-body" id="filters">
                                <form action="process_listing.php" method="post" class="my-form">
                                <div class="form-group">
                                    <label for="listingName">Listing Name:</label>
                                    <input class="form-control" type="text" id="listingName" maxlength="45" name="listingName" placeholder="Enter listing name">
                                </div>
                                <div class="form-group">
                                    <label for="images">Images:</label>
                                    <input type="file" name="images[]" multiple>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Upload Images</button>
                                </div>                             
                                <div class="form-group">
                                    <label for="listingPrice">Listing Price:</label>
                                    <input class="form-control" type="number" id="listingPrice" required step="0.01" name="listingPrice" placeholder="Enter listing price">
                                </div>
                                <div class="form-group">
                                    <label for="category">Listing Category:</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="gaming">Gaming</option>
                                        <option value="cooking">Cooking</option>
                                        <option value="filming">Filming</option>
                                        <option value="studying">Studying</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="listingDescription">Listing Description:</label>
                                    <textarea class="form-control" id="listingDescription" name="listingDescription" placeholder="Enter listing description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="listingLocation">Location:</label>
                                    <input class="form-control" type="text" id="listingLocation" name="listingLocation" placeholder="Enter listing location">
                                </div>
                                <div class="form-group">
                                    <label for="listingAddress">Address:</label>
                                    <input class="form-control" type="text" id="listingAddress" name="listingAddress" placeholder="Enter listing address">
                                </div>
                                <div class="form-group">
                                    <label for="bookingDate">Booking Dates:</label>
                                    <input class="form-control" type="text" id="bookingDate" name="bookingDate" placeholder="Select booking dates" readonly>
                                </div>
                                <script>
                                    flatpickr('#bookingDate', {
                                        mode: "range",
                                        dateFormat: "Y-m-d"
                                    });
                                </script>
                                <div>
                                    <label for="tags">Tags:</label>
                                    <input class="form-control" type="text" id="tags" name="tags" placeholder="Enter tags" data-bs-role="tagsinput">
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Create Listing</button>
                                </div>
                                </form>
                            </div>  
                        </div>    
            </div>
        </header>
        <?php include "footer.php";?>
    </body>
</html>
