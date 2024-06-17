<?php

header("Content-type: application/json");
include_once "../../../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $match_id = htmlspecialchars($_POST["update-match-id"]);
    $home_team_score = htmlspecialchars(trim($_POST["update-home-team-score"]));
    $away_team_score = htmlspecialchars(trim($_POST["update-away-team-score"]));

    if ($home_team_score == '' || $away_team_score == '') {
        $error_message = "All fields are required.";
    }

    if (empty($error_message)) {
        json_encode(["status" => "success", "message" => $match_id]);
    } else {
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
