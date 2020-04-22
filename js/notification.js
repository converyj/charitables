if (!("Notification" in window)) {
	alert("This browser does not support desktop notification");
}
else if (Notification.permission === "granted") {
	// Let's check whether notification permissions have already been granted
	// If it's okay let's create a notification
	makeNotification();
}
else if (Notification.permission !== "denied") {
	// Otherwise, we need to ask the user for permission
	Notification.requestPermission().then((status) => {
		if (status === "granted") {
			makeNotification();
		}
	});
}

function makeNotification() {
	var notification = new Notification("New Match", {
		icon: ""
	});
}
