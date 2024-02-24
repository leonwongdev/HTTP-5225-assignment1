<?php
// MySQL database credentials
$host = 'sql311.infinityfree.com';
$user = 'if0_35758260';
$password = 'lVqkpeXyanVdueW';
$db = 'if0_35758260_tech_yt_channels';
$port = 3306;

// $user = 'root';
// $password = 'root';
// $db = 'tech_yt_channels';
// $host = 'localhost';
// $port = 3306;

// Create a connection using msqli
$conn = new mysqli($host, $user, $password, $db, $port);

// Check the connection
if ($conn->connect_error) {
    // echo the error message
    echo "Connection failed: " . $conn->connect_error;
}
