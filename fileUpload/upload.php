<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // create a directory
    $uploadDir = "upload/";
    $uploadFile = $uploadDir . baseName($_FILES['file']['name']);

    // Check if the directory exists , create if not 
    if(!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move the uploaded file
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo "File uploaded successfully: " . $uploadFile;
    } else {
        echo "Failed to upload the file.";
    }
}