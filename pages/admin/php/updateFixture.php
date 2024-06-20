<?php

header("Content-type: application/json");
include_once "../../../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $match_id = htmlspecialchars($_POST["update-match-id"]);
    $home_team_score = htmlspecialchars(trim($_POST["update-home-team-score"]));
    $away_team_score = htmlspecialchars(trim($_POST["update-away-team-score"]));
    $status = "past";

    if ($home_team_score == '' || $away_team_score == '') {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
    } else {
        $stmt = $db_connection->prepare('UPDATE matches SET status = ?, home_team_score = ?, away_team_score = ? WHERE id = ?');
        $stmt->bind_param('sssi', $status, $home_team_score, $away_team_score, $match_id);
        $stmt->execute();
        $stmt->close();
        echo json_encode(["status" => "success"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
