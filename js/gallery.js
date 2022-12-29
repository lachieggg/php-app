var CAROUSEL_ENABLED = (process.env.CAROUSEL_ENABLED === 'true');
var CAROUSEL_START_IMAGE = process.env.CAROUSEL_START_IMAGE;

var IMAGES_URL = process.env.IMAGES_URL

// Load the AWS SDK for JavaScript
var AWS = require('aws-sdk');

// Set the AWS region
AWS.config.update({region: 'ap-southeast-2'});

// Create an S3 client
var s3 = new AWS.S3();

// Set the name of the bucket that you want to list the objects for
var bucketName = 'lachie-website';

// Call the listObjects method to retrieve the list of objects
s3.listObjects({Bucket: bucketName}, function(err, data) {
  if (err) {
    console.log('Error:', err);
  } else {
    console.log('Objects:', data.Contents);
  }
});

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
