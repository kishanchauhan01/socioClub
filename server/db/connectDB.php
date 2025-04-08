<?php

require_once '/home/kishan/Desktop/kishan/php/socioclub/server/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Access environment variables
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$database = $_ENV['DB_NAME'];


// $host = "localhost";
// $username = "root";
// $password = "root";//password of mysql if not then make it empty
// $database = "social_media";//your database name

// Create MySQLi connection
$conn = new mysqli($host, $username, $password, $database);

if($conn->connect_error) {
    setcookie("db_msg", "connection error: -" . $conn->connect_error , time() + 5, "/");
    exit;
    // echo "Database connection failed: " . $mysqli->connect_error;
} 
// else{
//     echo "dbConnected";
// }
?>
