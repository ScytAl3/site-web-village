// Api Client Places.js for autocompletion of the address
import Places from 'places.js';

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

// Écoute de l'événement associé à l'upload de l'image
$(function () {
    $('input[type="file"]').on("change", function () {
        let filenames = [];
        let files = document.getElementById("event_pictureFiles").files;
        if (files.length > 1) {
            for (let i in files) {
                if (files.hasOwnProperty(i)) {
                    filenames.push(files[i].name);
                }
            }
        } else {
            filenames.push(files[0].name);
        }
        $(this)
            .next(".custom-file-label")
            .html(filenames.join(", "));
    });
});

// Suppression des elements : images associées à un événement (mode admin)
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