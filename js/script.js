const submitButton = document.getElementById('submitButton');
const sender_id = document.getElementById("sender_id").value;
const message = document.querySelector("input[name='message']");
const messages = document.querySelector(".messages");
const messageContainer = document.getElementById('message-container');

const getMessages = async()=>{
    await fetch("readMessage.php",{
        method:"GET"
    })
    .then(response=>response.json())
    .then(data=>messages.innerHTML = data.htmlContent)
    .catch(err=>err);
}
// getMessages();
setInterval(getMessages,500);
// console.log(sender_id);
const handleSubmit = async (e)=>{
    const formData = new FormData();
    formData.append('message', message.value);
    formData.append("sender_id",sender_id)
    
    await fetch("addMessage.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
        throw new Error(`Error sending message: ${response.statusText}`);
        }
        console.log(response)
        return response.json(); // Parse the response if successful
    })
    .then(data => {
        console.log(data)
        messageContainer.textContent = "Message sent successfully!";
    })
    .catch(error => {
        console.error('Error sending message:', error);
        alert(error)
        messageContainer.textContent = "An error occurred. Please try again.";
    });

    message.value= "";
    // console.log(message.value);
}
submitButton.addEventListener('click', handleSubmit);
