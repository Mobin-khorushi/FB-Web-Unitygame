var userGivenName = null;
var chatInputTxt = $("#btn-input");

function ranInRange(min, max) {
    return Math.random() * (max - min) + min;
}

auth.onAuthStateChanged(user => {

    console.log(user);

    if (!user) {
        if (userGivenName == null) {
            var ranNum = ranInRange(10000, 99999999)
            userGivenName = "Guest" + ranNum;
        }
    } else {
        userGivenName = user.displayName;
    }
});

function sendMessage() {
    var cHour = new Date().getHours();
    var cMin = new Date().getMinutes();
    var chatTime = cHour + ":" + cMin;
    var chatMsg = chatInputTxt.val();
    if (chatMsg.length == 0) {
        alert("You need to type something to chat.");
        return false;
    }
    firebase.database().ref("messages").push().set({
        "sender": userGivenName,
        "message": chatMsg,
        "time": chatTime
    });
    return false;
}
firebase.database().ref("messages").on("child_added", function(snapshot) {
    console.log("Im getting called")
    var html = "";
    html += '<li class="left clearfix"><span class="chat-img pull-left">';
    html += '<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />';
    html += '</span>';
    html += '<div class="chat-body clearfix">';
    html += '<div class="header">';
    html += '<strong class="primary-font">' + snapshot.val().sender + '</strong> <small class="pull-right text-muted">';
    html += '<span class="glyphicon glyphicon-time"></span>' + snapshot.val().time + '</small>';
    html += '</div>';
    html += '<p>';
    html += snapshot.val().message;
    html += '</p>';
    html += '</div>';
    html += '</li>';
    console.log(html)
    $("ul.chat").append(html);
});
$("#btn-chat").on("click", function() {
    sendMessage();
    return true;
});