const env = {
	S3_URL : "https://lachie-website.s3.ap-southeast-2.amazonaws.com/"
}

var pictures = new Array(
	env.S3_URL + 'images/magnet.png',
	env.S3_URL + 'images/piano.png',
	env.S3_URL + 'images/snow-sky.png'
);

var loginImageUrl = env.S3_URL + 'images/owl.jpg';

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
	document.getElementById("welcome-img").src = loginImageUrl;
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
