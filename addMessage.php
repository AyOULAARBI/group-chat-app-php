<?php

// Error handling and input validation (adjust based on your needs)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    exit('Only POST requests are allowed for this endpoint.');
}

$message = $_POST['message'];
$sender_id = $_POST['sender_id'];
if (!isset($message) || empty($message)) {
    http_response_code(400); // Bad Request
    $response = array('error' => 'Missing or empty message in request body.'); // Error message as JSON object
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
include("db.php");
$query = "INSERT INTO messages (sender_id,message) VALUES ('$sender_id','$message')";
$result = mysqli_query($conn, $query);
if($result){
    echo json_encode(array("status" => "success", "message" =>"message sent"));
}else{
    echo json_encode(array("status" => "error", "message" =>"message wasn't sent"));
}
?>