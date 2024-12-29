<?php

// Read a file 
$fileName = "example.txt";

// check if the file exists
if(file_exists(($fileName))) {

    // Read the file content
    $content = file_get_contents($fileName);
    echo "File Content:\$content";
} else {
    echo "File does not exits.";
}

// Writing to a file
$data = "This is a simple text written to the file.";
if(file_put_contents($fileName, $data)) {
    echo "Data written to the file successfully.";
} else {
    echo "Failed to write to the file.";
}

// Appending Data to a File
$data = "This is additional text.\n";

// Append data to the file
file_put_contents($fileName, $data, FILE_APPEND);
echo "Data appended to the file.";
