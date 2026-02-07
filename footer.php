</div>

<?php
/* ===============================
   FETCH USER LATEST EMISSION
=============================== */

$userEmission = 0;

if(isset($_SESSION['user'])){
    $uid = $_SESSION['user']['id'];

    $r = $conn->query("
        SELECT footprint
        FROM history
        WHERE user_id=$uid
        ORDER BY created_at DESC
        LIMIT 1
    ");

    if($r && $row = $r->fetch_assoc()){
        $userEmission = round($row['footprint'],2);
    }
}
?>

<!-- ===============================
       CHATBOT STYLE
=============================== -->
<style>
#chatbot-btn{
    position:fixed;
    bottom:25px;
    right:25px;
    background:#2e7d32;
    color:white;
    padding:14px;
    border-radius:50%;
    cursor:pointer;
    font-size:20px;
    box-shadow:0 6px 16px rgba(0,0,0,0.3);
    z-index:9999;
}

#chatbox{
    position:fixed;
    bottom:85px;
    right:25px;
    width:320px;
    background:white;
    border-radius:14px;
    box-shadow:0 8px 24px rgba(0,0,0,0.3);
    display:none;
    flex-direction:column;
    overflow:hidden;
    z-index:9999;
}

#chat-header{
    background:#2e7d32;
    color:white;
    padding:12px;
    text-align:center;
    font-weight:600;
}

#chat-messages{
    height:260px;
    overflow-y:auto;
    padding:12px;
    font-size:14px;
    background:#fafafa;
}

#chat-input{
    display:flex;
    border-top:1px solid #ddd;
}

#chat-input input{
    flex:1;
    border:none;
    padding:12px;
    outline:none;
}

#chat-input button{
    width:80px;
    background:#2e7d32;
    color:white;
    border:none;
    cursor:pointer;
}
</style>

<!-- ===============================
       CHATBOT UI
=============================== -->

<div id="chatbot-btn" onclick="toggleChat()">💬</div>

<div id="chatbox">
    <div id="chat-header">Eco Assistant</div>

    <div id="chat-messages">
        <p><b>EcoBot:</b> Hello! Ask me about carbon footprint.</p>
    </div>

    <div id="chat-input">
        <input id="userInput" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<!-- ===============================
       CHATBOT SCRIPT
=============================== -->

<script>
let userEmission = <?= $userEmission ?>;

function toggleChat(){
    let box = document.getElementById("chatbox");
    box.style.display =
        box.style.display === "flex" ? "none" : "flex";
}

function sendMessage(){
    let input = document.getElementById("userInput");
    let msg = input.value.trim();

    if(!msg) return;

    addMessage("You", msg);

    let reply = botReply(msg);

    setTimeout(()=>addMessage("EcoBot", reply), 400);

    input.value="";
}

function addMessage(sender, text){
    let chat = document.getElementById("chat-messages");

    chat.innerHTML +=
        `<p><b>${sender}:</b> ${text}</p>`;

    chat.scrollTop = chat.scrollHeight;
}

function botReply(msg){
    msg = msg.toLowerCase();

    if(msg.includes("my emission") ||
       msg.includes("my footprint")){
        return "Your latest footprint is "
               + userEmission +
               " kg CO₂ per day.";
    }

    if(msg.includes("reduce")){
        if(userEmission > 20)
            return "Your emissions are high. Reduce AC and car use.";

        if(userEmission > 10)
            return "Try reducing transport or electricity use.";

        return "Great job! Maintain eco-friendly habits.";
    }

    if(msg.includes("carbon"))
        return "Carbon footprint measures CO₂ emissions caused by activities.";

    if(msg.includes("electricity"))
        return "Switch off unused appliances and use LED lights.";

    if(msg.includes("transport"))
        return "Public transport reduces emissions significantly.";

    if(msg.includes("hello"))
        return "Hello! Ask about carbon reduction or your footprint.";

    return "Ask me how to reduce emissions or about carbon footprint.";
}
</script>

</body>
</html>
