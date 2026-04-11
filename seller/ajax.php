<script>

function handleKeyPress(event, userId, sellerId) {
    // Check if the pressed key is Enter (key code 13)
    if (event.keyCode === 13 || event.which === 13) {
        sendMessage(userId, sellerId);
        // Prevent the default action (form submission if inside a form)
        event.preventDefault();
        return false;
    }
}
function getValues(){
    var userId=document.getElementById('userId').value;
    var sellerId=document.getElementById('sellerId').value;
    var data=new FormData();
    var xhr = new XMLHttpRequest();
    data.append("userId", userId);
    data.append("sellerId", sellerId);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('msgArea').innerHTML=this.responseText;
            const msgArea = document.getElementById('msgArea');
            msgArea.scrollTop = msgArea.scrollHeight;
        }
    };
    xhr.open("POST", "loadFiles/reloadChat.php", true);
    xhr.send(data);
    
}
setInterval(getValues, 10000);
// Function to handle sending
function sendMessage(userId, sellerId) {
    var message=document.getElementById('message').value;
    var data=new FormData();
    var xhr = new XMLHttpRequest();
    data.append("userId", userId);
    data.append("sellerId", sellerId);
    data.append("message", message);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            loadSingleChat(userId, sellerId);
        }
    };
    xhr.open("POST", "scripts/sendMessage.php", true);
    xhr.send(data);
}



function getSubCats(catId) {
    var data=new FormData();
    var xhr = new XMLHttpRequest();
    data.append("catId", catId);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('subCategoryId').innerHTML=this.responseText;
        }
    };
    xhr.open("POST", "loadFiles/getSubCats.php", true);
    xhr.send(data);
}

function loadSingleChat(userId, sellerId) {
    var data=new FormData();
    var xhr = new XMLHttpRequest();
    data.append("userId", userId);
    data.append("sellerId", sellerId);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('chatArea').innerHTML=this.responseText;
            const msgArea = document.getElementById('msgArea');
            msgArea.scrollTop = msgArea.scrollHeight;
        }
    };
    xhr.open("POST", "loadFiles/viewSingleChat.php", true);
    xhr.send(data);
}
</script>