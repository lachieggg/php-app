var IMAGES_URL = process.env.IMAGES_URL + 'images/'

var pictures = new Array(
    IMAGES_URL + 'nebula.jpg',
    IMAGES_URL + 'luna.jpg',
    IMAGES_URL + 'mountain-day.jpg',
    IMAGES_URL + 'wtc.jpg',
    IMAGES_URL + 'cityscape.jpg',
    IMAGES_URL + 'library.jpg'
);

var defaultImage = IMAGES_URL + 'wtc.jpg';

setPicture();


function setPicture()
{
    try {
        document.getElementById("home-img").src = defaultImage;
    } catch(err) {
        // no home image on page
        // skipping
    }
}