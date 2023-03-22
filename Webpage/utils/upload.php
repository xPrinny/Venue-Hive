<?php

// Define allowed image types
$allowed_types = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);

// Check if images were uploaded
if(isset($_FILES['images'])){

    // Loop through each uploaded file
    foreach($_FILES['images']['tmp_name'] as $key=>$tmp_name){

        // Check if file is an image and of allowed type
        $check = getimagesize($_FILES['images']['tmp_name'][$key]);
        if($check !== false && in_array($check[2], $allowed_types)) {

            // Set file name and path
            $file_name = $_FILES['images']['name'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];
            $file_path = "upload/images/" . $file_name;

            // Move uploaded file to folder on server
            move_uploaded_file($file_tmp, $file_path);

            // Print success message
            echo "File uploaded: " . $file_name . "<br>";

        } else {
            // Print error message if file is not an image or of not allowed type
            echo "File is not an allowed image type: " . $_FILES['images']['name'][$key] . "<br>";
        }
    }
}
?>
