<?php
header("Content-type: application/json");
include_once '../../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize error message variable
    $error_message = "";

    // Sanitize inputs
    $home_team_name = htmlspecialchars(trim($_POST["home-team-name"]));
    $away_team_name = htmlspecialchars(trim($_POST["away-team-name"]));
    $home_team_logo = $_FILES["home-team-logo"];
    $away_team_logo = $_FILES["away-team-logo"];
    $match_date = htmlspecialchars(trim($_POST["match-date"]));
    $match_time = htmlspecialchars(trim($_POST["match-time"]));

    // Check for empty fields
    if (empty($home_team_name) || empty($away_team_name) || empty($match_date) || empty($match_time)) {
        $error_message = 'All fields are required';
    }

    // Check for empty input file
    if ($home_team_logo["name"] == "" || $away_team_logo["name"] == "") {
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
        $allowed_ext = 'png';

        if ($home_team_logo["name"] != "") {
            $home_img_name = $home_team_name;
            $home_temp_name = $home_team_logo['tmp_name'];
            $home_img_type = $home_team_logo['type'];
            $home_img_new_name = $home_team_name . '.png';

            if ($home_img_type != "image/png") {
                $error_message = "Team logo has to be of type png.";
            } else {
                move_uploaded_file($home_temp_name, "../../../assets/images/teams/" . $home_img_new_name);
            }
        }

        if ($away_team_logo["name"] != "") {
            $away_img_name = $away_team_name;
            $away_temp_name = $away_team_logo['tmp_name'];
            $away_img_type = $away_team_logo['type'];
            $away_img_new_name = $away_team_name . '.png';

            if ($away_img_type != "image/png") {
                $error_message = "Team logo has to be of type png.";
            } else {
                move_uploaded_file($away_temp_name, "../../../assets/images/teams/" . $away_img_new_name);
            }
        }
    }


    if (empty($error_message)) {
        $stmt = $db_connection->prepare("INSERT INTO matches (match_date, home_team_logo, home_team_name, away_team_logo, away_team_name, match_time) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $match_date, $home_img_new_name, $home_team_name, $away_img_new_name, $away_team_name,  $match_time);

        $stmt->execute();

        echo json_encode(['status' => "success"]);
    } else {
        echo json_encode(['status' => "error", 'message' => $error_message]);
    }
} else {
    echo json_encode(["status" => "Error", "message" => "Invalid request method."]);
}
