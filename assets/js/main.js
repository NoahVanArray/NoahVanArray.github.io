

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



