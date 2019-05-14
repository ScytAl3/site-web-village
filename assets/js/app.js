/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// Api Client Places.js for autocompletion of the address
import Places from 'places.js'

let inputAddress = document.querySelector('#event_address')
if (inputAddress !== null) {
    let place = Places({
        container: inputAddress
    })
    place.on('change', e => {
        document.querySelector('#event_city').value = e.suggestion.city
        document.querySelector('#event_zip_code').value = e.suggestion.postcode
        document.querySelector('#event_lat').value = e.suggestion.latlng.lat
        document.querySelector('#event_lng').value = e.suggestion.latlng.lng
    })
}
// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');
require('../css/global.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

// manage static images with Webpack Encore
// require all images
const imagesContext = require.context('../images', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);

// require fonts
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');