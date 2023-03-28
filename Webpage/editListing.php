<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venue Hive - Edit Listing</title>
        <?php include "head.inc.php"; ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include "navbar.php";?>
        <header class="masthead">
            <div class="container px-5">
                <?php include "utils/getListingInfo.php"?>
                <form action="process_edit_listing.php" method="post" novalidate class="my-form">
                    <input type="hidden" name="listingId" value="<?php echo $listing['id']; ?>">
                    <div class="form-group">
                        <label for="listingName">Listing Name:</label>
                        <input class="form-control" type="text" id="listingName" maxlength="45" name="listingName" placeholder="Enter listing name" value="<?php echo $listing['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="images">Images:</label>
                        <input type="file" name="images[]" multiple>
                    </div>
                    <div class="form-group">
                        <label for="listingPrice">Listing Price:</label>
                        <input class="form-control" type="number" id="listingPrice" required step="0.01" name="listingPrice" placeholder="Enter listing price" value="<?php echo $listing['price']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Listing Category:</label>
                        <select class="form-control" id="category" name="category">
                            <option value="gaming" <?php if($listing['category'] == 'gaming') {echo 'selected';}?>>Gaming</option>
                            <option value="cooking" <?php if($listing['category'] == 'cooking') {echo 'selected';}?>>Cooking</option>
                            <option value="filming" <?php if($listing['category'] == 'filming') {echo 'selected';}?>>Filming</option>
                            <option value="studying" <?php if($listing['category'] == 'studying') {echo 'selected';}?>>Studying</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="listingDescription">Listing Description:</label>
                        <textarea class="form-control" id="listingDescription" name="listingDescription" placeholder="Enter listing description" rows="3"><?php echo $listing['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="listingLocation">Location:</label>
                        <input class="form-control" type="text" id="listingLocation" name="listingLocation" placeholder="Enter listing location" value="<?php echo $listing['location']; ?>">
                     </div>

                     <div class="form-group">
                       <label for="listingAddress">Address:</label>
                       <input class="form-control" type="text" id="listingAddress" name="listingAddress" value="<?php echo $listing['address']; ?>">
                     </div>
               
                     <div class="form-group">
                       <label for="bookingDate">Booking Dates:</label>
                       <input class="form-control" type="text" id="bookingDate" name="bookingDate" value="<?php echo $listing['booking_dates']; ?>" readonly>
                     </div>
               
                     <script>
                       flatpickr('#bookingDate', {
                         mode: "range",
                         dateFormat: "Y-m-d"
                       });
                     </script>
               
                     <div class="form-group">
                       <button class="btn btn-primary" type="submit">Save Changes</button>
                     </div>
                </form>
            </div>
        </header>
        <?php include "footer.php";?>
    </body>
</html>