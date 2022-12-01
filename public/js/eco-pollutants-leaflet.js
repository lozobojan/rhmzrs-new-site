let timestampAPI = Date.now();
const config = {
    API: {
        ecoInformation: '../api/eco-pollutants',
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
    let map = L.map(config.MAP.element, {
        gestureHandling: true,
    }).setView(config.MAP.latLng, config.MAP.zoomLevel);
    //disable default scroll
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
    $('#example').DataTable({
        ajax: {
            dataSrc: '',
            url: config.API.ecoInformation,
        },
        "columns": [
            { "data": "station_name" },
            { "data": "lat" },
            { "data": "lng" },
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    let data = [];
    let markerArr = [];

    axios.get(`${config.API.ecoInformation}`).then(rs => {
        data = rs.data;
        data.forEach(item => {
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
    })
});



