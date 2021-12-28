var S3_IMAGES_URL = process.env.S3_URL + "images/";
var SLIDER_ENABLED = (process.env.SLIDER_ENABLED === 'true');

var pictures = new Array(
	S3_IMAGES_URL + 'magnet.png',
	S3_IMAGES_URL + 'piano.png',
	S3_IMAGES_URL + 'snow-sky.png',
	S3_IMAGES_URL + 'mountain.jpg',
	S3_IMAGES_URL + 'cacti.jpg',
	S3_IMAGES_URL + 'wtc.jpg',
);

var defaultImage = S3_IMAGES_URL + 'wtc.jpg';
var loginImage = S3_IMAGES_URL + 'owl.jpg';

window.onload = load();

function load() {
	if(SLIDER_ENABLED) {
		console.log("SLIDER ENABLED");
		setSliders();
	} else {
		setPicture();
	}
	
	loginPicture();
}

function setPicture() {
	try {
		document.getElementById("home-img").src = defaultImage;
	} catch(err) {
		// no home image on page
		// skipping
	}
}

function setSliders() {
	try {
		for (let i = 0; i < pictures.length; i++) {
			document.getElementById("slider" + (i+1).toString()).src = pictures[i];
		}
	} catch(err) {
		// no slider on page
		// skipping
	}
}


function loginPicture() {
	try {
		document.getElementById("welcome-img").src = loginImage;
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
	//
}
