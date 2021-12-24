
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
	setSliders();
	//randomPicture();
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

function setSliders() {
	try {
		document.getElementById("slider-1").src = pictures[0];
		document.getElementById("slider-2").src = pictures[1];
		document.getElementById("slider-3").src = pictures[2];
	} catch(err) {
		// no slider on page
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


// Tiny Slider
import { tns } from "../node_modules/tiny-slider/src/tiny-slider";

try {
	var slider = tns({
		mode: 'gallery',
		container: '.my-slider',
		items: 1,
		slideBy: 'page',
		nav: false,
		speed: 1000,
		controls: false,
		autoplay: true,
		autoplayButtonOutput: false
	});
	
	slider.play();
} catch(err) {
	// skipping slider
	//
}

