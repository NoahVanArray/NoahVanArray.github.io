// Books.html Sorting

function printMessage(x) {
	// condition checking
	if(x == "name") { sqlPriority = "name"; document.getElementById("sortPriority").innerHTML = "Priority: Name"; }
	if(x == "id") { sqlPriority = "id"; document.getElementById("sortPriority").innerHTML = "Priority: ID"; }
	if(x == "author") { sqlPriority = "author"; document.getElementById("sortPriority").innerHTML = "Priority: Author"; }
	if(x == "asc") { sqlOrder = "asc"; document.getElementById("sortOrder").innerHTML = "Order: Ascending"; }
	if(x == "desc") { sqlOrder = "desc"; document.getElementById("sortOrder").innerHTML = "Priority: Descending"; }
	// execute change
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("txtHint").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "backend.php?q=" + document.getElementById("searchBar").value + "&r=" + sqlPriority + "&s=" + sqlOrder, true);
	xmlhttp.send();
}

// Books.html Search Tool

function showSearch(str) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("txtHint").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "backend.php?q=" + document.getElementById("searchBar").value + "&r=" + sqlPriority + "&s=" + sqlOrder, true);
	xmlhttp.send();
}