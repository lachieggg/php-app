
var pictures = new Array(
	'images/nice-picture-small.png',
	'images/magnet.png',
	'images/piano.jpg');

window.onload = randomPicture();

function randomPicture() {
     var number = Math.floor(Math.random() * pictures.length);
     document.getElementById("home-img").src = pictures[number];
}


var serverURL;
if (location.hostname === "localhost"
 || location.hostname === "127.0.0.1") {
	serverURL = 'localhost/';
} else {
	serverURL = 'www.lachiegrant.io/';
}
