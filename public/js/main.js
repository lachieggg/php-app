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
     document.getElementById("home-img").src = pictures[number];
}
