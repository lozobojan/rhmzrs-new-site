let timestampAPI = Date.now();
const config = {
    API: {
        meteoStations: '../api/ecology-data',
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

    $('#example').DataTable({
        columnDefs: [
            { orderable: true, targets: 1 }
        ],
        "language": {
            "url": "../js/Datatable/Serbian.json"
        }
    });

});



