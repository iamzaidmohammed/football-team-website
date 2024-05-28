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
        // Prepare the SQL query to retrieve the hashed password
        $stmt = $db_connection->prepare("SELECT password FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();

        // Check if the password is correct
        if (password_verify($password, $hashed_password)) {
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
