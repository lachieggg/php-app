const env = {
	S3_URL : "https://lachie-website.s3.ap-southeast-2.amazonaws.com/"
}

var pictures = new Array(
	env.S3_URL + 'images/magnet.png',
	env.S3_URL + 'images/piano.png',
	env.S3_URL + 'images/snow-sky.png');

window.onload = randomPicture();

function randomPicture() {
    var number = Math.floor(Math.random() * pictures.length);
	try {
		document.getElementById("home-img").src = pictures[number];
	} catch(err) {
		// no home image on page
		// skipping
	}
}

$(window).on('load', function() {
	try {
		$('.flexslider').flexslider({
		    animation: "slide",
		    animationLoop: false,
			itemWidth: 210,
			itemMargin: 5
		});
	} catch(err) {
	    // flexslider is not available
	    // skipping
	}
});
