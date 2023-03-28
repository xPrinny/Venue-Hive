<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate listing name
    $listingName = filter_input(INPUT_POST, 'listingName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (empty($listingName)) {
        $errors[] = 'Listing name is required';
    }
    
    // Handle the file upload
    $target_dir = "var/www/html/javier-test/assets/uploads";
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
    $listingDescription = filter_input(INPUT_POST, 'listingDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (empty($listingDescription)) {
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

    // If there are no errors, process the form submission
    if (empty($errors)) {
        // Establish database connection
        $host = "localhost";
        $dbname = "your_database_name";
        $username = "your_database_username";
        $password = "your_database_password";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }

        // Prepare the SQL statement for inserting a new listing
        $sql = "INSERT INTO listings (listingName, listingPrice, listingInfo, imagePath, listingTag) 
                VALUES (:listingName, :listingPrice, :listingInfo, :imagePath, :listingTag)";

        $stmt = $conn->prepare($sql);

        // Bind the parameters with the sanitized form data
        $listingName = filter_input(INPUT_POST, 'listingName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $listingPrice = filter_input(INPUT_POST, 'listingPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $listingInfo = filter_input(INPUT_POST, 'listingDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $imagePath = implode(',', $file_names);
        $listingTag = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $stmt->bindParam(':listingName', $listingName);
        $stmt->bindParam(':listingPrice', $listingPrice);
        $stmt->bindParam(':listingInfo', $listingInfo);
        $stmt->bindParam(':imagePath', $imagePath);
        $stmt->bindParam(':listingTag', $listingTag);

        // Execute the SQL statement
        if ($stmt->execute()) {
            // Redirect the user to a success page or display a success message
            header('Location: success.php');
            exit;
        } else {
            // Handle the case where the SQL statement execution fails
            $_SESSION['errors'] = array('database' => 'There was an error saving the listing data.');
            header('Location: index.php');
            exit;
        }
}

?>
   
