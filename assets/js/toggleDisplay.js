// Toggle Display Visibility

function toggleDisplay(id) {
	var a = document.getElementById(id);
	if(a.style.display == "none") { 
		a.style.display = "block"; 
	}
	else { a.style.display = "none"; }
}

function toggleDisplayUsers(id) {
	var b = document.getElementById(id);
	if(b.style.display == "none") { 
		b.style.display = "block"; 
	}
	else { b.style.display = "none"; }
}