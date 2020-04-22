var socket;
var server = zimSocketURL;
var appName = "zimChat";
var currentRoom;
var currentName;

function doJoin() {  // this client clicking join button to join room

	var room = zid("room");
	var name = zid("name");

	
	

	// first time joining?
	if (!socket) {
		displayMessage("connecting...", true);
		init();
	} else {
		if (!socket.ready) { // clicking button before socket ready
			displayMessage("connecting...", true);
			return;
		}
		if (checkText(room.value) != currentRoom || checkText(name.value) != currentName ) { // changing rooms or name
			leaveRoom(currentName);
			socket.changeRoom(appName, checkText(room.value), 2, true, {name:checkText(name.value)});
		} // else no change in room so ignore
	}
}

function joinRoom(roomName, personName) {
	currentRoom = roomName;
	currentName = personName;
	displayMessage(socket.history, true); // overwrite div text
	var output = "<span class=z>ZIM: " + personName + " has joined the room</span><br>";
	socket.appendToHistory(output);
	displayMessage(output);
}

function leaveRoom(personName) {
	var output = "<span class=z>ZIM: " + currentName + " has left the room</span><br>";
	socket.appendToHistory(output);
}

function displayMessage(message, overwrite) {
	var messages = zid("messages");
	if (overwrite) messages.innerHTML = "";
	var current = messages.innerHTML;
	current = current.substring(0,current.length - 4); // remove the last <br>
	messages.innerHTML = current + message + "<br>"; // just so not always reading at the very bottom
	messages.scrollTop = messages.scrollHeight;
	messages.style.paddingBottom = "40px";
}


function init() {

	// first time join
	var room = zid("room");
	var name = zid("name");
	var roomName = room.value;
	var limit = 2;
	var fill = true;
	var initialData = {name:checkText(name.value)};

	socket = new zim.Socket(server, appName, roomName, limit, fill, initialData);

	socket.on("ready", function() {
		zog("connected");
		joinRoom(checkText(room.value), checkText(name.value));
		window.addEventListener("keydown", function(e) {
			if (e.keyCode == 13) doSend();
		});
	});

	socket.on("roomchange", function() {
		var room = zid("room");
		var name = zid("name");
		joinRoom(checkText(room.value), checkText(name.value));
	});

	socket.on("data", function(data) { // other people's post
		var output = data.name + ": " + data.message + "<br>";
		displayMessage(output);
	});

	socket.on("otherjoin", function(data) {
		var output = "<span class=z>" + data.name + " has joined the room</span><br>";
		displayMessage(output);
	});

	socket.on("otherleave", function(data) {
		var output = "<span class=z>" + data.name + " has left the room</span><br>";
		displayMessage(output);
	});

	socket.on("disconnect", function() { // client leaving
		leaveRoom(currentName);
	});


	socket.on("error", function() {
		zog("error connecting");
		displayMessage("sorry - connection error", true);
		socket.offAll(); // removeAllEventListeners()
		socket.dispose();
		socket = null;
	});

}

function doSend() { // client clicking send button to send message

	var room = zid("room");
	var name = zid("name");
	var message = zid("message");

	// check message field
	if (message.value == "") {
		message.style.background = "pink";
		setTimeout(function() {
			message.style.background = "transparent";
		}, 500);
		return;
	}
	// check we have joined
	if (!socket || !socket.ready) {
		zss("join").border = "2px solid red";
		setTimeout(function() {
			zss("join").border = "2px solid #ccc";
		}, 500);
		return;
	}
	socket.setProperties({name:currentName, message:checkText(message.value)});
	var output = currentName + ": " + checkText(message.value) + "<br>";
	socket.appendToHistory(output);
	displayMessage(output);
	message.value = "";
}

function checkText(t) {
	t = t.replace(/&/g, "&amp;");
	t = t.replace(/</g, "&lt;");
	t = t.replace(/>/g, "&gt;");
	return t;
}


var vm = new Vue({
	el: '#example-3',
	data: {
		// declare message with an empty value
		picked: ''
	}
})

