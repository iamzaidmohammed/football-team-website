<?php

include_once '../../../config/db.php';

// session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $current_password = htmlspecialchars(trim($_POST["current-password"]));
    $new_password = htmlspecialchars(trim($_POST["new-password"]));
    $confirm_password = htmlspecialchars(trim($_POST["confirm-password"]));

    // Check if passwords are provided
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error_message = "All password fields are required.";
    }

    if ($new_password !== $confirm_password) {
        $error_message = 'Passwords do not match.';
    }

    if (strlen($current_password) > 0) {
        // Fetch current password from the database
        $stmt = $db_connection->prepare("SELECT password FROM admin");
        $stmt->execute();
        $stmt->bind_result($stored_password);
        $stmt->fetch();
        $stmt->close();

        if (!password_verify($current_password, $stored_password)) {
            $error_message = 'Current password is incorrect.';
        }
    }



    if (empty($error_message)) {
        // Hash the new password
        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Fetch current password from the database
        $stmt = $db_connection->prepare("UPDATE admin SET password = ?");
        $stmt->bind_param("s", $new_hashed_password);

        if ($stmt->execute()) {
            header('Content-Type: application/json');
            echo json_encode(["status" => "success"]);
        } else {
            $error_message = "Failed to update the password.";
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
