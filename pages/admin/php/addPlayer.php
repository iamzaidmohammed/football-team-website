<?php
header("Content-type: application/json");
include_once '../../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $player_name = htmlspecialchars(trim($_POST["add-player-name"]));
    $player_age = htmlspecialchars(trim($_POST["add-player-age"]));
    $player_category = htmlspecialchars(trim($_POST["add-player-category"]));
    $player_position = htmlspecialchars(trim($_POST["add-player-position"]));
    $player_number = htmlspecialchars(trim($_POST["add-player-number"]));
    $player_goals = htmlspecialchars(trim($_POST["add-player-goals"]));
    $player_assists = htmlspecialchars(trim($_POST["add-player-assists"]));

    // Check for empty fields 
    if (empty($player_name) || empty($player_age) || empty($player_number)) {
        $error_message = "All fields are required";
    }

    // Check for empty fields
    if ($player_goals == '' || $player_assists == '') {
        $error_message = "All fields are required";
    }

    // Check empty select fields
    if ($player_category == "empty" || $player_position == "empty") {
        $error_message = "All fields are required";
    }

    // Check for numbers in the name field
    if (preg_match("/\d/", $player_name)) {
        $error_message = "Name can not contain numbers.";
    }

    if (empty($error_message)) {
        $stmt = $db_connection->prepare("INSERT INTO players (player_name, player_age, player_category, player_position, player_number, player_goals, player_assists) VALUES (?,?,?,?,?,?,?)");


        $stmt->bind_param("sissiii", $player_name, $player_age, $player_category, $player_position, $player_number, $player_goals, $player_assists);

        $stmt->execute();

        // $stmt->close();

        echo json_encode(["status" => "success", "message" => "Sucess"]);
    } else {
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    echo json_encode(["status" => "Error", "message" => "Invalid request method."]);
}
