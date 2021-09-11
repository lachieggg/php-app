
var pictures = new Array(
	'images/nice-picture-small.png',
	'images/magnet.png',
	'images/piano.png');

window.onload = randomPicture();

function randomPicture() {
     var number = Math.floor(Math.random() * pictures.length);
     document.getElementById("home-img").src = pictures[number];
}
