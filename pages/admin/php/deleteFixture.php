<?php

header("Content-type: application/json");
include_once '../../../config/db.php';

// Get match id
$match_id = htmlspecialchars(trim($_POST["delete-match-id"]));

$stmt = $db_connection->prepare("DELETE FROM matches WHERE id = ?");
$stmt->bind_param('i', $match_id);
if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
}
