
<?php

$servername = "localhost";
$username = "root";
$password = "ayoub";
$database = "chatapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database,$port=3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>

