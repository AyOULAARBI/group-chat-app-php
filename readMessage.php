
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

// mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']); // Bind user ID (optional)

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

// Generate initial HTML for messages (optional, for initial content):
$initialMessagesHtml = '';
if (!empty($messages)) {
  foreach ($messages as $message) {
    $messageClass = ($message['sender_id'] == $_SESSION['user_id']) ? 'sender' : '';
    $username = ($message['username'] == $_SESSION["username"] ? 'you' : $message['username']);
    $messageContent = htmlspecialchars($message['message']); // Escape for security
    $messageTime = date("h:i A", strtotime($message['timestamp']));
    $initialMessagesHtml .= <<<HTML
    <div class="message {$messageClass}">
      <div class="message-user">{$username}</div>
      <div class="message-content">{$messageContent}</div>
      <div class="message-time">{$messageTime}</div>
    </div>
    HTML;
  }
}
header('Content-Type: application/json');

// Encode data and send response
$response = [
  'htmlContent' => $initialMessagesHtml
];
echo json_encode($response);
?>