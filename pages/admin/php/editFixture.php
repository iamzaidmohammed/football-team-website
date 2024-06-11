<?php

header('Content-type: application/json');
include_once '../../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize error message variable
    $error_message = "";

    // Sanitize and validate input
    $match_id = htmlspecialchars(trim($_POST["edit-match-id"]));
    $home_team_name = htmlspecialchars(trim($_POST["edit-home-team-name"]));
    $away_team_name = htmlspecialchars(trim($_POST["edit-away-team-name"]));
    $home_team_logo = $_FILES["edit-home-team-logo"];
    $away_team_logo = $_FILES["edit-away-team-logo"];
    $match_date = htmlspecialchars(trim($_POST["edit-match-date"]));
    $match_time = htmlspecialchars(trim($_POST["edit-match-time"]));

    // Check if a new home team logo is selected
    if ($home_team_logo['error'] !== UPLOAD_ERR_NO_FILE) {
        $home_img_name = $home_team_name;
        $home_temp_name = $home_team_logo['tmp_name'];
        $home_img_type = $home_team_logo['type'];
        $home_img_new_name = $home_team_name . '.png';

        if ($home_img_type != "image/png") {
            $error_message = "Team logo has to be of type png.";
        } else {
            move_uploaded_file($home_temp_name, "../../../assets/images/teams/" . $home_img_new_name);
        }
    } else {
        $stmt = $db_connection->prepare("SELECT home_team_logo FROM matches WHERE id = ?");
        $stmt->bind_param("i", $match_id);
        if ($stmt) {
            $stmt->execute();
            $stmt->bind_result($current_team_logo);
            $stmt->fetch();
            $stmt->close();
        }

        $current_logo_path = "../../../assets/images/teams/" . $current_team_logo;

        $new_logo_path = "../../../assets/images/teams/" . $home_team_name . '.png';

        if (!empty($home_team_name)) {
            if (file_exists($current_logo_path)) {
                if (!rename($current_logo_path, $new_logo_path)) {
                    $error_message = "Failed to rename the existing logo.";
                } else {
                    $home_img_new_name = $home_team_name . '.png';
                }
            } else {
                $error_message = "Cannot find file";
            }
        }
    }

    // Check if a new away team logo is selected
    if ($away_team_logo['error'] !== UPLOAD_ERR_NO_FILE) {
        $away_img_name = $away_team_name;
        $away_temp_name = $away_team_logo['tmp_name'];
        $away_img_type = $away_team_logo['type'];
        $away_img_new_name = $away_team_name . '.png';

        if ($away_img_type != "image/png") {
            $error_message = "Team logo has to be of type png.";
        } else {
            move_uploaded_file($away_temp_name, "../../../assets/images/teams/" . $away_img_new_name);
        }
    } else {

        $stmt = $db_connection->prepare("SELECT away_team_logo FROM matches WHERE id = ?");
        $stmt->bind_param("i", $match_id);
        if ($stmt) {
            $stmt->execute();
            $stmt->bind_result($current_team_logo);
            $stmt->fetch();
            $stmt->close();
        }

        $current_logo_path = "../../../assets/images/teams/" . $current_team_logo;

        $new_logo_path = "../../../assets/images/teams/" . $away_team_name . '.png';

        if (!empty($away_team_name)) {
            if (file_exists($current_logo_path)) {
                if (!rename($current_logo_path, $new_logo_path)) {
                    $error_message = "Failed to rename the existing logo.";
                } else {
                    $away_img_new_name = $away_team_name . '.png';
                }
            } else {
                $error_message = "Cannot find file";
            }
        }
    }

    // Check for empty fields
    if (empty($home_team_name) || empty($away_team_name) || empty($match_date) || empty($match_time)) {
        $error_message = 'All fields are required';
    }

    // Check for numbers in the name fields
    if (preg_match("/\d/", $home_team_name) || preg_match("/\d/", $away_team_name)) {
        $error_message = "Team name can not contain numbers.";
    }

    // Check for underscore or dot
    if (preg_match('/[_.]{1,}/', $home_team_name) || preg_match('/[_.]{1,}/', $away_team_name)) {
        $error_message = "Team name can not contain underscores or dots.";
    }

    if (empty($error_message)) {

        if ($home_team_logo['error'] !== UPLOAD_ERR_NO_FILE || $away_team_logo['error'] !== UPLOAD_ERR_NO_FILE) {
            $stmt = $db_connection->prepare("UPDATE matches SET match_date = ?, home_team_name = ?, home_team_logo = ?, away_team_name = ?, away_team_logo = ?, match_time = ? WHERE id = ?");
            $stmt->bind_param(
                "ssssssi",
                $match_date,
                $home_team_name,
                $home_img_new_name,
                $away_team_name,
                $away_img_new_name,
                $match_time,
                $match_id
            );

            $stmt->execute();
            $stmt->close();
        } else {
            $stmt = $db_connection->prepare("UPDATE matches SET match_date = ?, home_team_name = ?, home_team_logo = ?, away_team_name = ?, away_team_logo = ?, match_time = ? WHERE id = ?");
            $stmt->bind_param(
                "ssssssi",
                $match_date,
                $home_team_name,
                $home_img_new_name,
                $away_team_name,
                $away_img_new_name,
                $match_time,
                $match_id
            );

            $stmt->execute();
            $stmt->close();
        }

        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $error_message]);
    }
} else {
    echo json_encode(["status" => "Error", "message" => "Invalid request method."]);
}
