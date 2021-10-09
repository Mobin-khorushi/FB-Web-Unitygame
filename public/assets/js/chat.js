const chatForm = document.getElementById('chat-form');
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');

// Get username and room from URL
/* const { username, room } = Qs.parse(location.search, {
  ignoreQueryPrefix: true,
}); */

let username = "myName";
let room = "Global";







const firebaseConfig = {
    apiKey: "AIzaSyDmPUGsAzTaOpFqOz5R3Y0ssGpRxVnOV58",
    authDomain: "pgames-4dad9.firebaseapp.com",
    databaseURL: "https://pgames-4dad9.firebaseio.com",
    projectId: "pgames-4dad9",
    storageBucket: "pgames-4dad9.appspot.com",
    messagingSenderId: "962144324924",
    appId: "1:962144324924:web:3a2f1986bb52a320e4a239",
    measurementId: "G-EWKFZE933P"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
// This is very IMPORTANT!! We're going to use "db" a lot.
var db = firebase.database()


function SendMessage(message) {
    /* fitebase.database().ref("messages").push().set({
        "sender": myName,
        "message": message
    }) */
    db.ref('chats/').once('value', function(message_object) {
        // This index is mortant. It will help organize the chat in order
        var index = parseFloat(message_object.numChildren()) + 1
        db.ref('chats/' + `message_${index}`).set({
                name: myName,
                message: message,
                index: index
            })
            .then(function() {
                // After we send the chat refresh to get the new messages
                //parent.refresh_chat()
                console.log("Message sent");
            }).catch(function(err) {
                console.log(err)
            })
    })
    return
}
// Output message to DOM
function outputMessage(message) {
    const div = document.createElement('div');
    div.classList.add('message');
    const p = document.createElement('p');
    p.classList.add('meta');
    p.innerText = message.username;
    p.innerHTML += `<span>${message.time}</span>`;
    div.appendChild(p);
    const para = document.createElement('p');
    para.classList.add('text');
    para.innerText = message.text;
    div.appendChild(para);
    document.querySelector('.chat-messages').appendChild(div);
}

// Add room name to DOM
function outputRoomName(room) {
    roomName.innerText = room;
}

// Add users to DOM
function outputUsers(users) {
    userList.innerHTML = '';
    users.forEach((user) => {
        const li = document.createElement('li');
        li.innerText = user.username;
        userList.appendChild(li);
    });
}
chatMessages.scrollTop = chatMessages.scrollHeight;
$(document).ready(function() {
    // Message submit
    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // Get message text
        let msg = e.target.elements.msg.value;

        msg = msg.trim();

        if (!msg) {
            return false;
        }

        // Emit message to server
        SendMessage(msg)

        // Clear input
        e.target.elements.msg.value = '';
        e.target.elements.msg.focus();
    });
    firebase.database().ref("messages").on("child_added", function(snapshot) {
        message = {
            username: snapshot.val().name,
            time: "test",
            text: snapshot.val().messaege,
        }
        outputMessage(messaege);
    });
})