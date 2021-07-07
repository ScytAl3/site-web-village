import * as L from 'leaflet';

// We redefine the icons for the use with Webpack
delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
    iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
    iconUrl: require('leaflet/dist/images/marker-icon.png'),
    shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

export default class Map {

    static init() {
        // on recupere dans le document l element map
        let myMap = document.querySelector('#eventMap');
        // si aucune carte n est associee a l evenement
        if (myMap === null) {
            return;
        }

        // creation de l icone du marqueur a afficher sur la carte
        // let mkIcon = L.icon({
        //     iconUrl: mkrIcon,
        // })
        
        // on declare une variable pour stocker les coordonnees pour le centrage du marqueur
        let mkCenter = [myMap.dataset.lat, myMap.dataset.lng];
        myMap = L.map('eventMap').setView(mkCenter, 15);

        // To use the Mapbox tiles, you also need to request an access token.
        let token = 'pk.eyJ1IjoibTMxM3JsMW5rIiwiYSI6ImNqdnV4aDZjZTFhMG80OXBuNnVmZTF5ZmUifQ.bE0Ht8Vm2iG_nFMRdinYyA';

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            minZoom: 12,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: token
        }).addTo(myMap);
        // Creation of the marker that is added to the map
        // L.marker(mkCenter, {
        //     icon: mkIcon
        // }).addTo(myMap);
        L.marker(mkCenter).addTo(myMap);
    }
}