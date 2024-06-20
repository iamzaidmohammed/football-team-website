<?php

header("Content-type: application/json");
include_once "../../../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $match_id = htmlspecialchars($_POST["update-results-match-id"]);
    $home_team_score = htmlspecialchars(trim($_POST["update-results-home-team-score"]));
    $away_team_score = htmlspecialchars(trim($_POST["update-results-away-team-score"]));

    if ($home_team_score == '' || $away_team_score == '') {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
    } else {
        $stmt = $db_connection->prepare('UPDATE matches SET home_team_score = ?, away_team_score = ? WHERE id = ?');
        $stmt->bind_param('ssi', $home_team_score, $away_team_score, $match_id);
        $stmt->execute();
        $stmt->close();
        echo json_encode(["status" => "success"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
