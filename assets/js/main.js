

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

// Books.html Search Tool

function showSearch(str) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("txtHint").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "backend.php?q=" + str, true);
	xmlhttp.send();
}

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
let name = document.getElementById("name");
let school = document.getElementById("school");
let acadLvl = document.getElementById("acadLvl");
let gradeSec = document.getElementById("gradeSec");
let email = document.getElementById("email");

function editText() {
  name.contentEditable= "true";
  school.contentEditable= "true";
  acadLvl.contentEditable= "true";
  gradeSec.contentEditable= "true";
  email.contentEditable= "true";

  name.style.backgroundColor= "white";
  school.style.backgroundColor= "white";
  acadLvl.style.backgroundColor= "white";
  gradeSec.style.backgroundColor= "white";
  email.style.backgroundColor= "white";  		
  		
  if (name.textContent === "") {
    name.textContent="Type text here...";
	school.textContent="Type text here...";
	acadLvl.textContent="Type text here...";
	gradeSec.textContent="Type text here...";
	email.textContent="Type text here...";
  } 
}

function saveText() {
  name.contentEditable= "false";
  school.contentEditable= "false";
  acadLvl.contentEditable= "false";
  gradeSec.contentEditable= "false";
  email.contentEditable= "false";

  name.style.backgroundColor= "transparent";
  school.style.backgroundColor= "transparent";
  acadLvl.style.backgroundColor= "transparent";
  gradeSec.style.backgroundColor= "transparent";
  email.style.backgroundColor= "transparent"; 
}