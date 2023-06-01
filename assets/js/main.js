

(function($) {

	var	$window = $(window),
		$body = $('body');

	// Breakpoints.
		breakpoints({
			xlarge:  [ '1281px',  '1680px' ],
			large:   [ '981px',   '1280px' ],
			medium:  [ '737px',   '980px'  ],
			small:   [ null,      '736px'  ]
		});

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});

	// Dropdowns.
		$('#nav > ul').dropotron({
			mode: 'fade',
			noOpenerFade: true,
			alignment: 'center',
			detach: false
		});

	// Nav.

		// Title Bar.
			$(
				'<div id="titleBar">' +
					'<a href="#navPanel" class="toggle"></a>' +
					'<span class="title">' + $('#logo h1').html() + '</span>' +
				'</div>'
			)
				.appendTo($body);

		// Panel.
			$(
				'<div id="navPanel">' +
					'<nav>' +
						$('#nav').navList() +
					'</nav>' +
				'</div>'
			)
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'left',
					target: $body,
					visibleClass: 'navPanel-visible'
				});

})(jQuery);

// User profile picture
$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});

// Makes favorite button (heart) clickable
function myFavorite() {
  var x = document.getElementById("heart");
  if (heart.name === "heart-outline") {
    heart.name = "heart";
  } else {
    heart.name = "heart-outline";
  }
}

// Edit and save text info for user profile
const elements = ["fname", "lname", "grade", "section", "newPassword", "confirmPassword"].map(id => document.getElementById(id));
const elements2 = ["displayName", "fname", "lname", "grade", "section", "password"];

function getProfileData() {
	var xhr = [], i;
	for (i = 0; i < elements2.length; i++) {
		(function(i) {
			xhr[i] = new XMLHttpRequest();
			xhr[i].open("GET", "profilebackend.php?q=" + elements2[i] + "&s=1", true);
			xhr[i].onreadystatechange = function(){
				if (xhr[i].readyState === 4 && xhr[i].status === 200){
					document.getElementById(elements2[i]).innerHTML =
					this.responseText; 
				}
			};
			xhr[i].send();
		})(i);
	}
}

function showEdit() {
	document.getElementById("textEdit").style.display = "none";
	document.getElementById("textCancel").style.display = "inline-block";
	document.getElementById("textSave").style.display = "inline-block";
	document.getElementById("nP").style.display = "inline-block"; document.getElementById("newPassword").style.display = "inline-block"; 
	document.getElementById("cP").style.display = "inline-block"; document.getElementById("confirmPassword").style.display = "inline-block";
}

function hideEdit() {
	document.getElementById("textEdit").style.display = "inline-block";
	document.getElementById("textCancel").style.display = "none";
	document.getElementById("textSave").style.display = "none";
	document.getElementById("nP").style.display = "none"; document.getElementById("newPassword").style.display = "none";
	document.getElementById("cP").style.display = "none"; document.getElementById("confirmPassword").style.display = "none";
}

function editText() {
	elements.forEach(element => {
		element.contentEditable = "true";
		element.style.backgroundColor = "black";
		element.style.color = "white";
		if (element.textContent === "") {
			element.textContent = "null";
		}
	});
	showEdit();
}

function cancelText() {
	elements.forEach(element => {
		element.contentEditable = "false";
		element.style.backgroundColor = "transparent";
		element.style.color = "black";
		element.textContent = "";
	});
	getProfileData();
	hideEdit();
}

function saveText() {
	var xhr = [], i;
	xhr.length = 0;
	for (i = 0; i < elements2.length; i++) {
		(function(i) {
			if (elements2[i] == "password") {
				if (document.getElementById("newPassword").innerHTML != document.getElementById("confirmPassword").innerHTML) { alert("Passwords are not matching");
					elements.forEach(element => {element.textContent = "";});
					return; 
				}
				if (document.getElementById("newPassword").innerHTML == "null") { 
					elements.forEach(element => {element.textContent = "";});				
					return; 
				}
				xhr[i] = new XMLHttpRequest();
				xhr[i].open("GET", "profilebackend.php?q=" + elements2[i] + "&r=" + document.getElementById("newPassword").innerHTML, true);
				xhr[i].send();
			}
			else {
				xhr[i] = new XMLHttpRequest();
				xhr[i].open("GET", "profilebackend.php?q=" + elements2[i] + "&r=" + document.getElementById(elements2[i]).innerHTML, true);
				xhr[i].send();
			}
		})(i);
	}
	elements.forEach(element => {
		element.contentEditable = "false";
		element.style.backgroundColor = "transparent";
		element.style.color = "black";
	});
	getProfileData();
	hideEdit();
}

// Edit and save text info for admin profile
const adminElements = [
  { id: 'adminName', defaultText: 'Type text here...' },
  { id: 'adminSchool', defaultText: 'Type text here...' },
  { id: 'position', defaultText: 'Type text here...' },
  { id: 'adminEmail', defaultText: 'Type text here...' }
];

function adminEditText() {
  adminElements.forEach(element => {
    const el = document.querySelector(`#${element.id}`);
    el.contentEditable = 'true';
    el.style.backgroundColor = 'black';
    el.style.color = 'white';
    if (el.textContent === '') {
      el.textContent = element.defaultText;
    }
  });
}

function adminSaveText() {
  adminElements.forEach(element => {
    const el = document.querySelector(`#${element.id}`);
    el.contentEditable = 'false';
    el.style.backgroundColor = 'transparent';
    el.style.color = 'inherit';
    if (el.textContent === "Type text here...") {
      el.textContent = "";
    }
  });
}

// display of year datepicker
 function pickYear() {

  let dateDropdown = document.getElementById('date-dropdown'); 
       
  let currentYear = new Date().getFullYear();    
  let earliestYear = 0;     
  while (currentYear >= earliestYear) {      
    let dateOption = document.createElement('option');          
    dateOption.text = currentYear;      
    dateOption.value = currentYear;        
    dateDropdown.add(dateOption);      
    currentYear -= 1;    
  }

}

let x = 2;

 function pickCategory() {

  let categoryDropdown = document.getElementById('category-dropdown'); 
  
  while (x > 0) {      
    let categoryOption = document.createElement('option');
	if (x == 1)	{
	  categoryOption.text = "Non-Fiction";      
      categoryOption.value = "Non-Fiction";       
	}
	else if (x == 2) {
	  categoryOption.text = "Fiction";      
      categoryOption.value = "Fiction";       
	}
    categoryDropdown.add(categoryOption);      
    x -= 1;    
  }
  
}