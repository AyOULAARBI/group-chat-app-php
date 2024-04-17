<?php


$message = $_POST['message'];
$sender_id = $_POST['sender_id'];
include("db.php");
$query = "INSERT INTO messages (sender_id,message) VALUES ('$sender_id','$message')";
$result = mysqli_query($conn, $query);
if($result){
    echo json_encode(array("status" => "success", "message" =>"message sent"));
}else{
    echo json_encode(array("status" => "error", "message" =>"message wasn't sent"));
}
?>