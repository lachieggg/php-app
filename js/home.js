
const env = {
	S3_URL : "https://lachie-website.s3.ap-southeast-2.amazonaws.com/"
}


var magnet = 'images/magnet.png';
var piano = 'images/piano.png';
var snow = 'images/snow-sky.png';
var owl = 'images/owl.jpg';

var pictures = new Array(
	env.S3_URL + magnet,
	env.S3_URL + piano,
	env.S3_URL + snow
);

var loginImageUrl = env.S3_URL + owl;

window.onload = load();

function load() {
	randomPicture();
	loginPicture();
}


function randomPicture() {
	var number = Math.floor(Math.random() * pictures.length);
	try {
		document.getElementById("home-img").src = pictures[number];
	} catch(err) {
		// no home image on page
		// skipping
	}
}

function loginPicture() {
	try {
		document.getElementById("welcome-img").src = loginImageUrl;
	} catch(err) {
		// no welcome image on page
		// skipping
	}
}
