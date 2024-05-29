<?php
include_once '../../../config/db.php';

$stmt = $db_connection->prepare("SELECT player_name, player_age, player_category, player_position, player_number, player_goals, player_assists FROM players");

if ($stmt) {
    $stmt->execute();

    // Bind each column to a variable
    $stmt->bind_result($name, $age, $category, $position, $number, $goals, $assists);

    $players = [];
    while ($stmt->fetch()) {
        $players[] = [
            'name' => $name,
            'age' => $age,
            'category' => $category,
            'position' => $position,
            'number' => $number,
            'goals' => $goals,
            'assists' => $assists
        ];
    }

    $stmt->close();

    // Output the results as JSON
    header('Content-Type: application/json');
    echo json_encode($players);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to prepare the statement."]);
}
