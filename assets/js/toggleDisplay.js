// Toggle Display Visibility

function toggleDisplay(id) {
	var a = document.getElementById(id);
	if(a.style.display == "none") { 
		a.style.display = "block"; 
	}
	else { a.style.display = "none"; }
}

function onDisplay(id) {
	var a = document.getElementById(id);
	a.style.display = "block";
}

function offDisplay(id) {
	var a = document.getElementById(id);
	a.style.display = "none";
}