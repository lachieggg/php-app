var S3_IMAGES_URL = process.env.S3_URL + "images/";
var SLIDER_ENABLED = (process.env.SLIDER_ENABLED === 'true');

var pictures = new Array(
	S3_IMAGES_URL + 'mountain-day.jpg',
	S3_IMAGES_URL + 'mountain-night.jpg',
	S3_IMAGES_URL + 'fiber.jpg',
	S3_IMAGES_URL + 'led.jpg',
	S3_IMAGES_URL + 'hdd.jpg',
	S3_IMAGES_URL + 'motherboard.jpg',
	S3_IMAGES_URL + 'city.jpg',
	S3_IMAGES_URL + 'wtc.jpg',
	S3_IMAGES_URL + 'diving.jpg',
	S3_IMAGES_URL + 'minecraft.jpg',
);

window.onload = load();

function load() {
	if(SLIDER_ENABLED) {
		setSliders();
	} else {
		setPicture();
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


$(".item").click(function(){
  $("#myCarousel").carousel(1);
});

$(".left").click(function(){
  $("#myCarousel").carousel("prev");
});

$(".right").click(function(){
  $("#myCarousel").carousel("next");
});
