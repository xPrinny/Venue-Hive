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

    if(isset($_POST["submit"])) {
        $file = $_FILES["image"];
        $fileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
        $allowTypes = array('jpg','jpeg','png');
    
    if(in_array($fileType, $allowTypes)){
        if ($file["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        else {
            // proceed with file upload
        }
    }
    else {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
    }
    }

    $fileName = uniqid('', true) . '.' . $fileType;
    $targetDir = "uploads/";
    $targetFile = $targetDir . $fileName;

    if(move_uploaded_file($file["tmp_name"], $targetFile)){
        echo "The file ".$fileName. " has been uploaded.";
    }
    else{
        echo "Sorry, there was an error uploading your file.";
    }

    // connect to database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // insert new record
    $sql = "INSERT INTO assets (filename, filepath) VALUES ('$fileName', '$targetFile')";
    if(mysqli_query($conn, $sql)){
        echo "Record added to database.";
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }

    // close database connection
    mysqli_close($conn);
?>
