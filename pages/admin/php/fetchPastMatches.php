<?php
header('Content-Type: application/json');
include_once '../../../config/db.php';

$stmt = $db_connection->prepare("SELECT id, match_date, home_team_logo, home_team_name, away_team_logo, away_team_name, match_time, status, home_team_score, away_team_score FROM matches WHERE status = ?");

if ($stmt) {
    $match_status = 'past';
    $stmt->bind_param('s', $match_status);
    $stmt->execute();

    // Bind each column to a variable
    $stmt->bind_result($id, $match_date, $home_logo, $home_team_name, $away_logo, $away_team_name,  $match_time, $status, $home_team_score, $away_team_score);

    $matches = [];
    while ($stmt->fetch()) {
        $matches[] = [
            'id' => $id,
            'date' => $match_date,
            'home_logo' => $home_logo,
            'home_team_name' => $home_team_name,
            'away_logo' => $away_logo,
            'away_team_name' => $away_team_name,
            'time' => $match_time,
            'status' => $status,
            'home_team_score' => $home_team_score,
            'away_team_score' => $away_team_score
        ];
    }

    $empty = "";

    if ($stmt->num_rows() < 1) {
        $empty = "No matches available.";
        echo json_encode($empty);
    } else {
        // Output the results as JSON
        // echo json_encode(["status" => "success", "message" => $matches]);
        $stmt->close();
        echo json_encode($matches);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Failed to prepare the statement."]);
}
