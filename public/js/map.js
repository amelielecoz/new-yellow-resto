class Map {
    constructor(){
        this.mapTile = null;
        this.markers = [];
    }

    /**
     * @description Charge la carte depuis OpenStreetMap de façon asynchrone et l'ajoute sur this.map
     * @param {HTMLElement} element 
     */
    load(element) {
        this.mapTile = L.map(element).setView([43.280000, 5.390000], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'
        }).addTo(this.mapTile);
        this.addMarkers();
    }

    /**
     * @description Charge les stations, applique l'icône vert ou rouge en fonction du statut et du nombre de vélos 
     */
    addMarkers() {
        this.ajax = new Ajax(this.APIUrl);
        this.ajax.ajaxGet(this.APIUrl, (stations) => {
            stations.forEach((station) => {
                let marker = L.marker([station.position.lat, station.position.lng])
                this.markers.push(marker);   
            })
            this.mapTile.addLayer(this.markerClusters);
        })
    }

    /**
     * @description Gère l'évenement au clic sur la station
     * @param {event} event 
     * @param {Function} cb 
     */
    addEventListener (event, cb) {
        this.popup.addEventListener('add', () => {
            this.popup.addEventListener(event, cb);
        })
    }
}


