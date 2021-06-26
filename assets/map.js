// Leaflet is the leading open-source JavaScript library for mobile-friendly interactive maps
import L from 'leaflet'
import 'leaflet/dist/leaflet.css'
import iconM from './images/map/marker-icon.png'

export default class Map {

    static init() {
        // on recupere dans le document l element map
        let mymap = document.querySelector('#eventMap')
        // si aucune carte n est associee a l evenement
        if (mymap === null) {
            return
        }
        // creation de l icone du marqueur a afficher sur la carte
        let mkIcon = L.icon({
            iconUrl: iconM,
        })

        // on declare une variable pour stocker les coordonnees pour le centrage du marqueur
        let mkCenter = [mymap.dataset.lat, mymap.dataset.lng]
        mymap = L.map('eventMap').setView(mkCenter, 15)
        let token = 'pk.eyJ1IjoibTMxM3JsMW5rIiwiYSI6ImNqdnV4aDZjZTFhMG80OXBuNnVmZTF5ZmUifQ.bE0Ht8Vm2iG_nFMRdinYyA'
        L.tileLayer('https://api.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            minZoom: 12,
            id: 'mapbox.mapbox-streets-v8',
            accessToken: token
        }).addTo(mymap)
        // creation du marqueur que l on ajoute a la carte
        L.marker(mkCenter, {
            icon: mkIcon
        }).addTo(mymap)
    }
}