

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
const elements = [
  "name",
  "school",
  "acadLvl",
  "gradeSec",
  "email"
].map(id => document.getElementById(id));

function editText() {
  elements.forEach(element => {
    element.contentEditable = "true";
    element.style.backgroundColor = "white";
    if (element.textContent === "") {
      element.textContent = "Type text here...";
    }
    
  });
}

function saveText() {
  elements.forEach(element => {
    element.contentEditable = "false";
    element.style.backgroundColor = "transparent";
    if (element.textContent === "Type text here...") {
      element.textContent = "";
    }
  });
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
    el.style.backgroundColor = 'white';
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
    if (el.textContent === "Type text here...") {
      el.textContent = "";
    }
  });
}

// display of addCategory and addBook in adminBooks
function openCateg() {
  document.getElementById("categContent").style.display = "block";
  document.getElementById("categContent").style.position = "relative";
}

function closeCateg() {
  document.getElementById("categContent").style.display = "none";
  document.getElementById("categContent").style.position = "absolute";
}

function openBook() {
  document.getElementById("bookContent").style.display = "block";
  document.getElementById("bookContent").style.position = "relative";
}

function closeBook() {
  document.getElementById("bookContent").style.display = "none";
  document.getElementById("bookContent").style.position = "absolute";
}

// display of year datepicker
 function pickYear() {

  let dateDropdown = document.getElementById('date-dropdown'); 
       
  let currentYear = new Date().getFullYear();    
  let earliestYear = 1000;     
  while (currentYear >= earliestYear) {      
    let dateOption = document.createElement('option');          
    dateOption.text = currentYear;      
    dateOption.value = currentYear;        
    dateDropdown.add(dateOption);      
    currentYear -= 1;    
  }

}