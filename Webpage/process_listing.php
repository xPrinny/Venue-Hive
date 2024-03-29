<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $listingOwnerId = $_SESSION["userId"];

        // Validate listing name
        $listingName = filter_input(INPUT_POST, 'listingName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($listingName)) {
            $errors[] = 'Listing name is required';
        }

        // Handle the file upload
        $target_dir = "/var/www/html/javier-test/assets/uploads";
        $file_names = array();
        foreach ($_FILES["images"]["name"] as $key => $value) {
            $target_file = $target_dir . basename($_FILES["images"]["name"][$key]);
            $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $uploadOk = 1;
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["images"]["tmp_name"][$key]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $_SESSION['errors'] = array('images' => 'File is not an image.');
                header('Location: index.php');
                exit;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $_SESSION['errors'] = array('images' => 'File already exists.');
                header('Location: index.php');
                exit;
            }
            // Check file size
            if ($_FILES["images"]["size"][$key] > 5000000) {
                $_SESSION['errors'] = array('images' => 'File is too large.');
                header('Location: index.php');
                exit;
            }
            // Allow certain file formats
            if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
                $_SESSION['errors'] = array('images' => 'Only JPG, JPEG, PNG & GIF files are allowed.');
                header('Location: index.php');
                exit;
            }
            // Move the file to the uploads directory
            if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $target_file)) {
                $file_names[] = $target_file;
            } else {
                $_SESSION['errors'] = array('images' => 'There was an error uploading the file.');
                header('Location: index.php');
                exit;
            }
        }

        // Validate listing price
        $listingPrice = filter_input(INPUT_POST, 'listingPrice', FILTER_VALIDATE_FLOAT);
        if (empty($listingPrice)) {
            $errors[] = 'Listing price is required and must be a valid number';
        }

        // Validate category
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($category)) {
            $errors[] = 'Listing category is required';
        }

        // Validate listing description
        $listingInfo = filter_input(INPUT_POST, 'listingDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($listingInfo)) {
            $errors[] = 'Listing description is required';
        }

        // Validate listing location
        $listingLocation = filter_input(INPUT_POST, 'listingLocation', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($listingLocation)) {
            $errors[] = 'Listing location is required';
        }

        // Validate listing address
        $listingAddress = filter_input(INPUT_POST, 'listingAddress', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($listingAddress)) {
            $errors[] = 'Listing address is required';
        }

        // Validate booking date
        $bookingDate = filter_input(INPUT_POST, 'bookingDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($bookingDate)) {
            $errors[] = 'Booking date is required';
        }
        
        $dateArray = explode(" to ", $bookingDate);
        $startDate = $dateArray[0];
        $endDate = $dateArray[1];

        // If there are no errors, process the form submission
        if (empty($errors)) {
            include "utils/loadDB.php"; 
            // Bind the parameters with the sanitized form data
            $imagePath = implode(',', $file_names);
            $success = true;
            
            if ($success) {
                $stmt = $conn->prepare("INSERT INTO venuehive.listings (listingOwnerId, listingName, listingPrice, listingInfo, imagePath, imagePathB, timestamp, address, category, location, startdate, enddate, valid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                // Bind & execute the query statement:
                $stmt->bind_param("isisssssssssi", $listingOwnerId, $listingName, $listingPrice, $listingInfo, $imagePath, null, date("Y-m-d H:i:s"), $listingAddress, $category, $listingLocation, $startDate, $endDate, 1);

                // Execute the SQL statement
                if ($stmt->execute()) {
                    // Redirect the user to a success page or display a success message
                    header('Location: profile.php');
                    exit;
                } else {
                    // Handle the case where the SQL statement execution fails
                    $_SESSION['errors'] = array('database' => 'There was an error saving the listing data.');
                    header('Location: index.php');
                    exit;
                }
            }
        }
    }

    ?>
   
