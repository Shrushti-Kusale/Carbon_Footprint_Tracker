<?php
/* ===== Fetch Latest User Emission ===== */
$userEmission = 0;

if(isset($_SESSION['user'])){
    $uid = $_SESSION['user']['id'];

    $r = $conn->query("
        SELECT footprint
        FROM history
        WHERE user_id = $uid
        ORDER BY created_at DESC
        LIMIT 1
    ");

    if($r && $row = $r->fetch_assoc()){
        $userEmission = round($row['footprint'],2);
    }
}
?>

<!-- ================= FOOTER ================= -->
<footer style="background:#1b5e20;color:white;padding:20px;text-align:center;margin-top:40px;">
    <p>© <?php echo date("Y"); ?> Eco Tracker | Reduce Carbon Footprint</p>
</footer>

<!-- ================= CHATBOT STYLES ================= -->
<style>
#chatbot-btn{
position:fixed;
bottom:25px;
right:25px;
background:#2e7d32;
color:#fff;
padding:16px;
border-radius:50%;
cursor:pointer;
font-size:20px;
box-shadow:0 6px 20px rgba(0,0,0,.3);
z-index:9999;
transition:.3s;
}
#chatbot-btn:hover{ transform:scale(1.1); }

#chatbox{
position:fixed;
bottom:90px;
right:25px;
width:380px;
height:520px;
background:#fff;
border-radius:18px;
box-shadow:0 12px 32px rgba(0,0,0,.3);
display:none;
flex-direction:column;
overflow:hidden;
z-index:9999;
animation:fadeIn .25s ease;
}

@keyframes fadeIn{
from{opacity:0; transform:translateY(15px);}
to{opacity:1; transform:translateY(0);}
}

#chat-header{
background:#2e7d32;
color:#fff;
padding:14px;
font-weight:600;
display:flex;
justify-content:space-between;
align-items:center;
}

#chat-header span{
cursor:pointer;
font-size:18px;
}

#chat-messages{
flex:1;
overflow-y:auto;
padding:14px;
background:#f1f3f4;
display:flex;
flex-direction:column;
gap:8px;
}

.msg{
max-width:75%;
padding:10px 14px;
border-radius:16px;
font-size:15px;
line-height:1.4;
box-shadow:0 2px 5px rgba(0,0,0,.1);
}

.msg-user{
background:#2e7d32;
color:#fff;
align-self:flex-end;
border-bottom-right-radius:4px;
}

.msg-bot{
background:#fff;
align-self:flex-start;
border-bottom-left-radius:4px;
}

#chat-input{
display:flex;
border-top:1px solid #ddd;
background:#fff;
}

#chat-input input{
flex:1;
border:none;
padding:14px;
outline:none;
font-size:14px;
}

#chat-input button{
width:80px;
background:#2e7d32;
color:#fff;
border:none;
cursor:pointer;
}

#quickBtns{
display:flex;
gap:6px;
padding:10px;
border-top:1px solid #eee;
background:#fff;
}

#quickBtns button{
flex:1;
border:none;
padding:8px;
background:#e8f5e9;
cursor:pointer;
border-radius:8px;
font-size:12px;
transition:.2s;
}

#quickBtns button:hover{
background:#c8e6c9;
}
</style>

<!-- ================= CHATBOT UI ================= -->
<div id="chatbot-btn" onclick="toggleChat()">💬</div>

<div id="chatbox">
    <div id="chat-header">
        Eco Assistant
        <span onclick="toggleChat()">✖</span>
    </div>

    <div id="chat-messages"></div>

    <div id="quickBtns">
        <button onclick="quickAsk('my emission')">My Footprint</button>
        <button onclick="quickAsk('reduce')">Reduce Tips</button>
        <button onclick="quickAsk('tips')">Eco Tips</button>
    </div>

    <div id="chat-input">
        <input id="userInput" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<!-- ================= CHATBOT SCRIPT ================= -->
<script>
let userEmission = <?= $userEmission ?>;
let chat = document.getElementById("chat-messages");

/* ===== EcoTrace Welcome + Personalized Greeting ===== */
let intro =
`👋 <b>Welcome to EcoTrace Chatbot!</b><br>
I'm your eco assistant helping you track and reduce your carbon footprint.<br><br>`;

let welcome = "";

if(userEmission > 20)
welcome = intro +
`Your latest carbon footprint is <b>${userEmission} kg CO₂/day</b>.<br>
⚠ This is higher than recommended.<br>
Ask me how to reduce emissions!`;

else if(userEmission > 10)
welcome = intro +
`Your footprint is <b>${userEmission} kg CO₂/day</b>.<br>
You're doing okay, but we can improve it together.`;

else
welcome = intro +
`🌱 Awesome! Your footprint is only <b>${userEmission} kg CO₂/day</b>.<br>
Keep up the eco-friendly lifestyle! Want more tips?`;

chat.innerHTML =
`<div class="msg msg-bot">${welcome}</div>`;

/* ===== Enter key send ===== */
document.getElementById("userInput")
.addEventListener("keypress", function(e){
    if(e.key === "Enter") sendMessage();
});

/* ===== Toggle chat ===== */
function toggleChat(){
let box=document.getElementById("chatbox");
box.style.display =
    box.style.display==="flex" ? "none" : "flex";
}

/* ===== Send message ===== */
function sendMessage(){
let input=document.getElementById("userInput");
let msg=input.value.trim();
if(!msg) return;

addMessage("You",msg);
input.value="";

showTyping();

setTimeout(()=>{
removeTyping();
addMessage("EcoBot", botReply(msg));
},600);
}

/* ===== Quick buttons ===== */
function quickAsk(text){
addMessage("You",text);

showTyping();

setTimeout(()=>{
removeTyping();
addMessage("EcoBot", botReply(text));
},600);
}

/* ===== Add message ===== */
function addMessage(sender,text){
let cls = sender==="You" ? "msg-user" : "msg-bot";

chat.innerHTML +=
`<div class="msg ${cls}">${text}</div>`;

chat.scrollTop = chat.scrollHeight;
}

/* ===== Typing indicator ===== */
function showTyping(){
chat.innerHTML +=
`<div id="typing" class="msg msg-bot">EcoBot is typing...</div>`;
chat.scrollTop = chat.scrollHeight;
}

function removeTyping(){
let t=document.getElementById("typing");
if(t) t.remove();
}

/* ===== Bot logic ===== */
function botReply(msg){
msg=msg.toLowerCase();

if(msg.includes("my emission") || msg.includes("footprint")){
    if(userEmission > 20)
        return `Your footprint is ${userEmission} kg CO₂/day. Level: HIGH.`;
    if(userEmission > 10)
        return `Your footprint is ${userEmission} kg CO₂/day. Level: MODERATE.`;
    return `Your footprint is ${userEmission} kg CO₂/day. Level: LOW. Great!`;
}

if(msg.includes("reduce")){
    if(userEmission>20)
        return "Reduce AC use, avoid private cars, and save electricity.";
    if(userEmission>10)
        return "Try reducing transport or electricity usage.";
    return "You're doing great! Maintain eco-friendly habits.";
}

if(msg.includes("tips"))
    return "Use LED bulbs, public transport, reduce waste, and save energy.";

if(msg.includes("carbon"))
    return "Carbon footprint measures CO₂ emissions from daily activities.";

if(msg.includes("electricity"))
    return "Turn off unused appliances and use energy-saving devices.";

if(msg.includes("transport"))
    return "Public transport or cycling reduces emissions.";

if(msg.includes("hello") || msg.includes("hi"))
    return "Hello! Ask me about emissions or reduction tips.";

return "Ask about your emissions or how to reduce them!";
}
</script>
