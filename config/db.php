<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'Zaid');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'football_team');

$db_connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($db_connection->connect_error) {
    die('Connection Failed ' . $db_connection->connect_error);
}
