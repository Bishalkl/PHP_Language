<?php

// checking the method is post or not 
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // first username
    $username = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    $gender = htmlspecialchars($_POST["gender"]);

    // checking it is empty or not
    if(empty($username) || empty($email) || empty($message) || empty($gender)) {
        header("Location: ./index.php?error=missing_fields");
        exit();
    }

    // filtering email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ./index.php?error=invalid_email");
        exit();
    }

    // Output:
    echo <<<EOT
    <h2>User Data:</h2>
    <p><strong>Name:</strong> {$username}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Message:</strong> {$message}</p>
    <p><strong>Gender:</strong> {$gender}</p>
    EOT;

} else {
    header("Location: ./index.php");
    exit();
}