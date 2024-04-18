<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("location:signin.php");
  exit; // Exit script if not logged in
}
require_once("db.php"); // Include database connection (use require_once for single inclusion)

$sql = "SELECT m.*, u.username AS username FROM messages m
        INNER JOIN users u ON m.sender_id = u.id
        ORDER BY m.timestamp ASC"; // Prepared statement for security

$stmt = mysqli_prepare($conn, $sql);

// mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']); // Bind user ID

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $messages = [];
  while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
  }
} else {
  $messages = []; // Empty array if no messages found
}

$stmt->close(); // Close prepared statement

mysqli_close($conn); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatify-php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat">
        <!-- <h1>Chat</h1> -->
        <div class="chat-box">
            <h3 class="welcome">Welcome <span><?=$_SESSION['username']?></span></h3>
            <div class="messages">
            <?php foreach ($messages as $message): ?>
                <div class="message <?php echo ($message['sender_id'] == $_SESSION['user_id']) ? 'sender' : ''; ?>">
                    <div class="message-user"><?=$message['username']?></div>
                    <div class="message-content"><?=$message['message']?></div>
                    <div class="message-time"><?=date("h:i A", strtotime($message['timestamp']))?></div>
                </div>
            <?php endforeach; ?>
                <!-- <div class="message sender">
                    <div class="message-user">Username</div>
                    <div class="message-content">This is the message content.</div>
                    <div class="message-time">10:20 PM</div>
                </div>
                <div class="message">
                    <div class="message-user">Username</div>
                    <div class="message-content">This is the message content.</div>
                    <div class="message-time">10:20 PM</div>
                </div>
                <div class="message sender">
                    <div class="message-user">Username</div>
                    <div class="message-content">This is the message content.</div>
                    <div class="message-time">10:20 PM</div>
                </div>
                <div class="message sender">
                    <div class="message-user">Username</div>
                    <div class="message-content">This is the message content.</div>
                    <div class="message-time">10:20 PM</div>
                </div> -->
            </div>
            <div class="form">
            <input id="sender_id" value="<?=$_SESSION['user_id']?>" hidden>
                <input type="text" name="message" placeholder="write your message here"> <br>
                <button type="submit" id="submitButton" >send</button>
            </div>
        </div>
    </div>
    <script>
        const submitButton = document.getElementById('submitButton');
        const sender_id = document.getElementById("sender_id").value;
        const message = document.querySelector("input[name='message']");
        console.log(sender_id);
        const handleSubmit = e=>{
            const formData = new FormData();
            formData.append('message', message.value);
            formData.append("sender_id",sender_id)

            fetch("addMessage.php", {
                method: "POST",
                body: formData
            });
            // console.log(message.value);
        }
        submitButton.addEventListener('click', handleSubmit);
    </script>
</body>
</html>
