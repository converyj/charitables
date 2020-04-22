var contactData = document.getElementById("submitId");

contactData.addEventListener('click', contactFunction, false);

function contactFunction(e) {
	e.preventDefault();
	var myRequest = new XMLHttpRequest;
	myRequest.onreadystatechange = function () {
		if (myRequest.readyState === 4) {
			var responseObj = JSON.parse(myRequest.responseText);
			console.log(responseObj.success);

		}
	};

	var fullname = document.getElementById("contact-name");
	var email = document.getElementById("contact-email");
	var subject = document.getElementById("contact-subject");
	var message = document.getElementById("contact-message");


	myRequest.open("POST", "Process-Contact.php", true); //true means it is asynchronous // Send urls through the url
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("name=" + fullname.value +
		"&email=" + email.value +
		"&subject=" + subject.value +
		"&message=" + message.value);

	removeForm();
	thankYou();
}

function removeForm() {
	var erase = document.getElementById("contact-page");
	erase.style.display = "none";
}

function thankYou() {
	var abc = document.getElementById("thanks");
	abc.innerHTML = "<h2>Thank you, we will get back to you</h2>"

}
