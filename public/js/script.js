var macarte = null;
// Fonction d'initialisation de la carte
function initMap(lat, lon) {
    macarte = L.map('map')
    
    if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition(maPosition);

    function maPosition(position) {
        let lat = position.coords.latitude;
        let lon = position.coords.longitude;
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        macarte.setView([lat, lon], 13);
    }
    
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);

    
// Nous initialisons une liste de marqueurs
var restaurants = {
	"La Brocherie": { "lat": 	
    43.5259687000, "lon": 5.4523033000 },
	"Croquemitoufle": { "lat": 43.5262575000, "lon": 5.4487842000 },
	"Epicerie locale": { "lat": 43.5262575000, "lon": 5.4541111000 },
	"Licandro": { "lat": 43.5278930000, "lon": 5.4459626000 }
};

// Nous parcourons la liste des restaurants
for (restaurant in restaurants) {
    var marker = L.marker([restaurants[restaurant].lat, restaurants[restaurant].lon]).addTo(macarte);
}    
}

window.onload = function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap(); 
};

// Fonction de callback en cas d’erreur
function erreurPosition(error) {
    var info = "Erreur lors de la géolocalisation : ";
    switch(error.code) {
    case error.TIMEOUT:
    	info += "Timeout !";
    break;
    case error.PERMISSION_DENIED:
	info += "Vous n’avez pas donné la permission";
    break;
    case error.POSITION_UNAVAILABLE:
    	info += "La position n’a pu être déterminée";
    break;
    case error.UNKNOWN_ERROR:
    	info += "Erreur inconnue";
    break;
    }
document.getElementById("infoposition").innerHTML = info;
}

   