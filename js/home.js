
const env = {
	S3_IMAGES_URL : "https://lachie-website.s3.ap-southeast-2.amazonaws.com/images/"
}


var magnet = 'magnet.png';
var piano = 'piano.png';
var snow = 'snow-sky.png';
var owl = 'owl.jpg';
var cacti = 'cacti.jpg';
var wtc = 'wtc.jpg';
var mountain = 'mountain.jpg';

var pictures = new Array(
	env.S3_IMAGES_URL + magnet,
	env.S3_IMAGES_URL + piano,
	env.S3_IMAGES_URL + snow,
	env.S3_IMAGES_URL + cacti,
	env.S3_IMAGES_URL + wtc,
	env.S3_IMAGES_URL + mountain,
);

var loginImageUrl = env.S3_IMAGES_URL + owl;

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
}
