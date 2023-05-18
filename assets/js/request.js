// Requests

function requestAccept(type) {
	var passgen = createPassword();
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("demo").innerHTML =
			this.responseText;
		}
	};
	if (type == "Feedback") { xhttp.open("GET", "emailgenerate.php?q=" + document.getElementById("contact-message").value + "&r=" + type, true); }
	else if (type == "Account Creation") { xhttp.open("GET", "emailgenerate.php?q=" + passgen + "&r=" + type, true); }
	xhttp.send();
}

// One-Time Password Generator

function createPassword() {
	let result = '';
	const passwordLength = 6; // password length
	const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	const charactersLength = characters.length;
	let counter = 0;
	while (counter < passwordLength) {
	  result += characters.charAt(Math.floor(Math.random() * charactersLength));
	  counter += 1;
	}
	return result;
}