// Admin Sorting

function sortBook(x) {
	// condition checking
	if(x == "id") { sqlPriority = "id"; document.getElementById("sortPriority").innerHTML = "Priority: ID"; }
	else if(x == "name") { sqlPriority = "name"; document.getElementById("sortPriority").innerHTML = "Priority: Name"; }
	else if(x == "stock") { sqlPriority = "stock"; document.getElementById("sortPriority").innerHTML = "Priority: Stock"; }
	else if(x == "author") { sqlPriority = "author"; document.getElementById("sortPriority").innerHTML = "Priority: Author"; }
	else if(x == "publisher") { sqlPriority = "publisher"; document.getElementById("sortPriority").innerHTML = "Priority: Publisher"; }
	else if(x == "year") { sqlPriority = "originyear"; document.getElementById("sortPriority").innerHTML = "Priority: Year"; }
	if(x == "asc") { sqlOrder = "asc"; document.getElementById("sortOrder").innerHTML = "Order: Ascending"; }
	else if(x == "desc") { sqlOrder = "desc"; document.getElementById("sortOrder").innerHTML = "Order: Descending"; }
	// execute change
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("tableContent").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "adminBackend.php?q=" + document.getElementById("searchBar").value + "&r=" + sqlPriority + "&s=" + sqlOrder + "&t=0&u=n&v=" + table + "&page=" + page, true);
	xmlhttp.send();
}

// Admin Search

function showSearch() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("tableContent").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "adminBackend.php?q=" + document.getElementById("searchBar").value + "&r=" + sqlPriority + "&s=" + sqlOrder + "&t=0&u=n&v=" + table + "&page=" + page, true);
	xmlhttp.send();
}

// Admin Limit

function pageFlip(n, type) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("tableContent").innerHTML = this.responseText;
			page = parseInt(document.getElementById("pageNew").innerHTML);
			document.getElementById("pageNumTop").value = page;
			document.getElementById("pageNumBot").value = page;
		}
	};
	xmlhttp.open("GET", "adminBackend.php?q=" + document.getElementById("searchBar").value + "&r=" + sqlPriority + "&s=" + sqlOrder + "&t=" + n + "&u=" + type + "&v=" + table + "&page=" + page, true);
	xmlhttp.send();
}