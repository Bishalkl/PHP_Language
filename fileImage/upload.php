<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Directory for uploads
    $uploadDir = __DIR__ . "/upload/";

    // Ensure the directory exists and is writable
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
        echo json_encode(["status" => "error", "message" => "Failed to create upload directory."]);
        exit;
    }

    // Check if a file was uploaded
    if (!isset($_FILES['file']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
        echo json_encode(["status" => "error", "message" => "No file uploaded or invalid upload."]);
        exit;
    }

    // Retrieve file details
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = basename($_FILES['file']['name']);
    $fileSize = $_FILES['file']['size'];

    // Sanitize file name
    $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "", $fileName);
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Validate file extension
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo json_encode(["status" => "error", "message" => "Invalid file extension. Only JPEG, PNG, GIF, and WebP are allowed."]);
        exit;
    }

    // Validate MIME type
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $fileMimeType = mime_content_type($fileTmpPath);
    if (!in_array($fileMimeType, $allowedMimeTypes)) {
        echo json_encode(["status" => "error", "message" => "Invalid file type. Only images are allowed."]);
        exit;
    }

    // Validate file size (limit: 5 MB)
    $maxFileSize = 5 * 1024 * 1024; // 5 MB
    if ($fileSize > $maxFileSize) {
        echo json_encode(["status" => "error", "message" => "File size exceeds the 5 MB limit."]);
        exit;
    }

    // Check if the file is a valid image
    if (!getimagesize($fileTmpPath)) {
        echo json_encode(["status" => "error", "message" => "Uploaded file is not a valid image."]);
        exit;
    }

    // Generate a unique file name to prevent overwriting
    $uniqueFileName = $uploadDir . uniqid("img_", true) . '.' . $fileExtension;

    // Move the uploaded file to the designated directory
    if (move_uploaded_file($fileTmpPath, $uniqueFileName)) {
        echo json_encode([
            "status" => "success",
            "message" => "File uploaded successfully.",
            "filePath" => htmlspecialchars($uniqueFileName)
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to upload the file."]);
    }
}
?>
