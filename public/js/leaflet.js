let timestampAPI = Date.now();
config = {
    API: {
        weatherForecastLink: 'pointweather.json?',
        meteoMaps: 'api/meteo-maps',
        ecoInformation: 'api/eco-information',
        hydroInformation: 'api/hydro-information',
        earthquakes: 'api/earthquakes'
    },
    MAP: {
        element: 'map',
        latLng: {lat: 44.1, lng: 17.8},
        zoomLevel: 7.9,
        typeControl: false,
        scrollwheel: false,
        mapType: 'roadmap',
        iconsURL: 'images/icons/',
        capitalCity: {
            title: 'Banja Luka',
            lat: 44.7725,
            lng: 17.186,
            icon: 'images/icons/general-icons/capital_big.png',
            zindex: -1
        }
    }
};


document.addEventListener('DOMContentLoaded', function () {
    changeData(1);
});


let map = L.map(config.MAP.element).setView(config.MAP.latLng, config.MAP.zoomLevel);

map.scrollWheelZoom.disable();

$("#map").bind('mousewheel DOMMouseScroll', function (event) {
    event.stopPropagation();
    if (event.ctrlKey == true) {
        event.preventDefault();
        map.scrollWheelZoom.enable();
        $('#map').removeClass('map-scroll');
        setTimeout(function(){
            map.scrollWheelZoom.disable();
        }, 1000);
    } else {
        map.scrollWheelZoom.disable();
        $('#map').addClass('map-scroll');
    }

});

$(window).bind('mousewheel DOMMouseScroll', function (event) {
    $('#map').removeClass('map-scroll');
})


L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
let data = [];

let markerArr = [];

function addToMap(type) {
    let loader = document.getElementById('loader');
    loader.style.display = 'grid';
    if (markerArr.length > 0) {
        markerArr.forEach(marker => {
            marker.remove();
        })
    }
    axios.get(`${type}`).then(rs => {
        data = rs.data;
        data.forEach(item => {
            console.log(item.lat, item.lng)
            let marker = L.marker(
                [item.lat, item.lng],
                {
                    icon:
                        L.icon({
                            iconUrl: item.icon,
                        })
                }
            ).addTo(map)
                .bindPopup(item.description);
            markerArr.push(marker);
        })
        loader.style.display = 'none';
    })

}


// changeData function to fetch data from api and update the leaflet map
function changeData(type) {
    switch (type) {
        case 1:
            addToMap(config.API.weatherForecastLink)
            break;
        case 2:
            addToMap(config.API.meteoMaps)
            break;
        case 3:
            addToMap(config.API.earthquakes)
            break;
        case 4:
            addToMap(config.API.hydroInformation)
            break;
        case 5:
            addToMap(config.API.ecoInformation)
            break;
        default:
            data = [];
    }
}

