<?php
session_start();
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
        <!-- <h1>Chat</h1> -->
        <div class="chat-box">
            <h3 class="welcome">Welcome <span><?=$_SESSION['username']?></span></h3>
            <div class="messages">
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
                <div class="message sender">
                    <div class="message-user">Username</div>
                    <div class="message-content">This is the message content.</div>
                    <div class="message-time">10:20 PM</div>
                </div>
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
<?php
}else{
    header("location:signin.php");
}
?>