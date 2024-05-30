<?php

header("Content-type: application/json");
include_once '../../../config/db.php';

// Get player id
$player_id = htmlspecialchars(trim($_POST["delete-player-id"]));

$stmt = $db_connection->prepare("DELETE FROM `players` WHERE id = ?");
$stmt->bind_param('i', $player_id);
$stmt->execute();
