<?php
// Set error reporting level
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_error", 0); // Don't display errors in production


// Convert error to exception
function errorToException($errno, $errstrt, $errfile, $errline) {
    throw new ErrorException($errstrt, $errno, 0, $errfile, $errline);
}

set_error_handler("errorToException");


// Custom exception classes for clarity
class FileUploadException extends Exception {}
class InvalidFileTypeException extends FileUploadException {}
class DirectoryCreationException extends FileUploadException {}


try {
    // Check if form is submitted
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        // Define upload directory
        $uploadDir = "uploads/";
        $file = $_FILES["file"];

        // Check if the directory exists, create if not
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
            throw new DirectoryCreationException("Failed to create directory: $uploadDir");
        }

        // Validate file upload
        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            throw new FileUploadException("File upload error: " . $file['error']);
        }

        // Allowed MIME types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileType = mime_content_type($file['tmp_name']);

        if (!in_array($fileType, $allowedTypes)) {
            throw new InvalidFileTypeException("Only image files are allowed (JPEG, PNG, GIF, WebP).");
        }

        // Set file destination
        $uploadFile = $uploadDir . basename($file['name']);

        // Move the uploaded file
        if (!move_uploaded_file($file['tmp_name'], $uploadFile)) {
            throw new FileUploadException("Failed to save the uploaded file.");
        }

        // Success message
        echo "File uploaded successfully: <a href='$uploadFile'>$uploadFile</a>";
    }

} catch(InvalidFileTypeException $e) {
    echo "Invalid File: ". $e->getMessage();

} catch(FileUploadException $e) {
    echo "File Upload Error: ". $e->getMessage();

} catch(Exception $e) {
    echo "Unexpected Error:". $e->getMessage();

}finally {
    echo "<br>File upload process completed.";
}