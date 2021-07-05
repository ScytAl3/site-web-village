// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

/* Import slick-carousel JS & CSS */
import 'slick-carousel/slick/slick.min.js';
import './styles/event.scss';

// Initialization of the carousel that displays the photos of an event
$(function () {

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