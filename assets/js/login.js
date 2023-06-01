/*
	Author: John Yohan J. Navarra
*/

// LogReg Form
const wrapper = document.querySelector('.logRegForm');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=> {
	wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
	wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
	wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
	wrapper.classList.remove('active-popup');
});


// show pass
let eye = document.getElementById("eye");
let eye1 = document.getElementById("eye1");
let eye2 = document.getElementById("eye2");

// login pass
function myFunction() {
  var x = document.getElementById("passInput");
  if (x.type === "text") {
    x.type = "password";
    eye.name = "eye-off";
  } else {
    x.type = "text";
    eye.name = "eye";
  }
}

// Popup stuff
const alert = document.querySelector('.alertPopup');

// To open the popup
function openAlert() {
  var v = document.getElementById("alertValue").innerHTML;
  if (v.length > 0) {
    document.getElementById("alertMessage").innerHTML = document.getElementById("alertValue").innerHTML;
	document.getElementById("alertSubtitle").innerHTML = document.getElementById("alertSubValue").innerHTML;
	alert.style.transform = "scale(1)";
  }
}

// To close the popup
function closeAlert() {
  alert.style.transform= "scale(0)";
}