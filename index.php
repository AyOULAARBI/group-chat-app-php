<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("location:signin.php");
  exit; // Exit script if not logged in
}
// require_once("db.php"); // Include database connection (use require_once for single inclusion)

// $sql = "SELECT m.*, u.username AS username FROM messages m
//         INNER JOIN users u ON m.sender_id = u.id
//         ORDER BY m.timestamp ASC"; // Prepared statement for security

// $stmt = mysqli_prepare($conn, $sql);

// // mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']); // Bind user ID

// $stmt->execute();

// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//   $messages = [];
//   while ($row = $result->fetch_assoc()) {
//     $messages[] = $row;
//   }
// } else {
//   $messages = []; // Empty array if no messages found
// }

// $stmt->close(); // Close prepared statement

// mysqli_close($conn); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatify-php</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="chat">
        <!-- <h1>Chat</h1> -->
        <div id="message-container"></div>
        <div class="chat-box">
            <h3 class="welcome">Welcome <span><?=$_SESSION['username']?></span></h3>
            <div class="messages">
           
            </div>
            <div class="form">
            <input id="sender_id" value="<?=$_SESSION['user_id']?>" hidden>
                <input type="text" name="message" placeholder="write your message here"> <br>
                <button type="submit" id="submitButton" >send</button>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>
