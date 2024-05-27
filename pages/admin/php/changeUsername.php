<?php

include_once '../../../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $username = htmlspecialchars(trim($_POST["username"]));

    // Check for empty fields
    if (empty($username)) {
        $error_message = "All fields are required.";
    }

    // Check the length
    if (strlen($username) < 3 || strlen($username) > 16) {
        $error_message = "Username should be between 3 and 16 characters long.";
    }

    // Check for invalid starting and ending characters
    if (preg_match('/^[_.]/', $username) || preg_match('/[_.]$/', $username)) {
        $error_message = "Username should not start or end with an underscore or dot.";
    }

    // Check for consecutive underscores or dots
    if (preg_match('/[_.]{2,}/', $username)) {
        $error_message = "Username should not have consecutive underscores or dots.";
    }

    // Check for allowed characters
    if (!preg_match('/^[a-zA-Z0-9._]+$/', $username)) {
        $error_message = "Username should contain only alphanumeric characters, underscores, and dots.";
    }

    // If there's no error, check the credentials
    if (empty($error_message)) {
        $username = $_POST['username'];
        // Example SQL query to check user credentials
        $stmt = $db_connection->prepare("UPDATE admin SET username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        header('Content-Type: application/json');
        echo json_encode(["status" => "success"]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
