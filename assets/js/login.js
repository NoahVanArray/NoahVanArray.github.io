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

// reg pass 1
function myFunction1() {
  var x = document.getElementById("passInput1");
  if (x.type === "text") {
    x.type = "password";
    eye1.name = "eye-off";
  } else {
    x.type = "text";
    eye1.name = "eye";
  }
}

// reg pass 2
function myFunction2() {
  var x = document.getElementById("passInput2");
  if (x.type === "text") {
    x.type = "password";
    eye2.name = "eye-off";
  } else {
    x.type = "text";
    eye2.name = "eye";
  }
}

