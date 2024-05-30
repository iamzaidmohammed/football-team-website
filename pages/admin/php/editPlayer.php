<?php

header('Content-type: application/json');
include_once '../../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $player_id = htmlspecialchars(trim($_POST["player-id"]));
    $player_name = htmlspecialchars(trim($_POST["player-name"]));
    $player_age = htmlspecialchars(trim($_POST["player-age"]));
    $player_category = htmlspecialchars(trim($_POST["player-category"]));
    $player_position = htmlspecialchars(trim($_POST["player-position"]));
    $player_number = htmlspecialchars(trim($_POST["player-number"]));
    $player_goals = htmlspecialchars(trim($_POST["player-goals"]));
    $player_assists = htmlspecialchars(trim($_POST["player-assists"]));

    // Check for empty fields 
    if (empty($player_name) || empty($player_age) || empty($player_category) || empty($player_position) || empty($player_number)) {
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
        $stmt = $db_connection->prepare("UPDATE players SET player_name = ?, player_age = ?, player_category = ?, player_position = ?, player_number = ?, player_goals = ?, player_assists = ? WHERE id = ?");
        $stmt->bind_param("sissiiii", $player_name, $player_age, $player_category, $player_position, $player_number, $player_goals, $player_assists, $player_id);
        $stmt->execute();
        $stmt->close();

        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    echo json_encode(["status" => "Error", "message" => "Invalid request method."]);
}
