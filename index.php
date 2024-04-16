<?php
if(isset($_SESSION['username'])){

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
        <h1>Chat</h1>
        <div class="chat-box">
            <h3>Welcome <span>USER</span></h3>
            <div class="messages">
                <div class="message">
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
            </div>
            <form action="">
                <input type="text" placeholder="write your message here"> <br>
                <button type="submit">send</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
}else{
    header("location:signin.php");
}
?>