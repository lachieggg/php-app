var CAROUSEL_ENABLED = (process.env.CAROUSEL_ENABLED === 'true');
var CAROUSEL_START_IMAGE = process.env.CAROUSEL_START_IMAGE;

var S3_IMAGES_URL = process.env.S3_URL + "images/";

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
	if(CAROUSEL_ENABLED) {
		setCarousel();
	}
}

function setCarousel() {
	try {
		var divElement = document.getElementById("empty-div");
		var imgElement = document.getElementById("empty-img");
		var innerElement = document.getElementById("inner-carousel");
		var innerCarousel = document.getElementById("myCarousel");
		var outerDiv = document.getElementById("container-carousel");


		var prevElem = null;

		// Create all the carousel elements
		for (let carouselItemIndex = 0; carouselItemIndex < pictures.length; carouselItemIndex++) {
			// Clone the div
			var divClone = divElement.cloneNode(true);
			var id = "carousel-item-" + (carouselItemIndex).toString();
			divClone.id = id;
			// Clone the image
			var imgClone = imgElement.cloneNode(true);
			var id = "carousel-img-" + (carouselItemIndex).toString();
			imgClone.id = id;
			// Put the image inside the div
			divClone.appendChild(imgClone)
			// Put the div inside the carousel
			innerElement.appendChild(divClone);
		}

		innerCarousel.appendChild(innerElement);
		outerDiv.appendChild(innerCarousel)

		document.body.appendChild(outerDiv);

		previousNode = document.getElementById("bookmark");
		previousNode.after(outerDiv); // Adds outerDiv after previousNode

		divElement.remove();
		imgElement.remove();

		var elementIndex = 0;
		for (let pictureIndex = CAROUSEL_START_IMAGE; pictureIndex < pictures.length; pictureIndex++) {
			var id = "carousel-img-" + (pictureIndex).toString();
			document.getElementById(id).src = pictures[pictureIndex];
			elementIndex++;
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
