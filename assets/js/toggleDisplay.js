// Toggle Display Visibility

function toggleDisplay(id) {
	var a = document.getElementById(id);
	if(a.style.display == "none") { a.style.display = "block"; }
	else { a.style.display = "none"; }
}