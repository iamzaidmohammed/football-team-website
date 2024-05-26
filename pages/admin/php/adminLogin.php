<?php
session_start();

include_once '../../../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    // Check for empty fields
    if (empty($username) || empty($password)) {
        $error_message = "All fields are required.";
    }

    // If there's no error, check the credentials
    if (empty($error_message)) {
        // Example SQL query to check user credentials
        $stmt = $db_connection->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login successful
            $_SESSION['username'] = $username; // Storing session variable
            header('Content-Type: application/json');
            echo json_encode(["status" => "success", "message" => "Login successful"]);
        } else {
            // Login failed
            header('Content-Type: application/json');
            echo json_encode(["status" => "error", "message" => "Invalid username or password"]);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
