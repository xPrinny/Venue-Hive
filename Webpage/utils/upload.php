<?php

if(isset($_FILES['images'])){
    $errors= array();
    $upload_dir = "Webpage\assets\uploads";

    // Loop through each file
    for($i=0; $i<count($_FILES['images']['name']); $i++){
        $file_name = $_FILES['images']['name'][$i];
        $file_size = $_FILES['images']['size'][$i];
        $file_tmp = $_FILES['images']['tmp_name'][$i];
        $file_type = $_FILES['images']['type'][$i];
        $file_ext = strtolower(end(explode('.',$file_name)));

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="Image extension not allowed, please choose a JPEG, JPG or PNG file.";
        }

        if($file_size > 5242880){
            $errors[]='File size must be less than 5 MB';
        }

        if(empty($errors)==true){
            // Move uploaded file to the upload directory
            move_uploaded_file($file_tmp, $upload_dir.$file_name);
        }else{
            print_r($errors);
        }
    }

    if(empty($errors)){
        echo "Images uploaded successfully.";
    }
}

?>