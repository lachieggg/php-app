var CAROUSEL_ENABLED = (process.env.CAROUSEL_ENABLED === 'true');
var CAROUSEL_START_IMAGE = process.env.CAROUSEL_START_IMAGE;

var IMAGES_URL = process.env.URL + "images/";

var pictures = new Array(
	IMAGES_URL + 'mountain-night.jpg',
	IMAGES_URL + 'fiber.jpg',
	IMAGES_URL + 'led.jpg',
	IMAGES_URL + 'hdd.jpg',
	IMAGES_URL + 'motherboard.jpg',
	IMAGES_URL + 'city.jpg',
	IMAGES_URL + 'wtc.jpg',
	IMAGES_URL + 'diving.jpg',
	IMAGES_URL + 'minecraft.jpg',
	IMAGES_URL + 'mountain-day.jpg'
);

window.onload = load();

function load() {
	if(CAROUSEL_ENABLED) {
		setCarousel();
	}
}

function setCarousel() {
	try {
		for (let pictureIndex = CAROUSEL_START_IMAGE; pictureIndex < pictures.length; pictureIndex++) {
			var id = "carousel-img-" + (pictureIndex).toString();
			document.getElementById(id).src = pictures[pictureIndex];
		}
	} catch(err) {
		console.log(err);
		// no slider on page
		// or reached end of number of elements
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
