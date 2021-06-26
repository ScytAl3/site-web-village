/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/global.scss';

// start the Stimulus application
import './bootstrap';

// Api Client Places.js for autocompletion of the address
import Places from 'places.js';
// Import Leaflet library
import Map from './map.js';
// Import de Slick-carousel pour l affichage des images d un evenement
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

// Initialisation de la map
Map.init();
// On recupere en fonction de la saisie dynamique de la rue les elements restants
let inputAddress = document.querySelector('#event_address');
if (inputAddress !== null) {
    let place = Places({
        container: inputAddress
    });
    place.on('change', e => {
        document.querySelector('#event_city').value = e.suggestion.city;
        document.querySelector('#event_zip_code').value = e.suggestion.postcode;
        document.querySelector('#event_lat').value = e.suggestion.latlng.lat;
        document.querySelector('#event_lng').value = e.suggestion.latlng.lng;
    });
}

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// manage static images with Webpack Encore
// require all images
const imagesContext = require.context('./images', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);

// Suppression des elements
document.querySelectorAll('[data-delete]').forEach(a => {
    a.addEventListener('click', e => {
        e.preventDefault();
        fetch(a.getAttribute('href'), {
            method: 'DELETE',
            headers: {
                'X-Requested-with': 'XMLHttprequest',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                '_token': a.dataset.token
            })
        }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    a.parentNode.parentNode.removeChild(a.parentNode);
                } else {
                    alert(data.error);
                }
            })
            .catch(e => alert(e));
    });
});

// initialisation du carousel
$(document).ready(function () {

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });
});


$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');