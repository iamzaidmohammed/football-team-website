<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    }

    // Check for empty fields
    if (empty($name) || empty($email) || empty($message)) {
        $error_message = "All fields are required.";
    }

    // If there's no error, send the email
    if (empty($error_message)) {
        $to = "zainudeenzaidmohammed7@gmail.com"; // Change this to your email address
        $subject = "New Contact Form Submission";
        $headers = "From: " . $email . "\r\n" . "Reply-To: " . $email;

        if (mail($to, $subject, $message, $headers)) {
            header('Content-Type: application/json');
            echo json_encode(["status" => "success", "message" => "Message sent successfully"]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(["status" => "error", "message" => "Failed to send message."]);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
