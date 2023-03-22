<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate listing name
    if (empty($_POST['listingName'])) {
        $errors[] = 'Listing name is required';
    } else {
        $listingName = $_POST['listingName'];
    }

    // Validate listing price
    if (empty($_POST['listingPrice'])) {
        $errors[] = 'Listing price is required';
    } elseif (!is_numeric($_POST['listingPrice'])) {
        $errors[] = 'Listing price must be a valid number';
    } else {
        $listingPrice = $_POST['listingPrice'];
    }

    // Validate category
    if (empty($_POST['category'])) {
        $errors[] = 'Listing category is required';
    } else {
        $category = $_POST['category'];
    }

    // Validate listing description
    if (empty($_POST['listingDescription'])) {
        $errors[] = 'Listing description is required';
    } else {
        $listingDescription = $_POST['listingDescription'];
    }

    // Validate listing location
    if (empty($_POST['listingLocation'])) {
        $errors[] = 'Listing location is required';
    } else {
        $listingLocation = $_POST['listingLocation'];
    }

    // Validate listing address
    if (empty($_POST['listingAddress'])) {
        $errors[] = 'Listing address is required';
    } else {
        $listingAddress = $_POST['listingAddress'];
    }

    // Validate booking date
    if (empty($_POST['bookingDate'])) {
        $errors[] = 'Booking date is required';
    } else {
        $bookingDate = $_POST['bookingDate'];
    }

    // If there are no errors, process the form submission
    if (empty($errors)) {
        // Add code here to save the listing data to the database or do something else with it
        // Redirect the user to a success page or display a success message
        header('Location: success.php');
        exit;
    }
}

?>


<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Define the validation rules
  $validation_rules = array(
    'listingName' => 'required|max_length:45',
    'listingPrice' => 'required|numeric',
    'category' => 'required',
    'listingDescription' => 'required',
    'listingLocation' => 'required',
    'listingAddress' => 'required',
    'bookingDate' => 'required',
  );

  // Define the validation messages
  $validation_messages = array(
    'required' => 'The :attribute field is required.',
    'max_length' => 'The :attribute field must be no more than :max characters.',
    'numeric' => 'The :attribute field must be a number.',
  );

  // Load the validator library
  require_once 'vendor/autoload.php';
  $validator = new \Rakit\Validation\Validator;

  // Validate the form data
  $validation = $validator->make($_POST, $validation_rules, $validation_messages);
  $validation->validate();

  // If the validation fails, redirect back with errors
  if ($validation->fails()) {
    $errors = $validation->errors();
    $_SESSION['errors'] = $errors->firstOfAll();
    $_SESSION['old_input'] = $_POST;
    header('Location: index.php');
    exit;
  }

  // If the validation passes, process the form data
  else {

    // Handle the file upload
    $target_dir = "uploads/";
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
      if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
      && $file_type != "gif" ) {
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
